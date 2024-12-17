<div class="modal fade bs-example-modal-lg" id="customerCondition" role="dialog" aria-labelledby="customerCondition"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân </h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="form-filter">
                <form action="">
                    @csrf
                    <h4 class="card-title mb-3">Chọn điều kiện cho nhóm khách hàng</h4>
                    <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="birthday" value="birthday"
                            checked>
                        <label class="form-check-label" for="birthday">Ngày sinh</label>
                        <div class="row mt-1 content-checkbox content-birthday">
                            <div class="col-md-6">
                                <select class="select2-search-disable" name="birthday[key]">
                                    <option value="=">Là một trong số</option>
                                    <option value="<=">Nằm trong khoảng</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="birthday[value]">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="birthmonth"
                            value="birthmonth">
                        <label class="form-check-label" for="birthmonth">Tháng sinh</label>
                        <div class="row mt-1 content-checkbox content-birthmonth" style="display: none">
                            <div class="col-md-6">
                                <select class="select2-search-disable" name="birthmonth[key]">
                                    <option value="=">Là một trong số</option>
                                    <option value="<=">Nằm trong khoảng</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="birthmonth[value]">
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="birthyear" value="birthyear">
                        <label class="form-check-label" for="birthyear">Năm sinh</label>
                        <div class="row mt-1 content-checkbox content-birthyear" style="display: none">
                            <div class="col-md-6">
                                <select class="select2-search-disable" name="birthyear[key]">
                                    <option value="=">Là một trong số</option>
                                    <option value="<=">Nằm trong khoảng</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="birthyear[value]">
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="age" value="age">
                        <label class="form-check-label" for="age">Tuổi</label>
                        <div class="row mt-1 content-checkbox content-age" style="display: none">
                            <div class="col-md-6">
                                <select class="select2-search-disable" name="age[key]">
                                    <option value="=">Bằng</option>
                                    <option value=">=">Lớn hơn</option>
                                    <option value="<=">Nhỏ hơn</option>
                                    <option value="about">Nằm trong khoảng</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="age[value]">
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="gender" value="gender">
                        <label class="form-check-label" for="gender">Giới tính</label>
                        <div class="row mt-1 content-checkbox content-gender" style="display: none">
                            <div class="col-md-12">
                                <select class="select2-search-disable select2-multiple" multiple="multiple"
                                    name="gender[key][]">
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="firtname" value="firtname">
                        <label class="form-check-label" for="firtname">Tên</label>
                        <div class="row mt-1 content-checkbox content-firtname" style="display: none">
                            <div class="col-md-6">
                                <select class="select2-search-disable" name="firtname[key]">
                                    <option value="=">Là</option>
                                    <option value="like">Bắt đầu bằng</option>
                                    <option value="like">Có chứa</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firtname[value]">
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input click-checkbox" type="checkbox" id="addressCustomer"
                            value="addressCustomer">
                        <label class="form-check-label" for="addressCustomer">Địa chỉ</label>
                        <div class="row mt-1 content-checkbox content-addressCustomer" style="display: none">
                            <div class="col-md-12">
                                <select class="select2-search-disable">
                                    <option value="">Tỉnh/Thành phố - Quận/Huyện</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-sm-end">
                        <button type="button" class="btn btn-outline-light waves-effect waves-light mb-2">
                            Thoát
                        </button>
                        <button type="button" class="btn btn-success waves-effect waves-light mb-2 apply-filter">
                            Áp dụng
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>