<?php
class dbconnect
{
	function __construct()
	{
		$link=mysql_connect("localhost","root","qwerty");
        // leon.
//        $link = mysql_connect('localhost', 'unavimp', 'vTZwLvsrJwWFyXwb');
        mysql_query("set character_set_results='utf8'");
		mysql_select_db("unavi2",$link);
	}
}
?>
