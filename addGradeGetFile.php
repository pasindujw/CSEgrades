<html>
<body>
<form name="import" method="post" enctype="multipart/form-data">
     <input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
</form>
    
    </body>
</html>

<?php

if(isset($_POST["submit"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $name = $filesop[0];
 $email = $filesop[1];
 
 $sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
 }
 
 if($sql){
 echo "You database has imported successfully";
 }else{
 echo "Sorry! There is some problem.";
 }
}

?>