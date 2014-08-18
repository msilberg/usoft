function getScript(url, success) {

    var script = document.createElement('script');
    script.src = url;
    var head = document.getElementsByTagName('head')[0];
    done = false;
    script.onload = script.onreadystatechange = function() {
        if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
            done = true;
            success();
            script.onload = script.onreadystatechange = null;
            head.removeChild(script);
        }
    }
    head.appendChild(script);
}

function hoverBtnStyle() {
    var btnNo;
    var btnAct = {
        'background-image': "url(http://info.barabashovo.ua/wp-content/uploads/2013/02/active_btn_prim_men.png)"
        , color: "#ffffff"
        , 'box-shadow': '-1px 0 0 rgba(255,255,255,.15), inset 0 0 1px rgba(6,54,95,0.4), inset 1px 0 1px rgba(6,54,95,0.4)'
    };
    var btnPass = {
        'background-image': 'url(http://infotrade.ua/barabashovo/wp-content/uploads/2012/10/up-menu-bckg11.png)'
        , color: "#ffffff"
    };
    var pathArr = window.location.pathname.split('/');
    switch (pathArr[1]) {
        case 'barabashovo':
            btnNo = 1;
            break;
        case 'karty-i-shemy':
            btnNo = 2;
            break;
        case 'poleznaya-informaciya':
            btnNo = 3;
            break;
        case 'contacts':
            btnNo = 4;
            break;
        default:
            btnNo = 0;
    }

    if (btnNo !== 0) {
        jQuery("li.knopka:eq(" + btnNo + ")>a").css(btnAct);
    }
    jQuery("li.knopka:eq(" + btnNo + ")").siblings().children().css(btnPass).not(":eq(0)")
            .mouseenter(function() {
        jQuery(this).css(btnAct);
    }).mouseleave(function() {
        jQuery(this).css(btnPass);
    });

}

function closeLogWin() {
    jQuery("div.gs-bckgr-3254").hide();
    jQuery("div.lw-cont-3254").hide();
}

function openLogWin() {
    jQuery("div.gs-bckgr-3254").height(jQuery(document).height());
    jQuery("div.gs-bckgr-3254").show();
    jQuery("div.lw-cont-3254").css({
        "left": ((window.innerWidth - jQuery("div.lw-cont-3254").width()) / 2) + "px",
        "top": ((window.innerHeight - jQuery("div.lw-cont-3254").height()) / 2) + "px"
    }).show();
}

jQuery(document).ready(function($) {
    hoverBtnStyle();
    jQuery("a.opn-lw-3254").on("click", openLogWin);
    jQuery("div.cls-btn-3254").on("click", closeLogWin);
    jQuery('.top_menu_item').click(function(event) {
        var menuItem = $(this);
        var id = menuItem.attr('id');
        var subMenu = jQuery('#header' + id.replace('sh', ''));
//        switch (id) {
//            case 'sh7':
//                submenu = jQuery('.header7');
//                break;
//        }
        if (menuItem.hasClass('active')) {
            menuItem.removeClass('active');
            subMenu.hide();
        } else {
            jQuery('.header').hide();
            jQuery('.top_menu_item').removeClass('active');
            menuItem.addClass('active');
            subMenu.show();
        }
    });
}).keydown(function(e) {
    if (e.keyCode === 27) {
        closeLogWin();
    }
});
