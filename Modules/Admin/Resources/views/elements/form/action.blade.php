<div class="row">
    <div class="col-md-6">
        <div class="text-sm-start">
            @if(isset($model))
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light mb-4 me-2 pe-4 close-modal" data-bs-dismiss="modal">
                <i class="bx bx-arrow-back me-1"></i> {{$model}}</button>
            @else
            <a href="{{$pre}}" class="btn btn-outline-secondary waves-effect waves-light mb-4 me-2 pe-4">
                <i class="bx bx-arrow-back me-1"></i> Trở lại
            </a>
            @endif
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-sm-end">
            <button type="{{isset($type) ? $type : 'submit' }}" class="btn btn-outline-success waves-effect action-save">
                <i class="bx bxs-save me-1"></i> Lưu thay đổi
            </button>
        </div>
    </div>
</div>