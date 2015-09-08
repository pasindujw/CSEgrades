<?php
include('session.php');
include('dbConnector.php');

$code = $_GET['q'];

$_SESSION["code"]=$code;
//query to get enrolled course titles
$query = mysql_query("select year from takes where code = '$code' group by year", $connection);

$years = array();
while ($row_user = mysql_fetch_assoc($query))
    $years[] = $row_user;

?>

<!DOCTYPE html>
<html>
<head>
<link href="styles/viewRanksAdminStyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>
    <div class="login year">
<?php
echo '<h3>Select Year</h3>';

echo "<select id=selectYear name=year value=''>Coure Title</option>"; // list box select command

foreach ($years as $row){
    
echo "<option value=$row[year]>$row[year]</option>"; 

/* Option values are added by looping through the array */ 

}
 echo "</select>";
echo '<br><br>';
echo '<button id="btn" onclick="myFunction()">View Ranks</button>';
 ?>   
    </div>
</body>
</html>