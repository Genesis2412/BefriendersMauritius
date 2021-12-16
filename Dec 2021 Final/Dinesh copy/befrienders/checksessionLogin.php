<?php session_start();

if (isset($_SESSION["error"])){

	echo "<div style='background-color:orange;color:black;padding:15px;'> ".$_SESSION["error"]."</div";

	unset($_SESSION["error"]);
}



if (isset($_SESSION["UserLoginWarns"])){

	echo "<div style='background-color:orange;color:black;padding:15px;'> ".$_SESSION["UserLoginWarns"]."</div";
	

	unset($_SESSION["UserLoginWarns"]);
}






?>