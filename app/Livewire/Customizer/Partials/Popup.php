<?php

namespace App\Livewire\Customizer\Partials;

use Livewire\Component;
use App\Models\CaseStudy;
use Livewire\Attributes\On;

class Popup extends Component
{
    public $caseStudies;
    public $selectedIds = [];
    public $isOpen = false;

    public function mount()
    {
        $this->caseStudies = CaseStudy::with('media')->whereTenantId(currentTenantId())->whereStatus('active')->get();
        $this->selectedIds = $this->selectedIds;
    }

    #[On('openModal')]
    public function openModal()
    {
        $this->isOpen = true;
        $this->selectedIds = $this->selectedIds;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function selectCaseStudies($caseStudyIds)
    {
        $this->selectedIds = $caseStudyIds;
        $this->isOpen = false;
        $this->dispatch('caseStudiesDataUpdated', $this->selectedIds);
    }

    public function render()
    {
        return view('livewire.customizer.partials.popup');
    }
}
