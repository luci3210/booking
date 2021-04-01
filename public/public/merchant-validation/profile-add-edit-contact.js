$(document).ready(function () {
  $('#valid-form').validate({
    rules: {

      fname: {
        required: true,
        maxlength: 30
      },  

      lname: {
        required: true,
        maxlength: 30
      },

      email: {
        required: true,
        email: true
      },

      mobileno: {
        required: true,
        minlength: 11,
        number: true
      },
      
    },


    messages: {

      fname: {
        required: "First name is required!",
        maxlength: "First name, must be at least 30 characters below!"
      },

      lname: {
        required: "Last name is required!",
        maxlength: "Last name, must be at least 30 characters below!"
      },

      email: {
        required: "E-mail is requireds!",
        email: "Please provide a valid email address"
      },

      mobileno: {
        required: "Mobile number is required",
        minlength: "Mobile number must be at least 11 characters long!",
        number: "Mobile number should be integer/number"
      }


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