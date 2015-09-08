<?php
include('session.php');
include('controller/dbController.php');
include('barLine.html');
include('loadNoty.js');

$record = getLecturerInfo($login_session);

$name= $record["name"];
$image=$record["image"];
$info=$record["info"];

?>

<!DOCTYPE html>
<html>    
<head>
    <title>Home <?php echo $login_session; ?></title>
    <link href="styles/adminStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--Div for display image,name and info-->
    <div class="infobox">
        <?php
            echo '<div class="picframe"><img height="250" width="250" src="data:image/jpeg;base64,'.base64_encode( file_get_contents($image) ).'"/></div>';  
            echo "</br><b>$name</b></br>";
            echo "<i>$info</i></br>";
            echo "</br>";
        ?>
      </div>
    <!--Div to place student buttons-->
    <div id="stdbtns" class="box">
        <label class="topic"><center>Students</center><br></label>
        <button id= "btnView" onclick ="location.href = 'viewRanksAdmin.php'" class="btn btnview">View Ranks</button>

        <button id= "btnView" onclick ="location.href ='compareAdmin.php'" class="btn btnview">Compare Students</button>

        <button id= "btnView" onclick ="location.href = 'addStudent.php'" class="btn btnview">Add New Students</button>
         
    </div>

    <!-- Div to place admin buttons -->
    <div id="adminbtns" class="box">
        <label class="topic"><center>Admin Tools</center><br></label>
        <button id= "btnView" onclick ="location.href = 'viewAudit.php'" class="btn btnview">View Audit</button>

        <button id= "btnView" onclick ="location.href = 'addAdmin.php'" class="btn btnview">Add New Admin</button>      

        <button id= "btnView" onclick ="location.href = 'editGrades.php'" class="btn btnview">Change Grade Points</button>
        
        <button id= "btnView" onclick ="location.href = 'addGuest.php'" class="btn btnview">Add New Guest</button> 
        
    </div>

    <!-- Div to place course buttons -->
    <div id="coursebtns" class = "box">  
        <label class="topic"><center>Courses</center><br></label>
        <button id= "btnView" onclick ="location.href = 'addCourse.php'" class="btn btnview">Add New Course</button>
        
        <button id= "btnView" onclick ="location.href = 'addGrades.php'" class="btn btnview">Add Grades</button>

        <button id= "btnView" onclick ="location.href = 'editCourse.php'" class="btn btnview">Edit Course</button>

        <button id= "btnView" onclick ="location.href ='analyzeBatchwiseAdmin.php'" class="btn btnview"> Analyze Performances batch-wise</button>

    </div>

    <!-- Div to place settings buttons -->
    <div id="settingsbtns" class="box">
        <label class="topic"><center>Settings</center><br></label><button id= "btnView" onclick ="location.href = 'changePassword.php'" class="btn btnview">Change password</button>  </div>

</body>
</html>