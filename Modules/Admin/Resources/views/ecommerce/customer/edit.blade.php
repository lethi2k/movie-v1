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
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@update', ['id' => $customer->customer_id]),
        'name' => $customer->name,
        'email' => $customer->email,
        'telephone' => $customer->telephone,
        'birthday' => $customer->birthday,
        'gender' => $customer->gender,
        'note' => $customer->note,
        'newsletter' => $customer->newsletter,
        'approved' => $customer->approved,
        'status' => $customer->status,
        'safe' => $customer->safe,
        'method' => $customer->method,
        'sort_order' => 0,
        'type' => 'Radio',
        'can_active' => '$customer->isActive()',
        'can_pickup' => '$customer->isPickup()',
        'can_return' => '$customer->isReturn()',
        'customer_address' => $customer->address,
        'customer_group_id' => $customer->customer_group_id,
        'action_form' => 'edit',
        'attributes' => [],
        'groups' => $groups
        ])

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.customer.modal', ['action' => action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@address', ['customer_id' => $customer->customer_id])])
@endsection

@section('js')
@include('admin::ecommerce.config.location_js',
[
'province_id' => 0,
'district_id' => 0,
'commune_id' => 0
]);

<script>
    var can_active = '{{$customer->isActive()}}';
    var can_pickup = '{{$customer->isPickup()}}';
    var can_return = '{{$customer->isReturn()}}';

    function emptyFormAddress() {
        $('#address').val('');
        $('#address_id').val(0);
        $("#province_id").val('0').change();
        $("#district_id").val('0').change();
        $("#commune_id").val('0').change();
        $("#address_default").attr("disabled", false).removeAttr('checked');
        $("#address_pickup").attr("disabled", false).removeAttr('checked');
        $("#address_return").attr("disabled", false).removeAttr('checked');
    }

    $('.add-address-customer').click(function() {
        $('#modalCustomer').modal('show');
        emptyFormAddress();

        if (can_active) {
            $("#address_default").attr("disabled", true);
        }

        if (can_pickup) {
            $("#address_pickup").attr("disabled", true);
        }

        if (can_return) {
            $("#address_return").attr("disabled", true);
        }

        $('.add-content-address-infor').find('input[type=checkbox]').prop('checked', false);
    });

    function editaddress(data) {
        var customer = JSON.parse(data);
        $('#modalCustomer').modal('show');
        emptyFormAddress();

        $("#province_id").val(customer.province_id).change();
        if (customer.province_id != null) {
            loadDistrict(customer.province_id, customer.district_id, false);
        }

        if (customer.district_id != null) {
            loadCommune(customer.district_id, customer.commune_id);
        }

        $('#address').val(customer.address);
        $('#address_id').val(customer.address_id);
        // checkConfig();

        if (customer.is_active) {
            $('#address_default').attr('checked', 'checked');
        }

        if (customer.is_pickup) {
            $('#address_pickup').attr('checked', 'checked');
        }

        if (customer.is_return) {
            $('#address_return').attr('checked', 'checked');
        }

        if (!customer.is_active && can_active) {
            $("#address_default").attr("disabled", true);
        }

        if (!customer.is_pickup && can_pickup) {
            $("#address_pickup").attr("disabled", true);
        }

        if (!customer.is_return && can_return) {
            $("#address_return").attr("disabled", true);
        }
    }
</script>
@endsection