<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ getTemplateOption('title') }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/logo/'.getTemplateOption('favicon').'') }}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/slick.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/magnific-popup.css') }}">

    <!--====== tailwind css ======-->
    <link rel="stylesheet" href="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/css/tailwind.css') }}">


</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <nav class="flex items-center justify-between navbar navbar-expand-md">
                            <a class="mr-4 navbar-brand" href="index.html">
                                <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/logo.svg') }}" alt="Logo">
                            </a>

                            <button class="block navbar-toggler focus:outline-none md:hidden" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <!-- justify-center hidden md:flex collapse navbar-collapse sub-menu-bar -->
                            <div class="absolute left-0 z-30 hidden w-full px-5 py-3 duration-300 bg-white shadow md:opacity-100 md:w-auto collapse navbar-collapse md:block top-100 mt-full md:static md:bg-transparent md:shadow-none" id="navbarOne">
                                <ul class="items-center content-start mr-auto lg:justify-center md:justify-end navbar-nav md:flex">
                                    <!-- flex flex-row mx-auto my-0 navbar-nav -->
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">SERVICES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">PRICING</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonial">Testimonial</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="items-center justify-end hidden navbar-social lg:flex">
                                <span class="mr-4 font-bold text-gray-900 uppercase">FOLLOW US</span>
                                <ul class="flex footer-social">
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>                                  
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="relative z-10 header-hero" style="background-image: url(assets/images/header-bg.jpg') }})">
            <div class="container">
                <div class="justify-center row">
                    <div class="w-full lg:w-5/6 xl:w-2/3">
                        <div class="pt-48 pb-64 text-center header-content">
                            <h3 class="mb-5 text-3xl font-semibold leading-tight text-gray-900 md:text-5xl">Handcrafted Landing Page for Startups and SaaS Businesses</h3>
                            <p class="px-5 mb-10 text-xl text-gray-700">A simple, customizable, and, beautiful SaaS business focused landing page to make your project closer to launch!</p>
                            <ul class="flex flex-wrap justify-center">
                                <li><a class="mx-3 main-btn gradient-btn" href="javascript:void(0)">GET IN TOUCH</a></li>
                                <li><a class="mx-3 main-btn video-popup" href="https://www.youtube.com/watch?v=r44RKWyfcFw">WATCH THE VIDEO <i class="ml-2 lni-play"></i></a></li>
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="absolute bottom-0 z-20 w-full h-auto -mb-1 header-shape">
                <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/header-shape.svg') }}" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="relative services-area py-120">
        <div class="container">
            <div class="flex">
                <div class="w-full mx-4 lg:w-1/2">
                    <div class="pb-10 section-title">
                        <h4 class="title">Crafted For</h4>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="flex">
                <div class="w-full lg:w-2/3">
                    <div class="row">
                        <div class="w-full md:w-1/2">
                            <div class="block mx-4 services-content sm:flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                    <h4 class="services-title">Startup</h4>
                                    <p class="text">Short description for the ones who look for something new.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="block mx-4 services-content sm:flex">
                                <div class="services-icon">
                                    <i class="lni-bar-chart"></i>
                                </div>
                                <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                    <h4 class="services-title">SaaS Business</h4>
                                    <p class="text">Short description for the ones who look for something new.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="block mx-4 services-content sm:flex">
                                <div class="services-icon">
                                    <i class="lni-brush"></i>
                                </div>
                                <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                    <h4 class="services-title">Agency</h4>
                                    <p class="text">Short description for the ones who look for something new.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="block mx-4 services-content sm:flex">
                                <div class="services-icon">
                                    <i class="lni-bulb"></i>
                                </div>
                                <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                    <h4 class="services-title">App Landing</h4>
                                    <p class="text">Short description for the ones who look for something new.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="services-image">
            <div class="image">
                <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/services.png') }}" alt="Services">
            </div>
        </div> <!-- services image -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="pricing" class="bg-gray-100 pricing-area py-120">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full mx-4 lg:w-1/2">
                    <div class="pb-10 text-center section-title">
                        <h4 class="title">Our Pricing</h4>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="justify-center row">
                <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/3">
                    <div class="single-pricing">
                        <div class="text-center pricing-header">
                            <h5 class="sub-title">Basic</h5>
                            <span class="price">$ 199</span>
                            <p class="year">per year</p>
                        </div>
                        <div class="mb-8 pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="text-center pricing-btn">
                            <a class="main-btn" href="javascript:void(0)">GET STARTED</a>
                        </div>
                        <div class="bottom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-1{fill:#2bdbdc;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-1" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-1" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-1" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-1" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/3">
                    <div class="single-pricing pro">
                        <div class="absolute top-0 right-0 w-40 -mr-20 pricing-baloon">
                            <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/baloon.svg') }}" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">Pro</h5>
                            <span class="price">$ 399</span>
                            <p class="year">per year</p>
                        </div>
                        <div class="mb-8 pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="text-center pricing-btn">
                            <a class="main-btn" href="javascript:void(0)">GET STARTED</a>
                        </div>
                        <div class="bottom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/3">
                    <div class="single-pricing enterprise">
                        <div class="absolute top-0 left-0 w-32 mt-3 ml-3 pricing-flower">
                            <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/flower.svg') }}" alt="flower">
                        </div>
                        <div class="text-right pricing-header">
                            <h5 class="sub-title">Enterprise</h5>
                            <span class="price">$ 799</span>
                            <p class="year">per year</p>
                        </div>
                        <div class="mb-8 pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="text-center pricing-btn">
                            <a class="main-btn" href="javascript:void(0)">GET STARTED</a>
                        </div>
                        <div class="bottom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-3{fill:#4da422;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-3" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-3" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-3" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-3" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING PART ENDS ======-->
    
    <!--====== CALL TO ACTION PART START ======-->

    <section id="call-to-action" class="relative overflow-hidden bg-blue-600 call-to-action">
        <div class="absolute top-0 left-0 w-1/2 h-full call-action-image">
            <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/call-to-action.png') }}" alt="call-to-action">
        </div>
        
        <div class="container-fluid">
            <div class="justify-end row">
                <div class="w-full lg:w-1/2">
                    <div class="py-32 mx-auto text-center call-action-content">
                        <h2 class="mb-5 text-5xl font-semibold leading-tight text-white">Curious to Learn More? Stay Tuned</h2>
                        <p class="mb-6 text-white">You let us know whenever you want us to update anything or think something can be optimized.</p>
                        <form action="#" class="relative w-5/6 mx-auto md:w-2/3 call-newsletter">
                            <i class="absolute top-0 left-0 pt-3 pl-5 text-xl text-blue-600 lni-envelope"></i>
                            <input type="email" placeholder="john@email.com" class="w-full py-3 pl-12 pr-40 bg-white rounded-full focus:outline-none">
                            <button type="submit" class="absolute top-0 right-0 px-6 py-2 mt-1 mr-1 font-bold text-white duration-300 bg-blue-600 rounded-full hover:bg-blue-500">SUBSCRIBE</button>
                        </form>
                    </div> <!-- slider-content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->
    
    <!--====== TESTIMONIAL THREE PART START ======-->

    <section id="testimonial" class="testimonial-area py-120">
        <div class="container">            
            <div class="justify-center row">
                <div class="w-full mx-4 lg:w-1/2">
                    <div class="pb-10 text-center section-title">
                        <h4 class="title">Testimonial</h4>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="w-full">
                    <div class="row testimonial-active">
                        <div class="w-full lg:w-1/3">
                            <div class="text-center single-testimonial">
                                <div class="testimonial-image">
                                    <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/author-3.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="pb-5 mb-6 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="text-lg font-semibold text-gray-900">Isabela Moreira</h6>
                                    <span class="text-sm text-gray-700">CEO, GrayGrids</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="w-full lg:w-1/3">
                            <div class="text-center single-testimonial">
                                <div class="testimonial-image">
                                    <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/author-1.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="pb-5 mb-6 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="text-lg font-semibold text-gray-900">Fiona</h6>
                                    <span class="text-sm text-gray-700">Lead Designer, UIdeck</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="w-full lg:w-1/3">
                            <div class="text-center single-testimonial">
                                <div class="testimonial-image">
                                    <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/author-2.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="pb-5 mb-6 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="text-lg font-semibold text-gray-900">Elon Musk</h6>
                                    <span class="text-sm text-gray-700">CEO, SpaceX</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="w-full lg:w-1/3">
                            <div class="text-center single-testimonial">
                                <div class="testimonial-image">
                                    <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/author-4.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="pb-5 mb-6 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="text-lg font-semibold text-gray-900">Fajar Siddiq</h6>
                                    <span class="text-sm text-gray-700">CEO, MakerFlix</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TESTIMONIAL THREE PART ENDS ======-->
    
    <!--====== CLIENT LOGO PART START ======-->

    <section class="py-16 bg-gray-100 client-logo-area">
        <div class="container">
            <div class="items-center row">
                <div class="w-1/2 md:w-1/4">
                    <div class="flex justify-center single-client">
                        <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/client_logo_01.png') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="w-1/2 md:w-1/4">
                    <div class="flex justify-center single-client">
                        <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/client_logo_02.png') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="w-1/2 md:w-1/4">
                    <div class="flex justify-center single-client">
                        <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/client_logo_03.png') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="w-1/2 md:w-1/4">
                    <div class="flex justify-center single-client">
                        <img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/client_logo_04.png') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CLIENT LOGO PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area py-120">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full mx-4 lg:w-1/2">
                    <div class="pb-10 text-center section-title">
                        <h4 class="title">Get In touch</h4>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="justify-center row">
                <div class="w-full lg:w-2/3">
                    <div class="contact-form">
                        <form id="contact-form" action="assets/contact.php" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-4 mb-6 single-form form-group">
                                        <input type="text" name="name" placeholder="Your Name" data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-4 mb-6 single-form form-group">
                                        <input type="email" name="email" placeholder="Your Email" data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-4 mb-6 single-form form-group">
                                        <input type="text" name="subject" placeholder="Subject" data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-4 mb-6 single-form form-group">
                                        <input type="text" name="phone" placeholder="Phone" data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="w-full">
                                    <div class="mx-4 mb-6 single-form form-group">
                                        <textarea rows="5" placeholder="Your Mesaage" name="message" data-error="Please, leave us a message." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <p class="mx-4 form-message"></p>
                                <div class="w-full">
                                    <div class="mx-4 mt-2 text-center single-form form-group">
                                        <button type="submit" class="main-btn gradient-btn focus:outline-none">send message</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="bg-gray-100 footer-area">
        <div class="mb-16 footer-widget">
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <div class="items-end justify-between block mb-8 footer-logo-support md:flex">
                            <div class="flex items-end footer-logo">
                                <a class="mt-8" href="index.html"><img src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/logo.svg') }}" alt="Logo"></a>

                                <ul class="flex mt-8 ml-8 footer-social">
                                    <li><a href="javascript:void(0)"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div> <!-- footer logo -->
                            
                        </div> <!-- footer logo support -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6">
                        <div class="mb-8 footer-link">
                            <h6 class="footer-title">Company</h6>
                            <ul>
                                <li><a href="javascript:void(0)">About</a></li>
                                <li><a href="javascript:void(0)">Contact</a></li>
                                <li><a href="javascript:void(0)">Career</a></li>

                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                        <div class="mb-8 footer-link">
                            <h6 class="footer-title">Product & Services</h6>
                            <ul>
                                <li><a href="javascript:void(0)">Products</a></li>
                                <li><a href="javascript:void(0)">Business</a></li>
                                <li><a href="javascript:void(0)">Developer</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="w-full sm:w-5/12 md:w-1/3 lg:w-1/4">
                        <div class="mb-8 footer-link">
                            <h6 class="footer-title">Help & Suuport</h6>
                            <ul>
                                <li><a href="javascript:void(0)">Support Center</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="w-full sm:w-7/12 md:w-1/2 lg:w-1/3">
                        <div class="mb-8 footer-newsletter">
                            <h6 class="footer-title">Subscribe Newsletter</h6>
                            <div class="newsletter">
                                <form action="#" class="relative mb-4">
                                    <input type="text" placeholder="Your Email" class="w-full py-3 pl-6 pr-12 duration-300 bg-gray-200 border border-gray-200 rounded-full focus:border-blue-600 focus:outline-none">
                                    <button type="submit" class="absolute top-0 right-0 mt-3 mr-6 text-xl text-blue-600">
                                        <i class="lni-angle-double-right"></i>
                                    </button>
                                </form>
                            </div>
                            <p class="font-medium text-gray-900">Subscribe weekly newsletter to stay upto date. We don’t send spam.</p>
                        </div> <!-- footer newsletter -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="bg-blue-900 footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <div class="py-6 text-center">
                            <p class="text-white">
                                Template Crafted by
                                <a class="text-blue-500 duration-300 hover:text-blue-700" rel="nofollow" href="https://tailwindtemplates.co">TailwindTemplates</a> 
                            </p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->


    <!--====== jquery js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/ajax-contact.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/scrolling-nav.js') }}"></script>

    <!--====== Validator js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/validator.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/slick.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ global_asset('templates/'.strtolower(getSelectedTemplate()->name).'/assets/js/main.js') }}"></script>

</body>

</html>
