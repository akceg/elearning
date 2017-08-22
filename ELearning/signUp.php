<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username=$_POST['name1'];
$pass=$_POST['pass1'];
$cpass=$_POST['conpass1'];
//echo $username. "  ".$pass;

$connection = mysql_connect("localhost", "root", "iamtheadmin");
if(mysql_select_db("elearning", $connection) != false)
{
    $db = mysql_select_db("elearning", $connection);
}
else
{
    die("Database connection Problem");
}
if($username!='' && $pass!='')
{
    $stmt="insert into userinfo values('$username','$pass')";
    $query=  mysql_query($stmt);
    if($query)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
}
?>