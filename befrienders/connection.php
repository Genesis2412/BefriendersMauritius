<?php


	//connecting to database
	$servername='localhost';
	$username='root';
	$password='';
	$database='nem644_befriendersmauritius';

	//connecting to database
	// $servername='localhost';
	// $username='root';
	// $password='';
	// $database='nem644_befriendersmauritius';

	$connection=mysqli_connect($servername,$username,$password,$database);
	$conn=mysqli_connect($servername,$username,$password,$database);

	//check connection
	if(!$connection)
	{
		die("Connection failed, try again later");
	}

	//check connection
	if(!$conn)
	{
		die("Connection failed, try again later");
	}
	
	mysqli_set_charset($connection,"utf8"); // Change character set to utf8
?>