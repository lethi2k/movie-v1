@foreach($option_value as $key => $value)
<div class="variant-value-content">
    <div data-repeater-item="" class="row" data-row="{{$key}}" id="value-{{$key}}">
        <div class="mb-3 col-lg-3">
            <input type="hidden" name="option_value[{{$key}}][option_value_id]" value="{{$value->option_value_id}}">
            <input type="text" id="name" name="option_value[{{$key}}][name]" class="form-control option-name" value="{{$value->description->name}}" placeholder="Giá trị">
        </div>

        <div class="mb-3 col-lg-4">
            <input type="file" value="{{$value->image}}" id="image" name="option_value[{{$key}}][image]" class="form-control option-image">
        </div>

        <div class="mb-3 col-lg-4">
            <input type="number" id="sort_order" name="option_value[{{$key}}][sort_order]" class="form-control option-sort" value="{{$value->sort_order}}">
        </div>

        <div class="col-lg-1">
            <button data-repeater-delete="" type="button" class="btn btn-outline-light delete-value" onclick="$('#value-{{$key}}').remove()"><i class="bx bx-trash"></i></button>
        </div>
    </div>
</div>
@endforeach