<?php
	echo "<br /><br />Testversie 2.4<br /><br />";
	
	// Connect to the database
	include 'shielded/connector.php';
	$db = new ConnectorClass;
	
	$queryResultsArray = null; 
	
	// Initializing variables and secure that they are not mysql-injections
	if (isset($_GET['id']))
	{
		$userID = mysql_real_escape_string($_GET['id']);
	}
	
	QueryOnId();
	
	// Making first query to find user_id's from submitted inputform
	function QueryOnId()
	{
		$GLOBALS['db'] -> Query = 
		"	SELECT *
			FROM webdb13BG2.user_personal_data AS upd
			WHERE upd.user_id = 2";
		
		// Getting results from query
		$GLOBALS['queryResultsArray'] = $GLOBALS['db'] -> Querying();
		
		if (sizeOf( $GLOBALS['queryResultsArray'] ) != 1)
		{
			detailsNotFound();
		}
		else
		{
			// succes!
			echo "Gegevens succesvol opgehaald!";
			
			print_r($GLOBALS['queryResultsArray']);
			echo "<br /><br /><br />";
			print($GLOBALS['queryResultsArray'][0]);
			echo "<br /><br /><br />";
			print($GLOBALS['queryResultsArray']['user_id']);
				
		}
	}
	
	function detailsNotFound()
	{
		echo "Fout we hebben de door u gekozen contactpersoon niet kunnen vinden.";	
	}
	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsPfMQFJt8kVhRafB7uXxY2H0QAy1ipMI&sensor=false"></script>
<script type="text/javascript">      
      var geocoder;
      var map;
      function initialize() {      
        var address = "Twee koningskinderenstraat 17";
        
        var image = new google.maps.MarkerImage("img/student_1.jpg",
        // This marker is 20 pixels wide by 32 pixels tall.
        new google.maps.Size(300, 300));
        
        geocoder = new google.maps.Geocoder();
        geocoder.geocode( { "address": address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                //icon: image,
                position: results[0].geometry.location,
                title:"Tim Leunissen"
            });
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });  
                
        var mapOptions = {
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }       
        
        
       
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        
      }

      
</script>
	
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
	
	.content .details .imgbtn { width: 305px; float: left; }
	.content .details .imgbtn .image { position: relative; width: inherit; border: 2px solid #FF7F00; overflow:hidden; }
	.content .details .imgbtn .image:hover .info { visibility: hidden }
	.content .details .imgbtn .image .info { position: absolute; bottom: 0px; width: 305px; padding: 5px; height: 25px; background-color: #FF7F00; opacity: 0.85; }
	.content .details .imgbtn .image
	{
		width: inherit; height: 400px;            
	}
	.content .details .image .buttons { width: inherit;    }
	.content .details .image .buttons a { background-color: red; }
	
	.content .details .information
	{
		width: 555px; height: 500px; float: right;
	}
	.content .details .geo
	{
		width: inherit; height: 175px; float: left;
		position: relative;
		margin: 25px 0px 25px 0px;
		border: 2px solid #FF7F00;
	}
	.content .details .geo:hover > .info { visibility: hidden; }
	.content .details .geo .info { position: absolute; bottom: 0; background-color: #FF7F00; width: 880px; padding: 10px; height:20px; opacity: 0.85; }
	
	.content .details .information .category { width: inherit; height: 40px; float: left; line-height: 40px; font-weight:600; }
	.content .details .information .label { width: 45%; height: 30px; float: left; line-height:30px;  }
	.content .details .information .content { width: 55%; height: 30px; float: left; line-height:30px; }
</style>	
</head>

	<body onload="initialize()">
		<div class="header">
                <div class="center">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right">
                <div class="label">Voor leden geef je gegevens en log in</div>
                <div class="login"><input value="Gebruikersnaam" /> <input value="Wachtwoord" /><button type="submit">Login</button></div>
            	</div>
    		</div>
		</div>		

		<div class="content">        

          <div class="details">
              <div class="imgbtn"> 
                  <div class="image">
                      <div class="info">Dit ben ik!</div>           
                      <img src="img/student_1.jpg" width="100%" height="400px" ></img>                     
                  </div>
                  
                  <div class="buttons">
                      <a href="#">Contact</a>
                      <a href="#">Vragen</a>                      
                  </div>              
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
            </div>
            
           
            
            <div class="geo">
                 <div id="map_canvas" style="width:100%; height:174px"></div>
                 <div class="info">Twee koningskinderenstraat 17 HS </div>            
            </div>
              <div class="clear"></div>
          </div>          
            
          <div class="main_title">Soortgelijke docenten:</div>

            
            <div class="populair">
                <a class="ctrlLeft" href="#"><img src="img/arrowLeft.jpg" width="100%" height="100%" /></a>
                <a class="ctrlRight" href="#"><img src="img/arrowRight.jpg" width="100%" height="100%" /></a>
                <a href="details.php?id=1" class="docent">
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
            <a href="About.html">Wie zijn wij?</a>
            <a href="Aanmeld.html">Meld aan als docent</a>    
            <a href="Advertenties.html">Meld aan als student</a>        
            <a href="Aanmeld.html" class="last">Contact</a>            
        </div>

		<div class="bottom"></div>	
  </body>
</html>§
