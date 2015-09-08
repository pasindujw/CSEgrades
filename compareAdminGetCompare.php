<?php
include('session.php');
include('controller/dbController.php');

$studentOneId = $_GET['one'];
$studentTwoId = $_GET['two'];

$record = getStudentInfo($studentTwoId);

$studentTwoImage=$record["image"];
$studentTwoName=$record["name"];

?>
<html>
<head>
</head>
<body>
        <!-- Right Side Student's box-->
        <div class="studentTwobox">
            <div class = crop>    
                <?php
                    echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($studentTwoImage)).'"/></center>';  
                ?>
                <h1><span class="data"><?php echo "<center>" .$studentTwoName; ?></span></center><br>   </h1>
            </div>
        </div>
    <!-- This is the table to show comparisons -->
    <div class ="comparebox">  
        <table columnpacing='50'>
            <tr>
                <th>Grade</th>
                <th>Common Course</th>
                <th>Grade</th>
            </tr>

            <?php
            $record = getMutualCourseDetailsTwoStudents($studentOneId,$studentTwoId);
            foreach($record as $row) {
                echo "<tr>";
                    echo "<td>" . $row['mine'] . "</td>";
                    echo "<td>" . $row['code'] .' - '. $row['title']."</td>";
                    echo "<td>" . $row['his'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>   
</body>
</html>
