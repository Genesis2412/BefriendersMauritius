<?php

    include ('connection.php');

    $sql="SELECT * FROM home";
    $result = mysqli_query($connection,$sql);
    $data=array();

    if(mysqli_num_rows($result) >= 0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $data[] = $row;
        }
    }

    $search="SELECT name, remark FROM testimonial WHERE ID != 1 AND status='on';"; //Will only displays the testimonials approved by Befrienders
    $query = mysqli_query($connection,$search);

    $select="SELECT name, remark FROM testimonial WHERE ID=1";
    $find= mysqli_query($connection,$select);

    if(mysqli_num_rows($find) >= 0)
    {
        while($lrow=mysqli_fetch_array($find))
        {
            $fetch[] = $lrow;
        }
    }
?>