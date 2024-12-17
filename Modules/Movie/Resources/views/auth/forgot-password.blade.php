@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div id="sign" class="container-auth">
            <h5 class="modal-title">Lấy lại mật khẩu</h5>
            <p class="text-gray2">Chúng tôi sẽ gửi email đến hộp thư của bạn, vui lòng kiểm tra hòm thư để đổi mật khẩu</p>

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
            <form class="ajax" action="forgot-password" method="post">
                <div class="form-group"> <i class="icon fa-solid fa-envelope"></i> <input type="text"
                        class="form-control form-control-lg" placeholder="Nhập địa chỉ email của bạn" name="account">
                </div>
                <div class="form-group"> <span class="captcha"></span> </div>
                <div class="form-group"> <button type="submit" class="btn btn-lg fw-bold btn-primary w-100">Gửi đi</button>
                </div>
            </form>
            <div class="modal-footer"> <a href="/login">Quay lại đăng nhập</a> </div>
        </div>
    </div>
@endsection
