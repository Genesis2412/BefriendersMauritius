<?php session_start();
    require("connection.php");

    if(isset($_POST['SubmAddArticle'])){
        $author = $_SESSION['FirstName']." ".$_SESSION['LastName'];

        $author = "DevArticle";
        $Title = $_POST['ArticleTitle'];
        $ArticleData = $_POST['contents'];


        // $file = $_FILES['CaptImg'];
        // $numOfFiles = count($_FILES['ArticleMultiFile']['name']);
        // //Start of File upload sequence
        // $fileName = $file['name']; // Get the name of the image
        // $fileTmpName = $file['tmp_name'];
        // $fileSize = $file['size'];
        // $fileError = $file['error'];
        // $fileType = $file['type'];
        // $fileExt = explode('.',$fileName); //Separate the fileName and Extensions and store it in array
        // $fileActualExt = strtolower(end($fileExt)); //make extension lowercase and take last element of array(exension)
        // $allowed = array('jpg', 'jpeg' ,'png');
        // if(in_array($fileActualExt, $allowed)){
        //     if($fileError === 0){ //No error
        //         if($fileSize<5000000) {                    
        //             $fileNewName = uniqid('',true).'.'.$fileActualExt; //Timestamp of microsecond as fileName
        //             $fileDestination = 'img/ArticleDir/ArticleUploads/'.$fileNewName;
        //             move_uploaded_file($fileTmpName,$fileDestination);
        //             // header("Location: test.php?uploadsuccess");
        //             // echo "File successfully uploaded! ";
        //         } else{
        //             echo "File is too big!";
        //         }
        //     } else{
        //         echo "Error: something went wrong!";
        //     }
        // } else {
        //     echo "You cannot upload file of this type!";
        // }
        // //End of File upload sequence
        // $coverImagePath =  $fileNewName;
        // //$coverImagePath="SS";


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
            $_SESSION['adminWarning'] = "Article has been successfully created!";
             header("Location: newadmin.php");
        }

        else{
            $_SESSION['adminWarning'] = "Article has not been created!";
            header("Location: newadmin.php");

        }




    }
       

        



        
            

            


?>
