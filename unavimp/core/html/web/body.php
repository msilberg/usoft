<?php 
	require_once("/var/www/public_html/unavimp/core/loader.inc");
	$build=new data(NULL,NULL);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html DIR="<?php print $build->wdir ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title><?php $build->lbl_otp(99) ?></title>
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/".$build->mode."/".$build->cbrws."/gbody.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."js/theme/default/style.css" ?>" />
<?php if (!$build->is_ie()){ ?>
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/".$build->mode."/".$build->cbrws."/chosen.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/".$build->mode."/".$build->cbrws."/antiscroll.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/".$build->mode."/".$build->cbrws."/tooltipster.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/".$build->mode."/".$build->cbrws."/".$build->browser.".css" ?>" />
<?php } ?>
<?php $build->js_otp() ?>
</head>
<body>
	<center>
		<?php
			if ($build->is_ie() && $build->iev_otp() < 8)
			{
				$build->lbl_otp(104);
				return false;
			}
		?>
		<?php $build->loadblock("header") ?>
		<div class="header-bckgr">
			<div>
				<div><?php $build->loadblock(array("search","mbtns")) ?></div>
			</div>
		</div>
		<div class="shadow-strip-up"></div>
		<div class="mbody">
			<table cellspacing="0" cellpadding="0" width="100%" class="unc" border="0">
				<tr>
					<td class="hncat-cell"><?php $build->loadblock("hncat") ?></td>
					<td class="mw">
						<div class="go-fscr" title="<?php $build->lbl_otp(95) ?>"></div>
						<div class="show-st-list show-st-list-pass"><div><div></div></div></div>
						<div class="measure-switch measure-pass"></div>
						<?php $build->loadblock(array("addcbtns","hints")) ?>
						<div class="measure-cont"><?php $build->lbl_otp(136) ?>: <span id="measure-otp"></span><div class="measure-cls"></div></div>
						<div id="smap" class="smallmap"></div>
					</td>
					<td valign="top" class="bann-td"><?php $build->loadblock("banners") ?></td>
				</tr>
			</table>
		</div>
		<?php $build->loadblock(array("bottstrip","footer","fader","langpanel","msgbox","login","prodinfo")) ?>
	</center>
</body>
</html>