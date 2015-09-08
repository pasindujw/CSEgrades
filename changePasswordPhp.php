<?php
include('session.php');
include('loadNoty.js');
include('controller/dbController.php');
if (isset($_POST['submit'])) {
    
    if (empty($_POST['oldPw'])) {
        echo '<script>showError("ERROR: Please enter old password");</script>';
    }
    else if(empty($_POST['newPw'])){
     echo '<script>showError("ERROR: Please enter a new password");</script>';
    }
    else if(empty($_POST['confNewPw'])){
     echo '<script>showError("ERROR: Please enter a new password");</script>';
    }
    else if($_POST['confNewPw']!=$_POST['newPw'])
         echo '<script>showError("New password confirmation failed");</script>';
    
    else{
        // Define $username and $password
        $newPassword=$_POST['newPw'];
        $oldPassword=$_POST['oldPw'];
        $confNewPassword=$_POST['confNewPw'];
        
        
        // To protect MySQL injection for Security purpose 
        $newPassword= stripslashes($newPassword);
        $oldPassword= stripslashes($oldPassword);
        $confNewPassword= stripslashes($confNewPassword);
        
        $newPassword= mysql_real_escape_string($newPassword);
        $oldPassword= mysql_real_escape_string($oldPassword);
        $confNewPassword= mysql_real_escape_string($confNewPassword);
    
        
        $arr = getPassword($login_session);
        $existingPw = $arr["password"];
        
        //hash using md5 enryption
        $hashedOldPassword = md5($oldPassword);
        if($existingPw==$hashedOldPassword){
        
        $hashedNewPassword = md5($newPassword);
          
        //set the new password
        setPassword($login_session,$hashedNewPassword);    
        echo '<script>showSuccess("Password successfully changed");</script>';
            
        echo '<script type="text/javascript">var myVar = setTimeout(function () {reDirect()}, 3000);</script>';    
        }
        else{
         echo '<script>showError("Old Password is incorrect!");</script>';
        
        }
        
    }
}

?>