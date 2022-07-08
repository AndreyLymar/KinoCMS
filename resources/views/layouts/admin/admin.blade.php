<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>


    {{--    CSRF token   --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('link')
    <style>
        button{
            border: none;
            outline: none;
            background:none;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-4">
                <a class="nav-link p-1" href=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAhCAYAAABX5MJvAAAABmJLR0QA/wD/AP+gvaeTAAACGklEQVRYhe2Xv2sTYRjHP88bMU0tCg5GsEEXwaGDJBFcpSAOrrp0MDQ/7hwFcTV/Q+OvnBGDDg7BUYTq5FTFy6BbxUVUcKkBh2iI9zjYYii59N5416nf8X0+PO+H547jOdjL38j/NiiVSjOpVGo2l8v16vV6sGsS1Wr1NHBNRC4ARzaPN4DbnufdBDRRiWq1ellEHgHpEOSdiNxtNpv3ovZM2QhUKpWsMWYVODABywIXi8Xihu/7b6L0NTYSxphLwKEorKreiNzXRkJVz1jg85VKJRu7BBGnMJLZ2CVE5IcNPxwOv8cuAXy2YL+12+1e7BKq+tYCfxUVtJ3EYQt2LhEJEVm0wCOztpN4bcGuJSKRTqfvAE8joJ+A5UQkGo3GL1W9HwF97nnex0QkAHq93kvgwwREgyCIIjq9RKfT+S0iV0INVG+1Wi0/UYnNi0K/FyJiJTC1RL/f3x9WU9XQWqwSmUzmaFhNREJrYbFaagDK5fJxY8wTYD4EKebz+ffdbnc9as/I653jOCdV9SpQY/JmtZVnwIrneS/YYefcUcJxnEVVvQ6cZ7rHtw6sDAaDB+12+6eVhOu6x4IgeAycm+LicfkCLHuet7q9MPadqNVqp1R1DViISQDgILBUKBS++r7fHS2MHa+IPOTf/0ScMUDDdd0TEyVc111Q1bMJCGxlJgiCpdGDfduJ4XA4Z4zpJCgBYLWr7mVX8wf1BJxnG5KB7wAAAABJRU5ErkJggg=="></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link p-1"href="{{route('user.main.index')}}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAhCAYAAABX5MJvAAAABmJLR0QA/wD/AP+gvaeTAAADjUlEQVRYhe2XTWhcVRTHf/feOKTUj3GSBtQKCmYh2EqVLLRi1Yqoi6CVCYhmEeZ9DBmkZOFHF0IgIAhC0MVM5k2ii1hcDPgFSbXF4KoYIiJ2I1RTF9JN2lcV7ZQmc4+LvMHpODN5k8yii/435937zj3nx73vnXsv3NB1JLWTwdls9oC19piIvFMqlX7cbhwd19HzvIc8z9tX32etdYG0Uspr9HUc5+GuQXie1+/7/sfA98B3ExMTu+pemwbL+Pj4zcBprfWK53nzuVyub0cQvu8/CKyIyCtsLt3C9PT0lXZjBgYGLiulFiP/V9fX11ccx9m/LQjHcfaLyBJwD3BRRI4EQTACSLuAk5OTtlgsHlFKvQSEwL1a66VsNvtARxC5XK5Pa70ApIBVa+1QqVT6rF3yRhWLxU+NMUPAOaDPWruYyWRSsSE2NjbywF5gTWt9eHZ29lwnADUVCoVVY8zTwAXgbmNMPhaE67qPisgIgIg4MzMzv20HoB4EcKPmiO/7j2wJoZR6M3o8WSqVvtwJQE1BEHwOfAMoEXmjLcTY2Nge4LkI5r1uANRUF+95z/P6W0IkEolDwE3AWhiGS92ECMPwFHARSCilHm8JISJDEfVyuVyudhOiXC5XRWS5Pk9TCOCOyP7aTYCalFKrDXmaQuwGEJF/Ysa90mC30l+RvaW+s6fB6UJk+4khY8z71tqr1Wq16f/fKKXUHhEBWGsHcT6yd8UJGtWA1+P4AojI3sier++/ZjmUUmeix8fS6XQibvA4iuIdjPL81BLCGHOSzfW9LZlMPtlNiGQyeRi4FahUKpVTLSHy+fzfwFdR861uQtRV4hPz8/PXfPjNNrApQJRST7iuO9wNAM/zXgAOAVZEphrf/w8iCIIfgE8AlFIfZTKZ+3YC4Pv+IPBh1Dze7CzadCuvVquvAb8AKWPM4nZBfN8fFJEF4HbgrDHmaDO/phBzc3OhtXYY+AMYNMYsd7o0ruu+GJXpQeASMFwoFC4182175Hcc536t9RdRIETkW631u2EYLpXL5auN/ul0OpFKpZ4SkWNAbZM6CwwHQfBzqzxb3jsymUyqp6fnAxF5mf9m7k/gtFLqd2ttqLVORYXoIJu/IYAFjhtjjraagdgQNWWz2QMi8raIPAvsauNaAU6IyFTcC1HHN7DR0dHdvb29zwD7lFJ3snkYDqNSfEYp9XUQBJc7jXtD143+BcaYSRa4u5AsAAAAAElFTkSuQmCC"></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('includes.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 ml-2">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2022 <a href="#">Kino Cms</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $('.phone').inputmask('(099)-999-9999')
        $('.number_card').inputmask('9999-9999-9999-9999')
    });
</script>
@stack('script_ajax')
@yield('script')

</body>
</html>
