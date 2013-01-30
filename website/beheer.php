<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ( isset($_SESSION['user_type']) )
if ( $_SESSION['user_type']==3 )
{
	echo '
		<h1> Welkom op de beheerderspagina. </h1>
		<h2> Maak een keuze: </h2>
		<h3> <a href="beheer.php$">Verwijder een gebruiker. </h3>
		<h3> Voeg een beheerder toe </3>
		<h3> Uitloggen </h3>
	';
}
?>

<h1> Welkom op de beheerderspagina. </h1>
<h2> Maak een keuze: </h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="button" name="delete" value="Verwijder een gebruiker"/><br /><br />
    <input type="button" name="add" value="Voeg een beheerder toe"/><br /><br />
    <input type="button" name="logout" value="Uitloggen"/><br /><br />
</form>       
</body>
</html>