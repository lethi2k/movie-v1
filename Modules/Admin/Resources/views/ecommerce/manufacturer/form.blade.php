<form action="{{$action}}" method="post" class="manufacturer-validation" enctype="multipart/form-data">
    <!-- action pre -> submit -->
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/manufacturer/list'), isset($model) ? $model : '' ])
    @if(isset($model))
        <input type="hidden" name="model" value="true">
    @endif

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
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Tên Hãng sản xuất</label>
                                <input id="name" name="manufacturer[name]" type="text" value="{{$name}}" class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 text-center">
                                <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail-primary img-thumbnail">
                                    <img width="200" src="{{$image}}" class="input-image-overview" alt="{{$image}}" title="{{$image}}" data-placeholder="{{$image}}">
                                </a>
                                <input type="hidden" name="manufacturer[image]" id="input-image" value="{{$image}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="store">Cửa hàng</label>
                                <select class="select2 form-control select2-multiple store" name="manufacturer_store[store_id]" multiple="multiple" data-placeholder="Lựa chọn ...">
                                    <option value="0">Mặc định</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label" for="keyword">Từ khóa (tags)</label>
                                <input id="keyword" name="keyword" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end row -->
</form>