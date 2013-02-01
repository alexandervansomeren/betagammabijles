<?php

// Connect to the database
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
                        $GLOBALS['docent_img'] = '<img src="user_img/'. $GLOBALS['userID'] .'.jpg" width="100%" height="400px" alt="student_'.$GLOBALS['userID'].'" />';
                    }
                    else
                    {
                        $GLOBALS['docent_img'] = '<img src="img/bijlesdocent.png" width="100%" height="400px" alt="student_'.$GLOBALS['userID'].'" />';
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

$bijlesDocent = new ConnectorClass;


$GLOBALS['bijlesDocent'] -> Query = 
'	SELECT *
        FROM webdb13BG2.user_personal_data up
        INNER JOIN webdb13BG2.adress_data ad ON up.user_id = ad.user_id
        ORDER BY RAND() LIMIT 5
        ';

$GLOBALS['queryResultsArray'] = $GLOBALS['bijlesDocent'] -> Querying();

$GLOBALS['fiveResults'] = '';

if (sizeOf( $GLOBALS['queryResultsArray'] ) >= 1)
{
  $x = 0;
  foreach ($GLOBALS['queryResultsArray'] as $docentRow)
  {
      if($x < 5)
        {
            $vakkenConnect = new ConnectorClass;
            // Get vakken die docent geeft
            $GLOBALS['vakkenConnect'] -> Query = 
            'SELECT ci.course_name
            FROM webdb13BG2.course_user cu
            INNER JOIN webdb13BG2.course_code cc ON cc.course_code = cu.course_code 
            INNER JOIN webdb13BG2.course_id ci ON cc.course_id = ci.course_id 
            WHERE cu.user_id = '. $docentRow['user_id'] .';';
            
            $GLOBALS['vakkenArray'] = $GLOBALS['vakkenConnect'] -> Querying();
            $GLOBALS['vakken'] = "";
            
            if (sizeOf( $GLOBALS['vakkenArray'] ) >= 1)
            {			
              foreach ($GLOBALS['vakkenArray'] as $vakRow)
              {
                  $GLOBALS['vakken'] .= $vakRow['course_name'] .' ';
              }
            }
            else
            {
              $GLOBALS['vakken'] .= '<div class="label">Heeft geen vakken opgegeven</div><div class="content"></div>';
            }
          
            if ( file_exists( 'user_img/'.$docentRow['user_id'].'.jpg' ))
            {
              $GLOBALS['docent_img'] = '<img src="user_img/'. $docentRow['user_id'] .'.jpg" width="100%" height="400px" alt="student_.'. $docentRow['user_id'].'" />';
            }
            else
            {
              $GLOBALS['docent_img'] = '<img src="img/bijlesdocent.png" width="100%" height="400px" alt="student_.'. $docentRow['user_id'].'" />';
            }
            
            // Create a div for each of 5         
            $GLOBALS['fiveResults'] .= '<a href="index.php?p=details&amp;id='. $docentRow['user_id'] .'" class="docent last"><span class="name">'. $docentRow['first_name'] .'</span><span class="vak">
                                       '. $GLOBALS['vakken'] .'</span>'. $GLOBALS['docent_img'] .'</a>';
      
            $x++;
        }
  }
}
	
function detailsNotFound()
{
	echo "Fout we hebben de door u gekozen contactpersoon niet kunnen vinden.";	
}


?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsPfMQFJt8kVhRafB7uXxY2H0QAy1ipMI&amp;sensor=false"></script>
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
        <a class="ctrlLeft" href=""><img src="img/arrowLeft.jpg" width="100%" height="100%" alt="arrow Left"/></a>
        <a class="ctrlRight" href=""><img src="img/arrowRight.jpg" width="100%" height="100%" alt="arrow Right" /></a>
        <?php echo($GLOBALS['fiveResults']); ?>
    </div>             
</div>

	
