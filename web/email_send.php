<!doctype html>
<html class="no-js" lang="en-us">
<head>
	<!-- META DATA -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->
	
	<!-- SEO -->
	<title>Bruno Veiga | Developer</title>

	<!-- STYLESHEETS -->
	<!-- build:css assets/styles/screen.css -->
	<!-- bower:css -->
	<!-- endbower -->
	<link rel="stylesheet" media="screen, projection" href="assets/styles/screen.css" />
	 <link rel="stylesheet" media="screen, projection" href="assets/styles/adaptive.css" />
	<!-- endbuild -->
</head>
<body>
	<!-- Header -->
	<div class="header-wrap">
		<div class="header">
			<div class="logo-holder">
                <a href="index.html">
                    <img src="assets/media/images/logo.png">
                </a>
            </div>
            <div class="menu-holder">
                <ul class="menu">
                    <a href="page-about.html">
                        <li>About</li>
                    </a>
                    <a href="page-portfolio.html">
                        <li>Portfolio</li>
                    </a>
                    <a href="page-contact.html">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>
		</div>
	</div>

	<!-- Content -->
	<div class="page-wrap contact">
		<div class="page">
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

	<!-- JAVASCRIPT -->
	<!-- build:js assets/scripts/main.js -->
	<!-- bower:js -->
	<script src="assets/vendor/nerdery-function-bind/index.js"></script>
	<script src="assets/vendor/jquery/dist/jquery.js"></script>
	<!-- endbower -->
	<script src="assets/scripts/shim.js"></script>

	<!-- Stuff goes here for app -->
	<script src="assets/scripts/views/TestView.js"></script>

	<script src="assets/scripts/App.js"></script>
	<script src="assets/scripts/main.js"></script>
	<!-- endbuild -->
</body>
</html>
<?php
}
die();
?>