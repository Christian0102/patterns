<?php
abstract class Unit{
	abstract function bombardStrength();
}

class Archer extends Unit{
	public function bombardStrength(){
		return 44;
	}
}

class LaserCannonUnit extends Unit{
	public function bombardStrength(){
		return 44;
	}
}

class Army{
	private $units = array();
	private $armies = array();
	public function addUnit(Unit $unit) {
		array_push($this->units, $unit);
	}
	public function addUnit(Unit $unit) {
		if(in_array($unit, $this->units, true)) {
			return;
		}
		$this->units[] = $unit;
	}
	public function addArmy() {
		array_push($this->armies, $army);
	}
	public function bombardStrength(){
		$ret = 0;
		foreach($this->units as $unit) {
			$ret += $unit->bombardStrength();
		}
		foreach($this->armies as $army) {
			$ret += $army->bombardStrength();
		}
		return $ret;
	}
}
