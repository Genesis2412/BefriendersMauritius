<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css//EventArticleAjax.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



    <style>

        .hideMe {
            display:none;
        }
        </style>
    </head>
    <body>
    <!-- Start Modal for Events -->
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#AddEvent"> Add  Event </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#ModifEvent"> Modify  Event </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#DelEvent"> Delete  Event </button>





    <!-- Modal Start -->
    <div id="AddEvent" class="modal fade hideMe" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Create an Event </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                    
                </div>
                <div class="modal-body">
                    <!--Content -->
                    <form name="AddEvent" action="processAddEvent.php" method="POST" onsubmit="return validateCreateEve();" enctype="multipart/form-data">

                        Event Name: <br/><input type="text" name="EventName" placeholder="Enter Event Name: "/> <br/><br/>
                        Event Description: <br/> <textarea name="EventDatas" id="EventDescript"  rows="20" cols="50" > </textarea> <br/><br/>
                        Event Location:  <br/><input type="text" name="EventLocation" placeholder="Enter Event Location: "/> <br/><br/>
                        Event Type:  <br><br>

                        
                        <input list="listOfEvents" style="border:1px solid grey;padding:5px;border-radius:5px;" name="TypeEvent" size="20" placeholder="Enter Event Type">
                        <datalist id="listOfEvents">
                            <option value="Talk">
                            <option value="Formation">
                            <option value="Refresher Course">
                            <option value="Awareness">
                            <option value="Others">
                        </datalist>

                       
                        <!-- <input type="checkbox"  id="Talk" name="TypeEvent" value="Talk"/>
                        <label for="Talk"> Talks </label><br>
                        <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                        <label for="Formation"> Formation</label><br>
                        <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                        <label for="Refresher Course"> Refresher Course </label><br>
                        <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                        <label for="Awareness"> Awareness </label><br>
                        <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                        <label for="Others"> Others </label> -->
                     

                        <br><br>

                        Event Date: <br/><input type="date" style="border:1px solid grey;padding:5px;border-radius:5px;" name="EventDate" /> <br/><br/>
                        Event Time:<br/> <input type="time" style="border:1px solid grey;padding:5px;border-radius:5px;" name="EventTime" /> <br/><br/>
                        Event Cover Image <i> (If blank, a default image will be used) </i>: <br/><input type="file" name="file" /> <br/><br/>
                        <input type="submit" class="btn btn-success" name="addEvent" value="Add Event"/>

                    </form>

                    
                </div>
                <script>
                    function validateCreateEve(){
                        if($("#EventDescript").val().trim().length < 1){
                                document.getElementById('error_messageEvent').innerHTML = "The Event content is not valid!";
                                document.getElementById('EventDescript').focus();
                                return false;

                        }

                        if(document.AddEvent.EventName.value.length==0){
                        document.getElementById('error_messageEvent').innerHTML = "The Event title is not valid!";
                        document.getElementById('EventDescript').focus();
                            return false;
                        }

                        if(document.AddEvent.EventDescript.value.length==0){
                        document.getElementById('error_messageEvent').innerHTML = "The Event Description is not valid!";
                            return false;
                        }

                        if(document.AddEvent.EventLocation.value.length==0){
                        document.getElementById('error_messageEvent').innerHTML = "The Event Location is not valid!";
                            return false;
                        }

                        if(document.AddEvent.EventDate.value==0){
                        document.getElementById('error_messageEvent').innerHTML = "The Event Date is not valid!";
                            return false;
                        }
                        if(document.AddEvent.EventTime.value==0){
                        document.getElementById('error_messageEvent').innerHTML = "The Event Time is not valid!";
                            return false;
                        }
                        
                        return true; /* No error */
                        }
                </script>

                <div class="modal-footer">
                    <p id="error_messageEvent" style="text-align: center; color: red; font-size: 18px;"></p>
                    <p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of modal-->
    <a href="allevents" target="_blank"> <button class="btn btn-success"  >  View  Events </button></a>
    <!-- Modal Start -->
    <div id="DelEvent" class="modal fade hideMe" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Delete an Event </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body ">
                    
                <?php
                    $sqlEve = "select * from events";
                    $resEve=  mysqli_query($conn,$sqlEve);
                    if(mysqli_num_rows($resEve)>0){
                        echo '
                        <table border="1" style="background-color:#454d55;color:white;">
                        <tr>
                            <th style="padding:10px;"> Event ID </th>
                            <th style="padding:10px;"> Event Name </th>
                            <th style="padding:10px;"> Event Type </th>
                            <th style="padding:10px;"> Action </th>
                        </tr>';
                        while($row=mysqli_fetch_assoc($resEve)){
                            echo "<tr>
                            
                            <td style='padding:10px;'> ".$row['EventID']." </td>
                            <td style='padding:10px;'> ".$row['EventName']." </td>
                            <td style='padding:10px;'> ".$row['EventType']." </td>
                            <td style='padding:10px;'> <button class='btn btn-danger' id='DelEvent".$row['EventID']."' >Delete </button> </td>

                            </tr>";


                            
// alert('Trying to delete Event ID: ".$row['EventID']." ' );
                            echo "<script>
                                    $(document).ready(function(){
                                        
                                        $('#DelEvent".$row['EventID']."').click(function(){

                                        var ID=".$row['EventID'].";
                                            $.ajax({
                                                type:'POST',
                                                url:'deleteEvent.php',
                                                data: {ID:ID},
                                                success: function(value){ 
                                                    //alert('Event has been deleted!');
                                                    window.location.replace('newAdmin.php');

                                                    

                                                }
                                            });
                                        });
                                    });
                                </script>";
                        }
                        echo '</table>';
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

    <!-- Modal Start -->
    <div id="ModifEvent" class="modal fade hideMe" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"> Modify an Event </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <!--Content -->
                    <input type="text" name="SearchEvent" id="SearchEvent" placeholder="Enter Event Title"/> 
                        <div id="searchEventDisp"> </div>
                </div>
                <script>
                    $(document).ready(function(){

                        $("#SearchEvent").keyup(function(){ // When User will start searching for Vehicle ID, the system will return look alikes
                        
                        var constraint=$("#SearchEvent").val();
                        if(constraint=="" || constraint==" "){
                            document.getElementById('searchEventDisp').style="display:none";
                        }
                        else{
                            $.post("SearchForEventTitle.php", {
                            keyTerm: constraint
                            }, function(data){
                            $("#searchEventDisp").html(data);
                            $("#searchEventDisp").fadeIn(1000);
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
    </body>
    </html>
