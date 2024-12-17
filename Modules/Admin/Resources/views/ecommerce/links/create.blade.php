@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Nhóm menu</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới nhóm menu</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.links.group.store')}}" method="post">
            @csrf
            @include('admin::elements.form.action', ['pre' => URL::asset('admin/links') ])
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name">Tên</label>
                                <input id="name" name="taskbar_group_description[name]" type="text" class="form-control"
                                    placeholder="vd: Menu chính, đầu trang, cuối trang...">
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <input id="sort_order" name="taskbar_group[sort_order]" type="number" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả menu</label>
                                <textarea name="taskbar_group_description[description]" id="description" cols="3" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Alias</h4>
                            <p>Alias này dùng để truy cập các thuộc tính của Menu trong Theme. <a href="">Tìm hiểu
                                    thêm</a>
                            </p>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>

    </div> <!-- container-fluid -->
</div>
@endsection