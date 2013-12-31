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
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/gbody.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "js/theme/default/style.css" ?>" />
<?php if (!$build->is_ie()){ ?>
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/chosen.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/antiscroll.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/tooltipster.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/jquery-ui.min.css" ?>" />
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/".$build->browser.".css" ?>" />
<link rel="stylesheet" type="text/css" href="http://uadmin.no-ip.biz/miniapps/wall-web/theme/default/style.css" />
<script type="text/javascript" src="http://uadmin.no-ip.biz/miniapps/wall-web/js/wall-web.js"></script>
<?php } ?>
<?php $build->js_otp() ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34505650-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
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
		<div class="shadow-strip-up"></div>
		<div class="mbody">
			<table cellspacing="0" cellpadding="0" width="100%" class="unc" border="0">
				<tr>
					<td class="hncat-cell"><?php $build->loadblock("hncat") ?></td>
					<td class="mw">
						<div class="go-fscr" title="<?php $build->lbl_otp(95) ?>"></div>
						<div class="show-st-list show-st-list-pass"><div><div></div></div></div>
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
	<?php
        // Pathfinder dialog block.
        $build->loadblock('pathfinder');
        // Performs controllers initialization.
        if (gettype($_REQUEST['catalog']) !== 'NULL') {
            echo '<script type="text/javascript">bVars.controlInitialCategory = '
                    . intval($_REQUEST['catalog'])
                    . ';</script>';
        } else if (gettype($_REQUEST['finance']) !== 'NULL') {
            echo '<script type="text/javascript">bVars.controlFinance = true;</script>';
        } else if (gettype($_REQUEST['services']) !== 'NULL') {
            echo '<script type="text/javascript">bVars.controlServices = true;</script>';
        }
        return;
    ?>
</body>
</html>
