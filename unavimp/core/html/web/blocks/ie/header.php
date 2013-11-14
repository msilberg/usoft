<?php 
	require_once("core/loader.inc");
	$build = new data(null, null);
?>
<link rel="stylesheet" type="text/css"
        href="<?php echo 'styles/' . $build->mode . '/' . $build->cbrws . '/header.css' ?>" />
<div style="font-family: 'Helvetica Neue', Arial, Helvetica, sans-serif; font-size: 20px;">
    <div data-btn="1" class="header" id="header1"></div>
    <div data-btn="2" class="header" id="header2">
        <ul id="menu2">
            <li class="m2_btn"><a href="http://barabashovo.ua/barabashovo/o-nas/">О нас</a></li>
            <li class="m2_btn"><a href="http://barabashovo.ua/barabashovo/rezhim-raboty/">Режим работы</a></li>
            <li class="m2_btn"><a href="http://barabashovo.ua/poleznaya-informaciya/kak-k-nam-dobratsya/">Как добраться</a></li>
            <li class="m2_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/purchase/">Покупки</a></li>
            <li class="m2_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/category/news/">Новости</a></li>
            <li class="m2_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/barabashovo/istoriya-torgovogo-centra/">История</a></li>
        </ul>
    </div>
    <div data-btn="3" class="header" id="header3">
        <ul id="menu_karti_sxemi">
            <li class="maps"><a href="http://barabashovo.ua/karty-i-shemy/map/">Карта ТЦ Барабашово</a></li>
            <li class="parking"><a href="http://barabashovo.ua/karty-i-shemy/shema-parkovok/">Парковки</a></li>
            <li class="bank"><a href="http://barabashovo.ua/karty-i-shemy/banki-i-bankomaty/">Банки и банкоматы</a></li>
            <li class="medical"><a href="http://barabashovo.ua/karty-i-shemy/apteki-i-medservice/">Аптеки</a></li>
        </ul>
    </div>
    <div data-btn="4" class="header" id="header4"></div>
    <div data-btn="6" class="header" id="header6">
        <ul id="menu2_cont">
            <li class="m2_cont_btn"><a href="http://barabashovo.ua/contacts/goryachaya-liniya-tc-barabashovo/">Горячая линия</a></li>
            <li class="m2_cont_btn"><a href="http://barabashovo.ua/contacts/predstavitelstva-v-drugih-gorodah/">Представительства в регионах</a></li>
            <li class="m2_cont_btn"><a href="http://barabashovo.ua/contacts/razmeschenie-reklamy/">Размещение рекламы</a></li>
            <li class="m2_cont_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/contacts/medcenter/">Медцентр</a></li>
            <li class="m2_cont_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/contacts/prava-potrebiteley/">Защита прав потребителей</a></li>
            <li class="m2_cont_btn" style="margin-top:-5px;"><a href="http://barabashovo.ua/contacts/forma-obratnoi-svyazi/">Форма обратной связи</a></li>
        </ul>    
    </div>
    <div data-btn="7" class="header" id="header7">
        <ul id="menu2_rent">
            <li class="m2_rent_btn"><a href="http://barabashovo.ua/contacts/arendujte-torgovye-mesta/">Аренда торговых помещений</a></li>
            <li class="m2_rent_btn"><a href="http://barabashovo.ua/poleznaya-informaciya/kak-nachat-svoi-business-v-tc-barabashovo/">Начни свой бизнес</a></li>
            <li class="m2_rent_btn"><a href="http://barabashovo.ua/contacts/kontakty-administracii-tc-barabashovo/">Контакты администрации</a></li>
        </ul>    
    </div>
    <div class="vhod_registracia">
        <ul id="vhod_registracia">
            <li class="search_top"><a href="http://barabashovo.ua/?s=%D0%9F%D0%BE%D0%B8%D1%81%D0%BA">Найти</a></li>
            <li><a href="http://un.barabashovo.ua:8080/ClientReg.html">Регистрация</a></li>
            <li><a class="opn-lw-3254" href="#"><span>Вход</span></a></li>
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
    <ul id="top_menu">
        <li class="sh1 top_menu_item">
            <a href="http://barabashovo.ua/">
                <img src="http://barabashovo.ua/wp-content/uploads/2013/09/tcb-logo.png">
            </a>
        </li>
        <li class="top_menu_item" id="sh2">О ТЦ Барабашово</li>
        <li class="top_menu_item" id="sh3">Карты и схемы</li>
        <li class="top_menu_item" id="sh4"><a href="http://un.barabashovo.ua">Навигация</a></li>
        <li class="top_menu_item" id="sh6">Контакты</li>
        <li class="top_menu_item" id="sh7">Арендатору</li>
    </ul>
</div>
