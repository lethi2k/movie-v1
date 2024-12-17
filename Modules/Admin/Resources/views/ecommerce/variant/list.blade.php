@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tùy Chọn</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Tùy Chọn</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @if(isset($filter))
        @include(
        'admin::components.lists.filter_1',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@filter'),
        'pre' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@index'),
        'option_keys' => [
        [
        'id' => 'name',
        'name' => 'Tên'
        ],
        [
        'id' => 'value_name',
        'name' => 'Giá trị'
        ]

        ],
        'option_id' => $filter['key'],
        'value' => $filter['value'],
        ]
        )
        @else
        @include(
        'admin::components.lists.filter_1',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@filter'),
        'pre' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@index'),
        'option_keys' => [
        [
        'id' => 'name',
        'name' => 'Tên'
        ],
        [
        'id' => 'value_name',
        'name' => 'Giá trị'
        ]

        ],
        'option_id' => 'name',
        'value' => '',
        ]
        )
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
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light mb-2">
                                        <i class="bx bx-transfer-alt"></i> Điều chỉnh thứ tự
                                    </button>
                                    <a href="{{URL::asset('admin/variant/create')}}" class="btn btn-success waves-effect waves-light mb-2">
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
                                                Tên tùy chọn
                                            </div>
                                            <div class="btn-group action-content" style="display: none; cursor: pointer;">
                                                <div class="dropdown-toggle fw-bold" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                    Chọn thao tác cho <span class="text-content fw-bold"></span> tùy chọn <i class="mdi mdi-chevron-down"></i>
                                                </div>
                                                <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                                                    <li class="dropdown-item delete-variant">Xóa tùy chọn đã chọn</li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th class="align-middle text-end">Giá trị</th>
                                        <th class="text-end">Thứ tự</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($options as $option)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox" id="orderidcheck01" value="{{$option->option_id}}">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <h4 class="text-body font-size-14 my-1">
                                                <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@edit',['id' => $option->option_id]) }}" class="link-primary">
                                                    <span class="fw-500">{{$option->description->name}}</span>
                                                </a>
                                            </h4>
                                        </td>
                                        <td class="text-end">
                                            {{count($option->values)}}
                                        </td>
                                        <td class="text-end">
                                            {{$option->sort_order}}
                                        </td>

                                        {{-- <td class="text-end">
                                            <div class="d-flex gap-3 float-end">
                                                <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@edit',['id' => $option->option_id]) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" onclick="confirmDelete($(this).attr('data-url'), 'tùy chọn')" data-url="{{action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@destroy',['id' => $option->option_id]) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $options->links('admin::vendor.pagination.custom') }}
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
    $('.delete-variant').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/variant/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                variant_ids: selected,
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