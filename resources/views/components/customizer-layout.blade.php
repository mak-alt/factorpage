<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title)
            {{ $title }}
        @else
        {{ config('app.name') }}
        @endisset
    </title>

    @livewireStyles 

    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
        
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>

    @isset($head)
        {{ $head }}
    @endisset

</head>

<body x-data x-bind="$store.global.documentBody"
    class="is-sidebar-open @isset($isSidebarOpen) {{ $isSidebarOpen === 'true' ? 'is-sidebar-open' : '' }} @endisset @isset($isHeaderBlur) {{ $isHeaderBlur === 'true' ? 'is-header-blur' : '' }} @endisset @isset($hasMinSidebar) {{ $hasMinSidebar === 'true' ? 'has-min-sidebar' : '' }} @endisset  @isset($headerSticky) {{ $headerSticky === 'false' ? 'is-header-not-sticky' : '' }} @endisset">

    <!-- App preloader-->
    {{-- <x-app-preloader></x-app-preloader> --}}
        {{ $slot }}

    <!--
  This is a place for Alpine.js Teleport feature
  @see https://alpinejs.dev/directives/teleport
-->
    <div id="x-teleport-target"></div>

    @livewireScriptConfig 

    <script>
        // window.addEventListener("DOMContentLoaded", () => Alpine.start());
        window.addEventListener("DOMContentLoaded", () => {
            Livewire.start();
            Livewire.on('titleUpdated', function (title) {
            console.log(title);
            document.getElementById('templateIframe').contentWindow.postMessage({ type: 'updateMessage', data: title }, 'https://jbs.factorpage.test');
        });
        }); 

        window.addEventListener('notify', event => {
            // alert('The message: ' + event.detail);
            return `<div class="toastify on  light toastify-right toastify-bottom" aria-live="polite" style="transform: translate(0px, 0px); bottom: 15px;">This is a simple notification</div>`;
        })
    </script>

    @isset($script)
        {{ $script }}
    @endisset

    @stack('script')

    @livewire('notifications')

</body>

</html>
