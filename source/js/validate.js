$('#contact-form').validate({
    rules: {
      'inputName': {
        required: true,
      },
      'inputEmail': {
        required: true,
        email: true,
      },
      'inputAddress': {
        required: true,
      },
      'inputCity': {
        required: true,
      },
      'inputState': {
        required: true,
      },
      'inputZip': {
        required: true,
      },
      'ageConsent': {
        required: true,
      },
    },
    messages: {
      'inputName': "Please type in your name.",
      'inputEmail': "Email address is required.",
      'inputAddress': "Please enter your address.",
      'inputCity': "Please enter your city.",
      'inputState': "Please choose a state.",
      'inputZip': "Please enter a valid zipcode.",
      'ageConsent': "Please verify your age.",
    },
    errorElement: "span",
    errorPlacement: function(error, element) {
      error.appendTo( element.next().parent());
    },

  });

$('#ageConsent').change(function() {
  $('#marketingConsent').parent().toggleClass('hidden');
});

$('#contact-form select').change(function() { $(this).valid()})