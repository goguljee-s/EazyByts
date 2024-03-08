<?php
session_start();
include_once "php/config.php";

if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
    exit();
}

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
} else {
    header("location: login.php");
    exit();
}

include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="profile">
            <div class="content">
                <div class="profile-details">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="Profile Image">
                    <h2><?php echo $row['fname'] . " " . $row['lname']; ?></h2>
                    <p><?php echo $row['status']; ?></p>
                </div>
                <!-- Add other profile information as needed -->
            </div>
            <a href="users.php" class="back-link">Back to Users</a>
        </section>
    </div>
</body>
</html>
