<?php
if(isset($_POST["submit"]))
{
    if (!empty($_POST['code']) || !empty($_POST['year']) || !empty($_POST['semester'])) {
            $code = $_POST['code'];
            $year = $_POST["year"];
            $sem =  $_POST["semester"];

         $file = $_FILES['file']['tmp_name'];
         $handle = fopen($file, "r");
         $c = 0;
         while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
         {
             $id = $filesop[0];
             $grade = $filesop[1];
             $sql = addGradesToCourse($id,$code,$year,$sem,$grade);
         }
         if($sql){
             echo '<script>showSuccess("Grades are successfully added!");</script>';
             }else{
             echo '<script>showError("ERROR: Grades adding unsuccessful");</script>';
            }
        }
        else{
            echo '<script>showError("ERROR: Details are not filled properly");</script>';
        }
}
?>
