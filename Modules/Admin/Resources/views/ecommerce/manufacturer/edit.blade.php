@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin::elements.form.breadcrumb', ['title_form' => 'Sửa nhà sản xuất'])

        <!-- start form -->
        @include('admin::ecommerce.manufacturer.form', [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\ManufacturerController@update', ['id' => $manufacturer->manufacturer_id]),
        'name' => $manufacturer->name,
        'image' => $manufacturer->image
        ])


    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.manufacturer.js')
@endsection