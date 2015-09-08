<?php
include('session.php');
include('controller/dbController.php');
include('barLine.html');
include('loadNoty.js');

//get the batch friends of the user
$batchFriends = getBatchFriendsOfStudent($login_session);
?>
<html>

<head>
    <link href="styles/browseBatchFriendsStyle.css" rel="stylesheet" type="text/css">
    <title>Browse Batch Friends<?php echo $login_session; ?></title>
</head>
<body>
    <!--Div to the whole table -->
    <div class="box">
        <table>
            <?php
                foreach ($batchFriends as $row){
                    $courseList = array();
                    $courseList= getEnrolledCourses($row["id"]); 
                     $currentGpa = getCurrentGpa($row["id"]);
                    if($row["id"]!=$login_session){
                       
                        echo '<tr>';
                                //box to store image and name
                            echo'<td><div class ="subBox">';
                                echo "<center><label><b>{$row["name"]}</b><label></center>"; 
                                echo '<br>';
                                echo '<center><img src="data:image/jpeg;base64,'.base64_encode(file_get_contents( $row["image"]) ).'" width="100" height="100" /></center>';    
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                //box for store course codes
                                echo '<div class ="codeBox">';
                                echo '<b>Courses: </b>';
                                foreach($courseList as $course){
                                    echo $course["code"]." "; 
                                }
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                //box to store ranks
                                echo '<div class ="rankBox">';
                                    echo '<center><b>Rank </b>';
                                    echo '<br>4</center>';
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                //box to store GPA
                                echo '<div class ="gpaBox">';
                                echo '<center><b>GPA </b>';
                                echo '<br>'.round($currentGpa["gpa"],2).'</center>';
                                echo "</div>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    else{
                        //this is to highlight the own user's details
                        echo "<tr>";
                            echo "<td>";
                                echo '<div class ="subBox mine">';
                                    echo "<center><label><b>{$row["name"]}</b></label></center>"; 
                                    echo '<br>';
                                    echo '<center><img src="data:image/jpeg;base64,'.base64_encode( file_get_contents($row["image"]) ).'" width="100" height="100" /></center>';    
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo '<div class ="codeBox mine">';
                                    echo '<b>Courses: </b>';
                                    foreach($courseList as $course){
                                    echo $course["code"]." "; }
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo '<div class ="rankBox mine">';
                                echo '<center><b>Rank </b>';
                                echo '4';
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo '<div class ="gpaBox mine">';
                                    echo '<center><b>GPA </b>';
                                    echo '<br>'.round($currentGpa["gpa"],2).'</center>';
                                echo "</div>";
                            echo "</td>";
                        echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
    <!--JScript to GoToTop Arrow-->
        <script type="text/javascript">
            $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
        </script>
        <script>
            var amountScrolled = 300;
            $(window).scroll(function () {
                if ($(window).scrollTop() > amountScrolled) {
                    $('a.back-to-top').fadeIn('slow');
                } else {
                    $('a.back-to-top').fadeOut('slow');
                }
            });
        </script>
        <a href="#" class="back-to-top">Back to Top</a>
</body>
</html>