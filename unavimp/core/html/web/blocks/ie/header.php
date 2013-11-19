<?php 
	require_once("core/loader.inc");
	$build = new data(null, null);
?>
<link rel="stylesheet" type="text/css"
        href="<?php echo 'styles/' . $build->mode . '/' . $build->cbrws . '/header.css' ?>" />
<div class="header-container">
    <div data-btn="1" class="header" id="header1"></div>
    <div class="vhod_registracia">
        <ul id="vhod_registracia">
            <li class="search_top">
                <a href="http://barabashovo.ua/?s=%D0%9F%D0%BE%D0%B8%D1%81%D0%BA">
                    <?php data::lbl_otp(142)?>
                </a>
            </li>
            <li><a href="http://un.barabashovo.ua:8080/ClientReg.html"><?php data::lbl_otp(119) ?></a></li>
            <li><a class="opn-lw-3254" href="#"><span><?php data::lbl_otp(141) ?></span></a></li>
        </ul>
    </div>
    <ul class="top-menu-widget-wrap">
        <li id="search-3" class="widget widget_search"> 
            <div id="search" class="clerfix">
                <input type="text" id="sch-field" placeholder="<?php data::lbl_otp(105) ?>"
                        onfocus="bMap.keyboardnav.deactivate();"
                        onblur="bMap.keyboardnav.activate();" />
                <input type="image" src="http://barabashovo.ua/wp-content/themes/NewsSlide/images/search.png"
                        title="<?php data::lbl_otp(106) ?>" class="search-image" /> 
            </div>
        </li>
    </ul>
    <table id="top_menu">
        <tr>
            <td class="sh1 top_menu_item">
                <a href="http://barabashovo.ua/">
                    <img src="http://barabashovo.ua/wp-content/uploads/2013/09/tcb-logo.png">
                </a>
            </td>
            <td class="top_menu_item lang-btn lang-btn-pass" id="sh2"><?php data::lbl_otp(135) ?></td>
            <td class="top_menu_item map-btn map-btn-act" id="sh3"><?php data::lbl_otp(108) ?></td>
            <td class="top_menu_item drum-btn drum-btn-pass" id="sh4"><?php data::lbl_otp(75) ?></td>
            <td class="top_menu_item lott-btn lott-btn-pass" id="sh6"><?php data::lbl_otp(76) ?></td>
            <td class="top_menu_item hot-deal-btn hd-btn-pass" id="sh7"><?php data::lbl_otp(150) ?></td>
        </tr>
    </table>
</div>
