!(function (s) {
    "use strict";
    var e,
        t = localStorage.getItem("language"),
        n = "en";
    function a(e) {
        document.getElementById("header-lang-img") &&
            ("en" == e
                ? (document.getElementById("header-lang-img").src = "admin/assets/images/flags/us.jpg")
                : "sp" == e
                    ? (document.getElementById("header-lang-img").src = "admin/assets/images/flags/spain.jpg")
                    : "gr" == e
                        ? (document.getElementById("header-lang-img").src = "admin/assets/images/flags/germany.jpg")
                        : "it" == e
                            ? (document.getElementById("header-lang-img").src = "admin/assets/images/flags/italy.jpg")
                            : "ru" == e && (document.getElementById("header-lang-img").src = "admin/assets/images/flags/russia.jpg"),
                localStorage.setItem("language", e),
                null == (t = localStorage.getItem("language")) && a(n),
                s.getJSON("admin/assets/lang/" + t + ".json", function (e) {
                    s("html").attr("lang", t),
                        s.each(e, function (e, t) {
                            "head" === e && s(document).attr("title", t.title), s("[key='" + e + "']").text(t);
                        });
                }));
    }
    function c() {
        for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, s = e.length; t < s; t++)
            "nav-item dropdown active" === e[t].parentElement.getAttribute("class") && (e[t].parentElement.classList.remove("active"), null !== e[t].nextElementSibling && e[t].nextElementSibling.classList.remove("show"));
    }
    function r(e) {
        1 == s("#light-mode-switch").prop("checked") && "light-mode-switch" === e
            ? (s("html").removeAttr("dir"),
                s("#dark-mode-switch").prop("checked", !1),
                s("#rtl-mode-switch").prop("checked", !1),
                s("#dark-rtl-mode-switch").prop("checked", !1),
                s("#bootstrap-style").attr("href", "admin/assets/css/bootstrap.min.css"),
                s("#app-style").attr("href", "admin/assets/css/app.min.css"),
                sessionStorage.setItem("is_visited", "light-mode-switch"))
            : 1 == s("#dark-mode-switch").prop("checked") && "dark-mode-switch" === e
                ? (s("html").removeAttr("dir"),
                    s("#light-mode-switch").prop("checked", !1),
                    s("#rtl-mode-switch").prop("checked", !1),
                    s("#dark-rtl-mode-switch").prop("checked", !1),
                    s("#bootstrap-style").attr("href", "admin/assets/css/bootstrap-dark.min.css"),
                    s("#app-style").attr("href", "admin/assets/css/app-dark.min.css"),
                    sessionStorage.setItem("is_visited", "dark-mode-switch"))
                : 1 == s("#rtl-mode-switch").prop("checked") && "rtl-mode-switch" === e
                    ? (s("#light-mode-switch").prop("checked", !1),
                        s("#dark-mode-switch").prop("checked", !1),
                        s("#dark-rtl-mode-switch").prop("checked", !1),
                        s("#bootstrap-style").attr("href", "admin/assets/css/bootstrap-rtl.min.css"),
                        s("#app-style").attr("href", "admin/assets/css/app-rtl.min.css"),
                        s("html").attr("dir", "rtl"),
                        sessionStorage.setItem("is_visited", "rtl-mode-switch"))
                    : 1 == s("#dark-rtl-mode-switch").prop("checked") &&
                    "dark-rtl-mode-switch" === e &&
                    (s("#light-mode-switch").prop("checked", !1),
                        s("#rtl-mode-switch").prop("checked", !1),
                        s("#dark-mode-switch").prop("checked", !1),
                        s("#bootstrap-style").attr("href", "admin/assets/css/bootstrap-dark-rtl.min.css"),
                        s("#app-style").attr("href", "admin/assets/css/app-dark-rtl.min.css"),
                        s("html").attr("dir", "rtl"),
                        sessionStorage.setItem("is_visited", "dark-rtl-mode-switch"));
    }
    function l() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log("pressed"), s("body").removeClass("fullscreen-enable"));
    }
    s("#side-menu").metisMenu(),
        s("#vertical-menu-btn").on("click", function (e) {
            e.preventDefault(), s("body").toggleClass("sidebar-enable"), 992 <= s(window).width() ? s("body").toggleClass("vertical-collpsed") : s("body").removeClass("vertical-collpsed");
        }),
        s("#sidebar-menu a").each(function () {
            var e = window.location.href.split(/[?#]/)[0];
            this.href == e &&
                (s(this).addClass("active"),
                    s(this).parent().addClass("mm-active"),
                    s(this).parent().parent().addClass("mm-show"),
                    s(this).parent().parent().prev().addClass("mm-active"),
                    s(this).parent().parent().parent().addClass("mm-active"),
                    s(this).parent().parent().parent().parent().addClass("mm-show"),
                    s(this).parent().parent().parent().parent().parent().addClass("mm-active"));
        }),
        s(document).ready(function () {
            var e;
            0 < s("#sidebar-menu").length &&
                0 < s("#sidebar-menu .mm-active .active").length &&
                300 < (e = s("#sidebar-menu .mm-active .active").offset().top) &&
                ((e -= 300), s(".vertical-menu .simplebar-content-wrapper").animate({ scrollTop: e }, "slow"));
        }),
        s(".navbar-nav a").each(function () {
            var e = window.location.href.split(/[?#]/)[0];
            this.href == e &&
                (s(this).addClass("active"),
                    s(this).parent().addClass("active"),
                    s(this).parent().parent().addClass("active"),
                    s(this).parent().parent().parent().addClass("active"),
                    s(this).parent().parent().parent().parent().addClass("active"),
                    s(this).parent().parent().parent().parent().parent().addClass("active"),
                    s(this).parent().parent().parent().parent().parent().parent().addClass("active"));
        }),
        s('[data-bs-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault(),
                s("body").toggleClass("fullscreen-enable"),
                document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement
                    ? document.cancelFullScreen
                        ? document.cancelFullScreen()
                        : document.mozCancelFullScreen
                            ? document.mozCancelFullScreen()
                            : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
                    : document.documentElement.requestFullscreen
                        ? document.documentElement.requestFullscreen()
                        : document.documentElement.mozRequestFullScreen
                            ? document.documentElement.mozRequestFullScreen()
                            : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }),
        document.addEventListener("fullscreenchange", l),
        document.addEventListener("webkitfullscreenchange", l),
        document.addEventListener("mozfullscreenchange", l),
        s(".right-bar-toggle").on("click", function (e) {
            s("body").toggleClass("right-bar-enabled");
        }),
        s(document).on("click", "body", function (e) {
            0 < s(e.target).closest(".right-bar-toggle, .right-bar").length || s("body").removeClass("right-bar-enabled");
        }),
        (function () {
            if (document.getElementById("topnav-menu-content")) {
                for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, s = e.length; t < s; t++)
                    e[t].onclick = function (e) {
                        "#" === e.target.getAttribute("href") && (e.target.parentElement.classList.toggle("active"), e.target.nextElementSibling.classList.toggle("show"));
                    };
                window.addEventListener("resize", c);
            }
        })(),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
            return new bootstrap.Tooltip(e);
        }),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (e) {
            return new bootstrap.Popover(e);
        }),
        [].slice.call(document.querySelectorAll(".offcanvas")).map(function (e) {
            return new bootstrap.Offcanvas(e);
        }),
        window.sessionStorage && ((e = sessionStorage.getItem("is_visited")) ? (s(".right-bar input:checkbox").prop("checked", !1), s("#" + e).prop("checked", !0), r(e)) : sessionStorage.setItem("is_visited", "light-mode-switch")),
        s("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch").on("change", function (e) {
            r(e.target.id);
        }),
        s("#password-addon").on("click", function () {
            0 < s(this).siblings("input").length && ("password" == s(this).siblings("input").attr("type") ? s(this).siblings("input").attr("type", "input") : s(this).siblings("input").attr("type", "password"));
        }),
        null != t && t !== n && a(t),
        s(".language").on("click", function (e) {
            a(s(this).attr("data-lang"));
        }),
        s(window).on("load", function () {
            s("#status").fadeOut(), s("#preloader").delay(350).fadeOut("slow");
        }),
        Waves.init(),
        s("#checkAll").on("change", function () {
            s(".table-check .form-check-input").prop("checked", s(this).prop("checked"));
        }),
        s(".table-check .form-check-input").change(function () {
            s(".table-check .form-check-input:checked").length == s(".table-check .form-check-input").length ? s("#checkAll").prop("checked", !0) : s("#checkAll").prop("checked", !1);
        });


    // code here
    s('#checkboxAll').click(function () {
        s('.action-checkbox').prop('checked', this.checked);
        totalCheckbox();
    });

    s('.action-checkbox').click(function () {
        totalCheckbox();
    });

})(jQuery);

