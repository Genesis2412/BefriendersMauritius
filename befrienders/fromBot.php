<?php
$not_necessary = array('Im','.',',','(',')',"the","I","a","of","and","to","in","is","you","that","it","he","was","for","on","are","as","with","his","they","I","am","at","be","this","have","from","or","had",'!'); //Can add more


    require_once("connection.php");
    $userTxt = mysqli_real_escape_string($connection,$_GET['t']);
    $user_array = explode(" ",$userTxt);
    //$user_array = array_diff($user_array, $not_necessary);

    $sql = "SELECT * FROM chatbot WHERE false ";
    foreach($user_array as $extract){
        $sql .= " OR trigs LIKE '%$extract%' ";
    }
    $sql.=" ORDER by trigs  LIMIT 1; "; //Computing for the one with highest match
    
    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
           echo $row['reply'];
             
        }

    }else{
        echo "I'm still learning how to communicate. Perhaps you can join my colleagues on <a href='tel:+230 54837233'>Whatsapp(+230 54837233)</a>  ";
        
    }

?>