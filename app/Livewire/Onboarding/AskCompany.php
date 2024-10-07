<?php

namespace App\Livewire\Onboarding;

use Exception;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Livewire\Component;
use App\Models\Template;
use App\Models\CaseStudy;
use Illuminate\Support\Str;
use App\Events\ManageTenant;
use App\Events\TenantRegistered;
use App\Listeners\SetTenantListener;
use Illuminate\Support\Facades\Auth;
use App\Models\TemplateDefaultOption;
use App\Traits\HandlesExceptionsTrait;
use App\Models\TenantTemplatePreference;
use Stancl\Tenancy\Database\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Stancl\Tenancy\Exceptions\DomainOccupiedByOtherTenantException;

class AskCompany extends Component
{
    use HandlesExceptionsTrait;

    public $company_name;

    protected function rules()
    {
        return [
            'company_name' => 'required|unique:users|max:65',
        ];
    }

    public function createTenant()
    {
        try {

            $this->validate();

            $user = $this->getUser();
            
            if ($user->company_name != "") {
                return;
            }

            $this->updateUserCompanyName($user);
            $tenant = $this->createTenantAndSubdomain($user);
            $this->assignPlan($user);
            event(new TenantRegistered($tenant));

            return redirect()->route('dashboard');
        } catch (ModelNotFoundException $e) {
            $this->handleException('User not found');
        } catch (DomainOccupiedByOtherTenantException $e) {
            $this->handleException("This subdomain is already used by another company. Please consider using another.");
        } catch (Exception $e) {
            $this->handleException('An unexpected error occurred. Please try again!');
        }
    }

    protected function getUser()
    {
        return User::findOrFail(Auth::id());
    }

    protected function updateUserCompanyName(User $user)
    {
        $user->update(['company_name' => $this->company_name]);
    }

    protected function createTenantAndSubdomain(User $user)
    {
        $tenant = $user->tenants()->create(['user' => $user->name]);
        $subdomain = Str::slug($this->company_name) . '.' . config('app.main_domain');

        $tenant->domains()->create(['domain' => $subdomain]);

        $this->setCurrentTenant($tenant);

        return $tenant;
    }

    protected function assignPlan(User $user)
    {
        $plan = Plan::find(1);
        $user->plans()->attach(
            $plan->id, ['expiry_date' => Carbon::now()->addMonths(12)]
        );
    }

    protected function setCurrentTenant($tenant)
    {
        //set the current tenant for entire app
        return event(new ManageTenant($tenant->id, 'set'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function render()
    {
        return view('livewire.onboarding.ask-company')
            ->layout('components.base-layout')
            ->title('Onboarding | FactorPage');
    }
}
