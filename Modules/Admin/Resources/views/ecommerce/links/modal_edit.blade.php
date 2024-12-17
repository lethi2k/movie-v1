<div class="modal fade bs-example-modal-xl" id="modal-edit" role="dialog" aria-labelledby="modalCustomer" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.links.store')}}" method="post" class="form-address">
                    @csrf
                    <input type="hidden" name="taskbar[taskbar_group_id]" value="{{$group->taskbar_group_id}}">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="taskbar_type_id">Kiểu menu</label>
                                <select id="taskbar_type_id" class="form-select" name="taskbar[taskbar_type_id]">
                                    <option value="0">Lựa chọn</option>
                                    @foreach ($taskbar_types as $taskbar_type)
                                        <option value="{{$taskbar_type->taskbar_type_id}}">{{$taskbar_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="store_id">Trang thông tin</label>
                                <select id="store_id" class="form-select">
                                    <option value="1">Chính sách bảo mật</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="name">Tên hiển thị</label>
                                <input id="name" name="taskbar_description[name]" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="parent_id">Menu cha</label>
                                <select id="parent_id" class="form-select" name="taskbar[parent_id]">
                                    <option value="0">Lựa chọn</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="taskbar[status]" class="form-select">
                                    <option value="1">Bật</option>
                                    <option value="0">Tắt</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Thứ tự</label>
                                <input id="sort_order" name="taskbar[sort_order]" value="0" type="number" class="form-control">
                            </div>
                            
                            <div class="mb-3 text-center">
                                <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail-primary img-thumbnail">
                                    <img width="200" src="{{asset('images/default.png')}}" class="input-image-overview" alt="{{asset('images/default.png')}}" title="{{asset('images/default.png')}}" data-placeholder="{{asset('images/default.png')}}">
                                </a>
                                <input type="hidden" name="taskbar[image]" value="{{asset('images/default.png')}}" id="input-image">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-success waves-effect save-shipping">
                                <i class="bx bxs-save me-1"></i> Áp dụng
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