<script>
    $(document).ready(function() {
        $(".select-category-ajax").select2({
            ajax: {
                url: "{{$url}}",
                dataType: "json",
                type: "POST",
                allowClear: true,
                minimumResultsForSearch: -1,
                minimumInputLength: 2,
                multiple: true,
                delay: 250,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                processResults: (data, params) => {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: '<div>' + item.name + '</div>',
                                id: item.category_id
                            }
                        })
                    };
                },
                data: function(params) {
                    data.name = params.term;
                    return data;
                }
            },
            templateResult: function(data) {
                return data.text;
            },
            escapeMarkup: function(markup) {
                return markup;
            }
        });

        $("#name").change(function() {
            var seo_name = toSeoUrl($(this).val());

            //show google seo
            $('.google-title').text($(this).val());
            $('.google-url').text(seo_name);

            //add value input seo custom
            $('#metaTitle').val($(this).val());
            $('#seoUrl').val(seo_name);
        });

        $("#description").change(function() {
            var description = $(this).val();
            description = description.substring(0, 350);

            //show google seo
            $('.google-description').text(description);

            //add value input seo custom
            $('#meta_description').val(description);
        });

        //validate form
        $('.category-validation').validate({
            lang: 'vi', // or whatever language option you have.
            rules: {
                'category_description[name]': {
                    required: true,
                    minlength: 2,
                }
            }
        });

        $('#button-filter').on('click', function () {
                var url = "{{URL::asset('admin/category/list')}}";
                var category_id = $('.select-category-ajax').val();

                if (category_id) {
                    url += '?code=' + encodeURIComponent(category_id);
                }

                // var column_name = $('.column-filter').val();
                // if (column_name != '*') {
                //     url += '&column=' + encodeURIComponent(column_name);
                // }
                location = url;
            });

        //insert code here
    });
</script>