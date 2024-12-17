<div class="table-responsive">
    <table class="table table-nowrap table-check table-bordered">
        <thead class="table-light">
            <tr>
                <th style="width: 20px;" class="align-middle">
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="checkAll">
                        <label class="form-check-label" for="checkAll"></label>
                    </div>
                </th>
                <th class="align-middle">Thông tin sản phẩm</th>
                <th class="align-middle">Đánh giá</th>
                <th class="align-middle">Trả lời</th>
                <th class="align-middle text-end">Thời gian</th>
                <th class="align-middle text-end">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                        <label class="form-check-label" for="orderidcheck01"></label>
                    </div>
                </td>
                <td>
                    <div class="d-flex" style="align-items: center">
                        <div class="flex-shrink-0 me-3">
                            <img class="rounded avatar-sm" src="http://127.0.0.1:8000/admin/assets/images/users/avatar-3.jpg" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1">
                            <span class="badge badge-pill badge-soft-primary font-size-12">Giảm giá</span>
                            <span class="badge badge-pill badge-soft-success font-size-12">Kinh doanh</span>
                            <span class="badge badge-pill badge-soft-warning font-size-12">Ngừng kinh doanh </span>
                            <h5 class="text-body fw-bold font-size-14 my-1">Áo thun tay lỡ nam nữ form rộng chữ kiểu cá tính</h5>
                            <p class="text-muted mb-0">SKU: SPA - Giá: 200.000.đ</p>
                            <div class="rating-star rating-custom">
                                <input type="hidden" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-muted" data-readonly value="4" />
                            </div>

                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-muted mb-0">Sản phẩm rất tốt giá cả hợp lý</p>
                </td>
                <td>
                    <p class="text-muted mb-0">{{$reply}}</p>
                </td>
                <td class="text-end">
                    20:15 20/12/2021
                </td>

                <td class="text-end">
                    <a href="" class="mb-1 link-primary">Chi tiết</a>
                    <br>
                    <a href="" class="link-primary">Ẩn bình luận</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>