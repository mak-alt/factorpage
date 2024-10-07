<!DOCTYPE html>
<html lang="us" class="h-full overflow-x-hidden">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>{{ getTemplateOption('title') }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ getTemplateOption('meta_description') }}">

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/favicon/'.getTemplateOption('favicon').'') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/favicon/'.getTemplateOption('favicon').'') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/favicon/'.getTemplateOption('favicon').'') }}">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

  <!-- Google Web Fonts
  ================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS
  ================================================== -->
  <!-- Vendor CSS-->
  <link href="{{ global_asset('templates/casestudycraft/assets/vendors/common/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ global_asset('templates/casestudycraft/assets/vendors/common/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template CSS-->
  <link href="{{ global_asset('templates/casestudycraft/assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="antialiased tracking-tight font-base text-gray-500 text-base h-full bg-white dark:bg-gray-900 overflow-x-hidden">

  <div id="site-wrapper" class="flex flex-col h-full js-site-wrapper">
    <div class="header-wrapper bg-accent text-white relative z-30">
      <header id="site-header" class="text-white absolute inset-x-0 z-20">
        <div class="container">
          <nav class="flex min-h-[64px] items-center justify-between py-1 lg:min-h-[90px] lg:py-4" id="navbarCollapse">
            <!-- Logo -->
            <div>
              <a href="{{ url('') }}">
                <img
                    src="{{ getExistingLogo() }}"
                    alt="logo"
                    class="header-logo"
                    id="header-logo"
                    style="width: {{ getTemplateOption('logo_width') }}%"
                />
              </a>
            </div>
            <!-- Logo / End -->
            <!-- Navigation (Desktop) -->
            <ul class="hidden gap-x-7 xl:gap-x-10 text-sm font-bold lg:flex">
                @foreach($menuItems as $menuItem)
                <li class="">
                    <a 
                        href="{{ $menuItem['link'] }}"
                        target="{{ $menuItem['target'] }}" 
                        class="relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100">
                        {{ $menuItem['name'] }}
                    </a>
                </li>
                @endforeach
            </ul>
            <!-- Navigation (Desktop) / End -->
            <!-- Header Controls -->
            <button class="js-menu-toggle -mr-2 inline-flex py-4 px-2 sm:px-3 lg:hidden xl:px-4">
              <svg role="img" class="js-menu-toggle-icon-open h-6 w-6 fill-white">
                <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#menu"></use>
              </svg>
              <svg role="img" class="js-menu-toggle-icon-close hidden h-6 w-6 fill-white">
                <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#menu-close"></use>
              </svg>
            </button>

            <!-- when You Need the need the switcher hide the elements of style on both first and second div -->
            <div class="flex" style="display:none">
              <div class="flex items-center py-4 px-1 sm:px-2" style="display:none">
                <label for="theme-toggle" class="relative inline-flex cursor-pointer items-center">
                  <input type="checkbox" value="" id="theme-toggle" class="peer sr-only">
                  <span class="relative z-10 block h-6 w-11 rounded-full border-2 border-white after:absolute after:top-0.5 after:left-0.5 after:h-4 after:w-4 after:rounded-full after:bg-white after:transition-transform peer-checked:after:translate-x-[20px]"></span>
                  <svg role="img" class="pointer-events-none absolute left-[5px] top-1 h-4 w-4 stroke-white">
                    <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#sun"></use>
                  </svg>
                  <svg role="img" class="pointer-events-none absolute right-[5px] top-1 h-4 w-4 stroke-white">
                    <use xlink:href="{{ global_asset('templates/casestudycraft/assets/img/sprite.svg') }}#moon"></use>
                  </svg>
                </label>
              </div>

            <!-- when You Need the need the CTA Button Uncomment this div -->

              <!-- <a href="#" class="relative isolate inline-flex overflow-hidden border-2 bg-transparent py-2 px-2 text-center text-xs font-bold leading-none transition-colors before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-right before:scale-x-0 before:transition-transform before:duration-300 hover:before:origin-left hover:before:scale-x-100 lg:py-[14px] lg:px-7 lg:text-sm py-1 px-2 lg:py-[8px] lg:px-7 rounded-full bg-transparent border-2 border-white before:bg-white text-white lg:text-white hover:text-primary sm-none">
                Register / Login
              </a> -->
            </div>
            <!-- Header Controls / End -->

          </nav>
        </div>
      </header>

      @yield('banner')
    </div>

    <!-- Mobile Menu -->
    <div class="js-mobile-menu p-t-[64px] fixed left-0 top-[64px] z-50 block h-[calc(100dvh-64px)] w-full translate-x-full overflow-auto bg-white dark:bg-gray-800 py-5 text-primary dark:text-white transition-transform duration-300 lg:hidden">
      <div class="container">
        <!-- Navigation (Mobile) -->
        <ul class="text-md flex flex-col font-bold">
            @foreach($menuItems as $menuItem)
            <li class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                <a 
                    class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent" 
                    href="{{ $menuItem['link'] }}"
                    target="{{ $menuItem['target'] }}"
                >
                    {{ $menuItem['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
        <!-- Navigation (Mobile) / End -->
      </div>
    </div>

    <!-- Mobile Menu / End -->

    @yield('content')

  </div>

  <!-- Scripts
================================================== -->
  <!-- Vendors JS -->
  <script src="{{ global_asset('templates/casestudycraft/assets/vendors/common/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ global_asset('templates/casestudycraft/assets/vendors/common/swiper/js/swiper-bundle.min.js') }}"></script>

  <!-- Template JS -->
  <script src="{{ global_asset('templates/casestudycraft/assets/js/common.js') }}"></script>
  <script src="{{ global_asset('templates/casestudycraft/assets/js/init.js') }}"></script>

</body>
</html>