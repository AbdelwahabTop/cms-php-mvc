$(document).ready(function() {
    $('#myform').submit(function(e) {
      e.preventDefault();
      if (validate()) {
        const form = $("#myform")[0];
        const data = new FormData(form);
        $.ajax({
          url: '/users/store',
          type: 'POST',
          data: data,
          // dataType: "JSON",
          processData: false,
          contentType: false,
          // caches: false,
          success: function(response) {
            // handle success response
            alert('Post added succesfully');
            form.reset();
            $('#imgTag').attr('src', '../images/upload.png');
          },
          error: function(e) {
            console.log(console.error(e))
            alert('An error occurred. Please try again later.');
          }
        });
      }
    });
  
    function validate() {
      let isValid = true;
      const usernameValue = $('#username').val().trim();
      const emailValue = $('#email').val().trim();
      const passwordValue = $('#password').val().trim();
  
      if (usernameValue === '') {
        setErrorFor($('#username'), 'Username cannot be blank');
        isValid = false;
      } else {
        setSuccessFor($('#username'));
      }
  
      if (emailValue === '') {
        setErrorFor($('#email'), 'Email cannot be blank');
        isValid = false;
      } else if (!isValidEmail(emailValue)) {
        setErrorFor($('#email'), 'Please enter a valid email');
        isValid = false;
      } else {
        setSuccessFor($('#email'));
      }
  
      if (passwordValue === '') {
        setErrorFor($('#password'), 'Password cannot be blank');
        isValid = false;
      } else if (passwordValue.length < 6) {
        setErrorFor($('#password'), 'Password must be at least 6 characters');
        isValid = false;
      } else {
        setSuccessFor($('#password'));
      }
  
      return isValid;
    }
  
    function setErrorFor(input, message) {
      const errorElement = input.next('.error');
      errorElement.text(message);
      input.addClass('border-red-500');
    }
  
    function setSuccessFor(input) {
      const errorElement = input.next('.error');
      errorElement.text('');
      input.removeClass('border-red-500');
    }
  
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  
  });