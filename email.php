
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'include/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "iam.ocs.project@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "@123@abc@";

//Set who the message is to be sent from
$mail->setFrom('iam.ocs.project@example.com', 'IAM OCS PROJECT');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$emailto = $_POST['email'];
$mail->addAddress('iam.ocs.project@gmail.com');

//Set the subject line
$mail->Subject = 'IAM OCS PROJECT RAPPORT D\'ANOMALIE';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$priority= $_POST['priority'];
$description= $_POST['description'];
$issue_type= $_POST['issue_type'];
$summary= $_POST['summary'];
$recommandation= $_POST['recommandation'];
$type=$_POST['type'];
$ms_type=$_POST['ms_type'];
$node= $_POST['node'];
$entered_by= $_POST['entered_by'];
$onsite= $_POST['onsite'];
$palliative= $_POST['palliative'];

$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

		<html>
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		</head>
		<body>
		<table style="width:500px">
		<tr>
  				<td>Entered by</td>
  				<td>'.$entered_by.'</td> 
			</tr>
			<tr>
  				<td>Priority</td>
  				<td>'.$priority.'</td>
			</tr>
			<tr>
  				<td>Description</td>
  				<td>'.$description.'</td> 
			</tr>
			<tr>
  				<td>Issue type</td>
  				<td>'.$issue_type.'</td> 
			</tr>
			<tr>
  				<td>summary</td>
  				<td>'.$summary.'</td> 
			</tr>
			<tr>
  				<td>recommandation</td>
  				<td>'.$recommandation.'</td> 
			</tr>
			<tr>
  				<td>type</td>
  				<td>'.$type.'</td> 
			</tr>
			<tr>
  				<td>node</td>
  				<td>'.$node.'</td> 
			</tr>
			<tr>
  				<td>Onsite</td>
  				<td>'.$onsite.'</td> 
			</tr>
			<tr>
  				<td>palliative date</td>
  				<td>'.$palliative.'</td> 
			</tr>
			</table>';
//Replace the plain text body with one created manually
//$mail->Body = $html;
$mail->msgHTML($html, dirname(__FILE__));
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
