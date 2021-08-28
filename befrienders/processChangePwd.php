<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php

if(isset($_POST['updatePwd'])){
    
$old= mysqli_escape_string($connection,$_POST['oldPwd']);
$new= mysqli_escape_string($connection,$_POST['newPwd']);
$conf= mysqli_escape_string($connection,$_POST['confPwd']);

if($new==$conf){
$prot= md5($new);
$oldPwd = md5($old);
$id=$_SESSION['ASKLA'];

$checkSql = "SELECT * FROM staff WHERE id='$id' AND binary Password='$oldPwd' LIMIT 1; ";

$result = mysqli_query($connection,$checkSql);

if(mysqli_num_rows($result)>0){

    $sql = "UPDATE `staff` SET `Password`='$prot' WHERE `id`='$id'; ";
    if(mysqli_query($connection,$sql)){
        $_SESSION['adminWarning'] = "Password Changed.";
    }
    else{
        $_SESSION['adminWarning'] = "Password cannot be Changed.";
    }



}
else{
    //No account Found OR Password dont match
    $_SESSION['adminWarning'] = "Password cannot be Changed.";
}






}
else{
    $_SESSION['adminWarning'] = "Password entered do not match!";
}


}




    header("Location: newadmin.php");

?>
