<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ getTemplateOption('title') }} </title>
    <link rel="shortcut icon" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/'.getTemplateOption('favicon').'') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/quill.css') }}" />
    <!-- ==== WOW JS ==== -->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
    @yield('script')
  </head>

  <body>
    <!-- ====== Navbar Section Start -->
    <div class="ud-header absolute left-0 top-0 z-40 flex w-full items-center bg-transparent">
      <div class="container">
        <div class="relative -mx-4 flex items-center justify-between">
          <div class="w-60 max-w-full px-4">
            <a href="{{ url('/') }}" class="navbar-logo block w-full py-5">
              <img
                src="{{ getExistingLogo() }}"
                alt="logo"
                class="header-logo"
                id="header-logo"
                style="width: {{ getTemplateOption('logo_width') }}%"
              />
            </a>
          </div>
          <div class="flex w-full items-center justify-between px-4">
            <div>
              <button
                id="navbarToggler"
                class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
              >
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
              </button>
              <nav
                id="navbarCollapse"
                class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark-2 lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:px-4 lg:py-0 lg:shadow-none dark:lg:bg-transparent xl:px-6"
              >
                <ul class="blcok lg:flex 2xl:ml-20">
                  @foreach($menuItems as $menuItem)
                  <li class="group relative">
                    <a
                      href="{{ $menuItem['link'] }}"
                      target="{{ $menuItem['target'] }}"
                      class="ud-menu-scroll mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary dark:text-white lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 {{ request()->is('case-study/*') ? 'lg:text-dark lg:group-hover:text-dark' : 'lg:text-white lg:group-hover:text-white' }}  lg:group-hover:opacity-70"
                    >
                      {{ $menuItem['name'] }}
                    </a>
                  </li>
                  @endforeach
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ====== Navbar Section End -->

    @yield('content')

    <!-- ====== Back To Top Start -->
    <a
      href="javascript:void(0)"
      class="back-to-top fixed bottom-8 left-auto right-8 z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark"
    >
      <span
        class="mt-[6px] h-3 w-3 rotate-45 border-l border-t border-white"
      ></span>
    </a>
    <!-- ====== Back To Top End -->


    <!-- ====== All Scripts -->

    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/main.js') }}"></script>
  </body>
</html>
