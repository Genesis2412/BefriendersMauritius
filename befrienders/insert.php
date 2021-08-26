<?php session_start();
include('connection.php');
?>


<?php


if(isset($_POST['insertdata']))
{
	
	$fname = mysqli_real_escape_string($connection,$_POST['fname']);
	$lname = mysqli_real_escape_string($connection,$_POST['lname']);
	$address = mysqli_real_escape_string($connection,$_POST['address']);
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$contact = mysqli_real_escape_string($connection,$_POST['contact']);
	$position = mysqli_real_escape_string($connection,$_POST['position']);
	$username = mysqli_real_escape_string($connection,$_POST['uname']);
	$Temppwd = mysqli_real_escape_string($connection,$_POST['pwd']);
	$pwd = md5($Temppwd);

	$checker = "SELECT * FROM staff WHERE email='$email'";
	$checker2 = "SELECT * FROM staff WHERE Username='$username' ";
	$query_run = mysqli_query($connection,$checker);
	$query_run2 = mysqli_query($connection,$checker2);

	$emailcount = mysqli_num_rows($query_run);
	$Usrcount = mysqli_num_rows($query_run2);

	if($emailcount>0){
		$_SESSION['adminWarning']="Email Already Exist. Account creation was cancelled";
		header('Location: newadmin.php');
	}else if($Usrcount>0){
		$_SESSION['adminWarning']="Username already Exist. Please choose another one";
		header('Location: newadmin.php');
	}
	
	else{
		$query = "INSERT INTO staff (`first_name`,`last_name`,`address`,`email`,`contact_number`,`position`,`Username`,`Password`) VALUES ( '$fname','$lname','$address','$email','$contact','$position','$username','$pwd')";

		$insertquery = mysqli_query($connection,$query);
	}

	if($insertquery){
		$_SESSION['adminWarning']="Staff Added";
		
	}
	else{
		$_SESSION['adminWarning']="Staff Not Added ";
	}
	header('Location: newadmin.php');
}




?>