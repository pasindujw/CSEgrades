<?php
include('session.php');
include('dbConnector.php');
include('barLine.html');
include('loadNoty.js');
//query to get enrolled course titles
$query = mysql_query("select title,code from course", $connection);

$coursetitles = array();
while ($row_user = mysql_fetch_assoc($query))
    $coursetitles[] = $row_user;

?>
<html>
<head>
<link href="styles/viewRanksAdminStyle.css" rel="stylesheet" type="text/css"> 
    
<script>
function showUser(str) {
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
<script>
function showRanks() {
    alert("ooo");
    if (str == "") {
        document.getElementById("txtRanks").innerHTML = "";
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
        xmlhttp.open("GET","viewRanksAdminGetRanks.php?year="+str"&code="+code,true);
        xmlhttp.send();
    }
}    
   </script>
    
    </head>
<body>
<script>
  var n = noty({
        layout: 'topCenter',
        type: 'information',
        timeout: '2000',
    text: 'Select Course First',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});
</script>
    
    
    
<div  class="login">    
<form>
<h3>Select Course</h3>
<select id=selectCourse name="users" onchange="showUser(this.value)">
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
<div id="txtHint"><b></b></div>
    
<div id="txtRanks"><b></b></div>
    

<script>
function myFunction() {
    
    var e = document.getElementById("selectYear");
    var year = e.options[e.selectedIndex].value;
    
     var e = document.getElementById("selectCourse");
    var code = e.options[e.selectedIndex].value;
    
    if (year == "") {
        document.getElementById("txtRanks").innerHTML = "";
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

    
</body>
</html>