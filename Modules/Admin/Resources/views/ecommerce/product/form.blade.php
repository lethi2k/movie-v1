<!-- end page title -->
<form action="{{ $action }}" method="post" class="form-product" enctype="multipart/form-data">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/product/list/all')])

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

    <!-- product -->
    <input type="hidden" name="product[org_id]" value="0" />
    <input type="hidden" name="product[status_check]" value="2" />
    <input type="hidden" name="product[video]" value="0" />

    <!-- product description -->
    <input type="hidden" name="product_description[tag]" value="" />
    <input type="hidden" name="product_description[language_id]" value="1" />

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <p class="card-title-desc">Mô tả các thông số của sản phẩm như: tên, mô tả, link ...</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Tiêu đề <span
                                        style="color: red">(*)</span></label>
                                <input id="ProductName" name="product_description[name]" value="{{ $product_name }}"
                                    type="text" class="form-control" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Chất lượng</label>
                                <select class="form-control select2" name="product[quality]" id="qualityProduct"
                                    data-placeholder="Lựa chọn ...">
                                    <option value="144p">144p</option>
                                    <option value="240p">240p</option>
                                    <option value="360p">360p</option>
                                    <option value="480p">480p</option>
                                    <option value="720p" selected>720p</option>
                                    <option value="1080p">1080p</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ProductYearManufacture" class="form-label">Năm phát hành</label>
                                <input id="ProductYearManufacture" name="product[year_manufacture]"
                                    value="{{ $product_year_manufacture }}" type="number" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="ProductYearManufacture" class="form-label">Đánh giá</label>
                                <input id="ProductYearManufacture" name="product[rate]" value="{{ $rate }}"
                                    type="number" class="form-control" placeholder="">
                            </div>
                            <div class="mb-3">
                                <div class="float-start">
                                    <label class="control-label">Từ khóa (tags) <i
                                            class="bx bx-info-circle"></i></label>
                                </div>
                                <div class="float-end">
                                    <a href="#" class="link-primary"><i class="bx bx-check-double"></i> quản lý
                                        tag</a>
                                </div>

                                <div class="hstack gap-2" style="clear:both">
                                    <select class="select2 form-control select2-multiple"
                                        name="product_description[tag][]" multiple="multiple"
                                        data-placeholder="Lựa chọn ...">
                                        <option value="WI">Sản phẩm</option>
                                        <option value="BE">Sản phẩm mới nhất
                                        </option>
                                        <option value="BA">Sản phẩm nổi bật
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="control-label">Số lượng</label>
                                <input type="number" value="{{ $quantity }}" name="product[quantity]"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="group">
                                    <div class="float-start">
                                        <label class="control-label">Danh mục</label>
                                    </div>
                                    <div class="float-end">
                                        <a href="{{ URL::asset('admin/category/list') }}" target="_blank"
                                            class="link-primary">
                                            <i class="bx bx-check-double"></i> quản lý danh mục
                                        </a>
                                    </div>
                                </div>

                                <div class="hstack gap-2" style="clear:both">
                                    <select class="form-control select2 select2-multiple"
                                        name="product_category[][category_id]" id="cateProduct" multiple="multiple"
                                        data-placeholder="Lựa chọn ...">
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->category_id }}"
                                                @if (in_array($parent->category_id, $id_categores)) selected @endif>
                                                {{ $parent->description->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Quốc gia</label>
                                <input id="ProductLocation" name="product[location]" value="{{ $location }}"
                                    type="text" class="form-control" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="ProductWarning" class="form-label">Warning (Giới hạn độ tuổi)</label>
                                <input id="ProductWarning" name="product[warning]" value="{{ $product_warning }}"
                                    type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="ProductEpisodeDuration" class="form-label">Độ dài tập</label>
                                <input id="ProductEpisodeDuration" name="product[episode_duration]"
                                    value="{{ $episode_duration }}" type="number" class="form-control"
                                    placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="ProductEpisodeDuration" class="form-label">URL Trainner </label>
                                <input id="ProductEpisodeDuration" name="product[url_trainner]"
                                    value="{{ $url_trainner }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label>Mô tả</label>
                                <textarea class="form-control editor" name="product_description[description]" rows="5">{!! $description !!}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="d-block mb-3">Trạng thái :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input product_status" id="productActive" type="radio"
                                        name="product[status]" value="active" checked="checked">
                                    <label class="form-check-label" for="productActive">Hiển thị</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input product_status" id="productDate" type="radio"
                                        name="product[status]" value="setDate">
                                    <label class="form-check-label" for="productDate">Ngày hiển thị</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input product_status" id="productInactive"
                                        type="radio" name="product[status]" value="inActive">
                                    <label class="form-check-label" for="productInactive">Ẩn</label>
                                </div>
                            </div>

                            <div class="mb-3 set-date" style="display: none;">
                                <div class="input-group" id="datepicker3">
                                    <input type="text" name="date_available" class="form-control"
                                        placeholder="dd M, yyyy" data-provide="datepicker"
                                        data-date-container="#datepicker3" data-date-format="dd M, yyyy">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="card-title">SEO</label>
                            <p class="text-muted mb-1 text-truncate">Xem trước kết quả tìm kiếm:</p>
                            <div class="content-seo">
                                <h4 class="card-title google-title">{{ $meta_title }}</h4>
                                <p class="teaser google-url my-1">{{ URL::asset('admin/product/') . $meta_keyword }}
                                </p>
                                <p class="teaser google-description">{{ $meta_description }}.</p>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="urlSeo" checked>
                            <label class="form-check-label" for="urlSeo">
                                Chỉnh sửa Url
                            </label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="img-seo">
                                <img src="{{ URL::asset('admin/assets/images/flags/vietnam.png') }}" alt=""
                                    class="rounded avatar-seo">
                            </span>
                            <input type="text" name="product_description[meta_keyword]"
                                value="{{ $meta_keyword }}" class="form-control seo-url"
                                aria-describedby="option-date" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h4 class="card-title">Cấu hình phim</h4>
                    <p class="card-title-desc">Thông số kĩ thuật của sản phẩm để so sánh, đánh giá chất lượng</p>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input product_action" id="productActionActive" type="radio"
                        name="product[type_movie]" value="one_episodes"
                        @if ($type_movie == 'one_episodes') checked @endif
                        @if ($type_movie == 'many_episodes' && $action_form == 'edit') disabled @endif>
                    <label class="form-check-label" for="productActionActive">Phim lẻ</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input product_action" id="productAction" type="radio"
                        name="product[type_movie]" value="many_episodes"
                        @if ($type_movie == 'many_episodes') checked @endif
                        @if ($type_movie == 'one_episodes' && $action_form == 'edit') disabled @endif>
                    <label class="form-check-label" for="productAction">Phim bộ</label>
                </div>

                <input type="button" onclick="addMoreMovie()"
                    class="btn btn-outline-success many_episodes mt-3 mt-lg-0" style="display: none"
                    value="Thêm tập">

                <div class="row episodes-body">
                    @foreach ($options as $action)
                        <div class="col-md-12 mt-3 content-episodes">
                            <div class="mb-3">
                                <div class="row many_episodes" style="display: none">
                                    <h4 class=" col-md-2 card-title title-episodes"># Tập</h4>
                                    <div class="col-md-2 hstack gap-2">
                                        <input type="text" class="form-control episode"
                                            value="{{ isset($action->episode) ? $action->episode : 1 }}"
                                            name="product_option[{{ $action->product_option_id }}][episode]">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden"
                                name="product_option[{{ $action->product_option_id }}][product_option_id]"
                                value="{{ $action->product_option_id }}" class="product_option_id">

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Đường dẫn
                                    video</label>
                                <div class="col-md-10 hstack gap-2">
                                    <input id="ProductEpisodes"
                                        name="product_option[{{ $action->product_option_id }}][value]"
                                        value="{{ $action->value }}" type="text" class="form-control name"
                                        placeholder="">
                                    <button type="button" class="btn btn-outline-light btn-remove"
                                        style="display: none" onclick="removeMovie(this)"><i
                                            class="bx bx-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Minh họa sản phẩm <i class="bx bx-info-circle"></i></h4>
                <p class="card-title-desc">Minh họa sản phẩm thông qua hình ảnh video ...</p>

                <div class="flex-shrink-0 me-3 float-start">
                    <div class="content__product-image--main mb-3">
                        <a href="" id="thumb-image" data-toggle="image"
                            class="img-thumbnail-primary img-thumbnail">
                            <img width="200" src="{{ $image }}" class="input-image-overview"
                                alt="{{ $product_name }}" title="{{ $product_name }}"
                                data-placeholder="{{ $image }}" />
                        </a>
                        <input type="hidden" name="product[image]" id="input-image" value="{{ $image }}" />
                    </div>
                </div>

                <input type="hidden" class="image-default" value="{{ URL::asset('images/default.png') }}">

                <div class="content__product-image--main row" id="images">
                    @foreach ($product_images as $key => $image_related)
                        <div class="content-image-other mb-3 col-md-1 mx-3" id="image-row{{ $key }}">
                            <button type="button" onclick="$(this).parent().remove()"
                                class="btn position-absolute top-0 end-0 translate-middle badge bg-danger px-2 font-size-12"><i
                                    class="bx bx-trash"></i> Xóa</button>
                            <a href="" id="thumb-image{{ $key }}" data-toggle="image"
                                class="img-thumbnail">
                                <img class="product__related-btn-add" src="{{ $image_related->image }}"
                                    data-placeholder="{{ $image_related->image }}" />
                            </a>
                            <input type="hidden" name="product_image[{{ $key }}][image]"
                                value="{{ $image_related->image }}" id="input-image{{ $key }}" />
                        </div>
                    @endforeach
                    <div class="col-md-1 button-add-img-content ms-3" id="images__add">
                        <button type="button" onclick="addImage()" class="btn product__related-btn-add"
                            data-original-title="Thêm hình ảnh"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title-desc">Thông số server dự phòng</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="name">Tên server <i class="bx bx-info-circle"></i></label>
                    </div>
                    <div class="col-lg-6">
                        <label for="email">đường dẫn
                    </div>
                    <hr>
                </div>
                <div class="attribute-session">
                    <input type="button" onclick="addAttribute()" class="btn btn-outline-success mt-3 mt-lg-0"
                        value="Thêm giá trị">
                    @foreach ($attributes as $attribute)
                        <div class="row attribute-content">
                            <div class="mb-3 col-lg-5 mt-2">
                                <input type="text"
                                    name="product_attribute[{{ $attribute->product_attribute_id }}][name]"
                                    value="{{ isset($attribute->name) ? $attribute->name : '' }}"
                                    class="form-control name ui-autocomplete-input" autocomplete="off">
                                <input type="hidden"
                                    name="product_attribute[{{ $attribute->product_attribute_id }}][product_attribute_id]"
                                    value="{{ $attribute->product_attribute_id }}" class="attribute_id">
                            </div>

                            <div class="mb-3 col-lg-6">
                                <textarea name="product_attribute[{{ $attribute->product_attribute_id }}][text]" rows="2"
                                    class="form-control text">{{ $attribute->text }}</textarea>
                            </div>

                            <div class="col-lg-1 mt-2">
                                <button type="button" class="btn btn-outline-light"><i
                                        class="bx bx-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                    <div class="attribute-body">
                        <div class="row attribute-content" style="display: none;">
                            <div class="mb-3 col-lg-5 mt-2">
                                <input type="text" name="product_attribute[0][name]" class="form-control name"
                                    placeholder="Tên server" disabled="disabled">
                                <input type="hidden" name="product_attribute[0][attribute_id]" value=""
                                    class="attribute_id" disabled="disabled" />
                            </div>

                            <div class="mb-3 col-lg-6">
                                <textarea name="product_attribute[0][text]" rows="2" class="form-control text" placeholder="Đường dẫn"
                                    disabled="disabled"></textarea>
                            </div>

                            <div class="col-lg-1 mt-2">
                                <button type="button" class="btn btn-outline-light"
                                    onclick="$(this).closest('.append').remove()"><i class="bx bx-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end row -->

<script>
    var image_row = '{{ count($product_images) }}';

    function addImage() {
        html = '<div class="content-image-other mb-3 col-md-1 mx-3" id="image-row' + image_row + '">';
        html +=
            '<button type="button" onclick="$(this).parent().remove()" class="btn position-absolute top-0 end-0 translate-middle badge bg-danger px-2 font-size-12"><i class="bx bx-trash"></i> Xóa</button>';
        html += '<a href="" id="thumb-image' + image_row +
            '"data-toggle="image" class="img-thumbnail"><img class="product__related-btn-add" src="' + $(
                '.image-default').val() + '" alt="" title="" data-placeholder="' + $('.image-default').val() +
            '" /></a><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' +
            image_row + '" />';
        html += '</div>';

        $('#images #images__add').before(html);
        return image_row++;
    }
</script>
