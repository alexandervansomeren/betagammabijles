<!-- formvalidaties en formfeedback in javascript -->
<script language="javascript" type="text/javascript">
    var xmlhttp;
	
	// Function that creates an XMLHTTP object for the AJAX application
	// of checking the availability of a username
	function GetXMLHTTPObject()
    {
        var xmlhttp = null;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        return xmlhttp;
    }
    
    function stateChanged(str)
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
            document.getElementById("fbu").innerHTML = xmlhttp.responseText;
        }
    }
    // Function that determines the password-strength using only the length of
    // the password. 
    function pwStrength()
    {
        id = document.getElementById("password");
        feedback = document.getElementById("fbp");
        strength = "slecht";
        if (id.value.length > 3)
        {
            strength= "redelijk";
        }
        if (id.value.length > 6)
        {
            strength= "goed";
        }
        feedback.innerHTML = " Wachtwoordsterkte: " + strength;
    }
    
    function feedbackGone()
    {
        feedback = document.getElementById("fbp");
        feedback.innerHTML = "";
    }
    
    function unAvailable(str)
    { 
        un = document.getElementById("username");
        xmlhttp = GetXMLHTTPObject();
        if (xmlhttp == null){
            alert ("Je browser ondersteunt geen HTTP requests");
            return;
        }

        var url="wachtwoordcheck.php";
        /*str = str.replace(/\n/g, " ");*/
        url = url + "?q=" + str;
        url = url + "&sid=" + Math.random();

        xmlhttp.onreadystatechange = stateChanged;
        xmlhttp.open("GET", url, true);
        xmlhttp.send(null);
    }
</script>

<div class="content">
    <div class="page-intro">
        <?php 
            print "Welkom op het registratieformulier. Wil je je aanmelden als bijlesgever of wil je graag bijles ontvangen? Vul hieronder het formulier in!";
        ?>
    </div>
    <form method="post">
        <div class="page-field">
            <em>Profiel</em>
            <div class="paragraph">
                <div class="field">
                   <div class="ques">Gebruikersnaam:</div>
                   <div class="ans"><input type="text" name="username" id="username" onkeyup="unAvailable(this.value)"/></div>
                   <p id="fbu"> </p>
                </div>
                <div class="field">
                    <div class="ques">Wachtwoord:</div>
                    <div class="ans"><input type="password" name="password" style="width:155px;" onkeyup="pwStrength()" id="password" onblur="feedbackGone()" /></div>
                    <p id="fbp"> </p>
                </div>
           </div>
           <em><br />Over jou</em>
            <div class="paragraph">
                <div class="field">
                    <div class="ques">Voornaam:</div>
                    <div class="ans">
                        <input type="text" name="firstname" placeholder="Voornaam" /></div>
                </div>
                <div class="field">
                    <div class="ques">Achternaam:</div>
                    <div class="ans">
                        <input type="text" name="middlename" placeholder="Bijv. van" style="width:58px;" />
                    </div>
                    <div class="ans">
                        <input type="text" name="lastname" size="24" placeholder="Achternaam" style="width:93px;" />
                    </div>
                </div>
                <div class="field">
                    <div class="ques">Selecteer geslacht:</div>
                    <div class="ans"><input type="radio" name="gender" value="1" />Man</div>
                    <div class="ans"><input type="radio" name="gender" value="0" />Vrouw</div>
                </div>
                <div class="field"> 
                    <div class="ques">Geboortedatum:</div>
                    <div class="ans"> <input type="text" name="date_of_birth" placeholder="Bijv. 2000-01-01" /></div>
                </div>
                <div class="field"> 
                    <div class="ques">Email:</div>
                    <div class="ans"> <input type="text" name="emailadress" /></div>
                </div>
                <div class="field"> 
                    <div class="ques">Telefoon:</div>
                    <div class="ans"><input type="text" name="phone_1" placeholder="Telefoon 1" style="width:76px;" /></div>
                    <div class="ans"><input type="text" name="phone_2" placeholder="Telefoon 2" style="width:75px;" /></div>
                </div>
                <div class="field"> 
                    <div class="ques">Adres:</div>
                    <div class="ans"><input type="text" name="street" placeholder="Straatnaam" style="width:120px;" /></div>
                    <div class="ans"><input type="text" name="streetnumber" placeholder="Nr." style="width:31px;" /></div>
                </div>
                <div class="field"> 
                    <div class="ques">Postcode:</div>
                    <div class="ans"><input type="text" name="postal" placeholder="Bijv. 1234" style="width:54px;" /></div>
                    <div class="ans"><input type="text" name="postal_extra" placeholder="AB" style="width:18px;" /></div>  
                </div>
                <div class="field"> 
                    <div class="ques">Woonplaats:</div>
                    <div class="ans"><input type="text" name="city" /></div>
                </div>
            </div>
            <em><br />Hamvraag</em>  
            <div class="paragraph">
                <div class="field">
                   Wil je bijles geven of een profiel aanmaken?
                </div>
                <div class="field">
                    <div class="ques"><input type="radio" name="user_type" value="2" onclick="makeInvisible();" />Ik zoek bijles</div>
                    <div class="ques"><input type="radio" name="user_type" value="1" onclick="makeVisible();" />Ik wil graag bijles geven!</div>
                </div>
            </div>
            <script language="javascript" type="text/javascript">
                function makeVisible()
                {
                    document.getElementById("vakkenHolder").style.display="block";
                }
                function makeInvisible()
                {
                    document.getElementById("vakkenHolder").style.display="none";
                }
            </script>
            <div id="vakkenHolder" style="display:none">
                <em><br />De bijles</em>
                <div class="paragraph">                   
                   
                        
