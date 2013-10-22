<div class="scrs-anime-layer">
<?php
	$anime_arr=db::get_stores_by_feature(12);
	if (is_array($anime_arr))
		foreach ($anime_arr as $val)
		{
			print "<div class=\"sa$val\">";
			include data::gvar("raddr")."stores/".$_SESSION['tc']."/$val/animation/anime.php";
			print "</div>";
		}
?>
</div>
<div class="scrs-comm"></div>
<div class="scrs-cls-btn"></div>