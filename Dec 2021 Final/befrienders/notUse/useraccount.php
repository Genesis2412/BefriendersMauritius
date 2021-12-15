<?php session_start();

// if(!(isset($_SESSION['Username']))){

//   $_SESSION['LoginWarns'] = "Error: Please sign in to access admin panel! ";
//   header("Location: signin.php");
// }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> admin Interface </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="hbackend.css">
        
    

    <script>
      $(document).ready(function(){
        $('#DelBtn').click(function(){
          $('.changepassword').fadeIn('500');
          $('.content').hide();
        });

      });
    </script>

    </head>
    <div style='padding:15px;font-size: 15pt;'> 
    Befrienders Mauritius User Account System 
    <span style="color:black;padding-left: 60%;"> <a href="logout.php"> Log out </a> </span> </div>
<body>

  <div>

  </div>
<div class="intro">
  <div class="black"></div>  
  <div class="white"></div>
  <div class="boxfather">
    <div class="box">
      <h1>Welcome User <?php echo $_SESSION['uname']; ?> </h1>
      <p style="padding-top:65px;"> Our users will be able to post their testimonials about how they feel about the organization and will be able to update their password if ever they want to.</p>
      
      

    </div>
    
  </div>
  
</div>

<div class="namita">
  
  <p>  <button class="btn btn-success" onclick="addremark();return false;">ADD TESTIMONIAL</button>
       <button id="DelBtn" class="btn btn-success">UPDATE PASSWORD</button>
        <div class="content">
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!--Get form add new products on click-->

        <script type="text/javascript">
            function addremark()
            {
                $.ajax({
                    type:"POST",
                    url:"testiform.php",
                    success: function(value){
                        $(".content").html(value);
                    }
                });
                $('.changepassword').hide();
                $('.content').fadeIn('500');
            }
        </script> 
</div>



<div class="changepassword" style="display:none;">


        <form name="frmChange" method="post" action="changeUserpassword.php" onSubmit="return validatePassword()">
            <div style="width:500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
            <tr class="tableheader">
            <td colspan="2"><h3>Change Password</h3></td>
            </tr>
            <tr>
            <td width="40%"><label>Current Password</label></td>
            <td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
            </tr>
            <tr>
            <td><label>New Password</label></td>
            <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
            </tr>
            <td><label>Confirm Password</label></td>
            <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
            </tr>
            <tr>
            <td colspan="2"><input type="submit" name="ChangePwSubm" value="Submit" class="btnSubmit"></td>
            </tr>
            </table>
            </div>
        </form> 


</div>  



<div style="padding-top:50px;">
  </div>
       

    </body>


</html>