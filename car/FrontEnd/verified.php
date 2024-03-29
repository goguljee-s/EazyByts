
<?php
session_start();
include_once 'config.php';

// Check if the token is present in the URL
if (isset($_GET['token'])) {
  // Retrieve the token from the URL
  $token = $_GET['token'];

  // Retrieve the token stored in the session
  $sessionToken = $_SESSION['verification_token'];

  // Compare the token from the URL with the token stored in the session
  if ($token === $sessionToken) {
    // Tokens match, verification successful
    $verified = true;
    // Remove the token from the session to prevent reuse
    unset($_SESSION['verification_token']);
  } else {
    // Tokens don't match, verification failed
    $verified = false;
  }
} else {
  // Token not found in URL, verification failed
  $verified = false;
}

if ($verified) {
  $unique_id= $_SESSION['unique_id'];
  $sql="UPDATE users set verify=1 where unique_id='$unique_id'";
  mysqli_query($conn,$sql);
  // Output the HTML content for successful verification
  echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css">
        <title>Drive Wave</title>
      </head>
      <body>
        <div id="verified">
          <div class="wrap">
            <div class="verify-container">
              <header>Mail Verified</header>
              <p>
                Your email has been successfully verified. Now you can log in to your
                platform using the credentials you provided during registration.
              </p>
              <button id="ok-butn">OK</button>
            </div>
          </div>
        </div>
      </body>
    </html>';
} else {
  // If verification fails, you can display an error message or redirect the user to another page
  echo "Verification failed. Please try again.";
}
?>

