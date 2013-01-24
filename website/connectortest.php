<?php
header('Content-Type: text');
include('shielded/connector.php');
$connectionObject = new ConnectorClass;

// Test query's here. Should become a set of predefined query's as part of the function Querying().
$connectionObject -> Query = "SELECT * FROM webdb13BG2.course_difficulty";
$page = 'Result of the Query ('.$connectionObject -> Query.') :');
$page.='<pre>';
$page .= print_r( $connectionObject -> Querying(), TRUE )
$page.='</pre>'
// Disconnecting function directed:
$connectionObject -> Disconnect();
$length = strval( strlen ( $page ) );
$md5sum = md5( $page );
header('Content-Length: ' . $length );
header('Content-MD5: '. $md5sum );
echo($page);
?>
