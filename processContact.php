<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	require 'mailer/PHPMailer.php';
	require_once 'mailer/SMTP.php';
	require_once 'mailer/POP3.php';
	require_once 'mailer/OAuth.php';
	require_once 'mailer/Exception.php';
	require('functions.php');
	

	$data = $_POST;
	$adminEmail = 'miriam@kreativeketokitchen.co.nz';
	$customerEmail = $data['email'];
	$name = $data['name'];
	$message = $data['message'];
	
	$subject = $data['subject'];

	$msg .= '<p>Thank you for getting in touch!</p>' . "\r\n";

	$msg .= '<p>I will get back to you as soon as possible.</p>' . "\r\n";

	$msg .= '<p>Your message: '.$message.'</p>' . "\r\n";

	$msg .= '<p>Kind regards, Miriam.</p>' . "\r\n";

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Set who the message is to be sent from
	$mail->setFrom($adminEmail, 'Kreative Keto Kitchen');
	//Set an alternative reply-to address
	$mail->addReplyTo($adminEmail, 'Kreative Keto Kitchen');
	//Set who the message is to be sent to
	$mail->addAddress($customerEmail, $name);
	$mail->addAddress($adminEmail, 'Kreative Keto Kitchen');
	//Set the subject line
	$mail->Subject = 'Enquiry from ' . $name;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML($msg);

	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}

	header('Location:index.php');
	
 ?>

	
 ?>