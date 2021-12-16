<?php
    require("connection.php");
    if(isset($_POST['keyTerm'])){

        $keyword = mysqli_real_escape_string($conn,$_POST['keyTerm']);

        if($keyword!=""){
        
            $sql="select * from events where EventName LIKE '%".$keyword."%' OR EventDescription LIKE '%".$keyword."%' OR EventType LIKE '%".$keyword."%' ;";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                
                echo "<b> ".mysqli_num_rows($result)." Events containing keyterm '".$keyword."' .<br/></b>";
                while($row=mysqli_fetch_assoc($result)){

                    echo $row['EventType'].': <a href="MyEvent.php?Eventid='.$row['EventID'].'"> '.$row['EventName'].'</a><br/>';
                }
            }
            else{
                echo "There are no events which contain the keyterm: ".$keyword;
            }
        }
        else{
            
        }
    }


?>