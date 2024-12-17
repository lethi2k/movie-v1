@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Trang nội dung</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Trang nội dung</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.pages.filter')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-10">
                                    <div class="mb-3 row">
                                        <div class="d-flex col-md-12">
                                            <div class="w-25">
                                                <div class="input-group">
                                                    <select class="rounded-end-none form-select"
                                                        name="filter[information][key]">
                                                        <option value="title">Tất cả</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="w-75 bd-highlight">
                                                <div class="search-product-right">
                                                    <div class="position-relative">
                                                        <input type="text" class="rounded-start-none form-control"
                                                            placeholder="Tìm kiếm" name="filter[information][value]"
                                                            value="{{isset($filter['filter']['information']['value']) ? $filter['filter']['information']['value'] : ''}}">
                                                        <i class="bx bx-search-alt search-icon px-2 search-product"></i>
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
                                        <a href="{{route('admin.pages.list')}}"
                                            class="btn btn-outline-light waves-effect">Nhập lại</a>
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
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{route('admin.pages.create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkboxAll">
                                                <label class="form-check-label" for="checkboxAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle" style="width: 80%">
                                            <div class="title-name">
                                                Tiêu đề
                                            </div>

                                            <div class="btn-group action-content" style="display: none; cursor: pointer;">
                                                <div class="dropdown-toggle fw-bold" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                    Chọn thao tác cho <span class="text-content fw-bold"></span> trang nội dung <i class="mdi mdi-chevron-down"></i>
                                                </div>
                                                <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                                                    <li class="dropdown-item delete-pages">Xóa trang nội dung</li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th class="align-middle text-end">Ngày cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $page)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox" id="orderidcheck01" value="{{$page->information_id}}">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1">
                                                <a href="{{route('admin.pages.edit', $page->information_id)}}"
                                                    class="link-primary">{!! $page->description->title !!}</a>
                                            </h5>
                                            <p class="text-muted mb-0 product-width">{!!
                                                strlen($page->description->meta_description) ?
                                                $page->description->meta_description : 'không có mô tả' !!}</p>
                                        </td>
                                        <td class="text-end">
                                            20/12/2020
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

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
    $('.delete-pages').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/pages/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                page_ids: selected,
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