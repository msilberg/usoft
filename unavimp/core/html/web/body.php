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
<link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/".$build->browser.".css" ?>" />
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
						<!--<div class="measure-switch measure-pass"></div>-->
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
    <!-- TODO: Replace with external block -->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php print "styles/".$build->mode."/".$build->cbrws."/pathfinder.css" ?>" />
    <div id="pathfinder">
        <table class="pf-header">
            <tr>
                <td class="pf-header-title">Маршрут</td>
                <td id="pf-print" class="clickable"></td>
                <td class="clickable">Link</td>
                <td id="pf-close" class="clickable"></td>
            </tr>
        </table>
        <table class="pf-transport">
            <tr>
                <td class="pf-transport-cell"></td>
                <!--<td class="pf-transport-cell clickable" id="pf-pedestrian"></td>-->
                <td class="pf-transport-cell clickable" id="pf-car"></td>
                <td class="pf-transport-cell clickable" id="pf-marshrutka"></td>
                <td class="pf-transport-cell clickable" id="pf-bus"></td>
                <td class="pf-transport-cell clickable" id="pf-tram"></td>
                <td class="pf-transport-cell clickable" id="pf-metro"></td>
                <td class="pf-transport-cell"></td>
            </tr>
        </table>
        <table class="pf-a">
            <tr>
            <td class="pf-a-title">A</td>
            <td class="pf-a-select-container">
                <select id="pf-a-select"></select>
            </td>
            </tr>
        </table>
        <table class="pf-b">
            <tr>
            <td class="pf-b-title">B</td>
            <td class="pf-b-select-container">
                <input id="pf-b-select" value="" disabled="disabled" />
            </td>
            </tr>
        </table>
        <table class="pf-calculate">
            <tr>
                <td id="pf-calculate">
                    Проложить маршрут
                </td>
            </tr>
        </table>
    </div>
    <script language="javascript">
        pathfinder.init('pathfinder');
    </script>
    <!-- END of TODO-->
</body>
</html>