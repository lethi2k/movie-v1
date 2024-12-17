<script>
    //validate form
    $(document).ready(function() {
        $('.form-product').validate({
            lang: 'vi',
            rules: {
                'product_description[name]': {
                    required: true,
                    minlength: 2,
                }
            }
        });
    });
    //end

    $('#openManufacturer').click(function() {
        if ($("#modalManufacturer").find("select").data('select2')) {
            $("#modalManufacturer")
                .find("select")
                .select2("destroy")
                .end();
        }
        $('#modalManufacturer').modal("show")
    });

    $('#openCategory').click(function() {
        if ($("#modalCategory").find("select").data('select2')) {
            $("#modalCategory")
                .find("select")
                .select2("destroy")
                .end();
        }

        $('#modalCategory').modal("show")
    });

    //close modal select 2
    $(".close-modal").click(function() {
        $("#cateProduct").val(0).trigger("change");
        $('#modalCategory').modal("hide");
        $('#modalManufacturer').modal("hide");
    });

    $('#store').change(function() {
        $('.warehouse-body').find('.append').remove();
        $('.warehouse-body-variant').find('.append').remove();

        $.each($('#store').select2('val'), function(key, value) {
            //show list store product
            var list_store = $('.warehouse-body').find('.row').first().clone();
            if (list_store.find('.store-name').text() != value && value != 0) {
                list_store.find('.store-name').text(value);
                list_store.addClass('append');
                $('.warehouse-body').append(list_store);
            }

            //show select variant
            var variant_store = $('.warehouse-body-variant').find('.active').first().clone();
            variant_store.text(value);
            variant_store.removeClass('active');
            variant_store.addClass('append');
            $('.warehouse-body-variant').append(variant_store);
        });
    })

    if ($('.warehouse_status:checked').val() == 'active') {
        $('.content-goods').show();
    }

    if ($('.warehouse_status:checked').val() == 'inactive') {
        $('.content-goods').hide();
    }
    $('.warehouse_status').click(function() {
        if ($('.warehouse_status:checked').val() == 'active') {
            $('.content-goods').show();
        }

        if ($('.warehouse_status:checked').val() == 'inactive') {
            $('.content-goods').hide();
        }
    });

    $('.insurance_status').click(function() {
        if ($('.insurance_status:checked').val() == 'active') {
            $('.content-inactive').show();
        }

        if ($('.insurance_status:checked').val() == 'inactive') {
            $('.content-inactive').hide();
        }
    });

    $('.shipping_status').click(function() {
        if ($('.shipping_status:checked').val() == 'active') {
            $('.content-shipping').show();
        }

        if ($('.shipping_status:checked').val() == 'inactive') {
            $('.content-shipping').hide();
        }
    });

    $('.variant_status').click(function() {
        if ($('.variant_status:checked').val() == 'active') {
            $('.content-variant').show();
            $(".option-content").find("select").select2();
        }

        if ($('.variant_status:checked').val() == 'inactive') {
            $('.content-variant').hide();
        }
    });

    if ($('.variant_status:checked').val() == 'active') {
        $('.content-variant').show();
        $(".option-content").find("select").select2();
    }

    if ($('.variant_status:checked').val() == 'inactive') {
        $('.content-variant').hide();
    }

    $('.product_status').click(function() {
        if ($('.product_status:checked').val() == 'setDate') {
            $('.set-date').show();
        } else {
            $('.set-date').hide();
        }
    });
</script>

<script>
    var choose = 2;
    var row = 0;

    function addMoreMovie() {
        // content-episodes
        var attr_html = $('.episodes-body').find('.content-episodes').first().clone();
        if(row <= 0) {
            row += parseInt(attr_html.find('.product_option_id').val()) + 10000;
        }else{
            row++;
        }

        attr_html.find('.episode').attr('name', 'product_option[' + row + '][episode]').val(choose);
        attr_html.find('.name').attr('name', 'product_option[' + row + '][value]').val('');
        attr_html.find('.btn-remove').show();
        console.log(row);

        attr_html.addClass('append');
        $('.episodes-body').append(attr_html);
        choose++;
    }

    $('.product_action').click(function() {
        if ($('.product_action:checked').val() == 'many_episodes') {
            $('.episodes-body').find('.append').remove();
            $('.many_episodes').show();
            choose = 2;
        } else {
            $('.episodes-body').find('.append').remove();
            $('.many_episodes').hide();
            choose = 2;
        }
    });

    if ($('.product_action:checked').val() == 'many_episodes') {
        $('.many_episodes').show();
    } else {
        $('.many_episodes').hide();
    }

    function removeMovie(button) {
        $(button).closest('.append').remove();
    };
</script>

<!-- atribute -->
<script>
    var attribute_row = 0;

    function addAttribute() {

        //default
        if (attribute_row == 0) {
            $('.attribute-body').find('.attribute-content').show();
            $('.attribute-body').find('input').prop('disabled', false);
            $('.attribute-body').find('textarea').prop('disabled', false);
        }

        // add new
        if (attribute_row > 0) {
            var attr_html = $('.attribute-body').find('.attribute-content').first().clone();
            attr_html.find('.name').attr('name', 'product_attribute[' + attribute_row + '][name]');
            attr_html.find('.attribute_id').attr('name', 'product_attribute[' + attribute_row + '][attribute_id]');
            attr_html.find('.text').attr('name', 'product_attribute[' + attribute_row + '][text]');
            attr_html.addClass('append');
            $('.attribute-body').append(attr_html);
        }

        attributeautocomplete(attribute_row);
        attribute_row++;
    }

    function attributeautocomplete(attribute_row) {
        $('input[name=\'product_attribute[' + attribute_row + '][name]\']').autocomplete({
            'source': function(request, response) {
                $.ajax({
                    url: "{{ URL::asset('admin/attribute/autocomplete') }}?filter_name=" +
                        encodeURIComponent(request.term),
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json, function(item) {
                            return {
                                attribute_id: item.attribute_id,
                                value: item.name,
                                label: item.name,
                            }
                        }));
                    }
                });
            },
            'select': function(item, ui) {
                $('input[name=\'product_attribute[' + attribute_row + '][name]\']').val(ui.item.label);
                $('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').val(ui.item
                    .attribute_id);
            }
        });
    }

    //seo
    $(".seo-url").change(function() {
        $(this).val(toSeoUrl($(this).val()))
    });

    $("#ProductName").change(function() {
        $(".seo-url").val(toSeoUrl($(this).val()));
        $(".google-title").text($(this).val());
        url = "{{ URL::asset('admin/product') }}" + '/' + toSeoUrl($(this).val());
        $(".google-url").text(url);
    });

    // $(".description_short").change(function() {
    //     var description = $(this).val();
    //     description = description.substring(0, 350);

    //     //show google seo
    //     $('.google-description').text(description);
    // });
</script>
