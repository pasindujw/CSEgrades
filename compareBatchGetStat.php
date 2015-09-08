<?php
include('session.php');
include('controller/dbController.php');

$semester = $_GET['q'];

$record = getStudentInfo($login_session);

$name= $record["name"];
$image=$record["image"];
$intake=$record["intake"];

//get the year of the Student's certain semester
$year= getYearOfStudentSemester($semester,$login_session);

//get all enrolled courses for a certain students certain semseter
$codeList = getAllCourseEnrolledForSemester($semester,$login_session);

//get all data about that codes in that very semester
$courseStats = getBatchStatsForSemester($semester,$login_session,$year);

//get the semesterGPA for a certain user
$semGpa = getSemGpa($semester,$login_session);
?>
<html>
<head>
</head>
<body>
    <!--Redesin the user's box with including RANK and GPA -->
    <div class ="mybox">
        <div class="propic">
            <?php
        echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($image) ).'"/></center>';    
            ?>
        </div> 
        <h1><span class="data"><center><?php echo "" .$name; ?></center></span><br>   </h1>
    
        <div class="rankRank"><center>Semester</center></div>
        <div class="rankRank"><center>GPA</center></div>
        <center><div class=""><?php echo $semGpa; ?></div></center>
        
        
    </div>
    <!-- Div to dispaly batch stats table-->
    <div class ="batchBox">        
        <table>
            <tr>
                <th rowspan="2">Course</th>
                <th rowspan="2">My Credits</th>
                <th colspan="3">Stats from Batch</th>
                <th rowspan="2">No. of Students</th>
            </tr>
            <tr>
                <th>Max</th>
                <th>Average</th>
                <th>Min</th>
            </tr>
            <?php
                    foreach ($courseStats as $row){  
                        $myCred = getMyCredits($row["code"],$login_session);
                        echo '<tr>';
                        echo '<td>' . $row['code'] .' : '.$row['title'].'</td>';
                        echo "<td>" . $myCred["myCreds"] . "</td>";
                        echo "<td>" . $row['max'] . "</td>";
                        echo "<td>" . round($row['avg'],2) . "</td>";
                        echo "<td>" . $row['min'] . "</td>";
                        echo "<td>" . getTotalStudentsForCourse($row["code"],$year,$semester) . "</td>";
                        echo "</tr>";
                    }
            ?>
            </table>
        </div>
    <!-- Div to print button -->
    <div id="feedback">
        <button onclick=printTheDiv()>To Print</button>

    </div> 
</body>