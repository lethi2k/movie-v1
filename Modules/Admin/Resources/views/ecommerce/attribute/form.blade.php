<form action="{{$action}}" method="post" enctype="multipart/form-data" class="attribute-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/attribute/list') ])

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
                    <h4 class="card-title">Thông tin nhóm thuộc tính</h4>
                    <p class="card-title-desc">Tiêu đề định danh các thông số của sản phẩm</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Nhóm thuộc tính</label>
                                <input id="name" name="attribute_group_description[name]" type="text" value="{{$name}}" class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="sort_order">Thứ tự</label>
                                <input id="sort_order" name="attribute_group[sort_order]" type="number" value="{{$sort_order}}" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thuộc tính</h4>
                    <p class="card-title-desc">Màn hình, Hệ điều hành, Camera ....</p>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name">Tên thuộc tính</label>
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Số thứ tự</label>
                        </div>
                        <hr>
                    </div>

                    <div data-repeater-list="inner-group" class="inner mb-1">

                        @if(empty($attributes))
                            @include('admin::ecommerce.attribute.value.add')
                        @else
                            @include('admin::ecommerce.attribute.value.edit', ['attributes' => $attributes])
                        @endif
                        
                        <input data-repeater-create="" type="button" class="btn btn-outline-success add-attribute-value" value="Thêm giá trị">
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>