$(document).ready(function() {
  $('#myform').submit(function(e) {
    e.preventDefault();
    if (validate()) {
      const form = $("#myform")[0];
      const data = new FormData(form);
      $.ajax({
        url: '/posts/store',
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
    const titleValue = $('#title').val().trim();
    const slugValue = $('#slug').val().trim();
    const bodyValue = $('#body').val().trim();
    const thumbnailValue = $('#thumbnail').val().trim();

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

    if (thumbnailValue === '') {
      setErrorFor($('#thumbnail'), 'Thumbnail cannot be blank');
      isValid = false;
    } else {
      setSuccessFor($('#thumbnail'));
    }

    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(thumbnailValue)) {
      setErrorFor($('#thumbnail'), 'Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.');
      isValid = false;
    } else {
      setSuccessFor($('#thumbnail'));
    }

    const fileSize = $('#thumbnail')[0].files[0].size;
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (fileSize > maxSize) {
      setErrorFor($('#thumbnail'), 'File size exceeds 5MB limit');
      isValid = false;
    } else {
      setSuccessFor($('#thumbnail'));
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

  $('#thumbnail').change(function() {
    const reader = new FileReader();
    reader.onload = function () {
      $('#imgTag').attr('src', reader.result);
    };
    reader.readAsDataURL(this.files[0]);
  });
});