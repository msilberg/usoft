<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/public_html/navi/ncore/loader.inc");
$build=new data();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>Navigator v3</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="raphael.min.js"></script>
<script type="text/javascript" src="jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="service.js"></script>
<script type="text/javascript" src="./animation/cloud/swfobject.js"></script>
<?php $build->cpanime() ?>
<?php $build->objhl() ?>
<?php $build->bwall() ?>
<?php $build->ppct_output() ?>
<link rel="stylesheet" type="text/css" href="28.css">
</head>
<body>
<form name="forma" method="GET" action="<?php echo $PHP_SELF ?>">
<div id="head-div">
<table cellspacing="0" cellpadding="0" width="100%" border="1" id="head-table">
<tr><td colspan="3"><?php $build->rstrip_output() ?></td></tr>
<tr><td rowspan="3"><?php $build->bann_output() ?></td><td colspan="2">3</td></tr>
<tr><td valign="top"><?php $build->mw() ?></td><td rowspan="2" valign="top"><?php $build->hncat_output() ?></td></tr>
<tr><td valign="bottom"><?php $build->assist_output() ?></td></tr>
</table>
</div>
</form>
</body>
</html>