<?php
	switch ($_SESSION['listtype'])
	{
		case "ttcat": $arrl=service::top10_arr();
		break;
		default: return false;
	}
?>
<div class="ddl-layer">
	<div class="ddl-layer-frame">
		<ul>
		<?php
			$i=1;
			foreach ($arrl as $key=>$val) 
				print "<li id=\"$key\"".(($i==count($arrl))?NULL:" class=\"ddl-layer-border\"").">
					<div".(($i++==1)?" class=\"ddl-act\"":NULL)." id=\"$val\"><span>$val</span></div></li>";
		?>
		</ul>
	</div>
</div>
<div class="ddl-cls-btn"></div>
