<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>webdb13BG2</title>

<!-- Link van wat ik een mooi inlog ding vind: http://www.freebiesgallery.com/login-page-design-psd-template/ -->

<!-- A google font to use on the webpage -->
<link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="style.css" />

<style type="text/css">
.content .page-intro .test
{
	height:50px;
}
.selection
{
	margin-top:10px;
}
.selection .part
{
	margin-left:25px;
	float:left;
	margin-top:10px;
	height:30px;
	width:190px;
}
.selection .part .text
{
	float:left;		
}
.selection .selectpart
{
	margin-left:25px;
	float:left;
	margin-top:10px;
	height:30px;
	width:200px;	
}
.selection .part .inputfield
{
	border-radius:6px;
	border-color:transparent;	background-color:#FFF;
	color:#000;	
	border-left-color:#CCC;
	border-top-color:#CCC;
	height:20px;
	width:120px;
	float:left;
	margin-left:10px;
}
.selection .selectpart .selectiondrop
{
	float:left;	
	background:yellow;
}
.visitcardsframe /* wordt nu niet gebruikt */
{
		
	border: 5px solid orange;
	border-radius:1px;
	width:890px;
	background-color:orange;
}
.card .frame
{
	background-color:white;
	border:1px solid black;
	border-radius:5px;
	height:200px;
	width:400px;
	margin-top:30px;
	margin-left:30px;
	float:left;
}
.card .frame .photoframe
{
	width:150px;
	height:200px;
	float:left;
	background:green;
}
.card .frame .infoframe
{
	float:left;
	width:250px;
	height:inherit;
	font-size:20px;
}
.card .frame .infoframe:hover
{
	background-image:url(img/card-backgroundSmall.png);
}
.card .frame .infoframe .attributes
{
	width:230px;
	margin-top:auto;
	magrin-bottom:auto;
	margin-left:10px;
}
.card .frame .infoframe .name h1
{
	font-size:18px;
	margin-top:10px;
	height:46px;
	margin-left:10px;
	margin-bottom:10px;
}
.card .frame .infoframe .attributes h1
{
	font-size:16px;
	margin-top:5px;
	margin-bottom:2px;
}
.card .frame .infoframe .attributes p
{
	font-size:14px;
	margin-top:0px;
	margin-bottom:0px;
}
.prevnexbuttons
{
	float:left;
	width:890px;
	margin-top:30px;
	margin-bottom:30px;
}
.prevnexbuttonsCenter
{
	width:250px;
	background-color:#0FF;	
	margin-left:auto;
	margin-right:auto;	
}
.nextbutton
{
	float:right;
	width:80px;
	border-right:3px solid white;
	border-left:2px solid white;	
	text-align:center;
}
.nextbutton:hover
{
	background-color:#FC6;	
}
.previousbutton
{
	float:left;	
	width:80px;
	border-left:3px solid white;
	border-right:2px solid white;
	text-align:center;
}
.previousbutton:hover
{
	background-color:#FC6;	
}
/* Opmaak voor CONTENT eindigt hier */

</style>

</head>

