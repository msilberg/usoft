<table cellpadding="5" cellspacing="0">
	<tr>
	<?php
		$top10_arr=service::top10_arr();
		if (!is_array($top10_arr)) return false;
		foreach ($top10_arr as $key=>$val)
			print "<td><div class=\"ttcat-btn ".((++$i==1)?"top10-btn-act":"ttcat-btn-pass").
				"\" id=\"$key\"><div class=\"ttcat-btn-cell\"><div>$val</div></div></div></td>";
	?>
	</tr>
</table>