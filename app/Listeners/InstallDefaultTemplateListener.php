<?php

namespace App\Listeners;

use App\Models\Template;
use App\Events\TenantRegistered;
use App\Models\TemplateDefaultOption;
use App\Models\TenantTemplatePreference;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstallDefaultTemplateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TenantRegistered $event): void
    {
        $template = Template::find(1);
        $tenant = $event->tenant;
        $tenant->template()->attach($template->id);

        //copy default data from default options to tenant template preferences
        $defaultData = TemplateDefaultOption::whereTemplateId($template->id)->get();
        foreach($defaultData as $data){
            $tenantTemplatePreference = new TenantTemplatePreference();
            $tenantTemplatePreference->key = $data->key;
            if($data->key == "logo" || 
                $data->key == "favicon" || 
                $data->key == "selected_case_study_template" || 
                $data->key == "show_banner_title" ||
                $data->key == "show_banner_subtitle" ||
                $data->key == "show_banner_cta" ||
                $data->key == "show_case_study_heading" ||
                $data->key == "show_case_study_content") {
                $tenantTemplatePreference->value = $data->value;
            } else { 
                $tenantTemplatePreference->value = '';
             }
            $tenantTemplatePreference->tenant_id = $tenant->id;
            $tenantTemplatePreference->template_id = $template->id;
            $tenantTemplatePreference->save();
        }
    }
}
