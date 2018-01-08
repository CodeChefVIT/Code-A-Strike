<html>
    <head>
    <title>ADMIN - Code-A-Strike</title>
    <link href="style1.css" type="text/css" rel="stylesheet" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Vinit Shahdeo" />
    <script>
	window.history.forward(-1);
	</script>
    </head>
    <body>
     <!--session creation-->
    <?php
        session_start();
        if(isset($_SESSION['id']))
        {
	       echo "<header><p align='left'>CodeChef VIT Chapter<span><a href='logout.php'>Logout</a></span></p></header>";
        }
  else
{
	header("location:index.html");
}
?>
<!---Database Connectivity -->
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
<!--find-->
<?php
if(isset($_POST['find']))
{
  $uid=$_POST['team_id'];
  $qry="select * from registrations where team_id=$uid";
  $rs=mysqli_query($link,$qry) or die(mysqli_error($link)); 
  $row=mysqli_fetch_array($rs,MYSQLI_NUM);
}
if(isset($_POST['update_details']))
{ $teamID=$_POST['team_id'];
  $teamName=$_POST['team_name'];
  $name1=$_POST['name1'];
  $reg1=$_POST['reg1'];
  $mobile1=$_POST['mobile1'];
  $email1=$_POST['email1'];
  $name2=$_POST['name2'];
  $reg2=$_POST['reg2'];
  $mobile2=$_POST['mobile2'];
  $email2=$_POST['email2'];
  $name3=$_POST['name3'];
  $reg3=$_POST['reg3'];
  $mobile3=$_POST['mobile3'];
  $email4=$_POST['email4'];
  
  $qry="update registrations set team_name='$teamName', name1='$name1', reg1='$reg1', mobile1='$mobile1',
  email1='$email1',name2='$name2', reg2='$reg2', mobile2='$mobile2'
  email1='$email2',name3='$name3', reg3='$reg3', mobile3='$mobile3'
  email3='$email3' where team_id=$teamID";
  mysqli_query($link,$qry) or die(mysqli_error($link));
  if(mysqli_affected_rows($link)>0)
  {
    echo "<script>alert('Details Updated');</script>";
  }
}
?>
 
  <center><h1>Code-A-Strike</h1>
   <hr>
 
   <form method="post" enctype="multipart/form-data">
    <div align="left">
     
      <table align="center">
            <tr><th colspan="3"><center>TEAM DETAILS</center></th></tr>
        <tr>
          
        <td>Team Id</td><td><input  type="text" name="team_id" placeholder="Enter Team ID" 
                                   value="<?php if(isset($row)){ echo $row[0]; } ?>"/></td>
        <td><center><input  type="submit" name="find"  value="Find Info"/></center></td></tr>
         <tr><td>Team Name</td><td><input  type="text" name="team_name"  
          value="<?php if(isset($row)){echo $row[1];} ?>" /></td><td><input  type="text" name="team_name"  
          value="<?php if(isset($row)){echo $row[2];} ?>" /></td></tr>
        <tr><td>Gamer 1 </td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[3];} ?>" /></td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[4];} ?>" /></td></tr>
           <tr><td>Gamer 2 </td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[7];} ?>" /></td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[8];} ?>" /></td></tr>
           <tr><td>Coder </td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[11];} ?>" /></td><td><input  type="text" name="name1"  
          value="<?php if(isset($row)){echo $row[12];} ?>" /></td></tr>
          <tr><th colspan="3"><center>START THE GAME</center></th></tr>
        <tr><td colspan="2"><center>Entry Time</center></td><td><input  type="time" name="time" 
          value="<?php if(isset($row)){echo $row[5];} ?>" />
        </td></tr>
           <tr><td colspan="2"><center>Registration Fee</center></td><td> YES <input  type="radio" name="fee" 
           value="yes"/> NO <input  type="radio" name="fee"  value="no"/>
        </td></tr>
        <tr><td colspan="3">
             <center>
             <input  type="submit" name="view_mobile"  value="SEND SMS"/>
             <input  type="submit" name="update_details"  value="UPDATE DETAILS"/>
             <input  type="submit" name="view_registered"  value="VIEW ALL"/>
             <input  type="submit" name="view_email"  value="SEND EMAIL"/>
             <input  type="submit" name="delete"  value="DELETE"/>
             </center>
           </td>
        </tr>
      </table>
     
   </div>
   </form>
  </center>
 </body>
