<?php
/*Acesta este un model de Singleton Design Patterns*/
/*1.Se foloseste cind ai nevoie ca in sistem trebuie sa nu fie mai dult de 
 * un obiect in care sa inscrii niste setari
 * si sa fie globale*/
 /*2.Obiectul trebuie sa fie accesibil pentru din orice punct din sistem*/
 /*3.In sistem trebuie sa nu fie mai mult de un obiect*/
 /*4 Singleton se foloseste ca in loc de o variabila global*/

Class Preferences
{
	private $props = array();
	private static $instance;
	
	private function __construct(){
	}
	public static function getInstance()
	{
		if(empty(self::$instance)){
			self::$instance = new Preferences();
		}
		return self::$instance;
	}
	
	public function setProperty($key, $val){
		$this->props[$key] = $val;
		
	}
	public function getProperty($key){
		return $this->props[$key];
	}

}

$pref = Preferences::getInstance();
$pref->setProperty("name","Christian");
$pref2 = Preferences::getInstance();

unset($pref);

print_r($pref2->getProperty("name")."\n");
?>





