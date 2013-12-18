<!-- Web-lottery module -->
<?php
    require_once("core/loader.inc");
	$build = new data(null, null);
    $wdir = data::gvar('wdir');
?>
<link rel="stylesheet" type="text/css"
        href="<?php echo 'styles/' . $build->mode.'/' . '/web-lottery.css' ?>" />
<script type="text/javascript"
        src="<?php echo 'js/' . $build->mode.'/' . '/web-lottery.js' ?>"></script>
<link rel="stylesheet"
        href="http://uadmin.no-ip.biz/miniapps/lottery-web/theme/default/style.css" type="text/css" />
<link rel="stylesheet"
        href="http://uadmin.no-ip.biz/miniapps/dialer-web/theme/default/style.css" type="text/css" />
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/dialer-web/js/dialer-web.js"></script>
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/lottery-web/js/lottery-web.js"></script>
<div id="web-lottery-container" style="display: none;">
    <div class="wl-container">
        <div class="wl-close-button-cross wl-close-button-cross-<?php print $wdir ?>">
            <div class="wl-close-icon"></div>
        </div>
        <div class="lottery-placeholder"></div>
    </div>
</div>
<!-- END Web-lottery module -->