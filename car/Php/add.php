<?php
// Handle form submission and insert data into the database
include_once "config.php";

// Sanitize form data
$bname = mysqli_real_escape_string($conn, $_POST['bname']);
$vname = mysqli_real_escape_string($conn, $_POST['vname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
if (!empty($bname) && !empty($vname) && !empty($mname)) {
    // File upload handling
            $targetDirectory = "carImages/";
            $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $newFilename=$mname.".".$imageFileType ;
            $targetFile = $targetDirectory . $newFilename;
            $uploadOk = 1;
            

            // Check if file is an actual image
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if (!$check) {
                echo "File is not an image.";
                exit;
            }

            // Check file size
            // $maxFileSize = 10 * 1024 * 1024; // 10MB in bytes
            // $minFileSize = 1 * 1024; // 1MB in bytes
            // if ($_FILES["file"]["size"] < $maxFileSize&& $_FILES["file"]["size"] > $minFileSize) {
            //     echo "Sorry, The file size between 1MB to 5MB";
            //     exit;
            // }

            // Allow only certain file formats
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                exit;
            }

            // Upload file
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }

            // Insert data into the database
            $sql = "INSERT INTO cars (brand_name, vehicle_no, model_name, image_path,price,id) VALUES (?, ?, ?, ?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            $id=rand(100,999);
            // Check if the prepared statement was created successfully
            if ($stmt) {
                // Bind the parameters to the prepared statement
                mysqli_stmt_bind_param($stmt,"ssssii", $bname, $vname, $mname, $targetFile,$price, $id);

                // Execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "Success";
                } else {
                    echo "Error uploading details try again";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // If the prepared statement could not be created, return an error
                echo json_encode(array("success" => false, "message" => "Error: Unable to prepare SQL statement"));
            }
    } else {
    echo "All Fields are required";
}

// Close database connection
mysqli_close($conn);
