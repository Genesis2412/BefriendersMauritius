<?php
	include('connection.php');
	session_start();

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