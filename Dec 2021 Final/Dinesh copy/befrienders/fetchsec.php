<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php
	

	$sql="SELECT * FROM home;";
    $query=mysqli_query($connection,$sql);

    $view="";

    $view=$view.'<div class="table-responsive ">';
    $view=$view.'<table class="table table-bordered table-sm">';
    $view=$view.'<tr scope="col" style="background-color:#32383e; color:white;">';
    $view=$view.'<th scope="col" width="10%">ID</th>';
    $view=$view.'<th scope="col" width="20%">Section_name</th>';
    $view=$view.'<th scope="col" width="30%">Image</th>';
    $view=$view.'<th scope="col" width="30%">Description</th>';
    $view=$view.'<th scope="col" width="10%">Quote/Header</th>';
    $view=$view.'<th scope="col" width="10%">Operation</th>';
    $view=$view.'</tr>';

    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query))
        {      
            $view=$view.'<tr style="background-color:#18212e; color:#fff;">';
            $view=$view.'<td scope="row"> <b>'.$row[0].' </b></td>';
            $view=$view.'<td >'.$row[1].'</td>'; 
            $view=$view.'<td><img src="'.$row[2].'" width="50%"></td>'; 
            $view=$view.'<td >'.$row[3].'</td>';
            $view=$view.'<td>'.$row[4].'</td>';
            $view=$view.'<td >'.'<button class="btn btn-danger" value="'.$row["ID"].'" onclick="getBtnValue(this)" data-toggle="modal" data-target="#myModal">Update</button>'.'</td>';
            $view=$view.'</tr>';  
        }
    }
    
    echo $view;
?>