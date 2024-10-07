<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $badge
 * @property float $price
 * @property string $type
 * @property string $features
 * @property boolean $is_featured
 * @property string $created_at
 * @property string $updated_at
 * @property PlanUser[] $planUsers
 */
class Plan extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'badge', 'price', 'type', 'features', 'is_featured', 'created_at', 'updated_at'];

    protected $casts = [
        'features' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'plan_user', 'plan_id', 'user_id')
                    ->withPivot(['expiry_date', 'is_current'])
                    ->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'plan_id', 'id');
    }


    protected function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', 1);
    }

    public function scopeMonthly($query)
    {
        return $query->where('type', 'monthly');
    }

    public function scopeAnnually($query)
    {
        return $query->where('type', 'annually');
    }

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }

    protected function getPriceAttribute($value)
    {
        return number_format($value,0);
    }
}
