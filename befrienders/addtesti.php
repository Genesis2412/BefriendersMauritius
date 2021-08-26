<?php

	include('connection.php');

	if(isset($_POST['name']))
	{
		$name=mysqli_escape_string($connection, $_POST['name']);
		$remark=mysqli_escape_string($connection, $_POST['remark']);

		if(!empty($name) || !empty($remark))
		{
			$sql="INSERT INTO testimonial(name, remark) VALUES('$name','$remark');";
			$insert=mysqli_query($connection,$sql);

			if($insert)
			{
				echo "<script>alert('Testimonial added Successfully');document.location='testimonial.php'</script>";			
			}
			else
			{
				echo "<script>alert('Insert failed, try again');document.location='testimonial.php'</script>";
			}
				
		}
	}
?>
	