<html>
<!--
 ██████╗ ██████╗ ██████╗ ███████╗ ██████╗██╗  ██╗███████╗███████╗    ██╗   ██╗██╗████████╗
██╔════╝██╔═══██╗██╔══██╗██╔════╝██╔════╝██║  ██║██╔════╝██╔════╝    ██║   ██║██║╚══██╔══╝
██║     ██║   ██║██║  ██║█████╗  ██║     ███████║█████╗  █████╗      ██║   ██║██║   ██║   
██║     ██║   ██║██║  ██║██╔══╝  ██║     ██╔══██║██╔══╝  ██╔══╝      ╚██╗ ██╔╝██║   ██║   
╚██████╗╚██████╔╝██████╔╝███████╗╚██████╗██║  ██║███████╗██║          ╚████╔╝ ██║   ██║   
 ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝ ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝           ╚═══╝  ╚═╝   ╚═╝   
-->
<?php
$host="localhost";
$uname="id1129780_vinitshahdeo";
$pass="12345";
$db="id1129780_codechef";
$link=@mysqli_connect($host,$uname,$pass,$db) or
die("<script>alert('SERVER ERROR');</script>");
@mysqli_select_db($link,$db) or 
die("<script>alert('Database error');</script>");
?>
<head> 
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Vinit Shahdeo" />
  <title>Code-A-Strike | Registrations | CodeChef VIT</title>
  <link href="css/register_style.css" type="text/css" rel="stylesheet" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
 <body>
   
  <header><p>CodeChef VIT</p></header>
  <center><h1>Code-A-Strike</h1>
    <h3>Registration Portal</h3>
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
 
  <footer><p>Report bugs @ 8870855940</p></footer>
 </body>

<!---INSERT-->
<?php
    
    $qry_fetch_last_id= "select * from registrations where team_id=(select max(team_id) from registrations)";
    $result=mysqli_query($link,$qry_fetch_last_id) or die(mysqli_error($link));
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
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
                    mysqli_query($link,$qry) or die(mysqli_error($link));
                if(mysqli_affected_rows($link)>0)
                    {
                            echo "<script>alert('Registered successfully!');</script>";
                            
                    }
    
    }
?>
<!---Copyright CodeChef VIT Chapter | 2017 -->
<!--- Report bugs here - vinitshahdeo@gmail.com -->
</html>