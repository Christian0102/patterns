<?php
/*Principle Open-Closed*/

/*
 * 
 * Bad Code
 * 
 * */
class OrderRepository
{
	public function load($oderID)
	{
		
		$pdo = new PDO($this->config->getDsn(), $this->config->getDBUser(),
		               $this->config->getDbPassword());
		$query = 'Select * from order';               
	    $stmt = $pdo->prepare($query);
	    $stmt->execute($id);
	    return $stmt->fetchAll();
	}
	
	public function load($orderID){/* .... */}
	public function save($oder){/* .... */}
    public function update($order){/* .... */}
    public function delete($oderder){/* .... */}
}

/*
 * 
 * 
 * Good example Code
 * 
 * */



class OrderRepository
{
	private $source;
	
	public function setSource(IOrderSource $source)
	{
		$this->source = $source;
	}
	public function load($oderID)
	{
		return $this->source->load($oderID);
	}
	
	public function save($order){/* ... */}
	public function update($oder){/* ... */}
}

interface IOrderSource
{
	public function load($oderID);
	public function save($order);
	public function update($oder);
	public function delete($oder);
}

class MysqlOrderSource implements IOrderSource
{
	public function load($oderId){/* ... */}
	public function save($order){/*...*/}
	public function update($order){/*...*/}
	public function delete($order){/*...*/}
}

class ApiOrderSource implements IOrderSource
{
	public function load($oderId){/* ... */}
	public function save($order){/*...*/}
	public function update($order){/*...*/}
	public function delete($order){/*...*/}
}




