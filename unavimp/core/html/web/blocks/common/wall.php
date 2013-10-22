<div class="top10-wall top10-wall-<?php print data::gvar("wdir") ?>">
	<div class="ttcat-btn-header">
		<select class="ttcat-list">
		<?php foreach (service::top10_arr() as $key=>$val) print "<option value=\"$key\">$val</option>" ?>
		</select>
		<div class="cls-wall-btn cls-btn-icon"></div>
	</div>
	<div class="wall-placeholder"></div>
</div>