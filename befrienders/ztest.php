<?php
$not_necessary = array("the","I","a","of","and","to","in","is","you","that","it","he","was","for","on","are","as","with","his","they","I","am");
$words = array("Hello", "I", "am", "sad");

$not_necessary=array_map('strtolower', $not_necessary);
$words=array_map('strtolower', $words);


$result = array_diff($words, $not_necessary);


print_r($result);
echo "<br/>";
print_r($not_necessary);


?>






	
