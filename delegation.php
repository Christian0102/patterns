<?php
interface TestInterface
{
	public function test():void;
}

interface Parinte
{
	public function parinte():void;
}


interface MessangerInterface
{
	public function setSender($value):MessangerInterface;
	
	public function setRecipeint($value):MessangerInterface;
	
	public function setMessage($value):MessangerInterface;
	
	public function send():bool;
	
}


abstract class AbstractMessanger implements MessangerInterface, Parinte
{
	private $sender;
	
	private $recipient;
	
	private $message;
	 private $test;
	
	public function setSender($value):MessangerInterface
	{
		$this->sender = $value;
		
		return $this;
	}
	
	public function setRecipeint($value):MessangerInterface
	{
		$this->recipient = $value;
		
		return $this;
	}
	
	public function setMessage($value):MessangerInterface
	{
		$this->message = $value;
		
		return $this;
	}
	
	public function send():bool
	{
		
		return true;
		
	}
	
	public function parinte():void
	{
		echo "Methoda Parinte Interfata Parinte";
	}
	abstract public function parinte2():void;
	
	
}

class EmailMessanger extends AbstractMessanger implements TestInterface
{
	public $test;
	
	public function send():bool
	{
		echo "Sent BY Method: ".__METHOD__."Class: ".__CLASS__."\n";
		return parent::send();
	}
	
	public function test():void
	{
		echo "Test Method EmailMessanger";
	}
	
	public function parinte2():void
	{
		echo "methoda parinte2 class EmailMesanger;";
	}
	
}


class SmsMessanger extends AbstractMessanger implements TestInterface
{
	
	public function send():bool
	{
		echo "Sent BY Method: ".__METHOD__."Class: ".__CLASS__."\n";
		return parent::send();
	}
	
	public function test():void
	{
		echo "Test Method EmailMessanger";
	}
	
	public function parinte2():void
	{
		echo "methoda parinte2 class SmsMessanger;";
	}
	
}

class AppMessanger implements MessangerInterface 
{
	public  $messanger;
	
	public function __construct()
	{
		$this->toEmail();
	}
	
	public function toEmail()
	{
		$this->messanger = new EmailMessanger();
		return $this;
	}
	
	public function toSMS()
	{
		$this->messanger = new SmsMessanger();
		return $this;
	}
	
	
	public function setSender($value):MessangerInterface
	{
		$this->messanger->setSender($value);
		
		return $this->messanger;
	}
	
	public function setRecipeint($value):MessangerInterface
	{
		$this->messanger->setRecipeint($value);
		
		return $this->messanger;
	}
	
	public function setMessage($value):MessangerInterface
	{
		$this->messanger->setMessage($value);
		
		return $this->messanger;
	}
	
	public function send():bool
	{
		
		return $this->messanger->send();
		
	}
	
	
}

function clientCode()
{
	$app = new AppMessanger();
	$app->setSender('Christian');
	$app->setMessage('Hello Christina');
	$app->send();
	
	
	$app->toSMS();
	$app->setSender('Christian');
	$app->setMessage('Hello Christina');
	$app->send();
}



$app = new AppMessanger();
$app->messanger->parinte();


