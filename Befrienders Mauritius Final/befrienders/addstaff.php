<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Adding New Staff In Befrienders</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- This is conflicting with current css of newadmin -->
 
  <!-- Ensures that radio appear -->
   <style> 
      input[type="radio"]{
        -webkit-appearance: radio;
      }
    </style>
</head>

<body>


<!-- Modal -->
<div class="modal fade" id="staffaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <?php  
      
        echo '<h5 class="modal-title" id="exampleModalLabel">Add Staff Details</h5>';
      
      ?>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="testx"></div>
      <form action="insert.php" method="POST" name="insertForm" >
      <div class="modal-body">
                <div class="form-group">
                	<label> First Name </label>
                	<input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
               </div>

                <div class="form-group">
                	<label> Last Name </label>
                	<input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
               </div>

               <div class="form-group">
                	<label> Username(Unique) </label> <br/> <label style="padding-left:8%;color:Red;" id="chkPwd"> </label>
                	<input type="text" id="IDusername" name="uname" class="form-control" onkeyup="checkuname()" placeholder="Enter Username" required>
               </div>

               <div class="form-group">
                	<label> Address </label>
                	<input type="text" name="address" class="form-control" placeholder="Enter Address" required >
               </div>

               <div class="form-group">
                	<label> Email </label> <br/> <label style="padding-left:8%;color:Red;" id="chkEmail"> </label>
                	<input type="email" id="userEmailAdr" name="email" class="form-control" placeholder="Enter Email" onkeyup="checkemail()" required >
               </div>

               <div class="form-group">
                	<label> Contact Number </label>
                	<input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" required >
               </div>

               <div class="form-group">
                	<label> Password </label>
                	<input type="password" name="pwd" class="form-control" placeholder="Enter Initial Password" required >
               </div>

      	       <div class="form-group" >
                	<label> Access Post </label> <br/>
                	<!-- <input type="text" name="position" class="form-control" placeholder="Enter Access Position" required > -->
                  <input type="radio" id="3" name="position" value="Pos3">
                  <label for="3">Check Admin (REDUCED ACCESS)</label> <br/>

                  <input type="radio" id="2" name="position" value="Pos2">
                  <label for="2">Middle Admin Level (LIMITED ACCESS)</label> <br/>
 
                  <input type="radio" id="1" name="position" value="Pos1">
                  <label for="1">SuperUser (ALL ACCESS)</label> <br/>
               </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="AddStaffBtnFrm" name="insertdata" class="btn btn-primary" disabled>Save Record</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!--############################################################-->

<!-- Edit pop-up form -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Staff Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update.php" method="POST" id="Disp">
      <div class="modal-body">

      	<input type="hidden" name="update_id" id="update_id">


                <div class="form-group">
                	<label> First Name </label>
                	<input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" required >
               </div>

                <div class="form-group">
                	<label> Last Name </label>
                	<input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" required >
               </div>

               <div class="form-group">
                	<label> Address </label>
                	<input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"  required >
               </div>

               <!-- <div class="form-group">
                	<label> Email </label>
                	<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required >
               </div> -->


               <div class="form-group">
                	<label> Email(<i> Unchanged if blank </i>) </label> <br/> 
                	<input type="email"  name="email" class="form-control" placeholder="Enter Email" >
               </div>
               
               <div class="form-group">
                	<label> Contact Number </label>
                	<input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact Number" required >
               </div>

               <div class="form-group">
                	<label> Job title </label>
                	<input type="text" name="jobpos" id="jobpos" class="form-control" placeholder="Enter Post" required >
               </div>

               <div class="form-group" >
                	<label> Access Post (<i> will be set as Check Admin if blank </i>) </label> <br/>
                	<!-- <input type="text" name="position" class="form-control" placeholder="Enter Access Position" required > -->
                  <input type="radio" id="3" name="position" value="Pos3">
                  <label for="3">Check Admin (REDUCED ACCESS) | VIEW ONLY </label> <br/>

                  <input type="radio" id="2" name="position" value="Pos2">
                  <label for="2">Middle Admin (LIMITED ACCESS) | DELETE ONLY </label> <br/>
 
                  <input type="radio" id="1" name="position" value="Pos1">
                  <label for="1">Super User (Whole Lvl ACCESS) | VIEW DELETE EDIT </label> <br/>
               </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update Record</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!--###############################################################-->


<!--############################################################-->

