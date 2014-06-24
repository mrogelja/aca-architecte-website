<?php   defined('C5_EXECUTE') or die(_("Access Denied."));

class CollapickOpenstreetMapPackage extends Package {

    protected $pkgHandle = 'collapick_openstreet_map';
    protected $appVersionRequired = '5.6.0';
    protected $pkgVersion = '1.0';


    public function getPackageDescription() {
        return t('Add Openstreet map via Openlayers to your site');
    }

    public function getPackageName(){
        return t('Openstreet Map');
    }


	
    public function install() {
        $pkg = parent::install();
		
		//Install block type
		BlockType::installBlockTypeFromPackage('openstreet_map', $pkg);
		
		
    }

    

}

    ?>