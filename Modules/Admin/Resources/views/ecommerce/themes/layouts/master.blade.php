<!doctype html>
<html lang="vi">
<head>
    <title>Rix Group - Kiến tạo tương lai smart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <base href="{{URL::asset('admin')}}">
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('style')
    @include('admin::layouts.css')
</head>

<body>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin::ecommerce.themes.layouts.header')
        @include('admin::ecommerce.themes.layouts.column-left')

        <!-- Start right Content here -->
        <div class="main-content">
            @yield('content')
            @include('admin::layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('admin::layouts.javascript')
    @yield('js')
</body>

</html>