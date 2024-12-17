@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div class="container info-page mt-5">
            <h2>Liên hệ với chúng tôi</h2>
            <p>Vui lòng gửi yêu cầu của bạn bằng cách sử dụng mẫu dưới đây và chúng tôi sẽ liên lạc với bạn ngay.</p>
            <div class="row">
                <div class="col-lg-7">
                    <form method="post" class="ajax" action="ajax/page/contact" autocomplete="off">
                        <div class="form-group"> <label>Địa chỉ email hoặc số điện thoại</label> <input type="email" class="form-control"
                                name="email"> </div>
                        <div class="form-group"> <label>Tiêu đề</label> <input type="text" class="form-control"
                                name="subject"> </div>
                        <div class="form-group"> <label>Nội dung</label>
                            <textarea class="form-control" name="message" rows="7"></textarea>
                        </div>
                        <div class="form-group"> <span class="captcha" data-theme="dark"></span> </div> <button
                            type="button" class="submit btn btn-primary w-100">Gửi đi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
