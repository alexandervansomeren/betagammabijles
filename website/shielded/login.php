<?php
// Function that creates the encrypted password and the salt for the database 
function createPasswordSalt( $shaPassword )
{
	$salt = md5( uniqid(rand(), true) );
	$salted = sha1( $salt );
	$pwForDatabase = sha1( $salted.$shaPassword.$salt ); // this is where the actual excrypted password is generated
	$PwSaltArray = array();
	$PwSaltArray[0] = $pwForDatabase;
	$PwSaltArray[1] = $salt;
	return( $PwSaltArray );
}

// This function checks a username-password combination with the database
// it uses a SHA-1 encrypted password as parameter for extra security
function login( $username, $shaPassword )
{
	$dbLOGIN = new ConnectorClass;
	$dbLOGIN -> Query = 
		"
			SELECT 
			password, salt, user_type, user_id
			FROM webdb13BG2.user_data
			WHERE webdb13BG2.user_data.username='".$username."';
		";
	$queryResultArray = $dbLOGIN -> Querying();
	$dbLOGIN -> Disconnect();
        unset($dbLOGIN); 
	if ( isset($queryResultArray[1][0]) && isset($queryResultArray[1][1]) && isset($queryResultArray[1][2]) )
	{
		$pw = $queryResultArray[1][0];
		$salt = $queryResultArray[1][1];
		$user_type = $queryResultArray[1][2];
		// $user_id = $queryResultArray[1][3];  // Should be used when a session wants to remember the use_id as well
		$salted = sha1( $salt );
		$tryPW = sha1( $salted.$shaPassword.$salt );
		if ( $pw == $tryPW )
		{
			//$setLastLogin = new ConnectorClass;
			//$setLastLogin -> Query = 
			//"UPDATE webdb13BG2.user_personal_data SET last_login = '1234' WHERE user_id = '3'";       
			//echo $setLastLogin -> Query;
			//$resultOfQ = $setLastLogin -> Querying();
			
			//print_r($resultOfQ);
			$user_typeINT = intval( $user_type );
			return ( $user_typeINT );
      	}
	}
	else 
	{	
		return ( 'no user' );
	}
}
?>