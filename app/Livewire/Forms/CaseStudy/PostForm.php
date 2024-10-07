<?php

namespace App\Livewire\Forms\CaseStudy;

use App\Models\CaseStudy;
use App\Traits\HandlesExceptionsTrait;
use Exception;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class PostForm extends Form
{
    use HandlesExceptionsTrait;

    public ?CaseStudy $caseStudy;

    /** @var string */
    public $name = '';

    /** @var string */
    public $slug = '';

    /** @var string */
    public $content = '';

    /** @var boolean */
    public $status = 'active';

    /** @var string */
    // public $publish_date = '';

    /** @var string */
    public $meta_title = '';

    /** @var string */
    public $meta_description = '';

    /** @var object */
    public $image = '';

    public $previewArr = [];

    public function setPost(CaseStudy $caseStudy)
    {
        $this->caseStudy = $caseStudy;
        $this->name = $caseStudy->name;
        $this->slug = $caseStudy->slug;
        $this->content = $caseStudy->content;
        $this->status = $caseStudy->status;
        $this->meta_title = $caseStudy->meta_title;
        $this->meta_description = $caseStudy->meta_description;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'slug' => 'required|max:200|unique:case_studies,tenant_id',
            'content' => 'nullable',
            // 'publish_date' => 'required|date_format:Y-m-d',
            'image' => 'required|mimes:jpeg,jpg,png,gif,webp|max:5000'
        ];
    }

    public function store()
    {
        $this->validate();

        try{ 
            $case_study = new CaseStudy();
            $case_study->name = $this->uniqueTitle();
            $case_study->slug = $this->uniqueSlug();
            $case_study->content = $this->content;
            $case_study->status = $this->status;
            $case_study->publish_date = Carbon::now();
            // $case_study->publish_date = $this->publish_date;
            $case_study->tenant_id = currentTenantId();
            $case_study->meta_title = $this->meta_title;
            $case_study->meta_description = $this->meta_description;
            $case_study->save();

            //check if image exists for case study
            if($this->image)
            {
                $case_study->addMedia($this->image)->toMediaCollection('case-studies');
            }
        } catch (Exception $e) {
            // $this->handleException($e, 'An unexpected error occurred');
        }
    }

    public function update()
    {
        $this->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:5000'
        ]);

        try{
            CaseStudy::find($this->caseStudy->id)->update([
                'name' => $this->uniqueTitle(),
                'slug' => $this->uniqueSlug(),
                'content' => $this->content,
                'status' => $this->status,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
            ]);

            //check if image exists for case study
            if($this->image)
            {
                $this->caseStudy->addMedia($this->image)->toMediaCollection('case-studies');
            }
        } catch (Exception $e) {
            $this->handleException($e, 'An unexpected error occurred');
        }
    }

    public function tempPreview()
    {
        return $this->previewArr = [
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description
        ];
    }

    protected function uniqueTitle()
    {
        //check if title is already added within same tenant

        return createUniqueTitle($this->name, CaseStudy::class, $this->caseStudy->id ?? null);
    }

    protected function uniqueSlug()
    {
        //check if slug is already added within same tenant
        return createUniqueSlug($this->name, $this->slug, CaseStudy::class, $this->caseStudy->id ?? null);
    }
}
