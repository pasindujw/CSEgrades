<?php
include('session.php');
include('barLine.html');
include('controller/dbController.php');
include('addGradePhp.php');
$coursetitles = getAllCourseLectureTeach($login_session);
?> 

<html>
<head>
    <link href="styles/addGradeStyle.css" rel="stylesheet" type="text/css">
    <title>Add Grades <?php echo $login_session; ?><</title>
</head>
<body>
    <div class="info"><img src="resources/img/csvInfo2.jpg"></div>
    <div class="login">
        <form name="import" method="post"enctype="multipart/form-data">
             <h3>Select the course</h3></br>

            <select id=selectCourse name="code">// list box select command
            <option value="">Course Title</option>
    </div>

            <?php
                foreach ($coursetitles as $row){
                echo "<option value=$row[code]>$row[title] - $row[code]</option>"; 

                /* Option values are added by looping through the array */ 

                }
                 echo "</select>";

            ?>

            <h3>Year</h3>
            <input id="year" name="year" placeholder="" type="text">
            <h3>Semester</h3>
            <input id="semester" name="semester" placeholder="Semester Number only" type="text">
            <h3>Select Result File (.csv file)</h3>
            <input type="file" name="file" /><br/><br/><br/>
            <input type="submit" name="submit" value="Upload" />
    
        </form>
    
    <div id="txtFile"><b></b></div>
    
<script>
    function myFunction(){
        var newHtml=''
        document.getElementById("txtFile").innerHTML =newHtml; 
    
    }
    </script>
    
    
    </body>



</html>