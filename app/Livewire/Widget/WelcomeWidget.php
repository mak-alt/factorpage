<?php

namespace App\Livewire\Widget;

use Livewire\Component;

class WelcomeWidget extends Component
{

    public function placeholder(array $params = [])
    {
        return view('livewire.widget.welcome-placeholder', $params);
    }

    public function render()
    {
        return view('livewire.widget.welcome-widget');
    }
}
