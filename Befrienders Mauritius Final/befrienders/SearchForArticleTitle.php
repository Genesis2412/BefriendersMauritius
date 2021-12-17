<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>
<?php



    $query=mysqli_real_escape_string($connection,$_POST['keyTerm']);
    $sql="select * from article where ATitle LIKE '%".$query."%';";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){

        while($row=mysqli_fetch_assoc($result)){

            echo "Article: <a href='FormToModifyArti.php?id=".$row['ArticleID']."' target='_blank'>  ".$row['ATitle']." </a><br/>";

        }
    }


?>