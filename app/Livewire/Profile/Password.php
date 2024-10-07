<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Traits\HandlesExceptionsTrait;

class Password extends Component
{
    use HandlesExceptionsTrait;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8|different:currentPassword',
        'confirmPassword' => 'required|same:newPassword',
    ];

    public function update()
    {
        $this->validate();

        // Check if the current password is correct
        if (!Hash::check($this->currentPassword, auth()->user()->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            return;
        }

        // Update the password
        auth()->user()->update(['password' => Hash::make($this->newPassword)]);

        $this->dispatch('notify', 'Password updated successfully');
        
        $this->reset(['currentPassword', 'newPassword', 'confirmPassword']);
    }

    public function render()
    {
        return view('livewire.profile.password')
            ->layout('components.app-layout')
            ->title('Change Password | FactorPage');;
    }
}
