@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Quản lý sản phẩm biến thể</h4>

                    <div class="page-title-right">
                        <ul class="breadcrumb m-0">
                            <li class="breadcrumb-item">Thương mại điện tử</li>
                            <li class="breadcrumb-item active">Quản lý sản phẩm biến thể</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@updateVariant',['parent_id' => $parent_id, 'id' => $variant_id]) }}" method="post">
            @csrf
            @include('admin::elements.form.action', ['pre' => action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@edit',['id' => $parent_id])])

            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin cơ bản</h4>
                            <div class="content-product my-3">
                                <div class="d-flex" style="align-items: center">
                                    <div class="flex-shrink-0 me-3">
                                        <img class="rounded avatar-sm" src="http://127.0.0.1:8000/images/default.png" alt="Generic placeholder image">
                                    </div>
                                    <div class="flex-grow-1">
                                        <!-- fw-bold  -->
                                        <h4 class="text-body font-size-15 my-1">
                                            <span class="fw-500">{{$parent_product->description->name}} </span>
                                        </h4>
                                        <p class="text-muted my-1">{{$parent_product->variants()->count()}} Chi tiết biến thể</p>
                                        <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@edit',['id' => $parent_id]) }}" class="link-primary">
                                            <i class="bx bx-reply-all"></i> trở về sản phẩm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="header">
                                <h4 class="card-title float-start mb-3">Danh Sách Biến Thể</h4>
                                <!-- <div class="text-sm-end">
                                    <a href="#" class="link-primary">Thêm biến thể mới</a>
                                </div> -->
                            </div>

                            @foreach($parent_product->variants() as $option_key => $product_variant)

                            <?php
                            if (isset($product_variant->options)) {
                                $option_values = collect($product_variant->options)->map(function ($options) {
                                    return strlen($options->value) ? $options->value : $options->optionValue->description->name;
                                })->toArray();
                                $product_variant['option_value_name'] = implode(" / ", $option_values);
                            }

                            $active_bg = '';
                            $active_color = '';

                            if ($product_variant->product_id == $variant_id) {
                                $active_bg = 'bg-primary bg-gradient';
                                $active_color = 'text-white';
                            }
                            ?>

                            <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@variant',['parent_id' => $parent_id, 'id' => $product_variant->product_id]) }}">
                                <div class="content-product {{$active_bg}} my-3" style="clear:both; border-radius: 3px;">
                                    <div class="d-flex" style="align-items: center">
                                        <div class="flex-shrink-0 me-3">
                                            <img style="width: 4rem; height: 4rem;" src="http://127.0.0.1:8000/images/default.png" alt="Generic placeholder image">
                                        </div>
                                        <div class="flex-grow-1">
                                            <!-- fw-bold  -->
                                            <h4 class="text-body font-size-15 my-1">
                                                <span class="fw-500 {{$active_color}} link-primary">{{$product_variant['option_value_name']}} </span>
                                            </h4>
                                            <p class="my-1 {{$active_color}}">Mã sp: {{$product_variant->model}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Các Thuộc Tính </h4>
                            <div class="row">
                                <div class="col-md-8">
                                    @foreach($variant->options as $variant_option)
                                    <div class="mb-3">
                                        <label for="option_variant">{{$variant_option->option->description->name}}</label>
                                        <input type="text" class="form-control" id="option_variant" name="product_option[{{$variant_option->product_option_id}}][value]" value="{{strlen($variant_option->value) ? $variant_option->value : $variant_option->optionValue->description->name}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông số sản phẩm </h4>
                            <div class="row mt-3">

                                <div class="col-sm-6 mb-3">
                                    <label for="model">Mã sp <i class="bx bx-info-circle"></i></label>
                                    <input id="model" name="product[model]" value="{{$variant->model}}" type="text" class="form-control">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="price">Giá bán</label>
                                    <input id="price" name="product[price]" value="{{number_format($variant->price)}}" type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="market_price">Giá Liêm yết <i class="bx bx-info-circle"></i></label>
                                    <input id="market_price" name="product[market_price]" value="{{number_format($variant->market_price)}}" type="text" class="form-control">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label class="d-block mb-3">Trạng thái :</label>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input product_status" id="productActive" type="radio" name="product[status]" value="active" checked="checked">
                                            <label class="form-check-label" for="productActive">Hiển thị</label>
                                        </div>
    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input product_status" id="productDate" type="radio" name="product[status]" value="setDate">
                                            <label class="form-check-label" for="productDate">Ngày hiển thị</label>
                                        </div>
    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input product_status" id="productInactive" type="radio" name="product[status]" value="inActive">
                                            <label class="form-check-label" for="productInactive">Ẩn</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 set-date" style="display: none;">
                                        <div class="input-group" id="datepicker3">
                                            <input type="text" name="date_available" class="form-control" placeholder="dd M, yyyy"
                                                data-provide="datepicker" data-date-container="#datepicker3" data-date-format="dd M, yyyy">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Quản lý hàng hóa</h4>
                            <div class="my-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input warehouse_status" type="radio" name="warehouse[status]" id="warehouseProductActive" value="active" @if($variant->warehouse->status == 1) checked="checked" @endif>
                                    <label class="form-check-label" for="warehouseProductActive">Quản lý số lượng</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input warehouse_status" type="radio" name="warehouse[status]" id="warehouseProductInactive" value="inactive" @if($variant->warehouse->status == 0) checked="checked" @endif>
                                    <label class="form-check-label" for="warehouseProductInactive">Không quản lý</label>
                                </div>
                            </div>

                            <div class="content-goods">
                                <div class="mb-3">
                                    <div class="float-start">
                                        <label class="control-label" for="store">Kho hàng <i class="bx bx-info-circle"></i></label>
                                    </div>
                                    <div class="float-end">
                                        <a href="#" class="link-primary"><i class="bx bx-check-double"></i> quản lý kho</a>
                                    </div>
    
                                    <div class="hstack gap-2" style="clear:both">
                                        <select name="warehouse[store]" id="store" class="select2 form-control" data-placeholder="Choose ...">
                                            <option value="0" selected="selected">Mặc định</option>
                                        </select>
                                        <button data-repeater-delete="" type="button" class="btn btn-outline-light"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
    
                                <div class="row mt-3">
                                    <div class="col-sm-6 mb-3">
                                        <label for="warehouseModel">Model</label>
                                        <input type="hidden" name="warehouse[warehouse_id]" value="{{$variant->warehouse->warehouse_id}}">
                                        <input id="warehouseModel" name="warehouse[model]" value="{{$variant->warehouse->model}}" type="text" class="form-control" placeholder="Tự động">
                                    </div>
    
                                    <div class="col-sm-6 mb-3">
                                        <label for="warehouseBarcode">Barcode</label>
                                        <input id="warehouseBarcode" type="text" name="warehouse[barcode]" value="{{$variant->warehouse->barcode}}" class="form-control">
                                    </div>
    
                                    <!-- <div class="col-sm-6 mb-3">
                                        <label class="d-block mb-3">Trạng thái :</label>
    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input warehouse_status" id="warehouseActive" type="radio" name="warehouse[status]" value="active" checked="checked">
                                            <label class="form-check-label" for="warehouseActive">Kinh doanh</label>
                                        </div>
    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input warehouse_status" id="warehouseInactive" type="radio" name="warehouse[status]" value="inActive">
                                            <label class="form-check-label" for="warehouseInactive">Ngừng kinh doanh</label>
                                        </div>
                                    </div> -->
    
                                    @if (config('settings.warehouse_action') == 'basic')
                                    <div class="col-sm-6 mb-3">
                                        <label for="cost">Giá vốn</label>
                                        <input id="cost" name="warehouse[cost]" value="{{number_format($variant->warehouse->cost)}}" type="text" class="form-control" placeholder="Nhập vào bắt buộc">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="quantity">Số lượng</label>
                                        <input id="quantity" name="warehouse[quantity]" value="{{$variant->warehouse->quantity}}" type="text" class="form-control" placeholder="1">
                                    </div>
                                    @endif
    
                                    <div class="col-sm-6 mb-3">
                                        <label for="min">Tối thiểu <i class="bx bx-info-circle"></i></label>
                                        <input id="min" name="warehouse[min]" value="{{$variant->warehouse->min}}" type="text" class="form-control" placeholder="10">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="max">Tối đa <i class="bx bx-info-circle"></i></label>
                                        <input id="max" name="warehouse[max]" value="{{$variant->warehouse->max}}" type="text" class="form-control" placeholder="100">
                                    </div>
    
                                    <div class="col-sm-12 mb-3">
                                        <label for="note">Ghi chú <i class="bx bx-info-circle"></i></label>
                                        <textarea name="warehouse[note]" id="note" class="form-control" rows="4">{{$variant->warehouse->note}}</textarea>
                                    </div>
    
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Vận chuyển</h4>
                            <p class="card-title-desc">Thông số sản phẩm giúp xác định giá vận chuyển sau khi đóng gói</p>

                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shipping_status" type="radio" name="product[shipping]" id="shippingActive" value="active" checked="checked">
                                    <label class="form-check-label" for="shippingActive">Tích hợp vận chuyển</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shipping_status" type="radio" name="product[shipping]" id="shippingInactive" value="inactive">
                                    <label class="form-check-label" for="shippingInactive">Không hỗ trợ</label>
                                </div>
                            </div>

                            <div class="row content-shipping">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="shipping_weight">Cân nặng <i class="bx bx-info-circle"></i></label>
                                        <div class="input-group">
                                            <input id="shipping_weight" name="product[weight]" value="{{number_format($variant->weight)}}" type="text" class="form-control" placeholder="Nhập vào">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                gr
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Dài</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{number_format($variant->length)}}" name="product[length]" placeholder="D" autocomplete="off">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                cm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Rộng</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{number_format($variant->width)}}" name="product[width]" placeholder="R" autocomplete="off">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                cm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Cao</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{number_format($variant->height)}}" name="product[height]" placeholder="H" autocomplete="off">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                cm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.product.js.action')
@endsection