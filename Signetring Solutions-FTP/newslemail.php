<?php
ob_start();
error_reporting(0);
session_start();
ini_set("sendmail_from", "info@signetringsolutions.com");

	$uname = $_POST["uname"];
	$email	= $_POST["email"];
	$date	= date("Y-m-d");
	
	if($email == "")
	{
		echo "Email Error";
		exit();
	}

	if($uname == "")
	{
		echo "Message Area Error";
		exit();
	}

	$message = '<table cellpadding="5" cellspacing="0" border="1" width="100%">
		<tr>
			<td width="50%">Name </td>
			<td width="50%">'. $uname .'
			</td>
		</tr>
		<tr>
			<td>Email </td>
			<td>'. $email .'</td>
		</tr>
		<tr>
			<td>Date </td>
			<td>'. $date .'</td>
		</tr>
	</table>';
	
	
   $headers = "Content-type: text/html\r\n"; 

	
	//$mailsent = mail("info@signetringsolutions.com", "Contact Us Email", $message)
	$mailsent = mail("info@signetringsolutions.com", "NewsLetter Signup", $message,$headers);
	
	if ($mailsent ) {
		//echo "Email sent";
		//exit;
		header("Location:thanks.html");
	} else {
		//echo "Email not sent";
		//exit;
		header("Location:thanks.html");
	}
?>
