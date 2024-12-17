@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div class="container info-page mt-5">
            <h2>Yêu cầu phim</h2>
            <p>Chúng tôi sẽ xử lý và phản hồi đến bạn sớm nhất có thể xin cảm ơn</p>
            <div class="row">
                <div class="col-lg-7">
                    <form method="post" class="ajax" action="ajax/page/contact" autocomplete="off">
                        <div class="form-group"> <label>Tên phim</label> <input type="text" class="form-control"
                                name="subject"> </div>
                        <div class="form-group"> <label>Mô tả</label>
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
