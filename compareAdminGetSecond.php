<?php
include('session.php');
include('controller/dbController.php');


$studentOne = $_GET["q"];
$year = $_GET["y"];

//details of the first student
$record = getStudentInfo($studentOne);
$studentOneName= $record["name"];
$studentOneImage=$record["image"];

$secondOptionStudents = getStudentInfoCommonCourseFollowed($studentOne);

?>

<html>
<body>
    <div class= "studentOnebox">
        <div class="propic">
            <?php
            echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($studentOneImage) ).'"/></center>';    
            ?>
        </div> 
        <h1><span class="data"><center><?php echo "" .$studentOneName; ?></center></span><br>   </h1>
    </div>

    <div  class="selectStudent2" id="val">    
        <form>
        <select id=selectCourse2 name="users" onchange="compare(this.value)">
        <option value="">Select Student</option>


        <?php 
        foreach ($secondOptionStudents as $row){
        echo "<option value=$row[id]>$row[name] ($row[id])</option>"; 
        }
        ?>
        </select>   
        </form>
    </div>

</body>
</html>