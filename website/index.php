<?php

include 'shielded/connector.php';
$db = new ConnectorClass;
	

$GLOBALS['db'] -> Query = 
'	SELECT *
        FROM webdb13BG2.user_personal_data up
        INNER JOIN webdb13BG2.adress_data ad ON up.user_id = ad.user_id';

$GLOBALS['queryResultsArray'] = $GLOBALS['db'] -> Querying();

$GLOBALS['fiveResults'] = '';

if (sizeOf( $GLOBALS['queryResultsArray'] ) >= 1)
{
  $x = 0;
  foreach ($GLOBALS['queryResultsArray'] as $vakRow)
  {
      while($x < 5)
        {
            echo "hier kwam ik nog";
            // Get vakken die docent geeft
            $GLOBALS['db'] -> Query = 
            'SELECT *
            FROM webdb13BG2.course_user cu
            INNER JOIN webdb13BG2.course_code cc ON cc.course_code = cu.course_code 
            INNER JOIN webdb13BG2.course_id ci ON cc.course_id = ci.course_id 
            INNER JOIN webdb13BG2.course_difficulty cd ON cd.difficulty_id = cc.course_difficulty
            WHERE cu.user_id = '. $vakRow['user_id'] .';';
            
            $vakken = $GLOBALS['db'] -> Querying();
            $GLOBALS['vakken'] = "";
            
            if (sizeOf( $vakken ) >= 1)
            {			
              foreach ($vakken as $vakRow)
              {
                  $GLOBALS['vakken'] .= $vakRow['course_name'] .' ';
              }
            }
            else
            {
              $GLOBALS['vakken'] .= '<div class="label">Heeft geen vakken opgegeven</div><div class="content"></div>';
            }
          
            if ( file_exists( 'user_img/'.$vakRow['userID'].'.jpg' ))
            {
              $GLOBALS['docent_img'] = '<img src="user_img/'. $vakRow['userID'] .'.jpg" width="100%" height="400px" />';
            }
            else
            {
              $GLOBALS['docent_img'] = '<img src="img/student_1.jpg" width="100%" height="400px" ></img>';
            }                        
            
            // Create a div for each of 5         
            $GLOBALS['fiveResults'] .= '<a href="details.php?id='. $vakRow['user_id'] .'" class="docent last"><span class="name">'. $vakRow['first_name'] .'</span><span class="vak">
                                       '. $GLOBALS['vakken'] .'</span>'. $GLOBALS['docent_img'] .'</a>';
      
            $x++;
        }
  }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>webdb13BG2</title>
		<!-- Hieronder een verwijzing naar de algemene stylesheet -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
		<style type="text/css">
		.content .buttons
		{
		    width: inherit; height: 350px;
			position: relative;
		    margin: 0px 0px 20px 0px;
		}
		.content .buttons
		{
	        width: inherit; height: 350px;
			position: relative;
 	        margin: 0px 0px 20px 0px;
		}
	
		.content .buttons .left,
		.content .buttons .right
		{
			border: 2px solid #FF7F00;		
			display: block;
		    float: left;		    
		    width: 436px;
		    height: 346px;
            float: left;		    
	        width: 436px;
            height: 346px;
            box-shadow: 0px 0px 5px 0px #FF7F00;
		}
		
		.content .buttons a .title
		{
			width: inherit; height: 60px; line-height: 60px;
			text-indent: 10px;
			position: absolute;
			bottom: 0px;
			display:block;
			background-color: #FF7F00;
			font-size: 38px;
			opacity: 0.80;
		}
		
		.content .buttons .left { margin-right: 20px; }
		.content .buttons .right { }
		
		.content .buttons > a:hover { box-shadow: 0px 0px 10px 2px #FF7F00; }
	    .content .buttons > a:hover .title { text-decoration: underline; }
        .content .buttons > a:hover .title { text-decoration: underline; }
		
		.main_title
		{
			width: inherit;
			height: 25px;
			margin-bottom: 25px;	
			
			font-size: 24px;
		}
		</style>
		
		
	</head>

	<body>
		<div class="header">
              <div class="center">
                 <div class="left"></div>
                 <div class="middle"></div>
                 <div class="right">
                    <div class="label">Voor leden geef je gegevens en log in</div>
                    <div class="login"><input value="Gebruikersnaam" />
                       <input value="Wachtwoord" />
                       <button type="submit">Login</button>
                    </div>
                 </div>
    	      </div>
           </div>		

           <div class="content">	
              <div class="main_title">Welkom op <i>Open Bijles</i>.nl</div>
		 <div class="buttons">
	            <a href="registratieformulier.php" class="left">
                       <img src="img/docent.jpg" width="100%" height="100%" alt="Afbeelding docent" />
	               <span class="title">Ik geef bijles</span>
                    </a>
	            <a href="advertenties.php?course=&city=&level=&male=on&female=on" class="right">	                
                       <img src="img/student.jpg" width="100%" height="100%" alt="Afbeelding student" />  
                       <span class="title">Ik wil bijles</span>
	            </a>
		</div>
		    
                <div class="main_title">Een selectie van onze docenten op basis van uw locatie:</div>
            
	        <div class="populair">
            	<a class="ctrlLeft" href="#"><img src="img/arrowLeft.jpg" width="100%" height="100%" alt="Arrow Left"/></a>
                <a class="ctrlRight" href="#"><img src="img/arrowRight.jpg" width="100%" height="100%" alt="Arrow Right" /></a>
                <?php echo($GLOBALS['fiveResults']); ?>
                
            	
	     </div>		    
         </div>
		
	 <div class="footer">
	    <a href="about.php">Wie zijn wij?</a>
            <a href="registratieformulier.php">Meld aan als docent</a>	
	    <a href="registratieformulier.php">Meld aan als student</a>		
            <a href="" class="last">Contact</a>			
	 </div>
		
	 <div class="bottom"></div>
		
     </body>
</html>