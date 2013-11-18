<?php
	$wdir=data::gvar("wdir");
	$arr=service::set_slider_params(NULL);
?>
<div class="list-slider list-slider-<?php print $wdir.$arr['lsbva'] ?>">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<?php print $arr['sc_name'] ?>
			<td>
			<?php
				if ($arr['num']>$arr['dvd'])
				{
					$_SESSION['slides_num']=ceil($arr['num']/$arr['dvd']);
					$crit=$_SESSION['slides_num']>data::$ls_max_num;
					$_SESSION['gs_num']=($crit)? ceil($_SESSION['slides_num']/data::$ls_max_num) : 1;
					print (($crit)?"<table cellspacing=\"0\" cellpadding=\"0\"><tr><td><div id=\"beg\" class=\"ls-move ls-move-beg ls-move-act\"><div></div></div></td>
						<td><div class=\"ls-btn-scope\"><div class=\"ls-btn-cont\">":NULL)."<table cellspacing=\"0\" cellpadding=\"0\"><tr>";
					for ($i=1;$i<=$_SESSION['slides_num'];$i++) print "<td><div class=\"ls-btn ls-btn-".(($i==1)?"act":"pass")."\">$i</div></td>";
					print "</tr></table>".(($crit)?"</div></div></td>
						<td><div id=\"end\" class=\"ls-move ls-move-end ls-move-pass\"><div></div></div></td></tr></table>":NULL);
				}
				else
				{
					print "<div class=\"ls-btn ls-btn-act\">1</div>";
					$_SESSION['slides_num']=1;
					$_SESSION['gs_num']=1;
				}
			?>
			</td>
		</tr>
	</table>
</div>