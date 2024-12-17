<div class="modal fade bs-example-modal-lg" id="modalCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                <button type="button" class="btn-close close-modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <ul class="nav nav-tabs nav-tabs-custom " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#infor" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Thông tin cơ bản</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#website" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Website</span>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="infor" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="parent" class="form-label">Danh mục cha</label>
                                        <select class="form-select select2" id="parent">
                                            <option value="">Lựa chọn danh mục</option>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="group" class="form-label">Nhóm danh mục</label>
                                        <select class="form-select select2" id="group">
                                            <option value="">Lựa chọn nhóm</option>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên danh mục</label>
                                        <input type="text" class="form-control" id="name" placeholder="Tên danh mục">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="SwitchCheckSizelg" class="form-label">Trạng thái</label>
                                        <div class="form-switch form-switch-lg" dir="ltr">
                                            <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Mô tả</label>
                                        <textarea class="form-control" rows="5" placeholder="Product Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="website" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="metaTitle" class="form-label">Thẻ tiêu đề (Meta title)</label>
                                    <input type="text" class="form-control" id="metaTitle" placeholder="Tên danh mục">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="sort" class="form-label">Thứ tự</label>
                                    <input type="number" class="form-control" id="sort" placeholder="Tên danh mục">
                                </div>
                                <div class="col-md-10 mb-3">
                                    <label for="urlSeo" class="form-label">Từ khóa SEO</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-date">
                                            <img src="http://127.0.0.1:8000/admin/assets/images/flags/vietnam.png" alt="" class="rounded avatar-seo">
                                        </span>
                                        <input type="text" class="form-control" name="date" value="ao-thun-tay-lo-nam-nu-form-rong-chu-kieu-ca-tinh" aria-describedby="option-date" placeholder="null">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="metaDesc" class="form-label">Thẻ mô tả (Meta desc)</label>
                                    <textarea class="form-control" rows="5" placeholder="Product Description"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="card-title">SEO</label>
                                    <p class="text-muted mb-1 text-truncate">Xem trước kết quả tìm kiếm:</p>
                                    <div class="content-seo">
                                        <h4 class="card-title google-title">Áo thun tay lỡ nam nữ form rộng chữ kiểu cá tính</h4>
                                        <p class="teaser google-url">http://default.exdomain.net/ao-thun-tay-lo-nam-nu-form-rong-chu-kieu-ca-tinh</p>
                                        <p class="teaser google-description">Mô tả của bài viết trên kết quả tìm kiếm trên Google.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>