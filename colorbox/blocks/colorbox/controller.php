<?php  
	defined('C5_EXECUTE') or die(_("Access Denied."));
	
	class HelloWorldBlockController extends BlockController {

		protected $btName = "Hello World!";
		protected $btDescription = "Just an example block that says Hello World.";
		protected $btInterfaceWidth = 300;
		protected $btInterfaceHeight = 100;
		protected $btTable = 'btHelloWorld';
		
		
		
	}
?>
