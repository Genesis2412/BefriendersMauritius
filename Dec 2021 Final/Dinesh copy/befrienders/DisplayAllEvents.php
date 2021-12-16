<?php
require("connection.php");



echo '<h3 class="text-center "> Our List of Events : </h3> <br/>';
echo '<div class="row">';


$sql="select * from events ORDER BY EventDate DESC LIMIT 16"; //Does not allow more than 16 events to display at once
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

    
    
    while($row=mysqli_fetch_assoc($result)){

      
        echo "<!--Event Card Start Here -->";
        echo '<a style="color:black;" href="event/'.$row['EventID'].'"> <div class="col-lg-3 col-sm-6" id="cardSpacers">    ';          
        echo '<div class="card" style="width: 18rem;">';


        if($row['EventType']=="Talk"){
            echo '<div class="card-header" style="background-color: #04adfc;">Talks</div>';
        }
        else if($row['EventType']=="Formation"){
            echo '<div class="card-header" style="background-color:  #04fc2d;">Formation</div>';
        }
        else if($row['EventType']=="Refresher Course"){
            echo '<div class="card-header" style="background-color: #f1d620;">Refresher Course</div>';
        }
        else if($row['EventType']=="Awareness"){
            echo '<div class="card-header" style="background-color: #b8b8b8;">Awareness</div>';
        }
        else if($row['EventType']=="Others"){
            echo '<div class="card-header" style="background-color: #0869ca;">Others</div>';
        }
        else{
            echo '<div class="card-header" style="background-color: black;color:white">Unique Event</div>';
        }
        
        if($row['CoverImage']==""){
            echo '<img src="img//EventDir//InStore//talk.jpg" width="50px" height="150px" class="card-img-top" alt="Event Captions">';
        }
        else{

            echo '<img src="img//EventDir//EventUpload//'.$row['CoverImage'].'" width="50px" height="150px" class="card-img-top" alt="Event Captions">';
        }

        
        echo '</a><div class="card-body">';
        echo '<p class="card-text"> '.$row['EventName'].' </p>';
        echo '</div>';
        echo' </div>' ;                
        echo' </div> ';
        echo '<!--Event Card Ends here -->';

        
        
        
    }
   
}


else{
    echo "There's nothing to catch up!";
}

echo "</div> ";
?>
          
