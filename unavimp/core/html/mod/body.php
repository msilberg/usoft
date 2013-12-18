<?php 
	require_once("core/loader.inc");
	$build=new data(NULL,NULL);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html DIR="<?php print $build->wdir ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title><?php $build->lbl_otp(99) ?></title>
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/gbody.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "js/theme/default/style.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/jquery-ui.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/keyboard.css" ?>" />
<?php $build->js_otp() ?>
<script>
    $(function() {
        bVars.moduleId = <?php echo $_SESSION['modid']; ?>;
    });
</script>
</head>
	<body class="body-bckgr-act">
		<div class="mbody">
			<table cellspacing="0" cellpadding="0" class="unc" border="0">
				<tr>
					<td colspan="3" height="152">
						<div class="header-bckgr">
							<div class="tc-logo">
								<div></div>
							</div>
							<?php $build->loadblock("search") ?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" height="100"><?php $build->loadblock("mbtns") ?></td>
				</tr>
				<tr>
					<td class="hncat-cell"><?php $build->loadblock("hncat") ?></td>
					<td rowspan="2" class="mw">
						<div class="show-st-list show-st-list-pass"></div>
						<?php
							$build->loadblock("addcbtns");
							$build->loadblock("hints");
						?>
						<div id="smap" class="smallmap"></div>
					</td>
					<td rowspan="2" valign="top" class="bann-col-cell"><?php $build->loadblock("banners") ?></td>
				</tr>
				<tr>
					<td><?php $build->loadblock("prodinfo") ?></td>
				</tr>
			</table>
			<div class="sl-tr sl-tr-<?php print $build->wdir ?>"></div>
		</div>
		<div id="scl-cnt"></div>
		<?php
			$build->loadblock("fader");
			$build->loadblock("langpanel");
			$build->loadblock("msgbox");
            $build->loadblock("web-drum");
            $build->loadblock("web-lottery");
		?>
	</body>
</html>
