<div class="modal fade bs-example-modal-lg" id="modalManufacturer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới thương hiệu</h5>
                <button type="button" class="btn-close close-modal"></button>
            </div>
            <div class="modal-body">
                @include('admin::ecommerce.manufacturer.form', [
                    'action' => action('Modules\Admin\Http\Controllers\Ecommerce\ManufacturerController@store'),
                    'model' => 'Bỏ qua',
                    'name' => null,
                    'image' => null,
                ])
            </div>
        </div>
    </div>
</div>