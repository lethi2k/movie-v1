@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div class="container info-page mt-5">
            <h2 class="mb-3">Câu hỏi thường gặp</h2>
            <div id="faq-list">
                <div class="card mb-2">
                    <div class="card-header">
                        <h2 class="mb-1"> <button class="btn btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#faq0">Xem phim hoạt hình trên hhvietsub có hợp pháp
                                không?</button>
                        </h2>
                    </div>
                    <div id="faq0" class="collapse" data-parent="#faq-list">
                        <div class="card-body">Tuyệt đối, việc xem là hoàn toàn hợp pháp. Chúng tôi cũng không lưu trữ anime
                            mà chúng tôi liên kết và quảng bá chúng.</div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <h2 class="mb-1"> <button class="btn btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#faq1">Về quảng cáo gợi cảm</button> </h2>
                    </div>
                    <div id="faq1" class="collapse" data-parent="#faq-list">
                        <div class="card-body">Đó là quảng cáo duy nhất mà các trang web vi phạm bản quyền có thể sử dụng,
                            các quảng cáo sạch sẽ bị chủ sở hữu bản quyền cấm. Tuy nhiên, chúng tôi có thể loại bỏ nội dung
                            cực đoan, vui lòng báo cáo bằng cách gửi thư cho chúng tôi đến <a
                                href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="2d144c434440480359484c406d4a404c4441034e4240">contact@hh6d.com</a> kèm theo
                            quảng cáo có ảnh chụp màn hình và url quảng cáo quá gợi cảm.</div>
                    </div>
                </div>

                <a
                    href="https://scontent-ams2-1.xx.fbcdn.net/o1/v/t2/f1/m69/GICWmADqVQbPT8gDAP-z8owm8ZhZbmdjAAAF.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6Im9lcF9oZCJ9&_nc_ht=scontent-ams2-1.xx.fbcdn.net&_nc_cat=101&strext=1&vs=532a50cd43a9ec0e&_nc_vs=HBksFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HSUNXbUFEcVZRYlBUOGdEQVAtejhvd204WmhaYm1kakFBQUYVAALIAQAVAhg6cGFzc3Rocm91Z2hfZXZlcnN0b3JlL0dJQ1dtQUJrbUpvNy1xVUNBSjVqazdRNE4xNThidjRHQUFBRhUCAsgBAEsHiBJwcm9ncmVzc2l2ZV9yZWNpcGUBMQ1zdWJzYW1wbGVfZnBzABB2bWFmX2VuYWJsZV9uc3ViACBtZWFzdXJlX29yaWdpbmFsX3Jlc29sdXRpb25fc3NpbQAoY29tcHV0ZV9zc2ltX29ubHlfYXRfb3JpZ2luYWxfcmVzb2x1dGlvbgAddXNlX2xhbmN6b3NfZm9yX3ZxbV91cHNjYWxpbmcAEWRpc2FibGVfcG9zdF9wdnFzABUAJQAcjBdAAAAAAAAAABERAAAAJvyKpJbN5ZUBFQIoAkMzGAt2dHNfcHJldmlldxwXQJkcbZFocrAYIWRhc2hfZ2VuMmh3YmFzaWNfaHEyX2ZyYWdfMl92aWRlbxIAGBh2aWRlb3MudnRzLmNhbGxiYWNrLnByb2Q4ElZJREVPX1ZJRVdfUkVRVUVTVBsKiBVvZW1fdGFyZ2V0X2VuY29kZV90YWcGb2VwX2hkE29lbV9yZXF1ZXN0X3RpbWVfbXMBMAxvZW1fY2ZnX3J1bGUHdW5tdXRlZBNvZW1fcm9pX3JlYWNoX2NvdW50ATARb2VtX2lzX2V4cGVyaW1lbnQADG9lbV92aWRlb19pZA8zODAyMTA3MzExOTQ3NjASb2VtX3ZpZGVvX2Fzc2V0X2lkEDMyMTk5MjE4MjE2NDczNjMVb2VtX3ZpZGVvX3Jlc291cmNlX2lkDzMyOTM5OTk4OTk5NDE3NBxvZW1fc291cmNlX3ZpZGVvX2VuY29kaW5nX2lkDzkyMTI0MTU1NjAxMzIzMQ52dHNfcmVxdWVzdF9pZAAlAhwAJcQBGweIAXMEMTUyMgJjZAoyMDI0LTAxLTA0A3JjYgEwA2FwcAVWaWRlbwJjdBlDT05UQUlORURfUE9TVF9BVFRBQ0hNRU5UE29yaWdpbmFsX2R1cmF0aW9uX3MIMTYwNy40NTYCdHMVcHJvZ3Jlc3NpdmVfZW5jb2RpbmdzAA%3D%3D&oh=00_AfAZDN3lG2AtFUqf-oxVTHalgBCh_pHxVHaVNfzEM8P_IA&oe=6598D83D&_nc_sid=1d576d"></a>
                <div class="card mb-2">
                    <div class="card-header">
                        <h2 class="mb-1"> <button class="btn btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#faq2">Tôi không thể tìm thấy anime yêu thích của
                                mình?</button> </h2>
                    </div>
                    <div id="faq2" class="collapse" data-parent="#faq-list">
                        <div class="card-body">Chúng tôi tự tin có cơ sở dữ liệu anime lớn nhất thế giới, nhưng tất nhiên,
                            chúng tôi vẫn có thể bỏ sót điều gì đó. Nếu bạn không thể tìm thấy anime yêu thích của mình, vui
                            lòng sử dụng biểu mẫu <a href="{{ route('home.request') }}">Yêu cầu phim</a> để gửi yêu cầu.
                            Chúng tôi sẽ cố gắng cung cấp nó càng sớm càng tốt.</div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <h2 class="mb-1"> <button class="btn btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#faq4">Ứng dụng web nâng cao (iOS, Mac, Android,
                                Windows, v.v.)</button> </h2>
                    </div>
                    <div id="faq4" class="collapse" data-parent="#faq-list">
                        <div class="card-body">Chúng tôi có PWA, đây là một ứng dụng web nhúng, nó sẽ thêm biểu tượng vào
                            màn hình nền/màn hình chính của bạn để mở trang web độc lập như một ứng dụng.
                            Mở trang web <a href="https://hhvietsub.com/">https://hhvietsub.com/</a> và nhấp vào nút cài đặt
                            (nếu được trình duyệt của bạn cung cấp) hoặc theo cách thủ công bằng cách 'thêm vào màn hình
                            chính'.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
