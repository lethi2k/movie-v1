<script>
    //add option value
    var row_attribute = '{{$key}}';
    $(".add-attribute-value").click(function() {
        var attribute_content = $('.attribute-value-content').find('.row').first().clone();
        attribute_content.attr('id', 'value-' + row_attribute);
        attribute_content.find('.option-name').attr('name', 'attribute[' + row_attribute + '][name]').val('');
        attribute_content.find('.option-sort').attr('name', 'attribute[' + row_attribute + '][sort_order]').val(row_attribute);
        attribute_content.find('.delete-value').attr('onclick', '$(\'#value-' + row_attribute + '\').remove()');
        $('.attribute-value-content').last().append(attribute_content);
        row_attribute++;
    });

    //change select 2
    $('#group-attribute').change(function() {
        var opval = $(this).val();
        if (opval == "addAttribute") {
            $('#modalAttribute').modal("show")
        }
    });

    //close modal select 2
    $(".close-modal").click(function() {
        $("#group-attribute").val(0).trigger("change");
        $('#modalAttribute').modal("hide")
    });

    //validate form
    $('.attribute-validation').validate({
        lang: 'vi', // or whatever language option you have.
        rules: {
            'attribute_group_description[name]': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>