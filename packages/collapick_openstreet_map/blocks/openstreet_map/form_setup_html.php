<?php   defined('C5_EXECUTE') or die("Access Denied."); ?> 
<table id="" width="100%" class="table table-bordered"> 
	<tr>
		<th><?php  echo t('Map Title')?>: <div class="note">(<?php  echo t('Optional')?>)</div></th>
		<td><input id="" name="title" value="<?php  echo $controller->title?>" maxlength="255" type="text" style="width:80%"></td>
	</tr>	
	<tr>
		<th><?php  echo t('Location')?>:</th>
		<td>
		<input id="" name="location" value="<?php  echo $controller->location?>" maxlength="255" type="text" style="width:80%">
		<div class="note"><?php  echo t('For example, länsikatu 15, joensuu, finland')?></div>
		</td>
	</tr>
	<tr>
		<th><?php  echo t('Zoom')?>:</th>
		<td>
		<input id="" name="zoom" value="<?php  echo $controller->zoom?>" maxlength="255" type="text" style="width:80%">
		<div class="ccm-note"><?php  echo t('Enter a number from 0 to 18, with 18 being the most zoomed in.')?> </div>
		</td>
	</tr>
	<tr>
		<th><?php  echo t('Width')?>:</th>
		<td>
		<input id="" name="width" value="<?php  echo isset($controller->width) ? $controller->width : "400px"  ?>" maxlength="255" type="text" style="width:80%">
		<div class="ccm-note"><?php  echo t('Enter html widths for example 400px')?> </div>
		</td>
	</tr>
	<tr>
		<th><?php  echo t('Height')?>:</th>
		<td>
		<input id="" name="height" value="<?php  echo isset($controller->height) ? $controller->height : "400px" ?>" maxlength="255" type="text" style="width:80%">
		<div class="ccm-note"><?php  echo t('Enter html heights for example 400px')?> </div>
		</td>
	</tr>
</table>