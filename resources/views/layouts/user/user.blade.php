<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/headers.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">

{{--    CSRF token    --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>


    @yield('link')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .tel{
            font-size: 12px;
        }
        .nav-link:hover{
            opacity: 70%;
        }
    </style>


</head>
<body>
@include('includes.user.header')

@yield('content')

<script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
@yield('script')

@include('includes.user.footer')

</body>
</html>
