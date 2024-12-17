@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div class="container">
            <div class="error-page">
                <img class="w-100" src="{{ URL::asset('404.png') }}" alt="{{ URL::asset('404.png') }}">
                <div class="message w-100">Địa chỉ đường dẫn đã bị thay đổi hoặc bị lỗi xin vui lòng trở lại trang chủ.</div>
                <div class="mt-3"> <a href="/" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Về trang chủ</a> </div>
            </div>
        </div>
    </div>
@endsection
