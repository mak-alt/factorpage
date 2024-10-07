<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Cashier\Billable;
use App\Enums\AccountStatusEnum;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Date;
use Illuminate\Notifications\Notifiable;
use function Illuminate\Events\queueable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements HasMedia
{
    use Billable, HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'last_login_at',
        'last_activity_at',
        'activation_token',
        'email_verified',
        'account_status',
        'auth_provider'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'account_status' => AccountStatusEnum::class,
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(queueable(function (User $customer) {
            if ($customer->hasStripeId()) {
                $customer->syncStripeCustomerDetails();
            }
        }));
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'tenant_user', 'user_id', 'tenant_id');
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_user', 'user_id', 'plan_id')
                    ->withPivot(['expiry_date', 'is_current'])
                    ->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    public function isBannedOrSuspended()
    {
        if($this->where('account_status', AccountStatusEnum::BANNED)->orWhere('account_status', AccountStatusEnum::SUSPENDED)->first()){
            return true;
        }
        return false;
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }

    protected function getUserAvatarImageAttribute($value)
    {
        if ($this->getFirstMedia('avatars')) {
            // Image exists, return the path to the image
            return '<img class="rounded-full" srcset="" src="'.$this->getFirstMediaUrl('avatars').'" alt="avatar">';
        } else {
            // Image doesn't exist, generate initials
            $name = $this->name; // Assuming you have a 'name' attribute
            $words = explode(' ', $name);

            if (count($words) >= 2) {
                return '<div class="is-initial rounded-full bg-zinc-400 text-lg uppercase text-white ring ring-white dark:ring-navy-700">'.substr($words[0], 0, 1) . substr($words[1], 0, 1).'</div>'; // Initials from first two words
            } else {
                return '<div class="is-initial rounded-full bg-zinc-400 text-lg uppercase text-white ring ring-white dark:ring-navy-700">'.substr($name, 0, 2).'</div>'; // Initials from the first two letters
            }
        }
    }

    public function isSubscribedToPremiumPlan($price_id, $name)
    {
        if($price_id === '') {
            return true;
        }

        return $this->subscribedToPrice($price_id, $name);
    }

    public function getUserCurrentPlanAttribute()
    {
        return $this->plans()->current()->first();
    }

    public function hasSubscription()
    {
        return $this->subscriptions()->active()->count() > 0 ? true : false;
    }

    public function getCurrentTenantIdAttribute()
    {
        return $this->tenants()->first() ? $this->tenants()->first()->id : null;
    }
}
