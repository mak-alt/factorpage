<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\CaseStudy;
use App\Events\TenantRegistered;
use App\Models\TenantTemplatePreference;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDefaultCaseStudyListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TenantRegistered $event): void
    {
        $caseStudy = CaseStudy::create([
            'name' => 'Restoring Heritage Roofs: A Success Story',
            'slug' => 'restoring-heritage-roofs-success-story',
            'content' => '<div class="ql-editor">
            <h2 class="ql-align-left">Restoring Heritage Roofs: A Success Story</h2>
        
            <h3 class="ql-align-left">Client Overview</h3>
            <p class="ql-align-left">Heritage Restorations Inc. is a renowned company specializing in the preservation and restoration of historical buildings. With a rich legacy of conserving architectural heritage, they have worked on various significant projects, including churches, mansions, and public buildings.</p>
        
            <h3 class="ql-align-left">Challenge</h3>
            <p class="ql-align-left">One of the most challenging projects for Heritage Restorations Inc. was the restoration of the roof of the century-old St. Patricks Cathedral. The cathedrals roof had suffered extensive damage due to years of weather exposure, leading to leaks, structural weakening, and the loss of original roofing materials. The challenge was to restore the roof while maintaining its historical integrity and ensuring it met modern safety standards.</p>
        
            <h3 class="ql-align-left">Solution</h3>
            <p class="ql-align-left">To address this complex challenge, Heritage Restorations Inc. implemented a multi-phase restoration plan:</p>
            <ul class="ql-align-left">
                <li>
                    <strong>Assessment and Documentation:</strong> The team conducted a thorough assessment of the roofs condition, documenting every detail with high-resolution photographs and 3D scans. This data was crucial for planning the restoration process.
                </li>
                <li>
                    <strong>Material Sourcing:</strong> Authentic materials matching the original roof were sourced. This involved finding slate tiles, wooden beams, and metal fittings that were either reclaimed from other historical buildings or specially crafted to match the original specifications.
                </li>
                <li>
                    <strong>Structural Reinforcement:</strong> Modern engineering techniques were employed to reinforce the roofs structure. This included the installation of steel supports discreetly integrated to ensure the roof could withstand future weather conditions without compromising its historical appearance.
                </li>
                <li>
                    <strong>Skilled Craftsmanship:</strong> Skilled artisans with expertise in traditional roofing techniques were brought in. They carefully removed the damaged sections and replaced them with new materials, ensuring each piece was meticulously installed to replicate the original craftsmanship.
                </li>
                <li>
                    <strong>Weatherproofing:</strong> Advanced weatherproofing techniques were used to protect the roof while preserving its historical look. This included the application of modern sealants and protective coatings that were invisible to the naked eye.
                </li>
                <li>
                    <strong>Regular Maintenance Plan:</strong> A long-term maintenance plan was developed to ensure the roofs continued preservation. This included regular inspections, cleaning, and minor repairs to prevent future damage.
                </li>
            </ul>
        
            <h3 class="ql-align-left">Results</h3>
            <p class="ql-align-left">The restoration of St. Patricks cathedrals roof was a resounding success. The project was completed within the projected timeline and budget, with remarkable outcomes:</p>
            <ul class="ql-align-left">
                <li>
                    <strong>Historical Integrity Preserved:</strong> The roofs appearance was restored to its original glory, maintaining the cathedrals historical aesthetics and architectural significance.
                </li>
                <li>
                    <strong>Enhanced Durability:</strong> The structural reinforcements and modern weatherproofing techniques ensured the roof could withstand future environmental stresses.
                </li>
                <li>
                    <strong>Client Satisfaction:</strong> Heritage Restorations Inc. received accolades from both the cathedrals trustees and the local historical society for their meticulous work and dedication to preserving the buildings heritage.
                </li>
            </ul>
        
            <h3 class="ql-align-left">Conclusion</h3>
            <p class="ql-align-left">The restoration of St. Patricks cathedrals roof stands as a testament to Heritage Restorations Incs commitment to preserving architectural heritage. By combining traditional craftsmanship with modern technology, they successfully restored a vital piece of history, ensuring it remains an iconic landmark for future generations.</p>
            <p class="ql-align-left">Heritage Restorations Inc. continues to set the standard for historical preservation, demonstrating that with the right approach, even the most challenging restoration projects can be completed with precision and respect for the past.</p>
        </div>',
            'tenant_id' => $event->tenant->id,
            'publish_date' => Carbon::now()
        ]);

        // attach case study to tenant preferences
        TenantTemplatePreference::where('key','selected_case_study_ids')->whereTenantId($event->tenant->id)->update([
            'value' => $caseStudy->id
        ]);
    }
}
