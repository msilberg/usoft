<div class="videos-matrix videos-matrix-<?php print data::gvar("wdir") ?>">
	<table cellpadding="5" cellspacing="5">
		<tr>
		<?php
			for ($i=1;$i<=service::files_num("stores/".$_SESSION['modid']."/".$_SESSION['store']."/videos/","flv");$i++)
			{
				print "<td><div class=\"vtrailer-icon\" id=\"$i\" style=\"background-image:url(".
					data::$traddr."stores/".$_SESSION['modid']."/".$_SESSION['store']."/videos/$i.jpg);\"></div></td>";
				if (!fmod($i,3)) print "</tr><tr>";
			}
		?>
		</tr>
	</table>
</div>