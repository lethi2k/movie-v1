<script>
    //validate form
    $('.manufacturer-validation').validate({
        lang: 'vi', // or whatever language option you have.
        rules: {
            'manufacturer[name]': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>