<?php
$page = "<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>webdb13BG2</title>

<!-- Link van wat ik een mooi inlog ding vind: http://www.freebiesgallery.com/login-page-design-psd-template/ -->

<!-- A google font to use on the webpage -->
<link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="style.css" />

<style type="text/css">

.visitcardsframe
{
  	
	border: 5px solid orange;
	border-radius:10px;
	width:890px;
	background-color:orange;
}
.card .frame
{
        background-image:url(img/floor.jpg);
	border:1px solid black;
	border-bottom:3px solid black;
	border-right:3px solid black;
	border-radius:5px;
        height:300px;
	width:400px;
	margin-top:30px;
	margin-left:30px;
	float:left;
}
.card .frame:hover
{
        background-image:url(img/floorRoll.jpg) 
}
.card .frame .photoframe
{
	width:120px;
	height:150px;	
	margin-top:20px;
	margin-left:20px;
	border:2px solid black;
	float:left;
}
.card .frame .infoframe
{
	float:left;
	width:220px;
        height:300px;
	margin-left:20px;
	margin-top:20px;
	font-size:20px;
}
.card .frame .infoframe .attributes
{
	width:inherit;
	margin-top:0px;
}
.card .frame .infoframe .name h1
{
	font-size:18px;
	margin-top:0px;
	height:46px;
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
	width:75px;
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
	width:75px;
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
    	<div class="left"> <a href="index.html" class="left"> Waarbijles </a> </div>
        <div class="middle"></div>
        <div class="right">
            <div class="label">Voor leden geef je gegevens en log in</div>
            <div class="login"><input value="Gebruikersnaam" /> 
                <input value="Wachtwoord"/><button type="submit">Login</button></div>
        </div>
    </div>
</div>

<div class="content">
	<div class="page-intro">
        Aanbod
  </div>
    
     <div class="page-field">
     <a href="#">

        <object class="card">
            <div class="frame">
                <div class="photoframe">
                        <img src="img/bas.jpg" width="120" height="150" alt="teacher"/>
                </div>	
                <div class="infoframe">
                    <div class = "name">
                        <h1>Bastiaan Nachtegaal</h1>
                    </div>
                    <div class="attributes">
                        <h1>Vakken:</h1>
                        <p>Natuurkunde, Wiskunde, CKV.</p>
                    </div>
                    <div class="attributes">
                    	<h1>Locatie:</h1>
                        <p>Amsterdam, Rijswijk</p>
                    </div>
                    <div class="attributes">
                        <h1>Ervaring:</h1>
                        <p>geen</p>
                    </div>
                    <div class="attributes">
                        <h1>Contactinformatie</h1>
                        <p>Telefoninsch: +31641688333</p>
                        <p>Mail: <a href="mailto:bas@nachtegaal.eu">bas@nachtegaal.eu</a></p>
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
        <div class="clear">
        </div>
  </div>
<div class="clear"></div>
</div>
<div class="footer">
            <a href="about.html">Wie zijn wij?</a>
            <a href="index.html">Welkom</a>
            <a href="about.html">Meld je aan</a>
		    <a href="registratieformulier.html">Registratieformulier</a>
</div>
<div class="bottom">
</div>
</body>
</html>";

$length = strval( strlen( $page ) );
$md5sum = md5( $page );
header( 'Content-Language: nl' );
header( 'Content-MD5:' . $md5sum );
header( 'Content-Length:' . $length );
echo( $page );
?>

