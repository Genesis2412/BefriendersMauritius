
<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php
$email = mysqli_real_escape_string($connection,$_POST['email']);
$sql = "SELECT * FROM staff where binary email='$email'; ";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    //Username Exists
    echo "Email already exists!";
    echo "<script> $(document).ready(function(){ $('#AddStaffBtnFrm').prop('disabled', true); }) </script>";
    
}
else{
    //Email dont exist        
        echo "<script> $(document).ready(function(){ $('#AddStaffBtnFrm').prop('disabled', false); }) </script>";
    
    
}

?>

     