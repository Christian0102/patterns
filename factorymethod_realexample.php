<?php

abstract class SocialNetworkPoster
{
	abstract public function getSocialNetwork():SocialNetworkConnector;
	
	
	public function post($content):void
	{
		$network = $this->getSocialNetwork();
		
		$network->login();
		$network->createPost($content);
		$network->logout();
		
	}
	
}



class FacebookPoster extends SocialNetworkPoster
{
	private $login, $password;
	
	
	public function __construct(string $login, string $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
	
	public function getSocialNetwork():SocialNetworkConnector
	{
		return new FacebookConnector($this->login, $this->password);
	}
}

class LinkedInPoster extends SocialNetworkPoster
{
	private $login, $password;
	
	
	public function __construct(string $login, string $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
	
	public function getSocialNetwork():SocialNetworkConnector
	{
		return new LinkedInConnector($this->login, $this->password);
	}
}


interface SocialNetworkConnector
{
	public function login():void;
	
	public function logout():void;
	
	public function createPost($content):void;
}


class FacebookConnector implements SocialNetworkConnector
{
	private $login, $password;
	
	public function __construct(string $login , string $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
	
	public function login():void
	{
		echo "Sent HTTP API reqeust to log in user $this->login with ".
		"password $this->password \n";
	}
	
	public function logout():void
	{
		echo "Send HTTP API request to logout user $this->login \n";
	}
	
	public function createPost($content): void
	{
		echo "Send HTTP API requests to create a post in Facebook timeline. \n";
	}
	
	
}

class LinkedInConnector implements SocialNetworkConnector
{
	private $login, $password;
	
	public function __construct(string $login , string $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
	
	public function login():void
	{
		echo "Sent HTTP API reqeust to log in user $this->login with ".
		"password $this->password \n";
	}
	
	public function logout():void
	{
		echo "Send HTTP API request to logout user $this->login \n";
	}
	
	public function createPost($content): void
	{
		echo "Send HTTP API requests to create a post in LinkedIn timeline. \n";
	}
	
	
}


 
function clientCode(SocialNetworkPoster $creator)
{
    // ...
    $creator->post("Hello world!");
    $creator->post("I had a large hamburger this morning!");
    // ...
}

echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster("john_smith", "******"));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster("john_smith@example.com", "******"));




