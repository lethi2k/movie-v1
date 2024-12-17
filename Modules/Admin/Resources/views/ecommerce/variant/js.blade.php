<script>
    //add option value
    var row_variant = '{{$key}}';
    $(".add-variant-value").click(function() {
        row_variant++;
        var variant_content = $('.variant-value-content').find('.row').first().clone();
        variant_content.attr('id', 'value-' + row_variant);
        variant_content.find('.option-name').attr('name', 'option_value[' + row_variant + '][name]').val('');
        variant_content.find('.option-image').attr('name', 'option_value[' + row_variant + '][image]').val('');
        variant_content.find('.option-sort').attr('name', 'option_value[' + row_variant + '][sort_order]').val(row_variant);
        variant_content.find('.delete-value').attr('onclick', '$(\'#value-' + row_variant + '\').remove()');
        $('.variant-value-content').last().append(variant_content);
    });

    //validate form
    $('.variant-validation').validate({
        lang: 'vi', // or whatever language option you have.
        rules: {
            'option_description[name]': {
                required: true,
                minlength: 2,
            },
            'option_value[0][name]': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>