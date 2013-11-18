<?php
class dbconnect
{
	function __construct()
	{
		$link=mysql_connect("localhost","root","qwerty");
		mysql_select_db("unavi_malls",$link);
		/*$link=mysql_connect("10.0.0.100:3307","kono","qQdf2KrEr6yRC58f");
		mysql_select_db("unavi2",$link);*/
	}
}
?>
