<?php

$dbhost='localhost';
$dbuser='root';
$dbpassword='';
$db='academy';
    

$connection = mysql_connect($dbhost, $dbuser,$dbpassword);

// Selecting Database
$db = mysql_select_db($db, $connection);

include('dbController.php');
$ar = getStudentInfo('120273G');
echo $ar["name"];


class testcase extends PHPUnit_Framework_TestCase
{

    //getStudentInfo
	public function testGetStudentInfoWithExistingStudent()
	{
        $ar =array();
        $ar['id']='120273G';
        $ar['name']='Pasindu Jayaweera';
        $ar['image']='resources/img/profilePics/120273G.png';
        $ar['intake']='2012';
        
		$this->assertEquals($ar,getStudentInfo('120273G'));
    }
    public function testGetStudentInfoWithNonExistingStudent(){
    
    
    $this->assertFalse(getStudentInfo('AAA'));
    }
    
    //getCurrentGpa
    public function testGetCurrentGpaWithExistingStudent(){
    
    $this->assertEquals('2.37667',getCurrentGpa('120273G')['gpa']);
    
    }
    public function testGetCurrentGpawithNonExistingStudent(){
    
        $this->assertNull(getCurrentGpa('120G')['gpa']);
    

    }

    public function testGetCurrentSemGpa(){
        $this->assertNull(getCurrentGpa('000')['gpa']);
    }

    public function testGetCurrentSemGpaWithTrueGpa(){
        $trueGpa='1.33';
        $this->assertEquals($trueGpa,getSemGpa('3','120273G'));
    
    }
    
    
    
}




?>