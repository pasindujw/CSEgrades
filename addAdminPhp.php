<?php
include('session.php');
include('loadNoty.js');
include('controller/dbController.php');
$error=''; // Variable To Store Error Message
//$dbuser= $_POST['dbuser'];

if (isset($_POST['submit'])) 
{
    if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['username'])) 
    {
        echo "<b></b>";
        echo '<script>showError("Details are not filled properly!");</script>';

        }
    else
    {
        // Define $username and $password
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $info=$_POST['info'];
        $email=$_POST['email'];

        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $name = stripslashes($name);
        $password = stripslashes($password);
        $email= stripslashes($email);
        
        $username = mysql_real_escape_string($username);
        $name = mysql_real_escape_string($name);
        $password = mysql_real_escape_string($password);
        $email = mysql_real_escape_string($email);
        
        //SQL to check if user is already existing
        $row = checkAndGetBackUsername($username);
        $existing =$row['username'];
        echo "<b></b>";

        if (!isset($existing)){
            $hashedPassword = md5($password);
            if(addNewLoginUser($username,$hashedPassword,'admin'))              {
                addNewAdmin($username,$name,$info,$email);
                echo '<script>showSuccess("New Admin Added!");</script>';        
            } else 
            {
                    echo '<script>showError("Error while adding user!");</script>';
            }
        } else 
        {
            echo '<script>showError("ERROR: User alreay exists!");</script>';    
        }
        mysql_close($connection); // Closing Connection
    }
}

?>
