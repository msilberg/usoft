<?php
function __autoload($name)
{
	require_once("/var/www/public_html/unavimp/core/engine/$name.php");
}
?>
