<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$username = 'alexsomer';
$password = 'geheimpje';
echo 'Username: '.$username.'<br />';
echo 'Password: '.$password.'<br />';

$shaPassword = sha1( $password );
echo 'SHA-password: '.$shaPassword.'<br />';



include 'shielded/login.php';
$passwordArray = createPasswordSalt( $shaPassword );
$DBpassword = $passwordArray['password']; // this is the actual password value suited for the database
$DBsalt = $passwordArray['salt']; // this is the actual salt value suited for the databased

echo 'DB-password: '.$DBpassword.'<br />';
echo 'Salt: '.$DBsalt.'<br />';


?>

</body>
</html>