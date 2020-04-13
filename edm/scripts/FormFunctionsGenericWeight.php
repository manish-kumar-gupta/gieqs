<?php 
       
       //use the passed database values list as text generated from the general class, general must be declared in the parent script
       
       /**
        *must have 
        *$tableNameValues 
		*$tableNameSheet 
        *set in parent script
        */




        function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues, $weight) {
	        
			if ($message){
            echo "
            <tr>
            <td style=\"width:60%;\" title='$message'>
                 <div class='tooltip'>".$stext." : </div></td>
            <td style=\"width:30%;\"><SELECT name = '".$sname."' id='".$sname."' class='formInputs' >";
            
			}else{
                echo "<tr>
                <td style=\"width:60%;\">".$stext." : </td>
                <td style=\"width:30%;\"><SELECT name = '".$sname."' id='".$sname."' class='formInputs'>";
			}
			
            echo "<option disabled hidden selected value></option>";
            
            echo $general->writeSelectWeight($svalue1, $svalue2, $tableNameValues, $weight);

            echo "</select>"; 
            echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
            echo "</td>
            
            
            </tr>";
            //mysqli_free_result($res);
        
        }
       
        function errorMessage($errorTag) {
            echo "<td id=".$errorTag." class=\"errorTag\" style=\"max-width:30%;\"></td>\n</tr>\n";
        }
       
      
       
       function generateText($stext, $sname, $stype, $post, $message) {
           if ($message){
		   echo "<tr><td id='".$sname."Error' style=\"width:60%;\" title='$message'><div class='tooltip'>".$stext." : </div>s</td><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";
		   }else{
			echo "<tr><td id='".$sname."Error' style=\"width:60%;\">".$stext." : </td><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";   
			   
           }
            if (isset($post)) echo $post;
            echo "'></td></tr>\n";   
       }
        function generateHidden($stext, $sname, $stype, $post) {
           echo "<tr><td id=".$sname."Tag\" style=\"max-width:30%;\"></td><td><input type=".$stype." name=".$sname." id=".$sname." value=";
            if (isset($post)) echo $post;
            echo "></td>\n";   
       }

        function generateTextArea($stext, $sname, $post, $message) {
            if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><label><div class='tooltip'>".$stext;
            echo " : </div></td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";
			}else{
			echo "<tr><td style=\"max-width:30%;\"><label>".$stext;
            echo " : </td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";	
				
			}
            if (isset($post)) echo $post;
            echo "/> </textarea></label></td></tr>\n";
            
        }

        function generateChecked ($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues, $weight){


            if ($message){
                echo "
                <tr>
                <td style=\"width:60%;\" title='$message'>
                     <div class='tooltip'>".$stext." : </div></td>";
                
                
                }else{
                    echo "<tr> <td style=\"width:60%;\">".$stext." : </td>";
                    
                }
                
                echo "
                <td style=\"width:30%;\">";
                
                echo $general->writeCheckedWeight($sname, $svalue1, $svalue2, $tableNameValues, $weight);
    
               
                echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
                echo "</td>
                
                
                </tr>";
        }
       
       ?>