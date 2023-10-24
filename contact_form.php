<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "";
	$email = "";
	$phone = "";
	$message = "";

	if(isset($_POST["name"])) {
		$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	}
		
	if(isset($_POST["email"])) {
		$email = str_replace(array("\r", "\n", "%0a" "%0d"), '', $_POST['email']);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
	if(isset($_POST["phone"])) {
		$phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
	}
	
	if(isset($_POST["message"])) {
		$message = htmlspecialchars($_POST["message"]);
	}
	
    if(mail($name, $email, $phone, $message)) {
    	echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
    	echo '<p>We are sorry but the email did not go through.</p>';
    }
    
} else {
    echo '<p>Something went wrong</p>';
}
?>