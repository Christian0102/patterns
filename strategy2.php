<?php
interface Test1
{
	public function getAge();
	
	public function getJobs();
}



abstract class Invisible implements Test1 
{
	
	public abstract function baseName();
	
	public function getAge(){
    	return rand();
	}
	
	public function getName() {
		
		return "John Doe";
	}
	
	public function getJobs() {
		echo 'Developer';
	}
	
}

class Christian extends Invisible 
{
	public function __construct() {
		echo 'Christian the Best';
	}
	
	public  function baseName() {
		return __CLASS__;
	}
	
	
	
}


$Man = new Christian();



