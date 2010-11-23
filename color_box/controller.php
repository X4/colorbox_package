<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class ColorBoxPackage extends Package {

    protected $pkgHandle = 'color_box';
    protected $appVersionRequired = '5.3.0';
    protected $pkgVersion = '1.0';

    public function getPackageDescription() {
        return t("Lets you add content into a colorbox.");
    }

    public function getPackageName() {
        return t("Colorbox");
    }

    public function install() {
        $pkg = parent::install();

        // install block
        BlockType::installBlockTypeFromPackage('color_box_image', $pkg);
    }

    public function uninstall() {
        $pkg = parent::uninstall();
    }

}
