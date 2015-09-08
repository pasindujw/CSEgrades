<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    $type = $_SESSION['login_type'];
    if($type=="student"){
        header("location: student.php"); // Redirecting To Other Page
    }
   else if($type=="admin"){
    header("location: admin.php"); 
   }
    else if($type=="guest"){
    header("location: guest.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CSE Grades</title>
    <link rel="icon" type="image/ico" href="favicon.ico">
<link href="styles/indexStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    <div id="main">
    <div id="login">
<img src="resources/img/logoMini.jpg">  
    
<form type ="login_form" action="" method="post">
<label></label>
<input id="name" name="username" placeholder="Username" type="text">
<label></label>
<input id="password" name="password" placeholder="password" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
    </form>
      
</div>
</div>
    
    <div id="tag"><a href="help.php">Help | </a>Copyright © 2015 |<a href="https://lk.linkedin.com/in/pasindujw"> Pasindu Jayaweera.</a></div>    
    
</body>
</html>