function totalCheckbox() {
    var total_checkbox = $('.action-checkbox:checkbox:checked').length;
    if (total_checkbox > 0) {
        $('.action-content').find('.text-content').text(total_checkbox);
        $('.action-content').show();
        $('.title-name').hide();
    }

    if (total_checkbox <= 0) {
        $('.action-content').hide();
        $('.title-name').show();
    }
}

function toSeoUrl(new_path) {

    str = new_path.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
    str = str.replace(/-+-/g, "-");
    str = str.replace(/^\-+|\-+$/g, "");
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); /*huyền sắc hỏi ngã nặng*/
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); /*Â, Ê, Ă, Ơ, Ư*/

    if (str === undefined) {
        return false;
    }

    return str;
    // return url.toString() // Convert to string
    //     .normalize('NFD') // Change diacritics
    //     .replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
    //     .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
    //     .replace(/\s+/g, '-') // Change whitespace to dashes
    //     .toLowerCase() // Change to lowercase
    //     .replace(/&/g, '-and-') // Replace ampersand
    //     .replace(/[^a-z0-9\-]/g, '') // Remove anything that is not a letter, number or dash
    //     .replace(/-+/g, '-') // Remove duplicate dashes
    //     .replace(/^-*/, '') // Remove starting dashes
    //     .replace(/-*$/, ''); // Remove trailing dashes
}

