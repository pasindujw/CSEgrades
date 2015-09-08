<script src="resources/jquery-1.8.0.js"></script>
<script type = "text/javascript" src="resources/noty/js/noty/packaged/jquery.noty.packaged.js"></script>
    
<?php
include('dbConnector.php');

    
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
//$dbuser= $_POST['dbuser'];

if (isset($_POST['submit'])) {
if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['intake'])) {
$error = "Details are not filled properly";

echo "<b>";
echo "<script> var n = noty({
        timeout: '3000',
        layout: 'topCenter',
        type: 'error',
    text: 'Details are not filled properly.',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});    </script>";
    
    
        
}
else
{
// Define $username and $password
$name=$_POST['name'];
$index=$_POST['index'];
$password=$_POST['password'];
$intake=$_POST['intake'];
$image= 'resources/img/defaultProfilePic.png';
    
// To protect MySQL injection for Security purpose
$index = stripslashes($index);
$name = stripslashes($name);
$password = stripslashes($password);
    
$index = mysql_real_escape_string($index);
$name = mysql_real_escape_string($name);
$password = mysql_real_escape_string($password);

//SQL to check if user is already existing
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$index'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$existing =$row['username'];
    
echo "<b></b>";
   
if (!isset($existing)){
        $hashedPassword = md5($password);
        if (mysql_query("INSERT INTO login(username,password,type) VALUES ('$index','$hashedPassword','student')", $connection)){
            
        $q= mysql_query("INSERT into student(id,name,intake) values('$index','$name','$intake')", $connection);

             echo "<script>
  var n = noty({
        layout: 'center',
        type: 'success',
        timeout: '2000',
    text: 'New Student added!',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});
</script>";        
        } else {
            echo "Error while adding user!";
        }
    } else {
        echo "<script>
  var n = noty({
        layout: 'center',
        type: 'error',
        theme: 'relax',
        timeout: '2000',
    text: 'ERROR: Student already exists!',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});
</script>";      
    }
mysql_close($connection); // Closing Connection
}
}

?>
