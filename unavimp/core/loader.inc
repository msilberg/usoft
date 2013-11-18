<?php
function __autoload($name)
{
	require_once("core/engine/$name.php");
}
?>
