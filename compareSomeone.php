<?php
include('session.php');
include('barLine.html');
include('loadNoty.js');
include('controller/dbController.php');

//get details about the user
$record = getStudentInfo($login_session);
$name= $record["name"];
$intake=$record["intake"];
$image = $record["image"];

//get students of the same intake year
//$batchStudents = getAllStudentsNameIdFromIntake($intake);
$batchStudents = getStudentInfoCommonCourseFollowed($login_session);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="styles/compareSomeoneStyle.css" rel="stylesheet" type="text/css">
    <title>Compare <?php echo $login_session; ?></title>
</head>
<body>
    <script>showinfo("Select someone to compare!");</script>
    <!--Div to display user details -->
    <div class ="mybox">
        <div class="propic">
        <?php
            echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($image) ).'"/></center>';    
        ?>
        </div> 
        <h1><span class="data"><center><?php echo "" .$name; ?></center></span><br>   </h1>
    </div>

    <!-- SelectBox to select other student-->
    <div  class="selectStudent">    
        <form>
            <select id=selectCourse name="users" onchange="getComparison(this.value),alertMe()">
                <option value="">Select Student</option>
                <?php 
                    foreach ($batchStudents as $row){
                    echo "<option value=$row[id]>$row[name] ($row[id])</option>"; 
                    }
                ?>
            </select>   
        </form>
    </div>
    <!-- Div to show the details of the other student -->
    <div class="someoneBox">
    </div>        
    
    <!-- Div to get the AJAX Reply-->
    <div id ="txtHint" class="">
    </div>
    
<script>
//AJAX function to get the comparison
function getComparison(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Select Course First";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","compareSomeoneGetCommon.php?q="+str,true);
        xmlhttp.send();
      
    }
     }
</script>
    
</body>
</html>