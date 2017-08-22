<?php

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $connection = mysql_connect("localhost", "root", "iamtheadmin");
    if(mysql_select_db("elearning", $connection) != false)
    {
        $db = mysql_select_db("elearning", $connection);
    }
    else
    {
        die("Database connection Problem");
    }
    $username=$_POST['name1'];
    $password=$_POST['pass1'];
    if($username!='' && $password!='')
    {
        $stmt="select * from userinfo where name='$username' and pass='$password'";
        $result =  mysql_query($stmt);
        $rows=  mysql_num_rows($result);
//        echo $rows;
        if($rows==1)
        {
            $_SESSION['user']=$username;
            echo "true";
        }
        else
        {
            echo "false";
        }
    //    echo $_SESSION['user'];
        mysql_close($connection);
    }


?>