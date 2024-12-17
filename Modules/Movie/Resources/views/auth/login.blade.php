@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div id="sign" class="container-auth">
            <h5 class="modal-title">Đăng nhập</h5>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form class="ajax-login" action="{{ URL::asset("/verify-account") }}" method="post" data-broadcast="user:updated">
                @csrf
                <div class="form-group"> <i class="icon fa-solid fa-circle-user"></i> <input type="text"
                        class="form-control form-control-lg" name="email" placeholder="Nhập địa chỉ email của bạn..." required="">
                </div>
                <div class="form-group"> <i class="icon fa-solid fa-lock"></i> <input type="password"
                        class="form-control form-control-lg" name="password" placeholder="Nhập mật khẩu" required="">
                </div>
                <div class="form-group"> <a href="/forgot-password" >Lấy lại mật khẩu</a> </div>
                <div class="form-group"> <span class="captcha"></span> </div>
                <div class="form-group"> <button type="submit" class="btn btn-lg fw-bold btn-primary w-100">Gửi đi</button>
                </div>
            </form>
            <div class="modal-footer"> <span class="text-gray2">Bạn chưa có tài khoản? <a href="/register"
                        data-content-switch="register">Đăng kí</a></span> </div>
        </div>

    </div>
@endsection
