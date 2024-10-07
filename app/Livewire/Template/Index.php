<?php

namespace App\Livewire\Template;

use App\Models\Template;
use App\Models\Tenant;
use Livewire\Component;

class Index extends Component
{
    public $templates;

    public function mount()
    {
        $this->templates = Template::active()->get();
    }

    public function selectedTemplate($id)
    {
        //check if tenant already has template selected
        $currentTenantId = currentTenantId();
        $tenant = Tenant::find($currentTenantId);

        if($tenant->template()->exists())
        {
            //sync template
            $template = $tenant->template()->sync($id);

            return redirect()->route('dashboard');
        }

        //attach template
        $template = $tenant->template()->attach($id);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.template.index')
                ->layout('components.base-layout')
                ->title('Templates | FactorPage');
    }
}
