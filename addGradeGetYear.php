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
<link href="styles/addGradeStyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>
    <div class="login year">

<h3>Select Year</h3>';

<select id=selectYear name=year value='' onchange="myFunction()">Coure Title</option>"; // list box select command
<?php
foreach ($years as $row){
    
echo "<option value=$row[year]>$row[year]</option>"; 

/* Option values are added by looping through the array */ 

}
?>
 </select><br><br>
    <button id="btn" onclick="myFunction()">View Ranks</button>  
    </div>
    

</body>
</html>