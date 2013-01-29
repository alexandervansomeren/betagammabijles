<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
</head>
<body>
<?php



// use this for password generation:
// include 'shielded/login.php';
// $passwordsha=sha1($password);  // $password is the password that the user chose
// passwordArray=createPasswordSalt($passwordsha);
// $DBpassword=passwordArray[0]; // this is the actual password value suited for the database
// $DBsalt=passwordArray[1]; // this is the actual salt value suited for the database


$pwForDatabase = sha1($salted.$SHApw.$salt);

function createPasswordSalt($shaPassword)
{
	$salt= md5(uniqid(rand(), true));
	$salted = sha1($salt);
}

function login($username, $shaPassword)
{
	include 'shielded/connector.php';
	$db = new ConnectorClass;
	$db -> Query = 
		"
			SELECT 
			password, salt
			FROM webdb13BG2.user_data
			WHERE webdb13BG2.user_data.=".$username.";
		";
}

?>
</body>
</html>