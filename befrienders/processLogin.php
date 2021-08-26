<?php session_start();
require("connection.php");

if(isset($_POST['pwd'])){

    $username = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $SecuredPwd=md5($pwd);

    $sql="select * from staff where Binary username='$username' AND Binary password='$SecuredPwd'; ";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){

            $_SESSION["Username"]  = $row['Username'];
            $_SESSION['staff'] = "YES";
            $_SESSION['email'] =  $row['email'];
            $_SESSION['name'] = $row['first_name'] ." ".$row['last_name'];
            $_SESSION['Position'] = $row['position'];


        }
        
        header("Location: newadmin.php"); 
        
    }
    else{
        $_SESSION['LoginWarns'] = "Error : Incorrect username and password combinations";
        header("Location: signin.php");
    }
    

}
else{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");
}

?>