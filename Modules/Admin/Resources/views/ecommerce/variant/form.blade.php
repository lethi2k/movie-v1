<form method="post" action="{{$action}}" enctype="multipart/form-data" class="variant-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/variant/list') ])

    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <div class="mb-1">
            <i class="mdi mdi-alert-outline me-2"></i>
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
    </div>
    @endif
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin nhóm tùy chọn</h4>
                    <p class="card-title-desc">Thông số gồm các thuộc tính như màu sắc, kích thước ...</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="option_name">Tên tùy chọn</label>
                                <input id="option_name" name="option_description[name]" value="{{$name}}" type="text" class="form-control" placeholder="nhập vào bắt buộc">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Kiểu bấm</label>
                                <select class="form-select" name="oc_option[type]">
                                    <option value="Radio" @if($type == 'Radio') selected @endif>Radio</option>
                                    <option value="checkbox" @if($type == 'checkbox') selected @endif>Checkbox</option>
                                    <option value="select" @if($type == 'select') selected @endif>select</option>
                                    <option value="text" @if($type == 'text') selected @endif>Văn bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Giá trị thuộc tính</h4>
                    <p class="card-title-desc">các giá trị của nhóm vd: đen, đỏ, vàng ...</p>

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="name">Tên Tùy chọn</label>
                        </div>
                        <div class="col-lg-4">
                            <label for="email">Hình ảnh</label>
                        </div>
                        <div class="col-lg-3">
                            <label for="email">Số thứ tự</label>
                        </div>
                        <hr>
                    </div>

                    <div data-repeater-list="inner-group" class="inner mb-1">
                        @if(empty($option_value))
                            @include('admin::ecommerce.variant.value.add')
                        @else
                            @include('admin::ecommerce.variant.value.edit', ['option_value' => $option_value])
                        @endif
                        <input data-repeater-create="" type="button" class="btn btn-outline-success add-variant-value" value="Thêm giá trị">
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>