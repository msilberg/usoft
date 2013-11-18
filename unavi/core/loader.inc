<?php
function __autoload($name)
{
	require_once("/var/www/public_html/unavi/core/engine/$name.php");
}
?>
