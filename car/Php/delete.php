<?php
include_once "config.php";
 if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = trim($_GET['id']);
    $Sql="DELETE FROM cars where unique_id=?";
    if($stmt($conn,$Sql)){
        mysqli_stmt_bind_param($stmt,"i","$pid");
        $pid=$id;
        if(mysqli_stmt_execute($stmt)){
            echo"deleted";
        }
    }
 }
?>