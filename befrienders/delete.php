<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php 

if(isset($_POST['deletedata']))
{
	$id = mysqli_escape_string($connection,$_POST['delete_id']);

	$query = "DELETE FROM staff WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run){
		$_SESSION['adminWarning']="Staff was deleted";
		 header("Location:newAdmin.php"); 
	}else{
		$_SESSION['adminWarning']="Staff was not deleted";
		 header("Location:newAdmin.php"); 
}
}

?>