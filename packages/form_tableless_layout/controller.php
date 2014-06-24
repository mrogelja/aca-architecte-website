<?php    
defined('C5_EXECUTE') or die(_("Access Denied."));

class FormTablelessLayoutPackage extends Package {
	
	protected $pkgHandle = 'form_tableless_layout';
	protected $appVersionRequired = '5.5';
	protected $pkgVersion = '1.2.1';
	
	public function getPackageName() {
		return t("Form Tableless Layout"); 
	}	
	
	public function getPackageDescription() {
		return t("Provides a custom template for the Form block that outputs table-less HTML, so forms can be styled via CSS.");
	}

	public function install() {
		$pkg = parent::install();
	}

}