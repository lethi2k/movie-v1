<script>
    var row = 1;
    function addData(type) {
        var tab = $('#content-slider-tab-0').clone();
        tab.attr('id', 'content-slider-tab-' + row);
        tab.attr('href', '#content-slider-' + row);
        tab.attr('aria-controls', 'content-slider-' + row);
        tab.removeClass('active');
        tab.text('Tab content #' + row);
        var tabContent = $('#content-slider-0').clone();
        
        //rename name tag input
        if(type == 'gallery'){
            tabContent.find('#title').attr('name', 'image[' + row + '][title]');
            tabContent.find('#link').attr('name', 'image[' + row + '][link]');
            tabContent.find('#description').attr('name', 'image[' + row + '][description]');
            tabContent.find('#thumb-image').attr('name', 'image[' + row + '][image]');
        }

        //add placeholder for input
        tabContent.find('#title').attr('placeholder', 'Tab content #' + row);
        tabContent.attr('id', 'content-slider-' + row);
        tabContent.attr('aria-labelledby', 'content-slider-tab-' + row);
        tabContent.removeClass('active show');

        //rename id tag input
        if(type == 'service'){
            tabContent.find('#content-icons').attr('id', 'content-icons-' + row);
            tabContent.find('.content-icons').toggleClass('content-icons content-icons-'+ row);
            tabContent.find("label[for='content-icons']").attr('for', 'content-icons-' + row);

            tabContent.find("input[name='module_description[0][title]']").attr('name', 'module_description[' + row + '][title]');
            tabContent.find("input[name='module_description[0][icon]']").attr('name', 'module_description[' + row + '][icon]');
            tabContent.find("input[name='module_description[0][image]']").attr('name', 'module_description[' + row + '][image]');
            tabContent.find("input[name='module_description[0][width]']").attr('name', 'module_description[' + row + '][width]');
            tabContent.find("input[name='module_description[0][hight]']").attr('name', 'module_description[' + row + '][hight]');

            tabContent.find("textarea[name='module_description[0][description]']").attr('name', 'module_description[' + row + '][description]');
            tabContent.find("input[name='module_description[0][status]']").attr('name', 'module_description[' + row + '][status]').attr('data-id', row);
            tabContent.find("input[name='module_description[0][link]']").attr('name', 'module_description[' + row + '][link]');
            tabContent.find("input[name='module_description[0][button]']").attr('name', 'module_description[' + row + '][button]');
        }

        //rename id image 
        tabContent.find('#thumb-image0').attr('id', 'thumb-image' + row);
        tabContent.find('#input-image0').attr('id', 'input-image' + row);

        tabContent.find('#content-images').attr('id', 'content-images-' + row);
        tabContent.find('.content-images').toggleClass('content-images content-images-'+ row);
        tabContent.find("label[for='content-images']").attr('for', 'content-images-' + row);

        $('#v-pills-tab').append(tab);
        $('#v-pills-tabContent').append(tabContent);

        //change event for tab
        $('.change-content').on('change', function () {
            var value = $(this).val();
            var column_id = $(this).attr('data-id');

            if (value == 'icons') {
                $('.content-icons-' + column_id).show();
                $('.content-images-' + column_id).hide();
            } else {
                $('.content-icons-' + column_id).hide();
                $('.content-images-' + column_id).show();
            }
        });

        $('#v-pills-tab .nav-link').click(function () {
            var tab_active = $(this).attr('href');
            $('#v-pills-tabContent .tab-pane').removeClass('active show');
            $(tab_active).addClass('active show');
        });

        row++;
    }
</script>