<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['user']))
{
    echo "Welcome ".$_SESSION['user'];
    echo '<html>'
    . '<body>'
            . '<a href="Logout.php" style="float:right">'
            . '<b> Logout </b>'
            . '</a>'
    . '</body>'
      .  '</html>';
}
else
{
    echo "Unauthorized to access this page.Please <a href='index.php'> login </a> if you already have an account or <a href='index.php'>sign up </a> for free.";
    
}
?>

