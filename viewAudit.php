<?php
include('session.php');
//include('dbConnector.php');
include('barLine.html'); 
//include('viewAuditGetRecords.php');
?>

<!DOCTYPE html>
<html>
<head>
     <title>View Audit <?php echo $login_session; ?><</title>
    
</head>
    <!-- Select Box to select number of records-->
    <center>No. of Records: <select id=selectNumber name="users" onchange="showAudit(this.value)">
                <option value="100">100</option></center>
                <option value="500">300</option></center>
                <option value="1000">1000</option></center>
                <option value="1000">5000</option></center>
                <option value="1000">10000</option></center>
                <option value="*">All</option></center>
    </select>
<body>
    <!-- This div will change with AJAX-->
    <div id="txtShowAudit" class="txtShowAudit"></div>
    <script>
        //ajax command
        function showAudit(str) {
            if (str == "") {

            showError("ERROR: Please select number of records needed.");

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
                        document.getElementById("txtShowAudit").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","viewAuditGetRecords.php?limit="+str,true);
                xmlhttp.send();
            }
        }
        </script>


    <script>showAudit("100");</script>
</body>

</html>