    <?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    if (!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
         if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = $password;
            $enc_pass = $row['pass'];
             if($user_pass === $enc_pass){
                $id = rand(1000, 9999);
                $_SESSION['unique_id']=$row['unique_id'];
                $_SESSION['id'] =$id;
                echo "success";
             } else {
                echo "Email or Password is Incorrect!";
            }
         } else {
            echo "$email not Exist";
        }
    } else {
        echo "All input fields are required!";
    }
    ?>