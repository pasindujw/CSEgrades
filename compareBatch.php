<?php
include('session.php');
include('controller/dbController.php');
include('barLine.html');
include('loadNoty.js');

$record = getStudentInfo($login_session);

$name= $record["name"];
$image=$record["image"];
$intake=$record["intake"];

//get all the passed semesters
$semList= getNumberOfSemestersPassed($login_session);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="styles/compareBatchStyle.css" rel="stylesheet" type="text/css">
    <title>Compare <?php echo $login_session; ?> with batch</title>
</head>
<body>
    <script>showinfo("Select a Semester First");</script>
    <!--Div to display my info-->
    <div class ="mybox">
        <div class="propic">
        <?php
    echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($image) ).'"/></center>';    
    ?>
        </div> 
        <h1><span class="data"><center><?php echo "" .$name; ?></center></span><br>   </h1>
    
        
    </div>

    <!-- Div to select box of semester-->
    <div  class="selectSem">    
        <form>
            <select id=selectCourse name="users" onchange="showStat(this.value)">
                <option value="">Select Semester</option>
                <?php 
                    foreach ($semList as $row){
                    echo '<option value='.$row["semester"].'>Semester '.$row["semester"].'</option>'; 
                    }
                ?>
        </select>   
        </form>
    </div>
    <!-- This div will change with AJAX table -->
    <div class="batchBox">
    </div>        
    <div id ="txtShowStat" class="">
    </div>
    
<script>
function showStat(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Select Semester";
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
                document.getElementById("txtShowStat").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","compareBatchGetStat.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
    
<script>
    //to pirnt the table only
        function printTheDiv(){
        window.print();
        
        }
        </script>
    
</body>
</html>