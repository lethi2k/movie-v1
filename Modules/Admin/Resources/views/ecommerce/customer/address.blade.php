<input type="hidden" name="address[address_id]" id="address_id" value="0">
<div class="row add-content-address-infor">
    <div class="col-sm-12">
        <div class="mb-3">
            <label for="address">Địa chỉ chi tiết (số nhà, ngõ/hẻm ...)</label>
            <input id="address" name="address[address]" type="text" class="form-control" value="">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label class="control-label">Quốc gia</label>
            <select class="form-control" name="address[country_id]" id="country_id">
                <option value="230" selected>Việt Nam</option>
                <!-- <option value="2">Mỹ</option> -->
            </select>
        </div>
        <div class="mb-3">
            <label class="control-label">Quận huyện</label>
            <select class="form-control select2" name="address[district_id]" id="district_id">
                <option value="">Lựa chọn</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="productdesc">Tỉnh, thành phố</label>
            <select class="form-control select2" name="address[province_id]" id="province_id">
                <option value="0">Lựa chọn</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="productdesc">Xã phường</label>
            <select class="form-control select2" name="address[commune_id]" id="commune_id">
                <option value="0">Lựa chọn</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-check form-check-primary mb-3">
            <input class="form-check-input" type="checkbox" name="address[is_active]" id="address_default">
            <label class="form-check-label" for="address_default">
                Đặt làm địa chỉ mặc định
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-check form-check-primary mb-3">
            <input class="form-check-input" type="checkbox" name="address[is_pickup]" id="address_pickup">
            <label class="form-check-label" for="address_pickup">
                Đặt làm địa chỉ lấy hàng
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-check form-check-primary mb-3">
            <input class="form-check-input" type="checkbox" name="address[is_return]" id="address_return">
            <label class="form-check-label" for="address_return">
                Đặt làm địa chỉ trả hàng
            </label>
        </div>
    </div>
    
</div>