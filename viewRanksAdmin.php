<?php
include('session.php');
include('barLine.html');
include('loadNoty.js');
include('controller/dbController.php');
//query to get enrolled course titles

$coursetitles = getAllCourseTitleCode();


?>
<html>
<head>
    <link href="styles/viewRanksAdminStyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>
    <script>
      showinfo("Select Course First");
    </script>
    <!--Div to selectbox of the Course -->
    <div  class="login">    
        <form>
            <h3>Select Course</h3>
            <select id=selectCourse name="users" onchange="showYears(this.value)">
                <option value="">Course Title</option>
                <?php 
                foreach ($coursetitles as $row){
                echo "<option value=$row[code]>$row[title]</option>"; 
                }
                ?>
            </select>   
        </form>
    </div>
    <br>
    <!-- THis div will change with AJAX-->
    <div id="txtHint"><b></b></div>
    
    <!-- THis div will change with AJAX-->
    <div id="txtRanks"><b></b></div>

    <script>
    //to get the final rankings
    function showRanks() {
        var e = document.getElementById("selectYear");
        var year = e.options[e.selectedIndex].value;

         var e = document.getElementById("selectCourse");
        var code = e.options[e.selectedIndex].value;

        if (year == "") {
              showError("ERROR: Select an year!");
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
                    document.getElementById("txtRanks").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","viewRanksAdminGetRanks.php?year="+year,true);
            xmlhttp.send();
        }
    }
    </script>
    <script>
        //to get the possible years of the selected course
    function showYears(str) {
        if (str == "") {
           showError("ERROR: Select Course First!");
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
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","viewRanksAdminGetYear.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>
</body>
</html>