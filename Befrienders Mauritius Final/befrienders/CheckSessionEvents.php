<?php session_start();

    if(isset($_SESSION['EventMsgError'])){

        echo '<script>
        $(document).ready(function(){
            $("#closeBtn").click(function(){
                $("#dismissMeWhenClicked").hide("slow","swing");
            })
        });
        </script>
            
        <div id="dismissMeWhenClicked" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Event not Available! </strong> Please choose an Event.
            <button type="button" id="closeBtn" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> ';

        unset($_SESSION['EventMsgError']);
    }

    if(isset($_SESSION['EventWarn'])){

        echo '<script>
        $(document).ready(function(){
            $("#closeBtn").click(function(){
                $("#dismissMeWhenClicked").hide("slow","swing");
            })
        });
        </script>
            
        <div id="dismissMeWhenClicked" class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$_SESSION['EventWarn'].'
            <button type="button" id="closeBtn" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> ';

        unset($_SESSION['EventWarn']);
    }
    

    
?>