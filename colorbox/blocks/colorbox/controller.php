<?php  
	defined('C5_EXECUTE') or die(_("Access Denied."));
	
	class ColorBoxBlockController extends BlockController {

		protected $btName = "ColorBox";
		protected $btDescription = "A versatile lightbox addon for Concrete5.";
		protected $btInterfaceWidth = 500;
		protected $btInterfaceHeight = 350;
		protected $btTable = 'btColorBox';
		
		public function getBlockTypeDescription() {
			return t("A versatile lightbox addon for Concrete5.");
		}
		
		public function getBlockTypeName() {
			return t("ColorBox");
		}	
	}
?>
