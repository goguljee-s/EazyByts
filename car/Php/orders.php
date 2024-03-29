<?php
session_start();
include_once 'config.php';
    $from_date = mysqli_real_escape_string($conn, $_POST['from']);
    $to_date = mysqli_real_escape_string($conn, $_POST['to']);
    $contact = mysqli_real_escape_string($conn, $_POST['phone']);
    $adress = mysqli_real_escape_string($conn, $_POST['adr']);
    $pincode = mysqli_real_escape_string($conn, $_POST['code']);
    if (!empty($from_date) && !empty($to_date) && !empty($contact) && !empty($adress) && !empty($pincode)) {
        // Define the SQL query string with placeholders for parameters
        $sql_query = 'INSERT INTO orders (from_date, to_date, contact, address, pincode, unique_id) VALUES (?, ?, ?, ?, ?, ?)';

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql_query);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters to the prepared statement
            $unique_id = $_SESSION['unique_id'];;
            $stmt->bind_param('ssissi', $from_date, $to_date, $contact, $adress, $pincode, $unique_id);
            // Execute the prepared statement
            if ($stmt->execute()) {
                echo"success";
            } else {
                echo 'Error executing SQL statement: ' . $stmt->error;
            }
            // Close the prepared statement
            $stmt->close();
        } else {
            // Error: Failed to prepare statement
            echo 'Error preparing SQL statement: ' . $conn->error;
        }
    } else {
        echo "all fileds are required";
    }
?>