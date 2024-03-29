// Get the current URL
const currentURL = window.location.href;

// Function to extract the value of a parameter from the URL
function getParameterByName(name, url) {
  name = name.replace(/[\[\]]/g, "\\$&");
  const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
// Extract the value of the 'id' parameter from the URL
const id = getParameterByName("id", currentURL);
// Construct the URL for update.php with the extracted id
  const submitbtn = document.getElementById("sub-btn");
  submitbtn.onclick = () => {
    console.log("Clicked");
    var xhr = new XMLHttpRequest();
    var form = document.querySelector("form");
      var formData = new FormData(form);
      formData.append("id", id);

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
