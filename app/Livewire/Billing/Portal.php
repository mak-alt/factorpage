<?php

namespace App\Livewire\Billing;

use Livewire\Component;

class Portal extends Component
{
    public function render()
    {
        return view('livewire.billing.portal')
                ->layout('components.app-layout')
                ->title('Billing | FactorPage');
    }
}
