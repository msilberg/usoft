function getScript(url, success){
	var script = document.createElement('script');
	script.src = url;
	var head = document.getElementsByTagName('head')[0],
	done = false;
	script.onload = script.onreadystatechange = function(){
		if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')){
			done = true;
			success();
			script.onload = script.onreadystatechange = null;
			head.removeChild(script);
		}
	}
	head.appendChild(script);
}
function hoverBtnStyle(){
	var btnNo;
	var btnAct = {"background-image":"url(http://infotrade.ua/barabashovo/wp-content/uploads/2012/10/up-menu-bckg-bnt-hover.png)","color":"#5391B4"};
	var btnPass = {"background-image":"url(http://infotrade.ua/barabashovo/wp-content/uploads/2012/10/up-menu-bckg11.png)","color":"#C6DEE6"};
	var pathArr = window.location.pathname.split('/');
	switch (pathArr[1]){
		case 'barabashovo': btnNo = 1;
		break;
		case 'karty-i-shemy': btnNo = 2;
		break;
		case 'poleznaya-informaciya': btnNo = 3;
		break;
		case 'contacts': btnNo = 4;
		break;
		default: btnNo = 0;
	}
	jQuery("li.knopka:eq("+btnNo+")>a").css(btnAct);
	jQuery("li.knopka:eq("+btnNo+")").siblings().children().css(btnPass).mouseenter(function(){ jQuery(this).css(btnAct) }).mouseleave(function(){ jQuery(this).css(btnPass) });
}
function closeLogWin(){
	jQuery("div.gs-bckgr-3254").hide();
	jQuery("div.lw-cont-3254").hide()
}
function openLogWin(){
	jQuery("div.gs-bckgr-3254").height(jQuery(document).height());
	jQuery("div.gs-bckgr-3254").show();
	jQuery("div.lw-cont-3254").css({
		"left":((window.innerWidth-jQuery("div.lw-cont-3254").width())/2)+"px",
		"top":((window.innerHeight-jQuery("div.lw-cont-3254").height())/2)+"px"
	}).show();
}
getScript('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', function(){
	jQuery.noConflict();
	jQuery(document).ready(function($){
		hoverBtnStyle();
		jQuery("a.opn-lw-3254").on("click", openLogWin);
		jQuery("div.cls-btn-3254").on("click", closeLogWin);
	}).keydown(function(e){ if (e.keyCode == 27){ closeLogWin() } });
});