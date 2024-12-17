<form method="post" action="{{$action}}" enctype="multipart/form-data" class="category-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/post/blog/list'), isset($model) ? $model : ''
    ])

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#infor" role="tab"
                                aria-selected="true">
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

                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="infor" role="tabpanel">
                            <h4 class="card-title">Nội dung chính</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="name">Tiêu đề</label>
                                    <input id="name" name="news_description[name]" type="text" class="form-control"
                                        placeholder="Nhập vào bắt buộc" value="{{$name}}">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="productdesc">Mô tả ngắn</label>
                                    <textarea class="form-control editor description_short"
                                        name="news_description[description_short]" id="description_short" rows="5"
                                        placeholder="">{!! $description_short !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="productdesc">Mô tả chi tiết</label>
                                    <textarea class="form-control editor" id="description"
                                        name="news_description[description]" rows="5"
                                        placeholder="">{!! $description !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="website" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="news_description[tag]" value="{{$tag}}"
                                        class="form-control" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="metaTitle" class="form-label">Thẻ tiêu đề (Meta title)</label>
                                    <input type="text" name="news_description[meta_title]" value="{{$meta_title}}"
                                        class="form-control" id="metaTitle" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="metaDesc" class="form-label">Thẻ mô tả (Meta desc)</label>
                                    <textarea class="form-control" rows="5" placeholder="Product Description"
                                        name="news_description[meta_description]"
                                        id="meta_description">{!! $meta_description !!}</textarea>
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
                    <h4 class="card-title">Thông tin chung</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-8 col-form-label">Trạng thái</label>
                        <div class="col-md-4 float-end">
                            <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" name="news[status]" value="{{$status}}"
                                    id="SwitchCheckSizelg" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-8 col-form-label">Sắp xếp</label>
                        <div class="col-md-4 float-end">
                            <input type="number" name="news[sort_order]" value="{{$sort_order}}" class="form-control"
                                id="sort" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-start">
                        <h4 class="card-title">Danh mục</h4>
                        <p class="card-title-desc">Fill all information below</p>
                    </div>
                    
                    <div class="float-end">
                        <a href="{{URL::asset('admin/post/category/list')}}" target="_blank" class="link-primary">
                            <i class="bx bx-check-double"></i> quản lý danh mục
                        </a>
                    </div>
                    <div class="mb-3">
                        <select name="news_category[]" class="form-control select2 select2-multiple"
                            multiple="multiple">
                            @foreach ($categories as $category)
                            <option value="{{$category->category_id}}" {{in_array($category->category_id, $category_ids)
                                ? 'selected' : ''}}>{{$category->description->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="card-title">SEO</label>
                        <p class="text-muted mb-1 text-truncate">Xem trước kết quả tìm kiếm:</p>
                        <div class="content-seo">
                            <h4 class="card-title google-title">{{$google_title}}</h4>
                            <p class="teaser google-url">
                                {{request()->getHost(). '/' . $slug}}
                            </p>
                            <p class="teaser google-description">{{$google_description}}</p>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="formCheck1" checked>
                        <label class="form-check-label" for="formCheck1">
                            Chỉnh sửa Url
                        </label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="option-date">
                            <img src="{{URL::asset('admin/assets/images/flags/vietnam.png')}}" alt=""
                                class="rounded avatar-seo">
                        </span>
                        <input type="text" name="url_alias[slug]" id="seoUrl" value="{{$slug}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Hình ảnh sản phẩm</h4>
            <div class="content__product-image--main mb-3">
                <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail-primary img-thumbnail">
                    <img width="200" src="{{$image}}" class="input-image-overview" alt="" title="" data-placeholder="{{$image}}">
                </a>
                <input type="hidden" name="news[image]" id="input-image" value="{{$image}}">
            </div>
            {{-- <div class="fallback">
                <input type="file" name="news[image]" value="{{$image}}" />
            </div> --}}
        </div>
    </div>

</form>
<!-- end row -->