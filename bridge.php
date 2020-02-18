<?php
/**
 * Абстракция устанавливает интерфейс для «управляющей» части двух иерархий
 * классов. Она содержит ссылку на объект из иерархии Реализации и делегирует
 * ему всю настоящую работу.
 */
class Abstraction
{
	protected $implementation;
	
	public function __construct(Implementation $implementation)
	{
		$this->implementation = $implementation;
		
	}
	public function operation():string
	{
		return "Abstraction Base operation with:\n".
		       $this->implementation->operationImplementation();
	}
}

class ExtendedAbstraction extends Abstraction
{
	public function operation():string 
	{
		return "Abstraction Base operation with:\n".
		       $this->implementation->operationImplementation();
	}
}

interface Implementation
{
	public function operationImplementation();
	
}

class ConcreteImplementationB implements Implementation
{
	public function operationImplementation():string
	{
		return 'ConcreteImplementation: Here is the result on the platform B.\n';
	}
}
class ConcreteImplementationA implements Implementation
{
	public function operationImplementation():string
	{
		return 'ConcreteImplementation: Here is the result on the platform A.\n';
	}
}

function clientCode(Abstraction $abstraction)
{
	echo $abstraction->operation();
}

$implementation = new ConcreteImplementationA;
$abstraction = new Abstraction($implementation);

$implementation = new ConcreteImplementationB;
$abstraction2 = new ExtendedAbstraction($implementation);

clientCode($abstraction);
echo "\n";
clientCode($abstraction2);
