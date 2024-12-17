<!-- ========== Left Sidebar Start ========== -->
{{-- vertical-menu-theme --}}
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-apps">Cấu hình layout</li>
                @foreach ($layouts as $layout)
                <li>
                    <a href="{{route('admin.ecommerce.themes.edit', $layout->layout_id)}}" class="waves-effect">
                        <i class="bx bx-basket"></i>
                        <span key="t-product">{{$layout->name}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        {{-- data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" --}}
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->