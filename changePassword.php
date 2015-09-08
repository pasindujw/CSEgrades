<?php
include('session.php');
//include('dbConnector.php');
include('barLine.html');
include('loadNoty.js');
include('changePasswordPhp.php');
?>

<html>
<head>
<link href="styles/changePasswordStyle.css" type="text/css" rel="stylesheet">
    <title>Change Password <?php echo $login_session; ?><</title>
</head>
<body>
    <!-- The outer frame of the form -->
    <div id="detailBox">
        <label class="topic"><br><center>Change Password</center><br></label>
        <!-- fORM containing the input fields -->
        <form type ="" action="" method="post">
            <label>Old Password :</label><br>
            <input style=""id="title lbl" name="oldPw" value="" type="password">

            <label>New Password :</label>
            <input id="code" name="newPw" value="" type="password">
            <label>Confirm New Password :</label>
            <input id="credits" name="confNewPw" value="" type="password">
            <input name="submit" type="submit" value=" Change Password ">
        </form>
    </div>

    <script>
        //this is to give some advices about selecting a proper password
        var myVar1 = setTimeout(function () {adviceTitle()}, 4000);
        var myVar2 = setTimeout(function () {adviceOne()}, 5000);
         var myVar3 = setTimeout(function () {adviceTwo()}, 7000);
        var myVar4 = setTimeout(function () {adviceThree()}, 9000);
        var myVar5 = setTimeout(function () {adviceFour()}, 11000);

        function adviceTitle(){
          showPasswordSugTitle("A Strong Password always;");      
        }

        function adviceOne(){
          showPasswordSug("Has at least 12 Characters");      
        }
        function adviceTwo(){
          showPasswordSug("Includes Numbers, Symbols, Capital Letters, and Lower-Case Letters");      
        }
        function adviceThree(){
          showPasswordSug("Isn’t a Dictionary Word or Combination of Dictionary Words");      
        }
        function adviceFour(){
          showPasswordSug("Doesn’t Rely on Obvious Substitutions");      
        }
    </script>
    <script>
        function reDirect(){
            location.href = 'index.php';
        }
    </script>

</body>
</html>



