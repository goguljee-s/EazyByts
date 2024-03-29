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
const id = getParameterByName('id', currentURL);

// Construct the URL for update.php with the extracted id
const updateURL = '../Php/update.php?id=' + id;

// Redirect to update.php with the id parameter
window.location.href = updateURL;