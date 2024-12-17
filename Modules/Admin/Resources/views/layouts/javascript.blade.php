<script src="{{URL::asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{URL::asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>
<!-- home -->

<!-- <script src="{{URL::asset('admin/assets/libs/parsleyjs/parsley.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/pages/form-validation.init.js')}}"></script> -->



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/31.1.0/ckeditor.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.4/tinymce.min.js"></script>


<!-- form -->
<script src="{{URL::asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/pages/ecommerce-select2.init.js')}}"></script>

{{-- <script src="{{URL::asset('admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('admin/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.vi.min.js">
</script>


<!-- endform -->
<!-- jquery-validation -->
<script src="{{URL::asset('admin/assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_vi.min.js"></script>

<!-- <script src="{{URL::asset('admin/assets/js/pages/file-manager.init.js')}}"></script> -->
<!-- start all js -->
<script src="{{URL::asset('admin/assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/pages/form-repeater.int.js')}}"></script>


<!-- Sweet Alerts js -->
<script src="{{URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Sweet alert init js-->
<!-- <script src="{{URL::asset('admin/assets/js/pages/sweet-alerts.init.js')}}"></script> -->

<!-- toastr plugin -->
<script src="{{URL::asset('admin/assets/libs/toastr/build/toastr.min.js')}}"></script>

<!-- toastr init -->
<script src="{{URL::asset('admin/assets/js/pages/toastr.init.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/pages/crypto-orders.init.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/app.js')}}"></script>
<script>
    function openFilemanager(t, input_id, chose_image = false) {
    var $button = $(t);
    var $icon = $button.find('> i');
    $('#modal-image').remove();
    $('body').append('<div class="modal fade bs-example-modal-lg" id="modal-image" role="dialog" aria-labelledby="modal-image" aria-hidden="true"><div class="modal-dialog modal-xl modal-dialog-centered"><div class="modal-content no-background"><iframe src="{{URL::asset('admin/assets/js/filemanager/dialog.php')}}?subfolder=' + (chose_image ? '&type=1' : '') + '&editor=mce_0&lang=vi&fldr=&field_id=' + input_id + '" style="width: 100%; max-width: 100%; height: 450px; margin: 30px auto; display: block; border-radius: 5px; box-shadow: 0 5px 15px rgba(0, 0, 0, .5); border: 1px solid rgba(0, 0, 0, .2); background-clip: padding-box; outline: 0;"></iframe></div></div></div>');
    $('#modal-image').modal('show');
}

$('#button-image-manager').on('click', function () {
        var $input_hidden_image_data = $('input[name=\'button-image-manager\']');
        var $input_id = $input_hidden_image_data.attr('id');
        openFilemanager(this, $input_id);
    });
</script>