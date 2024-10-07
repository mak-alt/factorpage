@extends('templates.casestudycraft.layout.app')
@section('banner')
<div class="h-[500px] md:h-[640px] lg:h-[880px] bg-primary relative z-10">
    <div class="swiper h-full w-full">
      <div class="swiper-wrapper vv-hero-swiper-wrapper">
        <div class="swiper-slide group">
            <div class="relative isolate h-full w-full bg-primary">
              <div class="container h-full">
                <div class="grid h-full grid-cols-12 gap-y-10 md:gap-x-6 lg:gap-x-[30px]">

                  <div class="col-span-full md:col-span-8 md:col-start-3 lg:col-span-10 lg:col-start-2">
                    <div class="px-6 pt-28 text-center md:pt-36 lg:px-0 lg:pt-44">
                        @if(getTemplateOption('show_banner_title') == 1)
                        <h2 class="mb-4 text-2xl font-bold leading-none tracking-tighter sm:text-2.5xl md:mb-6 md:text-3xl md:leading-none lg:mb-12 lg:text-5.5xl lg:leading-none">
                            <a 
                                id="banner-title"
                                href="javascript:;" 
                                class="hover:opacity-80 transition-opacity duration-300">
                                {{ getTemplateOption('banner_title_text') }}
                            </a>
                        </h2>
                        @endif
                        @if(getTemplateOption('show_banner_subtitle') == 1)
                        <div
                            id="banner-subtitle" 
                            class="mx-auto mb-8 max-w-xl text-sm tracking-tighter text-white lg:mb-12 lg:text-lg lg:leading-8">
                            {{ getTemplateOption('banner_subtitle_text') }}
                        </div>
                        @endif
                        @if(getTemplateOption('show_banner_cta') == 1)
                        <a 
                            id="banner-cta"
                            href="{{ getTemplateOption('banner_cta_link') }}"
                            target="{{ getTemplateOption('banner_cta_link_target') }}" 
                            class="relative isolate inline-flex overflow-hidden border-2 bg-transparent py-3 px-4 text-center text-xs font-bold leading-none transition-colors before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-right before:scale-x-0 before:transition-transform before:duration-300 hover:before:origin-left hover:before:scale-x-100 lg:py-[14px] lg:px-12 lg:text-sm py-3 px-4 lg:py-[14px] lg:px-12 bg-transparent border-2 border-white before:bg-white text-white lg:text-white hover:text-primary">
                            {{ getTemplateOption('banner_cta_text') }}
                        </a>
                        @endif
                    </div>
                  </div>

                </div>
              </div>

              <div class="absolute inset-0 -z-10 bg-[url('assets/img/samples/hero-img-1.jpg')] bg-cover bg-center bg-no-repeat ease-out transition-transform duration-[8000ms] group-[.swiper-slide-active]:scale-110"></div>

              <div class="absolute inset-0 -z-10 bg-gray-900/80"></div>
            </div>
          </div>
      </div>
    </div>
    <div class="vv-hero-swiper-pagination js-vv-hero-swiper-pagination vv-pagination-circle-bullets absolute right-4 lg:right-10 top-1/2 !left-auto -translate-y-[calc(50%+40px)] !bottom-auto z-20 flex !w-4 lg:-translate-y-[calc(50%+70px)] flex-col gap-[10px]"></div>
  </div>
@endsection

@section('content')
<main id="main-content" class="grow lg:pt-0">
    <!-- Section of first case studies Slider -->
    <section class="py-8 md:py-14 lg:py-16 xl:py-[75px]">
        <div class="container">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-y-6 sm:mb-12 sm:flex-row md:mb-16 lg:mb-10 xl:mb-10 xl:gap-y-12">
                <div class="flex flex-col-reverse gap-y-2 sm:gap-y-3 md:gap-y-4 lg:gap-y-5 xl:gap-y-6">
                <h3 class="leadin-none text-2xl font-bold tracking-tight text-primary dark:text-white sm:text-3xl md:text-3xl lg:text-4xl xl:text-5xl xl:leading-none">{{ getTemplateOption('case_study_section_title') }}</h3>
                <div class="text-sm uppercase leading-tighter md:text-base">{{ getTemplateOption('case_study_section_subtitle') }}</div>
                </div>

                <div class="flex">
                <div class="js-vv-videos-swiper-btn-next flex h-[36px] w-[30px] items-center justify-center bg-dark text-primary hover:cursor-pointer hover:text-accent dark:bg-gray-900 dark:text-white dark:hover:text-accent md:h-[60px] md:w-[50px]">
                    <svg class="h-4 w-4 fill="currentColor">
                    <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#chevron-left"></use>
                    </svg>
                </div>
                <div class="js-vv-videos-swiper-btn-next flex h-[36px] w-[30px] items-center justify-center bg-dark text-primary hover:cursor-pointer hover:text-accent dark:bg-gray-900 dark:text-white dark:hover:text-accent md:h-[60px] md:w-[50px]">
                    <svg class="h-4 w-4" fill="currentColor">
                    <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#chevron-right"></use>
                    </svg>
                </div>
                </div>
            </div>
            {!! renderBladeFromDB($caseStudies, $caseStudyTemplate->code) !!}
        </div>
    </section>
</main>
@endsection