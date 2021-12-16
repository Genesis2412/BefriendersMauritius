<?php   
        session_start();
require("connection.php");

if(isset($_POST['pwd'])){

    $username = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $SecuredPwd=md5($pwd);

    // $sql="select * from staff where Binary username='$username' AND Binary password='$SecuredPwd'; ";
    // $result=mysqli_query($conn,$sql);

    $prepSql = $conn->prepare("select * from staff where Binary username=? AND Binary password=?; ");
    $prepSql->bind_param("ss",$username,$SecuredPwd);
    $prepSql->execute();

    $result = $prepSql->get_result();


    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){

            $_SESSION["Username"]  = $row['Username'];
            $_SESSION['staff'] = "YES";
            $_SESSION['email'] =  $row['email'];
            $_SESSION['name'] = $row['first_name'] ." ".$row['last_name'];
            $_SESSION['Position'] = $row['position'];
            $_SESSION['ASKLA'] = $row['id'];


        }
        
        //header("Location: newadmin.php"); 
       
        header("Location: admin.php"); 
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