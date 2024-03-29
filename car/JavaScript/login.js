const form = document.querySelector("form");
const button = document.getElementById("login-btn");



button.onclick = () => {
  console.log("Clicked");
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../Php/login.php", true);
  xhr.onload = () => {
    if (xhr.status === 200) {
      var data = xhr.response;
      
      if (data == "success") {
        console.log(data);
        
      } else {
        location.href = "../FrontEnd/home.php";
      }
    }
  };
  var formData = new FormData(form);
  xhr.send(formData);
};
