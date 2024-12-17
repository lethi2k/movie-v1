<form action="{{$action}}" method="post">
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-10 mb-2">
                            <div class="row">
                                <div class="d-flex col-md-12">
                                    <div class="w-25">
                                        <div class="input-group">
                                            <select class="rounded-end-none form-select" name="filter[key]">
                                                @foreach($option_keys as $option_key)
                                                    <option value="{{$option_key['id']}}" @if($option_id == $option_key['id']) selected @endif>{{$option_key['name']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-75 bd-highlight">
                                        <div class="search-product-right">
                                            <div class="position-relative">
                                                <input type="text" class="rounded-start-none form-control" name="filter[value]" value="{{$value}}" placeholder="Tìm kiếm">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
                                <a href="{{$pre}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>