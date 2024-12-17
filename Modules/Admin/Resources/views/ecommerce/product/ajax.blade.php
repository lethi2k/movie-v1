// var data_option = [];
// $(".option-select").each(function(index) {
//     data_option.push($(this).select2("val"));
// });

// var data_option_value = [];
// $(".option-value-select").each(function(index) {
//     data_option_value.push($(this).select2("val"));
// });

// $.ajax({
//     /* the route pointing to the post function */
//     url: "{{URL::asset('admin/product/variant/ajax')}}",
//     type: 'POST',
//     /* send the csrf-token and the input to the controller */
//     // , data_option_value: data_option_value
//     data: {
//         _token: '{{ csrf_token() }}',
//         data_option: data_option,
//         options_json: '{!! $options_json !!}',
//     },
//     dataType: 'JSON',
//     success: function(data) {
//         $(".option-content").append(data.html);
//         $(".option-content").find("select").select2();
//     },
//     error: function(xhr, status, response) {
//         alert(xhr.responseJSON.errors);
//         console.log(status);
//         console.log(response);
//     }
// });