<div class="videos-matrix videos-matrix-<?php print data::gvar("wdir") ?>">
	<table cellpadding="5" cellspacing="5">
		<tr>
		<?php
			for ($i=1;$i<=service::files_num("stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos/".$_SESSION['mode']."/","flv");$i++)
			{
				print "<td><div class=\"vtrailer-icon\" id=\"$i\" style=\"background-image:url(".
					data::$traddr."stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos/".$_SESSION['mode']."/$i.jpg);\"></div></td>";
				if (!fmod($i,3)) print "</tr><tr>";
				if ($i==9) break;
			}
		?>
		</tr>
	</table>
</div>