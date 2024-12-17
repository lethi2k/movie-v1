@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới khách hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới khách hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.customer.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@store'),
        'name' => null,
        'email' => null,
        'telephone' => null,
        'birthday' => null,
        'gender' => null,
        'note' => null,
        'newsletter' => null,
        'approved' => null,
        'status' => 0,
        'safe' => null,
        'method' => null,
        'sort_order' => 0,
        'type' => 'Radio',
        'can_active' => 0,
        'can_pickup' => 0,
        'can_return' => 0,
        'customer_group_id' => 0,
        'customer_address' => [],
        'action_form' => 'create',
        'attributes' => [],
        'groups' => $groups
        ])

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.customer.modal', ['action' =>
action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@address', ['customer_id' => 0])])

@endsection

@section('js')
@include('admin::ecommerce.config.location_js',
[
'province_id' => 0,
'district_id' => 0,
'commune_id' => 0
]
);

<script>
    $(document).ready(function() {
    $('.data-customer-address').find('select').select2();

        //validate form
        $.validator.addMethod("phoneNumber", function(value) {
            return value == value.match('[0-9]+');
        });
        $('.customer-validation').validate({
            lang: 'vi',
            rules: {
                'customer[name]': {
                    required: true,
                    minlength: 2,
                },
                'customer[email]': {
                    required: true,
                    email: true,
                    remote: {
                        url: "{{route('customers.customer.checkName')}}",
                        type: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                        }
                    }
                },
                'customer[telephone]': {
                    required: true,
                    minlength:10,
                    maxlength:10,
                    phoneNumber: true
                },
                'customer[password]': {
                    required: true,
                    minlength: 2,
                },
                'customer[confirm]': {
                    required: true,
                    equalTo : "#password"
                },
                'address[address]': {
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