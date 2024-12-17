<div class="modal fade bs-example-modal-lg" id="modalCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                <button type="button" class="btn-close close-modal"></button>
            </div>
            <div class="modal-body">
                @include('admin::ecommerce.category.form',
                [
                    'action' => action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@store'),
                    'parents' => $parents,
                    'parent_id' => 0,
                    'sort_order' => 0,
                    'image' => null,
                    'name' => null,
                    'status' => 1,
                    'description' => null,
                    'meta_title' => null,
                    'seo_url' => null,
                    'meta_description' => null,
                    'model' => 'Bỏ qua',
                    'google_title' => 'Tiêu đề của danh mục trên Google',
                    'google_url' => 'Đường dẫn của danh mục trên Google',
                    'google_description' => 'Mô tả của danh mục trên Google',
                ])
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal">Bỏ qua</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </div> -->
        </div>
    </div>
</div>