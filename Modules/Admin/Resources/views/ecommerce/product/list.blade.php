@extends('admin::layouts.index')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                        <h4 class="card-title">Bộ lọc sản phẩm</h4>
                        <p class="card-title-desc">Bạn có thể lọc thông tin sản phẩm qua Danh mục, Tên, Đơn hàng, Số
                            lượng ....</p>

                        @if(isset($filter))
                        @include(
                        'admin::ecommerce.product.filter',
                        [
                        'action' => URL::asset('admin/product/list/filter'),
                        'key' => $filter['product']['key'],
                        'value' => $filter['product']['value'],
                        'category_id' => $filter['category']['category_id']
                        ]
                        )
                        @else
                        @include(
                        'admin::ecommerce.product.filter',
                        [
                        'action' => URL::asset('admin/product/list/filter'),
                        'key' => 'name',
                        'value' => null,
                        'category_id' => 0
                        ]
                        )
                        @endif
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
                                <h4 class="card-title">{{ count($products) }} sản phẩm</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{URL::asset('admin/product/create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>

                                </div>
                            </div><!-- end col-->
                        </div>

                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tất cả</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#sync-shopee" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Sản phẩm đồng bộ Shopee</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#sync-kiotviet" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Sản phẩm đồng bộ Kiot Viet</span>
                                </a>
                            </li> --}}
                        </ul>

                        <div class="tab-content mt-3 text-muted">
                            <div class="tab-pane active" id="all" role="tabpanel">
                                @include('admin::ecommerce.product._table_tab')
                            </div>
                            {{--
                            <div class="tab-pane" id="sync-shopee" role="tabpanel">
                                @include('admin::ecommerce.product._table_tab')
                            </div>
                            <div class="tab-pane" id="sync-kiotviet" role="tabpanel">
                                @include('admin::ecommerce.product._table_tab')
                            </div>
                            --}}
                        </div>

                        {{ $products->links('admin::vendor.pagination.custom') }}
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
    $('.delete-product').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/product/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_ids: selected,
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
