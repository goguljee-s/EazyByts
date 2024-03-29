document.addEventListener("DOMContentLoaded", function () {
  const submitbtn = document.getElementById("sub-btn");
  submitbtn.onclick = () => {
    console.log("Clicked");
    var xhr = new XMLHttpRequest();
    var form = document.querySelector("form");
    var formData = new FormData(form);

    xhr.open("POST", "../Php/add.php", true);
    xhr.onload = () => {
      console.log("inside the onload");
      if (xhr.status === 200) {
        console.log(xhr.response);
        form.reset();
      } else {
        console.log("Failed");
      }
    };
    xhr.send(formData);
  };
});
