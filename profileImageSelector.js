// profile image selector
const userIcon = document.getElementById('userIcon');
const userImage = document.getElementById('userImage');
const imageInput = document.getElementById('image');

const savedImage = localStorage.getItem('userImage');
if (savedImage) {
  userImage.src = savedImage;
  userImage.style.display = 'block';
}
userIcon.addEventListener('click', function () {
  imageInput.click();
});
imageInput.addEventListener('change', function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      const imageDataURL = reader.result;
      userImage.src = imageDataURL;
      userImage.style.display = 'block';
      localStorage.setItem('userImage', imageDataURL);
      const formData = new FormData();
      formData.append('image', file);
      uploadImage(formData);
    };
    reader.readAsDataURL(file);
  }
});

function uploadImage(formData) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'profileUpload.php', true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
      } else {
        console.log('Error while uploading');
      }
    }
  };
  xhr.send(formData);
}