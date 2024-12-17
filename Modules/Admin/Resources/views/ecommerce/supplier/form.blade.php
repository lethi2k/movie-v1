<form action="{{$action}}" method="post" class="supplier-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/warehouse/supplier/list') ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <p class="card-title-desc">Xác thực danh tính nhà cung cấp gồm: địa chỉ, tên, liên lạc ...</p>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="model">Mã nhà cung cấp </label>
                                <input id="model" name="model" type="text" class="form-control" placeholder="Tự động" value="{{$supplier_model}}">
                            </div>

                            <div class="mb-3">
                                <label for="name">Tên nhà cung cấp</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nhập vào bắt buộc" value="{{$name}}">
                            </div>

                            <div class="mb-3">
                                <label for="phone">Điện thoại</label>
                                <input id="phone" name="phone" type="number" class="form-control" placeholder="Nhập vào bắt buộc" value="{{$phone}}">
                            </div>

                            <div class="mb-3">
                                <label class="control-label">Quốc gia</label>
                                <select class="form-control" name="country_id" id="country_id">
                                    <option value="230" selected>Việt Nam</option>
                                    <!-- <option value="2">Mỹ</option> -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Quận huyện</label>
                                <select class="form-control select2" name="district_id" id="district_id">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="address">Địa chỉ chi tiết (số nhà, ngõ/hẻm ...)</label>
                                <input id="address" name="address" type="text" class="form-control" value="{{$address}}">
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="branch">Chi nhánh </label>
                                <input id="branch" name="branch" type="text" class="form-control" placeholder="Chi nhánh mặc định" value="{{$branch}}">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email </label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Nhập vào bắt buộc" value="{{$email}}">
                            </div>

                            <div class="mb-3">
                                <label for="company">Công ty </label>
                                <input id="company" name="company" type="text" class="form-control" placeholder="Nhập vào bắt buộc" value="{{$company}}">
                            </div>

                            <div class="mb-3">
                                <label for="province_id">Tỉnh, thành phố</label>
                                <select class="form-control select2" name="province_id" id="province_id">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="commune_id">Xã phường</label>
                                <select class="form-control select2" name="commune_id" id="commune_id">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fax">Mã số thuế </label>
                                <input id="fax" name="fax" type="text" class="form-control" value="{{$fax}}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" id="note" rows="5" name="note">{{$note}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>