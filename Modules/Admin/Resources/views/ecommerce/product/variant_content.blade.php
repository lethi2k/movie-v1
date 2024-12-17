<div class="row">
    <div class="col-sm-6 mb-3">
        <label for="example-text-input" class="col-form-label">
            Thông tin 2 biến thể
        </label>
    </div>
    <div class="col-md-6 mb-3">
        <div class="text-sm-end me-3">
            <div class="btn-group">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    <i class="mdi mdi-map-marker-radius-outline"></i> Tất cả kho hàng <i class="mdi mdi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu warehouse-body-variant" aria-labelledby="defaultDropdown">
                    <li class="dropdown-item active">Tất cả kho hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-borderless mb-0">
        <thead>
            <tr>
                <th class="align-middle" style="width:30%">
                    <label for="email">Biến thể</label>
                </th>
                <th class="align-middle text-end">
                    <label for="email">Hình ảnh</label>
                </th>
                <th class="align-middle text-end">
                    <label for="email">Mã sp</label>
                </th>
                <th class="align-middle text-end">
                    <label for="email">Giá bán</label>
                </th>
                <th class="align-middle text-end">
                    <label for="email">Giá vốn</label>
                </th>
                <th class="align-middle text-end">
                    <label for="email">Số lượng</label>
                </th>
                <th class="align-middle text-end">

                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="align-middle">
                </td>
                <td class="align-middle text-end">
                </td>
                <td class="align-middle text-end">
                    <input type="text" class="form-control sku-all" placeholder="Mã chung">
                </td>
                <td class="align-middle text-end">
                    <input type="text" class="form-control price-all" placeholder="Giá chung">
                </td>
                <td class="align-middle text-end">
                    <input type="text" class="form-control cost-all" placeholder="Giá vốn chung">
                </td>
                <td class="align-middle text-end">
                    <input type="text" class="form-control quantity-all" placeholder="Số lượng chung">
                </td>
                <td class="align-middle text-end">
                    <button type="button" class="btn btn-outline-light" onclick="applyAll()"><i class="bx bx-add-to-queue"></i></button>
                </td>
            </tr>

            @foreach($option_datas as $option_key => $option_data)
                <?php 
                    if(isset($option_data->options)){
                        $option_values = collect($option_data->options)->map(function ($options){
                            return $options->optionValue->description->name;
                        })->toArray();
                        $option_data['option_value_name'] = implode(", ", $option_values);
                    }
                ?>
                <tr class="variant-content-{{$option_key}}">
                    <td class="align-middle">
                        <label for="option_value_name"><a href="javascript:void(0)" class="link-primary">{{$option_data['option_value_name']}}</a></label>
                        <input type="hidden" name="product_variant[{{$option_key}}][option_pair]" value="{{$option_data['option_value_id']}}">
                    </td>
                    <td class="align-middle text-end">
                        <input type="file" name="product_variant[{{$option_key}}][image]" class="form-control" placeholder="">
                    </td>
                    <td class="align-middle text-end">
                        <input type="text" name="product_variant[{{$option_key}}][model]" class="form-control product-variant-sku" placeholder="Tự động">
                    </td>
                    <td class="align-middle text-end">
                        <input type="text" name="product_variant[{{$option_key}}][price]" class="form-control product-variant-price" placeholder="0đ">
                    </td>
                    <td class="align-middle text-end">
                        <input type="text" name="product_variant[{{$option_key}}][cost]" class="form-control product-variant-cost" placeholder="0đ">
                    </td>
                    <td class="align-middle text-end">
                        <input type="text" name="product_variant[{{$option_key}}][quantity]" value="1" class="form-control product-variant-quantity" placeholder="1">
                    </td>
                    <td class="align-middle text-end">
                        <button type="button" onclick="$('.variant-content-{{$option_key}}').remove();" class="btn btn-outline-light"><i class="bx bx-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>

    <div class="text-sm-end me-3">
        <p class="card-title-desc">Tổng cộng tại kho hàng: <label>5 sản phẩm</label></p>
    </div>
</div>