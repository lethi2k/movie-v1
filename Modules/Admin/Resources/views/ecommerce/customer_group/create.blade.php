@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới nhóm khách hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới nhóm khách hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.customer_group.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\CustomerGroupController@store'),
        'name' => null,
        'description' => null,
        'approval' => 0,
        'sort_order' => 0,
        'type_price' => null,
        'tax_rate_id' => null,
        'discount_percent' => 0,
        'payment' => null
        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {

        //validate form
        $('.customer-group-validation').validate({
            lang: 'vi',
            rules: {
                'customer_group_description[name]': {
                    required: true,
                    minlength: 2,
                },
                'customer_group_description[description]': {
                    required: true,
                    minlength: 2,
                },
                'customer_group[discount_percent]': {
                    max: 30,
                }
                
            }
        });
    });
</script>
@endsection