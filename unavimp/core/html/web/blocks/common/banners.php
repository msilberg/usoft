<?php
	/*foreach (db::get_bann_stores() as $val)
	{
		print "<td><div id=\"$val\" class=\"bann-cell bann$val bann-pass\">
			<div class=\"bann-logo\" style=\"background-image:url(".data::gvar("get_image").
			db::get_logo_id($val).");\"></div></div></td>";
		if (++$n==data::gvar("bann_num")) break;
		if (!(++$i&1)) print "</tr><tr>";
	}*/
			
?>
<div class="bann-layer">
    <div class="bann-group bann-group-0">
        <?php
        $st_arr = array(
            1 => 20656
            , 2 => 23258
//            , 3 => 'http://poly-dveri.com'
            , 3 => 23715
            , 4 => 20630
            , 5 => 0
            , 6 => 17579
            , 7 => 22396
            , 9 => 20620
            , 22 => 20656
            , 27 => 6494
        );
        for ($i = 1; $i <= 21; $i++) {
            print '<div id="' . ((isset($st_arr[$i])) ? $st_arr[$i] : 0)
                    . '" class="bann-cell" style="background-image:url('
                    . data::$traddr . 'graphics/banners/' . $i . '.png);"></div>';
            if (!fmod(++$j, 7)) {
                print '<div class="bann-group bann-group-'
                        . (++$group)
                        . '" style="display:none;"></div>';
            }
        }
        ?>
    </div>
</div>
