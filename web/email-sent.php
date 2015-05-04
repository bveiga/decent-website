<!doctype html>
<html class="no-js" lang="en-us">
<head>
	<!-- META DATA -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->
	
	<!-- SEO -->
	<title>Bruno Veiga | Contact Me</title>

	<!-- STYLESHEETS -->
	<link rel="stylesheet" media="screen, projection" href="/assets/styles/screen.css" />
	<link rel="stylesheet" media="screen, projection" href="/assets/styles/adaptive.css" />
</head>
<body>
	<!-- Header -->
	<div class="header-wrap">
		<div class="header">
			<div class="logo-holder">
                <a href="/">
                    <img src="/assets/media/images/logo.png">
                </a>
            </div>
            <div class="menu-holder">
                <ul class="menu">
                    <li>
                        <a href="/about/">About</a>    
                    </li>
                    <li>
                        <a href="/portfolio/">Portfolio</a>
                    </li>
                    <li>
                        <a href="/contact/">Contact</a>
                    </li>
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

	<!-- Jquery -->
    <script type="text/javascript" src="/assets/vendor/jquery/dist/jquery.js"></script>

    <!-- Angular JS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="/assets/scripts/main.js"></script>
    
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-47234474-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
<?php
}
die();
?>