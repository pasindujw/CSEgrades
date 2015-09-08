<?php
include('session.php');
include('controller/dbController.php');
include('editCoursePhp.php');
include('barLine.html');
include('loadNoty.js');

$coursetitles = getAllCourseDetails();

?>
<html>
<head>
    <link href="styles/editCourseStyle.css" rel="stylesheet" type="text/css"> 
    <title>Edit Course <?php echo $login_session; ?><</title>
</head>
<body>
     <script>
        //showinfo("Select The Course First");
    </script>
    <!--Div to selectbox of Courses-->
    <div  class="selectCourseBox">    
    <form>
        <h3>Select Course to Edit</h3>
        <select id=selectCourse name="users" onchange="showCourse(this.value)">
        <option value="">Course Title</option>
        <?php 
            foreach ($coursetitles as $row){
                echo "<option value=$row[code]>$row[title]</option>"; 
            }
        ?>
            </select>   
    </form>
    </div>
    <!-- This div will change by AJAX-->
    <div id="txtShowCourse"></div>

    <script>
    //function to show course
    function showCourse(str) {
        if (str == "") {
            showError("ERROR: Select Course First");
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
                document.getElementById("txtShowCourse").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","editCourseGetCourse.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>

</body>
</html>