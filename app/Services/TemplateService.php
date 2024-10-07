<?php

namespace App\Services;

use App\Models\CaseStudy;
use App\Models\CaseStudyTemplate;
use App\Models\Tenant;
use App\Models\TenantTemplatePreference;
use Illuminate\Support\Collection;

class TemplateService
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function getTemplateData(): array
    {
        $template = $this->getTenantTemplate();
        $caseStudyTemplate = $this->getCaseStudyTemplate();
        $caseStudies = $this->getCaseStudies();
        $menuItems = collect($this->getMenuItems());

        return compact('template', 'caseStudyTemplate', 'caseStudies','menuItems');
    }

    public function showCaseStudy($slug)
    {   
        $menuItems = collect($this->getMenuItems());
        $caseStudy = CaseStudy::whereSlug($slug)->whereTenantId(currentTenantId())->first();
        if(!$caseStudy) {
            abort(404);
        }

        return compact('caseStudy','menuItems');
    }

    public function getTenantTemplate(): string
    {
        return Tenant::findOrFail(tenant('id') ?? currentTenantId())->template()->value('name');
    }

    public function getCaseStudyTemplate(): ?CaseStudyTemplate
    {
        $selectedTemplateId = TenantTemplatePreference::where('tenant_id', tenant('id') ?? currentTenantId())
            ->where('key', 'selected_case_study_template')
            ->value('value');

        return $selectedTemplateId ? CaseStudyTemplate::find($selectedTemplateId) : null;
    }

    public function getCaseStudies(): Collection
    {
        $selectedCaseStudyIds = TenantTemplatePreference::where('tenant_id', tenant('id') ?? currentTenantId())
            ->where('key', 'selected_case_study_ids')
            ->value('value');

        if (!$selectedCaseStudyIds) {
            return collect([]);
        }

        $ids = explode(',', $selectedCaseStudyIds);
        return CaseStudy::with('media')
            ->whereIn('id', $ids)
            ->whereStatus('active')
            ->get();
    }

    public function getMenuItems(): Collection
    {
        return $this->menuService->getMenuItems(tenant('id') ?? currentTenantId());
    }
}