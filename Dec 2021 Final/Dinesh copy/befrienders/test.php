<?php

echo "HEYY!";
echo '
<br/>

<div class="form-group" style="padding-left:10px;">
                	<label> Access Post </label> <br/>
                	<!-- <input type="text" name="position" class="form-control" placeholder="Enter Access Position" required > -->
                  <input type="radio" id="3" name="position" value="Pos3">
                  <label for="3">Check Admin (REDUCED ACCESS)</label> <br/>

                  <input type="radio" id="2" name="position" value="Pos2">
                  <label for="2">Middle Admin Level (LIMITED ACCESS)</label> <br/>
 
                  <input type="radio" id="1" name="position" value="Pos1">
                  <label for="1">SuperUser (ALL ACCESS)</label> <br/>
               </div>

';
?>