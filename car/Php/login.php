<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $enc_pass = $row['pass'];
        if (password_verify($password, $enc_pass)) {
            $id = rand(1000, 9999);
            $_SESSION['unique_id'] = $row['unique_id'];
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $row['role'];
            echo "success";
        } else {
            echo "Email or Password is Incorrect!";
        }
    } else {
        echo "Email $email not exist!  Please Sign-up";
    }
} else {
    echo "All input fields are required!";
}
