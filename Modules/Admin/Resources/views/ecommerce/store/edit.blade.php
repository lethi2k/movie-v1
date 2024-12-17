@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sửa cửa hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sửa cửa hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.store.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\StoreController@update', ['id' => $store->store_id]),
            'name' => $store->description->name,
            'fax' => $store->fax,
            'email' => $store->email,
            'telephone' => $store->telephone,
            'url' => $store->url,
            'introduction' => $store->description->introduction,
            'operating_time' => $store->description->operating_time,
            'comment' => $store->description->comment,
            'url_map' => $store->description->url_map,
            'meta_title' => $store->description->meta_title,
            'meta_description' => $store->description->meta_description,
            'code_header' => $store->description->code_header,
            'code_footer' => $store->description->code_footer,
            'address_id' => $store->address_id,
            'address' => $store->address->address,
            'logo' =>  strlen($store->logo) ? $store->logo : asset('images/default.png'),
        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
@include('admin::ecommerce.config.location_js',
[
'province_id' => $store->address->province->province_id,
'district_id' => $store->address->district->district_id,
'commune_id' => $store->address->commune->commune_id,
]
);
@endsection