@php
$node .= ' &nbsp &nbsp &nbsp &nbsp';
@endphp

@foreach($childs as $child)
    <div class="row my-2">
        <div class="col-md-8">
            <a href="{{route('admin.links.edit', ['id' => $child->taskbar_group_id, 'taskbar_id' => $child->taskbar_id])}}" class="card-title font-size-16 link-primary cursor-pointer">{!! $node !!}<span class="cursor-pointer"><i
                        class="mdi mdi-drag text-black"></i></span> &nbsp;&nbsp; {!! $child->description->name !!}</a>
        </div>
        <div class="col-md-4 text-end font-size-16">
            <a href="{{route('admin.links.destroy', ['id' => $child->taskbar_id])}}" class="btn btn-outline-light"><i class="bx bx-trash"></i></a>
        </div>
    </div>

    @if(count($child->childs))
        @include('admin::ecommerce.links.manage-child', ['childs' => $child->childs])
    @endif
@endforeach