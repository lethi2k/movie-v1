@php
    $node .= ' <span class="form-category__icon--dot mx-2"></span>';
@endphp
@foreach($childs as $child)
<tr>
    <td>
        <div class="form-check font-size-16">
            <input class="form-check-input action-checkbox" type="checkbox" id="orderidcheck01"
                value="{{$child->category_id}}">
        </div>
    </td>
    <td>
        <div class="d-flex" style="align-items: center">
            <div class="flex-shrink-0 me-3">
                {!! $node !!}
            </div>

            <div class="flex-grow-1">
                <h4 class="text-body font-size-14 my-1">
                    <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\CategoryController@edit',['id' => $child->category_id]) }}"
                        class="link-primary">
                        <span class="fw-500">{{$child->description->name}}</span>
                    </a>
                </h4>
                <p class="text-muted mb-1">STT: {{$child->sort_order}}</p>
            </div>
        </div>
    </td>
    <td>
        <img class="rounded avatar-sm" src="{{strlen($child->image) ? $child->image : URL::asset('images/default.png')}}" alt="Generic placeholder image">
    </td>
    <td class="text-end">
        <a target="_blank"
            href="{{action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@index', ['filter[product_ids]' => $child->product_ids()])}}">{{$child->products->count()}}
            sản phẩm</a>
    </td>
    @if (!isset($method) || $method != 'trash')
    <td class="text-end">
        <div class="form-switch form-switch-lg mb-3" dir="ltr">
            <input class="form-check-input change-status" data-id="{{$child->category_id}}" value="{{$child->status}}"
                type="checkbox" id="SwitchCheckSizelg" @if($child->status == 1)
            checked @endif>
        </div>
    </td>
    @endif
    <td class="text-end">
        le thi
    </td>
</tr>
@if(count($child->childs))
    @include('admin::ecommerce.category.manage-child',['childs' => $child->childs])
@endif
@endforeach