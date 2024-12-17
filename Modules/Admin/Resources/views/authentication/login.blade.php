@extends('admin::authentication.base')
@section('content')
<div class="card overflow-hidden">
    <div class="bg-primary bg-soft">
        <div class="row">
            <div class="col-7">
                <div class="text-primary p-4">
                    <h5 class="text-primary">Chào mừng quay trở lại !</h5>
                    <p>Đăng nhập để tiếp tục sử dụng hệ thống.</p>
                </div>
            </div>
            <div class="col-5 align-self-end">
                <img src="{{asset('admin/assets/images/profile-img.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="auth-logo">
            <a href="index-2.html" class="auth-logo-light">
                <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                        <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                    </span>
                </div>
            </a>

            <a href="index-2.html" class="auth-logo-dark">
                <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                        <img src="{{asset('admin/assets/images/logo.png')}}" alt="" class="rounded-circle"
                            height="34">
                    </span>
                </div>
            </a>
        </div>
        <div class="p-2">
            <form class="form-horizontal"
                action="{{action('Modules\Admin\Http\Controllers\Ecommerce\AuthenticationController@verifyAccount')}}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="email" id="username"
                        placeholder="Nhập tài khoản">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <div class="input-group auth-pass-inputgroup" style="border: 1px solid #ced4da;">
                        <input type="password" class="form-control" name="password" style="border:0px"
                            placeholder="Nhập mật khẩu" aria-label="Password" aria-describedby="password-addon">
                        <button class="btn btn-light " type="button" id="password-addon"><i
                                class="mdi mdi-eye-outline"></i></button>
                    </div>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-check">
                    <label class="form-check-label" for="remember-check">
                        Nhớ mật khẩu
                    </label>
                </div>

                <div class="mt-3 d-grid">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Đăng nhập</button>
                </div>

                <div class="mt-4 text-center">
                    <h5 class="font-size-14 mb-3">Đăng nhập với</h5>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="javascript::void()"
                                class="social-list-item bg-primary text-white border-primary">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript::void()"
                                class="social-list-item bg-info text-white border-info">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript::void()"
                                class="social-list-item bg-danger text-white border-danger">
                                <i class="mdi mdi-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{route('forgot-admin')}}" class="text-primary"><i class="mdi mdi-lock me-1"></i>
                        Lấy lại mật khẩu?</a>
                </div>
                <div class="mt-3 text-center">
                    <p class="mb-0">Bạn Chưa có tài khoản của RIX GROUP <a href="{{route('singup-admin')}}" class="text-primary">Đăng ký</a></p>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection