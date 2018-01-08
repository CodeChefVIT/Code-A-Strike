<html>
<?php
$host="localhost";
$uname="root";
$pass="";
$db="codechef";
$link=@mysql_connect($host,$uname,$pass) or
die("<script>alert('Server Error')</script>");
@mysql_select_db($db) or 
die("<script><alert>Database error</alert></script>");
?>
 <head>
  <!--find-->
<?php
if(isset($_POST['find']))
{
  $uid=$_POST['team_id'];
  $qry="select * from registrations where team_id=$uid";
  $rs=mysql_query($qry) or die(mysql_error()); 
  $row=mysql_fetch_array($rs);
}
if(isset($_POST['update']))
{ $uid=$_POST['uid'];
  $uname=$_POST['uname'];
  $upass=$_POST['upass'];
  $ufname=$_POST['ufname'];
  $uemail=$_POST['uemail'];
  $umobile=$_POST['umobile'];
  $uaddress=$_POST['uaddress'];


  $qry="update usermaster set UserName='$uname', Password='$upass', FullName='$ufname', 
  Email='$uemail', Mobile= $umobile, Address='$uaddress' where UserId=$uid";
  mysql_query($qry) or die(mysql_error());
  if(mysql_affected_rows()>0)
  {
    echo "<script><alert>Records Updated</alert></script>";
  }
}
?>
  <link href="style1.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
  
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
             <input  type="submit" name="start_game"  value="START GAME"/>
             <input  type="submit" name="update_details"  value="UPDATE DETAILS"/>
             <input  type="submit" name="view_registered"  value="VIEW REGISTERED"/>
             <input  type="submit" name="view_playing"  value="VIEW PARTICIPATED"/>
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
  $rs=mysql_query($qry)
  or die(mysql_error());
  $count=mysql_num_fields($rs);
  echo "<table border='3'><tr><th rowspan='2'>TEAM ID</th><th rowspan='2'>TEAM NAME</th><th colspan='2'><center>GAMER 1</center></th><th colspan='2'><center>GAMER 2</center></th>
  <th colspan='2'><center>CODER</center></th></tr>";
  echo "<tr>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "<th><center>Name</center></th><th><center>Reg No</center></th>";
  echo "</tr>";
  while($row=mysql_fetch_array($rs))
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
<!---INSERT-->
<?php
if(isset($_POST['insert']))
{
  $uid=$_POST['uid'];
  $uname=$_POST['uname'];
  $upass=$_POST['upass'];
  $ufname=$_POST['ufname'];
  $uemail=$_POST['uemail'];
  $umobile=$_POST['umobile'];
  $uaddress=$_POST['uaddress'];

  $filename=$_FILES['fil']['name'];
  $filetname=$_FILES['fil']['tmp_name'];
  $filesize=$_FILES['fil']['size'];
  $filetype=$_FILES['fil']['type'];
  $filerror=$_FILES['fil']['error'];

  $imagepath=fopen($filename,"r");
  $bfil=fread($imagepath,$filesize);
  $image=addslashes($bfil);

  $qry="insert into usermaster 
  values($uid,'$uname','$upass','$ufname','$uemail',$umobile,'$image', '$uaddress')";
  mysql_query($qry) or die(mysql_error());
  if(mysql_affected_rows()>0)
  {
    echo "<script><alert>Records inserted</alert></script>";
  }
}
?>
<!---Delete-->
<?php
if(isset($_POST['delete']))
{
  $uid=$_POST['uid'];
  $qry="delete from usermaster where UserId=$uid";
  mysql_query($qry) or die(mysql_error());
}
?>

