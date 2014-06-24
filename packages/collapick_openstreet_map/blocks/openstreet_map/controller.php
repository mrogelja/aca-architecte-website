<?php 

defined('C5_EXECUTE') or die("Access Denied.");
class OpenstreetMapBlockController extends BlockController {

	protected $btTable = 'btOpenstreetMap';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "200";
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	public $title = "";
	public $location = "";
	public $latitude = "";
	public $longitude = "";
	public $zoom = 14;
	public $width = "400px";
	public $height = "400px";

	
	public function getBlockTypeDescription() {
		return t("Add Openstreet map via Openlayers to your site");
	}

	public function getBlockTypeName() {
		return t("Openstreet Map");
	}

	public function validate($args) {
		$error = Loader::helper('validation/error');

		if (!is_numeric($args['zoom'])) {
			$error->add(t('Please enter a zoom number from 0 to 18.'));
		}
		
		if(intval($args['zoom']) > 18 || intval($args['zoom'] < 0)){
			$error->add(t('Zoom have to be between 0-18'));
		}
		
		$coords = $this->lookupLatLong($args['location']);
		if($coords == false){
			$error->add(t('There is no location data for address '.$args['location']. '.'));
		}
		
		if(strlen($args['width']) == 0 || strlen($args['height']) == 0){
			$error->add(t('Width and Heigth is required. Try 200px for both.'));
		}
		
		if(substr($args['width'], -2) != 'px'){
			if(substr($args['width'], -1) != '%'){
				$error->add(t('You need to add px or % to end of width.'));
			}
		}
		
		if(substr($args['height'], -2) != 'px'){
			if(substr($args['height'], -1) != '%'){
				$error->add(t('You need to add px or % to end of height.'));
			}
		}
	

		if ($error->has()) {
			return $error;
		}
	}

	public function on_page_view() {
		$html = Loader::helper('html');
        $this->addHeaderItem($html->javascript(BASE_URL.DIR_REL.'/packages/collapick_openstreet_map/blocks/openstreet_map/js/OpenLayers.js'));
	}

	public function view() {
		$this->set('bID', $this->bID);
		$this->set('title', $this->title);
		$this->set('location', $this->location);
		$this->set('latitude', $this->latitude);
		$this->set('longitude', $this->longitude);
		$this->set('zoom', $this->zoom);
		$this->set('width', $this->width);
		$this->set('height', $this->height);
	}

	public function save($data) {
		$args['title'] = isset($data['title']) ? trim($data['title']) : '';
		$args['location'] = isset($data['location']) ? trim($data['location']) : '';
		$args['zoom'] = (intval($data['zoom']) >= 0 && intval($data['zoom']) <= 21) ? intval($data['zoom']) : 14;
		$args['width'] = isset($data['width']) ? trim($data['width']) : '400px';
		$args['height'] = isset($data['height']) ? trim($data['height']) : '400px';
		

		if (strlen($args['location']) > 0) {
			$coords = $this->lookupLatLong($args['location']);
			$args['latitude'] = floatval($coords['lat']);
			$args['longitude'] = floatval($coords['lng']);
			$args['boundingbox'] = "";
		} else {
			$args['latitude'] = 0;
			$args['longitude'] = 0;
		}

		parent::save($args);
	}

	public function lookupLatLong($address) {
		$json = Loader::helper('json');
		$fh = Loader::helper('file');
		$base_url = "http://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1";
		$request_url = $base_url . "&q=" . urlencode($address);
		$res = $fh->getContents($request_url);
		$res = $json->decode($res);
		if (!is_array($res) || sizeof($res)  == 0) {
			return false;
		}
		$result = $res[0];
		if((isset($result->lat) == false) || (isset($result->lon) == false)){
			return false;
		}else{
			return array('lat' => $result->lat, 'lng' => $result->lon);
		}
		
	}

}