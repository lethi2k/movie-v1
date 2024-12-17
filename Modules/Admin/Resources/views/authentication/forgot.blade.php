@extends('admin::authentication.base')
@section('content')
<div class="card overflow-hidden">
    <div class="bg-primary bg-soft">
        <div class="row">
            <div class="col-7">
                <div class="text-primary p-4">
                    <h5 class="text-primary"> Lấy lại mật khẩu</h5>
                    <p>Lấy lại mật khẩu với RIX GROUP.</p>
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
            <div class="alert alert-success text-center mb-4" role="alert">
                Nhập Email của bạn và mật khẩu sẽ được gửi cho bạn!
            </div>
            <form class="form-horizontal" action="https://themesbrand.com/skote/layouts/index.html">
                <div class="mb-3">
                    <label for="useremail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="useremail" placeholder="Nhập email">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Gửi đi</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection