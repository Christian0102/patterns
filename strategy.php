<?php


class Context
{
	private $strategy;
	
	public function __construct(Strategy $strategy) {
		$this->strategy = $strategy;
	}
	
	public function setStrategy() {
		$this->strategy = $strategy;
	}
	public function doSomeBusinessLogic():void 
	{
		echo "Context: Sorting data using thes trategy (not sure how it ) "
	}
	
}
