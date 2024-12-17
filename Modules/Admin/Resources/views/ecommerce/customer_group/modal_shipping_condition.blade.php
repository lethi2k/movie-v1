<div class="modal fade bs-example-modal-lg" id="shippingCondition" role="dialog" aria-labelledby="shippingCondition"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin mua hàng</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="card-title mb-3">Chọn điều kiện cho nhóm khách hàng</h4>
                <div class="form-check mb-3">
                    <input class="form-check-input click-checkbox" type="checkbox" value="totalOrder" id="totalOrder" checked>
                    <label class="form-check-label" for="totalOrder">Tổng số đơn hàng đã mua</label>
                    <div class="row mt-1 content-checkbox content-totalOrder">
                        <div class="col-md-6">
                            <select class="select2-search-disable">
                                <option value="">Bằng</option>
                                <option value="">Lớn hơn hoặc bằng</option>
                                <option value="">Nhỏ hơn hoặc bằng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input click-checkbox" type="checkbox" id="quantityOrder" value="quantityOrder">
                    <label class="form-check-label" for="quantityOrder">Số lượng sản phẩm đã mua</label>
                    <div class="row mt-1 content-checkbox content-quantityOrder" style="display: none">
                        <div class="col-md-6">
                            <select class="select2-search-disable">
                                <option value="">Bằng</option>
                                <option value="">Lớn hơn hoặc bằng</option>
                                <option value="">Nhỏ hơn hoặc bằng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input click-checkbox" type="checkbox" id="quantityRefund" value="quantityRefund">
                    <label class="form-check-label" for="quantityRefund">Số lượng sản phẩm trả</label>
                    <div class="row mt-1 content-checkbox content-quantityRefund" style="display: none">
                        <div class="col-md-6">
                            <select class="select2-search-disable">
                                <option value="">Bằng</option>
                                <option value="">Lớn hơn hoặc bằng</option>
                                <option value="">Nhỏ hơn hoặc bằng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input click-checkbox" type="checkbox" id="totalMoney" value="totalMoney">
                    <label class="form-check-label" for="totalMoney">Tổng chi tiêu</label>
                    <div class="row mt-1 content-checkbox content-totalMoney" style="display: none">
                        <div class="col-md-6">
                            <select class="select2-search-disable">
                                <option value="">Bằng</option>
                                <option value="">Lớn hơn hoặc bằng</option>
                                <option value="">Nhỏ hơn hoặc bằng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input click-checkbox" type="checkbox" id="lastOrder" value="lastOrder">
                    <label class="form-check-label" for="lastOrder">Lần cuối mua hàng</label>
                    <div class="row mt-1 content-checkbox content-lastOrder" style="display: none">
                        <div class="col-md-6">
                            <select class="select2-search-disable">
                                <option value="">Bằng</option>
                                <option value="">Nằm trong khoảng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>

                    </div>
                </div>
               
                <div class="text-sm-end">
                    <button type="button" class="btn btn-outline-light waves-effect waves-light mb-2">
                      Thoát
                    </button>
                    <a href="http://127.0.0.1:8000/admin/category/create"
                        class="btn btn-success waves-effect waves-light mb-2">
                      Áp dụng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>