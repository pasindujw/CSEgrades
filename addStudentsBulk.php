<?php
include('session.php');
include('barLine.html');
include('dbConnector.php');


?>

<html>
    <head>
    <link href="styles/addGradeStyle.css" rel="stylesheet" type="text/css">
    
    </head>
<body>
     <div class="info"><img src="resources/img/csvStudent.jpg"></div>
    <div class="login">
    <form name="import" method="post"enctype="multipart/form-data">
    <h3>Intake Year</h3>
<input id="year" name="year" placeholder="" type="text">
<h3>Default Password</h3>
<input id="password" name="password" placeholder="" type="text">
<h3>Select Result File (.csv file)</h3>
        <input type="file" name="file" /><br/><br/><br/>
        <input type="submit" name="submit" value="Upload" />
    </form>

    <div id="txtFile"><b></b></div>
    </body>

<?php

if(isset($_POST["submit"]))
{
    $intake = $_POST["year"];
    $defaultPassword = $_POST["password"];
    $hashedDefaultPassword = md5($defaultPassword);
    
    
    $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $id = $filesop[0];
 $name = $filesop[1];
$image = $filesop[2];
//echo $id.'<br>';
//echo $image;
  //   echo ' '.$name.'<br>';
    $sql = mysql_query("INSERT INTO login(username,password,type) VALUES ('$id','$hashedDefaultPassword','student')",$connection);
 
  $sql2= mysql_query("INSERT INTO student (id,name,intake,image) VALUES ('$id','$name','$intake','$image')",$connection);
 }
 if($sql2){
 echo "Results are uploaded successfully!";
 }else{
 echo "Sorry! There is some problem.";
 }
}

?>


</html>