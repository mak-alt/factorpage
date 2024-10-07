<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use App\Models\CaseStudyTemplate;
use App\Services\TemplateService;
use App\Http\Controllers\Controller;
use App\Models\TenantTemplatePreference;

class TemplateController extends Controller
{
    protected $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    public function index()
    {
        $templateData = $this->templateService->getTemplateData();

        return view('templates.'.strtolower($templateData['template']).'.pages.index', $templateData);
    }

    public function caseStudyDetail($slug)
    {
        $caseStudy = $this->templateService->showCaseStudy($slug);

        return view('templates.'.strtolower(getSelectedTemplate()->name).'.pages.detail', $caseStudy);
    }
}
