<?php
$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
	if(isset($_POST['submit'])){
		
	$to = "ravi@objectways.com";
	$subject = "Contact Form Mail";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	
	$main = 'Hello, <br/> You have received mail from objectways.com. <br/><br/> <strong> Full Name: </strong>' .$fname.' '.$lname.'<br/> <strong> Email: </strong>' .$email.'<br/><strong>Phone Number: </strong>'.$phone.'<br/><strong>Message: </strong>'.$message.'<br/><br/> Thank you.';

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <info@splendourgroup.org>' . "\r\n";

	mail($to, $subject, $main, $headers);
}
?>