<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Drive Wave</title>
</head>

<body>
    <div class="segment">
        <div class="container">
            <div class="signup">
                <header>Sign Up</header>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="on">
                    <div class="field input">
                        <label for="">Full Name</label>
                        <input type="text" name="name" required placeholder="Enter the name">
                    </div>
                    <div class="field input"> <label for="">E-mail</label>
                        <input type="email" name="email" id="" required placeholder="Enter your mail">
                    </div>
                    <div class="field input"><label for="">Password</label>
                        <div id="notmatch">Password not matched!</div>
                        <input type="password" name="pass" required id="pass">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input"> <label for="">Confirm-Password</label>
                        <input type="password" name="cpass" required id="cpass">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button"> <input type="button" value="Sign-up" id="signup">
                    </div>
                </form>
                <div class="link">Already have an account <a href="login.php">Login Now</a></div>
            </div>
        </div>
    </div>
    <?php
    include_once "verify.php";
    ?>
    <script src="../JavaScript/signup.js"></script>
</body>

</html>