<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Website')</title>

    <!-- Cho phép file con thêm nội dung vào head -->
    @yield('head')

    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400|Open+Sans:400,300" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
</head>
<body>

    @include('layout1.header')

    <!-- Nội dung chính -->
    <div class="container mt-4">
        @yield('content')
    </div>

    @include('layout1.footer')

    <!-- include js files -->
    <script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/animo/Animo.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/dug/dug.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/scripts.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/wow.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/custom2.js') }}"></script>

    <script>
        $(document).ready(function($) {    
            $(window).scroll(function(){
                if($(this).scrollTop()>150){
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            });
        });
    </script>

    @yield('scripts') <!-- Cho phép file con thêm JS nếu cần -->

</body>
</html>
