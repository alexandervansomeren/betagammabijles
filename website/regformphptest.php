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
        <!--Ik weet niet wat er mis is met deze code (hij werkt alleen in chrome en niet in firefox :( maar hiermee zouden we de breedte voor de velden kunnen veranderen-->
        
        </style>
	</head>

	<body>
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
                    <em>Over jou</em>
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
                            <div class="ques">Geboortedatum:</div>
                            <div class="ans"> <input type="text" name="date_of_birth" placeholder="Bijv. 01-01-2000" /></div>
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
                            <div class="ans"><input type="text" name="postal" placeholder="Bijv. 1234" style="width:50px;" /></div>
                            <div class="ans"><input type="text" name="postal_extra" placeholder="AB" style="width:22px;" /></div>  
                        </div>
                        <div class="field"> 
                            <div class="ques">Woonplaats:</div>
                            <div class="ans"><input type="text" name="city" /></div>
                        </div>
                    </div>
                    <em><br />Profiel</em>
                    <div class="paragraph">
                        <div class="field">
                           <div class="ques">Gebruikersnaam:</div>
                           <div class="ans"><input type="text" name="username" /></div>
                        </div>
                        <div class="field">
                            <div class="ques">Wachtwoord:</div>
                            <div class="ans"><input type="password" name="password" style="width:155px;" /></div>
                        </div>
                        <div class="field">
                            <div class="ques">Selecteer geslacht:</div>
                            <div class="ans"><input type="radio" name="gender" value="1" />Man</div>
                            <div class="ans"><input type="radio" name="gender" value="0" />Vrouw</div>
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
                    <em><br />De bijles</em>
                    <div class="paragraph">
                        <div class="field">
                            In welk vak wil je bijles geven?
                        </div>
                        <label class="ques"><input type="checkbox" value="Aardrijkskunde" name="bijlesvak[]" />Aardrijkskunde</label>
                        <label class="ques"><input type="checkbox" value="Biologie" name="bijlesvak[]" />Biologie</label>
                        <label class="ques"><input type="checkbox" value="Scheikunde" name="bijlesvak[]" /> Scheikunde</label>
                        <label class="ques"><input type="checkbox" value="Engels" name="bijlesvak[]" />Engels</label>
                        <label class="ques"><input type="checkbox" value="Nederlands" name="bijlesvak[]" />Nederlands</label>
                        <label class="ques"><input type="checkbox" value="Wiskunde A" name="bijlesvak[]" />Wiskunde A</label>
                        <label class="ques"><input type="checkbox" value="Wiskunde B" name="bijlesvak[]" />Wiskunde B</label>
                        <label class="ques"><input type="checkbox" value="Wiskunde C" name="bijlesvak[]" />Wiskunde C</label>
                        <label class="ques"><input type="checkbox" value="Wiskunde D" name="bijlesvak[]" />Wiskunde D</label>
                        <label class="ques"><input type="checkbox" value="Frans" name="bijlesvak[]" />Frans</label>
                        <label class="ques"><input type="checkbox" value="Duits" name="bijlesvak[]" />Duits</label>
                        <label class="ques"><input type="checkbox" value="Economie" name="bijlesvak[]" />Economie</label>
                        <label class="ques"><input type="checkbox" value="Latijn" name="bijlesvak[]" />Latijn</label>
                        <label class="ques"><input type="checkbox" value="Grieks" name="bijlesvak[]" />Grieks</label>                            
                        <label class="ques" title="Management &amp; Organisatie"><input type="checkbox" value="Management &amp; Organisatie" name="bijlesvak[]" />M &amp; O</label>
                        <label class="ques" title="Maatschappijleer"><input type="checkbox" value="Maatschappijleer" name="bijlesvak[]" />MaL</label>
                        <label class="ques"><input type="checkbox" value="Muziek" name="bijlesvak[]" /> Muziek</label>
                        <label class="ques"><input type="checkbox" value="Natuurkunde" name="bijlesvak[]" />Natuurkunde</label>
                        <label class="ques" title="Algemene Natuurwetenschappen"><input type="checkbox" value="ANW" name="bijlesvak[]" />ANW</label>
                        <label class="ques"><input type="checkbox" value="Fries" name="bijlesvak[]" />Fries</label>
                        <label class="ques"><input type="checkbox" value="Spaans" name="bijlesvak[]" />Spaans</label>
                        <label class="ques"><input type="checkbox" value="Italiaans" name="bijlesvak[]" />Italiaans</label>
                        <label class="ques"><input type="checkbox" value="Russisch" name="bijlesvak[]" />Russisch</label>
                        <label class="ques"><input type="checkbox" value="Turks" name="bijlesvak[]" />Turks</label>
                        <label class="ques"><input type="checkbox" value="Arabisch" name="bijlesvak[]" />Arabisch</label>
                        <label class="ques" title="Natuur, Leven &amp; Techniek"><input type="checkbox" value="Natuur, leven &amp; techniek" name="bijlesvak[]" />N, L &amp; T</label >
                        <label class="ques" title="Awesome!"><input type="checkbox" value="Informatica" name="bijlesvak[]" />Informatica</label>
                        <label class="ques"><input type="checkbox" value="Geschiedenis" name="bijlesvak[]" />Geschiedenis</label>
                        <label class="ques" title="Maatschappijwetenschappen"><input type="checkbox" value="Maatschappijwetenschappen" name="bijlesvak[]" />MaW</label>
                        <label class="ques"><input type="checkbox" value="Filosofie" name="bijlesvak[]" />Filosofie</label>
                        <label class="ques"><input type="checkbox" value="Kunst Algemeen" name="bijlesvak[]" />Kunst Alg.</label>
                        <label class="ques" title="Culturele Kunstzinnige Vorming"><input type="checkbox" value="CKV" name="bijlesvak[]" />CKV</label >
                        <div class="field">Heb je ervaring met bijles geven?</div>
                        <div class="field">
                            <textarea name="ervaring" style="width:419px; height:200px; vertical-align:text-top;" placeholder="Mijn ervaring..."></textarea>
                        </div>
                    </div>
                    <div class="paragraph">
                        <div class="field">
                            <input type="submit" value="Registreer" style="background-color:orange;" />
                            <?php
                                if(!(empty($_POST["firstname"])))
                                {
                                    print "Hier komt submit code";
                                }
                            ?>
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
                $db = new ConnectorClass;

                // Initializing variables and secure that they are not mysql-injections
                // "Over jou"
                    // "naam en leeftijd"
                    if (isset($_POST['firstname']))
                    {
	                    $fname = mysql_real_escape_string($_POST['firstname']);
                    }
                    else $fname="";
                    if (isset($_POST['middlename']))
                    {
	                    $mname = mysql_real_escape_string($_POST['middlename']);
                    }
                    else $mname="";
                    if (isset($_POST['lastname']))
                    {
	                    $lname = mysql_real_escape_string($_POST['lastname']);
                    }
                    else $lname="";
                    if (isset($_POST['date_of_birth']))
                    {
	                    $dob = mysql_real_escape_string($_POST['date_of_birth']);
                    }
                    else $dob=""; 
                    
                    //"contactgegevens"
                    if (isset($_POST['emailadress']))
                    {
	                    $email = mysql_real_escape_string($_POST['emailadress']);
                    }
                    else $email="";
                    if (isset($_POST['phone_1']))
                    {
	                    $p1 = mysql_real_escape_string($_POST['phone_1']);
                    }
                    else $p1="";
                    if (isset($_POST['phone_2']))
                    {
	                    $p2 = mysql_real_escape_string($_POST['phone_2']);
                    }
                    else $p2="";

                    //"adres"
                    if (isset($_POST['street']))
                    {
	                    $street = mysql_real_escape_string($_POST['street']);
                    }
                    else $street="";
                    if (isset($_POST['streetnumber']))
                    {
	                    $streetnumber = mysql_real_escape_string($_POST['streetnumber']);
                    }
                    else $streetnumber="";
                    if (isset($_POST['postal']))
                    {
	                    $postal = mysql_real_escape_string($_POST['postal']);
                    }
                    else $postal="";
                    if (isset($_POST['postal_extra']))
                    {
	                    $postal2 = mysql_real_escape_string($_POST['postal_extra']);
                    }
                    else $postal2="";
                    if (isset($_POST['city']))
                    {
	                    $city = mysql_real_escape_string($_POST['city']);
                    }
                    else $city="";
                    
                //"Profiel"
                    //Username Password
                    if (isset($_POST['username']))
                    {
	                    $username = mysql_real_escape_string($_POST['username']);
	                    echo "ik ben hier gekomen";
                    }
                    else $username="";
                        echo "er is een probleempje";
                    if (isset($_POST['password']))
                    {
	                    $password = mysql_real_escape_string($_POST['password']);
                    }
                    else $password="";
                    // User type MOET NOG WORDEN BEHANDELD
                    $user_type = 1;
    
                    //Gender
                    if (isset($_POST['gender']))
                    {
                        $male="1";
                    }
                    else $male="0";
                    if (isset($_POST['gender']))
                    {
                        $female="1";
                    }
                    else $female="0";
                    //Dit genderstuk klopt sowieso niet

                    $queryResultsArray = makeQuery();

                // Making query
                function makeQuery()
                {
                    // Once you have a valid DB object named $db...
                    //$alldata = array($GLOBALS['username'], $GLOBALS['password'], $GLOBALS['user_type']);
                    //$sth = $db->prepare('INSERT INTO userdata  (username, password, user_type) VALUES (?, ?, ?)');
                    //$db->executeMultiple($sth, $alldata);

	                $GLOBALS['db'] -> Query = 
	                "   INSERT INTO webdb13BG2.user_data(username, password, user_type) 
						VALUES (".$GLOBALS['username'].", ".$GLOBALS['password'].", ".$GLOBALS['user_type'].");
						SELECT user_id FROM webdb13BG2.user_data WHERE username=".$GLOBALS['username'].";";
					echo $GLOBALS['db'] -> Query;
					echo ',<br>';	
					$currentUserArray = $GLOBALS['db'] -> Querying();
					$currentUserId = $currentUserArray[1][0];
	                
					
					// Resetting db's variables
					$GLOBALS['db'] -> Query = null;
					$GLOBALS['db'] -> QueryResult = null;
					
					$GLOBALS['db'] -> Query =     
						"
	                    INSERT INTO user_personal_data (firstname, middlename, lastname, date_of_birth, gender, emailadress, phone_1, phone_2,about_me, user_id) 
						VALUES (".$GLOBALS['firstname'].", ".$GLOBALS['middlename'].", ".$GLOBALS['lastname'].", ".$GLOBALS['date_of_birth'].", ".$GLOBALS['gender'].", 
						".$GLOBALS['emailadress'].", ".$GLOBALS['phone_1'].", ".$GLOBALS['phone_2'].", ".$GLOBALS['about_me'].", ".$GLOBALS['u_i'].");
	                    INSERT INTO adress_data (city, street, streetnumber, postal, postal_extra) 
						VALUES (".$GLOBALS['city'].", ".$GLOBALS['street'].", ".$GLOBALS['streetnumber'].", ".$GLOBALS['postal'].", ".$GLOBALS['postal_extra'].");
	                	";
	                //dit klopt nog niet helemaal

                    $queryResultsArray = $GLOBALS['db'] -> Querying();
                    
					
					// Disconnect from the database
                	$GLOBALS['db'] -> Disconnect();
					return $queryResultsArray;
                }

                echo('<pre>');
                print_r( $queryResultsArray );
                echo('</pre>');

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
