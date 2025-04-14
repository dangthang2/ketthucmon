<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Website')</title>

    <!-- Cho phép file con thêm nội dung vào head -->
    @yield('head')
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400|Open+Sans:400,300" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <!-- Sử dụng CSS từ thư mục public/css -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/huong-style.css') }}">
</head>
<body>

    @include('layout.header')

    <!-- Nội dung chính -->
    <div class="container mt-4">
        @yield('content')
    </div>

    @include('layout.footer')

    <!-- include js files từ thư mục public/js -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('js/Animo.js') }}"></script>
    <script src="{{ asset('js/dug.js') }}"></script>
    <script src="{{ asset('js/scripts.min.js') }}"></script>
    <script src="{{ asset('js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/custom2.js') }}"></script>

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
