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
		$_SESSION['user_name']= $username;
		echo "inloggen gelukt :D";
		header( 'Location:  advertenties.php?course=&city=&level=&male=on&female=on' );
	}
	else
	{
		echo "Inloggen mislukt";
		session_start();
		session_destroy();
		header( 'Location: advertenties.php?course=&city=&level=&male=on&female=on' );
	}
}
?>