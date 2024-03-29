
const form = document.querySelector("form");
const button = document.getElementById("check-btn");

button.onclick = () => {
  console.log("clicked");
    //document.querySelector(verify - conatiner).style.display = "block";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Php/top.php", true);
    xhr.onload = () => {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
      } else {
        console.log(xhr.responseText);
      }
    };
  var formData = new FormData(form);
  if (form.elements.namedItem('check') == "") {
    form.elements.namedItem("check").value="off";
  }
    xhr.send(formData);
  }
