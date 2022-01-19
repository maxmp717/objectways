<?php
$toEmail = "info@objectways.com";
$mailHeaders = "From: " . $_POST["fname"] ." ". $_POST["lname"] . "<". $_POST["email"] .">\r\n";
$message = $_POST["message"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$youremail = $_POST["email"];
$yourphone = $_POST["phone"];
$yourmessage = $_POST["message"];
$t = new DateTime( '@'.time() );
$datetime = $t->format( 'r' );
		$message = "
			$subject
			=======================
			
			First Name: $firstname
			Last Name: $lastname
			Email: $youremail
			Phone Number: $yourphone
			
			Message: $yourmessage
			
			=======================	
			
			Sent on $datetime";




if(mail($toEmail, $_POST["subject"], $message, $mailHeaders)) {
print "<p class='success'>Thanks for reaching out. We received your message and we will get back to you ASAP</p>";
} else {
print "<p class='Error'>Problem in Sending Mail. Please Try again later.</p>";
}
?>