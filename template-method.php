<?php


abstract class AbstractClass
{
	final public function templateMethod():void
	{
		$this->baseOperation1();
        $this->requiredOperations1();
        $this->baseOperation2();
        $this->hook1();
        $this->requiredOperation2();
        $this->baseOperation3();
        $this->hook2();
	}
	
	protected function baseOperation1():void
	{
		echo "AbstractClass says: I am doing the bulk of the work";
	}
	
	protected function baseOperation2():void
	{
		echo "Abstract Class says: But i let subclasses override some operations\n";
	}
	
	protected function baseOperation3():void
	{
		echo "Abstract Class says: But I am doing the bulk of the work anyway \n";
	}
	
	abstract protected function requireOperations1():void;
	
	abstract protected function requireOperation2():void;
	
	protected function hook1():void{/* */}
	protected function hook2():void{/* */}
}

class ConcreteClass1 extends AbstractClass
{
	protected function requireOperations1():void
	{
		echo "ConcreteClass1 says: Implemented Operations1 \n";
	}
	
	protected function requireOperation2():void
	{
		echo "ConcreteClass1 says: Implemented Operation2 \n";
	}
}


class ConcreteClass2 extends AbstractClass
{
	protected function requireOperations1():void
	{
		echo "ConcreteClass2 says: Implemented Operations1 \n";
	}
	
	protected function requireOperation2():void
	{
		echo "ConcreteClass2 says: Implemented Operation2 \n";
	}
}


function clientCode(AbstractClass $class)
{
	$class->templateMethod();
}

echo "Same client code can work with different subclasses:\n";
clientCode(new ConcreteClass1);
echo "\n";

echo "Same client code can work with different subclasses:\n";
clientCode(new ConcreteClass2);
