<form method="post" action="{{$action}}" enctype="multipart/form-data" class="category-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/category/list'), isset($model) ? $model : '' ])

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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
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
                                        <div class="hstack">
                                            <select name="category[parent_id]" class="form-select select2" id="parent" tabindex="0" aria-hidden="false">
                                                <option value="0">Lựa chọn</option>

                                                <optgroup label="Danh sách">
                                                    @foreach($parents as $parent)
                                                    <option value="{{$parent->category_id}}" @if($parent->category_id == $parent_id) selected @endif>{{$parent->description->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên danh mục</label>
                                        <input type="text" name="category_description[name]" value="{{$name}}" class="form-control" id="name" placeholder="bắt buộc nhập vào">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="category_description[description]" id="description" rows="5">{!! $description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="website" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="metaTitle" class="form-label">Thẻ tiêu đề (Meta title)</label>
                                    <input type="text" name="category_description[meta_title]" value="{{$meta_title}}" class="form-control" id="metaTitle" placeholder="Tên danh mục">
                                </div>
                                <div class="col-md-10 mb-3">
                                    <label for="urlSeo" class="form-label">Từ khóa SEO</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-date">
                                            <img src="http://127.0.0.1:8000/admin/assets/images/flags/vietnam.png" alt="" class="rounded avatar-seo">
                                        </span>
                                        <input type="text" class="form-control" name="category_description[seo_url]" value="{{$seo_url}}" id="seoUrl">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="metaDesc" class="form-label">Thẻ mô tả (Meta desc)</label>
                                    <textarea class="form-control" rows="5" placeholder="Product Description" name="category_description[meta_description]" id="meta_description">{!!$meta_description!!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="sort" class="form-label">Thứ tự</label>
                        <input type="number" name="category[sort_order]" value="0" class="form-control" id="sort" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="SwitchCheckSizelg" class="form-label">Trạng thái</label>
                        <div class="form-switch form-switch-lg" dir="ltr">
                            <input class="form-check-input" name="category[status]" type="checkbox" id="SwitchCheckSizelg" checked="">
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail-primary img-thumbnail">
                            <img width="200" src="{{$image}}" class="input-image-overview" alt="{{$image}}" title="" data-placeholder="{{$image}}">
                        </a>
                        <input type="hidden" name="category[image]" id="input-image" value="{{$image}}">
                    </div>

                    <div class="mb-3">
                        <label class="card-title mb-1">SEO</label>
                        <p class="text-muted mb-1 text-truncate">Xem trước kết quả tìm kiếm:</p>
                        <div class="content-seo">
                            <h4 class="card-title google-title">{{$google_title}}</h4>
                            <p class="teaser google-url">{{$google_url}}</p>
                            <p class="teaser google-description">{{$google_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>