<?php

namespace App\Livewire\Template;

use App\Models\Tenant;
use Livewire\Component;
use App\Models\Template;
use App\Models\TemplateDefaultOption;

class Listing extends Component
{
    public $templates;
    public $tenant_template;

    public function mount()
    {
        $this->templates = Template::active()->get();
        $this->tenant_template = getSelectedTemplate();
    }

    public function selectedTemplate($id)
    {
        //check if tenant already has template selected
        $currentTenantId = currentTenantId();
        $tenant = Tenant::find($currentTenantId);

        // if($tenant->template()->exists())
        // {
        //     //sync template
        //     $template = $tenant->template()->sync($id);

        //     return redirect()->route('template.choose');
        // }

        //sync template
        $template = $tenant->template()->sync($id);

        //check if data already pushed

        // push template default data to tenant template preferences
        // $templateDefaultData = TemplateDefaultOption::where('template_id',$id)->get();
        // foreach($templateDefaultData as $data)
        // {

        // }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.template.listing')
                ->layout('components.app-layout')
                ->title('Templates | FactorPage');
    }
}
