<?php

namespace App\Livewire\Widget;

use App\Models\Tenant;
use Livewire\Component;

class CurrentTemplateWidget extends Component
{

    public $template;

    public function mount()
    {
        //get selected template
        $tenant = Tenant::with('template')->find(currentTenantId());
        $this->template = $tenant->template->first();
    }

    public function placeholder(array $params = [])
    {
        return view('livewire.widget.welcome-placeholder', $params);
    }

    public function render()
    {
        return view('livewire.widget.current-template-widget');
    }
}
