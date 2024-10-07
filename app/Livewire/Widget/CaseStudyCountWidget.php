<?php

namespace App\Livewire\Widget;

use Livewire\Component;
use App\Models\CaseStudy;

class CaseStudyCountWidget extends Component
{

    public $caseStudiesCount;

    public function mount()
    {
        //get case studies count
        $this->caseStudiesCount = CaseStudy::whereTenantId(currentTenantId())->count();
        $this->caseStudiesCount = number_format($this->caseStudiesCount);
    }

    // public function placeholder(array $params = [])
    // {
    //     return view('livewire.widget.welcome-placeholder', $params);
    // }

    public function render()
    {
        return view('livewire.widget.case-study-count-widget');
    }
}
