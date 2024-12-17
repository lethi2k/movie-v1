<script>
    //validate form
    $('.supplier-validation').validate({
        lang: 'vi',
        rules: {
            'name': {
                required: true,
                minlength: 2
            },
            'phone': {
                required: true,
                matches: "[0-9]+",
                minlength: 10,
                maxlength: 10
            },
            'email': {
                required: true,
                email: true
            },
            'company': {
                required: true,
                minlength: 2
            },
            'country_id': {
                required: true
            },
            'province_id': {
                required: true
            },
            'district_id': {
                required: true
            },
            'ward_id': {
                required: true
            }
        }
    });
</script>