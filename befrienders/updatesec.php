<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>
<?php


	$id=mysqli_real_escape_string($connection, $_POST['id']);
	$image=$_SESSION['locator'];
    $description=mysqli_real_escape_string($connection, $_POST['description']);
    $quote=mysqli_real_escape_string($connection, $_POST['quote']);

	$update="UPDATE home
				SET image='$image', description='$description', link='$quote'
				WHERE ID='$id';";
	$process=mysqli_query($connection,$update);

	if($process)
	{
		echo "Details Updated. Ignore any Warnings or notices being generated";
	}
	else
	{
		echo '<p style="color:red;">Updation Failed</p>';
	}
?>