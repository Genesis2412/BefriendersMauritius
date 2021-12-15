<?php session_start(); require("connection.php");

if(isset($_POST['TestimonialSubmit'])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $message = mysqli_real_escape_string($connection,$_POST['message']);
    $rating = mysqli_real_escape_string($connection,$_POST['rating']);
    $status="off";

    $insetSql = "INSERT INTO testimonial(name,remark,status,rating) 
                    VALUES('$name','$message','$status','$rating'); ";

    if(mysqli_query($connection,$insetSql)){
        $_SESSION['testiWarn'] = "Testimonial has been saved";
    }else{
        $_SESSION['testiWarn'] = "Testimonial could not be added";
    }

    header("Location: ./#testimonial");
}



?>