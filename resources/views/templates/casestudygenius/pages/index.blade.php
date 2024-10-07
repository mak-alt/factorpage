@extends('templates.casestudygenius.layout.app')
@section('content')
<!-- ====== Hero Section Start -->
<div class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
      <div class="-mx-4 flex flex-wrap items-center">
        <div class="w-full px-4">
          <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s"> 
            @if(getTemplateOption('show_banner_title') == 1)
            <h1 id="banner-title" class="mb-6 text-4xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-[1.2]">
              {{ getTemplateOption('banner_title_text') }}
            </h1>
            @endif
            @if(getTemplateOption('show_banner_subtitle') == 1)
            <p id="banner-subtitle" class="mx-auto mb-9 max-w-[600px] text-base font-medium text-white sm:text-lg sm:leading-[1.44]">
              {{ getTemplateOption('banner_subtitle_text') }}
            </p>
            @endif
            @if(getTemplateOption('show_banner_cta') == 1)
            <ul
              class="mb-10 flex flex-wrap items-center justify-center gap-5"
            >
              <li>
                <a
                  id="banner-cta"
                  href="{{ getTemplateOption('banner_cta_link') }}"
                  target="{{ getTemplateOption('banner_cta_link_target') }}"
                  class="inline-flex items-center justify-center rounded-md bg-linear-gradient px-7 py-[14px] text-center text-base font-medium text-white shadow-1 transition duration-300 ease-in-out hover:bg-gray hover:text-white"
                >
                {{ getTemplateOption('banner_cta_text') }}
                </a>
              </li>
            </ul>
            @endif
            <div>
            </div>
          </div>
        </div>

        <div class="w-full px-4">
          <div
            class="wow fadeInUp relative z-10 mx-auto max-w-[925px] h-full"
            data-wow-delay=".25s"
          >
            <div class="mt-16">
              <img
                src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/hero/hero.svg') }}"
                alt="hero"
                class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ====== Hero Section End -->
  
  <!-- ====== Case Studies Section Start -->
  <section class="pb-8 pt-20 lg:pb-[70px] lg:pt-[120px] dark:bg-dark">
    <div class="container mx-auto">
      <div class="flex flex-wrap justify-center">
        <div class="w-full px-4">
          <div class="mx-auto mb-[60px] max-w-[485px] text-center">
            <span class="mb-2 block text-lg font-semibold text-white text-bg-gradient4">
              <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.72801 5.05899C5.85579 4.71367 6.34421 4.71367 6.47199 5.05899L7.7508 8.51488C7.79096 8.62344 7.87656 8.70904 7.98512 8.7492L11.441 10.028C11.7863 10.1558 11.7863 10.6442 11.441 10.772L7.98512 12.0508C7.87656 12.091 7.79096 12.1766 7.7508 12.2851L6.47199 15.741C6.34421 16.0863 5.85579 16.0863 5.72801 15.741L4.44921 12.2851C4.40904 12.1766 4.32344 12.091 4.21487 12.0508L0.75899 10.772C0.41367 10.6442 0.41367 10.1558 0.75899 10.028L4.21487 8.7492C4.32344 8.70904 4.40904 8.62344 4.44921 8.51488L5.72801 5.05899Z" fill="url(#paint0_linear_484_5398)"/>
                <path d="M5.72801 5.05899C5.85579 4.71367 6.34421 4.71367 6.47199 5.05899L7.7508 8.51488C7.79096 8.62344 7.87656 8.70904 7.98512 8.7492L11.441 10.028C11.7863 10.1558 11.7863 10.6442 11.441 10.772L7.98512 12.0508C7.87656 12.091 7.79096 12.1766 7.7508 12.2851L6.47199 15.741C6.34421 16.0863 5.85579 16.0863 5.72801 15.741L4.44921 12.2851C4.40904 12.1766 4.32344 12.091 4.21487 12.0508L0.75899 10.772C0.41367 10.6442 0.41367 10.1558 0.75899 10.028L4.21487 8.7492C4.32344 8.70904 4.40904 8.62344 4.44921 8.51488L5.72801 5.05899Z" fill="white" fill-opacity="0.4"/>
                <path d="M9.73216 0.256128C9.85848 -0.085376 10.3415 -0.085376 10.4678 0.256128L10.885 1.38329C10.9247 1.49066 11.0094 1.5753 11.1167 1.61504L12.2438 2.03212C12.5854 2.15849 12.5854 2.64151 12.2438 2.76788L11.1167 3.18496C11.0094 3.2247 10.9247 3.30934 10.885 3.41671L10.4678 4.54387C10.3415 4.88538 9.85848 4.88538 9.73216 4.54387L9.31504 3.41671C9.27528 3.30934 9.19064 3.2247 9.08328 3.18496L7.95616 2.76788C7.61464 2.64151 7.61464 2.15849 7.95616 2.03212L9.08328 1.61504C9.19064 1.5753 9.27528 1.49066 9.31504 1.38329L9.73216 0.256128Z" fill="url(#paint1_linear_484_5398)"/>
                <path d="M9.73216 0.256128C9.85848 -0.085376 10.3415 -0.085376 10.4678 0.256128L10.885 1.38329C10.9247 1.49066 11.0094 1.5753 11.1167 1.61504L12.2438 2.03212C12.5854 2.15849 12.5854 2.64151 12.2438 2.76788L11.1167 3.18496C11.0094 3.2247 10.9247 3.30934 10.885 3.41671L10.4678 4.54387C10.3415 4.88538 9.85848 4.88538 9.73216 4.54387L9.31504 3.41671C9.27528 3.30934 9.19064 3.2247 9.08328 3.18496L7.95616 2.76788C7.61464 2.64151 7.61464 2.15849 7.95616 2.03212L9.08328 1.61504C9.19064 1.5753 9.27528 1.49066 9.31504 1.38329L9.73216 0.256128Z" fill="white" fill-opacity="0.4"/>
                <path d="M14.6547 5.77075C14.739 5.54308 15.061 5.54308 15.1453 5.77075L15.4233 6.52216C15.4498 6.59376 15.5062 6.65024 15.5778 6.67672L16.3293 6.95472C16.5569 7.03896 16.5569 7.36104 16.3293 7.44528L15.5778 7.72328C15.5062 7.74976 15.4498 7.80624 15.4233 7.87784L15.1453 8.62928C15.061 8.85688 14.739 8.85688 14.6547 8.62928L14.3767 7.87784C14.3502 7.80624 14.2938 7.74976 14.2222 7.72328L13.4707 7.44528C13.2431 7.36104 13.2431 7.03896 13.4707 6.95472L14.2222 6.67672C14.2938 6.65024 14.3502 6.59376 14.3767 6.52216L14.6547 5.77075Z" fill="url(#paint2_linear_484_5398)"/>
                <path d="M14.6547 5.77075C14.739 5.54308 15.061 5.54308 15.1453 5.77075L15.4233 6.52216C15.4498 6.59376 15.5062 6.65024 15.5778 6.67672L16.3293 6.95472C16.5569 7.03896 16.5569 7.36104 16.3293 7.44528L15.5778 7.72328C15.5062 7.74976 15.4498 7.80624 15.4233 7.87784L15.1453 8.62928C15.061 8.85688 14.739 8.85688 14.6547 8.62928L14.3767 7.87784C14.3502 7.80624 14.2938 7.74976 14.2222 7.72328L13.4707 7.44528C13.2431 7.36104 13.2431 7.03896 13.4707 6.95472L14.2222 6.67672C14.2938 6.65024 14.3502 6.59376 14.3767 6.52216L14.6547 5.77075Z" fill="white" fill-opacity="0.4"/>
                <defs>
                <linearGradient id="paint0_linear_484_5398" x1="0.5" y1="0" x2="16.5002" y2="0.000206102" gradientUnits="userSpaceOnUse">
                <stop offset="0.0001" stop-color="#E59CFF"/>
                <stop offset="0.5001" stop-color="#BA9CFF"/>
                <stop offset="1" stop-color="#9CB2FF"/>
                </linearGradient>
                <linearGradient id="paint1_linear_484_5398" x1="0.5" y1="0" x2="16.5002" y2="0.000206102" gradientUnits="userSpaceOnUse">
                <stop offset="0.0001" stop-color="#E59CFF"/>
                <stop offset="0.5001" stop-color="#BA9CFF"/>
                <stop offset="1" stop-color="#9CB2FF"/>
                </linearGradient>
                <linearGradient id="paint2_linear_484_5398" x1="0.5" y1="0" x2="16.5002" y2="0.000206102" gradientUnits="userSpaceOnUse">
                <stop offset="0.0001" stop-color="#E59CFF"/>
                <stop offset="0.5001" stop-color="#BA9CFF"/>
                <stop offset="1" stop-color="#9CB2FF"/>
                </linearGradient>
                </defs>
                </svg> Resources for SaaS finance leaders
            </span>
            <h2
              class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
            >
              {{ getTemplateOption('case_study_section_title') }}
            </h2>
            <p class="text-base text-body-color dark:text-dark-6">
              {{ getTemplateOption('case_study_section_subtitle') }}
            </p>
          </div>
        </div>
      </div>
      {!! renderBladeFromDB($caseStudies, $caseStudyTemplate->code) !!}
    </div>
  </section>
  <!-- ====== Case Studies Section End -->
@endsection
@section('script')
<script>
  // window.addEventListener('message', function(event) {
  //       if (event.origin === 'https://factorpage.test') {
  //           if (event.data.type === 'updateLogo') {
  //               document.getElementById('header-logo').src = event.data.data;
  //           }
  //           if (event.data.type === 'updateLogoWidth') {
  //               document.getElementById('header-logo').style.width = event.data.data;
  //           }
  //           if (event.data.type === 'updateBannerTitle') {
  //               document.getElementById('banner-title').innerText = event.data.data;
  //           }
  //           if (event.data.type === 'updateBannerSubTitle') {
  //               document.getElementById('banner-subtitle').innerText = event.data.data;
  //           }
  //           if (event.data.type === 'updateBannerCTAText') {
  //               document.getElementById('banner-cta').innerText = event.data.data;
  //           }
  //           if (event.data.type === 'updateBannerCTALink') {
  //               document.getElementById('banner-cta').setAttribute('href', event.data.data);
  //           }
  //           if (event.data.type === 'updateBannerCTATarget') {
  //               document.getElementById('banner-cta').setAttribute('target', event.data.data);
  //           }

  //           if (event.data.type === 'updateupdateMenuItems') {
  //             console.log(event.data.data);
  //               // document.getElementById('banner-cta').setAttribute('target', event.data.data);
  //           }
  //       }
  //   });
</script>
@endsection