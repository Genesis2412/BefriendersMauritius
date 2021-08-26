<?php
    require("connection.php");
                $sqlCode= "select * from events ORDER BY EventDate DESC LIMIT 1;";
                $results=mysqli_query($conn,$sqlCode);

                if(mysqli_num_rows($results)>0){

                    while($row=mysqli_fetch_assoc($results)){

                        echo ('<a style="color:rgb(255, 145, 0)" href="MyEvent.php?Eventid='.$row['EventID'].'"> '.$row['EventName']. ' </a>');
                    }

                    
                }
                else{
                    echo "There is currently no Event as trending. Please come back again after a while";
                }
?>