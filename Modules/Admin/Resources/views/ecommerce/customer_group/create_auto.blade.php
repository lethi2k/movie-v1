@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới nhóm khách hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới nhóm khách hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.customers.group.store.auto')}}" method="post" enctype="multipart/form-data"
            class="customer-group-validation">
            @csrf
            @include('admin::elements.form.action', ['pre' => URL::asset('admin/customers/group/list/all') ])
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin cơ bản</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="mb-3">
                                <label for="name">Tên nhóm</label>
                                <input id="name" name="customer_group_description[name]" type="text"
                                    class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description"
                                    name="customer_group_description[description]" rows="5"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="approval">Duyệt khách hàng mới</label>
                                        <div class="form-switch form-switch-lg" dir="ltr">
                                            <input class="form-check-input" name="customer_group[approval]"
                                                type="checkbox" id="approval">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order">Số thứ tự</label>
                                        <input id="sort_order" name="customer_group[sort_order]" type="text"
                                            class="form-control" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cài đặt nâng cao</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="mb-3">
                                <label for="name">Giá mặc định</label>
                                <select class="select2-search-disable" name="customer_group[type_price]">
                                    <option value="price">Giá bán lẻ</option>
                                    <option value="cost">Giá nhập</option>
                                    <option value="market_price">Giá bán buôn
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name">Thuế mặc định</label>
                                <select class="select2-search-disable" name="tax_rate_to_customer_group[tax_rate_id]">
                                    <option value="0">Không áp dụng thuế</option>
                                    <option value="1">Thuế nhập hàng</option>
                                    <option value="2">Thuế bán hàng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name">Chiết khấu (%)</label>
                                <input type="text" class="form-control" name="customer_group[discount_percent]"
                                    value="0">
                            </div>
                            <div class="mb-3">
                                <label for="name">Hình thức thanh toán</label>
                                <select class="select2-search-disable" name="customer_group[payment]">
                                    <option value="card">Quẹt thẻ</option>
                                    <option value="point">Thanh toán bằng điểm</option>
                                    <option value="cod">COD</option>
                                    <option value="tranfer">Chuyển khoản</option>
                                    <option value="money">Tiền mặt</option>
                                    <option value="shopee">Ví shopee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bộ lọc khách hàng theo điều kiện</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="form-check mb-3">
                                <input class="form-check-input click-radio" type="radio" name="condition"
                                    id="one-condition" value="one-condition" checked>
                                <label class="form-check-label" for="one-condition">Thỏa mãn một trong các điều
                                    kiện</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input click-radio" type="radio" name="condition"
                                    id="mutical-condition" value="mutical-condition">
                                <label class="form-check-label" for="mutical-condition">Thỏa mãn tất cả điều
                                    kiện</label>
                            </div>
                            <div class="content-radio content-one-condition">
                                <h4 class="card-title">Chọn điều kiện</h4>
                                <div class="row">
                                    <div class="social-source text-center mt-3 col-md-6 cursor-pointer"
                                        data-bs-toggle="modal" data-bs-target="#customerCondition">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-xs mx-auto mb-3">
                                                    <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                        <i class="bx bxs-user-detail text-white"></i>
                                                    </span>
                                                </div>
                                                <h5 class="font-size-15">Thông tin cá nhân</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social-source text-center mt-3 col-md-6 cursor-pointer"
                                        data-bs-toggle="modal" data-bs-target="#shippingCondition">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-xs mx-auto mb-3">
                                                    <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                        <i class="bx bxs-cart text-white"></i>
                                                    </span>
                                                </div>
                                                <h5 class="font-size-15">Thông tin mua hàng</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách khách hàng thỏa mãn điều kiện</h4>
                            <p class="card-title-desc">Fill all information below</p>

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
                                            <th class="align-middle">Mã KH</th>
                                            <th class="align-middle">Tên KH</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Số điện thoại</th>
                                        </tr>
                                    </thead>
                                    <tbody class="customer-inner-data">
                                        <tr class="content-customer-filter" style="display: none">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input action-checkbox" type="checkbox"
                                                        value="1">
                                                </div>
                                            </td>
                                            <td>
                                                <a class="id"></a>
                                                <input type="hidden" class="customer_id">
                                            </td>
                                            <td><p class="name"></p></td>
                                            <td><p class="email"></p></td>
                                            <td><p class="telephone"></p></td>
                                            <td><a class="text-danger" onclick="$(this).parent().parent().remove()"><i class="mdi mdi-delete font-size-18"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.customer_group.modal_customer_condition')
@include('admin::ecommerce.customer_group.modal_shipping_condition')
@endsection

@section('js')
<script>
    $('.apply-filter').click(function(){
        $.ajax({
            url: "{{route('admin.ecommerce.customer_group.apply_filter')}}",
            dataType: 'json',
            type: 'POST',
            data: $("#form-filter").find("form").serialize(),
            success: function(json) {
                var html = "";
                $.each(json.data, function(i, value) {
                    var content = $('.content-customer-filter').first().clone().show();
                    content.find('a.id').text('#' +value.customer_id);
                    content.find('input.customer_id').attr('name', 'customer['+ i +']').val(value.customer_id);
                    content.find('p.name').text(value.name);
                    content.find('p.email').text(value.email);
                    content.find('p.telephone').text(value.telephone);
                    html += '<tr>' + content.html() + '</tr>';
                });
                $('.customer-inner-data').html(html);
                $('#customerCondition').modal('hide');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
</script>
@endsection