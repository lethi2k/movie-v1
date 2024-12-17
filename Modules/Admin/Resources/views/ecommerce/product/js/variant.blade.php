<script>
    $(document).ready(function() {
        //start add product option variant default
        var options_default = '{!! $options_json !!}';
        options_default = JSON.parse(options_default);
        var row_option = 0;

        //check doi gia tri select
        $(".option-select").change(function() {
            addOptionValue(options_default);
        });

        $(".option-content").find("select").select2();
        addOption(options_default);
        //end

        //start check click add on option
        $(".add-option").click(function() {
            row_option++;

            //remove select 2   
            $(".option-content").find("select").select2("destroy").end();

            // clone the row and insert it in the DOM
            var html_option = $(".option-content").find(".row").first().clone();
            html_option.addClass('option-row-' + row_option);
            html_option.find('.option-select').empty();
            $(".option-content").append(html_option);

            // append Select2 on the select elements
            $(".option-content").find("select").select2();
            addOption(options_default, row_option);

            //check doi gia tri select
            $(".option-select").change(function() {
                addOptionValue(options_default, row_option, $(this).select2("val"));
            });
        });
        //end
    });

    //start them nut select option
    function addOption(options_default, row = 0) {

        //duyet va lay gia tri theo select
        $(".option-select").each(function(e, v) {
            html = '';
            option_html = $(this).find(':selected').val();
            $.each(options_default, function(i, option) {
                html += '<option value="' + option.option_id + '">' + option.description.name + '</option>';
            });
            $('.option-select').empty().append(html);
        });
        $(".option-select").attr('name', 'product_option_value[' + row + '][option_id]');

        //xoa gia tri khong duoc chon
        $(".option-select").each(function(e, v) {
            $('.option-select').not($(v)).find('option[value="' + $(v).val() + '"]').remove();
        });

        //mac dinh
        if (row == 0) {
            addOptionValue(options_default);
        }

        // them moi
        if (row > 0) {
            var option_id = $('.option-row-' + row).find('.option-select').select2("val");
            addOptionValue(options_default, row, option_id);
        }
    }
    //end

    //start them nut value theo option
    function addOptionValue(options_default, row = 0, option_id = 0) {

        //mac dinh
        if (row == 0) {

            //duyet va lay gia tri theo select
            $(".option-select").each(function(index) {

                var option_select = [];
                if (options_default[$(this).select2("val")] !== undefined) {
                    html = '';
                    $.each(options_default[$(this).select2("val")]['values'], function(key, value) {
                        html += '<option value="' + value.option_id + '-' + value.option_value_id + '">' + value.description.name + '</option>';
                    });

                    $('.option-value-select').empty().append(html);
                    $(".option-value-select").attr('name', 'product_option_value[' + row + '][option_value_id]');
                    return false;
                }
            });
        }

        // them moi
        if (row > 0) {
            if (options_default[option_id] !== undefined) {
                html = '';
                $.each(options_default[option_id]['values'], function(key, value) {
                    html += '<option value="' + value.option_id + '-' + value.option_value_id + '">' + value.description.name + '</option>';
                });

                $('.option-row-' + row).find('.option-value-select').empty().append(html);
                $('.option-row-' + row).find('.option-value-select').attr('name', 'product_option_value[' + row + '][option_value_id][]');
            }
        }

    }
    //end

    //start random product variant
    $('.gerenal-variant').click(function(e) {
        var Elem = e.target;
        if (Elem.nodeName == 'INPUT') {
            data_tag = [];
            $(".option-value-select").each(function(e, v) {
                if ($(this).select2("data") && $(this).select2("data").length > 0) {
                    option_value = $(this).select2("data");
                    data_tag[e] = option_value;
                }
            });

            if (data_tag.length > 0) {
                $.ajax({
                    url: "{{URL::asset('admin/product/variant/ajax')}}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'data_tag': JSON.stringify(data_tag),
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        $('.body-variant').empty().append(response.html_variants);

                        //add store
                        $('.warehouse-body-variant').find('.append').remove();
                        $.each($('#store').select2('val'), function(key, value) {
                            var variant_store = $('.warehouse-body-variant').find('.active').first().clone();
                            variant_store.text(value);
                            variant_store.removeClass('active');
                            variant_store.addClass('append');
                            $('.warehouse-body-variant').append(variant_store);
                        });
                    }
                });
            }

        }
    });
    //end

    //start apply all price, quantity, cost ....
    function applyAll() {
        var sku_all = $('.sku-all').val();
        var price_all = $('.price-all').val();
        var cost_all = $('.cost-all').val();
        var quantity_all = $('.quantity-all').val();

        if (sku_all.length > 0) {
            $(".product-variant-sku").each(function(i, v) {
                $(v).val(sku_all + i)
            });
        }

        if (price_all.length > 0) {
            $(".product-variant-price").each(function(i, v) {
                $(v).val(price_all)
            });
        }

        if (cost_all.length > 0) {
            $('.product-variant-cost:not([style*="display: none"]').each(function(i, v) {
                $(v).val(cost_all)
            });
        }

        if (quantity_all.length > 0) {
            $('.product-variant-quantity:not([style*="display: none"]').each(function(i, v) {
                $(v).val(quantity_all)
            });
        }
    }
    //end
</script>