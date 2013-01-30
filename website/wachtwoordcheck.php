<?php
    // Connect to the database
    include 'shielded/connector.php';
    $db = new ConnectorClass;
    $usern = mysql_real_escape_string($_POST['username']);
    $GLOBALS['db'] -> Query =   
    "
    SELECT user_name FROM webdb13BG2.user_data WHERE username='".$usern."';
    ";
    $userSame = $GLOBALS['db'] -> Querying();
    if(!(empty($userSame)))
    {
       unCheck();
    }
    $GLOBALS['db'] -> Disconnect(); 
?>
