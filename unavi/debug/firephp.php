<?php
    require_once("http://localhost/public_html/unavi/firephp/lib/FirePHPCore/FirePHP.class.php");
	ob_start();
	function runFireBug($var){
    	$firephp = FirePHP::getInstance(true);
    	$firephp->log($var, 'Firebug Output');
	}
?>