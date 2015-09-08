<?php
include('session.php');
include('controller/dbController.php');

$courseCode= $_SESSION["code"];

$year = $_GET["year"];

$ranks = getStudentsInfoOderOfRanks($courseCode,$year);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ranks<?php echo $login_session; ?></title>
    <link href="styles/viewRanksAdminStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Div to show people and ranks -->
    <div class = "optionbox">  
        <h1><center>Rankings</center></h1></br>
        <?php    
            $count =0;
            $preGrade='Z';
            $countholts=0;
            foreach ($ranks as $row){
                if($row['grade']!=$preGrade){
                    $countholts++;
                    $count=$count+$countholts;
                    $preGrade=$row['grade'];
                    $countholts=0;
                }
                else{
                    $countholts=$countholts+1;
                }
                echo '<label class="data"><b>'.$count.'. '.$row["name"].' ('.$row["id"].')</b></label>'; 
                echo '<br>';
                echo '<table><tr><td>';
                echo '<img class="imageBox" src="data:image/jpeg;base64,'.base64_encode( file_get_contents($row["image"]) ).'" width="100" height="100" />';
                echo '</td><td><div class="gradeCircle">'.$row["grade"].'</div></td></tr></table>';
                echo '<br><br><br>';
                //$count = $count+1;    
            }
        ?>    
    </div>
</body>
</html>