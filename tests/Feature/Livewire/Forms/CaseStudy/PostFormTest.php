<?php

// tests/Feature/Livewire/Forms/CaseStudy/PostFormTest.php

namespace Tests\Feature\Livewire\Forms\CaseStudy;

use App\Models\CaseStudy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_case_study()
    {
        Storage::fake('public');
        
        $file = UploadedFile::fake()->image('case-study-image.jpg');

        Livewire::test('forms.case-study.post-form')
            ->set('name', 'Test Case Study')
            ->set('slug', 'test-case-study')
            ->set('content', 'This is a test content')
            ->set('status', 'active')
            ->set('meta_title', 'Test Meta Title')
            ->set('meta_description', 'Test Meta Description')
            ->set('image', $file)
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('case_studies', [
            'name' => 'Test Case Study',
            'slug' => 'test-case-study',
            'content' => 'This is a test content',
            'status' => 'active',
            'meta_title' => 'Test Meta Title',
            'meta_description' => 'Test Meta Description',
        ]);

        $caseStudy = CaseStudy::where('slug', 'test-case-study')->first();
        
        $this->assertNotNull($caseStudy);
        Storage::disk('public')->assertExists($caseStudy->getFirstMediaPath('case-studies'));
    }

    /** @test */
    public function it_can_update_a_case_study()
    {
        $caseStudy = CaseStudy::factory()->create();

        Livewire::test('forms.case-study.post-form')
            ->call('setPost', $caseStudy)
            ->set('name', 'Updated Case Study')
            ->set('slug', 'updated-case-study')
            ->set('content', 'Updated content')
            ->set('status', 'inactive')
            ->set('meta_title', 'Updated Meta Title')
            ->set('meta_description', 'Updated Meta Description')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('case_studies', [
            'id' => $caseStudy->id,
            'name' => 'Updated Case Study',
            'slug' => 'updated-case-study',
            'content' => 'Updated content',
            'status' => 'inactive',
            'meta_title' => 'Updated Meta Title',
            'meta_description' => 'Updated Meta Description',
        ]);
    }

    /** @test */
    public function it_can_preview_case_study_data()
    {
        Livewire::test('forms.case-study.post-form')
            ->set('name', 'Preview Case Study')
            ->set('slug', 'preview-case-study')
            ->set('content', 'Preview content')
            ->set('meta_title', 'Preview Meta Title')
            ->set('meta_description', 'Preview Meta Description')
            ->call('tempPreview')
            ->assertSeeInOrder([
                'Preview Case Study',
                'preview-case-study',
                'Preview content',
                'Preview Meta Title',
                'Preview Meta Description'
            ]);
    }
}
