@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin::elements.form.breadcrumb', ['title_form' => 'Thêm mới nhà sản xuất'])

        <!-- start form -->
        @include('admin::ecommerce.manufacturer.form', [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\ManufacturerController@store'),
        'name' => null,
        'image' => 'images/default.png',
        ])


    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.manufacturer.js')
@endsection