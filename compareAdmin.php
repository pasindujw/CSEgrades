<?php
include('session.php');
include('controller/dbController.php');
include('barLine.html');
include('loadNoty.js');

$intakeYears = getAllIntakeYears();

?>

<!DOCTYPE html>
<html>
<head>
    <link href="styles/compareAdminStyle.css" rel="stylesheet" type="text/css">
    <title>Compare <?php echo $login_session; ?><</title>
</head>
<body>
    <!-- Div with selectbox to select intake year -->
    <div class = "intakebox">  
        <center>
        <select id=selectSem name=sem       value=''onchange="showStudents(this.value)">Intake Year</option>
            <option value=''>Intake Year</option>
            <?php 
                foreach ($intakeYears as $row){
                echo "<option value=$row[intake]>$row[intake]</option>"; 
            }?>
        </select>
        </center>    
    </div>

    <script>
        showinfo("Select Intake Year first");
    </script>

    <!-- Left student's box Div -->
    <div class ="studentOnebox">
        <select id="tempSelect" style="display:none"></select>
        <div class="propic"><center><img src="resources/img/defaultProfilePic.png" style="height:100; width:100;">      </center>
        </div> 
        <h1><span class="data"><center>Student One</center></span><br>  </h1>
    </div>

        <!-- Right student's box Div-->
    <div class ="studentTwobox">
        <select id="tempSelect" style="display:none"></select>

        <div class="propic"><center><img src="resources/img/defaultProfilePic.png" style="height:100; width:100;"></center>
        </div> 
        <h1><span class="data"><center>Student Two</center></span><br>  </h1>
    </div>

    <!-- Dive to place AJAX table-->
    <div class="compareBox"></div>        

    <!-- These will be replaced with AJAX-->
    <div id ="txtShowStudents" class=""></div>
    <div id ="txtGetSecond" class=""></div>

    <div id ="txtCompare" class=""></div>

    <div id="selectStudent2"></div>

    <script>
    function getSecond(str){
    if (str == "") {

        showError("Select student one first.");

        } else { 

            var year = document.getElementById('selectSem').value

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtGetSecond").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","compareAdminGetSecond.php?q="+str+"&y="+year,true);
            xmlhttp.send();
        }
    }    
    </script>


    <script>
    function compare(str) {
        if (str == "") {

        showError("Select two students to compare!");

            return;
        } else { 
             var studentOneId = document.getElementById('studentOne').value

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtCompare").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","compareAdminGetCompare.php?two="+str+"&one="+studentOneId,true);
            xmlhttp.send();
        }
    }
    </script>

    <script>
    function showStudents(str) {
        if (str == "") {

        showError("Select someone to compare!");

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
                    document.getElementById("txtShowStudents").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","compareAdminGetStudents.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>

</body>
</html>