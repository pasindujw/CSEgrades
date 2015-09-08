<?php
include('session.php');
include('loadNoty.js');
if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        echo '<script>showError("ERROR: Please Enter a title");</script>';
    }
    else{
    $title=$_POST['title'];
    $credits=$_POST['credits'];
    $code=$_SESSION['code'];
        
        updateCourseTitleCredits($code,$title,$credits);
    echo '
<script>
    showSuccess("Changes are Successfully Saved!");
</script>';
        
    }
}

?>