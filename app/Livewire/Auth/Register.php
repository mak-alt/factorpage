<?php

namespace App\Livewire\Auth;

use App\Mail\WelcomeUser;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $company_name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'auth_provider' => 'email'
        ]);

        event(new Registered($user));

        Mail::to($user->email)->send(new WelcomeUser($user));
        Auth::login($user, true);

        return redirect()->intended(route('onboarding'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'company_name' => 'required|unique:users'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register')
                ->layout('components.base-layout')
                ->title('Register | FactorPage');
    }
}
