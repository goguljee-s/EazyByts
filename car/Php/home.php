<?php
include_once "config.php";
// Fetch car data from the database
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);

    $cars = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Convert each row to an associative array (object)
            $car = array(
                'image' => $row['image_path'],
                'brand' => $row['brand_name'],
                'model' => $row['model_name'],
            );
            // Push the car object to the $cars array
            $cars[] = $car;
        }
    }

    // Close database connection
    $conn->close();

    // Return car data as JSON
    header('Content-Type: application/json');
    echo json_encode($cars);
