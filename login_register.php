<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        
<link rel="stylesheet" href="css/classi.css">

<div id="login" class="modal" style="display: flex;">
        <div id="con_login" class="con_modal"  > 
                <span class="close">&times;</span>
                <form name="sign_up" action="elogin.php?auten=1" method="POST">
                    <center>
                        <img src="img/logo_sito.png" style="height: 125px;width: 125px;">
                        <h1 style="margin-bottom: 50px; font-size: 50px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                                GUSCI LOGIN </h1>
                    </center>
                    <div style=" display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="text" class="dati" style="margin-top: 20px;"  id="nome" name="nome" required >
                        <label for="nome" class="label">Nome</label>   
                    </div>

                    <div style="display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="password"  class="dati" style="margin-top: 50px;"  id="psw" name="psw" required  >
                        <label for="psw" class="label">Password</label>
                    </div>
              
                    <center style="margin-top: 60px;">
                        <input type="submit" class="bottoni" name="login"  id="btn2" value="login"  style="padding: 13px 33px 13px 33px; margin-top: 25px; margin-bottom: 20px; font-size: 15px;">
                        <h5 id="sign_up">non ho un account</h5>
                        <h6  class="hide" style="color: red;position: relative; top: -130px;" id="allert3">nome o password sono sbagliati</h6>

                    </center>
                </form>
            </div>
            
            <div id="con_sign_up" class="con_modal_sign_in" style="position: relative;" > 
                <span class="close">&times;</span>
                <form name="sign_up" action="elogin.php?auten=2" method="POST">
                    <center>
                        <img src="img/logo_sito.png" style="height: 80px;width: 80px;">
                        <h1 style="padding-bottom: 40px;
                                font-size: 30px;
                                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                                GUSCI REGISTRAZIONE </h1>
                    </center>

                    <div style=" display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="text" class="dati" style="margin-top: 20px;" onkeyup="contr_lung_sign()"  id="sign_nome" name="sign_nome" required >
                        <label for="sign_nome" class="label">Nome</label>
                    </div>
                    <h6 class="hide allert" id="allert_sign_up">troppo lunga</h6><br>

                    <div style=" display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="text"  class="dati" style="margin-top: 20px;" id="sign_cognome" onkeyup="contr_lung_sign_cognome()"   name="sign_cognome" required >
                        <label for="sign_cognome" class="label">Cognome</label>
                    </div>
                    <h6 class="hide allert" id="allert_sign_up2">troppo lunga</h6><br>

                    <div style=" display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="email"  class="dati" style="margin-top: 20px;"  id="mail" name="mail" required >
                        <label for="mail" class="label">Mail</label>
                    </div>
                    <h6 class="hide allert" id="allert_sign_up3">non e una mail</h6><br>
                    
                    <div style=" display: block;margin: auto;width: fit-content;position: relative;">
                        <input type="password"  class="dati" style="margin-top: 20px;" id="pass"  name="pass" required >
                        <label for="pass" class="label" >Password</label>
                    </div>
                    <h6 class="hide allert" id="allert_sign_up4">troppo corta</h6><br>

                    <center style="margin-top: 20px;">
                        <h6 class="hide allert" id="err_gen_sign" style="position: absolute; top: 650px; margin-left: 15px;" >completa tutti i campi</h6>
                        <input type="submit" class="bottoni"  name="sign_up" value="registrati" id="btn2_sign"    style="padding: 13px 33px 13px 33px;                       
                                                                                                                        margin-top: 25px;
                                                                                                                        margin-bottom: 20px;
                                                                                                                        font-size: 15px;    
                                                                                                                        top: -25px;
                                                                                                                        position: relative;">
                                            
                        <h5 onclick="switch_modal()" style="position: relative;top:-15px;">ho gia un account</h5>

                    </center>
                </form>
            </div>
        </div> 
    </div> 

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/libreria.js"></script>
    <script type="text/javascript" src="js/codice.js"></script>
    <script>
        var modal=document.getElementById("login");
        document.getElementById("sign_up").onclick=function()
        {
            document.getElementById("con_login").style.display="none";
            document.getElementById("con_sign_up").style.display="block";
            document.getElementById("sign_up").style.display="none";
            spazzino();

        }
        
        window.onclick = function(event) 
        {
            if (event.target == modal)
            {
                document.getElementById("allert3").style.display="none";
                modal.style.display = "none";
                document.getElementById("nome").value="";
                document.getElementById("psw").value="";
                document.getElementById("sign_nome").value="";
                document.getElementById("sign_cognome").value="";
                document.getElementById("mail").value="";
                document.getElementById("pass").value="";
                document.getElementById("allert3").style.display="none";
                document.getElementById("allert_sign_up").style.display="none";
                document.getElementById("allert_sign_up2").style.display="none";
                document.getElementById("allert_sign_up3").style.display="none";
                document.getElementById("allert_sign_up4").style.display="none";
                document.getElementById("err_gen_sign").style.display="none";

            }
        }
    </script>
</body>
</html>

        
        