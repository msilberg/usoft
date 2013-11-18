var inaddr=window.location.href;
var rfolder="http://localhost/public_html/unavi/core/html/blocks/";
var raddr=rfolder+"body.php?mode=map";

// disabling image dragging
window.onload = function (e) {
    var evt = e || window.event,// define event (cross browser)
        divs,                   // images collection
        i;                      // used in local loop
    // if preventDefault exists, then define onmousedown event handlers
    if (evt.preventDefault) {
        // collect all images on the page
        divs = document.getElementsByTagName('div');
        // loop through fetched images
        for (i = 0; i < divs.length; i++) {
            // and define onmousedown event handler
            divs[i].onmousedown = disableDragging;
        }
    }
};
function disableDragging(e) {
    e.preventDefault();
}

function getUrlVars(){
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for (var i = 0; i < hashes.length; i++) {
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars.push(hash[1]);
	}
	return vars;
}
function open_si(){
	$("div.si-bckgr").fadeIn("slow");
	$("div.si-cont").fadeIn("slow");
	$("div.cbtn-pass-"+lang+"-8").delay(600).removeClass("cbtn-pass-"+lang+"-8").toggleClass("cbtn-act-"+lang+"-8");
}
function close_si(){
	$("div.si-bckgr").fadeOut("slow");
	$("div.si-cont").fadeOut("slow");
	$("div.cbtn-act-"+lang+"-8").delay(600).removeClass("cbtn-act-"+lang+"-8").toggleClass("cbtn-pass-"+lang+"-8");
}
function runMultiple(){
	var curraddr=window.location.href;
	if (inaddr == curraddr && curraddr != raddr) {
		window.location = raddr;
	}
}
function show_fscr(num){
	$("div.fscr").fadeIn("slow");
	$("div.fscr-map").fadeIn("slow");
	$("div.lev-switch").hide();
	$("div#hncat").hide();
	$("div.shw-fscr").removeClass("shw-fscr").toggleClass("cls-fscr");
	$("div.cls-fscr-layer").show();
	$("div.bann-layer").hide();
	if (num == 0) {
		mapotpfs();
	}
}
function clearfs(){
	paperfs.remove();
}
function hot_cls(){
	$("div.hot-cls-btn").fadeOut("slow");
	$("div.hot-window").fadeOut("slow");
	$("div.hot-text").fadeOut("slow");
	$("div.hot-"+lang+"-act").removeClass("hot-"+lang+"-act").toggleClass("hot-"+lang+"-pass");
	$("div.map-"+lang+"-pass").removeClass("map-"+lang+"-pass").toggleClass("map-"+lang+"-act");
}
function str_replace ( search, replace, subject ){
	if (replace=="break"){
		replace="\n";
	}
	if(!(replace instanceof Array)){
		replace=new Array(replace);
		if(search instanceof Array){
			while(search.length>replace.length){
				replace[replace.length]=replace[0];
			}
		}
	}
	if(!(search instanceof Array))search=new Array(search);
	while(search.length>replace.length){
		replace[replace.length]='';
	}
	if(subject instanceof Array){
		for(k in subject){
			subject[k]=str_replace(search,replace,subject[k]);
		}
		return subject;
	}
	for(var k=0; k<search.length; k++){
		var i = subject.indexOf(search[k]);
		while(i>-1){
			subject = subject.replace(search[k], replace[k]);
			i = subject.indexOf(search[k],i);
		}
	}
	return subject;
}
//var timerMulti = window.setInterval("runMultiple();",30000);
function stores_list_thumb(no){
	var last_elem=$("li").index($(".ls-btn:last"))-1;
	$("div.slide-elem").eq(no).fadeIn("slow");
	$("div.slide-elem").eq(no).siblings().hide();
	$("li.ls-btn").eq(no).addClass("ls-btn-act");
	$("li.ls-btn").eq(no).siblings().removeClass("ls-btn-act");
	if (no>0){
		$("li#arr-prev").show();
		$("div.list-slider").css("right","-127px");
	}else{
		$("li#arr-prev").hide();
		$("div.list-slider").css("right","-55px");
	}
	if (no==last_elem){
		$("li#arr-next").hide()
	}else{
		$("li#arr-next").show();
	}
}
$(document).ready(function(){
	var info=0;
	var url=getUrlVars();
	var num=0;
	var lno=0;
	
	if (url[2]=="lev"){
		var lev=url[3];
	}else{
		var lev=1;
	}
	function info_step(step){
		var n=$("div.info-text").length-1;
		switch(step) {
			case "next":
				if (info == n) {
					info = 0;
				} else {
					info++;
				}
			break;
			case "prev":
				if (info == 0) {
					info = n;
				} else {
					info--;
				}
			break;
		}
	}
	// Service icons panel
	if (url[0] == "si" || url[2] == "si") {
		open_si();
	}
	$("div.si-cls").click(function(){
		close_si();
	});
	$("div.cbtn-pass-"+lang+"-8").click(function(){
		open_si();
	});
	// Info panel
	if (url[0]=="showinfo"){
		$("div.info-window").fadeIn("slow");
		$("div.info-cls-btn").fadeIn("slow");
		$("div.info-label").fadeIn("slow");
		$("div.info-arr-next").fadeIn("slow");
		$("div.info-arr-prev").fadeIn("slow");
		$("div.info-text").eq(info).fadeIn("slow");
		$("div.list-btn").hide("normal");
		$("div.info-btn-pass").removeClass("info-btn-pass").addClass("info-btn-act");
	}
	$("div.info-btn-pass").click(function(){
		if (url[0]=="mode" && url[1]!="map"){
			window.location=rfolder+"body.php?showinfo&mode=map";
		}
		else{
			$("div.info-window").fadeIn("slow");
			$("div.info-cls-btn").fadeIn("slow");
			$("div.info-label").fadeIn("slow");
			$("div.info-arr-next").fadeIn("slow");
			$("div.info-arr-prev").fadeIn("slow");
			$("div.info-text").eq(info).fadeIn("slow");
			$(this).removeClass("info-btn-pass").addClass("info-btn-act");
		}
	});
	$("div.info-cls").click(function(){
		$("div.info-window").fadeOut("slow");
		$("div.info-cls-btn").fadeOut("slow");
		$("div.info-label").fadeOut("slow");
		$("div.info-arr-next").fadeOut("slow");
		$("div.info-arr-prev").fadeOut("slow");
		$("div.info-text").fadeOut("slow");
		$("div.info-btn-act").removeClass("info-btn-act").addClass("info-btn-pass");
	});
	$("div.info-arr-next").toggle(
		function(){
			$("div.info-text").eq(info).fadeOut("slow");
			info_step("next");
			$("div.info-text").eq(info).fadeIn("slow");
		},
		function(){
		}
	);
	$("div.info-arr-prev").toggle(
		function(){
			$("div.info-text").eq(info).fadeOut("slow");
			info_step("prev");
			$("div.info-text").eq(info).fadeIn("slow");
		},
		function(){
		}
	);
	// Hot button block
	if (url[0]=="hotstep"){
		$("div.hot-window").fadeIn("slow");
		$("div.hot-cls-btn").fadeIn("slow");
		$("div.hot-text").fadeIn("slow");
		$("div.hot-btn").removeClass("hot-"+lang+"-pass").toggleClass("hot-"+lang+"-act");
		$("div.map-"+lang+"-act").removeClass("map-"+lang+"-act").toggleClass("map-"+lang+"-pass");
	}
	$("div.hot-btn").click(function(){
		if ((url[0]=="mode" && url[1]!="map") || url[0]==raddr){
			window.location="./body.php?hotstep&mode=map";
		}else{
			$("div.hot-window").fadeIn("slow");
			$("div.hot-cls-btn").fadeIn("slow");
			$("div.hot-text").fadeIn("slow");
			$("div.hot-btn").removeClass("hot-"+lang+"-pass").toggleClass("hot-"+lang+"-act");
			$("div.map-"+lang+"-act").removeClass("map-"+lang+"-act").toggleClass("map-"+lang+"-pass");
		}
	});
	$("div.hot-cls").click(function(){
		$("div.hot-cls-btn").fadeOut("slow");
		$("div.hot-window").fadeOut("slow");
		$("div.hot-text").fadeOut("slow");
		$("div.hot-"+lang+"-act").removeClass("hot-"+lang+"-act").toggleClass("hot-"+lang+"-pass");
		$("div.map-"+lang+"-pass").removeClass("map-"+lang+"-pass").toggleClass("map-"+lang+"-act");
	});
	$("div.hot-cancel-spam").toggle(
		function(){
			$(this).toggleClass("hcs-checkbox-act");
		},
		function(){
		}
	);
	// Full screen map block
	if (url[0]=="fscr"){
		show_fscr(num);
		num++;
	}
	$("div.fscr-btn").toggle(
		function(){
			show_fscr(num);
			num++;
		},
		function(){
		}
	);
	$("div.cls-fscr-layer").click(function(){
		$("div.fscr").fadeOut("slow");
		$("div.fscr-map").fadeOut("slow");
		$("div.lev-switch").show();
		$("div#hncat").show();
		$("div.fscr-btn").removeClass("cls-fscr").toggleClass("shw-fscr");
		$("div.bann-layer").show();
		$(this).hide();
	});
	// Stores list slider
	stores_list_thumb(0);
	$("div.list-slider").show();
	$("li.ls-btn").click(function(){
		lno=$("li").index(this)-1;
		stores_list_thumb(lno);
		$("div.list-slider").show();
	});
	$("li#arr-prev").toggle(
		function(){
			stores_list_thumb(--lno);
			$("div.list-slider").show();
		},
		function(){
		}
	);
	$("li#arr-next").toggle(
		function(){
			stores_list_thumb(++lno);
			$("div.list-slider").show();
		},
		function(){
		}
	);
	// Languages switching
	$("div.lang-pass").toggle(
		function(){
			$("div.lang-panel").slideToggle("slow");
			$(this).toggleClass("lang-act");
		},
		function(){
		}
	);
	$("div.arr-up").toggle(
		function(){
			$("div.lang-panel").slideToggle("slow");
			$("div.lang-pass").toggleClass("lang-act");
		},
		function(){
		}
	);
	// Top10 catalogue
	var wbtn_ind=0;
	var wbtn_curr=0;
	var wbtn_step=0;
	var wall_layer=false;
	var wall_fo=false;
	
	$("div.wall-btn").eq(0).addClass("wall-btn-act");
	$("div.top10-btn").click(function(){
		if (wall_layer==true && wbtn_step!=0){
			$("div.wall-uplayer").hide();
			$("div.pct-uplayer").show();
			$(this).removeClass("top10-btn-act").addClass("top10-btn-pass");
			wall_layer=false;
			wbtn_step=0;
			wall_fo=true;
		}else if(wall_fo==true){
			$("div.wall-uplayer").show();
			$("div.pct-uplayer").hide();
			$(this).removeClass("top10-btn-pass").addClass("top10-btn-act");
			$("div.wall-btn-act").removeClass("wall-btn-act");
			$("div.wall-btn").eq(0).addClass("wall-btn-act");
			wbtn_ind=0;
			wbtn_curr=0;
			wall_layer=true;
		}
	});
	$("div.top10-btn").toggle(
		function(){
			$("div.wall-uplayer").show();
			$("div.pct-uplayer").hide();
			$(this).removeClass("top10-btn-pass").addClass("top10-btn-act");
			$("div.wall-btn-act").removeClass("wall-btn-act");
			$("div.wall-btn").eq(0).addClass("wall-btn-act");
			wbtn_ind=0;
			wbtn_curr=0;
			wall_layer=true;
			//$("div.wall-cls-layer").show();
		},
		function(){},
		function(){
			$("div.wall-uplayer").hide();
			$("div.pct-uplayer").show();
			$(this).removeClass("top10-btn-act").addClass("top10-btn-pass");
			wall_layer=false;
			//$("div.wall-cls-layer").hide();
		},
		function(){}
	);
	/*$("div.wall-cls-layer").click(function(){
		$("div.wall-uplayer").hide();
		$("div.pct-uplayer").show();
		$("div.top10-btn").removeClass("top10-btn-act").addClass("top10-btn-pass");
		$(this).hide();
	});*/
	$("div.wall-btn").click(function(){
		wbtn_ind=$("div.wall-btn").index(this);
		wbtn_step++;
		if (wbtn_ind!=wbtn_curr){
			$("div.wall-btn-act").removeClass("wall-btn-act");
			$(this).addClass("wall-btn-act");
			switch(wbtn_ind){
				case 0: wpct_gall_0();
				break;
				case 1:	wpct_gall_1();
				break;
				case 2:	wpct_gall_2();
				break;
				case 3:	wpct_gall_3();
				break;
				case 4:	wpct_gall_4();
				break;
			}
			wbtn_curr = wbtn_ind;
		}
	});
});
