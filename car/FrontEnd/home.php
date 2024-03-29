<?php
session_start();
include_once "../Php/config.php";

if (!isset($_SESSION['id'])) {
    header("location: login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Drive Wave</title>
</head>

<body class="home-body">

    <head>
        <div>
            <header class="title">Drive Wave</header>
        </div>
        <div class="navi">
            <nav>
                <ul>
                    <li> <a href="#home">Home</a></li>
                    <li><a href="carlist.html">Top cars </a></li>
                    <li><a href="#contact">Contact Us </a></li>
                    <li><a href="#about">About Us </a></li>
                    <li><button id="log-out" onclick=logout()>Log Out</button></li>
                </ul>
            </nav>
        </div>
    </head>
    <div class="row">
        <main class="col">
            <div class="slider">
                <section id="home">

                    <div class="slide-container">
                        <div class="carousel-container">
                            <div class="carousel-slide" id="carousel-slide"></div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="grid-container">
                <div class="car-item" id="car-item"></div>
            </div>
            <section id="about">
                <header>About Us</header>
                <p>At <span style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: bold;">Drive Wave</span>, we are dedicated to providing exceptional car rental services to our valued customers. With years of experience in the industry, we take pride in offering a wide range of vehicles to suit every need and budget.</p>

                <header>Our Mission</header>
                <p>Our mission is simple: to provide reliable and affordable car rental solutions that exceed our customers' expectations. Whether you're traveling for business or pleasure, we strive to make your journey as smooth and enjoyable as possible.</p>

                <header>Why Choose Us?</header>
                <p>
                <ul>
                    <li>
                        <details>
                            <summary>Affordability</summary>
                            <p>We understand the importance of staying within budget, which is why we offer competitive rates and special discounts to ensure you get the best value for your money.</p>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Variety</summary>
                            <p>We offer a diverse fleet of vehicles, including economy cars, SUVs, luxury cars, and more, to cater to all your transportation needs.</p>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Convenience</summary>
                            <p>With convenient booking options, flexible rental periods, and multiple pickup/drop-off locations, we make renting a car hassle-free and convenient.</p>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Quality Service</summary>
                            <p> Our team of dedicated professionals is committed to providing personalized service and assistance every step of the way, from booking to vehicle return.</p>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Customer Satisfaction</summary>
                            <p>Your satisfaction is our top priority. We go above and beyond to ensure your rental experience is seamless, comfortable, and enjoyable.</p>
                        </details>
                    </li>
                </ul>
                </p>
            </section>
            <section id="contact">
                <header>Contact US</header>
                <address>
                    <p>
                        No 3,<br>
                        G street,<br>
                        New Bus Stand opposite,<br>
                        Villupuram,<br>
                        TamilNadu-000 101;

                    </p>
                </address>
            </section>
        </main>
        <aside class="col">
            <div id="booking">
                <header class="form-head">Booking Details</header>
                <form action="#" method="post" enctype="multipart/form-data" id="details">
                    <div class="booking-details">
                        <label for="from">From</label>
                        <input type="date" name="from" id="from">
                    </div>
                    <div class="booking-details">
                        <label for="to">To</label>
                        <input type="date" name="to" id="to">
                    </div>
                    <div class="booking-details">
                        <label for="phone">Contact No</label>
                        <input type="tel" name="phone" id="phone">
                    </div>
                    <div class="booking-details">
                        <label for="adr">Address</label>
                        <input type="text" name="adr" id="adr">
                    </div>
                    <div class="booking-details">
                        <label for="code">Postal Code</label>
                        <input type="number" name="code" id="code">
                    </div>
                    <div class="booking-details">
                        <input type="button" value="Book The Ride" id="confirm">
                    </div>
                </form>
            </div>
        </aside>
    </div>
    <footer>
        <small>Designed by GOGUL S</small>
        <small>&copy; 2024 Drive Wave. All rights reserved.</small>
    </footer>
</body>
<script src="../JavaScript/home.js"></script>

</html>