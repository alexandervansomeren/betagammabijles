<?php 
$page = '<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>webdb13BG2</title>
		<!-- Hieronder een verwijzing naar de algemene stylesheet -->
		<link rel="stylesheet" type="text/css" href="style.css"/>

	<style type="text/css">
		
	    .firstRow { height: 350px; margin-bottom: 65px; }
	    .secondRow { height: 275px; margin-bottom: 25px; }
		
		.content .oneThirdWidth
		{
		    width: 240px; height: inherit;
		    float: left;
		    padding: 15px;
		    background-color:orange;
		    border-radius:10px;
		}

		.content .twoThirdWidth
		{
		    width: 570px; height: inherit;
		    float: left;		    
		    padding: 15px;
		    background-color:orange;
		    border-radius:10px;
		}
			
		.content .oneThirdWidth .wie 
		{ 
		    height: 145px;
		    margin-top: 25px; 
		    padding: 15px;
		    background-color:orange; 
		    border-radius:10px;
		}	
	    
		.twoThirdWidth .half { width: 50%; float: left; }
		.twoThirdWidth .half .label { width: 100%; height: 30px; line-height: 30px; }
		.twoThirdWidth .half .name { width: 100%; height: 30px; line-height: 30px; }
		
		.title { width: 100%; height: 40px; font-size: 25px; }
		
		.header .center .left
		{
		    
		    float: left;
		}
		
	</style>
	</head>

	<body>
		<div class="header">
			<div class="center">
    				<a href="index.html" class="left"> Waarbijles </a>
        			<div class="middle"></div>
        			<div class="right">
            				<div class="label">Voor leden geef je gegevens en log in</div>
            				<div class="login"><input value="Gebruikersnaam" /> <input value="Wachtwoord" /><button type="submit">Login</button></div>
        			</div>
    			</div>
		</div>
		
		<div class="content">
			<div class="firstRow">
			    <div class="oneThirdWidth">
		            <div class= "title">Wie zijn wij?</div> 
                    <img src = "file:///home/10198539/Downloads/bril.jpg" width="230" height="230" />
                </div>             

			    <div class= "twoThirdWidth" style="margin-left:30px;">
				        <div class= "title">Onze missie!</div> 
				        <p>Wij zijn 5 enthousiaste studenten die een bijles-site begonnen zijn. Via deze site is het mogelijk om je te registreren om bijles te gaan geven of bijles te nemen. </p>
				        <p>Je kan ook eerst even rondkijken of er een persoon bij zit die jou zou kunnen bijlessen.Er wordt in bijna elk vak wel bijles gegeven, dus neem een kijkje!</p>
				        <p>Liefs,</p>
				        <p>Alexander, Bastiaan, Emma, Laura en Tim</p>
				        <p>lorum ipsum</p>
			    </div>
			</div>
			<div class="secondRow">
			    	
			    <div class= "twoThirdWidth" style="margin-right:25px;">
				    <div class= "title">Wil je ons contacteren?</div>
				
				    <div class="half">
				    <div class="label">Naam: </div>
				    <div class="input"><input /></div>
							
				    <div class="label">Email-adres: </div>
				    <div class="input"><input /></div>
				    </div>
                    
                        <div class="half">
  				    <div class="label">Uw bericht aan ons</div>
				    <div class="input"><textarea style="resize:vertical;" type="text" rows="9" cols="25" placeholder="Typ hier uw bericht"></textarea></div>
			        </div>
			    </div>
			    
			    <div class= "oneThirdWidth">				    
		            <div class= "title">Contactgegevens</div> 
		            <p>
		            Alexander, Bastiaan, Emma, Laura en Tim<br/>
		            Science Park 409<br/>
                    1098 XH Amsterdam<br/>
                    Nederland
                    </p>
			    </div>		   
		    </div>			
		</div>
		
		<div class="footer">
            <a href="about.php"ll>Wie zijn wij?</a>
            <a href="index.php">Welkom</a>
            <a href="about.php">Meld je aan</a>
	    <a href="registratieformulier.php">Registratieformulier</a>
        </div>        
        
        <div class="bottom"></div>
        
  	</body>
</html>';
$length = strval( strlen( $page ) );
$md5sum = md5( $page );
header( 'Content-Language: nl' );
header( 'Content-MD5:' . $md5sum );
header( 'Content-Length:' . $length );
echo( $page );
?>



