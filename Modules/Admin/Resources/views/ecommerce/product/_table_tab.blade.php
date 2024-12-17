<div class="table-responsive">
    <table class="table align-middle table-nowrap table-check">
        <thead class="table-light">
            <tr>
                <th style="width: 20px;" class="align-middle">
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="checkboxAll">
                        <label class="form-check-label" for="checkboxAll"></label>
                    </div>
                </th>
                <th class="align-middle">Tên phim</th>
                <th class="align-middle">Số tập</th>
                <th class="align-middle">Category</th>
                <th class="align-middle">Quality</th>
                <th class="align-middle">Publish Time</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if($products->count() <= 0 && !isset($filter))
                <td colspan="7">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-xl-6">
                            <img class="img-fluid" src="{{URL::asset('admin/assets/images/product/banner.png')}}" alt="Generic placeholder image">
                            <h4>Hãy thêm mới sản phẩm để bắt đầu bán hàng</h4>
                            <p class="card-title-desc">Bạn có thể lọc thông tin sản phẩm qua Danh mục, Tên, Đơn hàng, Số lượng ....</p>
                        </div>
                    </div>
                </td>
                @endif
                @if($products->count() <= 0 && isset($filter))
                <td colspan="7">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-xl-6">
                            <img class="img-fluid" src="{{URL::asset('admin/assets/images/product/banner_search.jpg')}}" alt="Generic placeholder image">
                            <h4>Không tìm thấy sản phẩm</h4>
                            <p class="card-title-desc">Bạn có thể lọc thông tin sản phẩm qua Danh mục, Tên, Đơn hàng, Số lượng ....</p>
                        </div>
                    </div>
                </td>
                @endif

            </tr>
            @foreach($products as $product)
            <tr>
                <td>
                    <div class="form-check font-size-16">
                        <input class="form-check-input action-checkbox" type="checkbox" value="{{$product->product_id}}">
                    </div>
                </td>
                <td>
                    <div class="d-flex" style="align-items: center">
                        <div class="flex-shrink-0 me-3">
                            <img class="rounded avatar-sm" src="{{(strlen($product->image) > 1 ? $product->image : 'images/default.png')}}" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1">
                            {{--
                            @if($product->status == 1)
                                <span class="badge badge-pill badge-soft-success font-size-12">Kinh doanh</span>
                            @endif
                            --}}

                            @if($product->status == 0)
                                <span class="badge badge-pill badge-soft-warning font-size-12">Ngừng kinh doanh </span>
                            @endif

                            <!-- fw-bold  -->
                            <h4 class="text-body font-size-15 my-1">
                                <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@edit',['id' => $product->product_id]) }}" class="link-primary">
                                    <span class="fw-500">{{$product->description->name}}</span>
                                </a>
                            </h4>
                            <p class="text-muted mb-1">Model: {{$product->model}}</p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Ngày đăng">
                                    <i class="bx bx-calendar"></i> {{$product->date_added->format('d-m-Y')}}
                                </li>
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Đánh giá">
                                    <i class="bx bx-comment-dots me-1"></i> 10
                                </li>
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Lượt xem">
                                    <i class="bx bx-show"></i> {{$product->viewed}}
                                </li>
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Lượt thích">
                                    <i class="bx bx-heart"></i> {{$product->points}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
                <td>
                    <span>{{ count($product->options) .'/'. $product->quantity }} tập</span>
                </td>
                <td><span>
                    @foreach($product->categories as $key => $category)
                            {{ $key>0 ? '/' : '' }}{{ $category->category->description->name }}
                    @endforeach
                </span></td>
                <td>
                    {{-- <span>{{ implode('/', json_decode($product->quality)) }}</span> --}}
                </td>
                <td>
                    <span>{{ $product->year_manufacture }}</span>
                <td>
                    <span>{{ $product->status }}</span>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@edit',['id' => $product->product_id]) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                        <a href="javascript:void(0);" onclick="confirmDelete($(this).attr('data-url'), 'sản phẩm')" data-url="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@destroy',['id' => $product->product_id]) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
