<?php
$link=mysql_connect("localhost","root","qwerty");
mysql_select_db("unavi",$link) or die("Can't connect to DB'");

function generatePassword() {
	$length=7;
	$strength=0;
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}
	// db
	$sn=$_GET['sn'];
	$fn=$_GET['fn'];
	$mn=$_GET['mn'];
	mysql_query("INSERT INTO clients(uname,psswd,contact_name,contact_surname,contact_middle_name,contact_position)
		VALUES ('admin".rand(0,9999)."','".generatePassword()."','$fn','$sn','$mn','trade network admin')");
	$client_id=mysql_insert_id();
	mysql_query("INSERT INTO credentials(client_id,package_id) VALUES($client_id,4)");
	mysql_query("INSERT INTO trade_network(name,client_id) VALUES('".($sn." ".$fn." ".$mn)."',$client_id)");
	$tn_id=mysql_insert_id();
	foreach (explode(",",$_GET['stores']) as $val) mysql_query("UPDATE stores SET trade_network_id=$tn_id WHERE id=".$val);
?>