<?php


$id = $_POST['ident'];

$sql = "DELETE FROM article where ArticleID='".$id."';";
if(mysqli_query($conn,$sql))
        {
            echo "<script> alert('Deleted: Article ID ".$id."'); </script>";
        }

        $sql = "select * from article";
        $result=mysqli_query($conn,$sql)

        if(mysqli_num_rows($result)){

            while($row=mysqli_fetch_assoc($result)){
                echo "
                                <tr>
                                <td> ".$row['ArticleID']."</td>
                                <td> ".$row['ATitle']."</td>
                                <td> ".$row['TimeWritten']."</td>
                                <td style='padding:5px;'> <button  id='DelBtn".$row['ArticleID']."'class='btn btn-danger'> Delete </button> </td>
                                </tr>
                                ";
            }
        }

?>