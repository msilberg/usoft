<!-- Web-drum module -->
<?php
    require_once("core/loader.inc");
	$build = new data(null, null);
    $wdir = data::gvar('wdir');
?>
<link rel="stylesheet" type="text/css"
        href="<?php echo 'styles/' . $build->mode.'/' . '/web-drum.css' ?>" />
<script type="text/javascript"
        src="<?php echo 'js/' . $build->mode.'/' . '/web-drum.js' ?>"></script>
<link rel="stylesheet"
        href="http://uadmin.no-ip.biz/miniapps/drum-web/theme/default/style.css" type="text/css" />
<link rel="stylesheet"
        href="http://uadmin.no-ip.biz/miniapps/dialer-web/theme/default/style.css" type="text/css" />
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/drum-web/js/jquery.utils.min.js"></script>
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/drum-web/js/jQueryRotate.2.3.min.js"></script>
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/drum-web/js/drum-web.js"></script>
<script type="text/javascript"
        src="http://uadmin.no-ip.biz/miniapps/dialer-web/js/dialer-web.js"></script>
<div id="web-drum-container" style="display: none;">
    <div class="wd-container">
        <div class="wd-close-button-cross wd-close-button-cross-<?php print $wdir ?>">
            <div class="wd-close-icon"></div>
        </div>
        <!-- webDrum placeholder - will be replaced after execution of webDrum.init() call. -->
        <div class="drum-placeholder"></div>
    </div>
</div>
<!-- END Web-drum module -->