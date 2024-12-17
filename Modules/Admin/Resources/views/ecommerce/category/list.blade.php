@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Danh mục sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

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
                                                <select class="rounded-end-none form-select column-filter">
                                                    <option value="name">Tên</option>
                                                    <option value="user">Người tạo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-75 bd-highlight">
                                            <div class="search-product-right">
                                                <div class="position-relative">
                                                    <select
                                                        class="rounded-start-none form-control select-category-ajax"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="d-flex flex-wrap gap-2 float-end">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        id="button-filter">Tìm kiếm</button>
                                    <button type="button" class="btn btn-outline-light waves-effect">Nhập lại</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

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
                                    @if (isset($method) && $method == 'trash')
                                    <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@index')}}"
                                        class="btn btn-outline-light waves-effect waves-light mb-2">
                                        Quay lại danh sách
                                    </a>
                                    @else
                                    <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@trash')}}"
                                        class="btn btn-outline-light waves-effect waves-light mb-2">
                                        <i class="mdi mdi-delete-clock"></i> Thùng rác
                                    </a>
                                    @endif

                                    <button type="button" class="btn btn-outline-light waves-effect waves-light mb-2">
                                        <i class="bx bx-transfer-alt"></i> Điều chỉnh thứ tự
                                    </button>
                                    <a href="{{URL::asset('admin/category/create')}}"
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
                                                    @if (isset($method) && $method == 'trash')
                                                    <li class="dropdown-item change-status">Khôi phục</li>
                                                    @else
                                                    <li class="dropdown-item change-status">Ẩn danh mục</li>
                                                    <li class="dropdown-item delete-category">Xóa danh mục đã chọn</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </th>
                                        <th class="align-middle">Hình ảnh</th>
                                        <th class="align-middle text-end">Sản phẩm</th>
                                        @if (!isset($method) || $method != 'trash')
                                        <th class="align-middle text-end">Trạng thái</th>
                                        @endif
                                        <th class="align-middle text-end">Người tạo</th>
                                        {{-- <th class="text-end">Hành động</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox"
                                                    id="orderidcheck01" value="{{$category->category_id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items: center">
                                                <div class="flex-shrink-0"></div>
                                                <div class="flex-grow-1">
                                                    <h4 class="text-body font-size-14 my-1">
                                                        <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@edit',['id' => $category->category_id]) }}"
                                                            class="link-primary">
                                                            <span class="fw-500">{{$category->description->name}}</span>
                                                        </a>
                                                    </h4>
                                                    <p class="text-muted mb-1">STT: {{$category->sort_order}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img class="rounded avatar-sm"
                                                src="{{strlen($category->image) ? $category->image : URL::asset('images/default.png')}}"
                                                alt="Generic placeholder image">
                                        </td>
                                        <td class="text-end">
                                            <a target="_blank"
                                                href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@index', ['filter[product_ids]' => $category->product_ids()])}}">{{$category->products->count()}}
                                                sản phẩm</a>
                                        </td>
                                        @if (!isset($method) || $method != 'trash')
                                        <td class="text-end">
                                            <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                                <input class="form-check-input change-status"
                                                    data-id="{{$category->category_id}}" value="{{$category->status}}"
                                                    type="checkbox" id="SwitchCheckSizelg" @if($category->status == 1)
                                                checked @endif>
                                            </div>
                                        </td>
                                        @endif
                                        <td class="text-end">
                                            le thi
                                        </td>

                                        {{-- <td class="text-end">
                                            <div class="d-flex gap-3 float-end">
                                                <!-- <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@detail',['id' => $category->category_id]) }}" class="text-success"><i class="mdi mdi-eye-check font-size-18"></i></a> -->
                                                <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@edit',['id' => $category->category_id]) }}"
                                                    class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete($(this).attr('data-url'), 'danh mục')"
                                                    data-url="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@destroy',['id' => $category->category_id]) }}"
                                                    class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>


                                    @if(count($category->childs))
                                        @php
                                            $node = '';
                                        @endphp
                                        
                                        @include('admin::ecommerce.category.manage-child',['childs' => $category->childs])
                                    @endif

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
<script>
    var data = {
        _totken: '{{ csrf_token() }}',
        column: $('.column-filter').val()
    };
</script>
@include('admin::ecommerce.category.js', ['url' => URL::asset('admin/category/ajax'), 'data' => "<script>
    data
</script>"])

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
            url: "{{URL::asset('admin/category/destroy/multiple')}}",
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
            url: "{{URL::asset('admin/category/change/status')}}",
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