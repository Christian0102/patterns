<?php
class Laptop
{
	protected $model = 'HP S300c';
	protected $display  = '15 inch';
	
	public function __construct()
	{
		return true;
	}
	
	
}

class Sinergo
{
	protected $name = 'SinergoITCompany';
	
	
	
}


class Employee extends Sinergo
{
	protected $firstName;
	protected $lastName;
	protected $age;
	
	protected $component;
	
	public $references;
	
	public function __construct($firstName, $lastName, $age)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->age = $age;
		$this->component = new Laptop();
	}
	
	public function __clone()
	{
		$this->component = clone $this->component;
		
		$this->references = clone $this->references;
		$this->references->prototype = $this;
		
	}
	
}

class ComponentWithBackReferences
{
	public $prototype;
	
	public function __construct(Employee $employe)
	{
		$this->prototype = $employe;
	}
	
}

$mina = new Employee('Mina', 'Ionita', 22);

$mina->references = new ComponentWithBackReferences($mina);

$mina2 = clone $mina;
print_r($mina2);
