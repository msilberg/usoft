<?php 
require_once("/var/www/public_html/unavi/core/loader.inc");
$build=new data(NULL,NULL);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html DIR="<?php print $build->wdir ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>U Navigator 5.0</title>
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr ?>styles/gbody.css" />
<link rel="stylesheet" type="text/css" href="<?php print $build->traddr."styles/gbody_".$build->browser ?>.css" />
<?php $build->js_otp() ?>
</head>
<body class="body-bckgr-act">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td colspan="3"><?php $build->loadblock("rstrip") ?></td>
		</tr>
		<tr>
			<td colspan="3"><?php $build->loadblock("modebtns") ?></td>
		</tr>
		<tr>
			<td class="hncat-cell"><?php $build->loadblock("hncat") ?></td>
			<td rowspan="2" class="mw">
			<?php 
				$build->loadblock("langpanel");
				$build->loadblock("bc");
				$build->loadblock("wall");
				$build->loadblock("callrequest");
				$build->loadblock("drum");
				$build->loadblock("lottery");
				$build->loadblock("hotdeals");
			?>
			</td>
			<td rowspan="2" class="valign-cell"><?php $build->loadblock("vbanners") ?></td>
		</tr>
		<tr>
			<td><?php $build->loadblock("prodinfo") ?></td>
		</tr>
	</table>
	<?php
		$build->loadblock("fader");
		$build->loadblock("msgbox");
	?>
</body>
</html>