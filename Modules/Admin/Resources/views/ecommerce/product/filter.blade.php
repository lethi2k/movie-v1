<form action="{{$action}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Từ khóa</label>
                <div class="col-md-10">
                    <div class="d-flex ">
                        <div class="w-25">
                            <div class="input-group">
                                <select class="rounded-end-none form-select" name="filter[product][key]">
                                    <option value="name" @if($key=='name') selected @endif>Tên</option>
                                    <option value="model" @if($key=='model' ) selected @endif>Model</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-75 bd-highlight">
                            <div class="search-product-right">
                                <div class="position-relative">
                                    <input type="text" value="{{$value}}" class="rounded-start-none form-control" name="filter[product][value]" placeholder="Tìm kiếm">
                                    <i class="bx bx-search-alt search-icon px-2 search-product"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Kho hàng</label>
                <div class="col-md-10">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <input type="text" name="filter[warehouse][min]" class="form-control" id="formrow-min" placeholder="Tối thiểu">
                        </div>
                        <span class="mx-3 mt-2"> - </span>
                        <div class="flex-grow-1 align-self-center">
                            <input type="text" class="form-control" name="filter[warehouse][max]" id="formrow-max" placeholder="Tối đa">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="input-group mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Danh mục</label>
                <div class="col-md-10">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="input-group">
                                <select class="form-select" name="filter[category][category_id]">
                                    <option value="all">Tất cả</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}" @if($category->category_id == $category_id) selected @endif>{{$category->description->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Đã bán</label>
                <div class="col-md-10">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <input type="text" class="form-control" name="filter[order][min]" id="order-min" placeholder="Tối thiểu">
                        </div>
                        <span class="mx-3 mt-2"> - </span>
                        <div class="flex-grow-1 align-self-center">
                            <input type="text" class="form-control" name="filter[order][max]" id="order-max" placeholder="Tối đa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm</button>
        <a href="{{URL::asset('admin/product/list/all')}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
    </div>
</form>