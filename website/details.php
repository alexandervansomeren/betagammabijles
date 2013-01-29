<?php
	// Connect to the database
	include 'shielded/connector.php';
	$db = new ConnectorClass;
	
	$queryResultsArray = null; 
	
	// Initializing variables and secure that they are not mysql-injections
	if (isset($_GET['id']))
	{
		$GLOBALS['userID'] = $_GET['id']; //mysql_real_escape_string($_GET['id']);
        }       
	
	QueryOnId();
	
	// Making first query to find user_id's from submitted inputform
	function QueryOnId()
	{
		$GLOBALS['db'] -> Query = 
		'	SELECT *
			FROM webdb13BG2.user_personal_data up
			INNER JOIN webdb13BG2.adress_data ad ON up.user_id = ad.user_id
			WHERE up.user_id = '. $GLOBALS['userID'] .';';
                
		$GLOBALS['queryResultsArray'] = $GLOBALS['db'] -> Querying();
		
		if (sizeOf( $GLOBALS['queryResultsArray'] ) != 1)
		{
			detailsNotFound();
		}
		else
		{
			$GLOBALS['docent_naam'] = $GLOBALS['queryResultsArray'][1]['first_name'] . ' ' . 
						  $GLOBALS['queryResultsArray'][1]['middle_name'] . ' ' . 
						  $GLOBALS['queryResultsArray'][1]['last_name'];
			
			$GLOBALS['docent_locatie'] = $GLOBALS['queryResultsArray'][1]['city'] . ', ' . 
                                                     $GLOBALS['queryResultsArray'][1]['street'] . ' ' . 
                                                     $GLOBALS['queryResultsArray'][1]['streetnumber'];	
                        
                        $GLOBALS['docent_city'] = $GLOBALS['queryResultsArray'][1]['city'];
                        $GLOBALS['docent_email'] = $GLOBALS['queryResultsArray'][1]['emailadress'];
                        $GLOBALS['docent_over'] = $GLOBALS['queryResultsArray'][1]['about_me'];
                        $GLOBALS['docent_vakken'] = '';
                        	
                        if ( file_exists( 'user_img/'.$GLOBALS['userID'].'.jpg' ))
                        {
                            $GLOBALS['docent_img'] = '<img src="user_img/'. $GLOBALS['userID'] .'.jpg" width="100%" height="400px" />';
                        }
                        else
                        {
                            $GLOBALS['docent_img'] = '<img src="img/student_1.jpg" width="100%" height="400px" ></img>';
                        }                        
                        
                        $GLOBALS['db'] -> Query = 
                       'SELECT *
			FROM webdb13BG2.course_user cu
			INNER JOIN webdb13BG2.course_code cc ON cc.course_code = cu.course_code 
			INNER JOIN webdb13BG2.course_id ci ON cc.course_id = ci.course_id 
			INNER JOIN webdb13BG2.course_difficulty cd ON cd.difficulty_id = cc.course_difficulty
			WHERE cu.user_id = '. $GLOBALS['userID'] .';';
                
                        $GLOBALS['queryResultsArray'] = $GLOBALS['db'] -> Querying();
                        if (sizeOf( $GLOBALS['queryResultsArray'] ) >= 1)
                        {			
                            foreach ($GLOBALS['queryResultsArray'] as $vakRow)
                            {
                                $GLOBALS['docent_vakken'] .= '<div class="label">'. $vakRow['course_name'] .'</div><div class="content">'. $vakRow['difficulty_name'] .'</div>';
                            }
                        }
                        else
                        {
                            $GLOBALS['docent_vakken'] .= '<div class="label">Heeft geen vakken opgegeven</div><div class="content"></div>';
                        }
                        
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
        var address = "<?php echo($GLOBALS['docent_locatie']); ?>"
        
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
                title:"<?php echo($GLOBALS['docent_naam']); ?>"
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
	.content .details .imgbtn .image { position: relative; width: 100%; border: 2px solid #FF7F00; overflow:hidden; }
	.content .details .imgbtn .image:hover .info { visibility: hidden }
	.content .details .imgbtn .image .info { position: absolute; bottom: 0px; width: 305px; padding: 5px; height: 25px; background-color: #FF7F00; opacity: 0.85; }
	.content .details .imgbtn .image
	{
		width: 100%; height: 400px;            
	}
	.content .details .imgbtn .button { width: 100%; text-indent: 25px; height: 30px; cursor:pointer; line-height: 30px; margin-top: 25px; display: block; border: 2px solid #FF7F00; background-color: #FF7F00; opacity: 0.85; }
        .content .details .imgbtn .button:hover { opacity: 1; }
	
	.content .details .information
	{
		width: 555px; float: right;
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
                      <?php echo($GLOBALS['docent_img']); ?>                     
                  </div>
                  
                  <a class="button">Klik hier om contact op te nemen</a>              
                  <div class="clear"></div>
              </div>            
            
            
            <div class="information">
                <div class="category">Contactgegevens</div>
                <div class="label">Naam:</div><div class="content"><?php echo($GLOBALS['docent_naam']); ?></div>
                <div class="label">Woonplaats:</div><div class="content"><?php echo($GLOBALS['docent_locatie']); ?></div>
                <div class="label">E-mail:</div><div class="content"><?php echo($GLOBALS['docent_email']); ?></div>
                <div class="category">Studiegegevens</div>
                <?php echo($GLOBALS['docent_vakken']); ?>
                <div class="category">Over mij</div>
                <div class="txt"><?php echo($GLOBALS['docent_over']); ?></div>
                <div class="clear"></div>
            </div>
            
           
            
            <div class="geo">
                 <div id="map_canvas" style="width:100%; height:174px"></div>
                 <div class="info"><?php echo($GLOBALS['docent_locatie']); ?></div>            
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
</html>
