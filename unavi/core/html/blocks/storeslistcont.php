<?php 
	require_once(substr($_SERVER['SCRIPT_FILENAME'],0,-(strlen($_SERVER['SCRIPT_FILENAME'])-strripos($_SERVER['SCRIPT_FILENAME'],"/")+11))."loader.inc");
	$build=new data(NULL,NULL);
?>
<div class="store-wall store-wall-<?php print $build->wdir ?>"></div><div class="sl-tr sl-tr-<?php print $build->wdir ?>"></div>
<div class="stores-container stores-container-<?php print $build->wdir ?>"></div>
<div class="close-wall close-wall-<?php print $build->wdir ?>">
	<div class="cls-btn-icon"></div>
</div>