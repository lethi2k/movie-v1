@extends('admin::ecommerce.checkout.base')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thanh toan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thanh toan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="checkout-tabs">
            <form action="{{route('checkout.create')}}" method="post" enctype="multipart/form-data"
                class="checkout-validation">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="float-start">
                                                <label for="suppliername">Thông tin nhận hàng <i
                                                        class="bx bx-info-circle"></i></label>
                                            </div>
                                            <div class="float-end">
                                                @if (auth()->guard('customer')->check())
                                                <a href="{{route('account.info')}}" target="_blank"
                                                    class="link-primary">
                                                    <i class="bx bx-check-double"></i>
                                                    {{auth()->guard('customer')->user()->name}}
                                                </a>
                                                <input type="hidden" name="customer[customer_id]"
                                                    value="{{auth()->guard('customer')->user()->customer_id}}">
                                                @else
                                                <a href="{{route('account.login')}}" target="_blank"
                                                    class="link-primary">
                                                    <i class="bx bx-check-double"></i> Đăng nhập
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        @if (auth()->guard('customer')->check())
                                        <div class="form-floating mb-3" style="clear: both">
                                            <input type="text" class="form-control" id="input-email"
                                                name="customer[email]"
                                                value="{{auth()->guard('customer')->user()->email}}" disabled>
                                            <label for="input-email">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-name"
                                                name="customer[name]"
                                                value="{{auth()->guard('customer')->user()->name}}">
                                            <label for="input-name">Họ và tên</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-telephone"
                                                name="customer[telephone]"
                                                value="{{auth()->guard('customer')->user()->telephone}}">
                                            <label for="input-telephone">Số điện thoại</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-address"
                                                name="address[address]"
                                                value="{{auth()->guard('customer')->user()->addressActive != NULL ? auth()->guard('customer')->user()->addressActive->address : ''}}">
                                            <label for="input-address">Địa chỉ tùy chọn</label>
                                        </div>
                                        @if (auth()->guard('customer')->user()->addressActive != NULL)
                                            <input type="hidden" name="customer[address][address_id]" value="{{auth()->guard('customer')->user()->addressActive->address_id}}">
                                        @endif

                                        @else
                                        <div class="form-floating mb-3" style="clear: both">
                                            <input type="text" class="form-control" id="input-email"
                                                name="customer[email]">
                                            <label for="input-email">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-name"
                                                name="customer[name]">
                                            <label for="input-name">Họ và tên</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-telephone"
                                                name="customer[telephone]">
                                            <label for="input-telephone">Số điện thoại</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="input-address"
                                                name="address[address]">
                                            <label for="input-address">Địa chỉ tùy chọn</label>
                                        </div>
                                        @endif
                                        <div class="mb-3">
                                            <select class="form-control" name="address[country_id]" id="country_id">
                                                <option value="230" selected>Việt Nam</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-control select2" name="address[province_id]"
                                                id="province_id">
                                                <option value="0">Tỉnh thành</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-control select2" name="address[district_id]"
                                                id="district_id">
                                                <option value="">Quận huyện</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-control select2" name="address[commune_id]"
                                                id="commune_id">
                                                <option value="0">Xã phường</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <textarea type="text" class="form-control" cols="3" name="customer[note]"
                                                placeholder="Ghi chú">{{auth()->guard('customer')->check() ? auth()->guard('customer')->user()->note : ''}}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="title">
                                            <label for="suppliername">Vận chuyển <i
                                                    class="bx bx-info-circle"></i></label>
                                        </div>
                                        <div class="form-check form-radio-primary border-radio mb-5">
                                            <input class="form-check-input" type="radio" name="order[shipping_code]"
                                                id="shipping_code" value="free" checked="">
                                            <label class="form-check-label" for="shipping_code">
                                                Giao hàng tận nơi
                                            </label>
                                        </div>
                                        <div class="title">
                                            <label for="suppliername">Thanh toán <i
                                                    class="bx bx-info-circle"></i></label>
                                        </div>
                                        <div class="form-check form-radio-primary border-radio mb-3">
                                            <input class="form-check-input" type="radio" name="order[payment_code]"
                                                id="payment_delivery" value="unpaid" checked="checked">
                                            <label class="form-check-label" for="payment_delivery">
                                                Thanh toán khi giao hàng (COD)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                @foreach ($products as $key => $product)
                                <input type="hidden" name="order_product[{{$key}}][product_id]"
                                    value="{{$product->id}}">
                                <input type="hidden" name="order_product[{{$key}}][quantity]"
                                    value="{{number_format_to_int($product->qty)}}">
                                <input type="hidden" name="order_product[{{$key}}][price]"
                                    value="{{number_format_to_int($product->price)}}">

                                <div class="d-flex mb-3">
                                    <div class=" flex-shrink-0 me-3">
                                        <img class="rounded avatar-sm position-relative"
                                            src="{{$product->options->image}}" alt="{{$product->name}}">
                                        <span
                                            class="position-absolute translate-middle badge rounded-pill bg-success">{{$product->qty}}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="{{route('product.detail', seo_url($product->name))}}"
                                            class="link-primary" target="_blank">
                                            <p class="fw-500 content-product-name mb-0">{{$product->name}}</p>
                                        </a>
                                        <span class="text-muted">Không có biến thể </span>
                                        <span class="float-sm-end">{{number_format($product->price)}}</span>
                                    </div>
                                </div>
                                @endforeach

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="vouchers" name="vouchers[code]">
                                            <label for="vouchers">Nhập mã giảm giá</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                            style="width:100%">Áp
                                            dụng</button>
                                    </div>
                                </div>
                                <hr>

                                <div class="table-responsive mb-3">
                                    <table class="table mb-0">
                                        <tbody>
                                            @foreach ($totals as $key => $total)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td class="text-end">{{$total}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{route('cart')}}" class="link-primary">
                                            <i class="bx bx-arrow-back"></i> Quay về giỏ hàng
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light submit-form">Đặt
                                            hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')

@if (auth()->guard('customer')->user()->addressActive !== NULL)
@include('admin::ecommerce.config.location_js',
[
'province_id' => auth()->guard('customer')->check() ? auth()->guard('customer')->user()->addressActive->province_id : 0,
'district_id' => auth()->guard('customer')->check() ? auth()->guard('customer')->user()->addressActive->district_id : 0,
'commune_id' => auth()->guard('customer')->check() ? auth()->guard('customer')->user()->addressActive->commune_id : 0
]
);
@else
@include('admin::ecommerce.config.location_js',
[
'province_id' => 0,
'district_id' => 0,
'commune_id' => 0
]
);
@endif


<script>
    //validate form
    $.validator.addMethod("phoneNumber", function(value) {
        return value == value.match('[0-9]+');
    });
    $('.checkout-validation').validate({
        lang: 'vi',
        rules: {
            'customer[name]': {
                required: true,
                minlength: 2,
            },
            'customer[email]': {
                required: true,
                email: true,
                remote: {
                    url: "{{route('customers.customer.checkName')}}",
                    type: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                    }
                }
            },
            'customer[telephone]': {
                required: true,
                minlength:10,
                maxlength:10,
                phoneNumber: true,
            },
            'address[address]': {
                required: true,
                minlength: 2,
            },
            'address[province_id]': {
                required: true,
                min: 1,
            },
            'address[district_id]': {
                required: true,
                min: 1,
            },
            'address[commune_id]': {
                required: true,
                min: 1,
            },
        }
    });
</script>
@endsection