<?php
include('barLine.html');
include('session.php');
include('controller/dbController.php');


$courseList= getTeachingCourses($login_session);




?>

<html>
<head>
    <link href="styles/analyzeBatchwiseAdminStyle.css" rel="stylesheet" type="text/css">
    </head>
    
<body>
    <div class="tbl">
    <table>
            <tr>
                <th rowspan="2">Course</th>
                <th rowspan="2">Intake Year</th>
                <th colspan="3">Stats from Batch</th>
                <th rowspan="2">No. of Students</th>
            </tr>
            <tr>
                <th>Max</th>
                <th>Average</th>
                <th>Min</th>
            </tr>
            <?php
                foreach($courseList as $course){
                    $batchwiseStats = getBatchwiseStats($course['code']);
                    $courseTitle="a";
                    $displayTitle="";
                    $displayCode="";
                foreach ($batchwiseStats as $row){
                    if($courseTitle!=$row["title"]){
                        $displayTitle=$row["title"];
                        $courseTitle=$row["title"];
                        $displayCode=$row["code"]." : ";
                    }
                    else{
                        $displayTitle="";
                        $displayCode="";
                    }
                    
                    $noOfStudents= getTotalStudentsForCourse($row["code"],$row['year'],$row['semester']);
                        echo '<tr>';
                        echo '<td>' . $displayCode.$displayTitle.'</td>';
                        echo "<td>" . $row['intake'] . "</td>";
                        echo "<td>" . $row['max'] . "</td>";
                        echo "<td>" . round($row['avg'],2) . "</td>";
                        echo "<td>" . $row['min'] . "</td>";
                        echo "<td>" .$noOfStudents."</td>";
                        echo "</tr>";
                    }
                    echo '<td></td>';
                }
            ?>
            </table>
    
    </div>
</body>    
    
</html>