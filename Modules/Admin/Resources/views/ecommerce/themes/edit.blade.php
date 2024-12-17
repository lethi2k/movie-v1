@extends('admin::ecommerce.themes.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row pb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Giao diện</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Giao diện</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="mb-3">
                            <h5 class="card-title border-bottom pb-3">Thêm mới Module</h5>
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Chọn loại Module</label>
                                <select name="" id="choose-module" class="select2-search-disable choose-add-module">
                                    <option value="">Chọn thành phần</option>
                                    @foreach ($extensions as $extension)
                                    <optgroup label="{{$extension->name}}">
                                        @foreach ($extension->modules as $module)
                                        <option value="{{$module->module_id}}">{!! $module->name !!}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Chọn loại layout</label>
                                <select name="" id="choose-content" class="select2-search-disable choose-add-module">
                                    <option value="content_maintop">NỘI DUNG TRÊN</option>
                                    <option value="column_left">CỘT TRÁI</option>
                                    <option value="column_right">CỘT PHẢI</option>
                                    <option value="content_mainbottom">NỘI DUNG DƯỚI</option>
                                </select>
                            </div>

                            <div class="text-center mt-3">
                                <button type="button"
                                    class="btn btn-outline-light waves-effect waves-light px-5 mx-auto create-content-module">
                                    <i class="mdi mdi-plus"></i> Thêm Thành phần mới</button>
                            </div>
                        </div> --}}

                        @foreach ($extensions as $extension)
                        <div class="content-extension">
                            <div class="row border-bottom font-size-18 mb-3">
                                <div class="col-md-6">
                                    <h5 class="card-title">{{$extension->name}}</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{$extension->href}}"><i class="mdi mdi-plus-circle-multiple"></i></a>
                                </div>
                            </div>

                            @foreach ($extension->modules as $module)
                            <div class="mb-3">
                                <div class="row my-3 cursor-pointer font-size-18">
                                    <div class="col-md-8">
                                        <a class="card-title"
                                            href="{{route('admin.ecommerce.extension.module.edit', ['type' => $extension->code, 'module_id' => $module->module_id])}}">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                            <span class="name ms-3" style="font-size: 16px;font-weight: 500;">{!!
                                                $module->name !!}</span>
                                        </a>
                                    </div>

                                    <div class="col-md-4 text-end">
                                        <a href="javascript:void(0);" class="add-module-content"
                                            data-bs-toggle="popover" data-module-name="{!! $module->name !!}"
                                            data-module="{{$extension->code . '.' . $module->module_id}}"><i
                                                class="mdi mdi-plus-circle-outline"></i></a>
                                        <a href="{{route('admin.ecommerce.extension.module.destroy', ['type' => $extension->code, 'module_id' => $module->module_id])}}"
                                            class="text-danger"><i class="bx bx-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <form action="{{route('admin.ecommerce.themes.update', $id)}}" method="post"
                    enctype="multipart/form-data" class="gallery-validation">
                    @csrf
                    @include('admin::elements.form.action', ['pre' => route('admin.ecommerce.themes.edit', 1) ])
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card me-4">
                                <div class="card-body content_maintop">
                                    <h5 class="card-title border-bottom pb-3">NỘI DUNG TRÊN</h5>

                                    @foreach ($layout_modules as $layout_module)
                                    @if ($layout_module->position == 'content_maintop')
                                    <div class="row my-3 font-size-18">
                                        <div class="col-md-8">
                                            <h4 class="card-title link-primary">
                                                <i class="mdi mdi-drag text-black"></i>
                                                <span class="name ms-3"
                                                    style="font-size: 16px;font-weight: 500;">{{$layout_module->module()->name}}</span>
                                            </h4>

                                            <div class="content-input">
                                                <input type="hidden"
                                                    name="layout_module[{{'content_maintop' . explode('.', $layout_module->code)[1]}}][code]"
                                                    value="{{$layout_module->code}}">
                                                <input type="hidden"
                                                    name="layout_module[{{'content_maintop' . explode('.', $layout_module->code)[1]}}][position]"
                                                    value="{{$layout_module->position}}">
                                                <input type="hidden"
                                                    name="layout_module[{{'content_maintop' . explode('.', $layout_module->code)[1]}}][sort_order]"
                                                    value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();"
                                                class="text-danger"><i class="mdi mdi-delete"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                <!-- end card body  -->
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body column_left">
                                        <h5 class="card-title border-bottom pb-3">CỘT TRÁI</h5>

                                        @foreach ($layout_modules as $layout_module)
                                        @if ($layout_module->position == 'column_left')
                                        <div class="row my-3 font-size-18">
                                            <div class="col-md-8">
                                                <h4 class="card-title link-primary">
                                                    <i class="mdi mdi-drag text-black"></i>
                                                    <span class="name ms-3"
                                                        style="font-size: 16px;font-weight: 500;">{{$layout_module->module()->name}}</span>
                                                </h4>

                                                <div class="content-input">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_left' . explode('.', $layout_module->code)[1]}}][code]"
                                                        value="{{$layout_module->code}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_left' . explode('.', $layout_module->code)[1]}}][position]"
                                                        value="{{$layout_module->position}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_left' . explode('.', $layout_module->code)[1]}}][sort_order]"
                                                        value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="javascript:void(0);"
                                                    onclick="$(this).parent().parent().remove();" class="text-danger"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                    <!-- end card body  -->
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body column_right">
                                        <h5 class="card-title border-bottom pb-3">CỘT PHẢI</h5>

                                        @foreach ($layout_modules as $layout_module)
                                        @if ($layout_module->position == 'column_right')
                                        <div class="row my-3 font-size-18">
                                            <div class="col-md-8">
                                                <h4 class="card-title link-primary">
                                                    <i class="mdi mdi-drag text-black"></i>
                                                    <span class="name ms-3"
                                                        style="font-size: 16px;font-weight: 500;">{{$layout_module->module()->name}}</span>
                                                </h4>

                                                <div class="content-input">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_right' . explode('.', $layout_module->code)[1]}}][code]"
                                                        value="{{$layout_module->code}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_right' . explode('.', $layout_module->code)[1]}}][position]"
                                                        value="{{$layout_module->position}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'column_right' . explode('.', $layout_module->code)[1]}}][sort_order]"
                                                        value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="javascript:void(0);"
                                                    onclick="$(this).parent().parent().remove();" class="text-danger"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                    <!-- end card body  -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body content_mainbottom">
                                        <h5 class="card-title border-bottom pb-3">NỘI DUNG DƯỚI</h5>

                                        @foreach ($layout_modules as $layout_module)
                                        @if ($layout_module->position == 'content_mainbottom')
                                        <div class="row my-3 font-size-18">
                                            <div class="col-md-8">
                                                <h4 class="card-title link-primary">
                                                    <i class="mdi mdi-drag text-black"></i>
                                                    <span class="name ms-3"
                                                        style="font-size: 16px;font-weight: 500;">{{$layout_module->module()->name}}</span>
                                                </h4>

                                                <div class="content-input">
                                                    <input type="hidden"
                                                        name="layout_module[{{'content_mainbottom' . explode('.', $layout_module->code)[1]}}][code]"
                                                        value="{{$layout_module->code}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'content_mainbottom' . explode('.', $layout_module->code)[1]}}][position]"
                                                        value="{{$layout_module->position}}">
                                                    <input type="hidden"
                                                        name="layout_module[{{'content_mainbottom' . explode('.', $layout_module->code)[1]}}][sort_order]"
                                                        value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="javascript:void(0);"
                                                    onclick="$(this).parent().parent().remove();" class="text-danger"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                    <!-- end card body  -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>

        <!-- end row -->
    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.themes.module.gerenal-setting')

<div class="row my-3 content-module-default cursor-pointer font-size-18" style="display: none">
    <div class="col-md-8">
        <h4 class="card-title link-primary">
            <i class="mdi mdi-drag text-black"></i>
            <span class="name ms-3" style="font-size: 16px;font-weight: 500;"></span>
        </h4>
        <div class="content-input">

        </div>
    </div>
    <div class="col-md-4 text-end">
        <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="text-danger"><i
                class="mdi mdi-delete"></i></a>
    </div>
</div>

<div id="preview-module" class="wrapper-preview">
    <div class="preview-content"></div>
    <div id="loader" class="text-center"></div>
</div>
<div class="preview-bg" style="display: none;"></div>

@endsection
@section('js')
<script>
    $('.create-content-module').click(function() {
        if ($('#choose-module').val() == '') {
            alert('Vui lòng chọn module');
            return false;
        }

        var content = $('.content-module-default').clone().removeClass('content-module-default').show();
        content.find('.name').text($('#choose-module option:selected').text());

        $('.'+ $('#choose-content').val()).append(content);
    });
    
</script>
@endsection