<?php
	require_once("/var/www/public_html/unavi/core/loader.inc");
	$build=new data(NULL,NULL);
	$dir=$build->traddr."stores/".$_SESSION['tc']."/4320/animation/";
	$dmns=db::store_extra_config(4320,"animation");
?>
<div class="showcase" style="margin-top:<?php print $dmns['msvcorr'] ?>px;margin-bottom:<?php print $dmns['msvcorr'] ?>px;
		margin-right:<?php print $dmns['mshcorr'] ?>px; margin-left:<?php print $dmns['mshcorr'] ?>px;">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
		codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
		width="<?php print $dmns['width'] ?>" height="<?php print $dmns['height'] ?>" class="store-anime" align="">
		<param name="movie" value="<?php print $dir ?>card_<?php print $_SESSION['lang'] ?>.swf">
		<param name="wmode" value="transparent" />
		<embed wmode=transparent allowscriptaccess="always" src="<?php print $dir ?>card_<?php print $build->gvar("lang") ?>.swf"
			width="<?php print $dmns['width'] ?>" height="<?php print $dmns['height'] ?>"></embed>
	</object>
</div>
