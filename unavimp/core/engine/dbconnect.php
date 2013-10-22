<?php
class dbconnect
{
	function __construct()
	{
		$link=mysql_connect("localhost","root","qwerty");
		mysql_select_db("unavi2",$link);
	}
}
?>
