<?php
    require("connection.php");
            $sql="select * from article ORDER BY ArticleID DESC LIMIT 5;";
            $res=mysqli_query($conn,$sql);

            if(mysqli_num_rows($res)>0){

                while($row=mysqli_fetch_assoc($res)){
                    echo ('<a href="Article.php?id='.$row['ArticleID'].'" title="'.$row['ATitle'].'"> ');
                    echo ('<div class="MiddleOne" >');

                    if($row['CoverImage']!=""){
                        echo ('<div id="EmptySpacer"> <img id="Img'.$row['ArticleID'].'" src="img//ArticleDir//ArticleUploads//'.$row['CoverImage'].'" width="250px" height="170px" alt="Caption">');
                        
                        
                    }
                    else{
                        echo ('<img id="Img'.$row['ArticleID'].'" src="img//ArticleDir//InStore//Article3.jpg" width="250px" height="170px" alt="Caption">');
                        
                    }

                    
                    $modifiedHeader = substr($row['ATitle'],0,20);
                    if(strlen($row['ATitle'])>20){
                        $modifiedHeader=$modifiedHeader."..";  
                    }
                    echo ('<p class="EventName'.$row['ArticleID'].'" style="background-color:lightgray;padding-right:20%;">'.$modifiedHeader.' &nbsp;&nbsp; </p>');
                    echo ('</div></div>');
                    echo ('</a> ');

                }

            }
            else{
                echo "No Articles for the moment";
            }
        ?>