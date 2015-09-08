<?php
include('session.php');
include('addGuestPhp.php');
include('barLine.html');
?>

<html>
<head>
    <title>Add New Guest <?php echo $login_session; ?></title>
    <link href="styles/addGuestStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--Div to the form-->
    <div id="login">
        <label class="topic"><center><br>Add New Guest<br></center></label>
        <!-- Form begins-->
        <form type ="login_form" action="" method="post">
            <label>Name</label>
            <input id="name" name="name" placeholder="Full name" type="text">
            <label>Username</label>
            <input id="username" name="username" placeholder="" type="text">
            <label>Password</label>
            <input id="password" name="password" placeholder="" type="password">
            <label>Other Infomation</label>
            <input id="info" name="info" placeholder="Educational Qualifications" type="text">
            <!--<br><label><br>Profile Picture</label><br>
            <input name=image type=file>-->
            <input name="submit" type="submit" value=" Add Guest ">
        </form>
    </div>
</body>
</html>