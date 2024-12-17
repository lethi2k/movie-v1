<div class="modal fade bs-example-modal-lg" id="methodCreate" role="dialog" aria-labelledby="methodCreate"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nhóm khách hàng</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{URL::asset('admin/customers/group/create')}}">
                            <div class="text-center">
                                <div class="avatar-sm mx-auto mb-4">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft font-size-24">
                                        <i class="mdi mdi-account-group-outline text-primary"></i>
                                    </span>
                                </div>
                                <p class="font-16 text-muted mb-2"></p>
                                <h5>Nhóm khách hàng cố định</h5>
                                <p class="text-muted">Sử dụng khi các khách hàng trong nhóm không có điểm chung. Bạn cần chủ động gán khách hàng vào nhóm này.</p>
                            </div>
                        </a>
                        
                    </div>
                    <div class="col-md-6">
                        <a href="{{URL::asset('admin/customers/group/auto/create')}}">
                            <div class="text-center">
                                <div class="avatar-sm mx-auto mb-4">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft font-size-24">
                                        <i class="mdi mdi-account-supervisor-circle-outline text-primary"></i>
                                    </span>
                                </div>
                                <p class="font-16 text-muted mb-2"></p>
                                <h5>Nhóm khách hàng tự động</h5>
                                <p class="text-muted">Sử dụng khi bạn muốn tạo một tập khách hàng có cùng điểm chung để dễ chăm sóc hoặc chạy marketing.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>