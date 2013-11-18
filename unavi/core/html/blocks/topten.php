<div class="wall-uplayer wall-uplayer-<?php print data::gvar("wdir") ?>">
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td>
				<ul class="wbtn-list wbtn-list-<?php print data::gvar("wdir") ?>">
				<?php
					$arr=service::top10_arr();
					$keys=array_keys($arr);
					if (is_array($arr)) foreach ($arr as $key=>$val) print "<li><div class=\"wall-btn\">$val</div></li>";
				?>
				</ul>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div id="wallApplet">				
				</div>
				<!-- script>
					javafx({
						archive: "<?php print data::gvar("traddr") ?>animation/wall/WallGallery.jar",
						width: "<?php print data::gvar("wall_w") ?>",
						height: "<?php print data::gvar("wall_h") ?>",
						code: "ua.pp.leon.WallGallery.Main",
						name: "WallGallery",
						id: "WallGallery"
					},{	top10id:"<?php print $keys[0] ?>" });
				</script -->
			</td>
		</tr>
	</table>
</div>