<?php

// Connect to the database
$db = new ConnectorClass;

$GLOBALS['db'] -> Query = 
"SELECT * FROM webdb13BG2.course_id";

$GLOBALS['vakkenArray'] = $GLOBALS['db'] -> Querying();

foreach ($GLOBALS['vakkenArray'] as $vakRow)
{
	$tmp_name = $vakRow['course_name'];
	$tmp_id = $vakRow['course_id'];
	
	echo '
		<div class="mainHolder">
			<input type="checkbox" value="'. $tmp_id .'" id="'. $tmp_id .'" name="bijlesvak['. $tmp_id .']" onclick="setViewState('. $tmp_id .');"/>
			<label for="'. $tmp_id .'">'. $tmp_name .'</label>
			
			<select id="select'. $tmp_id .'" name="bijlesniveau['. $tmp_id .']" style="display:none">
				<option value="1">Basic</option>
				<option value="2">Basisschool</option>
				<option value="3">PRO</option>
				<option value="4">VMBO-BBL</option>
				<option value="5">VMBO-KBL</option>
				<option value="6">VMBO-GL</option>
				<option value="7">VMBO-T</option>
				<option value="8">HAVO-Onderbouw</option>
				<option value="9">HAVO-Bovenbouw</option>
				<option value="10">VWO-Onderbouw</option>
				<option value="11">VWO-Bovenbouw</option>
			</select>
		</div>
	';
}								
?>
<script language="javascript" type="text/javascript">
function setViewState(sender_id)
{
	if(document.getElementById(sender_id))
	{
		if(document.getElementById(sender_id).checked == 1)
		{
			document.getElementById("select" + sender_id).style.display="block";
		}
		else
		{
			document.getElementById("select" + sender_id).style.display="none";
		}
	}
}
</script>


				</div>
    		</div>
                    <div class="field"><br /><br />Heb je ervaring met bijles geven?</div>
                    <div class="field">
                        <textarea name="ervaring" style="width:419px; height:200px; vertical-align:text-top;" placeholder="Mijn ervaring..."></textarea>
                    </div>
                </div>
            </div>
            <div class="paragraph">
                <div class="field">
                    <input type="submit" value="Registreer" style="background-color:orange;" name="submit" />
                </div>
                <div class="field">
                    <a href="http://validator.w3.org/check?uri=referer">
                        <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
                    </a>
                </div>
            </div>
        </div>
    </form>
    
    </div>
    	
    
    <?php
        // Connect to the database
        $db = new ConnectorClass;

        // Initializing variables and secure that they are not mysql-injections or include tags
        //"Profiel: user_data"
            //Username Password
            if (isset($_POST['username']))
            {
                $username = strip_tags(mysql_real_escape_string($_POST['username']));
            }
            //else $username="";
            if (isset($_POST['password']))
            {
                $password = $_POST['password'];
                $SHApassword = sha1($password);
                $PwSaltArray = createPasswordSalt( $SHApassword );
                $DBpassword = $PwSaltArray[0];
                $DBsalt = $PwSaltArray[1];	                    
            }
            if (isset($_POST['user_type']))
            {
                $user_type=$_POST['user_type'];
            }
        
        	//"User_personal_data"
            //"Over jou"
            if (isset($_POST['firstname']))
            {
                $first_name = strip_tags(mysql_real_escape_string($_POST['firstname']));
            }
            else $first_name="";
            if (isset($_POST['middlename']))
            {
                $middle_name = strip_tags(mysql_real_escape_string($_POST['middlename']));
            }
            else $middle_name=null;
            if (isset($_POST['lastname']))
            {
                $last_name = strip_tags(mysql_real_escape_string($_POST['lastname']));
            }
            else $last_name="";
            if (isset($_POST['date_of_birth']))
            {
                $date_of_birth = strip_tags(mysql_real_escape_string($_POST['date_of_birth']));
            }
            else $date_of_birth=""; 
            if (isset($_POST['gender']))
            {
                $gender=$_POST['gender'];
            }
            // About me
            if (isset($_POST['ervaring']))
            {
                $about_me = strip_tags(mysql_real_escape_string($_POST['ervaring']));
            } else $about_me = "Nog geen tekst ingevuld";
            //"Contactgegevens"
            if (isset($_POST['emailadress']))
            {
                $emailadress = strip_tags(mysql_real_escape_string($_POST['emailadress']));
            }
            else $emailadress="";
            if (isset($_POST['phone_1']))
            {
                $phone_1 = strip_tags(mysql_real_escape_string($_POST['phone_1']));
            }
            else $phone_1=null;
            if (isset($_POST['phone_2']))
            {
                $phone_2 = strip_tags(mysql_real_escape_string($_POST['phone_2']));
            }
            else $phone_2=null;

            //"Adres: adress_data"
            if (isset($_POST['street']))
            {
                $street = strip_tags(mysql_real_escape_string($_POST['street']));
            }
            else $street="";
            if (isset($_POST['streetnumber']))
            {
                $streetnumber = strip_tags(mysql_real_escape_string($_POST['streetnumber']));
            }
            else $streetnumber="";
            if (isset($_POST['postal']))
            {
                $postal = strip_tags(mysql_real_escape_string($_POST['postal']));
            }
            else $postal="";
            if (isset($_POST['postal_extra']))
            {
                $postal_extra = strip_tags(mysql_real_escape_string($_POST['postal_extra']));
            }
            else $postal_extra="";
            if (isset($_POST['city']))
            {
                $city = strip_tags(mysql_real_escape_string($_POST['city']));
            }
            else $city="";
        
        $courseTest = array();
            
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit']) && isset($_POST['user_type']))
        {
            if($_POST['user_type']==1)
            {
                $GLOBALS['courseTest'] = $_POST['bijlesvak'];
                if(empty($courseTest))
                {
                    echo("Je hebt geen vak gekozen. ");
                }
                else
                {
                    //Connecting to the database and querying
                    makeQuery();
                    makeVakkenQuery();
                    //disconnectGoodbye();
                }
            } else {
                //Connecting to the database and querying
                disconnectGoodbye();
            }
        }
    
        // Making query
        function makeQuery()
        {
            //user_id wordt geinitialiseerd via user_data
            $GLOBALS['db'] -> Query = 
            "INSERT INTO webdb13BG2.user_data(username, password, user_type, salt) 
            VALUES ('".$GLOBALS['username']."', '".$GLOBALS['DBpassword']."', '".$GLOBALS['user_type']."', '".$GLOBALS['DBsalt']."');
            ";
            // Dit wordt een "Undefined Offset" genoemd, weet niet of dat erg is
            $GLOBALS['db'] -> Querying();
        
            // Resetting db's variables
            $GLOBALS['db'] -> Query = null;
            $GLOBALS['db'] -> QueryResult = null;

            //de geinitialiseerde user_id wordt opgehaald en opgeslagen in een variabele
            $GLOBALS['db'] -> Query =     
                "
                SELECT user_id FROM webdb13BG2.user_data WHERE username='".$GLOBALS['username']."';
                ";

            $currentUserArray = $GLOBALS['db'] -> Querying();
            $GLOBALS['user_id'] = $currentUserArray[1][0];
                            
            // Resetting db's variables
            $GLOBALS['db'] -> Query = null;
            $GLOBALS['db'] -> QueryResult = null;
            
            //de user_personal_data wordt toegevoegd
            $GLOBALS['db'] -> Query =     
                "
                INSERT INTO webdb13BG2.user_personal_data (first_name, middle_name, last_name, date_of_birth, gender, emailadress, phone_1, phone_2,about_me, user_id) 
                VALUES ('".$GLOBALS['first_name']."', '".$GLOBALS['middle_name']."', '".$GLOBALS['last_name']."', '".$GLOBALS['date_of_birth']."', ".$GLOBALS['gender'].", 
                '".$GLOBALS['emailadress']."', '".$GLOBALS['phone_1']."', '".$GLOBALS['phone_2']."', '".$GLOBALS['about_me']."', '".$GLOBALS['user_id']."');
                ";
            $GLOBALS['db'] -> Querying();
                                            
            // Resetting db's variables
            $GLOBALS['db'] -> Query = null;
            $GLOBALS['db'] -> QueryResult = null;
            
            //de adress_data van de user wordt toegevoegd
            $GLOBALS['db'] -> Query =   
                "
                INSERT INTO webdb13BG2.adress_data (user_id, city, street, streetnumber, postal, postal_extra) 
                VALUES ('".$GLOBALS['user_id']."', '".$GLOBALS['city']."', '".$GLOBALS['street']."', '".$GLOBALS['streetnumber']."', '".$GLOBALS['postal']."', '".$GLOBALS['postal_extra']."');
                ";
            $GLOBALS['db'] -> Querying();      
        }
        
        function disconnectGoodbye()
        {
            //Disconnect from the database
            $GLOBALS['db'] -> Disconnect(); 
            if (false) /*Hier komt iets over wanneer een formulier fout is*/
            {
                // function that displays that there are no results for the query
                echo 
                '
                <div class="page-field"> 
                    Er is iets misgegaan met het invullen van je registratieformulier. Probeer opnieuw!
                </div>
                ';
            }
            else
            {
                echo
                '
                <div class="page-field">
                    Bedankt voor het invullen!
                </div>
                ';
            }
        }
               
        function makeVakkenQuery()
        {
			foreach($_POST['bijlesvak'] as $key => $value)
			{
				// Voor ieder vak haal niveau op
				$vakNiveau = $_POST['bijlesniveau'][$key];
				$vakCode = $key * 100 + $vakNiveau;
				$userID = intval($GLOBALS['user_id']);
				
				echo ("To DB:" + $vakCode + "<br />");
				
				$GLOBALS['db'] -> Query =
				"
				INSERT INTO webdb13BG2.course_user (course_code, user_id) 
				VALUES (".$vakCode.", ".$userID.");
				";
				$GLOBALS['db'] -> Querying();			
				$GLOBALS['db'] -> Query = null;
				$GLOBALS['db'] -> QueryResult = null;
			}
        }

    ?>
</div>