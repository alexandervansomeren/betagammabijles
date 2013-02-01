<!-- formvalidaties en formfeedback in javascript -->
<script language="javascript" type="text/javascript">
    var xmlhttp;

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
                    document.getElementById("123").style.display="block";
                }
                function makeInvisible()
                {
                    document.getElementById("123").style.display="none";
                }
            </script>
            <div id="123" style="display:none">
                <em><br />De bijles</em>
                <div class="paragraph">
                    
                    <!---ques = holder -->
                    <label class="mainHolder">
                    <input class="input" type="checkbox" value="1" name="bijlesvak[]" onclick="makeNiveau1();" /><div id="301">Aardrijkskunde</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau1()
                            {
                                document.getElementById("201").style.display="block";
                                document.getElementById("301").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="201" style="display:hidden">                        
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
                    </label>
                    
                    <label class="mainHolder"><input type="checkbox" value="2" name="bijlesvak[]" onclick="makeNiveau2();"/><div id="302">Biologie</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau2()
                            {                                
                                document.getElementById("202").style.display="block";
                                document.getElementById("302").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="202" style="display:hidden">
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
                    </label>    
                    <label class="mainHolder"><input type="checkbox" value="3" name="bijlesvak[]" onclick="makeNiveau3();"/> <div id="303">Scheikunde</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau3()
                            {
                                document.getElementById("203").style.display="block";
                                document.getElementById("303").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="203" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="4" name="bijlesvak[]" onclick="makeNiveau4();"/><div id="304">Engels</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau4()
                            {
                                document.getElementById("204").style.display="block";
                                document.getElementById("304").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="204" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="5" name="bijlesvak[]" onclick="makeNiveau5();" /><div id="305">Nederlands</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau5()
                            {
                                document.getElementById("205").style.display="block";
                                document.getElementById("305").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="205" style="display:hidden">
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
                    </label>
                    
                    <label class="mainHolder"><input type="checkbox" value="6" name="bijlesvak[]" onclick="makeNiveau6();" /><div id="306">Wiskunde A</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau6()
                            {
                                document.getElementById("206").style.display="block";
                                document.getElementById("306").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="206" style="display:hidden">
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
                    </label>
                    
                    <label class="mainHolder"><input type="checkbox" value="7" name="bijlesvak[]" onclick="makeNiveau7();" /><div id="307">Wiskunde B</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau7()
                            {
                                document.getElementById("207").style.display="block";
                                document.getElementById("307").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="207" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="8" name="bijlesvak[]" onclick="makeNiveau8();" /><div id="308">Wiskunde C</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau8()
                            {
                                document.getElementById("208").style.display="block";
                                document.getElementById("308").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="208" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="9" name="bijlesvak[]" onclick="makeNiveau9();" /><div id="309">Wiskunde D</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau9()
                            {
                                document.getElementById("209").style.display="block";
                                document.getElementById("309").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="209" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="10" name="bijlesvak[]" onclick="makeNiveau10();" /><div id="310">Frans</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau10()
                            {
                                document.getElementById("210").style.display="block";
                                document.getElementById("310").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="210" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="11" name="bijlesvak[]" onclick="makeNiveau11();" /><div id="311">Duits</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau11()
                            {
                                document.getElementById("211").style.display="block";
                                document.getElementById("311").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="211" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="12" name="bijlesvak[]" onclick="makeNiveau12();" /><div id="312">Economie</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau12()
                            {
                                document.getElementById("212").style.display="block";
                                document.getElementById("312").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="212" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="13" name="bijlesvak[]" onclick="makeNiveau13();" /><div id="313">Latijn</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau13()
                            {
                                document.getElementById("213").style.display="block";
                                document.getElementById("313").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="213" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="14" name="bijlesvak[]" onclick="makeNiveau14();" /><div id="314">Grieks</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau14()
                            {
                                document.getElementById("214").style.display="block";
                                document.getElementById("314").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="214" style="display:hidden">
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
                    </label>                           
                    <label class="mainHolder" title="Management &amp; Organisatie"><input type="checkbox" value="15" name="bijlesvak[]" onclick="makeNiveau15();" /><div id="315">M &amp; O</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau15()
                            {
                                document.getElementById("215").style.display="block";
                                document.getElementById("315").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="215" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Maatschappijleer"><input type="checkbox" value="16" name="bijlesvak[]" onclick="makeNiveau16();" /></label><div  id="316">MaL</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau16()
                            {
                                document.getElementById("216").style.display="block";
                                document.getElementById("316").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="216" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="17" name="bijlesvak[]" onclick="makeNiveau17();" /> </label><div  id="317">Muziek</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau17()
                            {
                                document.getElementById("217").style.display="block";
                                document.getElementById("317").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="217" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="18" name="bijlesvak[]" onclick="makeNiveau18();" /></label><div  id="318">Natuurkunde</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau18()
                            {
                                document.getElementById("218").style.display="block";
                                document.getElementById("318").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="218" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Algemene Natuurwetenschappen"><input type="checkbox" value="19" name="bijlesvak[]" onclick="makeNiveau7();" /></label><div  id="319">ANW</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau19()
                            {
                                document.getElementById("219").style.display="block";
                                document.getElementById("319").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="219" style="display:hidden">
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
                    </label>
                        
                    <label class="mainHolder"><input type="checkbox" value="20" name="bijlesvak[]" onclick="makeNiveau20();" /></label><div  id="320">Fries</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau20()
                            {
                                document.getElementById("220").style.display="block";
                                document.getElementById("320").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="220" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="21" name="bijlesvak[]" onclick="makeNiveau21();" /></label><div  id="321">Spaans</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau21()
                            {
                                document.getElementById("221").style.display="block";
                                document.getElementById("321").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="221" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="22" name="bijlesvak[]" onclick="makeNiveau22();" /></label><div  id="322">Italiaans</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau22()
                            {
                                document.getElementById("222").style.display="block";
                                document.getElementById("322").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="222" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="23" name="bijlesvak[]" onclick="makeNiveau23();" /></label><div  id="323">Russisch</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau23()
                            {
                                document.getElementById("223").style.display="block";
                                document.getElementById("323").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="223" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="24" name="bijlesvak[]" onclick="makeNiveau24();" /></label><div  id="324">Turks</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau24()
                            {
                                document.getElementById("224").style.display="block";
                                document.getElementById("324").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="224" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="25" name="bijlesvak[]" onclick="makeNiveau2();" /></label><div  id="325">Arabisch</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau25()
                            {
                                document.getElementById("225").style.display="block";
                                document.getElementById("325").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="225" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Natuur, Leven &amp; Techniek"><input type="checkbox" value="26" name="bijlesvak[]" onclick="makeNiveau26();" /></label ><div  id="326">N, L &amp; T</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau26()
                            {
                                document.getElementById("226").style.display="block";
                                document.getElementById("326").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="226" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Awesome!"><input type="checkbox" value="27" name="bijlesvak[]" onclick="makeNiveau27();" /></label><div  id="327">Informatica</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau27()
                            {
                                document.getElementById("227").style.display="block";
                                document.getElementById("327").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="227" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="28" name="bijlesvak[]" onclick="makeNiveau28();" /></label><div  id="328">Geschiedenis</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau28()
                            {
                                document.getElementById("228").style.display="block";
                                document.getElementById("328").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="228" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Maatschappijwetenschappen"><input type="checkbox" value="29" name="bijlesvak[]" onclick="makeNiveau29();" /></label><div  id="329">MaW</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau29()
                            {
                                document.getElementById("229").style.display="block";
                                document.getElementById("329").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="229" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="30" name="bijlesvak[]" onclick="makeNiveau30();" /></label><div  id="330">Filosofie</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau30()
                            {
                                document.getElementById("230").style.display="block";
                                document.getElementById("330").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="230" style="display:hidden">
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
                    </label>
                    <label class="mainHolder"><input type="checkbox" value="31" name="bijlesvak[]" onclick="makeNiveau31();" /></label><div  id="331">Kunst Alg.</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau31()
                            {
                                document.getElementById("231").style.display="block";
                                document.getElementById("331").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="231" style="display:hidden">
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
                    </label>
                    <label class="mainHolder" title="Culturele Kunstzinnige Vorming"><input type="checkbox" value="32" name="bijlesvak[]" onclick="makeNiveau32();" /></label><div  id="332">CKV</div>
                        <script language="javascript" type="text/javascript">
                            function makeNiveau32()
                            {
                                document.getElementById("232").style.display="block";
                                document.getElementById("332").style.display="hidden";
                            }
                        </script>
                        <select name="niveau" id="232" style="display:hidden">
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
                    </label>
                    <div class="field">Heb je ervaring met bijles geven?</div>
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
    
    <script language="javascript" type="text/javascript">
        function makeOptionVisible()
        {
        	document.getElementById("321").style.display="block";
        }
        function makeOptionInvisible()
    	{
    		document.getElementById("321").style.display="hidden";
        }
    </script>
    <div id="321" style="display:none">
    	<div class="page-field">
    		Dit is leesbaar!
    	</div>
    </div>
    	
    
    <?php
        // Connect to the database
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
                    disconnectGoodbye();
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
            if(isset($_POST['niveau']))
            {
                $course_code = $course_code*100 + $_POST['niveau'];
            } else {
                $course_code = $course_code*100 + 11;
            }
	        $course_int = intval($course_code);
	        enterCourseCode($course_int);       	
        }
    ?>
</div>
	    
