<?php session_start();

    if(isset($_SESSION['ArticleMsgError'])){

        echo '<script>
        $(document).ready(function(){
            $("#closeBtn").click(function(){
                $("#dismissMeWhenClicked").hide("slow","swing");
            })
        });
        </script>
            
        <div id="dismissMeWhenClicked" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Article not Available! </strong> Please choose an article.
            <button type="button" id="closeBtn" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> ';

        unset($_SESSION['ArticleMsgError']);
    }
?>