<?php
class Request
{
	public function whoIs()
	{
		echo 'Request component singleton';
	}
}


$container = [];
$container['request'] = new Request();

class TestComponent
{
	protected $request;
	
   public function __construct( $request)
   {
	   $this->request = $request;
	   
   }	


	
}

$component  = new TestComponent($container['request']);
$component = $container->get(TestComponent::class);

