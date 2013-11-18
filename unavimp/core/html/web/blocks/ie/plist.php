<div class="price-list">
	<div>
	<?php
		foreach (db::get_price_lists() as $val)
			print "<div id=\"".$val['id']."\" class=\"plist-elem plist-elem-pass\"><div><span>".$val['user_data']."</span></div></div>";
	?>
	</div>
</div>