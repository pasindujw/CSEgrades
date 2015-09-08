<?php

//get certain student details
function getStudentInfo($id){
    $query = mysql_query("select * from student where id ='$id'");
    $record = mysql_fetch_assoc($query);
    return $record;
}

//get enrolled course titles for certain student
function getEnrolledCourseTitles($id){
    if($query = mysql_query("select title,code from takes natural join course where id ='$id'")){

    $coursetitles = array();
    while ($row_user = mysql_fetch_assoc($query))
        $coursetitles[] = $row_user;
    return $coursetitles;
    }
    return false;
}

//get current GPA of a certain student
function getCurrentGpa($id){
    if($query = mysql_query("select sum(value*credits)/sum(credits) as gpa from takes natural join gradevalues natural join course where id = '$id'")){

    $currentgpa = mysql_fetch_assoc($query);
    return $currentgpa;
}
    return false;
    
}
//get the number of followed semesters for a certain student
function getNumberOfSemestersPassed($id){
    $query = mysql_query("select distinct semester from takes where id = '$id'");

    $semList= array();
    while ($row_user = mysql_fetch_assoc($query))
        $semList[] = $row_user;
    return $semList;
}

//get semester GPA for a certain student's certain semester
function getSemGpa($sem,$login_session){
    $query = mysql_query("select gpa from semesterGpa where id='$login_session' and semester='$sem';");

    $gpa = mysql_fetch_assoc($query);   
    $gpa = round($gpa['gpa'],2);
    return $gpa;
}

//get batchfriends details
function getAllStudentsNameIdFromIntake($intake){
    $query = mysql_query("select name,id from student where intake ='$intake'");
$batchStudents = array();
    while ($row_user = mysql_fetch_assoc($query))
        $batchStudents[] = $row_user;

    return $batchStudents;
}

//get the mutual courses and their grades for two students
function getMutualCourseDetailsTwoStudents($id1,$id2){
    $query = mysql_query("select code,(select title from course where code=p.code) as title,(select grade from takes where id='$id1' and code=p.code) as mine,(select grade from takes where id='$id2' and code=t.code) as his from (select code from takes where id='$id2') as t natural join takes as p where id='$id1';");
    
    while ($row_user = mysql_fetch_assoc($query))
    $result[] = $row_user;

    return $result;
 
}

//get the batch friends of a certain student
function getBatchFriendsOfStudent($id){
    $query = mysql_query("select * from student where intake in (select intake from student where id ='$id')");

    $batchFriends = array();
        while ($row_user = mysql_fetch_assoc($query))
            $batchFriends[] = $row_user;
    return $batchFriends;
}

//get the enrolled Courses (only the code is returned)
function getEnrolledCourses($student){
    $qy = mysql_query("select code from takes where id ='$student'");

    $courseList = array();
    while ($row_user = mysql_fetch_assoc($qy)){
        $courseList[] = $row_user;
    }

        return $courseList;
}

//to get all course titles and codes of the courses
function getAllCourseTitleCode(){
    $query = mysql_query("select title,code from course");
    while ($row_user = mysql_fetch_assoc($query))
    $courseinfo[] = $row_user;

    return $courseinfo;
}

//get enrolled course titles
function getAvailableYearsForCode($code){
    $query = mysql_query("select year from takes where code = '$code' group by year");

    $years = array();
    while ($row_user = mysql_fetch_assoc($query))
        $years[] = $row_user;
    return $years;
}

//get batch students in order of rankings of a certain course
function getStudentsInfoOderOfRanks($courseCode,$year){
    $query = mysql_query("select * from takes natural join gradevalues natural join student where code ='$courseCode' and year='$year'order by value desc");

    $ranks = array();
    while ($row_user = mysql_fetch_assoc($query))
        $ranks[] = $row_user;


    return $ranks;
}

//get a password of a certain student
function getPassword($id){
  $query = mysql_query("select password from login where username='$id'");
    
    $arr = mysql_fetch_assoc($query);
    return $arr;
}

//set the newpassword
function setPassword($id,$hashedNewPassword){
  $query = mysql_query("Update login set password ='$hashedNewPassword' where username='$id'");

}

//get the details of a certain lecturer
function getLecturerInfo($username){
$query = mysql_query("select * from lecturer where username ='$username'");

$record = mysql_fetch_assoc($query);
    return $record;

}

//get the total intake years of the academy
function getAllIntakeYears(){
    $intakeQ = mysql_query("select distinct intake from student");

    $intakeYears = array();
    while ($row_user = mysql_fetch_assoc($intakeQ))
        $intakeYears[] = $row_user;

    return $intakeYears;
}

//get students details who have common courses with a certain user
function getStudentInfoCommonCourseFollowed($id){
    $students = mysql_query("select distinct id,name,image from takes natural join student where code in (select code from takes where id = '$id')");

    $secondOptionStudents = array();
    while ($row_user = mysql_fetch_assoc($students))
       $secondOptionStudents[] = $row_user;


    return $secondOptionStudents;
}

//get the year of certain student's certain semester
function getYearOfStudentSemester($semester,$id){
$query = mysql_query("select year from takes where semester ='$semester' and id ='$id'");

$yr= mysql_fetch_assoc($query);

return $yr["year"];
}

