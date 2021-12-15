<?php  require("connection.php");
$_SERVER['REMOTE_ADDR']="SAAA";
echo "<br/> Sanitized REMOTE_ADDR: ".mysqli_real_escape_string($connection,$_SERVER['REMOTE_ADDR']);

echo "<br/> Sanitized PHP_SELF: ".mysqli_real_escape_string($connection,$_SERVER['REMOTE_PORT']);


?>  