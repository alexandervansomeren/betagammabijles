<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fill Course Code</title>
</head>

<?php

	include 'shielded/connector.php';
	$db = new ConnectorClass;
	
	for( $i=1; $i<27; $i++)
	{
		for( $j=1; $j<11; $j++)
		{
			$k=100*$i+$j;
			$db -> Query = 
			"
				INSERT INTO webdb13BG2.course_code (course_code, course_id, course_difficulty)
				VALUES (".$k.",".$i.".".$j.")
			;";
			$db->Querying();
			$db->Query=null;
		}
	}
	
	$db->Disconnect();

?>

<body>
</body>
</html>