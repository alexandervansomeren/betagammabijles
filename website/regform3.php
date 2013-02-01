<?php
    function makeOptionVisible($course_int)
    {
        echo '<div class="page-field">';
            echo "Je hebt een vak ingevoerd: ";
            echo $course_int;
            echo '<form method="post">
                    <div class="ques">
                        Op welk niveau wil je dit vak geven?
                    </div>
                    <div class="ans">
                        <select name="niveau">
                            <option value="1">VMBO</option>
                            <option value="2">VMBOT</option>
                            <option value="3">HAVO</option>
                            <option value="4">VWO</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="submit" value="Kies" style="background-color:orange;" name="submit" />
                    </div>
                  </form>';
            if(isset($_POST['niveau']))
            {
                echo $_POST['niveau'];
                enterCourseCode($course_int);
            }
        echo '</div>';
    }
    
    function enterCourseCode($course_int)
    {
            $ui_int = intval($GLOBALS['user_id']);
            $GLOBALS['db'] -> Query =
                "
                INSERT INTO webdb13BG2.course_user (course_code, user_id) 
                VALUES (".$course_int.", ".$ui_int.");
                ";
            $GLOBALS['db'] -> Querying();
            
            $GLOBALS['db'] -> Query = null;
            $GLOBALS['db'] -> QueryResult = null;
    }
    
    function makeVakkenQuery()
    {
        $N = count($GLOBALS['courseTest']);
        $localCourse = array();
        $localCourse = $GLOBALS['courseTest'];
        for($i=0; $i < $N; $i++)
        {
            $course_code = $localCourse[$i];
            makeOption($course_code);
        }
    }
    
    function makeOption($course_code)
    {
		$course_code = $course_code*100 + 11;
	    $course_int = intval($course_code);
	    makeOptionVisible($course_int);       	
    }
?>
