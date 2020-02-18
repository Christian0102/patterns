<?php
abstract class ApptEncoder
{
	abstract  public function encode();
	
}

class BloggsApptEncoder extends ApptEncoder
{
	
	public function encode(){
		return "Data for Appoinement encode in BloggCall Format";
	}
}

class MegaApptEncoder extends ApptEncoder
{
	public function encode(){
		
		return "Data for Appoinement encode in MegaCall Format";
	}
}


abstract class CommsManager
{
	abstract public function getApptEncoder();
	abstract public function getHeaderText();
	abstract public function getFooterText();
}

class BloggsCommsmanager extends CommsManager
{
	public function getHeaderText(){
		return "BloggsCal for HeaderText";
	}
	public function getFooterText(){
		return "FooterText for BloggCal";
	}
	public function getApptEncoder()
	{
		return new BloggsApptEncoder();
	}
}
$mgr = new BloggsCommsManager();

print_r($mgr->getHeaderText());
print_r($mgr->getApptEncoder());
print_r($mgr->getFooterText());





?>
