<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo 'check <br />';
echo $_POST['username'];
echo $_POST['password'];

if (isset( $_POST['username'] ) && isset( $_POST['password'] ) )
{
	echo 'hallo';
	$username = $_POST['username'] ;
	$shaPassword = sha1( $_POST['password'] );
	
	include 'shielded/login.php';
	$userType =  (login ($username, $shaPassword));
	if ( is_int( $userType ) )
	{
		session_start();
		$_SESSION['user_type']= $userType;
		header( 'advertenties.php' );
	}
	else
	{
		echo "Inloggen mislukt";
	}
}
?>
</body>
</html>