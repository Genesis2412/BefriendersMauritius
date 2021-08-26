<?php session_start();
require('connection.php');

if(isset($_POST['addEvent'])){

    $eventName = $_POST['EventName'];
    $Description = $_POST['EventDatas'];
    $Location = $_POST['EventLocation'];
    $Type = $_POST['TypeEvent'];
    $Date = $_POST['EventDate'];
    $Time = $_POST['EventTime'];
    

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
        header("Location: newAdmin.php");

    }
    else{
        $_SESSION['adminWarning'] = "Something went wrong with creating Event ".$eventName."! ";
        header("Location: newAdmin.php");
    }
}


?>