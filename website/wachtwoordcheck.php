<?php
    // Connect to the database
    include 'shielded/connector.php';
    $db = new ConnectorClass;
    /*$usern = mysql_real_escape_string( $username );*/
    $usern = $_GET['q'];
    $GLOBALS['db'] -> Query =   
    "
    SELECT username FROM webdb13BG2.user_data WHERE username='".$usern."';
    ";
    $userSame = $GLOBALS['db'] -> Querying();
    if( isset($userSame[1][0] ))
    {
       echo "Gebruikersnaam bestaat al.";
    }
    $GLOBALS['db'] -> Disconnect(); 
?>
