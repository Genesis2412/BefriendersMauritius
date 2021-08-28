<?php session_start();

if(!(isset($_SESSION['staff'])) && (!($_SESSION['Position']=="3")))
{
    $_SESSION['LoginWarns'] = "Error :You are not authorized to access this page";
    header("Location: signin.php");

}

?>
<?php 

require('connection.php');

if(isset($_GET['id'])){
    $id= mysqli_real_escape_string($connection,$_GET['id']);


    ?>
    <html>
    <head>
        <title> Modify Events <?php echo $id; ?> </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> <!--Bootstrap CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <body>
    <div class="jumbotron">
    <?php
    echo "<h1> You are now editing the Event ID: ".$id."</h1>";
    echo "<span style='float:right'> Back to  <a href='admin.php'> Admin Interface</a></span> "
    ?>

    <form name="EditEvent" method="POST" action="#">
        <?php
            $sqlCodeE="select * from events where EventID='".$id."' ; ";
            $resultSet=mysqli_query($conn,$sqlCodeE);

            if(mysqli_num_rows($resultSet)>0){

                while($row=mysqli_fetch_assoc($resultSet)){

                    $EventName = $row['EventName'];
                    $Descript = $row['EventDescription'];
                    $Location = $row['EventLocation'];
                    $EventType = $row['EventType'];
                    $EventDate = $row['EventDate'];
                    $EventTime = $row['EventTime'];
                }

            }
        ?>
        
         Event Name : <br/> <input type="text"  name="nameOfEvent" size="50" value=" <?php echo $EventName ?> "/> <br/>
         Event Content: <br/> <textarea name="Evecontents"   rows="20" cols="75" > <?php echo $Descript ?> </textarea> <br/>
        <br/>
         Location:<br/>
        <input type="text" name="loc" id="EveLoc" style="padding-right:25px;" value="<?php echo $Location ?>"/><br/>
         Date:<br/>
        <input type="date" name="DateEvent" id="EveDate" value="<?php echo $EventDate ?>"/><br/>
         Time:<br/>
        <input type="time" name="TimeEvent" id="EveTime" value="<?php echo $EventTime ?>"/><br/>
         Event Type:<br/>
        <?php
            switch ($EventType) {
                case "Talk":
                  echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk" checked/>
                  <label for="Talk"> Talks </label><br>
                  <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                  <label for="Formation"> Formation</label><br>
                  <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                  <label for="Refresher Course"> Refresher Course </label><br>
                  <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                  <label for="Awareness"> Awareness </label><br>
                  <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                  <label for="Others"> Others </label><br><br>';
                  break;
                case "Formation":
                    echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                    <label for="Talk"> Talks </label><br>
                    <input type="radio" id="Formation" name="TypeEvent" value="Formation" checked/>
                    <label for="Formation"> Formation</label><br>
                    <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                    <label for="Refresher Course"> Refresher Course </label><br>
                    <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                    <label for="Awareness"> Awareness </label><br>
                    <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                    <label for="Others"> Others </label><br><br>';
                  break;
                case "Refresher Course":
                    echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                    <label for="Talk"> Talks </label><br>
                    <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                    <label for="Formation"> Formation</label><br>
                    <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course" checked/>
                    <label for="Refresher Course"> Refresher Course </label><br>
                    <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                    <label for="Awareness"> Awareness </label><br>
                    <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                    <label for="Others"> Others </label><br><br>';
                  break;
                  case "Awareness":
                    echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                    <label for="Talk"> Talks </label><br>
                    <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                    <label for="Formation"> Formation</label><br>
                    <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                    <label for="Refresher Course"> Refresher Course </label><br>
                    <input type="radio" id="Awareness" name="TypeEvent" value="Awareness" checked/>
                    <label for="Awareness"> Awareness </label><br>
                    <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                    <label for="Others"> Others </label><br><br>';
                  break;
                case "Others":
                    echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                    <label for="Talk"> Talks </label><br>
                    <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                    <label for="Formation"> Formation</label><br>
                    <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                    <label for="Refresher Course"> Refresher Course </label><br>
                    <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                    <label for="Awareness"> Awareness </label><br>
                    <input type="radio" id="Others" name="TypeEvent" value="Others" checked/>
                    <label for="Others"> Others </label><br><br>';
                  break;
                  default:
                  echo '<input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                  <label for="Talk"> Talks </label><br>
                  <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                  <label for="Formation"> Formation</label><br>
                  <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                  <label for="Refresher Course"> Refresher Course </label><br>
                  <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                  <label for="Awareness"> Awareness </label><br>
                  <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                  <label for="Others"> Others </label><br><br>';

              }
        ?>
        <input type="submit" name="SubmitChangeArticle" value="Apply Changes"/>

    </form>

    <?php
        if(isset($_POST['SubmitChangeArticle'])){ //Form submit in same page

            $Eventtitle= mysqli_real_escape_string($connection,$_POST['nameOfEvent']);
            $Content= mysqli_real_escape_string($connection,$_POST['Evecontents']);
            $Locat= mysqli_real_escape_string($connection,$_POST['loc']);
            $dateE= mysqli_real_escape_string($connection,$_POST['DateEvent']);
            $timeE= mysqli_real_escape_string($connection,$_POST['TimeEvent']);
            $typeE= mysqli_real_escape_string($connection,$_POST['TypeEvent']);
            //TimeStamp will automatically be updated
            
            $sqlInsert="UPDATE `events` SET EventName='$Eventtitle' , EventDescription='$Content', EventType='$typeE', EventLocation='$Locat',EventDate='$dateE',EventTime='$timeE' WHERE EventID='$id';";

            if( mysqli_query($conn,$sqlInsert)){
                $_SESSION['adminWarning'] = "Event with ID ".$id." has been modified!";
                header("Location: newadmin.php");
                
                
               

            }
            else{
                //echo "Error: ".mysqli_error($conn);
                $_SESSION['adminWarning'] = mysqli_error($conn);
                header("Location: newadmin.php");
            }


        }


}
else{
    $_SESSION['adminWarning'] = "You are not authorized to do this change";
    header("Location: newadmin.php");
}

?>
</div>
</body>
</html>