<?php
include('session.php');
include('addStudentPhp.php');
include('barLine.html');
?>

<html>
<head>
    <title>Add New Student <?php echo $login_session; ?><</title>
    <link href="styles/addStudentStyle.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div id="login">
<label class="topic"><center><br>Add New Student<br></center></label>
<form type ="login_form" action="" method="post">
<label>Name</label>
<input id="name" name="name" placeholder="Full name" type="text">
<label>Index (username)</label>
<input id="index" name="index" placeholder="" type="text">
<label>Password</label>
<input id="password" name="password" placeholder="" type="password">
<label>Intake</label>
<input id="intake" name="intake" placeholder="(year)" type="text">
    
<input name="submit" type="submit" value=" Add Student ">
</form><button class= "btn" onclick ="location.href = 'addStudentsBulk.php'" class="btn">*Add Students in Bulk*</button>
    </div>

</html>