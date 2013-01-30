<?php
	function lifeQuery( $username )
	{
    // Connect to the database
    include 'shielded/connector.php';
    $db = new ConnectorClass;
    $usern = mysql_real_escape_string( $username );
    $GLOBALS['db'] -> Query =   
    "
    SELECT user_name FROM webdb13BG2.user_data WHERE username='".$usern."';
    ";
    $userSame = $GLOBALS['db'] -> Querying();
    if( isset($userSame[1][0] )
    {
       return( true );
    }
    $GLOBALS['db'] -> Disconnect(); 
    }
?>
