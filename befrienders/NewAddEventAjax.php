<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css//EventArticleAjax.css">
</head>

<body>


    <!-- Start Modal for Events -->
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#AddEvent"> Add  Event </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#ModifEvent"> Modify  Event </button>
    <button class="btn btn-info" value="" data-toggle="modal" data-target="#DelEvent"> Delete  Event </button>





    <!-- Modal Start -->
    <div id="AddEvent" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Create an Event </h4>
                </div>
                <div class="modal-body">
                    <!--Content -->
                    <form name="AddEvent" action="processAddEvent.php" method="POST" onsubmit="return validateCreateEve();" enctype="multipart/form-data">

                        Event Name: <br/><input type="text" name="EventName" placeholder="Enter Event Name: "/> <br/><br/>
                        Event Description: <br/> <textarea name="EventDatas" id="EventDescript"  rows="20" cols="75" > </textarea> <br/><br/>
                        Event Location:  <br/><input type="text" name="EventLocation" placeholder="Enter Event Location: "/> <br/><br/>
                        Event Type:  <br><br>
                        <input type="radio" id="Talk" name="TypeEvent" value="Talk"/>
                        <label for="Talk"> Talks </label><br>
                        <input type="radio" id="Formation" name="TypeEvent" value="Formation"/>
                        <label for="Formation"> Formation</label><br>
                        <input type="radio" id="RefresherCourse" name="TypeEvent" value="Refresher Course"/>
                        <label for="Refresher Course"> Refresher Course </label><br>
                        <input type="radio" id="Awareness" name="TypeEvent" value="Awareness"/>
                        <label for="Awareness"> Awareness </label><br>
                        <input type="radio" id="Others" name="TypeEvent" value="Others"/>
                        <label for="Others"> Others </label><br><br>

                        Event Date: <br/><input type="date" name="EventDate" /> <br/><br/>
                        Event Time:<br/> <input type="time" name="EventTime" /> <br/><br/>
                        Image : <br/><input type="file" name="file" /> <br/><br/>
                        <input type="submit" name="addEvent" value="Add Event"/>

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

    <!-- Modal Start -->
    <div id="DelEvent" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Delete an Event </h4>
                </div>
                <div class="modal-body ">
                    
                <?php
                    $sqlEve = "select * from events";
                    $resEve=  mysqli_query($conn,$sqlEve);
                    if(mysqli_num_rows($resEve)>0){
                        echo '
                        <table border="1">
                        <tr>
                            <th style="padding:10px;"> Event ID </th>
                            <th style="padding:10px;"> Event Name </th>
                            <th style="padding:10px;"> Event Type </th>
                            <th style="padding:10px;"> Action </th>
                        </tr>';
                        while($row=mysqli_fetch_assoc($resEve)){
                            echo "<tr>
                            
                            <td> ".$row['EventID']." </td>
                            <td> ".$row['EventName']." </td>
                            <td> ".$row['EventType']." </td>
                            <td> <button class='btn btn-danger' id='DelEvent".$row['EventID']."' >Delete </button> </td>

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

                                                  alert('Event has been deleted!');

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
    <div id="ModifEvent" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Modify an Event </h4>
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