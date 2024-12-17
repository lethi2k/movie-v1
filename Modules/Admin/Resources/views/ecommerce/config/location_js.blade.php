<script>
    //load province
    $('#country_id').change(function() {
        loadProvince($(this).val());
    });
    loadProvince(230);

    function loadProvince(country_id, province_id = '{{$province_id}}') {
        $.ajax({
            url: "{{URL::asset('location/province')}}/" + country_id,
            dataType: 'json',
            success: function(json) {
                $('#province_id').empty();

                html = '<option value="0" selected="selected">Lựa chọn</option>';
                if (json.length > 0) {
                    for (i = 0; i < json.length; i++) {
                        html += '<option value="' + json[i]['province_id'] + '"';

                        if (json[i]['province_id'] == province_id) {
                            loadDistrict(json[i]['province_id']);
                            html += ' selected="selected"';
                        }

                        html += '>' + json[i]['name'] + '</option>';
                    }
                }

                $('#province_id').append(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    //load district
    $('#province_id').change(function() {
        $('#commune_id').empty();
        loadDistrict($(this).val());
    });

    function loadDistrict(province_id, district_id = '{{$district_id}}', load = true) {
        $.ajax({
            url: "{{URL::asset('location/district')}}/" + province_id,
            dataType: 'json',
            success: function(json) {
                $('#district_id').empty();

                html = '<option value="0" selected="selected">Lựa chọn</option>';
                if (json.length > 0) {
                    for (i = 0; i < json.length; i++) {
                        html += '<option value="' + json[i]['district_id'] + '"';

                        if (json[i]['district_id'] == district_id) {
                            if(load){
                                loadCommune(json[i]['district_id']);
                            }
                            
                            html += ' selected="selected"';
                        }

                        html += '>' + json[i]['name'] + '</option>';
                    }
                }

                $('#district_id').append(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    //load commune
    $('#district_id').change(function() {
        loadCommune($(this).val());
    });

    function loadCommune(district_id, commune_id = '{{$commune_id}}') {
        $.ajax({
            url: "{{URL::asset('location/commune')}}/" + district_id,
            dataType: 'json',
            success: function(json) {
                $('#commune_id').empty();
                html = '<option value="0" selected="selected">Lựa chọn</option>';
                if (json.length > 0) {
                    for (i = 0; i < json.length; i++) {
                        html += '<option value="' + json[i]['commune_id'] + '"';
                        if (json[i]['commune_id'] == commune_id) {
                            html += ' selected="selected"';
                        }

                        html += '>' + json[i]['name'] + '</option>';
                    }
                }

                $('#commune_id').append(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
</script>