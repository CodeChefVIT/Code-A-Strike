<?php
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $host="localhost";
    $uname="id1129780_vinitshahdeo";
    $pass="workshop12";
    $db="codechef";
    $link=@mysql_connect($host,$uname,$pass) or
    die("<script>alert('SERVER ERROR');</script>");
    mysql_select_db($db) or 
    die("<script>alert('Database error');</script>");
    
    $qry="select * from admin";
    $result=mysql_query($qry)
    or die(mysql_error());
    
    $row=mysql_fetch_array($result);
    
    if($row[0]==$username && $row[1]==$password)
    {   
        header('location:admin.php'); 
    }
    else{
        header('location:index.html');
        
    }
}
else
{
    header('location:register.php');
}
?>