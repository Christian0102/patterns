<?php
class Children
{
	public $gender = 'men' ;
	public $eyes = 'carie';
	public $height = '172';
	public $father;
	public $mother;
	public function __construct($father, $mother)
	{
		$this->father = $father;
		$this->mother = $mother;
		
	}
	public function playGame()
	{
		return 'Play Game';
	}
	
}

class Cristian
{
	public $gender = 'men' ;
	public $eyes = 'carie';
	public $height = '172';
	
	public function __construct()
	{
		
		echo 'Chritian is Create';
		
	}
	public function getMoney()
	{
		return 'Money';
		
	}
	public function getSmile()
	{
		return 'Smile';
	}
	public function love()
	{
		return 'love';
	}
	
	
}

class Cristina
{
	public $gender = 'men' ;
	public $eyes = 'carie';
	public $height = '172';
	
	public function __construct()
	{
		echo 'Christina is Create';
	}
	public function getMoney()
	{
		return 'Money';
	}
	public function getChildren()
	{
		return new Children($father,$this);
	}
	public function love()
	{
		return 'love';
	}
	
	
}

class Relation
{
	public $relation;
	public $men;
	public $woman;
	public function __construct($men, $woman)
	{
		$this->men = $men;
		$this->woman = $woman;
		if(isset($men) && isset($woman)) {
			$this->relation = 'good';
		}
	}
	
	public function gootTimeToghere()
	{
		return 'GoodTime';
	}
	public function getHouse()
	{
		return 'Beatiful House';
	}
	public function love()
	{
		return 'love';
	}
	public function longRelation()
	{
		return 'Long Relation';
	}
	
}
$cristian = new Cristian();
$cristina = new Cristina();
$relation = new Relation($cristian, $cristina);
echo $relation->gootTimeToghere();
echo $relation->getHouse();
echo $relation->love();
echo $relation->longRelation();
echo '<pre>';
var_dump($cristian, $cristina);
$children1 = new Children($cristian, $cristina);
$children2 = new Children($cristian, $cristina);
$children3 = new Children($cristian, $cristina);