<body>

    <div class="header">
	    <div class="center">
        	<div class="left"> <a href=/index.html" class="left"> Waarbijles </a> </div>
            <div class="middle"></div>
            <div class="right">
                <div class="label">Voor leden geef je gegevens en log in</div>
                <div class="login"><input placeholder="Gebruikersnaam" /> <input placeholder="Wachtwoord"/><button type="submit">Login</button></div>
            </div>
        </div>
    </div>

    <div class="content">
	    <div class="page-intro">
        	<form class="selection" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="part">
                        <div class="text"> Vak: </div>
                        <input class="inputfield" type="text" name="course" placeholder="bijv. Natuurkunde"/>
                    </div>
                    <div class="part">
                        <div class="text"> Stad: </div>
                        <input class="inputfield" type="text" name="city" placeholder="bijv. Amsterdam"/>
                    </div>
                    <div class="part">
                        <div class="text"> Niveau: </div>
                        <input class="inputfield" type="text" name="level"placeholder="bijv. havo"/>
                    </div>
                    <div class="selectpart" style="width:140px"> 
                        <label class="ques">Man <input type="checkbox" name="male", checked="checked">	</label>
                        <label class="ques">Vrouw <input type="checkbox" name="female", checked="checked">	</label>
                    </div> 
                    <input class="text" type="submit" value="submit"/>
            </form>
        </div>
    <?php
	
	// Connect to the database
	include 'shielded/connector.php';
	$db = new ConnectorClass;
	
	// Initializing variables and secure that they are not mysql-injections
	if (isset($_GET['course']))
	{
		$course = mysql_real_escape_string($_GET['course']);
	}
	else $course="";
	if (isset($_GET['city']))
	{
		$city = mysql_real_escape_string($_GET['city']);
	}
	else $city="";
	if (isset($_GET['level']))
	{
		$level = mysql_real_escape_string($_GET['level']);
	}
	else $level="";
	//
	if (isset($_GET['male']))
	{
		$male="1";
	}
	else $male="0";
	if (isset($_GET['female']))
	{
		$female="0";
	}
	else $female="0";
	
	
	if ($male="1" && $female="1")
	{
		$genderQuery = "";
	}
	else if ($male="1")
	{
		$genderQuery = "AND up.gender=1";
	}
	else if ($female="1")
	{
		$genderQuery = "AND up.gender=0";
	}
	else
	{
		showNoResults();
	}
	
	echo '<br> '.$genderQuery .' <br>';
	
	// Making query
	$db -> Query = 
	"
		SELECT DISTINCT
		ad.user_id AS user_id
		
		FROM webdb13BG2.adress_data ad 
		INNER JOIN webdb13BG2.course_user cu ON cu.user_id = ad.user_id 
		INNER JOIN webdb13BG2.course_code cc ON cc.course_code = cu.course_code 
		INNER JOIN webdb13BG2.course_id ci ON cc.course_id = ci.course_id 
		INNER JOIN webdb13BG2.course_difficulty cd ON cd.difficulty_id = cc.course_difficulty
		INNER JOIN webdb13BG2.user_personal_data up ON up.user_id = ad.user_id 
		
		WHERE ci.course_name LIKE '%". $course ."%' 
		AND 
		ad.city LIKE '%". $city ."%' 
		AND 
		cd.difficulty_name LIKE '%". $level ."%'
		/*". $genderQuery ."*/;
		";
	echo $db -> Query, "<br>";
	
	$queryResultsArray = $db -> Querying();
	
	echo('<pre>');
	print_r( $queryResultsArray );
	echo('</pre>');
	
	echo "Aantal resultaten: ", sizeOf( $queryResultsArray );
	
	// Disconnect from the database
	$db -> Disconnect();
	echo "Disconnected";
	
	// function that displays that there are no results for the query
	function showNoResults() 
	{
		echo 
		'
		<div class="page-field"> 
			<h1> Uw zoekopdracht heeft geleid tot geen resultaten. </h1>
		</div>
		';
	}
	
	
	
	

	?>
    <div class="page-field">
       	<a href="#">
            <object class="card">
                <div class="frame">
                    <div class="photoframe">
                    	<img src="img/pasfoto3.jpg" height="200" width="150" />
                    </div>	
                    <div class="infoframe">
                    	<div class = "name">
                            <h1>Emma Boumans</h1>
                        </div>
                        <div class="attributes">
                            <h1>Vakken:</h1>
                            <p>Natuurkunde, Wiskunde, Economie, Turks, Russisch.</p>
                        </div>
                        <div class="attributes">
                        	<h1>Locatie:</h1>
                            <p>Amsterdam</p>
                        </div>
                     </div>
                  </div>
            </object>
        </a>
        
        
        <div class="prevnexbuttons">
            <div class="prevnexbuttonsCenter">
                <a href="#">
                    <object class="previousbutton">
                    Vorige
                    </object>
                </a>
                <a href="#">
                    <object class="nextbutton">
                    Volgende
                    </object>
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    </div>
    
    <div class="footer">
        <div class="centerwrapper">
            <a href="about.html">Wie zijn wij?</a>
            <a href="index.html">Welkom</a>
            <a href="about.html">Meld je aan</a>
            <a href="registratieformulier.html">Registratieformulier</a>
        </div>
    </div>
    
    <div class="bottom"></div>
</body>
</html>
