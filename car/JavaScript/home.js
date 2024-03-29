
const button = document.getElementById("confirm");
const form = document.querySelector("form");

button.onclick = () => {
  console.log("clicked");
  if (validatePhoneNumber()) {
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Php/orders.php');
    xhr.onload = () => {
      if (xhr.status == 200) {
        console.log(xhr.responseText)
        window.alert("Your order placed We call back soon");
        form.reset();
        }else {
        console.log(xhr.responseText);
      }
    }
    xhr.send(formData);
  }
}
$(document).ready(function () {
  // Function to fetch car data from PHP using AJAX
  function getCars() {
    $.ajax({
      url: "../Php/home.php", // Assuming the PHP script to fetch car data is named 'get_cars.php'
      type: "GET",
      success: function (data) {
        generateCarouselItems(data); // Call function to generate carousel items with received data
      },
      error: function (xhr, status, error) {
        console.error("Error fetching car data:", error);
      },
    });
  }

  // Function to generate carousel items dynamically based on car data
  function generateCarouselItems(cars) {
    const carouselSlide = $("#carousel-slide");
    const caritems=$("#car-item")
    cars.forEach(function (car) {
      const carouselItem = $('<div class="carousel-item"></div>');
      const carslist=$('<div class="car-list"></div>')
      carouselItem.html(`
                <img src="../Php/${car.image}" alt="${car.model} style=""">
                <div class="carousel-caption">
                    <h2>${car.brand}</h2>
                    <p>${car.model}</p>
                </div>
            `);
       carslist.html(`
                <img src="../Php/${car.image}" alt="${car.model} id="car-image">
                <div class="list-caption">
                    <h2>${car.brand}</h2>
                    <p>${car.model}</p>
                    <button class="book-btn">Book</button>
                </div>
            `);

      carouselSlide.append(carouselItem);
      caritems.append(carslist);
    });
  }

  // Call the function to fetch car data when the page loads
  getCars();
});

// function for validate phonenumber
        function validatePhoneNumber() {
          var input = document.getElementById("phone");
          var phoneNumber = input.value.replace(/\D/g, ""); // Remove non-numeric characters

          if (phoneNumber.length === 10) {
            return true;
          } else {
            alert("Phone number must be exactly 10 digits long.");
            return false;
          }
}
        
 function logout() {
   // Make an AJAX request to the PHP logout script
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "../Php/logout.php", true);
   xhr.onreadystatechange = function () {
     if (xhr.readyState === XMLHttpRequest.DONE) {
       if (xhr.status === 200) {
         // Redirect the user to the login page or perform other actions upon successful logout
         window.location.href = "login.php";
       } else {
         // Handle errors
         console.error("Logout request failed.");
       }
     }
   };
   xhr.send();
 }
