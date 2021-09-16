<?php
$not_necessary = array('Im','.',',','(',')',"the","I","a","of","and","to","in","is","you","that","it","he",
"was","for","on","are","as","with","his","they","I","am","at","be","this","have","from","or","had",'!'); //Can add more


    require_once("connection.php");
    $userTxt = mysqli_real_escape_string($connection,$_GET['t']);

    if(isset($_GET['flag'])){
        $flag = mysqli_real_escape_string($connection,$_GET['flag']); // flag = 1 used for user interaction. flag = 0 used for admin checks and queries
    }else{
        $flag=1;
    }
    
    $user_array = explode(" ",$userTxt); //Removes all spaces 
    $user_array = array_diff($user_array, $not_necessary); //Remove unnecessary words (Filtering)

    $sql = "SELECT * FROM chatbot WHERE false ";
    foreach($user_array as $extract){
        if(!($extract=="")){ // Ensuring that no (LIKE "%%") occurs [ if happens, it will take any records from database ]
            $sql .= " OR trigs LIKE '%$extract%' ";
        }
        
    }
    $sql.=" ORDER by trigs  LIMIT 1; "; //Computing for the one with highest match
    
    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
           echo $row['reply'];
            //echo " ".$sql; //For debugging
             
        }

    }else{
        
        echo "I'm still learning how to communicate. Perhaps you can join my colleagues on <a href='tel:+230 54837233'>Whatsapp(+230 54837233)</a>  ";

        
        

        

        
        if(!( $userTxt=="" || $userTxt==" " )){ 
            
            //          Im a stupid person
                if($flag==1){ 
                    $cummulative="";
                    foreach($user_array as $extract){
                        $search = "SELECT * FROM `missing_chatbot_pair` WHERE `Tags` LIKE '%$extract%'; "; //Looks for existing tags
                        $result = mysqli_query($connection,$search);

                        if(!(mysqli_num_rows($result)>0)){
                            //cummulate tag which does not exist
                            $cummulative = $cummulative . " $extract";
                        }

                    }                                

                    $insertUnknown = "INSERT INTO `missing_chatbot_pair`( `userEntry`, `Tags`) VALUES ('$userTxt','$cummulative');";
                    (mysqli_query($connection,$insertUnknown));
                        
                    
                }
                
            
        }
        
         

    }

?>