<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<title>webdb13BG2</title>
		<!-- Hieronder een verwijzing naar de algemene stylesheet -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

	<body>
		<div class="header">
		<div class="center">
    		<div class="left">Bijlessen.nl</div>
        		<div class="middle"></div>
        		<div class="right">
            		<div class="label">Voor leden geef je gegevens en log in</div>
            		<div class="login"><input value="User name" /> <input value="Password" /><button type="submit">Login</button></div>
        		</div>
    			</div>
		</div>
		<div class="content">
   			Dit is de <em>Webprogrammeren en Databases</em> pagina voor groep <b>webdb13BG2</b>.
	    		<p />
	    		Je bent hier gekomen via het domein:<pre>
	    		<?php
	    		echo getenv("HTTP_HOST");
	    		?>
	    		</pre>
			Klik hier om door te gaan naar de: <br>
			* <a href="about.html">Wie zijn wij</a><br>
			* <a href="advertenties.html">Advertenties</a><br>
			* <a href="registratieformulier.html">Registratieformulier</a><br>
		</div>
  </body>
</html>
