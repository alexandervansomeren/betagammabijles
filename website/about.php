<style type="text/css">

    .firstRow { height: 350px; margin-bottom: 65px; }
    .secondRow { height: 275px; margin-bottom: 25px; }

        .content .oneThirdWidth
        {
            width: 240px; height: inherit;
            float: left;
            padding: 15px;
            background-color:#FF7F00;
            border-radius:10px;
        }

        .content .twoThirdWidth
        {
            width: 570px; height: inherit;
            float: left;		    
            padding: 15px;
            background-color:#FF7F00;
            border-radius:10px;
        }

        .content .oneThirdWidth .wie 
        { 
            height: 145px;
            margin-top: 25px; 
            padding: 15px;
            background-color:orange; 
            border-radius:10px;
        }	

        .twoThirdWidth .half { width: 50%; float: left; }
        .twoThirdWidth .half .label { width: 100%; height: 30px; line-height: 30px; }
        .twoThirdWidth .half .name { width: 100%; height: 30px; line-height: 30px; }

        .title { width: 100%; height: 40px; font-size: 25px; }

        .header .center .left
        {

            float: left;
        }

</style>
		
<div class="content">
        <div class="firstRow">
            <div class="oneThirdWidth">
            <div class= "title">Kosten</div> 
            <br />
            <p>Openbijles.nl is volledig gratis :) De tarieven van de bijles-gevers worden onderling individueel bepaald. </p> <br />
            <p> Daarbij moet je denken aan een richtprijs van € 15,- per uur. </p> <br />
            <p> Verder vragen wij onze bijlesgevers of ze de eerste bijles gratis willen geven, bij wijze van kennismaking, om te kijken of het klikt. </p>
</div>             

            <div class= "twoThirdWidth" style="margin-left:30px;">
                        <div class= "title">Onze missie!</div> 
                        <br />
                        <p>Openbijles.nl is niet het zoveelste bijles bedrijf wat probeert een stabiel plekje op de bijlesmarkt te veroveren. Wij hebben geen pandje op de Herengracht. Wij hebben geen bijlesgevers in dienst. Wij worden niet betaald door bijlesnemers. Sterker nog, wij worden helemaal niet betaald. Het is ons doel om de bijles-gever en bijlesnemer door heel Nederland bijeen te brengen. Wij zijn voor een open bijlesmarkt die vrij toegankelijk is voor bijlesgevers bijlesnemers. </p> <br />
                        <p>Het is principe is eigenlijk ontzettend simpel. Als je bijles wil gaan geven, kan je je bij ons aanmelden, je maakt dan een profiel aan, waarin je aangeeft waar je woont en in welke vakken je op welk niveau bijles zou willen geven. Vervolgens kunnen mensen die op zoek zijn naar bijles je vinden op onze website.</p>
            </div>
        </div>
        <div class="secondRow">
        
        <div class= "twoThirdWidth" style="margin-right:25px;">
        	<div class= "title">Wil je ons contacteren?</div>
        <?php
		function spamcheck($field)
	  	{
			//filter_var() sanitizes the e-mail
			//address using FILTER_SANITIZE_EMAIL
			$field=filter_var($field, FILTER_SANITIZE_EMAIL);
		
			//filter_var() validates the e-mail
			//address using FILTER_VALIDATE_EMAIL
			if(filter_var($field, FILTER_VALIDATE_EMAIL))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
	  	}
	
		if (isset($_REQUEST['email']))
	  	{//if "email" is filled out, proceed
	
			//check if the email address is invalid
			$mailcheck = spamcheck($_REQUEST['email']);
			if ($mailcheck==FALSE)
			{
				echo "Invalid input";
			}
			else
			{//send email
				$email = $_REQUEST['email'] ;
				$subject = $_REQUEST['subject'] ;
				$message = $_REQUEST['message'] ;
				mail("someone@example.com", "Subject: $subject",
				$message, "From: $email" );
				echo "Thank you for using our mail form";
			}
	  	}
		else
	  {//if "email" is not filled out, display the form
	  echo "	<form method='post' action='mailform.php'>
					<div class='half'>
						<div class='label'>Email: </div>
							<input name='email' type='text'><br>
						<div class='label'>Onderwerp: </div>	
							<input name='subject' type='text'><br>
					</div>
					<div class='label'>Uw bericht aan ons</div>
					<div class='input' style='float:left;'>
					  <textarea name='message' rows='13' cols='35'>
					  </textarea><br>
					</div>
					  <input type='submit' style='float:right; margin-left:20px;'>
					  </form>";
	  }
	?>
                </div>
            </div>

            <div class= "oneThirdWidth">				    
            <div class= "title">Contactgegevens</div> 
            <p>
            Open bijles.nl<br/>
            Science Park 409<br/>
    1098 XH Amsterdam<br/>
    Nederland
    </p>
            </div>		   
    </div>			
</div>
		
