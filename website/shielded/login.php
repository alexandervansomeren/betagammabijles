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
	$salt = md5( uniqid(rand(), true) );
	$salted = sha1( $salt );
	$pwForDatabase = sha1( $salted.$shaPassword.$salt );
	$PwSaltArray = array();
	$PwSaltArray[0] = $pwForDatabase;
	$PwSaltArray[1] = $salt;
	return( $PwSaltArray );
}
function loginFromPost()
{
	$username = $_POST['username'] ;
	$shaPassword = sha1( $_POST['password'] );
	return (login ($username, $shaPassword));
}
function login( $username, $shaPassword )
{
	include 'connector.php';
	$dbLOGIN = new ConnectorClass;
	$dbLOGIN -> Query = 
		"
			SELECT 
			password, salt, user_type
			FROM webdb13BG2.user_data
			WHERE webdb13BG2.user_data.username='".$username."';
		";
	echo $dbLOGIN -> Query;
	$queryResultArray = $dbLOGIN -> Querying();
	echo '<pre>';
	print_r($queryResultArray);
	echo'</pre>';
	$dbLOGIN -> Disconnect();
	$pw = $queryResultArray[1]['password'];
	$salt = $queryResultArray[1]['salt'];
	$user_type = $queryResultArray[1]['user_type'];
	$salted = sha1( $salt );
	$tryPW = sha1( $salted.$shaPassword.$salt );
	if ( $pw == $tryPW )
	{
		echo $user_type;
		return ( $user_type );
	}
	else 
	{
		echo "no user";
		return ( 'no user' );
	}
}
?>
</body>
</html>