<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>webdb13BG2</title>
		<!-- stylesheetreference -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<style type="text/css">
		.content .ques {
            min-width: 155px;
            float: left;
            height: 30px;
            line-height: 30px;
        }
        
        .content .ans {
            min-width: 1px;
            float: left;
            height: 30px;
            line-height: 30px;
        }
        
        .content .paragraph {
            margin-left: 8px;
            margin-top: 8px;
            margin-bottom: 8px;
            <!-- de margin-bottom werkt niet waardoor er nog <br> nodig zijn :(-->
        }
        
        .content .field .ans input[type="text"] {
            width: 155px;
            display: block;
        }
        /* Ik weet niet wat er mis is met deze code (hij werkt alleen in chrome en niet in firefox :( 
            maar hiermee zouden we de breedte voor de velden kunnen veranderen */
        
        </style>
        
        <script type="text/javascript">
            //<![CDATA[
            //klasse "verplichtevelden", stelt de verplichte velden op een formulier voor.
            //Er is 1 methode: check
            //Deze geeft een waarschuwing als er een verplicht veld leeg is
     /*
            function verplichtevelden(veldenArray) {
                //constructor van de klasse
                this.veldenArray = veldenArray; //alleen de verplichte velden
                this.check = verplichtevelden_check; 
            }
            function verplichtevelden_check() {
                //controleer de verplichte velden
                var foutlijst="";
                for (var i=0; i<this.veldenArray.length; i++) {
                    if (document.getElementById(this.veldenArray[i]).value=="") {
                        foutlijst += this.veldenArray[i]+", ";
                    }
                }
                if (foutlijst=="") {
                    return true;
                }
                else {
                    window.alert('Verplichte veld(en) niet ingevuld: '+foutlijst+' probeer het nog een keer.');
                    return false;
                }
            }
            //het formulier initialiseren
            function bijLaden() {
                var verplicht=new Array('username');				 
                mijnVV = new verplichtevelden(verplicht); //mijnVV moet globaal zijn, dus geen var ervoor.
            }
	 */
            //]]>
        </script>
	</head>

	<body onload="bijLaden();">
		<div class="header">
		    <div class="center">
        		<div class="left"><a href="index.html" class="left">Openbijles</a></div>
           		<div class="middle"></div>
           		<div class="right">
            		<div class="label">Voor leden geef je gegevens en log in</div>
               		<div class="login"><input placeholder="Gebruikersnaam" /> <input placeholder="Wachtwoord" /><button type="submit">Login</button></div>
                </div>
        	</div>
		</div>
		<div class="content">
            <div class="page-intro">
                <?php 
                    print "Welkom op het registratieformulier. Wil je je aanmelden als bijlesgever of wil je graag bijles ontvangen? Vul hieronder het formulier in!";
                ?>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="page-field">
                    <em>Profiel</em>
                    <div class="paragraph">
                        <div class="field">
                           <div class="ques">Gebruikersnaam:</div>
                           <div class="ans"><input type="text" name="username" id="username" /></div>
                        </div>
                        <div class="field">
                            <div class="ques">Wachtwoord:</div>
                            <div class="ans"><input type="password" name="password" style="width:155px;" /></div>
                        </div>
                   </div>
                   <em><br />Hamvraag</em>  
                   <div class="paragraph">
                        <div class="field">
                           Wil je bijles geven of een profiel aanmaken?
                        </div>
                        <div class="field">
                            <div class="ques"><input type="radio" name="user_type" value="2" />Ik zoek bijles</div>
                            <div class="ques"><input type="radio" name="user_type" value="1" />Ik wil graag bijles geven!</div>
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
                    <em><br />De bijles</em>
                    <div class="paragraph">
                        <div class="field">
                            In welk vak wil je bijles geven?
                        </div>
                        <label class="ques"><input type="checkbox" value="1" name="bijlesvak[]" />Aardrijkskunde</label>
                        <label class="ques"><input type="checkbox" value="2" name="bijlesvak[]" />Biologie</label>
                        <label class="ques"><input type="checkbox" value="3" name="bijlesvak[]" /> Scheikunde</label>
                        <label class="ques"><input type="checkbox" value="4" name="bijlesvak[]" />Engels</label>
                        <label class="ques"><input type="checkbox" value="5" name="bijlesvak[]" />Nederlands</label>
                        <label class="ques"><input type="checkbox" value="6" name="bijlesvak[]" />Wiskunde A</label>
                        <label class="ques"><input type="checkbox" value="7" name="bijlesvak[]" />Wiskunde B</label>
                        <label class="ques"><input type="checkbox" value="8" name="bijlesvak[]" />Wiskunde C</label>
                        <label class="ques"><input type="checkbox" value="9" name="bijlesvak[]" />Wiskunde D</label>
                        <label class="ques"><input type="checkbox" value="10" name="bijlesvak[]" />Frans</label>
                        <label class="ques"><input type="checkbox" value="11" name="bijlesvak[]" />Duits</label>
                        <label class="ques"><input type="checkbox" value="12" name="bijlesvak[]" />Economie</label>
                        <label class="ques"><input type="checkbox" value="13" name="bijlesvak[]" />Latijn</label>
                        <label class="ques"><input type="checkbox" value="14" name="bijlesvak[]" />Grieks</label>                            
                        <label class="ques" title="Management &amp; Organisatie"><input type="checkbox" value="15" name="bijlesvak[]" />M &amp; O</label>
                        <label class="ques" title="Maatschappijleer"><input type="checkbox" value="16" name="bijlesvak[]" />MaL</label>
                        <label class="ques"><input type="checkbox" value="17" name="bijlesvak[]" /> Muziek</label>
                        <label class="ques"><input type="checkbox" value="18" name="bijlesvak[]" />Natuurkunde</label>
                        <label class="ques" title="Algemene Natuurwetenschappen"><input type="checkbox" value="19" name="bijlesvak[]" />ANW</label>
                        <label class="ques"><input type="checkbox" value="20" name="bijlesvak[]" />Fries</label>
                        <label class="ques"><input type="checkbox" value="21" name="bijlesvak[]" />Spaans</label>
                        <label class="ques"><input type="checkbox" value="22" name="bijlesvak[]" />Italiaans</label>
                        <label class="ques"><input type="checkbox" value="23" name="bijlesvak[]" />Russisch</label>
                        <label class="ques"><input type="checkbox" value="24" name="bijlesvak[]" />Turks</label>
                        <label class="ques"><input type="checkbox" value="25" name="bijlesvak[]" />Arabisch</label>
                        <label class="ques" title="Natuur, Leven &amp; Techniek"><input type="checkbox" value="26" name="bijlesvak[]" />N, L &amp; T</label >
                        <label class="ques" title="Awesome!"><input type="checkbox" value="27" name="bijlesvak[]" />Informatica</label>
                        <label class="ques"><input type="checkbox" value="28" name="bijlesvak[]" />Geschiedenis</label>
                        <label class="ques" title="Maatschappijwetenschappen"><input type="checkbox" value="29" name="bijlesvak[]" />MaW</label>
                        <label class="ques"><input type="checkbox" value="30" name="bijlesvak[]" />Filosofie</label>
                        <label class="ques"><input type="checkbox" value="31" name="bijlesvak[]" />Kunst Alg.</label>
                        <label class="ques" title="Culturele Kunstzinnige Vorming"><input type="checkbox" value="32" name="bijlesvak[]" />CKV</label >
                        <div class="field">Heb je ervaring met bijles geven?</div>
                        <div class="field">
                            <textarea name="ervaring" style="width:419px; height:200px; vertical-align:text-top;" placeholder="Mijn ervaring..."></textarea>
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
            
            <?php
                // Connect to the database
                include 'shielded/connector.php';
                include 'shielded/login.php';
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
                
                /*Bijlesvoorkeur          
                $courseTest = $_POST['bijlesvak'];
                if(empty($courseTest))
                {
                    echo("Je hebt geen vak gekozen. ");
                }
                else
                {
                    $N = count($courseTest);
                    echo("Je hebt $N vakken gekozen ");
                    for($i=0; $i < $N; $i++)
                    {
                        echo($courseTest[$i] . " ");
                    }
                }
                */
                $courseTest = array();
                    
        	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit']) && isset($_POST['user_type']))
        	{
        	    $GLOBALS['courseTest'] = $_POST['bijlesvak'];
                if(empty($courseTest))
                {
                    echo("Je hebt geen vak gekozen. ");
                }
                else
                {
        		    makeQuery();
        	    }
			}
			
            // Making query
            /*salt nog toevoegen aan INSERT INTO*/
            function makeQuery()
            {
                //user_id wordt geinitialiseerd via user_data
                $GLOBALS['db'] -> Query = 
                "INSERT INTO webdb13BG2.user_data(username, password, user_type, salt) 
                VALUES ('".$GLOBALS['username']."', '".$GLOBALS['DBpassword']."', ".$GLOBALS['user_type'].", '".$GLOBALS['DBsalt']."');
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
                    '".$GLOBALS['emailadress']."', '".$GLOBALS['phone_1']."', '".$GLOBALS['phone_2']."', '".$GLOBALS['about_me']."', ".$GLOBALS['user_id'].");
                    ";
                $GLOBALS['db'] -> Querying();
                            	                
                // Resetting db's variables
                $GLOBALS['db'] -> Query = null;
                $GLOBALS['db'] -> QueryResult = null;
                
                //de adress_data van de user wordt toegevoegd
                $GLOBALS['db'] -> Query =   
                    "
                    INSERT INTO webdb13BG2.adress_data (user_id, city, street, streetnumber, postal, postal_extra) 
                    VALUES (".$GLOBALS['user_id'].", '".$GLOBALS['city']."', '".$GLOBALS['street']."', '".$GLOBALS['streetnumber']."', ".$GLOBALS['postal'].", '".$GLOBALS['postal_extra']."');
                    ";
                $GLOBALS['db'] -> Querying();
                
                // Bijlesvoorkeur wordt doorgegeven
                $GLOBALS['db'] -> Query = null;
                $GLOBALS['db'] -> QueryResult = null;
                
                /*$GLOBALS['db'] -> Query =   
                    "
                    INSERT INTO webdb13BG2.course_user (course_code, user_id) 
                    VALUES (".$GLOBALS['course_code[0]'].", ".$GLOBALS['user_id'].");
                    ";
                $GLOBALS['db'] -> Querying();
                */
                $N = count($GLOBALS['courseTest']);
                echo("Je hebt $N vakken gekozen ");
                for($i=0; $i < $N; $i++)
                {
                    echo($GLOBALS['courseTest[$i]'] . " ");
                }       
                /*
                    if (isset($_POST['bijlesvak']))
                    {
                        
                        $course_array = array_fill_keys($keys, $_POST['bijlesvak']);
                        $size = sizeof($course_array);
                        echo "Vlak voor de for-loop";
                        global $course_code;
                        for($i=0; $i < $size; $i++)
                        {
                            echo "Hallo ik ben in de for-loop";
                            $course_code[$i] = $course_array[$i];
                            //= (($course_array[$i]*100) + 11);
                            echo $course_code[$i];
                        }
                        echo "Ja: ";
                        echo $course_code[0];
                        //$newarray = implode(", ", $myarray);
                    }
                */
                
                //Disconnect from the database
                $GLOBALS['db'] -> Disconnect();
                
            }
                
                if (false) /*Hier komt iets over wanneer een formulier fout is*/
                {
	                wrongEntry();
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

                // function that displays that there are no results for the query
                function wrongEntry() 
                {
	                echo 
	                '
	                <div class="page-field"> 
		                Er is iets misgegaan met het invullen van je registratieformulier. Probeer opnieuw!
	                </div>
	                ';
                }
            ?>
	    </div>
	    
	    <div class="footer">
	        <div class="centerwrapper">
                <a href="index.php">Terug</a>
                <a href="about.php">Wie zijn wij?</a>
                <a href="advertenties.php">Bekijk andere bijlesgevers!</a>
            </div>
		</div>	
        <div class="bottom"></div>	     
    </body>
</html>
