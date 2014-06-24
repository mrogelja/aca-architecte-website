<?php 
defined('C5_EXECUTE') or die("Access Denied.");


$copyId = rand(10, 1000); //this is fix for clipboard copy function
$c = Page::getCurrentPage();
if ($c->isEditMode()) {
	?>
	<div class="ccm-edit-mode-disabled-item" style="height: 400px">
		<div style="padding: 80px 0px 0px 0px"><?php  echo t('Openstreet Map disabled in edit mode.') ?></div>
	</div>
<?php  } else { ?>	
	<?php  if (strlen($title) > 0) { ?><h3><?php  echo $title ?></h3><?php  } ?>
	<div id="openstreetMapCanvas<?php  echo $bID ?>_<?php  echo $copyId ?>" class="map" style="width:<?php  echo $width ?>;height:<?php  echo $height ?>;">

	</div>	

	<script>
			
		var OpenstreetMap<?php  echo $bID ?> = function (){
			
			var map = new OpenLayers.Map({
				div: "openstreetMapCanvas<?php  echo $bID ?>_<?php  echo $copyId ?>",
				allOverlays: true
			});
			
			var lat =  <?php  echo $latitude; ?>;
			var lon = <?php  echo $longitude; ?>;

			var osm = new OpenLayers.Layer.OSM();
			map.addLayers([osm]);
			map.zoomToMaxExtent();
			
			var markers = new OpenLayers.Layer.Markers("Markers");
			map.addLayer(markers);
			map.setLayerIndex(markers, 101);
			markers.setZIndex(1001); 
			
			var lonlat = new OpenLayers.LonLat(lon, lat);
			lonlat.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			var point = new OpenLayers.Marker(lonlat);
			markers.addMarker(point);
			map.setCenter(lonlat, <?php  echo $zoom ?>);
			
		}();
	</script>
<?php  } ?>