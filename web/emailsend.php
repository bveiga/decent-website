<?php include "../header.php";?>
<div class="page-wrap">
	<div class="row-full r1">
		<div class="row-padded">
<?php
if(isset($_POST['email'])) {
		 
	// Destination email and subject
	$email_to = "bspveiga@gmail.com";
	$email_subject = "Veiga Studios Submission";
	 
	function died($error) {
			// your error code can go here
			echo "<p style='color: white;'>Sorry, but there were error(s) found with the form you submitted. ";
			echo "These errors appear below.<br />";
			echo $error."<br />";
			echo "Please go back and fix these errors.<br /></p>";
			die();
	}
	 
	// validation expected data exists
	if(!isset($_POST['name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');       
	}
	 
	$name = $_POST['name']; // required
	$email_from = $_POST['email']; // required
	$comments = $_POST['comments']; // required
	 
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_exp,$email_from)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	}
		$string_exp = "/^[A-Za-z .'-]+$/";
	if(!preg_match($string_exp,$name)) {
		$error_message .= 'The Name you entered does not appear to be valid.<br />';
	}
	if(strlen($comments) < 2) {
		$error_message .= 'The Message you entered is too short.<br />';
	}
	if(strlen($error_message) > 0) {
		died($error_message);
	}

	$email_message = "Form details below.\n\n";
	 
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
	}
	 
	$email_message .= "Name: ".clean_string($first_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Comments: ".clean_string($comments)."\n";
	 
	 
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place success html below -->
			<h2>Thanks for contacting me. I will be in touch with you very soon.</h2>
		</div>
	</div>
</div>
<?php
}
die();
?>