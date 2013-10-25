<?php
	require_once("core/loader.inc");
	$build=new data(NULL,NULL);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Wall web</title>
        <link rel="stylesheet" href="<?php print $build->traddr ?>styles/web/ie/wall.css" type="text/css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css" />
        <script type="text/javascript" src="<?php print $build->traddr ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php print $build->traddr ?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php print $build->traddr ?>js/jquery.utils.min.js"></script>
        <script type="text/javascript" src="<?php print $build->traddr ?>js/jquery-css-transform.js"></script>
        <script type="text/javascript" src="<?php print $build->traddr ?>js/rotate3Di.min.js"></script>
        <script type="text/javascript" src="<?php print $build->traddr ?>js/wall.js"></script>
        <script type="text/JavaScript">
          	$(function(){ webWall(0, 50, "en", "uadmin.no-ip.biz:8080", <?php $build->ttcat_otp() ?>) });
          	$(document).ready(function(){
          		$(".ttcat-list").change(function(){ webWallSelectCatalogue(parseFloat($(".ttcat-list option:selected").val())) });
          	});
        </script>
    </head>
    <body style="background-color:transparent;">
        <!-- Wall placeholder - will be replaced after execution of webWall() call. -->
        <div class="ttcat-btn-header">
			<select class="ttcat-list">
			<?php foreach ($build->top10_arr_otp() as $key=>$val) print "<option value=\"$key\">$val</option>" ?>
			</select>
			<div class="cls-wall-btn" onclick="parent.uBody.closeTopTen();" style="cursor:pointer;"></div>
		</div>
        <div class="wall-placeholder"></div>
    </body>
</html>
