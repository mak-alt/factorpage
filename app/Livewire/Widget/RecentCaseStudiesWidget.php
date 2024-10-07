<?php

namespace App\Livewire\Widget;

use App\Models\CaseStudy;
use Livewire\Component;

class RecentCaseStudiesWidget extends Component
{
    public $caseStudies;

    public function mount()
    {
        $this->caseStudies = CaseStudy::whereTenantId(currentTenantId())->take(4)->latest()->get();
    }

    public function placeholder(array $params = [])
    {
        return view('livewire.widget.recent-case-studies-placeholder', $params);
    }

    public function render()
    {
        return view('livewire.widget.recent-case-studies-widget');
    }
}
