<form action="{{$action}}" method="post" enctype="multipart/form-data" class="customer-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/customers/customer/list/all') , isset($model) ?
    $model : '' ])
    <div class="row">
        <div class="col-md-12">
            <div class="card data-customer-infor">
                <div class="card-body">
                    <h4 class="card-title">Hồ sơ</h4>
                    <p class="card-title-desc">Gồm thông tin của khách hàng gồm tài khoản, tên, mật khẩu ...</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Họ tên</label>
                                <input id="name" name="customer[name]" value="{{$name}}" type="text"
                                    class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="customer[email]" value="{{$email}}" type="email"
                                    class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>

                            <div class="mb-3">
                                <label for="password">Mật khẩu</label>
                                <input id="password" name="customer[password]" type="password" class="form-control"
                                    placeholder="Nhập vào bắt buộc">
                            </div>
                            <div class="mb-3">
                                <label for="confirm">Nhập lại mật khẩu</label>
                                <input id="confirm" name="customer[confirm]" type="password" class="form-control"
                                    placeholder="Nhập vào bắt buộc">
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="customer_group_id">Nhóm khách hàng</label>
                                <select name="customer[customer_group_id]" class="form-select" id="customer_group_id">
                                    @foreach($groups as $group)
                                    <option value="{{$group->customer_group_id }}" {{$group->customer_group_id ==
                                        $customer_group_id ? 'selected' : ''}}>{{$group->description->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="telephone">Số điện thoại</label>
                                <input id="telephone" name="customer[telephone]" value="{{$telephone}}" type="number"
                                    class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>
                            <div class="mb-3">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" name="customer[birthday]"
                                    value="{{date('Y-m-d', strtotime($birthday));}}" class="form-control" id="birthday">
                            </div>

                            <div class="mb-3">
                                <label class="d-block mb-3">Giới tính :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_gender" id="male-gender" type="radio"
                                        name="customer[gender]" value="male" checked="checked">
                                    <label class="form-check-label" for="male-gender">Nam</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_gender" id="female-gender" type="radio"
                                        name="customer[gender]" value="female">
                                    <label class="form-check-label" for="female-gender">Nữ</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea class="form-control" name="customer[note]" id="note"
                                    rows="5">{{$note}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card data-customer-address">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Địa Chỉ</h4>
                            <p class="card-title-desc">Thông tin giao hàng khi đặt hàng từ các kênh bán hàng</p>
                        </div>
                        @if($action_form == 'edit')
                        <div class="col-md-6 text-sm-end">
                            <button type="button" class="btn btn-outline-success add-address-customer">
                                <i class="mdi mdi-plus me-1"></i> Thêm địa chỉ
                            </button>
                        </div>
                        @endif
                    </div>

                    @if($action_form == 'create')
                    @include('admin::ecommerce.customer.address')
                    @endif

                    @if($action_form == 'edit')
                    <div class="content-customer-info">
                        <h4 class="card-title mb-3">Thông tin địa chỉ</h4>
                        @foreach($customer_address as $address)
                        <div class="row my-3 border-bottom">
                            <div class="col-md-2 mt-2">
                                <i class="bx bx-map display-6 "></i>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-1">
                                    @if($address->is_active)
                                    <span class="badge badge-pill bg-success p-1 font-size-12 mb-3">Địa chỉ mặc
                                        định</span>
                                    @endif

                                    @if($address->is_pickup)
                                    <span class="badge badge-pill bg-danger p-1 font-size-12 mb-3">Địa chỉ lấy
                                        hàng</span>
                                    @endif

                                    @if($address->is_return)
                                    <span class="badge badge-pill bg-warning p-1 font-size-12 mb-3">Địa chỉ trả
                                        hàng</span>
                                    @endif
                                </div>
                                <div class="mb-1 me-0 row">
                                    <label for="address" class="col-md-2">Thông Tin Chung</label>
                                    <div class="col-md-10">
                                        <p class="text-muted mb-0">{{$customer->name}} - {{$customer->email}} -
                                            {{$customer->telephone}}</p>
                                    </div>
                                </div>
                                <div class="mb-1 me-0 row">
                                    <label class="col-md-2">Địa chỉ</label>
                                    <div class="col-md-10">
                                        <p class="text-muted mb-0">
                                            {{isset($address->address) ? $address->address . ' - ' : ''}}
                                            {{isset($address->commune->name) ? $address->commune->name . ',' : ''}}
                                            {{isset($address->district->name) ? $address->district->name . ',' : ''}}
                                            {{isset($address->province->name) ? $address->province->name . ',' : ''}}
                                            {{isset($address->country->name) ? $address->country->name : ''}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="d-flex gap-3 float-end">
                                    <a href="javascript:void(0);" onclick="editaddress('{{$address}}')"
                                        class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    @if(!$address->is_active && !$address->is_pickup && !$address->is_return)
                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete($(this).attr('data-url'), 'Địa Chỉ')"
                                        data-url="{{action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@destroyAddress',['id' => $address->address_id]) }}"
                                        class="text-danger remove-address"><i
                                            class="mdi mdi-delete font-size-18"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="card data-customer-config">
                <div class="card-body">
                    <h4 class="card-title">Cấu hình hệ thống</h4>
                    <p class="card-title-desc">Cài đặt tài khoản với hệ thống</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="newsletter">Đăng ký nhận thư</label>
                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                    <option value="1">Có</option>
                                    <option value="0" @if($newsletter==0) selected @endif>Không</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="approved">Phê duyệt</label>
                                <select class="form-select" id="approved" name="customer[approved]">
                                    <option value="1">Có</option>
                                    <option value="0" @if($newsletter==1) selected @endif>Không</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="d-block mb-3">Trạng thái :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_status" id="customer_1" type="radio"
                                        name="customer[status]" value="1" @if($status==1) checked="checked" @endif>
                                    <label class="form-check-label" for="customer_1">Hoạt động</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_status" id="customer_0" type="radio"
                                        name="customer[status]" value="0" @if($status==0) checked="checked" @endif>
                                    <label class="form-check-label" for="customer_0">Ngừng hoạt động</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="d-block mb-3">An toàn :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_safe" id="customer_safe_yes" type="radio"
                                        name="customer[safe]" value="1" @if($safe==1) checked="checked" @endif>
                                    <label class="form-check-label" for="customer_safe_yes">Có</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input customer_safe" id="customer_safe_no" type="radio"
                                        name="customer[safe]" value="0" @if($safe==0) checked="checked" @endif>
                                    <label class="form-check-label" for="customer_safe_no">Không</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="d-block mb-3">Thanh toán khi đặt hàng:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input payment_method" id="payment_method_direct" type="radio" name="payment[method]" value="direct" @if($method == 'direct') checked="checked" @endif>
                                    <label class="form-check-label" for="payment_method_direct">Trực tiếp</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input payment_method" id="payment_method_wallet" type="radio" name="payment[method]" value="wallet" @if($method == 'wallet') checked="checked" @endif>
                                    <label class="form-check-label" for="payment_method_wallet">Ví điện tử</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input payment_method" id="payment_method_bank" type="radio" name="payment[method]" value="bank" @if($method == 'bank') checked="checked" @endif>
                                    <label class="form-check-label" for="payment_method_bank">Chuyển khoản ngân hàng</label>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</form>