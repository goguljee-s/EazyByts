<?php
include_once "config.php";

// Check if the required POST parameters are set
if (isset($_POST['id']) && isset($_POST['check'])) {
    // Escape and sanitize the input values
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $check = $_POST['check']; // Convert 'true' or 'false' string to boolean value

    // Update query with proper syntax
    if($check=="on"){
    $sql = "UPDATE cars SET top_model='checked' WHERE id='$id'";
    }else{
        $sql = "UPDATE cars SET top_model='' WHERE id='$id'";
    }
    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn); // Echo the error message for debugging
    }
} else {
    echo "Error: Required parameters are missing."; // Echo error message if required parameters are missing
}
?>