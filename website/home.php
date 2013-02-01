<?php
$bijlesDocent = new ConnectorClass;


$GLOBALS['bijlesDocent'] -> Query = 
'	SELECT *
        FROM webdb13BG2.user_personal_data up
        INNER JOIN webdb13BG2.adress_data ad ON up.user_id = ad.user_id
        RDER BY RAND() LIMIT 5
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

?>

<div class="content">	
     <div class="main_title">Welkom op <i>Open Bijles</i>.nl</div>
        <div class="buttons">
           <a href="index.php?p=registratieformulier" class="left">
              <img src="img/docent.jpg" width="100%" height="100%" alt="Afbeelding docent" />
              <span class="title">Ik geef bijles</span>
           </a>
           <a href="index.php?p=advertenties&amp;course=&amp;city=&amp;level=&amp;male=on&amp;female=on" class="right">	                
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
