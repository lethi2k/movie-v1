@foreach($attributes as $key => $attribute)
<div class="attribute-value-content">
    <div data-repeater-item="" class="row" data-row="{{$key}}" id="value-{{$key}}">
        <div class="mb-3 col-lg-6">
            <input type="hidden" name="attribute[{{$key}}][attribute_id]" value="{{$attribute->attribute_id}}">
            <input type="text" id="name" name="attribute[{{$key}}][name]" class="form-control option-name" placeholder="Giá trị" value="{{$attribute->description->name}}">
        </div>

        <div class="mb-3 col-lg-5">
            <input type="number" id="sort_order" name="attribute[{{$key}}][sort_order]" class="form-control option-sort" value="{{$attribute->sort_order}}">
        </div>

        <div class="col-lg-1">
            <button data-repeater-delete="" type="button" class="btn btn-outline-light delete-value" onclick="$('#value-{{$key}}').remove()"><i class="bx bx-trash"></i></button>
        </div>
    </div>
</div>
@endforeach