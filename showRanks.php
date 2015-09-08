<?php
include('session.php');
include('dbConnector.php');


$courseCode= $_GET["course"];
    
//query to find course year
$query = mysql_query("select year from takes where id='$login_session' and code='$courseCode'", $connection);

$courseYear= mysql_fetch_assoc($query);

$year= $courseYear["year"];

//query to get enrolled course titles
$query = mysql_query("select * from takes natural join gradevalues natural join student where code ='$courseCode' and year='$year'order by value desc;", $connection);

$ranks = array();
while ($row_user = mysql_fetch_assoc($query))
    $ranks[] = $row_user;

?>

<!DOCTYPE html>
<html>
<head>
<title>Ranks <?php echo $login_session; ?></title>
<link href="styles/viewRanksStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    <div class = "optionbox">  
    
    <h1>Ranks</h1></br>
<?php    
$count =1;

foreach ($ranks as $row){
    
echo "$count :"."{$row["name"]}"; 
    

echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["photo"] ).'"/>';    
    
$count = $count+1;    
}
    ?>    
    </body>
</html>