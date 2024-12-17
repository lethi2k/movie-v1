@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Bài viết</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Bài viết</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        
        @if(isset($filter['filter']))
        @include('admin::post.blog.filter', [
        'value' => $filter['filter']['blog']['value'],
        'date_start' => $filter['filter']['blog']['date_start'],
        'date_end' => $filter['filter']['blog']['date_end'],
        'category_id' => $filter['filter']['category']['category_id'],
        'user_id' => $filter['filter']['user']['user_id']
        ])
        @else
        @include('admin::post.blog.filter', [
            "value" => null,
            'date_start' => null,
            'date_end' => null,
            'category_id' => -1,
            'user_id' => -1
            ])
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{URL::asset('admin/post/blog/create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm bài viết
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkboxAll">
                                                <label class="form-check-label" for="checkboxAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">
                                            <div class="title-name">
                                                Tên Bài viết
                                            </div>

                                            <div class="btn-group action-content"
                                                style="display: none; cursor: pointer;">
                                                <div class="dropdown-toggle fw-bold" id="defaultDropdown"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="true"
                                                    aria-expanded="false">
                                                    Chọn thao tác cho <span class="text-content fw-bold"></span> danh
                                                    mục <i class="mdi mdi-chevron-down"></i>
                                                </div>
                                                <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                                                    <li class="dropdown-item change-status">Ẩn bài viết</li>
                                                    <li class="dropdown-item delete-blog">Xóa bài viết đã chọn</li>
                                                </ul>
                                            </div>

                                        </th>
                                        <th class="align-middle text-end">Trạng thái</th>
                                        <th class="align-middle text-end" style="width: 15%;">Danh mục</th>
                                        <th class="align-middle text-end">Tác giả</th>
                                        <th class="align-middle text-end">Ngày đăng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox"
                                                    value="{{$blog->news_id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items: center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded avatar-sm"
                                                        src="{{$blog->image}}"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h4 class="text-body fw-bold font-size-14 my-1">
                                                        <a href="{{action('Modules\Admin\Http\Controllers\Post\BlogController@edit',['id' => $blog->news_id]) }}"
                                                            class="link-primary">
                                                            <span class="fw-500">{{$blog->description->name}}</span>
                                                        </a>

                                                    </h4>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Đánh giá">
                                                            <i class="bx bx-comment-dots me-1"></i> 183
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Lượt xem">
                                                            <i class="bx bx-show"></i> {{$blog->view}}
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Lượt thích">
                                                            <i class="bx bx-heart"></i> 55
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-switch form-switch-lg mb-3 text-end" dir="ltr">
                                                <input class="form-check-input change-status" type="checkbox"
                                                    id="SwitchCheckSizelg" {{$blog->status == 1 ? 'checked' : ''}}
                                                data-id="{{$blog->news_id}}" value="{{$blog->status}}">
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <b>{{$blog->category()}}</b>
                                        </td>
                                        <td class="text-end">
                                            {{$blog->user->username}}
                                        </td>
                                        <td class="text-end">
                                            {{$blog->date_added}}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $blogs->links('admin::vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')

@if(Session::has('success'))
<script type="text/javascript">
    flashSuccess("{{ session()->get('success') }}");
</script>
@endif
<script>
    $('.delete-blog').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/post/blog/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                news_ids: selected,
            },
            success: function(json) {
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $('.change-status').click(function() {
        var selected = [];
        var status = 0;

        if ($(this).attr("data-id") == undefined) {
            $('.action-checkbox').each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).val());
                }
            });
        }

        if($(this).attr("data-id") != undefined){
            selected.push($(this).attr("data-id"));
            status = $(this).is(":checked") ? 1 : 0;
        }

        $.ajax({
            url: "{{URL::asset('admin/post/blog/change/status')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                news_ids: selected,
                status: status,
            },
            success: function(json) {
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
</script>
@endsection