<?php
ini_set("sendmail_from", "info@signetringsolutions.com");
	
	//begin of HTML message 
    $message = '<html> 
	  <body bgcolor="#DCEEFC"> 
		<center> 
			<b>Looool!!! I am reciving HTML email......</b> <br> 
			<font color="red">Thanks Mohammed!</font> <br> 
			<a href="http://www.google.com/">* Google.com</a> 
		</center> 
		  <br><br>*** Now you Can send HTML Email <br> Regards<br>Vivek
	  </body> 
	</html>'; 
   //end of message 
   
  // $headers  = "From: $from\r\n"; 
   $headers = "Content-type: text/html\r\n"; 
	
mail("info@signetringsolutions.com","Test Mail",$message,$headers);

?>