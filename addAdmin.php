<?php
include('session.php');
include('addAdminPhp.php');
include('barLine.html');
?>

<html>
<head>
    <title>Add New Lecturer<?php echo $login_session; ?><</title>
    <link href="styles/addAdminStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--Frame for the form-->
    <div id="login">
        <label class="topic"><center><br>Add New Admin<br></center></label>
        <!--Starting of the form-->
        <form type ="login_form" action="" method="post">
            <label>Name</label>
            <input id="name" name="name" placeholder="Full name" type="text">
            <label>Username</label>
            <input id="username" name="username" placeholder="" type="text">
            <label>Password</label>
            <input id="password" name="password" placeholder="" type="password">
            <label>Other Infomation</label>
            <input id="info" name="info" placeholder="Educational Qualifications" type="text">
            <br><label><br>E-mail</label><br>
            <input id="email" name="email" type="email">
                <!--<br><label><br>Profile Picture</label><br>
            <input name=image type=file>
-->
            <input name="submit" type="submit" value=" Add Admin ">
            </form>
            </div>
    </body>
</html>