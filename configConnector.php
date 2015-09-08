<?php
$lines_array = file("config/dbConfig.txt");

//get the details from the dbConfig text file
foreach($lines_array as $line) {
    if(strpos($line, "user") !== false) {
        list(, $user) = explode(":", $line);
        $user = trim($user);
    }
    if(strpos($line, "database") !==false){
        list(, $db) = explode(":", $line);
        $db = trim($db);
    }
    
    if(strpos($line, "password") !==false){
        list(, $password) = explode(":", $line);
        $password = trim($password);
    }
    if(strpos($line, "host") !==false){
        list(, $host) = explode(":", $line);
        $host = trim($host);
    }
}

/*echo $user;
echo $db;
echo $password;
echo $host;
*/
session_start();
$_POST['dbuser']=$user;
$_POST['db']=$db;
$_POST['dbpassword']=$password;
$_POST['dbhost']=$host;

?>