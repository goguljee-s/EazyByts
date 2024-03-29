const form = document.querySelector("form");
const button = document.getElementById("login-btn");
const err = document.getElementById("error");

button.onclick = () => {
  console.log("Clicked");
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../Php/login.php", true);
  xhr.onload = () => {
    if (xhr.status === 200) {
      var data = xhr.response;
      if (data === "success") {
        // <-- Enclose "success" within quotes
        location.href = "../FrontEnd/home.php";
      } else {
        console.log(data);
        err.textContent = data;
        err.style.display = "block";
      }
    }
  };
  var formData = new FormData(form);
  xhr.send(formData);
};
