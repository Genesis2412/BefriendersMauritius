<?php session_start();

include('connection.php');

// Try and connect using the info above.
$conn = mysqli_connect($servername, $username, $password, $database);


	if (isset($_POST["Signinsupn"])){
		$uname = $_POST["uname"];
		$pwd=$_POST["pwd"];
		$finalpassword=md5($pwd);
		$sql = "select * from accounts where username='".$uname."' and binary password='".$finalpassword."';";
$result=mysqli_query($conn, $sql);


	if (mysqli_num_rows($result)>0){
		while ($row = mysqli_fetch_assoc($result)){
			//echo "valid ";
			$_SESSION["uname"]=$row["username"];
			$_SESSION["mail"]=$row["email"];
			header("Location:useraccount.php");

		}
	}else{

		$_SESSION["error"]="invalid";
		header("Location:signin.php");
	}


	}else{
		$_SESSION["error"]="form not submitted";
		header("Location:signin.php");
	}



?>