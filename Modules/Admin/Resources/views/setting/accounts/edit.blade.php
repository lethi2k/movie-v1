@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thông tin nhân viên</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thông tin nhân viên</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{route('admin.setting.accounts.update', ['id' => $user->user_id])}}" method="post"
            enctype="multipart/form-data" class="user-validation">
            @csrf
            @include('admin::elements.form.action', ['pre' => route('admin.setting.accounts') , isset($model) ? $model :
            '' ])

            <div class="row">
                <div class="col-md-4">
                    <h4 class="card-title">Thông tin tài khoản</h4>
                    <p class="card-title-desc">Các thông tin cơ bản của tài khoản đang đăng nhập hệ thống</p>
                </div>
                <div class="col-md-8">
                    <div class="card data-user-infor">
                        <div class="card-body">
                            <h4 class="card-title">Hồ sơ</h4>
                            <p class="card-title-desc">Gồm thông tin của khách hàng gồm tài khoản, tên, mật khẩu ...</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">Họ tên</label>
                                        <input id="name" name="user[name]"
                                            value="{{$user->firstname . $user->lastname}}" type="text"
                                            class="form-control" placeholder="Nhập vào bắt buộc">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input id="email" name="user[email]" value="{{$user->email}}" type="email"
                                            class="form-control" placeholder="Nhập vào bắt buộc">
                                    </div>
                                    <div class="mb-3">
                                        <label for="birthday">Ngày sinh</label>
                                        <input type="date" name="user[birthday]" value="{{date("Y-m-d", strtotime($user->birthday))}}"
                                            class="form-control" id="birthday">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="phone">Số điện thoại</label>
                                        <input id="phone" name="user[phone]" value="{{$user->phone}}" type="number"
                                            class="form-control" placeholder="Nhập vào bắt buộc">
                                    </div>

                                    <div class="mb-3">
                                        <label class="d-block mb-3">Giới tính :</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user_gender" id="male-gender" type="radio"
                                                name="user[gender]" value="male" {{$user->gender == 'male' ? 'checked' :
                                            ''}}>
                                            <label class="form-check-label" for="male-gender">Nam</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user_gender" id="female-gender" type="radio"
                                                name="user[gender]" value="female" {{$user->gender == 'female' ?
                                            'checked' : ''}}>
                                            <label class="form-check-label" for="female-gender">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">Quốc gia</label>
                                        <select class="form-control" name="address[country_id]" id="country_id">
                                            <option value="230" selected>Việt Nam</option>
                                            <!-- <option value="2">Mỹ</option> -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Quận huyện</label>
                                        <select class="form-control select2" name="address[district_id]"
                                            id="district_id">
                                            <option value="">Lựa chọn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productdesc">Tỉnh, thành phố</label>
                                        <select class="form-control select2" name="address[province_id]"
                                            id="province_id">
                                            <option value="0">Lựa chọn</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productdesc">Xã phường</label>
                                        <select class="form-control select2" name="address[commune_id]" id="commune_id">
                                            <option value="0">Lựa chọn</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Ghi chú</label>
                                        <textarea class="form-control" name="user[note]" id="note" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="card-title">Liên kết tài khoản</h4>
                    <p class="card-title-desc">Thông tin các tài khoản Facebook, Google và Apple đang liên kết với tài
                        khoản Sapo của bạn hỗ trợ đăng nhập bằng nhiều phương thức.</p>
                </div>
                <div class="col-md-8">
                    <div class="card data-user-config">
                        <div class="card-body">
                            <h4 class="card-title">Vai trò nhân viên</h4>
                            <p class="card-title-desc">Cài đặt tài khoản với hệ thống</p>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="user_group_id">Nhóm khách hàng</label>
                                    <select name="user[user_group_id]" class="select2-search-disable user-group"
                                        id="user_group_id">
                                        <option value="0">Chọn vai trò</option>
                                        @foreach ($groups as $group)
                                        <option value="{{$group->user_group_id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="store_id">Chi nhánh *</label>
                                    <select name="user[store_id]" class="select2-search-disable branch" id="store_id">
                                        <option value="0">Chọn chi nhánh</option>
                                        <option value="1">Tất cả chi nhánh</option>
                                        @foreach ($stores as $store)
                                        <option value="{{$store->store_id}}">{{$store->description->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">STT</th>
                                            <th class="align-middle">Vai trò</th>
                                            <th class="align-middle">Chi nhánh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="content-user-group" style="display: none">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                    <label class="form-check-label" for="orderidcheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="">#1</a>
                                            </td>
                                            <td>
                                                <p class="text-muted role-name"></p>
                                            </td>

                                            <td>
                                                <p class="text-muted role-branch">

                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.config.location_js',
[
    'province_id' => $user->address->province_id,
    'district_id' => $user->address->district_id,
    'commune_id' => $user->address->commune_id
]
);

<script>
    $('.branch').change(function(){
        var role_name = $('.user-group').find(":selected").text();

        if($('.user-group').find(":selected").val() != 0 && $(this).find(":selected").val() != 0){
            $('.content-user-group').show();
            $('.content-user-group').find('.role-name').text(role_name);
            $('.content-user-group').find('.role-branch').text($(this).find(":selected").text());
        }else{
            $('.content-user-group').hide();
        }
    });

    $('.user-group').change(function(){
        var role_branch = $('.branch').find(":selected").text();

        if($('.branch').find(":selected").val() != 0 && $(this).find(":selected").val() != 0){
            $('.content-user-group').show();
            $('.content-user-group').find('.role-name').text($(this).find(":selected").text());
            $('.content-user-group').find('.role-branch').text(role_branch);
        }else{
            $('.content-user-group').hide();
        }
    });

    $(document).ready(function() {

        //validate form
        $('.user-validation').validate({
            lang: 'vi',
            rules: {
                'user[name]': {
                    required: true,
                    minlength: 2,
                },
                'user[email]': {
                    required: true,
                    email: true,
                },
                'user[phone]': {
                    required: true,
                    phoneNumber: {matches:"[0-9]+",minlength:10, maxlength:10}
                },
                'user[password]': {
                    required: true,
                    minlength: 2,
                },
                'user[confirm]': {
                    required: true,
                    equalTo : "#password"
                },
                'user[address]': {
                    required: true,
                    minlength: 2,
                },
                'address[province_id]': {
                    required: true,
                    min: 1,
                },
                'address[district_id]': {
                    required: true,
                    min: 1,
                },
                'address[commune_id]': {
                    required: true,
                    min: 1,
                },
            }
        });
    });
</script>
@endsection