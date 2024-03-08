 // const fileInput = document.getElementById('fileInput');
 function display(){
    console.log("Display Method invoked");
    document.getElementById('profileModal').style.display = 'block';
}
function closeModal() {
  document.getElementById('profileModal').style.display = 'none';
}
function displayImagePreview() {
      // Display the selected image in the profile image section
      const fileInput = document.getElementById('fileInput');
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/users.php", true);
      let form = new FormData();
      form.append('image', fileInput.files[0]);
      xhr.send(form);
      const profileImage = document.getElementById('profileImage');

      const selectedFile = fileInput.files[0];
      if (selectedFile) {
          const reader = new FileReader();

          reader.onload = function (e) {
              profileImage.src = e.target.result;

          };

          reader.readAsDataURL(selectedFile);
          const modalContent = document.querySelector('#profileModal .modal-content');

      }
}
function create(){
  const form1 = document.createElement('form');
      form1.action = '#'; // Set the desired form action
      form1.method = 'post'; // Set the desired form method
      form1.enctype = 'multipart/form-data'; // Set the enctype for handling file uploads
      const fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.id = 'fileInput';
      fileInput.name = 'image';
      fileInput.accept = 'image/*';
      fileInput.style.display = 'none';
      fileInput.onchange = displayImagePreview;
      form1.appendChild(fileInput);
      fileInputContainer.innerHTML = '';
      fileInputContainer.appendChild(form1);
      fileInput.click();
}
