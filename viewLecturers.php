<?php
include('session.php');
include('dbConnector.php');
include('barLine.html');



$query = mysql_query("select * from lecturer", $connection);

$list = array();
while ($row_user = mysql_fetch_assoc($query))
    $list[] = $row_user;


function getTeachingCourses($lecturer){
    
    include('dbConnector.php');
$qy = mysql_query("select * from teaches where username ='$lecturer'", $connection);

$courseList = array();
while ($row_user = mysql_fetch_assoc($qy)){
    $courseList[] = $row_user;
}
    
    return $courseList;
}
?>
<html>
    <head>
        <link href="styles/viewLecturersStyle.css" rel="stylesheet" type="text/css">
         <title>View Lecturers <?php echo $login_session; ?><</title>
    </head>
    <body>
<div class = "box">
    <center><h1>Lecturers</h1></center>
<?php    
echo "<table>
<tr>
<th></th>
<th></th>
<th></th>
</tr>";

foreach ($list as $row){
    $courseList = array();
    $courseList= getTeachingCourses($row["username"]);    
    

echo "<tr>";
echo "<td>";
    
echo "{$row["name"]}"; 
echo '<br>';
echo '<img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($row["image"]) ).'" width="100" height="100" />';    
echo '<br><br><br>';
echo "</td>";
    
echo "<td>";
echo '<div class ="subBox">';
echo $row["info"];
    
echo '</br><a href="mailto:'.$row["email"].'?Subject=Contact Lecturer From CSE Grades" target="_top">'.$row["email"].'</a>';    
    echo "</div>";
echo "</td>";

echo "<td>";
echo '<div class ="codeBox">';
echo '<b>Courses: </b>';
foreach($courseList as $course){
echo $course["code"]." ";
}
    echo "</div>";
echo "</td>";
    
echo "</tr>";
    
    
}
    ?>    
</div>

</body>
</html>