<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic page needs
         ============================================ -->
    <base href="{{ asset('frontend/') }}/">
    <meta charset="utf-8">
    @yield('title')
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <!-- Mobile specific metas
         ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon
         ============================================ -->
    <link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png"/>
    <!-- Libs CSS
         ============================================ -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
{{--    <link href="css/fontawesome/css/all.min.css" rel="stylesheet">--}}
    <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/themecss/lib.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="js/minicolors/miniColors.css" rel="stylesheet">
    <!-- Theme CSS
         ============================================ -->
    <link href="css/themecss/so_sociallogin.css" rel="stylesheet">
    <link href="css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="css/themecss/so-categories.css" rel="stylesheet">
    <link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="css/themecss/so-category-slider.css" rel="stylesheet">
    <link href="css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="css/footer/footer1.css" rel="stylesheet">
    <link href="css/header/header1.css" rel="stylesheet">
    <link href="css/header/header2.css" rel="stylesheet">
    <link id="color_scheme" href="css/theme.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/quickview/quickview.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="css/giohang.css" rel="stylesheet">
    <link href="css/footer/footernew.css" rel="stylesheet">

    <!-- Google web fonts
         ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" type="text/css">
    @toastr_css
    @stack('style')
    <style type="text/css">
        body{font-family: Roboto, sans-serif;}
    </style>
</head>
<body class="common-home res layout-1">
{{--<body class="checkout-checkout ltr layout-1 load">--}}
<div id="wrapper" class="wrapper-fluid banners-effect-10">
    @include('home::homes.components.header')
        @yield('content')
@include('home::homes.components.footer')
</div>
<div class="back-to-top"><i class="fa fa-angle-up"></i></div>
<!-- End Color Scheme
     ============================================ -->
<!-- Include Libs & Plugins
     ============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="js/slick-slider/slick.js"></script>
<script type="text/javascript" src="js/themejs/libs.js"></script>
<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
<script type="text/javascript" src="js/datetimepicker/moment.js"></script>
<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/modernizr/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="js/minicolors/jquery.miniColors.min.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript" src="js/quickview/jquery.magnific-popup.min.js"></script>
<!-- Theme files
     ============================================ -->
<script type="text/javascript" src="js/themejs/application.js"></script>
<script type="text/javascript" src="js/themejs/homepage.js"></script>
<script type="text/javascript" src="js/themejs/custom_h1.js"></script>
<script type="text/javascript" src="js/themejs/noui.js"></script>
{{--<script type="text/javascript" src="js/themejs/addtocart.js"></script>--}}
<script type="text/javascript" src="js/themejs/nouislider.js"></script>
<script>
    $(function() {
        var header = $(".header-center");

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 50) {
                header.addClass("navbar-fixed-top");
            } else {
                header.removeClass("navbar-fixed-top");
            }
        });

    });
</script>
@stack('scripts')
{{--@jquery--}}
@toastr_js
@toastr_render

</body>
</html>
