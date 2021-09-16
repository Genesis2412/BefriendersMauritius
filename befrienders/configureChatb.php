<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  


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
echo "<button id='viewMissing' style='background-color:grey;color:white;padding:10px;border-radius:5px;'> View missing Conversation </button> &nbsp;";
echo "<button style='background-color:grey;color:white;padding:10px;border-radius:5px;'> <a target='_blank' href='zz.html' style='color:white;'> Go to chatbot </a> </button> &nbsp;";

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
    echo "<table id='chatbotTabRec' border='1' style='background-color:#343a40;display:none; color:white;'> ";
    echo "<tr>";
    echo "<th style='padding:5px;'>ID</th>";
    echo "<th style='padding:5px;'>Trigger</th>";
    echo "<th style='padding:5px;'>Reply</th>";
    echo "<th style='padding:5px;'>Action</th>";
    
    echo "<tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<th style='padding:5px;'> ".$row['recordID']." </th>";
        echo "<th style='padding:5px;'> ".$row['trigs']." </th>";
        echo "<th style='padding:5px;'> ".$row['reply']." </th>";

         echo "<td style='padding:5px;'> <button style='background-color:red;color:white;padding:10px;border-radius:5px;'> <a href='deleteEntry.php?delID=".$row['recordID']."'> Delete </a> </button> </td>";
        echo "<tr>";
    }
    echo "</table>";
}else{
    echo "<h4> No data for chatbot </h4>";
}

// For Missing conversations
$sql = "SELECT * FROM missing_chatbot_pair";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    echo "<table border='1' id='viewMissingTab' style='background-color:#343a40;display:none; color:white;'> ";
    echo "<tr>";
    echo "<th style='padding:5px;'>ID</th>";
    echo "<th style='padding:5px;'>User Entry</th>";
    echo "<th style='padding:5px;'>Triggers</th>";

    echo "<th style='padding:5px;'>Action</th>";
    
    echo "<tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='rec".$row['recordID']."'>";
        echo "<th style='padding:5px;'> ".$row['recordID']." </th>";
        echo "<th style='padding:5px;'> ".$row['userEntry']." </th>";        
        echo "<th id='tag".$row['recordID']."' style='padding:5px;'> ".$row['Tags']." </th>";

         echo "<td style='padding:5px;'> <button style='background-color:#28a745;;color:white;padding:10px;border-radius:5px;' onclick='feedNewToChatBot(".$row['recordID'].");'>  Feed to Chatbot  </button> </td>";
        echo "<tr>";
    }
    echo "</table>";

    echo "<br/> <h3 id='WarnDisplayer'> </h3>";
    echo " <input type='text' id='replyEntered' style='padding:10px;border:1px solid black;display:none;' onkeydown='if(event.keyCode == 13) { updateChatBotMem(this.value) }' size='60'  placeholder='Enter Reply'/>";
    echo "<input type='hidden' id='msgID' value='null'/>";
}else{
    echo "<h4> No data for chatbot </h4>";
}
// End of For Missing conversations


echo '<script> 
    $(document).ready(function(){
        $("#dispTab").click(function(){
            $("#chatbotTabRec").fadeIn("slow");
            $("#dispTab").fadeOut("slow");
            $("#viewMissingTab").fadeOut("slow");
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
            $("#viewMissingTab").fadeOut("slow");
            $("#chatbotTeach").fadeOut("slow");
        });
    })
</script>';

echo '<script> 
    $(document).ready(function(){
        $("#feeder").click(function(){
            $("#chatbotTabRec").fadeOut("slow");
            $("#hideTab").fadeOut("slow");
            $("#viewMissingTab").fadeOut("slow");
            $("#chatbotTeach").fadeIn("slow");
            
            $("#dispTab").fadeIn("slow");
        });
    })
</script>';
?>

<script>
    function feedNewToChatBot(id){
        
        document.getElementById("replyEntered").style.display = "block";
        document.getElementById("msgID").value = id;
        document.getElementById("WarnDisplayer").innerHTML = "Now handling record "+id;        
        
        // document.getElementById("rec"+id).style="display:none;"; //Used for hiding Simulate ajax
        
    }

    function updateChatBotMem(msg){
        var id = document.getElementById("msgID").value;
        var trigs = document.getElementById("tag"+id).innerHTML;
        //alert(msg + " trigger "+trigs);

        $.post('addToMemory.php', {m : msg, t : trigs, iden : id}).done(function(response){
            document.getElementById("WarnDisplayer").innerHTML = response; 
        }); 

        //Used to Simulate ajax
        document.getElementById("rec"+id).style="display:none;"; 
        document.getElementById("replyEntered").value = "";
        document.getElementById("replyEntered").style = "padding:10px;border:1px solid black;display:none;";
        
    }
</script>

<script> 
    $(document).ready(function(){
       $("#viewMissing").click(function(){
            $("#chatbotTabRec").fadeOut("slow");
            $("#hideTab").fadeOut("slow");
            $("#chatbotTeach").fadeOut("slow");
            $("#viewMissingTab").toggle("slow");
            $("#dispTab").fadeIn("slow");
        });
    })
</script>

