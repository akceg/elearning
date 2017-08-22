<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(count($_SESSION)>0)
{
    session_destroy();
//    header("Location:localhost:8081/Logout.php");
    echo "You have been successfully logged out from your account";
}
 else
{
    echo "<script type='text/javascript'>alert('Unauthorized access');</script>";
    sleep(3);
    header("Location:index.php");
}
?>
