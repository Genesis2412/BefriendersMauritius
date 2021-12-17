<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


1<?php 

    if(isset($_POST['SubmAddArticle'])){

        $author = $_SESSION['FirstName']." ".$_SESSION['LastName'];

        $author = $_SESSION['name'];
        
        $Title = mysqli_real_escape_string($connection,$_POST['ArticleTitle']);
        $ArticleData = mysqli_real_escape_string($connection,$_POST['contents']);
        




        $file = $_FILES['CaptImg'];
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

                    $fileDestination = 'img/ArticleDir/ArticleUploads/'.$fileNewName;

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







        $sql = "INSERT INTO article(ATitle,Author,ArticleData,CoverImage) VALUES ('$Title','$author','$ArticleData','$coverImg'); ";
        
        if(mysqli_query($conn,$sql)){
            $_SESSION['adminWarning'] = "<a href='MainArticle.html' target='_blank' style='color:red;'> Article </a> has been successfully created! ";

            $additional_txt = "Added Article with Heading: $Title";		
            $auditSql = "INSERT INTO `audit`( `done_by`, `section`, `change_source`, `add_text`) VALUES (' ".$_SESSION['name']." ','Article','Add','$additional_txt');";
            $audited = mysqli_query($connection,$auditSql);

             header("Location: newadmin.php");
        }

        else{
            $_SESSION['adminWarning'] = "Article has not been created!";
            header("Location: newadmin.php");

        }




    }
       

        



        
            

            


?>
