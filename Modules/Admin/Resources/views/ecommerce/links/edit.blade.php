@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Menu</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới Menu</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-8">
                <form action="{{route('admin.links.update.group', $group->taskbar_group_id)}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @include('admin::elements.form.action', ['pre' => URL::asset('admin/links') ])
                            <div class="mb-3">
                                <label for="taskbar_group_description[name]">Tên</label>
                                <input id="taskbar_group_description[name]" name="taskbar_group_description[name]"
                                    type="text" class="form-control" placeholder="vd: Menu chính, Footer,..."
                                    value="{{$group->description->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom">Liên kết</h5>
                        <div class="card-body border-bottom">
                            @foreach ($group->taskbars as $taskbar)
                            <div class="row my-3 pb-1 border-bottom">
                                <div class="col-md-8">
                                    <a href="{{route('admin.links.edit', ['id' => $taskbar->taskbar_group_id, 'taskbar_id' => $taskbar->taskbar_id])}}" class="card-title font-size-16 link-primary cursor-pointer"><span
                                            class="cursor-pointer"><i class="mdi mdi-drag text-black"></i>
                                        </span>&nbsp;&nbsp; {!! $taskbar->description->name !!}</a>
                                </div>
                                <div class="col-md-4 text-end font-size-16">
                                    <a href="{{route('admin.links.destroy', ['id' => $taskbar->taskbar_id])}}"
                                        class="btn btn-outline-light"><i class="bx bx-trash"></i></a>
                                </div>
                            </div>

                            @if(count($taskbar->childs))
                            @php
                            $node = '';
                            @endphp
                            @include('admin::ecommerce.links.manage-child', ['childs' => $taskbar->childs])
                            @endif
                            @endforeach
                        </div>
                        <a href="javascript:void(0);" onclick="chooseModelAction()"
                            class="btn font-size-14 link-primary"
                            style="width:100%;border-radius:0px;background: #f8f8fb;"><i
                                class="mdi mdi-plus-circle me-1"></i> Thêm liên kết</a>
                    </div>

                    <!-- end row -->
                </form>
            </div>

            <div class="col-4">
                {{-- <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Alias</h4>
                        <p>Alias này dùng để truy cập các thuộc tính của Menu trong Theme. <a href="">Tìm hiểu
                                thêm</a>
                        </p>
                        <input type="text" class="form-control">
                    </div>
                </div> --}}

                <div class="card">
                    <div class="card-body">
                        <form action="{{isset($taskbar_infor->taskbar_id) ? route('admin.links.update', $taskbar_infor->taskbar_id) : route('admin.links.store')}}" method="post" class="form-address">
                            @csrf
                            <input type="hidden" name="taskbar[taskbar_group_id]" value="{{$group->taskbar_group_id}}">

                            <div class="mb-3">
                                <label for="taskbar_type_id">Kiểu menu</label>
                                <select id="taskbar_type_id" class="form-select select2" name="taskbar[taskbar_type_id]">
                                    <option value="0">Lựa chọn</option>
                                    @foreach ($taskbar_types as $taskbar_type)
                                        <option value="{{$taskbar_type->taskbar_type_id}}" {{isset($taskbar_infor->taskbar_type_id) && $taskbar_type->taskbar_type_id == $taskbar_infor->taskbar_type_id ? 'selected' : ''}}>{{$taskbar_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3" id="taskbar_type_data">
                                {{-- <label for="store_id">Trang thông tin</label> --}}
                                
                            </div>

                            <div class="mb-3">
                                <label for="name">Tên hiển thị</label>
                                <input id="name" name="taskbar_description[name]" value="{{isset($taskbar_infor->description->name) ? $taskbar_infor->description->name : ''}}" type="text"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="router_name">Đường dẫn</label>
                                <input id="router_name" name="taskbar[router_name]" value="{{isset($taskbar_infor->router_name) ? $taskbar_infor->router_name : ''}}" type="text"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="parent_id">Menu cha</label>
                                <select id="parent_id" class="form-select" name="taskbar[parent_id]">
                                    <option value="0">Lựa chọn</option>
                                    @foreach ($group->taskbars as $taskbar)
                                        <option value="{{$taskbar->taskbar_id}}" {{isset($taskbar_infor->parent_id) && $taskbar_infor->parent_id == $taskbar->taskbar_id ? 'selected' : ''}}>{{$taskbar->description->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="taskbar[status]" class="form-select">
                                    <option value="1">Bật</option>
                                    <option value="0" {{isset($taskbar_infor->status) && $taskbar_infor->status == 0 ? 'selected' : '' }}>Tắt</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Thứ tự</label>
                                <input id="sort_order" name="taskbar[sort_order]" value="{{isset($taskbar_infor->sort_order) ? $taskbar_infor->sort_order : 0 }}" type="number"
                                    class="form-control">
                            </div>

                            <div class="mb-3 text-center">
                                <a href="" id="thumb-image" data-toggle="image"
                                    class="img-thumbnail-primary img-thumbnail">
                                    <img width="200" src="{{isset($taskbar_infor->image) ? $taskbar_infor->image : asset('images/default.png') }}" class="input-image-overview"
                                        data-placeholder="{{isset($taskbar_infor->image) ? $taskbar_infor->image : asset('images/default.png') }}">
                                </a>
                                <input type="hidden" name="taskbar[image]" value="{{isset($taskbar_infor->image) ? $taskbar_infor->image : asset('images/default.png') }}"
                                    id="input-image">
                            </div>

                            <div class="text-sm-end">
                                <button type="submit" class="btn btn-success waves-effect save-shipping">
                                    <i class="bx bxs-save me-1"></i> Áp dụng
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div> <!-- container-fluid -->
</div>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('select[name=\'taskbar[taskbar_type_id]\']').trigger('change');
    });
    
    $('select[name=\'taskbar[taskbar_type_id]\']').bind('change', function () {
        var taskbar_type_id = $('#taskbar_type_id').find(":selected").val();
        var name_id = '{{isset($taskbar_infor->name_id) ? $taskbar_infor->name_id : 0}}';
        
        if (taskbar_type_id > 0) {
            $.ajax({
                url: '{{route('admin.ecommerce.links.ajax.taskbar')}}',
                type: 'POST',
                data: {
                    taskbar_type_id: taskbar_type_id,
                    _token: '{{csrf_token()}}'
                },
                success: function(json) {

                    //select
                    if(json.data.data != undefined && json.data.data.length > 0){
                        html = '<select id="name_id" class="form-select select2" name="taskbar[name_id]">';
                        html += '<option value="0">Lựa chọn</option>';
                        $.each(json.data.data, function (index, value) {
                            if (json.route == 'information_id') {
                                if (name_id == value[json.route]) {
                                    html += '<option value="' + value[json.route] + '" selected>' + value.description.title + '</option>';
                                } else {
                                    html += '<option value="' + value[json.route] + '">' + value.description.title + '</option>';
                                }
                            }else{
                                if (name_id == value[json.route]) {
                                    html += '<option value="' + value[json.route] + '" selected>' + value.description.name + '</option>';
                                } else {
                                    html += '<option value="' + value[json.route] + '">' + value.description.name + '</option>';
                                }
                            }
                        });
                        html += '</select>';
                    }

                    //input
                    if(json.data.data == undefined){
                        html = '<input name="taskbar[name_id]" value="{{isset($taskbar_infor->name_id) ? $taskbar_infor->name_id : ''}}" class="form-control" placeholder="Nhập link, ví dụ: https://www.yourdomain.com">';
                    }

                    $('#taskbar_type_data').empty().append(html);
                }
            });
        }else{
            $('#taskbar_type_data').empty();
        }
    });

</script>
@endsection