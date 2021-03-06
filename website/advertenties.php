<div class="content">
	<div class="page-intro">
		<form class="selection" method="get" action="">
    		<div class="part">
                <div class="text"> Vak: </div>
                <input class="inputfield" type="text" name="course" placeholder="bijv. Natuurkunde" />
            </div>
            <div class="part">
                <div class="text"> Stad: </div>
                <input class="inputfield" type="text" name="city" placeholder="bijv. Amsterdam" />
            </div>
            <div class="part">
                <div class="text"> Niveau: </div>
                <input class="inputfield" type="text" name="level"placeholder="bijv. havo" />
            </div>
            <div class="selectpart" style="width:152px"> 
                <label >Man <input type="checkbox" name="male"  checked="checked" />	</label>
                <label >Vrouw <input type="checkbox" name="female" checked="checked" />	</label>
            </div> 
            <input class="inputfield" type="hidden" name="p" value="advertenties" />
            <input class="part" style="width:60px; height:25px; margin-left:10px;" type="submit" value="Zoeken"/>
        </form>
    </div>

<?php
    // Connect to the database
    $db = new ConnectorClass;

    $queryResultsArray = null; 

    // Initializing variables and secure that they are not mysql-injections
    if (isset($_GET['course']))
    {
        $course = mysql_real_escape_string(strip_tags($_GET['course']));
    }
    else $course="";
    if (isset($_GET['city']))
    {
        $city = mysql_real_escape_string(strip_tags($_GET['city']));
    }
    else $city="";
    if (isset($_GET['level']))
    {
        $level = mysql_real_escape_string(strip_tags($_GET['level']));
    }
    else $level="";

    if (isset($_GET['male']))
    {
        $male="1";
    }
    else $male="0";
    if (isset($_GET['female']))
    {
        $female="1";
    }
    else $female="0";
	
	// This creates the part of the query that selects on gender 
    if ($male=="1" && $female=="1")
    {
        $genderQuery = "";
        makeFirstQuery();
    }
    else if ($male=="1")
    {
        $genderQuery = "AND up.gender=1";
        makeFirstQuery();
    }
    else if ($female=="1")
    {
        $genderQuery = "AND up.gender=0";
        makeFirstQuery();
    }
    else
    {
        echo 
        '
        <div class="page-field"> 
            <h1> Er zijn geen bijlesgevers gevonden in onze database die voldoen aan de door u opgegeven criterea </h1>
        </div>
        ';
    }

    // Making first query to find user_id's from submitted inputform
    function makeFirstQuery()
    {
        $GLOBALS['db'] -> Query = 
        "
        SELECT DISTINCT
        ad.user_id AS user_id,
        ad.city AS user_city,
        cu.course_code AS course_id, 
    	ci.course_name AS course_name,
        cd.difficulty_name AS course_difficulty

        FROM webdb13BG2.adress_data ad 
        INNER JOIN webdb13BG2.course_user cu ON cu.user_id = ad.user_id 
        INNER JOIN webdb13BG2.course_code cc ON cc.course_code = cu.course_code 
        INNER JOIN webdb13BG2.course_id ci ON cc.course_id = ci.course_id 
        INNER JOIN webdb13BG2.course_difficulty cd ON cd.difficulty_id = cc.course_difficulty
        INNER JOIN webdb13BG2.user_personal_data up ON up.user_id = cu.user_id 

        WHERE ci.course_name LIKE '%". $GLOBALS['course'] ."%' 
        AND 
        ad.city LIKE '%". $GLOBALS['city'] ."%' 
        AND 
    	cd.difficulty_name LIKE '%". $GLOBALS['level'] ."%'
        ". $GLOBALS['genderQuery'] .";
        ";

        // Getting results from query
        $GLOBALS['queryResultsArray'] = $GLOBALS['db'] -> Querying();

        // checking whether any results where found, if found, call a function to find the courses and locations from the user_id
        if (sizeOf( $GLOBALS['queryResultsArray'] ) ==0)
        {
            showNoResults();
        }
        else
        {
        	makeSecondQuery();
    	}
    }

    function makeSecondQuery()
    {
        for($i=1;$i<=sizeof($GLOBALS['queryResultsArray']); $i++)
        {
            $users[$i]="webdb13BG2.course_user.user_id=" . $GLOBALS['queryResultsArray'][$i][0];
        }
        $usersQuery=implode(" OR ", $users);

        $GLOBALS['db'] -> Query = 
        "
        SELECT course_user.user_id, course_name  
        FROM webdb13BG2.course_user 
        INNER JOIN webdb13BG2.course_code ON webdb13BG2.course_code.course_code=webdb13BG2.course_user.course_code 
        INNER JOIN webdb13BG2.course_id on webdb13BG2.course_code.course_id=webdb13BG2.course_id.course_id 
        WHERE ".$usersQuery."
        ORDER BY course_user.user_id
        ;";
        
        $courseNamesArray = $GLOBALS['db'] -> Querying();
        
        //Resetting
        $GLOBALS['db'] -> QueryResult = null;
        
        //New Query
        $GLOBALS['db'] -> Query = 
        "
        SELECT DISTINCT course_user.user_id, first_name, middle_name, last_name, city  
        FROM webdb13BG2.course_user 
        INNER JOIN webdb13BG2.adress_data on webdb13BG2.course_user.user_id=webdb13BG2.adress_data.user_id 
        INNER JOIN webdb13BG2.user_personal_data on webdb13BG2.course_user.user_id=webdb13BG2.user_personal_data.user_id
        WHERE ".$usersQuery."
        ;";

        $nameCityArray = $GLOBALS['db'] -> Querying();

        // Disconnect from the database
        $GLOBALS['db']  -> Disconnect();
			
        // Create an array with unique user_id's from selection
        for($i=1;$i<=sizeof($nameCityArray); $i++)
        {
            $user[$i-1]=$currentUser=$nameCityArray[$i][0];
        }
        $user=array_unique($user);

        // Create an array with user_ids as keys and an array with course_names as values
        for($i=0;$i<sizeof($user); $i++)
        {
            $coursesPerUser[$user[$i]]=array();
            for($j=1;$j<=sizeof($courseNamesArray); $j++)
                if ($courseNamesArray[$j][0]==$user[$i])
                {
                	array_push($coursesPerUser[$user[$i]], $courseNamesArray[$j][1]);
                }
        }
        
        //Printing every users VisitCard
        echo '<div class="page-field">';
        for($i=1;$i<=sizeof($nameCityArray); $i++)
        {
            printVisitCard(
                $nameCityArray[$i][0],
                $nameCityArray[$i][1],
                $nameCityArray[$i][2],
                $nameCityArray[$i][3],
                $nameCityArray[$i][4],
                $coursesPerUser[$nameCityArray[$i][0]]
            );
        }
    }

    // function that displays that there are no results for the query
    function showNoResults() 
    {
        echo 
        	'
            <div class="page-field"> 
                <h1> Er zijn helaas (nog) geen bijlesgevers die '. $GLOBALS['course'] .' geven in '. $GLOBALS['city'] .'. </h1>
            </div>
            ';
    }

    // Function that creates a "visitcard" from given parameters
	/*	The function searches for a user_image in user_img/<user_id>.jpg, but places
		a default picture if none are found (picture upload function is not included 
		in this web-application so far.
		The div's are created in such a way that, when adding multple "Visit-Cards", 
		they are well displayed and the frame in which they are placed extends its
		height.
	*/
    function printVisitCard( $user_id, $FirstName, $MiddleName, $LastName, $City, $CoursesArray )
    {		
            echo '
                <a href="index.php?p=details&amp;id='.$user_id.'">
                    <object class="card">
                        <div class="frame">';
                        
                        	//Initializing photo
                        	echo '<div class="photoframe">';
            	                if ( file_exists( 'user_img/'.$user_id.'.jpg' ))
                                {
                                    echo '<img src="user_img/',$user_id,'.jpg" width="150" height="200" alt="docent_',$user_id,'" />';
                                }
                            echo '</div>';
                            
                            //Initializing info
                            echo '<div class="infoframe">
                                <div class = "name">
                                    <h1>'; 
                                		echo ucfirst( $FirstName ),' ' , $MiddleName,' ' , ucfirst( $LastName );
                                	echo '</h1>
                                </div>';
                                    
                	            echo '<div class="attributes">';
                                	if( sizeOf( $CoursesArray )==1 )
                                	{
    	                            	echo '<h1>Vak:</h1>';
                                    	echo '<p>', $CoursesArray[0], '</p>';
                                	}
                                	else if( sizeOf( $CoursesArray )>1 )
                                	{
                                    	echo '<h1>Vakken:</h1>';
                                    	echo '<p>';
                                        	echo $CoursesArray[0];
                                        	for($i=1; $i<sizeOf( $CoursesArray ); $i++)
                                        	{
                                            	echo ', ', $CoursesArray[$i];
                                        	}
                                    	echo '.</p>';
                                	}
                                echo '</div>
                                
                                <div class="attributes">
                                    <h1>Locatie:</h1>
                                    <p>';
                                        echo $City;
                                    echo '</p>
                                </div>
                            </div>
                        </div>
                    </object>
            	</a>';
    }
?>
		<div class="clear"></div>
		<div class="clear"></div>
	</div>
</div>