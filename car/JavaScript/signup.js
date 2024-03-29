const form = document.querySelector("form");
const button = document.getElementById("signup");
var popups = document.getElementById("verify");
//const popup_btn = document.getElementById("ok-btn");


button.onclick = () => {
  console.log("clicked");
  var pass = form.elements.namedItem("pass").value;
  var cpass = form.elements.namedItem("cpass").value;
  if (cpass !== pass) {
    form.elements.namedItem("cpass").style.borderColor = "#ff0000";
    document.getElementById("notmatch").style.display = "block";
  }
    else {
      //document.querySelector(verify - conatiner).style.display = "block";
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../Php/signup.php", true);
      xhr.onload = () => {
        if (xhr.status === 200) {
          var data = xhr.response;
          if (data == "success") {
            location.href="../FrontEnd/login.php"
          } else {
            console.log(data);
          }
        }
      };
      var formData = new FormData(form);
      xhr.send(formData);
    }

};

// popup_btn.onclick = () => {
//    popups.style.display = "none";
// }