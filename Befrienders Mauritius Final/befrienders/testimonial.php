<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/hbackend.css">
        <title></title>
    </head>
    <body>

        <a href="#" onclick="addremark();return false;">ADD TESTIMONIAL</a>

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
            }
        </script>
    </body>
</html>