@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Quản lý nhân viên</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Quản lý nhân viên</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{URL::asset('admin/setting/accounts/create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#customer-loyal" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Tất cả nhân viên</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#customer-all" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Đang làm việc</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3 text-muted">
                            <div class="tab-pane active" id="customer-all" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-check">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;" class="align-middle">
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="checkboxAll">
                                                        <label class="form-check-label" for="checkboxAll"></label>
                                                    </div>
                                                </th>
                                                <th class="align-middle">
                                                    <div class="title-name">
                                                        Khách hàng
                                                    </div>
                                                    <div class="btn-group action-content"
                                                        style="display: none; cursor: pointer;">
                                                        <div class="dropdown-toggle fw-bold" id="defaultDropdown"
                                                            data-bs-toggle="dropdown" data-bs-auto-close="true"
                                                            aria-expanded="false">
                                                            Chọn thao tác cho <span class="text-content fw-bold"></span>
                                                            khách hàng <i class="mdi mdi-chevron-down"></i>
                                                        </div>
                                                        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                                                            <li class="dropdown-item delete-user">Xóa khách hàng
                                                            </li>
                                                            <li class="dropdown-item active-user">Hoạt động</li>
                                                            <li class="dropdown-item inactive-user">Ngừng hoạt động
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </th>
                                                <th class="align-middle">Trạng thái</th>
                                                <th class="align-middle">Địa chỉ</th>
                                                <th class="align-middle text-end">Ngày tạo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input action-checkbox" type="checkbox" id="orderidcheck01" value="{{$user->user_id}}">
                                                        <label class="form-check-label" for="orderidcheck01"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.setting.accounts.edit', ['id' => $user->user_id])}}" class="link-primary mb-0">{{$user->email}}</a>
                                                </td>
                                                <td>
                                                    @if ($user->status)
                                                    <span class="text-success font-size-12 mb-2">Đang kích hoạt</span>
                                                    @else
                                                    <span class="text-danger font-size-12 mb-2">Ngừng kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-0">{{$user->firstname . ' '.
                                                        $user->lastname}} - {{$user->phone}}</p>
                                                    <p class="text-muted mb-0 w-430">
                                                        {{isset($user->address->address) ? $user->address->address . ' - ' : ''}}
                                                        {{isset($user->address->commune->name) ? $user->address->commune->name . ',' : ''}}
                                                        {{isset($user->address->district->name) ? $user->address->district->name . ',' : ''}}
                                                        {{isset($user->address->province->name) ? $user->address->province->name . ',' : ''}}
                                                        {{isset($user->address->country->name) ? $user->address->country->name : ''}}
                                                    </p>
                                                </td>
                                                <td class="text-end">
                                                    {{$user->date_added}}
                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
<script>
    $('.delete-user').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{route('admin.setting.accounts.destroyMultiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                user_ids: selected,
            },
            success: function(json) {
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
</script>
@endsection