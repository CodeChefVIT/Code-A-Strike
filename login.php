<?php
if(isset($_POST['login']))
{   
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $host="localhost";
    $uname="root";
    $pass="";
    $db="codechef";
    $link=@mysql_connect($host,$uname,$pass) or
    die("<script>alert('SERVER ERROR');</script>");
    mysql_select_db($db) or 
    die("<script>alert('Database error');</script>");
    
    $qry="select * from admin where username='$username' and password='$password'";
    $result=mysql_query($qry)
    or die(mysql_error());
    
    $row=mysql_fetch_array($result);
    
		if(mysql_affected_rows()>0)
		{   
           $id=$row[0];
			session_start();
			$_SESSION['id']=$id;
			header("location:admin.php");
		}
		else
		{
			echo "<script>window.location='./index.html';alert('Invalid Username or Password');</script>";
		}
}

else
{
    header('location:index.html');
}
?>