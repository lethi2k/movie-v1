<div class="modal fade bs-example-modal-xl" id="modalCustomer">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Địa Chỉ Mới</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{$action}}" method="post" class="form-address">
                    @csrf
                    @include('admin::ecommerce.customer.address',
                    [
                        'model' => 'Bỏ qua'
                    ])
                    <div class="col-md-12">
                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-success waves-effect">
                                <i class="bx bxs-save me-1"></i> Lưu thay đổi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </div> -->
        </div>
    </div>
</div>