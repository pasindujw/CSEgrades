<?php
include('session.php');
include('dbConnector.php');


$sem = $_GET['q'];


$query = mysql_query("select * from takes natural join course natural join gradevalues where id ='$login_session' and semester ='$sem'", $connection);

$list = array();
while ($row_user = mysql_fetch_assoc($query))
    $list[] = $row_user;


?>

<html>
<head>

</head>
<body>
    
<div class="semTable">
<table>
<tr>
<th>Code</th>
<th>Title</th>
<th>Grade</th>
<th>Credits</th>
</tr>
   
<?php
    foreach ($list as $row){
    $earnedCredits = $row["credits"]*$row["value"]; 
    $totCredits = $row["credits"] * 4.2;
        
    echo "<tr>";
    echo "<td>" . $row['code'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td><center>" . $row['grade'] . "</center></td>";
    echo "<td>" . $earnedCredits . " from " . $totCredits."</td>";
    echo "</tr>";
    }
?>
   </table>  
    </div>
</body>
</html>
