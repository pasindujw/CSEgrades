<?php
include('session.php');
include('dbConnector.php');
include('editCoursePhp.php');

$code = $_GET['q'];

$_SESSION['code']=$code;




$query = mysql_query("select * from course where code = '$code' ", $connection);

$row = mysql_fetch_assoc($query);

?>

<html>
<head>
    
</head>
<body>

<div id="detailBox">
<label class="topic"><br><center>Existing Course Details</center><br></label>
<form type ="login_form" action="" method="post">

<label>Title :</label><br>
    <input style=""id="title lbl" name="title" value="<?php echo $row['title']?>" type="text">

    <label>Code :</label>
<input id="code" name="code" value="<?php echo $row['code']?>" disabled type="text">
<label>Credits :</label>
<input id="credits" name="credits" value="<?php echo $row['credits']?>" type="text">
<input name="submit" type="submit" value=" Save Changes ">
    </form>
    </div>
</body>


    
    
    
    
    
    
</html>





