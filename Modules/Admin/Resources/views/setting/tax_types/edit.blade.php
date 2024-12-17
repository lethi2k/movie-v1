@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sửa loại thuế</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sửa loại thuế</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.setting.tax_types.update', $tax->tax_rule_id)}}" method="post"
            enctype="multipart/form-data" class="tax-validation">
            @csrf
            @include('admin::elements.form.action', ['pre' => URL::asset('admin/attribute/list') ])

            @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <div class="mb-1">
                    <i class="mdi mdi-alert-outline me-2"></i>
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Thông tin cơ bản</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="input-title">Tên thuế</label>
                                        <input id="input-title" name="tax_class[title]" type="text" class="form-control"
                                            value="{{$tax->taxClass->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="input-name">Loại thuế</label>
                                        <input id="input-name" name="tax_rate[name]" type="text" class="form-control"
                                            value="{{$tax->taxRate->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="input-rate">Khấu trừ</label>
                                        <input id="input-rate" name="tax_rate[rate]" type="number" class="form-control"
                                            value="{{$tax->taxRate->rate}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textarea-description">Mô tả ngắn</label>
                                        <textarea class="form-control" id="textarea-description" rows="5"
                                            name="tax_class[description]"
                                            placeholder="Product Description">{!! $tax->taxClass->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h4 class="card-title">Áp dụng với</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tax_rule[based][]"
                                        id="tranfer" value="tranfer" {{in_array('tranfer', explode(',', $tax->based)) ?
                                    'checked' : ''}}>
                                    <label class="form-check-label" for="tranfer">Vận chuyển</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tax_rule[based][]" id="import"
                                        value="import" {{in_array('import', explode(',', $tax->based)) ? 'checked' :
                                    ''}}>
                                    <label class="form-check-label" for="import">Nhập hàng</label>
                                </div>
                                <div class="form-check form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tax_rule[based][]" id="export"
                                        value="export" {{in_array('export', explode(',', $tax->based)) ? 'checked' :
                                    ''}}>
                                    <label class="form-check-label" for="export">Xuất hàng</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tax_rule[based][]" id="price"
                                        value="price" {{in_array('price', explode(',', $tax->based)) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="price">Bán lẻ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tax_rule[based][]"
                                        id="market_price" value="market_price" {{in_array('market_price', explode(',',
                                        $tax->based)) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="market_price">Bán buôn</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
<script>
    //validate form
    $('.tax-validation').validate({
        lang: 'vi', // or whatever language option you have.
        rules: {
            'tax_class[title]': {
                required: true,
                minlength: 2,
            },
            'tax_rate[name]': {
                required: true,
                minlength: 2,
            },
            'tax_rate[rate]': {
                required: true,
                min: 0,
                max: 50,
            }
        }
    });
</script>
@endsection