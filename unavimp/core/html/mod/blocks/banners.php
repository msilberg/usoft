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
        <table cellpadding="0" cellspacing="0">
            <tr>
                <?php
                $st_arr = array(
                    1 => 20656
                    , 2 => 23258
//                    , 3 => 'http://poly-dveri.com'
                    , 3 => 23715
                    , 5 => 0
                    , 6 => 17579
                    , 7 => 22396
                    , 9 => 20620
                    , 22 => 20656
                    , 27 => 6837
                );
                for ($i = 1; $i <= 28; $i++) {
                    print '<td><div class="bann-cell bann-pass"><div id="'
                            . ((isset($st_arr[$i])) ? $st_arr[$i] : 0)
                            . '" class="bann-item" style="background-image:url('
                            . data::$traddr
                            . 'graphics/banners/' . $i . '.png);"></div></div><td>';
                    if (!fmod(++$j, 14)) {
                        print '</tr></table></div><div class="bann-group bann-group-'
                                . (++$group)
                                . '" style="display:none;"><table cellpadding="0" cellspacing="0"><tr>';
                        $j = 0;
                    } elseif (!fmod($j, 2)) {
                        print "</tr><tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </div>
</div>
