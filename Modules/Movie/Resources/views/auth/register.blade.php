@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div id="sign" class="container-auth">
            <h5 class="modal-title">Đăng ký</h5>
            <p class="text-gray2">Tạo tài khoản để được sử dụng đầy đủ tính năng của ứng dụng</p>

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                </div>
                @endif

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
            <form class="ajax-register" action="{{ URL::asset("/sign-up") }}" method="post" data-broadcast="user:updated">
                @csrf
                <div class="form-group"> <i class="icon fa-solid fa-envelope"></i> <input type="email"
                        class="form-control form-control-lg" placeholder="Địa chỉ email" name="email"> </div>
                <div class="form-group"> <i class="icon fa-solid fa-circle-user"></i> <input type="text"
                        class="form-control form-control-lg" placeholder="Tên tài khoản" name="username"> </div>
                <div class="form-group"> <i class="icon fa-solid fa-lock"></i> <input type="password"
                        class="form-control form-control-lg" placeholder="Mật khẩu" name="password"> </div>
                <div class="form-group"> <i class="icon fa-solid fa-lock"></i> <input type="password"
                        class="form-control form-control-lg" placeholder="Nhập lại mật khẩu"
                        name="password_confirmation">
                </div>
                <div class="form-group"> <span class="captcha"></span> </div>
                <div class="form-group"> <button type="submit"
                        class="btn btn-lg fw-bold btn-primary w-100">Đăng ký</button>
                </div>
            </form>
            <div class="modal-footer"> <span class="text-gray2">Bạn đã có tài khoản? <a href="{{URL::asset("/login")}}"
                        data-content-switch="login">Đăng nhập</a></span> </div>
        </div>
    </div>
@endsection
