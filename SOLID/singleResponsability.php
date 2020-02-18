<?php
/*Principle Single Responsability*/

/*Bad example */
class Order
{
	public function calculateTotalSum(){/* ... */}
	public function getItems(){/* ... */}
	public function getItemCount(){/* .... */}
	public function addItem($item){/* .... */}
	public function deleteItem(){/* .... */}
	
	
	public function printORder(){/* .... */}
	public function showOrder(){/* .... */}
	
	public function load(){/* .... */}
	public function save(){/* .... */}
	public function update(){/* .... */}
	public function delete(){/* .... */}
}

/*delimitation into 3 different classes*/

class Order
{
	public function calculateTotalSum(){/* .... */}
	public function getItems(){/* .... */}
	public function getItemCount(){/* .... */}
	public function addItem(){/* .... */}
	public function deleteItem(){/* .... */}
}

class OrderRepository
{
	public function load($orderID){/* .... */}
	public function save($oder){/* .... */}
    public function update($order){/* .... */}
    public function delete($oderder){/* .... */}  	
}

class OderViewer
{
	public function printOrder($order){/* .... */}
	public function showOrder($order){/* .... */}
	
}