<!-- delete pop-up form -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="POST">
      <div class="modal-body">

      	<input type="hidden" name="delete_id" id="delete_id">
        
                
        <h4> Do you want to delete this record? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="deletedata" class="btn btn-primary">Yes Delete It</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!--###############################################################-->




	<div class="container">
		<div class="jumbotron">
			<div class="card">
				<h2>Staff</h2>
			</div>
			<div class="card">
				<div class="card-body">
        <?php 
        if(!($_SESSION['Position']=="Pos3")){
          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staffaddmodal">Add Staff
          </button>';
        }
        ?>
					</div>
			</div>

             <div class="card">
             	<div class="card-body">
             		
                    <?php

                          $query = "SELECT * FROM staff";
                          $query_run = mysqli_query($connection,$query);
                       ?>

                       <table class="table table-bordered table-dark">
                       	<thead>
                       		<tr>
                       			<th scope="col">ID</th>
                       			<th scope="col">First Name</th>
                       			<th scope="col">Last Name</th>
                       			<th scope="col">Address</th>
                       			<th scope="col">Email</th>
                       			<th scope="col" style="display:none;">Number</th>
                       			<th scope="col" >Post</th>
                       			<th scope="col">Edit</th>
                       			<th scope="col">Delete</th>
                       		</tr>
                       	</thead>
                      <?php
                            if($query_run)
                            {
                            	foreach($query_run as $row)
                                  {

                       ?>

                       <tbody>
                       	<tr>
                       		<td><?php echo $row['id'] ?></td>
                       		<td><?php echo $row['first_name'] ?></td>
                       		<td><?php echo $row['last_name'] ?></td>
                       		<td><?php echo $row['address'] ?></td>
                       		<td><?php echo $row['email'] ?></td>
                       		<td style='display:none;'><?php echo "<span > ".$row['contact_number']."</span>"; ?></td>
                            <td><?php echo $row['JobPosition'] ?></td>


                            <?php 
                           if($_SESSION['Position']=="Pos1"){
                            echo '<td>
                            <button type="button" class="btn btn-success editbtn">Edit</button>
                          </td>
                         
                            <td>
                              <button type="button" class="btn btn-danger deletebtn">Delete</button>
                            </td>';

                           }
                           else if($_SESSION['Position']=="Pos2"){
                            echo '<td>
                            <button type="button" class="btn btn-success editbtn">Edit</button>
                          </td>
                         
                            <td>
                            Not Available
                            </td>';

                          } 
                          else if($_SESSION['Position']=="Pos3"){
                            echo "<td> Not Available </td> <td> Not Available </td>";

                          } 
                           ?>

                       		<!-- <td>
                       			<button type="button" class="btn btn-success editbtn">Edit</button>
                       		</td>
                          
                             <td>
                             	<button type="button" class="btn btn-danger deletebtn">Delete</button>
                             </td> -->

                       	</tr>
                       </tbody>

                       <?php
                                 }
                            }
                            else{
                            	echo "No Record Found";
                            }

                        ?>

                       </table>
             	</div>
             </div>

		</div>
	</div>

	<!-- <div class="container">
		<a href="admin.php"><button type="button" class="btn btn-primary">Back To Admin Panel</button></a>
	</div> -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){


         $('.deletebtn').on('click',function(){
             $('#deletemodal').modal('show');

             $tr = $(this).closest('tr');

             var data = $tr.children("td").map(function(){
             	return $(this).text();
             }).get();

             console.log(data);

             $('#delete_id').val(data[0]);

         });

	});
</script>


<script>


  function checkuname(){
    $.ajax({
      type:"POST",
      url:"chkusernameOccurence.php",
      data: { name:document.getElementById('IDusername').value },
      success: function(value){
        $('#chkPwd').html(value);
      }
    })
  }

  function checkemail(){
    $.ajax({
      type:"POST",
      url:"chkmailOccurence.php",
      data: { email:document.getElementById('userEmailAdr').value },
      success: function(value){
        $('#chkEmail').html(value);
      }
    })
  }

  
	$(document).ready(function(){


    

    
    


         $('.editbtn').on('click',function(){
             $('#editmodal').modal('show');

             $tr = $(this).closest('tr');

             var data = $tr.children("td").map(function(){
             	return $(this).text();
             }).get();

             console.log(data);

             $('#update_id').val(data[0]);
             $('#fname').val(data[1]);
             $('#lname').val(data[2]);
             $('#address').val(data[3]);
             $('#email').val(data[4]);
             $('#contact').val(data[5]);
             $('#jobpos').val(data[6]);
         });

	});
</script>

</body>
</html>