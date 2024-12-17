<!doctype html>
<html lang="vi">
<head>
    <title>RIX GROUP - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <base href="{{URL::asset('admin')}}">
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('style')
    <style>
        .hidden, .hide{
            display: none;
        }
        
        .episodes-body, .attribute-body{
            max-height: 500px;
            overflow-y: scroll;
            overflow-x: hidden
        }
    </style>
    @include('admin::layouts.css')
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin::layouts.header')

        @include('admin::layouts.menu')

        <!-- Start right Content here -->
        <div class="main-content">
            @yield('content')
            @include('admin::layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('admin::layouts.right_bar_model')

    <!-- JAVASCRIPT -->
    @include('admin::layouts.javascript')
    @yield('js')
</body>

</html>