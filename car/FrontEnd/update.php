<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Drive Wave</title>
</head>

<body>
    <header class="title">Drive Wave</header>
    <?php
session_start();
include_once "../Php/config.php";

    if($_SESSION['role']!="admin"){
        header("location: error.php");
    }else{
    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);
        echo "id is $id";
        $sql = "SELECT * FROM cars WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
}
    ?>
    <div class="segment">
        <div class="container">
            <header>Add Details</header>
            <div class="errortext"></div>
            <form action="#" method="post" id="carForm" enctype="multipart/form-data">
                <div class="car-details">
                    <label for="bname">Brand-Name</label>
                    <input type="text" name="bname" id="bname" required value="<?php echo $row['brand_name']; ?>">
                </div>
                <div class="car-details">
                    <label for="vname">Vehicle-No</label>
                    <input type="text" name="vname" id="vname" required value="<?php echo $row['vehicle_no']; ?>">
                </div>
                <div class="car-details">
                    <label for="mname">Model-Name</label>
                    <input type="text" name="mname" id="mname" required value="<?php echo $row['model_name']; ?>">
                </div>
                <div class="car-details">
                    <label for="mname">Price/Day</label>
                    <input type="text" name="price" id="price" required value="<?php echo $row['price']; ?>">
                </div>
                <div class="car-details">
                    <label for="file">select Image</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <div class="car-details button">
                    <input type="button" value="Submit" id="sub-btn">
                </div>
            </form>
        </div>
    </div>
    <script src="../JavaScript/update.js"></script>
</body>

</html>