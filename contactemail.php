<?php
ob_start();
error_reporting(0);
session_start();


	$uname = $_POST["uname"];
	$email	= $_POST["email"];
	$cnumber = $_POST["cnumber"];
	$jumpMenu	= $_POST["jumpMenu"];
	$website	= $_POST["website"];
	$moreinfo = $_POST["moreinfo"];
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
			<td>Contact Number </td>
			<td>'. $cnumber .'</td>
		</tr>
		<tr>
			<td>Website Address </td>
			<td>'. $website .'</td>
		</tr>
		<tr>
			<td>What are the services you are interested in? </td>
			<td>'. $jumpMenu .'</td>
		</tr>
		<tr>
			<td>More Info.. </td>
			<td>'. $moreinfo .'</td>
		</tr>
		<tr>
			<td>Date </td>
			<td>'. $date .'</td>
		</tr>
	</table>';
	
	
		$msg = ob_get_clean();
		
		$fname = $uname;
	
	if (sendEmail("$fname", "$email", "info@signetringsolutions.com", "Contact Us Email", $message)) {
		//echo "Email sent";
		//exit;
		header("Location:thanks.html");
	} else {
		//echo "Email not sent";
		//exit;
		header("Location:thanks.html");
	}
?>
<?php
function sendEmail($name, $email, $to_mail, $subject, $msg, $attachment = "") {
    $sending = false;

    if (!empty($attachment['tmp_name']) && !empty($attachment['error'])) $attachment['tmp_name'] = "";

    if (!empty($name) && !empty($email) && !empty($to_mail) && !empty($subject) && !empty($msg)) {
        $from_name = $name;
        $from_mail = $email;
        $sending = true;
    }

    if ($sending) {
        $eol = "\n";

        $tosend['email'] = $to_mail;
        $tosend['subject'] = $subject;

        $tosend['message'] = "
		<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<html>
		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
		<title>\".$subject.\"</title>
		</head>
		<body> 
		".$msg."<br />
		</body>
		</html>
		".$eol.$eol;

        $tosend['headers'] = "From: \"".$from_name."\" <".$from_mail.">".$eol;
        $tosend['headers'] .= "Return-path: <".$from_mail.">".$eol;
        $tosend['headers'] .= "MIME-Version: 1.0".$eol;
        if (!empty($attachment['tmp_name'])) {
        }
		else
		{
				$tosend['headers'] .= "MIME-Version: 1.0\r\n";
				$tosend['headers'] .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$tosend['headers'] .= "From:$name<$email>\r\n";
				$tosend['headers'] .= "X-Sender:$name<$email>\n";
				$tosend['headers'] .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal
				$tosend['headers'] .= "Return-Path:$name<$email>\n";
		}

        if (mail($tosend['email'], $tosend['subject'], $tosend['message'] , $tosend['headers']))
            return true;
        else
            return false;
    }//-- if ($sending)
    return false;
}


?>

