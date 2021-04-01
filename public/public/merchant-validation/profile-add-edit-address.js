$(document).ready(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  // });
  $('#valid-form-address').validate({
    rules: {

      address: {
        required: true
      },  

      longitude: {
        required: true
      },

      latitude: {
        required: true
      },
      
    },


    messages: {

      address: {
        required: "Address is required!"
      },
      longitude: {
        required: "Longitude is required!"
      },
      latitude: "latitude is requireds!"
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});