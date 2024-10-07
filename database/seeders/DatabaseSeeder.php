<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CaseStudyTemplate;
use App\Models\Plan;
use App\Models\Template;
use App\Models\TemplateDefaultOption;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $plans = [
        [
            'name' => 'Free',
            'badge' => 'free.webp',
            'price' => 0,
            'stripe_product_id' => '',
            'stripe_price_id' => '',
            'type' => 'monthly',
            'features' => [
                [
                    'text' => 'Unlimited text & video testimonials',
                    'status' => true  
                ],
                [
                    'text' => 'Priority support',
                    'status' => false  
                ],
                [
                    'text' => 'Exclusive widgets',
                    'status' => false  
                ],

            ],
            'is_featured' => 0,
        ],
        [
            'name' => 'Free',
            'badge' => 'free.webp',
            'price' => 0,
            'stripe_product_id' => '',
            'stripe_price_id' => '',
            'type' => 'annually',
            'features' => [
                [
                    'text' => 'Unlimited text & video testimonials',
                    'status' => true  
                ],
                [
                    'text' => 'Priority support',
                    'status' => false  
                ],
                [
                    'text' => 'Exclusive widgets',
                    'status' => false  
                ],

            ],
            'is_featured' => 0,
            ],
            [
                'name' => 'Featured',
                'badge' => 'featured.webp',
                'price' => 19,
                'stripe_product_id' => 'prod_PL76AFkGf5zXrz',
                'stripe_price_id' => 'price_1OWQs6EPaUI7yfwPKuUvH0wN',
                'type' => 'monthly',
                'features' => [
                    [
                        'text' => 'Unlimited text & video testimonials',
                        'status' => true  
                    ],
                    [
                        'text' => 'Priority support',
                        'status' => true  
                    ],
                    [
                        'text' => 'Exclusive widgets',
                        'status' => true  
                    ],

                ],
                'is_featured' => 1,
            ],
            [
                'name' => 'Featured',
                'badge' => 'featured.webp',
                'price' => 16,
                'stripe_product_id' => 'prod_PL76AFkGf5zXrz',
                'stripe_price_id' => 'price_1OXVc6EPaUI7yfwPKUxD0T68',
                'type' => 'annually',
                'features' => [
                    [
                        'text' => 'Unlimited text & video testimonials',
                        'status' => true  
                    ],
                    [
                        'text' => 'Priority support',
                        'status' => true  
                    ],
                    [
                        'text' => 'Exclusive widgets',
                        'status' => true  
                    ],

                ],
                'is_featured' => 1,
            ],
            [
                'name' => 'Pro',
                'badge' => 'pro.webp',
                'price' => 39,
                'stripe_product_id' => 'prod_PME9eZ3NujBcyL',
                'stripe_price_id' => 'price_1OXVgqEPaUI7yfwPT4uy8J7G',
                'type' => 'monthly',
                'features' => [
                    [
                        'text' => 'Unlimited text & video testimonials',
                        'status' => true  
                    ],
                    [
                        'text' => 'Priority support',
                        'status' => true  
                    ],
                    [
                        'text' => 'Exclusive widgets',
                        'status' => true  
                    ],

                ],
                'is_featured' => 0,
            ],
            [
                'name' => 'Pro',
                'badge' => 'pro.webp',
                'price' => 33,
                'stripe_product_id' => 'prod_PME9eZ3NujBcyL',
                'stripe_price_id' => 'price_1OXVieEPaUI7yfwPeKrx5efF',
                'type' => 'annually',
                'features' => [
                    [
                        'text' => 'Unlimited text & video testimonials',
                        'status' => true  
                    ],
                    [
                        'text' => 'Priority support',
                        'status' => true  
                    ],
                    [
                        'text' => 'Exclusive widgets',
                        'status' => true  
                    ],

                ],
                'is_featured' => 0,
            ]
        ];

        foreach($plans as $plan){
            Plan::create($plan);
        }


        //template 1
        $template = Template::create([
            'name' => 'CaseStudyGenius',
            'img' => 'casestudygenius.jpg',
            'preview_url' => 'http://factorpage.test/templates/casestudygenius',
        ]);

        $defaultOptions = [
            ['key' => 'logo', 'value' => 'logo.png', 'template_id' => $template->id],
            ['key' => 'logo_width', 'value' => '100', 'template_id' => $template->id],
            ['key' => 'show_logo', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'favicon', 'value' => 'favicon.png', 'template_id' => $template->id],
            ['key' => 'title', 'value' => 'CaseStudyGenius', 'template_id' => $template->id],
            ['key' => 'meta_title', 'value' => 'CaseStudyGenius', 'template_id' => $template->id],
            ['key' => 'meta_description', 'value' => 'starter template of factorpage', 'template_id' => $template->id],
            ['key' => 'primary_color', 'value' => '#000', 'template_id' => $template->id],
            ['key' => 'secondary_color', 'value' => '#fff', 'template_id' => $template->id],
            ['key' => 'selected_case_study_template', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'selected_case_study_ids', 'value' => '1,2,3', 'template_id' => $template->id],
            ['key' => 'menu_ids', 'value' => '1,2,3', 'template_id' => $template->id],
            ['key' => 'show_banner_title', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_banner_subtitle', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_banner_cta', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'banner_title_text', 'value' => 'Elevate Your Content with Our Case Study Genius Template', 'template_id' => $template->id],
            ['key' => 'banner_subtitle_text', 'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting indus ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'template_id' => $template->id],
            ['key' => 'banner_cta_text', 'value' => 'Get Started', 'template_id' => $template->id],
            ['key' => 'banner_cta_link', 'value' => 'https://factorpage.com', 'template_id' => $template->id],
            ['key' => 'banner_cta_link_target', 'value' => '_blank', 'template_id' => $template->id],
            ['key' => 'banner_background_image', 'value' => 'bg.jpg', 'template_id' => $template->id],
            ['key' => 'show_case_study_heading', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_case_study_content', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'case_study_section_title', 'value' => 'Case Studies', 'template_id' => $template->id],
            ['key' => 'case_study_section_subtitle', 'value' => 'View My Case Studies', 'template_id' => $template->id],
        ];
        
        TemplateDefaultOption::insert($defaultOptions);

        //template 2
        $template = Template::create([
            'name' => 'CaseStudyCraft',
            'img' => 'casestudycraft.jpg',
            'preview_url' => 'http://factorpage.test/templates/casestudycraft',
        ]);

        $defaultOptions = [
            ['key' => 'logo', 'value' => 'logo.png', 'template_id' => $template->id],
            ['key' => 'logo_width', 'value' => '100', 'template_id' => $template->id],
            ['key' => 'show_logo', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'favicon', 'value' => 'favicon.png', 'template_id' => $template->id],
            ['key' => 'title', 'value' => 'CaseStudyCraft', 'template_id' => $template->id],
            ['key' => 'meta_title', 'value' => 'CaseStudyCraft', 'template_id' => $template->id],
            ['key' => 'meta_description', 'value' => 'starter template of factorpage', 'template_id' => $template->id],
            ['key' => 'primary_color', 'value' => '#000', 'template_id' => $template->id],
            ['key' => 'secondary_color', 'value' => '#fff', 'template_id' => $template->id],
            ['key' => 'selected_case_study_template', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'selected_case_study_ids', 'value' => '1,2,3', 'template_id' => $template->id],
            ['key' => 'menu_ids', 'value' => '1,2,3', 'template_id' => $template->id],
            ['key' => 'show_banner_title', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_banner_subtitle', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_banner_cta', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'banner_title_text', 'value' => 'Elevate Your Content with Our Case Study Craft Template', 'template_id' => $template->id],
            ['key' => 'banner_subtitle_text', 'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting indus ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'template_id' => $template->id],
            ['key' => 'banner_cta_text', 'value' => 'Get Started', 'template_id' => $template->id],
            ['key' => 'banner_cta_link', 'value' => 'https://factorpage.com', 'template_id' => $template->id],
            ['key' => 'banner_cta_link_target', 'value' => '_blank', 'template_id' => $template->id],
            ['key' => 'banner_background_image', 'value' => 'bg.jpg', 'template_id' => $template->id],
            ['key' => 'show_case_study_heading', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'show_case_study_content', 'value' => '1', 'template_id' => $template->id],
            ['key' => 'case_study_section_title', 'value' => 'Case Studies', 'template_id' => $template->id],
            ['key' => 'case_study_section_subtitle', 'value' => 'View My Case Studies', 'template_id' => $template->id],
        ];

        TemplateDefaultOption::insert($defaultOptions);

        //insert case study templates
        CaseStudyTemplate::create([
            'name' => 'Template 1',
            'img' => 'template-1.png',
            'code' => '<div class="swiper case-studies-carousel mx-10 flex flex-wrap">
            <div class="swiper-wrapper">
            @foreach($caseStudies as $caseStudy)
            <div class="swiper-slide">  
                <div class="shadow-2 w-full md:w-1/12 lg:w-1/12 py-case px-4">
                <div class="wow fadeInUp group mb-10" data-wow-delay=".15s">
                  <div class="mb-8 overflow-hidden rounded-[5px]">
                    <a href="{{ route("case-study.detail", $caseStudy->slug) }}" class="block">
                      <img
                        src="{{ $caseStudy->photo }}"
                        alt="image"
                        class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                      />
                    </a>
                  </div>
                  <div>
                    <h3>
                      <a
                        href="{{ $caseStudy->photo }}"
                        class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary dark:text-white dark:hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl"
                      >
                        {{ $caseStudy->name }}
                      </a>
                    </h3>
                    <p
                      class="max-w-[370px] text-base text-body-color dark:text-dark-6 mb-6"
                    >
                      {{ $caseStudy->short_description }}
                    </p>
                  </div>
                
                </div>
                </div>
            </div>
            @endforeach
            </div></div>'
        ]);

        CaseStudyTemplate::create([
            'name' => 'Template 2',
            'img' => 'template-2.png',
            'code' => '<div class="swiper js-vv-videos-swiper md:w-[1106px] lg:w-[1278px] xl:w-[1970px]">
            <div class="swiper-wrapper">
            @foreach($caseStudies as $caseStudy)
            <div class="swiper-slide">
              <div>
                <figure class="mb-6">
                  <a class="glightbox group relative block h-full overflow-hidden bg-gray-900" href="{{ route("case-study.detail", $caseStudy->slug) }}">
                    <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75" src="{{ $caseStudy->photo }}" alt="{{ $caseStudy->name }}">
          
                  </a>
                </figure>
                <div>
                  <a href="{{ route("case-study.detail", $caseStudy->slug) }}">
                    <h3 class="mb-3 font-bold leading-tight text-dark dark:text-white lg:text-lg lg:leading-6">{{ $caseStudy->name }}</h3>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div>'
        ]);
    }
}
