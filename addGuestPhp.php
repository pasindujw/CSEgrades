<?php
include('loadNoty.js');
include('controller/dbController.php');
$error=''; // Variable To Store Error Message
//$dbuser= $_POST['dbuser'];

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['username'])) 
    {
        echo '<script>showError("Details are not filled properly.");</script>';
    }
    else
    {
        // Define $username and $password
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $info=$_POST['info'];

        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $name = stripslashes($name);
        $password = stripslashes($password);

        $usrname = mysql_real_escape_string($username);
        $name = mysql_real_escape_string($name);
        $password = mysql_real_escape_string($password);

        //SQL to check if user is already existing
        $user_check=$_SESSION['login_user'];
        // SQL Query To Fetch Complete Information Of User
        $ses_sql=mysql_query("select username from login where username='$username'", $connection);
        
        $row = checkAndGetBackUsername($username);
        $existing =$row['username'];

        echo "<b></b>";

        if (!isset($existing)){
            $hashedPassword = md5($password);
            if (addNewLoginUser($username,$hashedPassword,'guest')){
                addNewGuest($username,$name,$info);
                echo '<script>showSuccess("New Guest Added!");</script>';        
                } else {
                    echo '<script>showError("Error while adding user!");</script>';
                }
            } else {
                echo '<script>showError("Guest already exists!");</script>';
        }
    mysql_close($connection); // Closing Connection
    }
}

?>
