<?php
include('session.php');
include('dbConnector.php');


$intake = $_GET["q"];


$students = mysql_query("select distinct name,id from student where intake = '$intake'", $connection);


$studentsAry = array();
while ($row_user = mysql_fetch_assoc($students))
   $studentsAry[] = $row_user;

?>
<html>
<div  class="selectStudent1">    
<form>
<select id=studentOne name="users" onchange="getSecond(this.value)">
<option value="">Select Student</option>
<?php 
foreach ($studentsAry as $row){
echo "<option value=$row[id]>$row[name] : $row[id]</option>"; 
}
?>
</select>   
</form>
</div>


</html>