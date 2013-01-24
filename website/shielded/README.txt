include 'shielded/connector.php';

$connectionObject = new ConnectorClass;
	
$connectionObject -> Query = "SELECT * FROM webdb13BG2.course_difficulty";
	
$queryResultsArray = $connectionObject -> Querying();
	
$connectionObject -> Disconnect();
	
//print_r($queryResultsArray);