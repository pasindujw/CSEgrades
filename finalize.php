<?php
include('dbConnector.php');

function dayFunc($val){

    return 'L001';


}

$query = mysql_query("select * from login", $connection);

$users = array();

while ($row_user = mysql_fetch_assoc($query))
    $users[] = $row_user;


foreach ($users as $row){
    $hash=md5($row["password"]);
    $username=$row["username"];
    echo $row["password"].' : '.$hash;

  $query = mysql_query("update login set password = '$hash' where username = '$username'",$connection);
}
?>