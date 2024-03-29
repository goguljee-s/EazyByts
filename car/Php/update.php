    <?php
    include_once"config.php";
    if (isset($_POST['bname']) && isset($_POST['vname']) && isset($_POST['mname']) && isset($_POST['price']) && isset($_POST['id'])) {
        require_once "config.php";
        $bname = mysqli_real_escape_string($conn, $_POST['bname']);
        $vname = mysqli_real_escape_string($conn, $_POST['vname']);
        $mname = mysqli_real_escape_string($conn, $_POST['mname']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        if (!empty($bname) && !empty($vname) && !empty($mname) && !empty($price) && !empty($id)) {
            if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
                $sql="SELECT * from cars where unique_id=$id";
                $result=mysqli_query($conn,$sql);
                if($row = mysqli_fetch_assoc($result)){
                    $file_path = $row['image_path']; // Specify the path to your file
                    // Check if the file exists
                    if (file_exists($file_path)) {
                        unlink($file_path);
                        // File upload handling
                        $targetDirectory = "carImages/";
                        $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        $newFilename = $mname . "." . $imageFileType;
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
                        $sql = "UPDATE cars SET brand_name = $bname,vehicle_no = $vname,model_name = $mname,image_path = $targetFile WHERE unique_id = $id";

                        $result=mysqli_query($conn,$sql);
                        if($result->num_rows>0){
                          echo"updated successfully";
                        }else{
                            echo"error updating";
                        }
                    }
                }
            }else{
                $sql = "UPDATE cars SET brand_name = $bname,vehicle_no = $vname,model_name = $mname,image_path = $targetFile WHERE unique_id = $id";

                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    echo "updated successfully";
                } else {
                    echo "error updating";
                }
            }
        }else{
            echo"All fields are required";
        }
    }
?>