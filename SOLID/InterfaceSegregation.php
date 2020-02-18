<?php

/*bad  code Example*/
interface IItem
{
	public function applyDiscount($discount);
	public function applyPromocode($promocode);

	public function setColor($color);
	public function setSize($size);
	
	public function setCondition($condition);
	public function setPrice($price);
}s
/*Good code example */
interface IItem
{
	public function setCondition($condition);
	public function setPrice($price);
}

interface IClothes
{
	public function setColor($color);
	public function setSize($size);
	public function setMaterial($material);
}

interface IDiscountable
{
	public function applyDiscount($discount);
	public function applyPromocode($promocode);
}

class Book implemets IItem, IDiscountable
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function applyDiscount($discount){/*...*/}
    public function applyPromocode($promocode){/*...*/}
}

class KidsClothes implemets IItem, IClothes
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function setColor($color){/*...*/}
    public function setSize($size){/*...*/}
    public function setMaterial($material){/*...*/}
}


