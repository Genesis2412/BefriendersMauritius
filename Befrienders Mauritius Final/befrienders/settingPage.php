<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    





</head>
<body >
<h3> Setting List </h3>
<div style='padding-top:15%;'>
<button id="validateClick" class="btn btn-danger"> Change Password </button> </div>
<div class="modal fade" id="changePassModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <!-- put form here -->
       <form name="changePwd" method="POST" action="processChangePwd.php"> 
      <div class="modal-body">
          <div class="form-group"> <input type="password" name="oldPwd" class="form-control" placeholder="Current Password" required/> </div>
          <div class="form-group"> <input type="password" name="newPwd"class="form-control" placeholder="New Password" required/> </div>
          <div class="form-group"> <input type="password" name="confPwd" class="form-control" placeholder="Confirm New Password" required/> </div>
       
      	
        
                
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="updatePwd" class="btn btn-danger">Change Password</button>
      </div>
  </form>
    </div>
  </div>
</div>



</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> 


<script>
	$(document).ready(function(){ 
        $('#validateClick').click(function(){
            $('#changePassModal').modal('show');
        });
        


    })
</script>
        
</html>