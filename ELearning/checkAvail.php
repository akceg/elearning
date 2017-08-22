<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name=$_POST['name1'];
$connection = mysql_connect("localhost", "root", "iamtheadmin");
if(mysql_select_db("elearning", $connection) != false)
{
    $db = mysql_select_db("elearning", $connection);
}
else
{
    die("Database connection Problem");
}

if($name!='')
{
    $stmt="select * from userinfo where name='$name'";
    $result =  mysql_query($stmt);
    $rows=  mysql_num_rows($result);
    if($rows==0)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
}


?>