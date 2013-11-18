<?php
	$arr_t10=service::top10_arr();
	$crit=(is_array($arr_t10) && count($arr_t10)>1);
?>
<div class="top10-wall top10-wall-<?php print data::gvar("wdir") ?>">
	<input type="hidden" name="crit" value="<?php print count($arr_t10) ?>" />
	<div class="ttcat-btn-cont">
		<div class="ttcat-btn-header" id="ttbh-bckgr-<?php print ($crit)?"pass":"act" ?>">
			<div class="ttbh-frame"<?php print ($crit)?" id=\"dd-icon\"":NULL ?>>
				<div>
				<?php
					print (is_array($arr_t10) && count($arr_t10)>0)? current(array_values($arr_t10)) : db::lbl(127);
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="wall-placeholder"></div>
</div>