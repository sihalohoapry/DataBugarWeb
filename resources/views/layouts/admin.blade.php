<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Data Bugar | @yield('title')</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="icon" href="{{ asset('logo-databugar.png') }}">

    <!-- style -->
    @stack('styles')
    <!-- build:css ../dashboard/css/site.min.css -->
    <link rel="stylesheet" href="{{ asset('basik/assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('basik/assets/css/theme.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('basik/assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
    <!-- endbuild -->
</head>

<body class="layout-row">
    {{-- <!-- ############ Aside START--> --}}
    @include('includes.sidebar')
    <div id="main" class="layout-column flex">
        {{-- <!-- ############ Header START--> --}}
        @include('includes.header')
        {{-- content --}}
        @yield('content')
        <!-- ############ Footer START-->
        <div id="footer" class="page-footer hide">
            <div class="d-flex p-3">
                <span class="text-sm text-muted flex">&copy; Copyright. flatfull.com</span>
                <div class="text-sm text-muted">Version 1.0.0</div>
            </div>
        </div>
        <!-- ############ Footer END-->
    </div>
    <!-- build:js ../dashboard/js/site.min.js -->
    <!-- jQuery -->

    <script src="{{ asset('basik/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('basik/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('basik/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <!-- ajax page -->
    {{-- <script src="{{ asset('basik/libs/pjax/pjax.min.js') }}"></script> --}}
    <script src="{{ asset('basik/assets/js/ajax.js') }}"></script>
    <!-- lazyload plugin -->
    <script src="{{ asset('basik/assets/js/lazyload.config.js') }}"></script>
    <script src="{{ asset('basik/assets/js/lazyload.js') }}"></script>
    <script src="{{ asset('basik/assets/js/plugin.js') }}"></script>
    <!-- scrollreveal -->
    <script src="{{ asset('basik/libs/scrollreveal/dist/scrollreveal.min.js') }}"></script>
    <!-- feathericon -->
    <script src="{{ asset('basik/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('basik/assets/js/plugins/feathericon.js') }}"></script>
    <!-- theme -->
    <script src="{{ asset('basik/assets/js/theme.js') }}"></script>
    <script src="{{ asset('basik/assets/js/utils.js') }}"></script>
    @stack('prepend-script')
    {{-- @include('includes.script-layanan') --}}
    @stack('addon-script')

    <!-- endbuild -->
</body>

</html>
