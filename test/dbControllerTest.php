<?php
    include('../controller/dbController.php');

class testcase extends PHPUnit_Framework_TestCase
{
    public function testGetStudentInfo(){
        $ar=array();
        $ar['id']='120273G';
        $ar['name']='Pasindu Jayaweera';
        $ar['intake']='2012';
        $ar['image']='resources/img/profilePics/120273G.png';
        
        $this->assertEquals($ar,getStudentInfo('120273G'));
    }
}