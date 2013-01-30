<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

if (isset( $_POST['username'] ) && isset( $_POST['password'] ) )
{
	$username = $_POST['username'] ;
	$shaPassword = sha1( $_POST['password'] );
	
	include 'shielded/login.php';
	$userType =  (login ($username, $shaPassword));
	if ( is_int( $userType ) )
	{
		session_start();
		$_SESSION['user_type']= $userType;
		echo "inloggen gelukt :D";
		header( 'Location: advertenties.php' );
	}
	else
	{
		echo "Inloggen mislukt";
		session_set_cookie_params(0);
		session_start();
		session_destroy();
		header( 'Location: advertenties.php' );
	}
}
?>
</body>
</html>