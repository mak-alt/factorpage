<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;
use App\Models\CaseStudy;

class Dashboard extends Component
{
    public function render()
    {

        return view('livewire.dashboard')
                ->layout('components.app-layout')
                ->title('Dashboard');
    }
}
