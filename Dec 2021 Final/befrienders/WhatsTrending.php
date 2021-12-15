<?php
    require("connection.php");
                $sqlCode= "select * from article ORDER BY TimeWritten DESC LIMIT 1;";
                $results=mysqli_query($conn,$sqlCode);

                if(mysqli_num_rows($results)>0){

                    while($row=mysqli_fetch_assoc($results)){

                        echo ('<a href="Article.php?id='.$row['ArticleID'].'"> '.$row['ATitle'].' </a>');
                    }

                    
                }
                else{
                    echo "There is currently no article as trending. Please come back again after a while";
                }
?>