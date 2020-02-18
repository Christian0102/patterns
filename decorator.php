<?php

//Acest pattern e arhitectura se foloseste  cind dorim sa adaugam functionalitatea la obiect
class Hello
{
	public function operation()
	{
		return 'Hello';
	}
	
}
class Decorator
{
	protected $object;

	public function __construct($object)
	{
	$this-> object = $object;
	}
	protected function getObject()
	{
		return $this->object;
	}
	public function operation()
	{
		return $this->getObject()->operation();
	}
	
}

class AddWorld extends Decorator
{
	public function operation()
	{
		return parent::operation()."World";
	}
	
}

class StrongLetters extends Decorator
{
	public function operation()
	{
		return "<strong>".parent::operation()."</strong>";
	}
	
}

$hello = new Hello;
$AddWorld = new AddWorld($hello);
$Strong = new StrongLetters($hello);
echo $Strong->operation().$AddWorld->operation();



