<?php
                        require("connection.php");
                        $sqlCodes = "select * from article";
                        $resultSet=mysqli_query($conn,$sqlCodes);

                        if(mysqli_num_rows($resultSet)>0){
                            
                            echo "<div id='DeletionResult'> <table border='1'>";
                            echo "<tr>
                            <th> Article ID</th>
                            <th> Article Heading </th>
                            <th Date Posted </th>
                            <th> Action </th>
                            </tr>";
                            while($row=mysqli_fetch_assoc($resultSet)){
                                echo "
                                <tr>
                                <td> ".$row['ArticleID']."</td>
                                <td> ".$row['ATitle']."</td>
                                <td> ".$row['TimeWritten']."</td>
                                <td style='padding:5px;'> <button  id='DelBtn".$row['ArticleID']."'class='btn btn-danger'> Delete </button> </td>
                                </tr>
                                ";

                                echo " <script>                               
                                $('#DelBtn".$row['ArticleID']."').click(function(){ //Ajax function to Terminate Account
                
                                    var ArticleID='".$row['ArticleID']."';
                                    $.post('deleteThisArticle.php', {
                                                ident: ArticleID  // Values being passed to modifyStatus.php
                                            }, function(data){
                                                $('#DeletionResult').html(data);
                                                
                                            });
                                                               
                                }); </script>";

                            }
                            echo "</table></div>";
                        }

                    ?>