<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Events\ManageTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt($this->only('email', 'password'), $this->remember)) {
            if (Auth::user()->isBannedOrSuspended()) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => __('auth.suspended'),
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        event(new ManageTenant(Auth::user()->current_tenant_id, 'set'));

        $this->dispatch('notification:default',[
            'message' => 'Logged In'
        ]);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login')
                ->layout('components.base-layout')
                ->title('Login | FactorPage');
    }
}
