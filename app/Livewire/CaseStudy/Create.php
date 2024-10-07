<?php

namespace App\Livewire\CaseStudy;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\CaseStudy;
use Livewire\Attributes\Lazy;
use Livewire\WithFileUploads;
use App\Livewire\Forms\CaseStudy\PostForm;

class Create extends Component
{
    use WithFileUploads;

    public PostForm $form;

    /** @var object */
    public $image = '';

    public function __construct()
    {
        
    }

    public function save()
    {
        $this->form->store();
        return redirect('case-study/manage');
    }

    public function render()
    {
        return view('livewire.case-study.create')
                ->layout('components.app-layout')
                ->title('Create Case Study | FactorPage');
    }
}
