/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function start()
{
    
    document.getElementById("createacc").addEventListener("click",validateForm,false);
    document.getElementById("login").addEventListener("click",reqLogIn,false);
}

function shrink(x)
{
    x.width="320";
    x.height="280";
    
}
function enlarge(x)
{
    x.width="380";
    x.height="320";
}
function normal(x)
{
    x.width="350";
    x.height="300";
} 
function checkAvail(x)
{
    var name=x.value;
//    document.getElementById("signuperr").innerHTML="";
       $.post("checkAvail.php", {
           name1:name
       },function(data){
           if(data == "true")
           {
               document.getElementById("uerr").innerHTML="Username is available."
           }
           else if(data=="false")
           {
               document.getElementById("uerr").innerHTML="Username already exists";
           }
       });
}
function validateForm()
{
    
 //   alert("trying to create acc");
    var name=document.getElementById("username").value;
    var pass=document.getElementById("crtpassword").value;
    var conpass=document.getElementById("cpassword").value;
    var posat=name.indexOf('@');
    var posdot=name.lastIndexOf('.');
    //alert(posat +" "+posdot+" length: "+name.length);
    if(name==''||pass==''||conpass=='')
    {
        document.getElementById("signuperr").innerHTML="Some fields are blank.All fields are required."
    }
    else
    if(posat<0||posdot<0||((posdot-posat)<2)||posdot==((name.length)-1))
    {
        document.getElementById("signuperr").innerHTML="Invalid Username";
    }
    else
    if(pass != conpass)
    {
        document.getElementById("signuperr").innerHTML="Passwords do not match";
    }
    else
    if(pass.length < 6)
    {
        document.getElementById("signuperr").innerHTML="Passwords should have atleast 6 characters";
    }
    else
    {
       document.getElementById("signuperr").innerHTML="";
       $.post("signUp.php", {
        name1: name,
        pass1 : pass,
        conpass1 : conpass
        }, function(data) {
                if(data=="true")
                {
                    alert("trying to send mail");
                    $.post("http://localhost:8080/sendmailservlet/servlet/SendMail",{
                        mailid:name
                    },function(data){
                        $('#signupform')[0].reset();
                        $('#signuperr').html("");
                        $('#uerr').html("");
                        alert(data);
                    })
                }
                else if(data=="false")
                {
                    alert("Username exists");
                }
                else
                {
                    alert("Some other problem");
                }
                $('#signup')[0].reset(); // To reset form fields
            }
        );
    }
}
function reqLogIn()
{
    var name=document.getElementById("logusername").value;
    var pass=document.getElementById("logpassword").value;
    
    
    $.post("logIn.php", {
        name1: name,
        pass1 : pass
        }, function(data) {
        if(data == "true")
        {
            window.location="profile.php";
            
        }
        else if(data == "false")
        {
            document.getElementById("logerr").innerHTML="Username or Password is incorrect.";
        }
        else
        {
            alert(data);
        }
        });
}
$(document).ready(function(){

/*    $("#createacc").click(function() {
var name = $("#username").val();
var pass = $("#crtpassword").val();
var conpass = $("#cpassword").val();
if (name == '' ||  pass == '' || conpass == '') {
alert("Insertion Failed Some Fields are Blank....!");
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("signUp.php", {
name1: name,
pass1 : pass,
conpass1 : conpass
}, function(data) {
    alert(data);
$('#signup')[0].reset(); // To reset form fields
});
}
});
*/
    // function to show our popups
    function showPopup(whichpopup){
        var docHeight = $(document).height(); //grab the height of the page
        var scrollTop = $(window).scrollTop(); //grab the px value from the top of the page to where you're scrolling
        $('.overlay-bg').show().css({'height' : docHeight}); //display your popup background and set height to the page height
        $('.popup'+whichpopup).show().css({'top': scrollTop+20+'px'}); //show the appropriate popup and set the content 20px from the window top
    }

    // function to close our popups
    function closePopup(){
        $('.overlay-bg, .overlay-content').hide(); //hide the overlay
        $('#signupform')[0].reset();
        $('#loginform')[0].reset();
        $('#signuperr').html("");
        $('#uerr').html("");
        $('#logerr').html("");
    }

    // timer if we want to show a popup after a few seconds.
    //get rid of this if you don't want a popup to show up automatically
    setTimeout(function() {
        // Show popup3 after 2 seconds
        showPopup(3);
    }, 2000);


    // show popup when you click on the link
    $('.show-popup').click(function(event){
        event.preventDefault(); // disable normal link function so that it doesn't refresh the page
        var selectedPopup = $(this).data('showpopup'); //get the corresponding popup to show
        if(selectedPopup==1)
        {
            $('[name="logdiv"]').hide();
        }
        else
        {
            $('[name="signdiv"]').hide();
        }
        showPopup(selectedPopup); //we'll pass in the popup number to our showPopup() function to show which popup we want
    });
  
    // hide popup when user clicks on close button or if user clicks anywhere outside the container
    $('.close-btn, .overlay-bg').click(function(){
        closePopup();
    });
    
    // hide the popup when user presses the esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // if user presses esc key
            closePopup();
        }
    });
});

window.addEventListener("load",start,false);