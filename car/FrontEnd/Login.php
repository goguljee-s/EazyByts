<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

    <title>Drive Wave</title>
  </head>

  <body>
    <div class="segment">
      <div class="container">
        <div class="signup">
          <header>Log In</header>
          <form action="login.php" method="post">
            <div class="field input">
              <label for="">E-mail</label>
              <input
                type="email"
                name="email"
                id=""
                required
                placeholder="Enter your mail"
              />
            </div>
            <div class="field input">
              <label for="">Password</label>
              <input type="password" name="pass" required />
              <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
              <input type="button" value="login" id="login-btn" />
            </div>
          </form>
          <div class="link">
            Don't have an account <a href="index.php">Sign-up Now</a>
          </div>
        </div>
      </div>
    </div>
    <?php
    ?>
    <script src="../JavaScript/login.js"></script>
  </body>
</html>
