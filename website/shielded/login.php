<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
</head>
<body>
<?php

// // use this for password generation:
// include 'shielded/login.php';
// $passwordsha=sha1($password);  // $password is the password that the user chose
// $passwordArray = createPasswordSalt($passwordsha);
// $DBpassword = $passwordArray['password']; // this is the actual password value suited for the database
// $DBsalt = $passwordArray['salt']; // this is the actual salt value suited for the database

/*
$username = 'alexsomer';
$password = 'w8woord';
$shaPassword = sha1( $password );
$pwSaltarray = createPasswordSalt( $shaPassword );
$DBpassword = $passwordArray['password']; // this is the actual password value suited for the database
$DBsalt = $passwordArray['salt']; // this is the actual salt value suited for the database

include 'connector.php';
$db = new ConnectorClass;

$db -> Query = 
	"
		INSERT INTO webdb13BG2.user_data
		(username, password, salt)
		VALUES ('".$username."','".$DBpassword."' ,'".$DBsalt."' );
	";
echo $db -> Query;
echo '<br />';	
$db -> Querying();	
$db -> Disconnect();
echo '<br />';
echo login( $username, $shaPassword );
*/


function createPasswordSalt( $shaPassword )
{
	echo 'creating password';
	$salt = md5( uniqid(rand(), true) );
	$salted = sha1( $salt );
	$pwForDatabase = sha1( $salted.$shaPassword.$salt );
	echo 'Salt: '.$salt.'<br />';
	echo 'pwForDatabase: '.$pwForDatabase.'<br />';
	$PwSaltArray = array(
		'passsword'  => $pwForDatabase,
		'salt' => $salt 
		);
	echo '<pre>'.$PwSaltArray.'</pre>';
	return( $PwSaltArray );
	
}

function login( $username, $shaPassword )
{
	include 'connector.php';
	$db = new ConnectorClass;
	$db -> Query = 
		"
			SELECT 
			password, salt
			FROM webdb13BG2.user_data
			WHERE webdb13BG2.user_data.=".$username.";
		";
	$queryResultArray = $db -> Querying();
	$db -> Disconnect();
	$pw = $queryResultArray['password'];
	$salt = $queryResultArray['salt'];
	$salted = sha1( $salt );
	$tryPW = sha1( $salted.$shaPassword.$salt );
	if ( $pw== $tryPW )
	{
		return ( true );
	}
	else return ( false );
}
?>
</body>
</html>