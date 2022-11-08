<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title }} | Contiporto</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    {{-- Datatable --}}
    <link href="{{ asset('assets/css/datatable/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    {{-- Select2 --}}
    <link href="{{ asset('assets/css/plugins/select2.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    @yield('css-top')
</head>

<body>
    @include('partials.admin.loader')

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

         @include('partials.admin.navbar')        
         @include('partials.admin.sidebar')

         <div class="page-wrapper">
            @yield('main-content')
            
            @include('partials.admin.footer')
         </div>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>

    {{-- Swal --}}
    <script src="{{ asset('assets/js/plugins/swal/sweetalert2.all.min.js') }}"></script>

    {{-- DataTable --}}
    <script src="{{ asset('assets/js/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatable/dataTables.bootstrap.min.js') }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    @include('partials.script-custome')
    @yield('script-down')
</body>
</html>