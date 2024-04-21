<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>{{ $title ?? '' }} | Bookin Ambulance</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Medical HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Medical HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="medic" />

    <!-- ** {{ asset('landing_page/') }}/Plugins Needed for the Project ** -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/slick/slick-theme.css">
    <!-- FancyBox -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/fancybox/jquery.fancybox.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/fontawesome/css/all.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/animation/animate.min.css">
    <!-- jquery-ui -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/jquery-ui/jquery-ui.css">
    <!-- timePicker -->
    <link rel="stylesheet" href="{{ asset('landing_page/') }}/plugins/timePicker/timePicker.css">

    <!-- Stylesheets -->
    <link href="{{ asset('landing_page/') }}/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="icon" href="{{ asset('img/merauke.png') }}" type="image/x-icon">

</head>

<body>
    <div class="page-wrapper">
        @include('layout.landing_page.header')
        @include('layout.landing_page.menu')
        @yield('content')
        @include('layout.landing_page.footer')
        <!-- scroll-to-top -->
        <div id="back-to-top" class="back-to-top">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>


    <!-- jquery -->
    <script src="{{ asset('landing_page/') }}/plugins/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('landing_page/') }}/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('landing_page/') }}/plugins/slick/slick.min.js"></script>
    <script src="{{ asset('landing_page/') }}/plugins/slick/slick-animation.min.js"></script>
    <!-- FancyBox -->
    <script src="{{ asset('landing_page/') }}/plugins/fancybox/jquery.fancybox.min.js" defer></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <script src="{{ asset('landing_page/') }}/plugins/google-map/gmap.js" defer></script>

    <!-- jquery-ui -->
    <script src="{{ asset('landing_page/') }}/plugins/jquery-ui/jquery-ui.js" defer></script>
    <!-- timePicker -->
    <script src="{{ asset('landing_page/') }}/plugins/timePicker/timePicker.js" defer></script>

    <!-- script js -->
    <script src="{{ asset('landing_page/') }}/js/script.js"></script>
</body>

</html>
