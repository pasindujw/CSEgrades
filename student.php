<?php
include('session.php');
include('barLine.html');
include('controller/dbController.php');

//get information about the student
$record = getStudentInfo($login_session);
$name= $record["name"];
$intake=$record["intake"];
$image = file_get_contents($record["image"]);

//get all enrolled course titles
$coursetitles = getEnrolledCourseTitles($login_session);

//get the current GPA
$currentgpa = getCurrentGpa($login_session);

//get number of semesters passed
$semList= getNumberOfSemestersPassed($login_session);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home<?php echo $login_session; ?></title>
    <script src="resources/jquery-1.6.1.min.js"></script>
    
    <link href="styles/studentStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- This div will change by AJAX -->
    <div id="txtGetGrades"></div>
    
     <!-- Select box to select Semesters -->
    <div class="selectSem">
        <center>
            <select id=selectSem name=sem value='' onchange="getGrades(this.value)">Semester</option>
            <?php 
            foreach ($semList as $row){
                $lastSem = $row["semester"];
                echo "<option value=$row[semester]>Semester $row[semester]</option>"; 
            }?>
            </select>
        </center>
    </div>

     <!--To select the last semester in the Selectbox-->
    <?php 
echo '<script>document.getElementById("selectSem").value='.$lastSem.';
getGrades(5);</script>';
?>

    <!--The div for displaying image,name and Current GPA-->
        <div class="infobox">
            <div class="propic">
                <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';    
                ?>
            </div>

            <h1><span class="label">Name:</span><span class="data"><?php echo "   " .$name; ?></span><br>
            <span class="label">Intake:</span><span class="data"><?php echo "   " .$intake; ?></span><br>
            <span class="label">Current GPA:</span><span class="data"> <?php echo $currentgpa['gpa'] ?></span><br></h1>
        </div>

    <!--Div to show all enrolled course titles-->
        <div class="titlebox">
            <span class="data"><h1>All Courses Enrolled</h1></span>
            <?php //select each course code and course title
            foreach ($coursetitles as $title) {
            echo "<h1>{$title["code"]} : {$title["title"]}<br/></h1>";
            }
            ?>
        </div>
    <!--Div to show the graph of GPA Variations-->
        <div class="gpabox">
            <span class="data"><h3>GPA Variation</h3></span>
            <div class="gra">
                <?php    include('graph.php');?>
            </div></br>
            <?php
                //calculating semester GPAs for each semester and echoing
                $currentSem=0;
                $semGpa=getSemGpa(1,$login_session);
                if($semGpa!=0){
                    $currentSem++;
                    echo "Semster 1 : {$semGpa}  "; 
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(2,$login_session);
                 if($semGpa!=0){
                     $currentSem++;
                    echo "Semster 2 : {$semGpa} "; 
                     echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                 }

                $semGpa=getSemGpa(3,$login_session);
                if($semGpa!=0){
                    $currentSem++;
                    echo "Semster 3 : {$semGpa} ";
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(4,$login_session);
                if($semGpa!=0){
                      echo "Semster 4 : {$semGpa} "; 
                        $currentSem++;
                        echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(5,$login_session);
                if($semGpa!=0){
                      echo "Semster 5 : {$semGpa} "; 
                    $currentSem++;
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(6,$login_session);
                if($semGpa!=0){
                    $currentSem++;
                    echo "Semster 6 : {$semGpa} ";
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(7,$login_session);
                if($semGpa!=0){
                    $currentSem++;
                    echo "Semster 7 : {$semGpa} "; 
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }

                $semGpa=getSemGpa(8,$login_session);
                if($semGpa!=0){
                    $currentSem++;
                    echo "Semster 8 : {$semGpa} "; 
                    echo ' <meter low="2" optimum="3" high="3.7" max="4.2" value='.$semGpa.'></meter></br>';
                }
                $currentSem++;
                ?>
        </div>
        <!--Div to place command buttons-->
        <div class="cmdbox">
            <span class="data"><center><h3>Analyze</h3></center></span>
            <button id="btnCompare" onclick="location.href = 'compareSomeone.php'" class="btn comparebtn">Compare with someone</button>

            <button id="btnViewRanks" onclick="location.href = 'compareBatch.php'" class="btn viewrankbtn">Compare with batch</button>

            <button id="btnViewRanks" onclick="location.href = 'viewRanksAdmin.php'" class="btn viewrankbtn">View Ranks</button>
            <button id="btnViewRanks" onclick="location.href = 'browseBatchFriends.php'" class="btn viewrankbtn">Browse Batch Friends</button>
        </div>

         <!--Div to place settings buttons-->
        <div class="settings">
            <span class="data"><center><h3>Settings</h3></center></span>
            <button id="btnViewRanks" onclick="location.href = 'changePassword.php'" class="btn viewrankbtn">Change Password</button>

        </div>

        
        <script>
            //AJAX function
            function getGrades(str) {
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
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtGetGrades").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "semesterGradeGrid.php?q=" + str, true);
                    xmlhttp.send();
                }
}
            //to get a startup table
            getGrades("2");
        </script>

</body>

</html>