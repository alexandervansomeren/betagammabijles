<?php
header('Content-Type: text');
include('shielded/connector.php');
$connectionObject = new ConnectorClass;

// Test query's here. Should become a set of predefined query's as part of the function Querying().
$connectionObject -> Query = "SELECT * FROM webdb13BG2.course_difficulty";
echo('Result of the Query ('.$connectionObject -> Query.') :');
echo('<pre>');
print_r( $connectionObject -> Querying() );
echo('</pre>');
// Disconnecting function directed:
$connectionObject -> Disconnect();
?>
