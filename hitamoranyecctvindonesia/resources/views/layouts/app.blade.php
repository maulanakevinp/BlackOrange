<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(Storage::url(App\Utility::find(1)->logo)) }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/slicknav.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css">
    @yield('styles')
</head>

<body class="body-bg">
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text font-weight-bold">
                    {{ App\Utility::find(1)->nama_website }}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.components.header')

    <main>
        <!--? slider Area Start-->
        @yield('slider-area')
        <!-- slider Area End-->

        @yield('content')
    </main>

    @include('layouts.components.footer')

    <div id="wa-position">
        <a title="Kirim Pesan WhatsApp" href="https://api.whatsapp.com/send?phone={{ whatsapp(App\Utility::find(1)->nomor_whatsapp) }}&text=Halo%20Black%20Orange%20CCTV%20saya%20tertarik%20dengan%20produk%20dan%20jasa%20yang%20anda%20tawarkan" target="_blank" style="width: 80px;height: 80px;">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ url('') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ url('') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ url('') }}/assets/js/popper.min.js"></script>
    <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ url('') }}/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ url('') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ url('') }}/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ url('') }}/assets/js/wow.min.js"></script>
    <script src="{{ url('') }}/assets/js/animated.headline.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ url('') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="{{ url('') }}/assets/js/contact.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.form.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.validate.min.js"></script>
    <script src="{{ url('') }}/assets/js/mail-script.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ url('') }}/assets/js/plugins.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>

    @stack('scripts')
</body>

</html>
