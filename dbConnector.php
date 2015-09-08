<?php

//this should run only one time per session
if (session_status() == PHP_SESSION_NONE) {
include_once('configConnector.php');
}

    
 // Establishing Connection with Server by passing server_name, user_id and password as a parameter
 
$connection = mysql_connect($_POST['dbhost'], $_POST['dbuser'],$_POST['dbpassword']);



// Selecting Database
$db = mysql_select_db($_POST['db'], $connection);

?>