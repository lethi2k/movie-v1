@extends('admin::authentication.base')
@section('content')
<div class="card overflow-hidden">
    <div class="bg-primary bg-soft">
        <div class="row">
            <div class="col-7">
                <div class="text-primary p-4">
                    <h5 class="text-primary">Đăng ký miễn phí</h5>
                    <p>Nhận tài khoản RIX GROUP miễn phí của bạn ngay bây giờ.</p>
                </div>
            </div>
            <div class="col-5 align-self-end">
                <img src="{{asset('admin/assets/images/profile-img.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div>
            <a href="index-2.html">
                <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                        <img src="{{asset('admin/assets/images/logo.png')}}" alt="" class="rounded-circle" height="34">
                    </span>
                </div>
            </a>
        </div>
        <div class="p-2">
            <form class="needs-validation" novalidate="" action="https://themesbrand.com/skote/layouts/index.html">

                <div class="mb-3">
                    <label for="useremail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="useremail" placeholder="Nhập email" required="">
                    <div class="invalid-feedback">
                        Please Enter Email
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Nhập username" required="">
                    <div class="invalid-feedback">
                        Please Enter Username
                    </div>
                </div>

                <div class="mb-3">
                    <label for="userpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userpassword" placeholder="Nhập password" required="">
                    <div class="invalid-feedback">
                        Please Enter Password
                    </div>
                </div>

                <div class="mt-4 d-grid">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Đăng ký</button>
                </div>

                <div class="mt-4 text-center">
                    <h5 class="font-size-14 mb-3">Đăng ký sử dụng</h5>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                <i class="mdi mdi-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-4 text-center">
                    <p class="mb-0">Bạn đã có tài khoản của RIX GROUP <a href="{{route('login-admin')}}" class="text-primary">Đăng nhập</a></p>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection