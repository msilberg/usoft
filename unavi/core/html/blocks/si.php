<div class="si-cont si-cont-<?php print data::gvar("wdir") ?>">
	<div class="slide-elem">
		<table cellpadding="<?php print data::$scs ?>" cellspacing="<?php print data::$scs ?>">
			<tr>
			<?php
				foreach (data::gvar("si_arr") as $key=>$val) 
				{
					print "<td><div class=\"si-bckgr ".(($_SESSION['si']==$key)?"si-bckgr-act":"si-bckgr-pass")."\">
						<div id=\"$key\" style=\"background-image:url(".data::gvar("traddr").
						"graphics/si/si$key.png);\" class=\"si-btn si-btn$key\"></div></div></td>";
					if (!fmod(++$i,data::$max_stores))
					{
						print "</tr></table></div>\n<div class=\"slide-elem\" style=\"display:none;\">
							<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\"><tr>";
						$i=0;
					}
					elseif (!fmod($i,6)) print "</tr><tr>";
					$num++;
				}
			?>
			</tr>
		</table>
	</div>
</div>
<?php
	if ($num>data::gvar("max_stores"))
	{
		print "<div class=\"list-slider list-slider-".data::gvar("wdir")."\"><ul>";
		for ($i=1;$i<=(intval($num/data::gvar("max_stores"))+((fmod($num,data::gvar("max_stores")))?1:0));$i++) 
			print "<li class=\"ls-btn ls-btn-pass\">$i</li>";
		print "</ul></div>";
	}
?>