<?php
include('ipDetect.php');
include('dbConnector.php');
include('loadNoty.html');

$username = $_SESSION['login_user'];



if(session_destroy()) // Destroying All Sessions
{
    $ip = "LoggedOut from ".get_ip_address();
    //Additing to the audit
$audit = mysql_query("insert into audit(action,user,description) values('Logout','$username','$ip')", $connection);
   
    mysql_close($connection);
header("Location: index.php"); // Redirecting To Home Page

}

?>