<?php
include('session.php');
include('controller/dbController.php');

//get the passed student ID
$studentId = $_GET['q'];

//get the details of the user
$record = getStudentInfo($studentId);
$image=$record["image"];
$name=$record["name"];

?>
<html>
<head>
</head>
<body>
    <!-- Div of the comparing student-->
    <div class="someonebox">
        <!-- To Crop the image to the needed size-->
        <div class = crop>    
        <?php
            echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($image)).'"/></center>';  
        ?>
         <h1><span class="data"><?php echo "<center>" .$name; ?></span></center><br>   </h1>
        </div>
    </div>
    <!-- Div to display the comparison table-->
    <div class ="comparebox">        
        <!-- Div to the table seperately-->
        <div class="tble"><table columnspacing="70">
            <tr>
            <th>Grade</th>
            <th>Common Course</th>
            <th>Grade</th>
            </tr>
            <?php
            //get the mutual course details of the two students from the database
            $mutualCourseDetails = getMutualCourseDetailsTwoStudents($login_session,$studentId);
            foreach($mutualCourseDetails as $row) {
                echo "<tr>";
                echo "<td>" . $row['mine'] . "</td>";
                echo "<td>" . $row['code'] .' - '. $row['title']."</br></td>";
                echo "<td>" . $row['his'] . "</td>";
                echo "</tr>";
            }
            echo "</table></div>";
            ?>      
        </div> 
    </div>
</body>
</html>
