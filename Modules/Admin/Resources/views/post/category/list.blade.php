@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Danh mục tin tức</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Danh mục tin tức</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.post.category.filter')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-10 mb-2">
                                    <div class="row">
                                        <div class="d-flex col-md-12">
                                            <div class="w-25">
                                                <div class="input-group">
                                                    <select class="rounded-end-none form-select"
                                                        name="filter[category][key]">
                                                        <option value="name">Tất cả</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="w-75 bd-highlight">
                                                <div class="search-product-right">
                                                    <div class="position-relative">
                                                        <input type="text" class="rounded-start-none form-control"
                                                            placeholder="Tìm kiếm" name="filter[category][value]"
                                                            value="{{isset($filter['filter']['category']['value']) ? $filter['filter']['category']['value'] : ''}}">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-12 col-md-2">
                                    <div class="d-flex flex-wrap gap-2 float-end">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm
                                            kiếm</button>
                                        <a href="{{route('admin.post.category.list')}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
    
            </div>
        </form>
        

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
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light mb-2">
                                        <i class="bx bx-transfer-alt"></i> Điều chỉnh thứ tự
                                    </button>
                                    <a href="{{URL::asset('admin/post/category/create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
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
                                                Tên danh mục
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
                                                    <li class="dropdown-item change-status">Ẩn danh mục</li>
                                                    <li class="dropdown-item delete-category">Xóa danh mục đã chọn</li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th class="text-end">Tin tức</th>
                                        <th class="text-end">Trạng thái</th>
                                        <th class="text-end">Người tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox"
                                                    value="{{$category->category_id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items: center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded avatar-sm"
                                                        src="{{strlen($category->image) ? $category->image : 'images/default.png'}}"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h4 class="text-body fw-bold font-size-14 my-1">
                                                        <a href="{{action('Modules\Admin\Http\Controllers\Post\CategoryController@edit',['id' => $category->category_id]) }}"
                                                            class="link-primary">
                                                            <span class="fw-500">{{$category->description->name}}</span>
                                                        </a>
                                                    </h4>
                                                    <p class="text-muted mb-1">STT: {{$category->sort_order}}</p>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            20
                                        </td>

                                        <td class="text-end">
                                            <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                                <input class="form-check-input change-status" type="checkbox"
                                                    id="SwitchCheckSizelg" {{$category->status == 1 ? 'checked' : ''}}
                                                data-id="{{$category->category_id}}" value="{{$category->status}}">
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            le thi
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $categories->links('admin::vendor.pagination.custom') }}
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
    $('.delete-category').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/post/category/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                category_ids: selected,
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
            url: "{{URL::asset('admin/post/category/change/status')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                category_ids: selected,
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