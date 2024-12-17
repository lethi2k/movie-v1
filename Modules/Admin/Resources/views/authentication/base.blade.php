<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 16:09:22 GMT -->

<head>
    <meta charset="utf-8">
    <title>Login | Skote - Admin &amp; Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/icon.svg')}}">

    <!-- Bootstrap Css -->
    <link href="{{URL::asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{URL::asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{URL::asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    @yield('content')
                    <div class="mt-3 text-center">
                        <div>
                            <p>Tìm hiểu thêm thông tin về chúng tôi <a href="#" class="fw-medium text-primary">
                                    Xem ngay </a> </p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> RIX GROUP. Crafted with <i class="mdi mdi-heart text-danger"></i> by Thi Le</p>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="{{URL::asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{URL::asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{URL::asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- App js -->
    <script src="{{URL::asset('admin/assets/js/app.js')}}"></script>
</body>

</html>