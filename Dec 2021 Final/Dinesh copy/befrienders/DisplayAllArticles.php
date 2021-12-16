<?php
require("connection.php");
$counter=0;
$NumberPagination=1;
$Entered=0;

echo '<div class="jumbotron"> ';
echo ' <h3 id="ArticleClickMsg" class="display-3 text-center" style="padding-right:60px;">  Our Articles at a click</h3><hr>';
echo '<div class="row">';

$sql="select * from article";
$result=mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){

    
    
    while($row=mysqli_fetch_assoc($result)){

        $counter=$counter+1;

        echo '<a href="article/'.$row['ArticleID'].'">';
        echo '<div class="col-lg-3 col-sm-6" style="padding-bottom:15px;" >  ';
        echo '<div class="card" style="width: 14rem;" id="imger'.$row['ArticleID'].'">';
        $imageArticle = $row['CoverImage'];

        if($imageArticle != ""){

            echo '<img src="img//ArticleDir//ArticleUploads//'.$row['CoverImage'].'" width="50px" height="150px" class="card-img-top" alt="Event Captions" >';
        }
        else{
            echo '<img src="img//ArticleDir//ArticleUploads//ad.jpg" width="50px" height="150px" class="card-img-top" alt="Event Captions" >';
        }
        
        
        echo '<div class="card-body" >';
        echo '<p class="card-text" >' .$row['ATitle'].' </a><p id="head'.$row['ArticleID'].'" style="padding-top:10px;"> By '.$row['Author'].'</p></p>';
        echo '</div>';
        echo '</div>';



        echo '</div>';

        
        
        
    }
   
}


else{
    echo "There's nothing to catch up!";
}
?>
          
