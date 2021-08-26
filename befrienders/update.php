<?php session_start();
include('connection.php');
?>

<?php 

if(isset($_POST['updatedata']))
{

	$id = mysqli_escape_string($connection,$_POST['update_id']);
    
	$fname = mysqli_escape_string($connection,$_POST['fname']);
	$lname = mysqli_escape_string($connection,$_POST['lname']);
	$address = mysqli_escape_string($connection,$_POST['address']);
	$email = mysqli_escape_string($connection,$_POST['email']);
	$contact = mysqli_escape_string($connection,$_POST['contact']);
    $position = mysqli_escape_string($connection,$_POST['jobpos']);
	$permission = mysqli_real_escape_string($connection,$_POST['position']);

    if($permission==""){
		$permission="pos3"; //lowest position with limited access
		//$_SESSION['adminWarning']=$_SESSION['adminWarning']+"Since Position was not defined, It was assigned the Check Position. ";
	}
    $query = " UPDATE staff SET  first_name='$fname', last_name='$lname', address='$address', email='$email', JobPosition='$position', contact_number='$contact', position='$permission' WHERE id='$id' ";
    $query_run =  mysqli_query($connection,$query);

    if($query_run){
    	$_SESSION['adminWarning']="Staff Updated";
    	header("Location:newAdmin.php");
    }else{

    	$_SESSION['adminWarning']="Staff Not Updated(See Technician) ";
		header("Location:newAdmin.php");
    }
}

?>