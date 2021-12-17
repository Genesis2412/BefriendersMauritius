


<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>
<?php

$count=0;
$tabName = "befriendersAuditTable";

$sql = "select * from Information_schema.columns where Table_name = 'audit' AND TABLE_SCHEMA = 'nem644_befriendersmauritius'; ";

$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    echo "<table border='1' style='background-color:#212529; color:white;'> ";
    echo "<tr>";
    while($row = mysqli_fetch_row($result)){
        echo "<th>";
        echo $row[3];
        echo "</th>";
        $count++;
        
    }
    echo "</tr>";

    $sql1 = "SELECT * FROM audit  ;";

    $data = mysqli_query($connection,$sql1);
    if(mysqli_num_rows($data)>0){
        //echo "<tr> <td colspan='11'> Staff Database is not empty </td> </tr>";
        while($row = mysqli_fetch_row($data)){
            echo "<tr >";
                for($y=0;$y<$count;$y++){
                    echo "<td style='padding:5px;'> $row[$y] </td>";
                }
               
                

            echo "</tr>";
        }
    }
    else{
        echo "<tr '> <td colspan='11'> Database is empty </td> </tr>";
    }


    echo "</table>";
}


?>