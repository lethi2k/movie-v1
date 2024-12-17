<form action="{{route('admin.post.blog.filter')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bộ lọc Bài viết</h4>
                    <p class="card-title-desc">Bạn có thể lọc thông tin Bài viết qua Danh mục, Tên, Đơn hàng, Số
                        lượng ....</p>

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Từ khóa</label>
                                <div class="col-md-10">
                                    <div class="d-flex ">
                                        <div class="w-25">
                                            <div class="input-group">
                                                <select class="rounded-end-none form-select" name="filter[blog][key]">
                                                    <option value="name">Tất cả</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-75 bd-highlight">
                                            <div class="search-product-right">
                                                <div class="position-relative">
                                                    <input type="text" class="rounded-start-none form-control"
                                                        placeholder="Tìm kiếm" name="filter[blog][value]"
                                                        value="{{$value}}">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Ngày Đăng</label>
                                <div class="col-md-10">
                                    <div class="input-daterange input-group" id="datepicker6"
                                        data-date-format="dd M, yyyy" data-date-autoclose="true"
                                        data-provide="datepicker" data-date-container="#datepicker6">
                                        <input type="text" class="form-control" name="filter[blog][date_start]"
                                            placeholder="Start Date" value="{{$date_start}}">
                                        <input type="text" class="form-control" name="filter[blog][date_end]"
                                            placeholder="End Date" value="{{$date_end}}">
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
                                                    <option value="-1">Tất cả</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->category_id}}"
                                                        {{$category_id == $category->category_id ? 'selected' :
                                                        ''}}>{{$category->description->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Tác giả</label>
                                <div class="col-md-10">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="input-group">
                                                <select class="form-select" name="filter[user][user_id]">
                                                    <option value="-1">Tất cả</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{$user->user_id}}" {{$user->user_id ==
                                                        $user_id ? 'selected' : ''}}>{{$user->username}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm</button>
                        <a href="{{route('admin.post.blog.list')}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>