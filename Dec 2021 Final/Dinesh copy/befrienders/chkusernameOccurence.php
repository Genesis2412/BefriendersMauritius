
<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php
$uname = mysqli_real_escape_string($connection,$_POST['name']);
$sql = "SELECT * FROM staff where binary Username='$uname'; ";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    //Username Exists
    echo "Username already exists!";
    echo "<script> $(document).ready(function(){ $('#AddStaffBtnFrm').prop('disabled', true); }) </script>";
}
else{
    //Username dont exist
    if(strlen($uname)>5){
        //Valid Username
        echo "<script> $(document).ready(function(){ $('#AddStaffBtnFrm').prop('disabled', false); }) </script>";
    }else{
        echo "Username should contain more than 5 characters";
        echo "<script> $(document).ready(function(){ $('#AddStaffBtnFrm').prop('disabled', true); }) </script>";
    }
    
}

?>

     