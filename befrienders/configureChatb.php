


<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>
<?php
echo "<button id='dispTab' style='background-color:grey;color:white;padding:10px;border-radius:5px;'> Display chatbot memory </button> &nbsp;";
echo "<button id='hideTab' style='background-color:grey;color:white;padding:10px;border-radius:5px;display:none;'> Hide chatbot memory </button> &nbsp;";
echo "<button id='feeder' style='background-color:grey;color:white;padding:10px;border-radius:5px;'> Feed chatbot </button> &nbsp;";
echo "<button style='background-color:grey;color:white;padding:10px;border-radius:5px;'> <a target='_blank' href='zz.html'> Go to chatbot </a> </button> &nbsp;";

echo "<div id='chatbotTeach' style='margin:7%;display:none;'>";
 
echo ' <h3> Teach chatbot </h3>
<form name="cbfeeder" action="feedCb.php" method="POST">
<input style="padding:10px;border:1px solid grey;" type="text" size="50" name="trigs"  placeholder="Enter Triggers"/> &nbsp;
<input style="padding:10px;border:1px solid grey;" type="text" size="50" name="rep" placeholder="Enter Reply"/>
<input style="padding:10px;border:1px solid grey;" type="submit" name="submcbfeeder" value="Feed"/> 
</form>
';

echo '<br/><h3> Expected Output from chatbot </h3>';
echo '<input type="text" style="padding:10px;border:1px solid grey;" size="50" onkeydown=" simulate(this.value); " placeholder="Enter expected user input"/>';
echo "<br/> <h4 style='padding-left:20px;'> Chatbot reply </h4> <div id='cbreplyPlaceholder' style='padding-left:20px;padding-top:5px;padding:10px;background-color:lightblue;color:black;'>  </div>";
echo "</div>";
echo " <br/><br/><br/>";
$sql = "SELECT * FROM chatbot";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    echo "<table id='chatbotTabRec' style='background-color:#00b9eb;display:none; color:white;'> ";
    echo "<tr>";
    echo "<th style='padding:5px;'>ID</th>";
    echo "<th style='padding:5px;'>Trigger</th>";
    echo "<th style='padding:5px;'>Reply</th>";
    echo "<th style='padding:5px;'>Edit</th>";
    // echo "<th style='padding:5px;'>Delete</th>";
    echo "<tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td style='padding:5px;'> ".$row['recordID']." </td>";
        echo "<td style='padding:5px;'> ".$row['trigs']." </td>";
        echo "<td style='padding:5px;'> ".$row['reply']." </td>";

         echo "<td style='padding:5px;'> <button style='background-color:red;color:white;padding:10px;border-radius:5px;'> Delete </button> </td>";
        echo "<tr>";
    }
    echo "</table>";
}else{
    echo "<h4> No data for chatbot </h4>";
}




echo '<script> 
    $(document).ready(function(){
        $("#dispTab").click(function(){
            $("#chatbotTabRec").fadeIn("slow");
            $("#dispTab").fadeOut("slow");
            $("#chatbotTeach").fadeOut("slow");
            $("#hideTab").fadeIn("slow");

        });
    })
</script>';

echo '<script> 
    $(document).ready(function(){
        $("#hideTab").click(function(){
            $("#chatbotTabRec").fadeOut("slow");
            $("#hideTab").fadeOut("slow");
            $("#dispTab").fadeIn("slow");
            $("#chatbotTeach").fadeOut("slow");
        });
    })
</script>';

echo '<script> 
    $(document).ready(function(){
        $("#feeder").click(function(){
            $("#chatbotTabRec").fadeOut("slow");
            $("#hideTab").fadeOut("slow");
            $("#chatbotTeach").fadeIn("slow");
            $("#dispTab").fadeIn("slow");
        });
    })
</script>';
?>