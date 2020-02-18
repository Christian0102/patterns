<?php
/*Factory method Design Patterns*/
abstract class ApptEncoder
{
	abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder
{
	public function encode(){
		return "Appointment data encode in BloggsCall format \n";
	}
}

class MeggaApptEncoder extends ApptEncoder
{ 
    public function encode(){
		return "Appointment data encode in BloggsCall format \n";
	}
}

abstract class CommsManager
{
	abstract function getHeaderText();
	abstract function getApptEncoder();
	abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager
{
	public function getHeaderText() {
	 return "BloggsCall for Header teX \n";
	}

	public function getApptEncoder() {
		return new BloggsApptEncoder();
	}
	
    public function getFooterText() {
	   return "BloggsCal for footerTExt \n";
    } 	
 	 
}
$mgr = new BloggsCommsManager();

print_r($mgr->getHeaderText());
print_r($mgr->getApptEncoder());
print_r($mgr->getFooterText());

