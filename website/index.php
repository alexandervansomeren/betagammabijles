<?php include 'https.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Openbijles.nl1</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<script type="text/javascript">
function startJava()
{
	if (document.getElementById('map_canvas'))
	{
		initialize();
	}
}
</script>

<body onload="startJava();">
    <div class="header">
	    <div class="center">
        	<div class="left"> <a href="index.php?n=home" class="left"> <img src="img/logo.png"  /> </a> </div>
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
                    
                    if (isset( $_POST['username'] ) && isset( $_POST['password'] ) )
                    {
                            include 'shielded/login.php'; 
                            $username = $_POST['username'] ;
                            $shaPassword = sha1( $_POST['password'] );
                            
                            $userType =  (login ($username, $shaPassword));
                            if ( is_int( $userType ) )
                            {
                                    $_SESSION['user_type']= $userType;
                                    $_SESSION['user_name']= $username;
                            }
                            else
                            {
									session_unset();
                                    session_destroy();
                            }                            
                    }
                                        
                    if ( isset($_SESSION['user_type']) )
                            {
                            if ( is_int( $_SESSION['user_type'] ) )
                            {
                                    echo '<div class="text"><p> Je bent ingelogt als '.$_SESSION['user_type'];
                                    echo '</p>';
                                    echo '<p><form method="post"><input type="hidden" name="logout"/><button type="submit">Logout</button></form></p></div>';
                            }
                    }
                    else echo 
                    '<form method="post" action="">
                            <div class="label">Voor leden geef je gegevens en log in
                            </div>
                            <div class="login">
                                    <input type="text" placeholder="Gebruikersnaam" name="username"/> 
                                    <input type="password" placeholder="Wachtwoord" name="password"/>
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
            <a href="index.php?p=registratieformulier">Meld je aan</a>
            <a href="index.php?p=registratieformulier">Registratieformulier</a>
        </div>
    </div>
    
    <div class="bottom"></div>
</body>
</html>