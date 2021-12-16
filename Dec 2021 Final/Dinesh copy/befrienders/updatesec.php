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

		$additional_txt = "Edited Homepage At ID: $id with Description: $description and Quote: $quote";		
		$auditSql = "INSERT INTO `audit`( `done_by`, `section`, `change_source`, `add_text`) VALUES (' ".$_SESSION['name']." ','Homepage','Edit','$additional_txt');";
		$audited = mysqli_query($connection,$auditSql);
	}
	else
	{
		echo '<p style="color:red;">Updation Failed</p>';
	}
?>