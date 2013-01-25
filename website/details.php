<?php
$page = '<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<title>webdb13BG2</title>
		<!-- Hieronder een verwijzing naar de algemene stylesheet -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
		<style>
		.content .details
		{
		    width: inherit;
                    position: relative;
		    margin: 0px 0px 20px 0px;
		}
		.content .details .image 
		{
		    width: 356px; height: 496px; float: left;
		    border: 2px solid #FF7F00;
		}
		.content .details .information
		{
		    width: 530px; height: 500px; float: right;
		}
		.content .details .buttons
		{
		    width: inherit; height: 100px; float: left;
		    margin: 25px 0px 25px 0px;
		    background-color: red;			
		}
		
		
		.content .details .information .category { width: inherit; height: 40px; float: left; line-height: 40px; font-weight:600; }
		.content .details .information .label { width: 45%; height: 30px; float: left; line-height:30px;  }
		.content .details .information .content { width: 55%; height: 30px; float: left; line-height:30px; }
		</style>	
	</head>

	<body>
		<div class="header">
                <div class="center">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right">';
//$page.='        <div class="label">Voor leden geef je gegevens en log in</div>';                $page.='<div class="login"><input value="Gebruikersnaam" /> 
                <input value="Wachtwoord" /><button type="submit">Login</button></div>'; 
// TODO  include an login file. Switch case cookie, sshkey.; Validate loginstatus.

$page.='
            	</div>
    		</div>
		</div>		

		<div class="content">		
		<div class="details">
          	<div class="image">
                    <img src="img/student_1.jpg" width="100%" height="100%" />
                </div>            
            <div class="information">
            <div class="category">Contactgegevens</div>
            <div class="label">Naam:</div><div class="content">Emma Boumans</div>
            <div class="label">Woonplaats:</div><div class="content">Amsterdam, Diemen</div>
            <div class="label">E-mail:</div><div class="content">henk123@hotmail.com</div>
            <div class="category">Studiegegevens</div>
            <div class="label">Natuurkunde</div><div class="content">VWO 4</div>
            <div class="label">Scheikunde</div><div class="content">VWO 3</div>
            <div class="label">Biologie</div><div class="content">VWO 5</div>
            <div class="label">Maatschappijwetenschappen</div><div class="content">HAVO 2</div>
            <div class="category">Over mij</div>
            <div class="txt">Ik ben een lorum ipsum die enorm houdt van lorum ipsum. In mijn vrije tijd doe ik ongeveer de helft van de tijd lorum en de andere helft van de tijd ipsum.</div> 
            <div class="category">Google Maps Locatie</div>           
            </div>
            <div class="buttons">
            	<a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>                
            </div>
          	<div class="clear"></div>
          </div>          
            
          <div class="main_title">Soortgelijke docenten:</div>          
		<div class="populair">
            	<a class="ctrlLeft" href="#"><img src="img/arrowLeft.jpg" width="100%" height="100%" /></a>
                <a class="ctrlRight" href="#"><img src="img/arrowRight.jpg" width="100%" height="100%" /></a>
                <a href="Details.html?id=1" class="docent">
                <span class="name">Emma</span>
                <span class="vak">Natuurkunde, KI, Wiskunde, Scheikunde en FSR</span>
                <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                <span class="name">Jan-roelof</span>
                <span class="vak">Natuurkunde, KI, Wiskunde, Biologie</span>
                <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                    <span class="name">Emma</span>
                    <span class="vak">Natuurkunde, KI, Wiskunde, Buitenschools opvang</span>
                    <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                    <span class="name">Berend</span>
                    <span class="vak">Natuurkunde, KI, Wiskunde, Rekent duur tarrief</span>
                    <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent last">
                    <span class="name">Henk</span>
                    <span class="vak">Natuurkunde, KI, Wiskunde</span>
                    <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
		</div> 		    
		</div>
		
		<div class="footer">
	        <a href="about.php">Wie zijn wij?</a>
                <a href="registratieformulier.php">Meld aan als docent</a>	
	        <a href="advertenties.php">Meld aan als student</a>		
                <a href="" class="last">Contact</a>			
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

