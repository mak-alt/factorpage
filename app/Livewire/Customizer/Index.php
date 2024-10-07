<?php

namespace App\Livewire\Customizer;

use App\Models\Menu;
use App\Models\Tenant;
use Livewire\Component;
use App\Models\MenuItem;
use App\Models\CaseStudy;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Models\CaseStudyTemplate;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Validate;
use App\Models\TenantTemplatePreference;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Index extends Component
{
    use WithFileUploads;

    public $currentTemplate;
    public $menuItems;
    public $selectedCaseStudyIds;
    public $caseStudies;
    public $preferences = [];
    public $menuData = ['name' => '', 'link' => '', 'target' => ''];
    public $existingPreferences;

    public function rules()
    {
        return [
            'preferences.favicon' => 'max:512',
            'preferences.logo' => 'max:512',
        ];
    }

    public function messages()
    {
        return [
            'preferences.favicon.max' => 'The favicon may not be greater than :max kilobytes.',
            'preferences.logo.max' => 'The logo may not be greater than :max kilobytes.',
        ];
    }

    public function mount()
    {
        $this->currentTemplate = route('tenant.web', ['tenant_id' => currentTenantId()]);

        $menuItems = Menu::with('menuItems')->whereTenantId(currentTenantId())->whereStatus('active')->first();
        $this->menuItems = $menuItems;

        $this->preferences = [
            'logo' => '',
            'favicon' => '',
            'logo_width' => '',
            'banner_title_text' => '',
            'banner_subtitle_text' => '',
            'banner_cta_text' => '',
            'banner_cta_link' => '',
            'banner_cta_link_target' => '',
            'title' => '',
            'meta_title' => '',
            'meta_description' => '',
        ];
        $this->existingPreferences = TenantTemplatePreference::whereTenantId(currentTenantId())->get();
        foreach($this->existingPreferences as $existingPreference) {
            if($existingPreference->key == "logo_width") {
                $this->preferences[$existingPreference->key] = '100';
            } else {
                $this->preferences[$existingPreference->key] = $existingPreference->value;
            }
        }
    }

    // #[On('titleUpdated')]
    public function updatedPreferences($value, $key)
    {
        if($key == 'logo') {
            $this->dispatch('logoUpdated', $this->preferences['logo'][0]->temporaryUrl());
        }
    }

    #[On('menuDataUpdated')]
    public function menuDataUpdated($menuData)
    {
        $this->menuData = $menuData;
    }

    #[On('caseStudiesDataUpdated')]
    public function caseStudiesDataUpdated($caseStudyIds)
    {
        $this->selectedCaseStudyIds = $caseStudyIds;
        $this->fetchCaseStudiesInIframe();
    }

    protected function fetchCaseStudiesInIframe()
    {
        $caseStudiesData = renderBladeFromDB($this->getCaseStudies(), $this->getCaseStudyTemplate());
        $this->dispatch('fetchCaseStudyData', $caseStudiesData);
    }

    protected function getCaseStudyTemplate()
    {
        $selectedTemplateId = TenantTemplatePreference::where('tenant_id', tenant('id') ?? currentTenantId())
            ->where('key', 'selected_case_study_template')
            ->value('value');

        return $selectedTemplateId ? CaseStudyTemplate::find($selectedTemplateId)->code : null;
    }

    protected function getCaseStudies()
    {
        return CaseStudy::with('media')
            ->whereIn('id', $this->selectedCaseStudyIds)
            ->whereStatus('active')
            ->get();        
    }

    public function save()
    {
        // $this->validate();
        // dd($this->menuData);
        // dd($this->preferences);
        // dd($this->selectedCaseStudyIds);

        // set user preferences data 

        //save selected logo
        // dd($this->preferences['logo'][0] instanceof TemporaryUploadedFile);
        if(isset($this->preferences['logo'])) {
            if($this->preferences['logo'][0] instanceof TemporaryUploadedFile) {
                // Get the original name of the uploaded file
                $originalName = $this->preferences['logo'][0]->getClientOriginalName();
                $this->preferences['logo'][0]->storeAs(path: 'public/'.currentTenantId().'/images', name: $originalName);
                setPreference('logo',$originalName);
            }
        }

        if(isset($this->preferences['favicon'])) {
            if($this->preferences['favicon'][0] instanceof TemporaryUploadedFile) {
                $originalName = $this->preferences['favicon'][0]->getClientOriginalName();
                $this->preferences['favicon'][0]->storeAs(path: 'public/'.currentTenantId().'/images', name: $originalName);
                setPreference('favicon',$originalName);
            }
        }

        //set menu items
        if(isset($this->menuData) && count($this->menuData) > 0) {
            //check for existing menu
            $menu = Menu::with('menuItems')->whereTenantId(currentTenantId())->first();
            if($menu) {
                MenuItem::whereMenuId($menu->id)->delete();

                foreach($this->menuData as $menuData) {
                    MenuItem::create([
                        'name' => $menuData['name'],
                        'link' => $menuData['link'],
                        'target' => $menuData['target'] == true ? 1 : 0,
                        'menu_id' => $menu->id,
                        'parent_id' => 0
                    ]);
                }
            } else {
                $menu = Menu::create([
                    'name' => 'Primary Menu',
                    'status' => 'active',
                    'tenant_id' => currentTenantId()
                ]);

                foreach($this->menuData as $menuData) {
                    MenuItem::create([
                        'name' => $menuData['name'],
                        'link' => $menuData['link'],
                        'target' => $menuData['target'] == true ? 1 : 0,
                        'menu_id' => $menu->id,
                        'parent_id' => 0
                    ]);
                }
            }

            if($menu) {
                //update tenant template preferences for specific tenant
                setPreference('menu_ids', $menu->id);
            }
        }

        //push selected case studies for tenant
        if(isset($this->selectedCaseStudyIds) && count($this->selectedCaseStudyIds) > 0) {
            setPreference('selected_case_study_ids',implode(',', $this->selectedCaseStudyIds));
        }

        //push preferences
        if(isset($this->preferences['title'])) {
            setPreference('title', $this->preferences['title']);
        }

        if(isset($this->preferences['logo_width'])) {
            setPreference('logo_width', $this->preferences['logo_width']);
        }

        if(isset($this->preferences['banner_title_text'])) {
            setPreference('banner_title_text', $this->preferences['banner_title_text']);
        }

        if(isset($this->preferences['banner_subtitle_text'])) {
            setPreference('banner_subtitle_text', $this->preferences['banner_subtitle_text']);
        }

        if(isset($this->preferences['banner_cta_text'])) {
            setPreference('banner_cta_text', $this->preferences['banner_cta_text']);
        }

        if(isset($this->preferences['banner_cta_link'])) {
            setPreference('banner_cta_link', $this->preferences['banner_cta_link']);
        }

        if(isset($this->preferences['banner_cta_link_target'])) {
            setPreference('banner_cta_link_target', $this->preferences['banner_cta_link_target']);
        }

        if(isset($this->preferences['meta_title'])) {
            setPreference('meta_title', $this->preferences['meta_title']);
        }

        if(isset($this->preferences['meta_description'])) {
            setPreference('meta_description', $this->preferences['meta_description']);
        }

        dd("done");
    }

    public function selectCaseStudies()
    {
        $this->dispatch('selectCaseStudiesPopup');
    }
    
    public function render()
    {
        return view('livewire.customizer.index')
                ->layout('components.customizer-layout')
                ->title('Customize Template | FactorPage');
    }
}
