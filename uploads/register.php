<html>
<?php
$host="localhost";
$uname="id1129780_vinitshahdeo";
$pass="workshop12";
$db="codechef";
$link=@mysql_connect($host,$uname,$pass) or
die("<script>alert('SERVER ERROR');</script>");
@mysql_select_db($db) or 
die("<script><alert>Database error</alert></script>");
?>
 <head>
  
<link href="style1.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
  
  <center><h1>Code-A-Strike</h1>
   <hr>
   <form method="post" enctype="multipart/form-data">
    <div align="left">
     

      <table align="center">
            <tr><th colspan="2"><center>TEAM INFO</center></th></tr>
             <td>Team</td><td><input  type="text" name="team_name" placeholder="enter team name" 
      /></td></tr>
            <tr><td>Date</td><td><input type="date" name="reg_date" placeholder="enter date" required></td></tr>
        <tr>
          <tr><th colspan="2"><center>GAMER 1 DETAILS</center></th></tr>
        <tr><td>Name</td><td><input  type="text" name="name1" placeholder="enter full name" 
          required></td></tr>
        <tr><td>Reg. No.</td><td><input  type="text" name="reg1" placeholder="enter reg. no." required
          /></td></tr>
           <tr><td>Mobile</td><td><input  type="text" name="mobile1" placeholder="enter contact no." 
          required/></td></tr>
          <tr><td>Email</td><td><input  type="email" name="email1" placeholder="enter email" 
          /></td></tr>
          <tr><th colspan="2"><center>GAMER 2 DETAILS</center></th></tr>
        <tr><td>Name</td><td><input  type="text" name="name2" placeholder="enter full name" 
          required></td></tr>
        <tr><td>Reg. No.</td><td><input  type="text" name="reg2" placeholder="enter reg. no." 
          required/></td></tr>
           <tr><td>Mobile</td><td><input  type="text" name="mobile2" placeholder="enter contact no." 
          required/></td></tr>
          <tr><td>Email</td><td><input  type="email" name="email2" placeholder="enter email" 
          /></td></tr>
          <tr><th colspan="2"><center>CODER DETAILS</center></th></tr>
        <tr><td>Name</td><td><input  type="text" name="name3" placeholder="enter full name" 
          required></td></tr>
        <tr><td>Reg. No.</td><td><input  type="text" name="reg3" placeholder="enter reg. no." 
          required/></td></tr>
           <tr><td>Mobile</td><td><input  type="text" name="mobile3" placeholder="enter contact no." 
          required/></td></tr>
          <tr><td>Email</td><td><input  type="email" name="email3" placeholder="enter email" 
          /></td></tr>
        <tr><td colspan="2">
             <center><input  type="submit" name="register"  value="Register"/></center>
           </td>
        </tr>
      </table>
     
   </div>
   </form>
  </center>
 </body>
</html>
<!--display-->

<!---INSERT-->
<?php
    
    $qry_fetch_last_id= "select * from registrations where team_id=(select max(team_id) from registrations)";
    $result=mysql_query($qry_fetch_last_id) or die(mysql_error());
    $row=mysql_fetch_array($result);
    $last_id=$row[0];

    $team_id=$last_id+1;

    $team_name="gamers";
    $reg_date=" ";
    $name1=$name2=$name3=" ";
    $email1=$email2=$email3=" ";
    $mobile1=$mobile2=$mobile3=" ";
    $reg1=$reg2=$reg3=" ";

    if(isset($_POST['register']))
    {
        $team_name=$_POST['team_name'];
        $reg_date=$_POST['reg_date'];
        $name1=$_POST['name1'];
        $name2=$_POST['name2'];
        $name3=$_POST['name3'];
        $email1=$_POST['email1'];
        $email2=$_POST['email2'];
        $email3=$_POST['email3'];
        $reg1=$_POST['reg1'];
        $reg2=$_POST['reg2'];
        $reg3=$_POST['reg3'];
        $mobile1=$_POST['mobile1'];
        $mobile2=$_POST['mobile2'];
        $mobile3=$_POST['mobile3'];
        
            $qry="insert into registrations values($team_id,'$team_name','$reg_date','$name1','$reg1','$mobile1','$email1','$name2','$reg2','$mobile2','$email2','$name3','$reg3','$mobile3','$email3' )";
                    mysql_query($qry) or die(mysql_error());
                if(mysql_affected_rows()>0)
                    {
                            echo "<script>alert('Registered successfully');</script>";
                    }
    }
?>