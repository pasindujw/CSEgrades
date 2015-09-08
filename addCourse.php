<?php
include('session.php');
include('addCoursePhp.php');
include('barLine.html');
?>

<html>
<head>
    <title>Add New Course <?php echo $login_session; ?><</title>
    <link href="styles/addCourseStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="login">
        <label class="topic"><br><center>New Course Details</center><br></label>
        <form type ="login_form" action="" method="post">
            <label>Title :</label><br>
            <input style=""id="title lbl" name="title" placeholder="" type="text">
            <label>Code :</label>
            <input id="code" name="code" placeholder="" type="text">
            <label>Credits :</label>
            <input id="credits" name="credits" placeholder="" type="text">
            <input name="submit" type="submit" value=" Add Course ">
        </form>
    </div>
</body>
</html>