const form = document.getElementById('myform');
const title = document.getElementById('title');
const slug = document.getElementById('slug');
const body = document.getElementById('body');
const thumbnail = document.getElementById('thumbnail');
const imgTag = document.getElementById('imgTag');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (validate()) {
    form.submit();
  }
});

function validate() {
  let isValid = true;
  const titleValue = title.value.trim();
  const slugValue = slug.value.trim();
  const bodyValue = body.value.trim();
  const thumbnailValue = thumbnail.value.trim();

  if (titleValue === '') {
    setErrorFor(title, 'Title cannot be blank');
    isValid = false;
  } else {
    setSuccessFor(title);
  }

  if (slugValue === '') {
    setErrorFor(slug, 'Slug cannot be blank');
    isValid = false;
  } else {
    setSuccessFor(slug);
  }

  if (bodyValue === '') {
    setErrorFor(body, 'Body cannot be blank');
    isValid = false;
  } else {
    setSuccessFor(body);
  }

  if (thumbnailValue === '') {
    setErrorFor(thumbnail, 'Thumbnail cannot be blank');
    isValid = false;
  } else {
    setSuccessFor(thumbnail);
  }

  const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(thumbnailValue)) {
    setErrorFor(thumbnail, 'Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.');
    isValid = false;
  } else {
    setSuccessFor(thumbnail);
  }

  const fileSize = thumbnail.files[0].size;
  const maxSize = 5 * 1024 * 1024; // 5MB
  if (fileSize > maxSize) {
    setErrorFor(thumbnail, 'File size exceeds 5MB limit');
    isValid = false;
  } else {
    setSuccessFor(thumbnail);
  }

  if (isValid) {
    const reader = new FileReader();
    reader.onload = function () {
      imgTag.src = reader.result;
    };
    reader.readAsDataURL(thumbnail.files[0]);
  }

  return isValid;
}

function setErrorFor(input, message) {
  const errorElement = input.nextElementSibling;
  errorElement.innerText = message;
  input.classList.add('border', 'border-red-500');
}

function setSuccessFor(input) {
  const errorElement = input.nextElementSibling;
  errorElement.innerText = '';
  input.classList.remove('border', 'border-red-500');
}