function confirmDelete(url, prefix = '') {
    Swal.fire({
        title: "Xóa " + prefix + " đã chọn?",
        text: prefix + " này sẽ được xóa khỏi website vĩnh viễn, bạn chắc chắn muốn xóa " + prefix + " này?",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Xóa " + prefix,
        cancelButtonText: "Hủy bỏ",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: !1,
    }).then(function (t) {
        t.value ?
            window.location.href = url :
            ''
    });

    // t.dismiss === Swal.DismissReason.cancel && Swal.fire({
    //     title: "Cancelled",
    //     text: "Your imaginary file is safe :)",
    //     icon: "error"
    // });
}

function flashSuccess(message) {
    Command: toastr["success"](message)
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 100,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function flashWarning(message) {
    Command: toastr["warning"](message)
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function flashError(message) {
    Command: toastr["error"](message)
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function NumberFormat(nStr) {
    nStr = NumberInt(nStr);
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

    return x1 + x2;
}

function NumberInt(nStr) {
    input = nStr.toString().replace(/[,]+/g, '').trim();
    return Number(input);
}

function randomText(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}

$('.click-radio').click(function () {
    $('.content-radio').attr('style', 'display:none !important');
    $('.content-' + $(this).val()).show();
});

$('.click-checkbox').click(function () {
    $('.click-checkbox').each(function (i, obj) {
        $(obj).is(":checked") ? $('.content-' + $(obj).val()).show() : $('.content-' + $(obj).val()).attr('style', 'display:none !important');
    });
});


// Image Manager
$(document).on('click', 'a[data-toggle=\'image\']', function (e) {
    var element = $(this);

    // Element hidden image
    var $input_id = element.parent().find('input[type=\'hidden\']').attr('id');

    var $popover = element.data('bs.popover'); // element has bs popover?

    e.preventDefault();

    // destroy all image popovers
    $('a[data-toggle="image"]').popover('dispose');

    // remove flickering (do not re-add popover when clicking for removal)
    if ($popover) {
        return;
    }

    var contentHtml = [
        '<a class="btn btn-success" id="upload-image">Tải lên</a>',
        '<a class="btn btn-outline-light" id="button-clear">Xóa</a>'
    ].join('\n');

    element.popover({
        html: true,
        content: contentHtml,
        container: 'body',
        trigger: 'focus',
        placement: 'bottom',
    });

    element.popover('show');

    $('#upload-image').click(function () {
        console.log(123123123);
        openFilemanager(this, $input_id, true);
        element.popover('hide');
    });

    $('#button-clear').on('click', function () {
        element.find('img').attr('src', element.find('img').attr('data-placeholder'));
        element.parent().find('input').val('');
        element.popover('hide');
    });
});

$(document).on('click', '.add-module-content', function (e) {
    let current_module = $(this).data('module');
    let current_module_name = $(this).data('module-name');
    var element = $(this);
    var $popover = element.data('bs.popover'); // element has bs popover?
    // $('.add-module-content').popover('dispose');

    // $(this).popover('hide');
    var html = `<div id="popover-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card me-4">
                    <div class="p-3 popover-hover" id="content_maintop">
                        <h5 class="card-title">NỘI DUNG TRÊN</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="p-3 popover-hover" id="column_left">
                            <h5 class="card-title">CỘT TRÁI</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="p-3 popover-hover" id="column_right">
                            <h5 class="card-title">CỘT PHẢI</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="p-3 popover-hover" id="content_mainbottom">
                            <h5 class="card-title">NỘI DUNG DƯỚI</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

    new bootstrap.Popover(element, {
        placement: 'left',
        trigger: 'click',
        html: true
    })

    //get instance
    var popover_instance = bootstrap.Popover.getInstance(element)
    popover_instance._config.content = html;

    // element.popover({
    //     html: true,
    //     content: html,
    //     // container: 'body',
    //     // trigger: 'click',
    //     placement: 'bottom',
    // });
    // element.popover('show');

    $('.popover-hover').click(function () {
        var id = $(this).attr('id');
        var content = $('.content-module-default').clone().removeClass('content-module-default').show();
        content.find('.content-input').append('<input type="hidden" name="layout_module[' + id + current_module.split('.')[1] + '][code]" value="' + current_module + '">');
        content.find('.content-input').append('<input type="hidden" name="layout_module[' + id + current_module.split('.')[1] + '][position]" value="' + id + '">');
        content.find('.content-input').append('<input type="hidden" name="layout_module[' + id + current_module.split('.')[1] + '][sort_order]" value="0">');
        content.find('.name').text(current_module_name);
        $('.' + id).append(content);
    });
});


$('#button-image-manager').on('click', function () {
    var $input_hidden_image_data = $('input[name=\'button-image-manager\']');
    var $input_id = $input_hidden_image_data.attr('id');
    openFilemanager(this, $input_id);
});

function openFilemanager(t, input_id, chose_image = false) {
    var $button = $(t);
    var $icon = $button.find('> i');
    $('#modal-image').remove();
    $('body').append('<div class="modal fade bs-example-modal-lg" id="modal-image" role="dialog" aria-labelledby="modal-image" aria-hidden="true"><div class="modal-dialog modal-xl modal-dialog-centered"><div class="modal-content no-background"><iframe src="http://127.0.0.1:8000/admin/assets/js/filemanager/dialog.php?subfolder=' + (chose_image ? '&type=1' : '') + '&editor=mce_0&lang=vi&fldr=&field_id=' + input_id + '" style="width: 100%; max-width: 900px; height: 450px; margin: 30px auto; display: block; border-radius: 5px; box-shadow: 0 5px 15px rgba(0, 0, 0, .5); border: 1px solid rgba(0, 0, 0, .2); background-clip: padding-box; outline: 0;"></iframe></div></div></div>');
    $('#modal-image').modal('show');
}

// Callback function after select image on Reponsive Filemanager
function responsive_filemanager_callback(field_id) {
    ///image/catalog/anh/5-1920-compressed.jpg -> url
    var protocol_hostname_post = location.protocol + '//' + location.hostname + (location.port ? ':' + location.port : '');

    // Set value hidden input
    var url = jQuery('#' + field_id).val();
    var url_use = url.replace(/^.*\/\/[^\/]+/, '')
    var url_use = url_use.replace("/image/", "");

    $("#" + field_id).attr('value', decodeURIComponent(url_use));

    // Display thumb image
    // Display thumb image
    var url_show_image = (isValidURL(url)) ? url : protocol_hostname_post + url;
    if (!validURL(url_show_image) && typeof (JSON).parse(url_show_image) == "object") {
        var field = $("#" + field_id);

        for (let image of (JSON).parse(url_show_image)) {

            var url_use = image.replace(/^.*\/\/[^\/]+/, '')
            var url_use = url_use.replace("/image/", "");
            if (field.parents().find(`table input[value="${decodeURIComponent(url_use)}"]`).length != 0) continue;
            var language_id = $(field.parents().find(`.tab-pane.active`)[0]).data('language-id');
            if (language_id) {
                var image_row = addImage(language_id);
            } else {
                var image_row = addImage();
            }

            let $input_image = $("#input-image" + image_row).parent().find('input').val(decodeURIComponent(url_use));
            let $img_show = $("#image-row" + image_row).find('img');

            $img_show.attr('width', 100);
            $img_show.attr('height', 100);
            $img_show.attr('src', image);
        }
        field.parent().parent().remove();
    } else {
        var $img_show = $("#" + field_id).parent().find('img');

        $img_show.attr('width', 100);
        $img_show.attr('height', 100);
        $img_show.attr('src', url_show_image);
    }
}

function isValidURL(str) {
    var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    if (!regex.test(str)) {
        return false;
    } else {
        return true;
    }
}

function validURL(str) {
    var pattern = /^(https?|ftp|file):\/\/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/ig;
    return !!pattern.test(str);
}

tinymce.init({
    selector: 'textarea.editor'
});