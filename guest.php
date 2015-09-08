<?php
include('session.php');
include('dbConnector.php');
include('barLine.html');


$query = mysql_query("select * from guest where username ='$login_session'", $connection);

$record = mysql_fetch_assoc($query);

$name= $record["name"];
$photo=$record["photo"];
$info=$record["info"];

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $login_session; ?></title>
<link href="styles/guestStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    
<div class="infobox">
     <?php
echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>';  
echo "</br>$name</br>";
echo "$info</br>";
echo "</br>";
?>
  </div>
    
<div class ="guestTools box">   
    <label class="topic"><center>Guest Tools</center></label>
 <button id= "btnView" onclick ="location.href ='viewRanksAdmin.php'" class="btn btnview">View Ranks</button></br>
    
    <button id= "btnView" onclick ="location.href ='compareAdmin.php'" class="btn btnview">Compare Students</button></body></br>
    
<button id= "btnView" onclick ="location.href='viewLecturers.php'" class="btn btnview">View Lecturers</button>
    
   
</div>

    
<div class ="otherTools box">   
    <label class="topic"><center>Settings</center></label>
 <button id= "btnView" onclick ="location.href ='changePassword.php'" class="btn btnview">Change Password</button></br>
    
   
</div>
</body>
</html>