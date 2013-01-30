<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bijles aanbod</title>
    <!-- A google font to use on the webpage -->
    <link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="header">
	    <div class="center">
        	<div class="left"> <a href=/index.html" class="left"> Waarbijles </a> </div>
            <div class="middle"></div>
            <div class="right">
            	<?php 
				session_start();
				if ( isset($_SESSION['user_type']) )
					{
					if ( is_int( $_SESSION['user_type'] ) )
					{
						echo '<div class="text"><p> Je bent ingelogt als '.$_SESSION['user_type'];
						echo '</p>';
						echo '<p><a href="logout.php">Uitloggen</a></p></div>';
					}
				}
				else echo 
				'<form method="post" action="logincheck.php">
					<div class="label">Voor leden geef je gegevens en log in
					</div>
					<div class="login">
						<input type="text" placeholder="Gebruikersnaam" name="username"/> 
						<input type="password" placeholder="Wachtwoord" name="password"/>
						<button type="submit">Login</button>
					</div>
				</form>';
				?>
            	
            </div>
        </div>
    </div>
	
    <div class="content">
    <? include 'advertentiesZONDERHEADER.php'; ?>
    </div>
    <div class="footer">
        <div class="centerwrapper">
            <a href="about.php">Wie zijn wij?</a>
            <a href="index.php">Welkom</a>
            <a href="registratieformulier.php">Meld je aan</a>
            <a href="registratieformulier.php">Registratieformulier</a>
        </div>
    </div>
    
    <div class="bottom"></div>
</body>
</html>