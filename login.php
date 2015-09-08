<?php
include('dbConnector.php');
include('ipDetect.php');
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
//$dbuser= $_POST['dbuser'];

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

    
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
    
    
$hashedPassword = md5($password);    
    //echo $hashedPassword;

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select type from login where password='$hashedPassword' AND username='$username'", $connection);
$rows = mysql_num_rows($query);

if ($rows == 1) {
    $ip = "Logged in from ".get_ip_address();
    
    //Additing to the audit
$audit = mysql_query("insert into audit(action,user,description) values('Login','$username','$ip')", $connection);
    
    
    
$_SESSION['login_user']=$username; // Initializing Session
    $record =  mysql_fetch_assoc($query);
    $type= $record["type"];
    $_SESSION['login_type'] = $type; 
    if($type=="student"){
        header("location: student.php"); // Redirecting To Other Page
    }
   else if($type=="admin"){
    header("location: admin.php"); 
   }
    else if($type=="guest"){
    header("location: guest.php");
    }
    
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}

?>