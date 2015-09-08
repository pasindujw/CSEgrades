<?php
include('session.php');
include('loadNoty.js');
include('controller/dbController.php');
$error=''; // Variable To Store Error Message
//$dbuser= $_POST['dbuser'];

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['code']) || empty($_POST['credits'])) {
        echo '<script>showError("Details are not filled properly");</script>';
    }
    else
        {
        // Define $username and $password
        $code=$_POST['code'];
        $title=$_POST['title'];
        $credits=$_POST['credits'];

        // To protect MySQL injection for Security purpose
        $code = stripslashes($code);
        $title = stripslashes($title);
        $credits = stripslashes($credits);

        $code = mysql_real_escape_string($code);
        $title = mysql_real_escape_string($title);
        $credits = mysql_real_escape_string($credits);

        //SQL to check if course is already existing
        $user_check=$_SESSION['login_user'];

        // SQL Query To Fetch Complete Information Of User
        $row = getTitle($code);
        $existing =$row['title'];

        echo "<b></b>";

        //if not exisiting course then add to the database
        if (!isset($existing)){
                if (addCourse($title,$code,$credits)){

                     echo '<script>showSuccess("New Course Successfully Added!");
        </script>';        
                } else {
                    echo '<script>showError("Error while adding user!");</script>';
                }
        } else {
                echo '<script>
          showError("ERROR: Course already exists!")
        </script>';
            }
        mysql_close($connection); // Closing Connection
    }
}

?>