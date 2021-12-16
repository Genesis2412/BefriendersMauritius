<?php session_start();
require("connection.php");
if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php

        $sql = "Select * from testimonial where status='on'; ";
        $query= mysqli_query($connection,$sql);
        $emoji ="";
        if(mysqli_num_rows($query)>0){
            echo "<table style='border-collapse: collapse;'>";
            while($row=mysqli_fetch_assoc($query)){
                echo "<tr style='border-bottom: 1px solid grey;'>";
                $hearts = $row['rating'];

                // for ($i=0; $i<$hearts; $i++){
                //     $emoji = $emoji + "❤";
                // }
                echo ' <td>  <p class="spaceTestim" > <i> '.$row["name"].' </i>  says <i> '.$row["remark"].' </i> <br/>with <span style="padding-right:15px;"> </span> <span class="heart"> ';
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
                echo '</span> </td> <td> ';
                echo ' <span style="padding-left:25px;"> <button id="Remove'.$row["ID"].'"style="padding:2px;background-color:#454d55;;color:white;"> Delete </button> </span>';
                echo '<span style="padding-left:25px;"> <button id="Archive'.$row["ID"].'"style="padding:2px;background-color:#0b25e6;color:white;"> Archive </button> </span>';
                echo '</td>   </p> </tr> ';

                //echo '<hr>';


                echo "<script>
                                    $(document).ready(function(){
                                        
                                        $('#Archive".$row['ID']."').click(function(){

                                        var ID=".$row['ID'].";
                                            $.ajax({
                                                type:'POST',
                                                url:'archiveTestimonial.php',
                                                data: {ID:ID},
                                                success: function(value){ 
                                                    loadOffTestis();
                                                    //window.location.replace('newAdmin.php');

                                                    

                                                }
                                            });
                                        });
                                    });
                        </script>"
                  ;

                echo "<script>
                                    $(document).ready(function(){
                                        
                                        $('#Remove".$row['ID']."').click(function(){

                                        var ID=".$row['ID'].";
                                            $.ajax({
                                                type:'POST',
                                                url:'deleteTestimonial.php',
                                                data: {ID:ID},
                                                success: function(value){ 
                                                    //loadOffTestis();
                                                    window.location.replace('newAdmin.php');

                                                    

                                                }
                                            });
                                        });
                                    });
                        </script>"
                  ;

                  
              
                

               // echo '<p class="spaceTestim" > '.$row["name"].' Says '.$row["remark"].' with <span class="heart">  ❤ </span> </p>';
            }
            echo "</table>";
        }
        else{
            echo "No more testimonials!";
        }
        ?>