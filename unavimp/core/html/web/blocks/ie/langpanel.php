<div class="lang-panel">
	<ul>
	<?php
		foreach (data::gvar("lang_arr") as $key=>$val)
			print "<li><div class=\"lang-elem ".(($key==data::gvar("lang"))?"lang-elem-act\"":"lang-elem-pass\"")." id=\"$key\">
				<div><span class=\"span-in-middle\">$val</span></div></div><li>";
	?>
	</ul>
	<div class="lang-cls cls-btn-icon"></div>
</div>