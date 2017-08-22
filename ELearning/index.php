<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

if(isset($_SESSION['user']))
{
    //echo $_SESSION['user'];
    header("location:http://www.google.com");
}

?>
<html>
    <head>
        <title>eLearning</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
      <!--  <script type="text/javascript" src="jquery-1.11.2.min.js"> </script>  -->
        <script src="Functions.js"> </script>
        

       
    </head>
    <body>
  <header>
    <div class="nav">
      <ul>
          <li class="leftAlign">SAS</li>
        <li><a class="show-popup" href="#" data-showpopup="1">Sign Up</a></li>
        <li><a class="show-popup" href="#" data-showpopup="2">Log In</a></li>
        
      </ul>
    </div>
  </header>
        <div class="image">
            <img src="resources/img/headerImage.jpg" alt="alien" width="1345" height="700">
            <div class="textOverImage">Why Search!</div>
            <div class="textOverImage1" >When I Am Here</div>
        </div>
 
        <div class="overlay-content popup1" name="signdiv">
            <form name="signupform" id="signupform" method="post">
            <p> <label for="username">Username</label>
            <input type="text" id="username" name="name1" onkeyup="checkAvail(this)" required>
            </p>
            <p id="uerr"> </p>
            <p>
            <label for="crtpassword">Password</label>
            <input type="password" id="crtpassword" name="pass1" required> 
            </p>
            <p>
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="conpass1" required>
            </p>
            <input type="button" class="btn" id="createacc" value="Create Account">
            <input type="button" class="close-btn" value="Cancel">
            </form>
            <p id="signuperr"> </p>
        </div>

        <div class="overlay-content popup2" name="logdiv">
            <form name="loginform" id="loginform" method="post">
            <p> <label for="logusername">Username</label>
            <input type="text" id="logusername">
            </p>
            <p>
            <label for="logpassword">Password</label>
            <input type="password" id="logpassword">
            </p>
            <input type="button" class="btn" id="login" name="login" value="Log In">
            <input type="button" class="close-btn" value="Cancel">
            </form>
            <p id="logerr"> </p>
            Not yet registered.<a class="show-popup"  onclick="$('.popup2').hide()" href="#" data-showpopup="1">Sign Up</a> for free!
<!--            <button class="close-btn">Close</button>  -->
        </div>
        
        <div class="imageEffect" align="center">
            <a href="html.html"><img onmouseover="shrink(this)" onmouseout="normal(this)" src="resources/img/html5.jpg" alt="alien" width="350" height="300" align="left"> </a>
            <a href="js.html"> <img onmouseover="shrink(this)" onmouseout="normal(this)" src="resources/img/js.png" alt="alien" width="350" height="300"> </a>
            <a href="css.html"> <img onmouseover="shrink(this)" onmouseout="normal(this)" src="resources/img/CSS.png" alt="alien" width="350" height="300" align="right"></a>
        </div>
        
                
    </body>
   
    
</html>
