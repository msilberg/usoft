<?php
require_once("/var/www/public_html/unavi/core/loader.inc");
$build=new data(NULL,NULL);
?>
<div class="pct-uplayer pct-uplayer<?php echo data::wds() ?>" style="width:650px;height:365px;">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
		codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
		width="100%" height="100%" class="store-anime" align="">
		<param name="movie" value="<?php $build->store_anime() ?>shake.swf">
		<embed src="<?php $build->store_anime() ?>shake.swf" width="100%" height="100%"></embed>
	</object>
</div>
