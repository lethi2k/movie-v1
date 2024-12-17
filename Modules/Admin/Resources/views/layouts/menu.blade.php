<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-apps">Thương mại điện tử</li>
                <li>
                    <a href="{{ URL::asset('admin/product/list/all') }}" class="waves-effect">
                        <i class="bx bx-basket"></i>
                        <span key="t-product">Sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>
                <!-- order -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-shop">Thành viên</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ URL::asset('admin/customers/customer/list/all') }}" key="t-products">Tất cả
                                người
                                dùng</a></li>
                        <li><a href="{{ URL::asset('admin/customers/feedback/list') }}" key="t-product-detail">Yêu cầu /
                                Phản hồi</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-file-manager">Website</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{ URL::asset('admin/store/rating') }}" key="t-rating">Đánh giá</a></li>
                        <li><a href="{{ URL::asset('admin/store/comment') }}" key="t-rating">Bình luận</a></li>
                        <li><a href="{{ URL::asset('admin/post/blog/list') }}" key="t-blog-list">Bài viết</a></li>
                    </ul>
                </li>
                <hr class="my-1">
                <li class="menu-title" key="t-apps">Cấu hình</li>
                <li>
                    <a href="{{ URL::asset('admin/setting/setting/list') }}" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-file-manager">Cài đặt hệ thống</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL::asset('admin/setting/application/list') }}" class="waves-effect">
                        <i class="bx bxs-widget"></i>
                        <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                        <span key="t-file-manager">Ứng dụng</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL::asset('admin/setting/file/list') }}" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager">File Manager</span>
                    </a>
                </li>
                <li id="image_popup">
                    <a href="javascript:void(0);" id="button-image-manager" class="waves-effect">
                        <i class="bx bxs-folder-open"></i>
                        <span key="t-file-manager">Thư viện ảnh</span>
                    </a>
                    <input id="filemanager" type="hidden" name="button-image-manager">
                </li>

            </ul>
        </div>
    </div>
</div>