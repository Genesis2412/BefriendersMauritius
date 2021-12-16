<?php session_start();

if(!(isset($_SESSION['staff'])) && (!($_SESSION['Position']=="3")))
{
    $_SESSION['LoginWarns'] = "Error : You are not authorized to access this site";
    header("Location: signin.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="./css/hbackend.css">
    <title></title>
</head>
<body class="jumbotron">
    <h2> You can change the contents of Befriendersmauritius.com homepage here </h2>
    <div style="padding-left:50px;font-size:25pt;">

        <a href="#" onclick="allItems();return false;">List the sections</a></li> <br/>
        <a href="newadmin.php" >Return to Admin Interface</a></li>
    </div>
    <div class="content">
    </div>

    <!-- Modal for update -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Details</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_form"></form>
                    <form method="POST" enctype="multipart/form-data" id="myform">
                    <label>Image</label>
                    <input type="file" id="file" name="file"/>

                    <div class="preview" style="text-align: center;">
                        <img src="" id="img" width="100" height="100">
                    </div>

                    <input type="button" class="button" value="Upload" id="but_upload">
                    <br><br>
                    <label>Description</label>
                    <input type="text" name="description" id="description" form="update_form">
                    <br>
                    <label>Quotes/Header</label>
                    <input type="text" name="quote" id="quote" form="update_form">
                    <br><br>
                    <input type="button" class="btn btn-primary" name="update" id="update" value="Update" form="update_form">
            
                </div>
                <div class="modal-footer">
                    <p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
                    <p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
                </div>
            </div>
        </div>
    </div>

    <!--Get all sections on click-->
    <script type="text/javascript">
        function allItems()
        {
            $.ajax({
                type:"POST",
                url:"fetchsec.php",
                success: function(value){
                    $(".content").html(value);
                }
            });
        }
    </script>

    <!--Getting section id on button click-->
    <script type="text/javascript">
        var ID=0;
        function getBtnValue(valBtn)
        {
            ID=valBtn.value;
        }
    </script> 

    <!--Form submission Ajax Update-->
    <script type="text/javascript">  
        $(document).ready(function(){ 
        $('#update').click(function(){
            var id=ID;
            var description = $('#description').val();  
            var quote = $('#quote').val();  
            $('#error_message').html(''); 
            $.ajax({  
                    url:"updatesec.php", 
                    method:"POST",  
                    data:{id:id, description:description, quote:quote},
                    success: function(value){  
                        $('#success_message').fadeIn().html(value); 
                        }		
                    });
                });
                });
    </script> 

    <!--Upload image to folder AJAX-->
    <script type="text/javascript">
        $(document).ready(function(){
        $("#but_upload").click(function(){
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
            $.ajax({
                url: 'uploadimg.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        $("#img").attr("src",response); 
                        $(".preview img").show();
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
            });
        });
    </script>   
</body>
</html>