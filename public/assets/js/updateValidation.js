$(document).ready(function() {
  $('#myform').submit(function(e) {
    e.preventDefault();
    if (validate()) {
      const form = $("#myform")[0];
      const data = new FormData(form);
      $.ajax({
        url: '/posts/update',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
          alert('Post updated successfully');
          form.reset();
          $('#imgTag').attr('src', '../images/upload.png');
          window.location.href = '/posts'
        },
        error: function(e) {
          console.log(console.error(e))
          alert('An error occurred. Please try again later.');
        }
      });
    }
  });

  $('#thumbnail').change(function() {
    const reader = new FileReader();
    reader.onload = function () {
      $('#imgTag').attr('src', reader.result);
    };
    reader.readAsDataURL(this.files[0]);
  });

  function validate() {
    let isValid = true;
    const titleValue = $('#title').val().trim();
    const slugValue = $('#slug').val().trim();
    const bodyValue = $('#body').val().trim();

    if (titleValue === '') {
      setErrorFor($('#title'), 'Title cannot be blank');
      isValid = false;
    } else {
      setSuccessFor($('#title'));
    }

    if (slugValue === '') {
      setErrorFor($('#slug'), 'Slug cannot be blank');
      isValid = false;
    } else {
      setSuccessFor($('#slug'));
    }

    if (bodyValue === '') {
      setErrorFor($('#body'), 'Body cannot be blank');
      isValid = false;
    } else {
      setSuccessFor($('#body'));
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
});