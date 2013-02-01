	<?php include 'https.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Openbijles.nl</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript">
    function startJava()
    {
        if (document.getElementById('map_canvas'))
        {
            initialize();
        }
    }
    </script>
</head>

<body onload="startJava();">
    <div class="header">
	    <div class="center">
        	<div class="left"> <a href="index.php?p=home" class="left"> <img src="img/logo.png" alt="Openbijles.nl" /> </a> </div>
            <div class="middle"></div>
            <div class="right">
            	<?php
                    session_start();
                    include 'shielded/connector.php'; 
                    
                    if(isset( $_POST['logout']))
                    {                        
                        session_unset();
                        session_destroy();                        
                    }
                    
                    if (isset( $_POST['username1'] ) && isset( $_POST['password1'] ) )
                    {
                            include 'shielded/login.php'; 
                            $username1 = $_POST['username1'] ;
                            $shaPassword1 = sha1( $_POST['password1'] );
                            
                            $userType =  (login ($username1, $shaPassword1));
                            if ( is_int( $userType ) )
                            {
                                    $_SESSION['userType1']= $userType;
                                    $_SESSION['user_name1']= $username1;
                            }
                            else
                            {
									session_unset();
                                    session_destroy();
                            }                            
                    }
                                        
                    if ( isset($_SESSION['userType1']) )
                            {
                            if ( is_int( $_SESSION['userType1'] ) )
                            {
                                    echo '<div class="text"><p> Je bent ingelogt als '.$_SESSION['userType1'];
                                    echo '</p>';
                                    echo '<p><form method="post"><input type="hidden" name="logout"/><button type="submit">Logout</button></form></p></div>';
                            }
                    }
                    else echo 
                    '<form method="post" action="">
                            <div class="label">Voor leden geef je gegevens en log in
                            </div>
                            <div class="login">
                                    <input type="text" placeholder="Gebruikersnaam" name="username1"/> 
                                    <input type="password" placeholder="Wachtwoord" name="password1"/>
                                    <button type="submit">Login</button>
                            </div>
                    </form>';
                ?>
            </div>
        </div>
    </div>
    <?php
                if( isset($_GET['p']))
                {
                    if(file_exists($_GET['p'].'.php'))
                    {
                        include($_GET['p'].'.php'); 
                    }
                    else
                    {
                        include('home.php');
                    }    
                }
                else
                {
                    include('home.php');
                }
	?>
    <div class="footer">
        <div class="centerwrapper">
            <a href="index.php?p=about">Wie zijn wij?</a>
            <a href="index.php?p=indexZ">Welkom</a>
            <a href="index.php?p=advertenties&amp;course=&amp;city=&amp;level=&amp;male=on&amp;female=on">Advertenties</a>
            <a href="index.php?p=registratieformulier">Meld je aan</a>
        </div>
    </div>
    
    <div class="bottom"></div>
</body>
</html>
