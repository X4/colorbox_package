<?php  

defined('C5_EXECUTE') or die(_("Access Denied."));

class ColorboxPackage extends Package {

	protected $pkgHandle = 'colorbox';
	protected $appVersionRequired = '5.2.0';
	protected $pkgVersion = '1.0';
	
	public function getPackageDescription() {
		return t("Add a colorbox to your site.");
	}
	
	public function getPackageName() {
		return t("Colorbox");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('colorbox', $pkg);
		
	}




}