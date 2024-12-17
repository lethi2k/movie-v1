<form action="{{$action}}" method="post" enctype="multipart/form-data" class="customer-group-validation">
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
                        <input id="name" name="customer_group_description[name]" type="text" class="form-control"
                            placeholder="Nhập vào bắt buộc" value="{{$name}}">
                    </div>
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="customer_group_description[description]"
                            rows="5">{!! $description !!}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="approval">Duyệt khách hàng mới</label>
                                <div class="form-switch form-switch-lg" dir="ltr">
                                    <input class="form-check-input" name="customer_group[approval]" type="checkbox"
                                        value="1" id="approval" {{$approval==1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order">Số thứ tự</label>
                                <input id="sort_order" name="customer_group[sort_order]" type="text"
                                    class="form-control" value="{{$sort_order}}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cài đặt nâng cao</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    <div class="mb-3">
                        <label for="name">Giá mặc định</label>
                        <select class="select2-search-disable" name="customer_group[type_price]">
                            <option value="price" {{$type_price=='price' ? 'selected' : '' }}>Giá bán lẻ</option>
                            <option value="cost" {{$type_price=='cost' ? 'selected' : '' }}>Giá nhập</option>
                            <option value="market_price" {{$type_price=='market_price' ? 'selected' : '' }}>Giá bán buôn
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Thuế mặc định</label>
                        <select class="select2-search-disable" name="tax_rate_to_customer_group[tax_rate_id]">
                            <option value="0" {{$tax_rate_id==0 ? 'selected' : '' }}>Không áp dụng thuế</option>
                            <option value="1" {{$tax_rate_id==1 ? 'selected' : '' }}>Thuế nhập hàng</option>
                            <option value="2" {{$tax_rate_id==2 ? 'selected' : '' }}>Thuế bán hàng</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Chiết khấu (%)</label>
                        <input type="text" class="form-control" name="customer_group[discount_percent]"
                            value="{{$discount_percent}}">
                    </div>
                    <div class="mb-3">
                        <label for="name">Hình thức thanh toán</label>
                        <select class="select2-search-disable" name="customer_group[payment]">
                            <option value="card" {{$payment=='card' ? 'selected' : '' }}>Quẹt thẻ</option>
                            <option value="point" {{$payment=='point' ? 'selected' : '' }}>Thanh toán bằng điểm</option>
                            <option value="cod" {{$payment=='cod' ? 'selected' : '' }}>COD</option>
                            <option value="tranfer" {{$payment=='tranfer' ? 'selected' : '' }}>Chuyển khoản</option>
                            <option value="money" {{$payment=='money' ? 'selected' : '' }}>Tiền mặt</option>
                            <option value="shopee" {{$payment=='shopee' ? 'selected' : '' }}>Ví shopee</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>