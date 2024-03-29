<?php
// session_start();
// include "./vendor/autoload.php"; 
// include_once 'config.php';

// $name = mysqli_real_escape_string($conn, $_POST['name']);
// $email = mysqli_real_escape_string($conn, $_POST['email']);
// $pass = mysqli_real_escape_string($conn, $_POST['pass']);

// if (!empty($name) && !empty($email) && !empty($pass)) {
//     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $sql="SELECT * FROM users where email='$email'";
//         $result=mysqli_query($conn, $sql);
//         if(mysqli_num_rows($result) == 0){
//             $unique_id=rand(1000,9999);
//             $sql1="INSERT INTO users (name,email,pass,unique_id) VALUES('$name','$email','$pass','$unique_id')";
//             $result1=mysqli_query($conn,$sql1);
//             if($result1){
//                 // Include Mailgun PHP SDK

//                 include "./vendor/mailgun/mailgun-php/";

// // Initialize Mailgun SDK
// $mg = Mailgun::create('YOUR_MAILGUN_API_KEY');

// // Assuming $result1 indicates successful user registration
// if ($result1) {
//     // Generate verification token
//     $verificationToken = bin2hex(random_bytes(16));

//     // Compose email content
//     $htmlContent = '<p>Click the following link to verify your email address:</p>';
//     $htmlContent .= '<a href="https://example.com/verify.php?token=' . $verificationToken . '">Verify Email</a>';

//     // Send email
//     $result = $mg->messages()->send('your_domain.com', [
//         'from' => 'Your Name <your_email@your_domain.com>',
//         'to' => $email,
//         'subject' => 'Email Verification',
//         'html' => $htmlContent
//     ]);
//                 echo "Email sent successfully for verification.";
//             } else {
//                 echo "Error inserting user data.";
//             }
//         } else {
//             echo "Email ID already exists.";
//         }
//     } else {
//         echo "Enter a valid email address.";
//     }
// } else {
//     echo "All fields are required.";
// }
include_once 'config.php';
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

if (!empty($name) && !empty($email) && !empty($pass)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users where email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $unique_id = rand(1000, 9999);
            $pass=password_hash($pass,PASSWORD_BCRYPT);
            $sql1 = "INSERT INTO users (name,email,pass,unique_id) VALUES('$name','$email','$pass','$unique_id')";
            $result1 = mysqli_query($conn, $sql1);
            $_SESSION['unique_id']=$unique_id;
            if ($result1) {
                echo "success";
            } else {
                echo "Something Went Wrong try again";
            }
        } else {
            echo "Error: Email ID already exists.";
        }
    } else {
        echo "Error: Enter a valid email address.";
    }
} else {
    echo "Error: All fields are required.";
}
?>