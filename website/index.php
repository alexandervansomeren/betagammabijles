


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>webdb13BG2</title>
		<!-- Hieronder een verwijzing naar de algemene stylesheet -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
		<style type="text/css">
		.content .buttons
		{
		    width: inherit; height: 350px;
			position: relative;
		    margin: 0px 0px 20px 0px;
		}
		.content .buttons
		{
	        width: inherit; height: 350px;
			position: relative;
 	        margin: 0px 0px 20px 0px;
		}
	
		.content .buttons .left,
		.content .buttons .right
		{
			border: 2px solid #FF7F00;		
			display: block;
		    float: left;		    
		    width: 436px;
		    height: 346px;
            float: left;		    
	        width: 436px;
            height: 346px;
            box-shadow: 0px 0px 5px 0px #FF7F00;
		}
		
		.content .buttons a .title
		{
			width: inherit; height: 60px; line-height: 60px;
			text-indent: 10px;
			position: absolute;
			bottom: 0px;
			display:block;
			background-color: #FF7F00;
			font-size: 38px;
			opacity: 0.80;
		}
		
		.content .buttons .left { margin-right: 20px; }
		.content .buttons .right { }
		
		.content .buttons > a:hover { box-shadow: 0px 0px 10px 2px #FF7F00; }
	    .content .buttons > a:hover .title { text-decoration: underline; }
        .content .buttons > a:hover .title { text-decoration: underline; }
		
		.main_title
		{
			width: inherit;
			height: 25px;
			margin-bottom: 25px;	
			
			font-size: 24px;
		}
		</style>
		
		
	</head>

	<body>
		<div class="header">
              <div class="center">
                 <div class="left"></div>
                 <div class="middle"></div>
                 <div class="right">
                    <div class="label">Voor leden geef je gegevens en log in</div>
                    <div class="login"><input value="Gebruikersnaam" />
                       <input value="Wachtwoord" />
                       <button type="submit">Login</button>
                    </div>
                 </div>
    	      </div>
           </div>		

           <div class="content">	
              <div class="main_title">Welkom op <i>Open Bijles</i>.nl</div>
		 <div class="buttons">
	            <a href="registratieformulier.php" class="left">
                       <img src="img/docent.jpg" width="100%" height="100%" alt="Afbeelding docent" />
	               <span class="title">Ik geef bijles</span>
                    </a>
	            <a href="advertenties.php?course=&city=&level=&male=on&female=on" class="right">	                
                       <img src="img/student.jpg" width="100%" height="100%" alt="Afbeelding student" />  
                       <span class="title">Ik wil bijles</span>
	            </a>
		</div>
		    
                <div class="main_title">Een selectie van onze docenten op basis van uw locatie:</div>
            
	        <div class="populair">
            	<a class="ctrlLeft" href="#"><img src="img/arrowLeft.jpg" width="100%" height="100%" alt="Arrow Left"/></a>
                <a class="ctrlRight" href="#"><img src="img/arrowRight.jpg" width="100%" height="100%" alt="Arrow Right" /></a>
                <a href="details.php?id=1" class="docent">
                   <span class="name">Emma</span>
                   <span class="vak">Natuurkunde, KI, Wiskunde, Scheikunde en FSR</span>
                   <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                   <span class="name">Emma</span>
                   <span class="vak">Natuurkunde, KI, Wiskunde, Biologie</span>
                   <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                   <span class="name">Emma</span>
                   <span class="vak">Natuurkunde, KI, Wiskunde, Buitenschools opvang</span>
                   <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent">
                   <span class="name">Emma</span>
                   <span class="vak">Natuurkunde, KI, Wiskunde, Vriendelijk</span>
                   <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
                
            	<a href="details.php" class="docent last">
                   <span class="name">Emma</span>
                   <span class="vak">Natuurkunde, KI, Wiskunde</span>
                   <img src="img/student_1.jpg" alt="student_1" /> 
                </a>
	     </div>		    
         </div>
		
	 <div class="footer">
	    <a href="about.php">Wie zijn wij?</a>
            <a href="registratieformulier.php">Meld aan als docent</a>	
	    <a href="registratieformulier.php">Meld aan als student</a>		
            <a href="" class="last">Contact</a>			
	 </div>
		
	 <div class="bottom"></div>
		
     </body>
</html>