//get all the courses enrolled by certain student for certain semester
function getAllCourseEnrolledForSemester($semester,$id){
$query = mysql_query("select code from takes where semester ='$semester' and id ='$id'");

$codeList = array();
while ($row_user = mysql_fetch_assoc($query))
    $codeList[] = $row_user;

return $codeList;
}

//get batch stats for mutual course of a certain student for a certain semester Min,Max,Average
function getBatchStatsForSemester($semester,$id,$year){
  $query = mysql_query("Select title,code,max(credits*value) as max,min(credits*value) as min,avg(credits*value) as avg from takes natural join gradevalues natural join course where semester='$semester' and year='$year' and code in (select distinct code from takes where id='$id') group by code;");

    $courseStats = array();
    while ($row_user = mysql_fetch_assoc($query))
        $courseStats[] = $row_user;


return $courseStats;

}

//getCredits for a certain user's certain course
function getMyCredits($code,$user){
    $query = mysql_query("select credits*value as myCreds from takes natural join gradevalues natural join course where id ='$user' and code ='$code'");
    $cred= mysql_fetch_assoc($query);
    return $cred;
}

//get total number of students for a certain course in certain semester in certain year
function getTotalStudentsForCourse($code,$year,$semester){ 
    $query = mysql_query("select count(id) as count from takes where year ='$year' and code ='$code' and semester='$semester'");
    $tot= mysql_fetch_assoc($query);
    $total=$tot["count"];
    return $total;
}

//to get the title of a certain course code
function getTitle($code){
    $ses_sql=mysql_query("select title from course where code='$code'");
    $row = mysql_fetch_assoc($ses_sql);

    return $row;
}

//to add new course
function addCourse($title,$code,$credits){
   return (mysql_query("INSERT INTO course(title,code,credits) VALUES ('$title','$code','$credits')"));

}

//get certain lecturer's teaching courses
function getAllCourseLectureTeach($username){
    $query = mysql_query("select title,code from teaches natural join course where username ='$username'");

    $coursetitles = array();
    while ($row_user = mysql_fetch_assoc($query))
        $coursetitles[] = $row_user;

    return $coursetitles;
}

//add grades to the database
function addGradesToCourse($id,$code,$year,$sem,$grade){

 $sql = mysql_query("INSERT INTO takes (id,code,year,semester, grade) VALUES ('$id','$code','$year','$sem','$grade')");

return $sql;
}


//get all the course titles and codes from the database
function getAllCourseDetails(){
$query = mysql_query("select title,code from course");

$coursetitles = array();
while ($row_user = mysql_fetch_assoc($query))
    $coursetitles[] = $row_user;

return $coursetitles;
}

//update an exisitng course with new details
function updateCourseTitleCredits($code,$title,$credits){
 $query = mysql_query("Update course set title ='$title',credits='$credits' where code='$code'");
    return $query;
}

//select all from audit table
function getLimitedAuditRecords($limit){

$query = mysql_query("select * from audit order by time desc limit $limit");
    
$auditRecords = array();
while ($row_user = mysql_fetch_assoc($query))
    $auditRecords[] = $row_user;

return $auditRecords;
}

//function to get all audit records
function getAllAuditRecords(){

$query = mysql_query("select * from audit order by time desc");
    
$auditRecords = array();
while ($row_user = mysql_fetch_assoc($query))
    $auditRecords[] = $row_user;

return $auditRecords;
}

//get all records from the gradevalues table
function getAllGradeValues(){

$query = mysql_query("select * from gradevalues");

$gradeValues = array();
while ($row_user = mysql_fetch_assoc($query))
    $gradeValues[] = $row_user;

return $gradeValues;

}

//update the value of a certain grade
function updateGradeValues($grade,$val){
$query = mysql_query("update gradevalues set value = '$val' where grade = '$grade'");

}

//check and get back username if available
function checkAndGetBackUsername($username){
    $ses_sql=mysql_query("select username from login where username='$username'");
        $row = mysql_fetch_assoc($ses_sql);
return $row;
}

//add new user to login record
function addNewLoginUser($username,$hashedPassword,$type){
    $sql = mysql_query("INSERT INTO login(username,password,type) VALUES ('$username','$hashedPassword','$type')");

return $sql;

}

//add new guest to guest
function addNewGuest($username,$name,$info){
 $q= mysql_query("INSERT into guest(username,name,info) values('$username','$name','$info')");

}

//add new admin to admin
function addNewAdmin($username,$name,$info,$email){
   $q= mysql_query("INSERT into lecturer(username,name,info,email) values('$username','$name','$info','$email')");

}

//get batchwise avg max min for a certain module
function getBatchwiseStats($code){
    $query = mysql_query("Select intake,title,code,year,semester,max(credits*value) as max,min(credits*value) as min,avg(credits*value) as avg from takes natural join student natural join gradevalues natural join course where code='$code' group by intake;");

    $batchwiseStats = array();
while ($row_user = mysql_fetch_assoc($query))
    $batchwiseStats[] = $row_user;

return $batchwiseStats;
    
}

//get teaching courses of a certain lecturer
function getTeachingCourses($username){
      $query = mysql_query("Select code from teaches where username ='$username';");
$courseList = array();
while ($row_user = mysql_fetch_assoc($query))
    $courseList[] = $row_user;

return $courseList;

}

?>


