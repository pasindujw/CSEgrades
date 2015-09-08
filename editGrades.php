<?php
include('session.php');
include('barLine.html');
include('loadNoty.js');
include('controller/dbController.php');
include('editGradesPhp.php');

$query = mysql_query("select * from gradevalues", $connection);

$gradeValues = getAllGradeValues();

?>

<html>
<head>
    <link href="styles/editGradesStyle.css" rel="stylesheet" type="text/css"> 
    <title>Edit Grades <?php echo $login_session; ?><</title>
</head>
<body>
     <script>
        showinfo("Change the grade values as needed");
    </script>

        <!-- Div to display the grade values -->
    <div  class="gradeBox">    
        <form action="" method="post">
            <center><h3>Grade Values</h3></center>
            <?php 
                $tab="\t";
                foreach ($gradeValues as $row){
                    echo '<label id="lbl">'.$row["grade"].'</label>'.$tab.'<input name="'.$row["grade"].'"value="'.$row["value"].'" type="text"><br/>';

                }
            ?>
            <center><input name="submit" type="submit" value="Save Changes"></center>
        </form>
    </div>
</body>
</html>
