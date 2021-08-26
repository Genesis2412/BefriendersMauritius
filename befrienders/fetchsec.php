<?php
	include ('connection.php');

	$sql="SELECT * FROM home;";
    $query=mysqli_query($connection,$sql);

    $view="";

    $view=$view.'<div class="table-responsive">';
    $view=$view.'<table class="table table-bordered">';
    $view=$view.'<tr>';
    $view=$view.'<th width="10%">ID</th>';
    $view=$view.'<th width="20%">Section_name</th>';
    $view=$view.'<th width="30%">Image</th>';
    $view=$view.'<th width="30%">Description</th>';
    $view=$view.'<th width="10%">Quote/Header</th>';
    $view=$view.'</tr>';

    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query))
        {      
            $view=$view.'<tr>';
            $view=$view.'<td>'.$row[0].'</td>';
            $view=$view.'<td>'.$row[1].'</td>'; 
            $view=$view.'<td><img src="'.$row[2].'" width="50%"></td>'; 
            $view=$view.'<td>'.$row[3].'</td>';
            $view=$view.'<td>'.$row[4].'</td>';
            $view=$view.'<td>'.'<button class="btn btn-info" value="'.$row["ID"].'" onclick="getBtnValue(this)" data-toggle="modal" data-target="#myModal">Update</button>'.'</td>';
            $view=$view.'</tr>';  
        }
    }
    
    echo $view;
?>