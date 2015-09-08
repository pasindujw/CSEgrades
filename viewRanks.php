<?php
include('session.php');
include('dbConnector.php');
include('barLine.html');
//query to get enrolled course titles
$query = mysql_query("select title,code from takes natural join course where id ='$login_session'", $connection);

$coursetitles = array();
while ($row_user = mysql_fetch_assoc($query))
    $coursetitles[] = $row_user;

?>

<!DOCTYPE html>
<html>
<head>
<title>View Ranks <?php echo $login_session; ?></title>
<link href="styles/viewRanksStyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class = "optionbox">  
    
    <h1>Select the course</h1></br>
<?php    
echo "<select id=selectCourse name=course value=''>Coure Title</option>"; // list box select command

foreach ($coursetitles as $row){
    
echo "<option value=$row[code]>$row[title]</option>"; 

/* Option values are added by looping through the array */ 

}
 echo "</select>";
    
    ?>
    </div>
    <button id= "btnView" onclick ="" class="btn btnview">View Ranks</button>
                                                                        <script>
    document.getElementById("btnView").onclick = function (){
        var e = document.getElementById("selectCourse");
        var strUser = e.options[e.selectedIndex].value;
        
        location.href = "showRanks.php?course="+strUser;};
</script>                                                                                  
    
</body>
</html>