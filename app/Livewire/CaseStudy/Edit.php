<?php

namespace App\Livewire\CaseStudy;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\CaseStudy\PostForm;
use App\Models\CaseStudy;

class Edit extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public $caseStudy;

    public function mount($id)
    {
        $this->caseStudy = CaseStudy::with('media')->find($id);
        $this->form->setPost($this->caseStudy);
    }

    public function save()
    {
        $this->form->update();
        return redirect('case-study/manage');
    }

    public function render()
    {
        return view('livewire.case-study.edit')
                ->layout('components.app-layout')
                ->title('Edit Case Study | FactorPage');
    }
}
