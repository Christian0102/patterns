<?php
/**
 * Интерфейс Обработчика объявляет метод построения цепочки обработчиков. Он
 * также объявляет метод для выполнения запроса.
 */
interface Handler
{
	public function setNext(Handler $handler): Handler;
	public function handle(string $request): ?string;
}
/**
 * Поведение цепочки по умолчанию может быть реализовано внутри базового класса
 * обработчика.
 */
abstract class AbstractHandler implements Handler
{
	
	private $nextHandler;
	
	public function setNext(Handler $handler):Handler
	{
		$this->nextHandler = $handler;
		// Возврат обработчика отсюда позволит связать обработчики простым
        // способом, вот так:
        // $monkey->setNext($squirrel)->setNext($dog);
		return $handler;
		
	}
	
	public function handle(string $request):?string
	{
		if($this->nextHandler) {
			return $this->nextHandler->handle($request);
		}
		return null;
		
	}
	
}

class MonkeyHandler extends AbstractHandler
{
	public function handle(string $request): ?string
	{
		if($request == 'Bannana') {
			
			return "Moneky I'll eat the ".$request."\n";
			
		} else
		     {
				 return parent::handle($request);
		     }
	}
	
}

class SquirreHandler extends AbstractHandler
{
	public function handle(string $request):?string 
	{
		if($request == "Nut") {
			return "Squirrel: I'll eat the ".$request.".\n";
			
		} else {
			return parent::handle($request);
			
		}
		
	}
	
}

class DogHandler extends AbstractHandler
{
	public function handle(string $request): ?string
	{
		if($request == "MeatBall")
		{
			return "Dog : I'll eat the ". $request . ".\n";
		} 
		else 
		     {
				 return parent::handle($request);
		     }
	}
}


function clientCode(Handler $handler)
{
	foreach(['Nyt', 'Bannana', 'Cup of Coffe'] as $food) {
		echo 'Client:who wants a '.$food . "?\n";
		$result = $handler->handle($food);
		if($result) {
			echo " ". $result;
			
		} else {
			echo " ".$food. "was left untoouched.\n";
		}
	}
	
}



$monkey = new MonkeyHandler;
$squirrel = new SquirreHandler;
$dog = new DogHandler;

$monkey->setNext($squirrel)->setNext($dog);



echo "Chain: Monkey > Squirrel > Dog\n\n";
clientCode($monkey);
echo "\n";

echo "Subchain: Squirrel > Dog\n\n";
clientCode($squirrel);

