<?php

include_once "finalize.php";


class testcase extends PHPUnit_Framework_TestCase
{

	public function testTest1()
	{
		$this->assertEquals(0,1);
	}

	public function testTest3()
	{
		$this->assertEquals("L001",dayFunc("Friday"));
	}
}


 
?>