</html>
<!--display-->
<?php
if(isset($_POST['view_registered']))
{
  echo "<center><table>";
  $qry="select * from registrations";
  $rs=mysqli_query($link,$qry)
  or die(mysql_error());
 
  echo "<table border='3'><tr><th rowspan='2'>TEAM ID</th><th rowspan='2'>TEAM NAME</th><th colspan='2'><center>GAMER 1</center></th><th colspan='2'><center>GAMER 2</center></th>
  <th colspan='2'><center>CODER</center></th></tr>";
  echo "<tr>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "</tr>";
  while($row=mysqli_fetch_array($rs,MYSQLI_NUM))
  {
    echo "<tr>";
    
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
     echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
      
    echo "<td>$row[7]</td>";
    echo "<td>$row[8]</td>";
    echo "<td>$row[11]</td>";
    echo "<td>$row[12]</td>";
       
    echo "</tr>";
  }
  echo "</table></center>";
}
?>

<!---Delete-->
<?php
if(isset($_POST['delete']))
{
  $uid=$_POST['team_id'];
  $qry="delete from registrations where team_id=$uid";
  mysqli_query($link,$qry) or die(mysqli_error($link));
}
?>

<!--view email-->

<?php
if(isset($_POST['view_email']))
{
  echo "<center><table>";
  $qry="select * from registrations";
  $rs=mysqli_query($link,$qry)
  or die(mysqli_error($link));
  
  echo "<tr><th>TEAM ID</th><th>TEAM NAME</th><th ><center>GAMER 1</center></th><th><center>GAMER 2</center></th>
  <th><center>CODER</center></th></tr>";
  while($row=mysqli_fetch_array($rs,MYSQLI_NUM))
  {
    echo "<tr>";
    
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
     echo "<td>$row[6]</td>";
    echo "<td>$row[10]</td>";
      
       echo "<td>$row[14]</td>";

      
      
    echo "</tr>";
  }
  echo "</table></center>";
}
?>
<!--- VIEW MOBILE -->
<!--display-->
<?php
if(isset($_POST['view_mobile']))
{
  echo "<center><table>";
  $qry="select * from registrations";
  $rs=mysqli_query($link,$qry)
  or die(mysqli_error($link));
 
  echo "<tr><th>TEAM ID</th><th>TEAM NAME</th><th ><center>GAMER 1</center></th><th><center>GAMER 2</center></th>
  <th><center>CODER</center></th></tr>";
  while($row=mysqli_fetch_array($rs,MYSQLI_NUM))
  {
    echo "<tr>";
    
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
     echo "<td>$row[5]</td>";
    echo "<td>$row[9]</td>";
      
       echo "<td>$row[13]</td>";

      
      
    echo "</tr>";
  }
  echo "</table></center>";
}
?>
<!--money collection-->
<?php
if(isset($_POST['view_email']))
{
  echo "<center><table>";
  $qry="select * from registrations";
  $rs=mysqli_query($link,$qry)
  or die(mysqli_error($link));
  
  echo "<table border='3'><tr><th>TEAM ID</th><th>TEAM NAME</th><th><center>MEMBER NAME</center></th><th><center>PHONE NUMBER</center></th>
  </tr>";
  while($row=mysqli_fetch_array($rs,MYSQLI_NUM))
  {
    echo "<tr>";
    
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[15]</td>";
    echo "<td>$row[16]</td>";
      
      
    echo "</tr>";
  }
  echo "</table></center>";
}
?>