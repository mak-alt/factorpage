<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class Manage extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:120')] 
    public $name;

    #[Locked]
    public $email;

    #[Validate('nullable|mimes:png,jpg,jpeg,webp')] 
    public $image;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function update()
    {
        $this->validate();
        
        auth()->user()->update([
            'name' => $this->name
        ]);

        if($this->image) {
            auth()->user()->clearMediaCollection('avatars');
            auth()->user()
            ->addMedia($this->image)
            ->withResponsiveImages()
            ->toMediaCollection('avatars');
        }

        // return redirect()->route('profile.manage');
    }

    public function render()
    {
        return view('livewire.profile.manage')
            ->layout('components.app-layout')
            ->title('Manage Profile | FactorPage');;
    }
}
