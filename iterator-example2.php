<?php
class Purchase
{
	protected $cost;
	
	public function __construct($cost)
	{
		$this->cost = $cost;
	}
	
	public function getCost()
	{
		return $this->cost;
	}
}



class Cart implements IteratorAggregate
{
	protected $purchases;
	
	public function addPurchase(Purchase $purchase)
	{
		$this->purchases[] = $purchase;
	}
	
	public function getCost()
	{
		$cost = 0;
		
		foreach($this->purchases as $purchases) {
			$cost += $purchases->getCost();
		}
		return $cost;
	}
	
	public function getIterator()
	{
		return new ArrayIterator($this->purchases);
	}
}

$cart = new Cart();
$cart->addPurchase(new Purchase(10));
$cart->addPurchase(new Purchase(15));

//var_dump($cart->getCost());

foreach($cart as $purchases) {
	var_dump($purchases->getCost());
}
