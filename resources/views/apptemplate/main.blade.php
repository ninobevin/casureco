<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CASURECO I (@yield('title-head'))</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/casureco_ico_small.ico') }}" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
     <link rel="stylesheet" href='{{ asset("font-awesome/css/font-awesome.min.css")}}'>
     <link rel="stylesheet" href='{{ asset("ionicons/css/ionicons.min.css")}}'>
   <link rel="stylesheet" href='{{ asset("plugins/iCheck/all.css") }}'>
    <!-- CSS Files -->
    @include('sources.def_style')
</head>

<body class="">
<style>
   .url_auto_comp
   {

   }

   .url_auto_comp_list
   {
      cursor: pointer;
   }
   select.error, textarea.error, input.error {
       color:#FF0000;
   }  
</style>
    <div class="wrapper ">
        <div class="sidebar" data-color="yellow">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
            -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="logo-mini">
                      <img src="{{ asset('img/casureco_ico.png') }}">
                      
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                     CASURECO I
                </a>
            </div>
            <div class="sidebar-wrapper">
                @include('menu.sidebar')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            @include('menu.navbar_top')
            <!-- End Navbar -->
           
            @yield('panel-head')

            <div class="content">
                
                @yield('content')

            </div>
            <footer class="footer">
                
                @include('menu.footer')

            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->

<script src='{{ asset("/js/core/jquery.min.js")}}'></script>
<script src='{{ asset("/js/core/popper.min.js")}}'></script>
<script src='{{ asset("/js/core/bootstrap.min.js")}}'></script>
<script src='{{ asset("/js/plugins/perfect-scrollbar.jquery.min.js")}}'></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src='{{ asset("/js/plugins/bootstrap-switch.js")}}'></script>
<!--  Google Maps Plugin    -->

<!-- Chart JS -->
<script src='{{ asset("/js/plugins/chartjs.min.js")}}'></script>
<!--  Notifications Plugin    -->
<script src='{{ asset("/js/plugins/bootstrap-notify.js")}}'></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src='{{ asset("/js/now-ui-dashboard.js?v=1.0.0")}}'></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src='{{ asset("demo/demo.js")}}'></script>

{{-- sample library --}}

<script src='{{ asset("bootstrap/js/jquery-ui.js")}}'></script>
<!-- Bootstrap 3.3.6 -->

{{-- end of sample library --}}

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        //demo.initDashboardPageCharts();
    });
</script>

@yield('scripts')


</html>
