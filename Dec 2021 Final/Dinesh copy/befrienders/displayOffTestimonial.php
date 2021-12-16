<?php session_start();
require("connection.php");
if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>



<?php

        $sql = "Select * from testimonial where status='off'; ";
        $query= mysqli_query($connection,$sql);
        $emoji ="";
        if(mysqli_num_rows($query)>0){
            echo "<table>";
            while($row=mysqli_fetch_assoc($query)){

                $hearts = $row['rating'];

                // for ($i=0; $i<$hearts; $i++){
                //     $emoji = $emoji + "❤";
                // }
                echo '<tr> <td> <p class="spaceTestim" > <i> '.$row["name"].' </i>  says <i> '.$row["remark"].' </i> with <span style="padding-right:20px;"> </span> <span class="heart"> ';
                if($hearts=="1"){
                    echo "❤";
                } else if($hearts=="2"){
                    echo "❤❤";
                } else if($hearts=="3"){
                    echo "❤❤❤";
                } else if($hearts=="4"){
                    echo "❤❤❤❤";
                } else if($hearts=="5"){
                    echo "❤❤❤❤❤";
                }
                echo '</span> </p> <hr> </td> <td style="padding-left:20px;"> <button onclick="approveTestimonial('.$row['ID'].');"
                style=
                "background-color: #28a745;
                padding:5px;
                color:white";
                
                > Approve </button> </td> </tr>';

                

               // echo '<p class="spaceTestim" > '.$row["name"].' Says '.$row["remark"].' with <span class="heart">  ❤ </span> </p>';
            }
            echo "</table>";
        }
        else{
            echo "No more testimonials!";
        }
        ?>