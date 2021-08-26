<?php
    require('connection.php');


    $query=$_POST['keyTerm'];
    
    $sql="select * from events where EventName LIKE '%".$query."%';";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){

        while($row=mysqli_fetch_assoc($result)){

            echo "Event: <a href='FormToModifyEvent.php?id=".$row['EventID']."' target='_blank'>  ".$row['EventName']." </a><br/>";

        }
    }


?>