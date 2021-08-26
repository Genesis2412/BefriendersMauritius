<?php session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>





    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css//EventArticleAjax.css">
    <!-- <script src="js//WeatherApi.js"> </script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
    <script>
       function validateCreateArt(){

           if(document.CreateArticle.ArticleTitle.value.length==0){

            document.getElementById('error_message').innerHTML = "The article title is not valid!";
               return false;
           }


        //    var ArticleContent = document.CreateArticle.contents;

           if($("#ArticleData").val().trim().length < 1){
                
                document.getElementById('error_message').innerHTML = "The article content is not valid!";
                document.getElementById('ArticleData').focus();
                return false;

           }
           return true; /* No error */
       }

       
       


    </script>
</head>
<body>

	<button class="btn btn-info" value="" data-toggle="modal" data-target="#AddArti"> Add Article </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#DelArti"> Delete Article </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#ModifArti"> Modify  Article </button>

	<!-- Modal Start Add Article-->
    <div id="AddArti" class="modal fade hideMe"  role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Add new Article </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">

                    <form name="CreateArticle" method="POST" action="processAddArticle.php" onsubmit="return validateCreateArt();" enctype="multipart/form-data">
                        Enter Article Title : <input type="text" id="ArtTitle" name="ArticleTitle"/> <br/>
                        Enter Article Content: <br/> <textarea name="contents" id="ArticleData"  rows="20" cols="50" > </textarea> <br/>
                        Attach Image Cover(Display as Caption): <input type="file" name="CaptImg"/>
                        <br/> 
                        <!-- Attach Image Illustrations: <input type="file" name="ArticleMultiFile" /> -->
                        <br/> 
                        <input type="submit" value="Add Article" name="SubmAddArticle" />

                    </form>

                  
                </div>
                <div class="modal-footer">
                    <p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
                    <p id="sessionInfoMsg"> 
                        
                    <?php
                        if(isset($_SESSION['ArticleBackend'])){
                            echo '<script>
                            $(document).ready(function(){
                                $("#closeBtn").click(function(){
                                    $("#dismissMeWhenClicked").hide("slow","swing");
                                })
                            });
                            </script>
                                
                            <div id="dismissMeWhenClicked" class="alert alert-warning alert-dismissible fade show" role="alert">
                                '.$_SESSION['ArticleBackend'].'
                                <button type="button" id="closeBtn" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div> ';
                            unset($_SESSION['ArticleBackend']);
                        }
                    ?>
                    
                    </p> 
                    <p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of modal-->



    <!-- Modal Start Delete Article -->
    <div id="DelArti" class="modal fade hideMe" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Delete an article </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <!--Content --> 
                    
                    <?php
                        require("connection.php");
                        $sqlCodes = "select * from article";
                        $resultSet=mysqli_query($conn,$sqlCodes);

                        if(mysqli_num_rows($resultSet)>0){
                            echo "<table border='1' style='background-color:#454d55;color:white;'>";
                            echo "<tr>
                            <th style='padding:10px;'> Article ID</th>
                            <th style='padding:10px;'> Article Heading </th>
                            <th style='padding:10px;'> Date Posted </th>
                            <th style='padding:10px;'> Action </th>
                            </tr>";
                            while($row=mysqli_fetch_assoc($resultSet)){
                                echo "
                                <tr>
                                <td style='padding:10px;'> ".$row['ArticleID']."</td>
                                <td style='padding:10px;'> ".$row['ATitle']."</td>
                                <td style='padding:10px;'> ".$row['TimeWritten']."</td>
                                <td style='padding:10px;'> <button  id='DelBtn".$row['ArticleID']."'class='btn btn-danger'> Delete </button> </td>
                                </tr>
                                ";

                             // alert('Trying to delete Article ID: ".$row['ArticleID']." ');
                                
                             echo "<script>
                                    $(document).ready(function(){
                                        
                                        $('#DelBtn".$row['ArticleID']."').click(function(){
                                            
                                            var ID=".$row['ArticleID'].";
                                            $.ajax({
                                                type:'POST',
                                                url:'deleteArticle.php',
                                                data: {ID:ID},
                                                success: function(value){ 

                                                    //alert('Article has been deleted!');
                                                    window.location.replace('newAdmin.php');

                                                }
                                            });
               

                                        });
                                    });
                                
                                </script>";
                            }
                            echo "</table>";
                        }
                    ?>

                </div>
                <div class="modal-footer">
                    <p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
                    <p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of modal-->

    <!-- Modal Start Modify Article-->
    <div id="ModifArti" class="modal fade hideMe" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Modify an article </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <!--Content -->
                    <input type="text" name="SearchArticle" id="SearchArticle" placeholder="Enter Article Title"/> 
                        <div id="searchArticleDisp"> </div>
                </div>

                <script>

                $(document).ready(function(){

                        $("#SearchArticle").keyup(function(){ 

                    var constraint=$("#SearchArticle").val();
                    if(constraint=="" || constraint==" "){
                        document.getElementById('searchArticleDisp').style="display:none";
                    }
                    else{
                        $.post("SearchForArticleTitle.php", {
                        keyTerm: constraint
                        }, function(data){
                        $("#searchArticleDisp").html(data);
                        $("#searchArticleDisp").fadeIn(1000);
                        });

                    }
                    });

                    });    

           </script>

                <div class="modal-footer">
                    <p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
                    <p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of modal-->

    <br/>
    <br/>
</body>
</html>