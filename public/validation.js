$(document).ready(function() {
    // Get the form element
    const form = $('#myform');
  
    // Get the form fields
    const title = $('#title');
    const slug = $('#Slug');
    const body = $('#body');
    const thumbnail = $('#thumbnail');
  
    // Add event listener to the form submit button
    form.on('submit', function(event) {
      // Prevent the form from submitting
      event.preventDefault();
    
      // Clear any existing error messages
      clearErrors();
  
      // Validate the form fields
      let isValid = true;
  
      if (title.val().trim() === '') {
        showError(title, 'Title is required');
        isValid = false;
      }
  
      if (slug.val().trim() === '') {
        showError(slug, 'Slug is required');
        isValid = false;
      }
  
      if (body.val().trim() === '') {
        showError(body, 'Body is required');
        isValid = false;
      }
  
      if (thumbnail[0].files.length === 0) {
        showError(thumbnail, 'Thumbnail is required');
        isValid = false;
      } else {
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const fileExtension = thumbnail.val().split('.').pop().toLowerCase();
        const fileSize = thumbnail[0].files[0].size / 1024 / 1024; // in MB
  
        if (!allowedExtensions.includes(fileExtension)) {
          showError(thumbnail, 'Only JPG, JPEG, PNG, and GIF files are allowed');
          isValid = false;
        }
  
        if (fileSize > 2) {
          showError(thumbnail, 'File size should not exceed 2 MB');
          isValid = false;
        }
      }
  
      // Submit the form if all fields are valid
      if (isValid) {
        // Send a POST request to the server
        const formData = new FormData(form[0]);
  
        $.ajax({
        //   url: form.attr('action'),
          method: "POST",
          url: "/posts/store",
          dataType: "JSON",
          data: data,
        //   type: 'POST',
        //   data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function(response) {
            alert('Data saved successfully', `${response.message}`);
            form[0].reset();
            $('#imgTag').attr('src', '../images/upload.png');
          },
          error: function(xhr, textStatus, errorThrown) {
            alert('An error occurred while saving the data');
          }
        });
      }
    });
  
    // Function to display error messages
    function showError(input, message) {
      const errorElement = $(`#${input.attr('id')}_err`);
      errorElement.text(message);
      input.addClass('border', 'border-red-500');
    }
  
    // Function to clear error messages
    function clearErrors() {
      const errors = $('.error');
      errors.text('');
  
      const inputs = $('input');
      inputs.removeClass('border', 'border-red-500');
    }
  });