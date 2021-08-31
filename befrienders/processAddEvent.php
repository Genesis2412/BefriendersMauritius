<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php 


if(isset($_POST['addEvent'])){

    $eventName = mysqli_real_escape_string($connection,$_POST['EventName']);
    $Description = mysqli_real_escape_string($connection,$_POST['EventDatas']);
    $Location = mysqli_real_escape_string($connection,$_POST['EventLocation']);
    $Type = mysqli_real_escape_string($connection,$_POST['TypeEvent']);
    $Date = mysqli_real_escape_string($connection,$_POST['EventDate']);
    $Time = mysqli_real_escape_string($connection,$_POST['EventTime']);
    

    $file = $_FILES['file'];
    $fileName = $file['name']; // Get the name of the image
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.',$fileName); //Separate the fileName and Extensions and store it in array
    $fileActualExt = strtolower(end($fileExt)); //make extension lowercase and take last element of array(exension)

    $allowed = array('jpg', 'jpeg' ,'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){ //No error
            if($fileSize<5000000) {
                
                $fileNewName = uniqid('',true).'.'.$fileActualExt; //Timestamp of microsecond as fileName

                $fileDestination = 'img/EventDir/EventUpload/'.$fileNewName;

                move_uploaded_file($fileTmpName,$fileDestination);
                // header("Location: test.php?uploadsuccess");
                // echo "File successfully uploaded! ";

            } else{
                echo "File is too big!";
            }

        } else{
            echo "Error: something went wrong!";
        }

    } else {
        echo "You cannot upload file of this type!";
    }


    $coverImg = $fileNewName; //Add Upload to db system 

    $sql = "INSERT INTO events(EventName,EventDescription,EventType,EventLocation,EventDate,EventTime,CoverImage) 
    VALUES ('$eventName','$Description','$Type','$Location','$Date','$Time','$coverImg');";

    

    if(mysqli_query($conn,$sql)){
        $_SESSION['adminWarning'] = "New Event ".$eventName." has been added! ";
		$additional_txt = "Added Event :$eventName";		
		$auditSql = "INSERT INTO `audit`( `done_by`, `section`, `change_source`, `add_text`) VALUES (' ".$_SESSION['name']." ','Event','Add','$additional_txt');";
		$audited = mysqli_query($connection,$auditSql);

        header("Location: newAdmin.php");

    }
    else{
        $_SESSION['adminWarning'] = "Something went wrong with creating Event ".$eventName."! ";
        header("Location: newAdmin.php");
    }
}


?>