<?php

include('dbConnector.php');


$url="https://scontent-sin1-1.xx.fbcdn.net/hphotos-xpt1/v/t1.0-9/10247439_10202689392704696_2113217981517805271_n.jpg?oh=77c39fe3e7c773f2c47d3f8fb1e29661&oe=566885FA";


//echo file_get_contents($url);
    
$photo = file_get_contents($url);
$finPhoto= mysql_escape_string($photo);
echo '<img width=150 height=150 src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>';  

//$sql = mysql_query("update student set photo ='$finPhoto' where id='test'",$connection);

if($sql){
 echo "Results are uploaded successfully!";}
else
    echo "wrong";

echo md5("shanthafe");
?>
