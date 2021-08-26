<?php session_start();

	$servername = 'localhost';
$username= 'root';
$password= '';
$database = 'phplogin';

// Try and connect using the info above.
$conn = mysqli_connect($servername, $username, $password, $database);

if(isset($_POST['ChangePwSubm'])){

	$currentPwd = $_POST['currentPassword'];
	$newPwd = $_POST['newPassword'];
	$finalpwd = md5($newPwd);

	$sql = "UPDATE accounts set password='".$finalpwd."' where id='".$_SESSION['UserIDSession']."';";

if(mysqli_query($conn,$sql)){

	$_SESSION['PwdChange'] = "Password has been changed!";


}else{
	$_SESSION['PwdChange'] = "Password could not be changed!";

}





}


?>