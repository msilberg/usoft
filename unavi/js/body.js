/**
 * @author Mike Silberg
 */
// Base Variables
var bVars = {};
var bMap = {};
var mSnd = {}; // map scale and drag
bMap.storesArr = [];
bMap.textArr = [];
bMap.levNamesArr = [];
bMap.circleArr = [];
bMap.flagArr = [];
bMap.lbArr = [];
bMap.siFlagArr = [];
bMap.modTarget = null;
bMap.modTargetInt = null;
bMap.mPointer = null;
bMap.targetOnMap = false;
bMap.rlevNamesCanvas = null;
var uServe = {};
var uBody = {};
uBody.langSwitcher = null;
var paperRoot = {};
var paperLevel = {};
bVars.isRoot = true;
bVars.mode = 0; // 0 - map, 1 - drum, 2 - lottery, 3 - ninetieth minute 
bVars.cat = null;
bVars.store = null;
bVars.si = null;
bVars.catStores = [];
bVars.divcbtnNo = null;
bVars.prevBann = null;
// Sliding the stores wall
bVars.countSlide = 0;
bVars.slideStep = 1118;
bVars.slideLimit = null;
bVars.gsLimit = null;
bVars.slideBegPos = null;
bVars.slideEndPos = null;
bVars.slBtnSlideBegPos = null;
bVars.dragCrit = false;
bVars.dragSlBtnCrit = false;
bVars.allowClick = null;
bVars.allowSlBtnClick = null;
bVars.allowProtect = null;
bVars.allowSlBtnProtect = null;
bVars.prevCountSlide = 0;
bVars.slBtnStepCount = 0;
bVars.infoStepCount = 0;
bVars.infoStep = 33;
bVars.allowInfoMove = false;
bVars.moveLsBtnLimiter = false;
// Screensaver vars
bVars.atClick = false;
bVars.makeAtClickFalse = null;
bVars.runScrs = null;
bVars.runScrsQueue = null;
bVars.startScrs = null;
bVars.scrsRunInterval = 120000;
bVars.ocrLimiter = false; // open call request limiter
bVars.scrsStore = null;
// Debug Vars
bVars.tempo = null;
bVars.tempo2 = null;
bVars.tempoArr = [];
bVars.tempoArr2 = [];
// Scaling Vars
mSnd.sclCount = 0;
mSnd.sclLim = 7;
mSnd.sclStep = .2;
mSnd.vscale = 1;
mSnd.fpstep = .13; // font positive step
mSnd.fnstep = .12; // font negative step
mSnd.fsizeInit = [];
mSnd.fsize = [];
mSnd.corrCrit = true;
mSnd.wd = false; // while dragging
mSnd.mtWd = null;
mSnd.mfWd = null;
mSnd.pprsLong = null;
mSnd.nprsLong = null;
mSnd.sclTimes = 1;
// Dragging Vars
mSnd.x0 = null;
mSnd.y0 = null;
mSnd.dxt = null;
mSnd.dyt = null;
mSnd.xBegCurr = null;
mSnd.yBegCurr = null;
mSnd.xEndCurr = null;
mSnd.yEndCurr = null;
// Server addressing variables
var addrUrl = {};
addrUrl.base = "http://localhost/public_html/unavi/";
addrUrl.body = addrUrl.base + "core/html/body.php";
addrUrl.html = addrUrl.base + "core/html/blocks/";
addrUrl.startApi = addrUrl.base + "core/interface/api.php";
addrUrl.api = addrUrl.startApi + "?query=";
addrUrl.vapi = addrUrl.startApi + "?var=";
addrUrl.svapi = function (name,val){ return addrUrl.startApi + "?setvar&name=" + name + "&val=" + val }
addrUrl.loadBlock = function(block){ return addrUrl.api + "1&block=" + block }
addrUrl.getLbl = function(lbl){ return addrUrl.api + "2&lbl=" + lbl }
addrUrl.getStoreCat = function(sch){ return addrUrl.api + "8&sch=" + sch }
addrUrl.checkFeature = function(storeId,featId){ return addrUrl.api + "17&store=" + storeId + "&feat=" + featId }

/*
 * --== Service functions ==--
 */
uServe.arrayKeys = function(input, search_value, strict){
	// Return all the keys of an array
	// + original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	var tmp_arr = new Array(), strict = !!strict, include = true, cnt = 0;
	for ( key in input ){
		include = true;
		if (search_value != undefined){
			if(strict && input[key] !== search_value){ include = false }
			else if(input[key] != search_value){ include = false }
		}
		if(include){
			tmp_arr[cnt] = key;
			cnt++;
		}
	}
	return tmp_arr;
}
uServe.arrayEnd = function(array) {
	// Set the internal pointer of an array to its last element
	// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +   bugfixed by: Legaev Andrey
	var last_elm, key;
	if (array.constructor === Array){ last_elm = array[(array.length-1)]}
	else{ for (key in array){ last_elm = array[key] } }
	return last_elm;
}
uServe.inArray = function(needle, haystack, strict){ 
	if ($.inArray(needle, haystack) == -1){ return false }else{ return true }
}
uServe.end = function(array){
	// Set the internal pointer of an array to its last element
	// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +   bugfixed by: Legaev Andrey
	var last_elm, key;
	if (array.constructor === Array){ last_elm = array[(array.length-1)] }
	else{ for (key in array){ last_elm = array[key] } }
	return last_elm;
}
uServe.levSupremum = function(){
	if (bMap.varsArr['lev'] == uServe.arrayEnd(bMap.varsArr['larr'])){ return true }
	else{ return false }
}
uServe.levInfimum = function(){
	if (bMap.varsArr['lev'] == bMap.varsArr['larr'][0]){ return true }
	else{ return false }
}
uServe.clearCat = function(attCat){
	if (bVars.cat == null && !attCat){ return false	}
	bVars.cat = null;
	uBody.makeCbtnPass();
}
uServe.loadLevSwitch = function(){
	if (bVars.mode != 0){ return false }
	$("div.map-btn").load(addrUrl.loadBlock("levswitch"), function(){
		$("div.map-btn").off("mousedown", bMap.back2root);
		$("div.back2root").on("mousedown", bMap.back2root);
		$("div.lau-layer").on("mousedown", uBody.lsUp);
		$("div.lad-layer").on("mousedown", uBody.lsDown);
	});
}
uServe.makeLevSwitch = function(){
	if ($("div.minisite-cont").length > 0){ uBody.bcBack() }
	bMap.setMap();
	if (bVars.store != null){ uBody.bcBack() }
	bMap.markStores();
	uBody.closeMinisite(true);
	uBody.closeWall();
	uBody.closeSi();
	mSnd.resetScale();
	mSnd.controlSclButtons(true);
	uBody.manipulateMapControls();
}
uServe.loadSi = function(){
	$.getJSON(addrUrl.vapi + "ssi_arr", function(data){
		bMap.varsArr['ssi_arr'] = data.ssi_arr;
		bMap.markSi();
		if (!bVars.isRoot){ $("div.bc-arr").show() }
	});
}
uServe.resetMap = function(){
	$("div.lev-switch").remove();
	$("div.map-btn").append("<span></span>");
	$(".map-btn span").load(addrUrl.getLbl(74));
	paperLevel[bMap.varsArr['lev']].remove();
	$("div.bc-level").text("");
	$("div.loop-cont").remove();
}
uServe.clearCurrMode = function(switcher){
	switch (bVars.mode){
		case 0:
			// map
			if (bVars.isRoot){
				for (var i = 0; i < bMap.varsArr['larr'].length; i++){ paperRoot[bMap.varsArr['larr'][i]].remove() }
				bMap.rlevNamesCanvas.remove();
				if ($("div.map-btn").hasClass("mbtn-act")){ $("div.map-btn").removeClass("mbtn-act").addClass("map-pass-bckgr") }
			}else{ uServe.resetMap() }
			uBody.closeMinisite(false,true);
			uServe.clearCat(true);
			uBody.closeWall();
			uBody.closeCallRequest();
			uBody.closeSi();
			uBody.closeScrsAnime();
			$("div.bc-layer").hide();
			if (!switcher){ $("div.hncat").hide() }else{ $("div.sibtn").hide() }
			$("div.map-btn").on("mousedown", uBody.openMapMode);
		break;
		case 1:
			// drum
			$("div.drum-layer").hide();
			$("div.drum-btn").removeClass("mbtn-act").addClass("drum-pass");
			$("div.drum-gifts").hide();
			if (switcher){ 
				$("div.hncat").show();
				$("div.sibtn").hide();
			}
		break;
		case 2:
			// lottery
			$("div.lott-btn").removeClass("mbtn-act").addClass("lott-pass");
			$("div.lott-layer").hide();
			uBody.makeCbtnPass();
			uServe.clearCat(true);
			if (!switcher){ $("div.hncat").hide() }
			$("div.cbtn").off("mousedown", uBody.openLottCat);
		break;
		case 3:
			// hot deals
			$("div.hot-btn").removeClass("mbtn-act").addClass("hot-pass");
			$("div.hot-layer").hide();
			$("div.hd-info").remove();
			$("div.thw-container").remove();
			$("div.hot-info").hide();
			if (switcher){
				$("div.hncat").show();
				$("div.sibtn").hide();
			}
		break;
	}
}
uServe.smoothSLCorner = function(switcher){
	var topCorner;
	if (bMap.varsArr['wdir'] == "rtl"){ topCorner = "border-top-right-radius" }else if (bMap.varsArr['wdir'] == "ltr"){ topCorner = "border-top-left-radius" }
	if (bVars.divcbtnNo != 0 && $("div.store-wall").attr("style") == topCorner + ": 10px;"){ return false }
	if (switcher){ $("div.store-wall").css(topCorner,5) }else{ $("div.store-wall").css(topCorner,10) }
}
uServe.runMapArr = function(inArr){
	var outArr = [];
	for (i in inArr){
		if (inArr[i].length == null){ outArr.push(inArr[i]) }
		else{ for (j in inArr[i]){ outArr.push(inArr[i][j]) } }
	}
	return outArr;
}
uServe.infoLimitProtect = function(lim){
	switch(lim){
		case "sup":
			if ((bVars.infoStepCount + 1) > 0){ return true }else{ return false }
		break;
		case "inf":
			if (Math.abs(bVars.infoStepCount) + 1 > (Math.round($("div.info-text").height()/bVars.infoStep) - 5)){ return true }
			else{ return false }
		break;
	}
}
uServe.animeClick = function(){
	$.getJSON(addrUrl.checkFeature(bVars.scrsStore,16), function(data){
		uBody.closeScrsAnime();
		uBody.openMinisite(bVars.scrsStore);
		bVars.scrsStore = null;
		if (data){
			var openCallRequest = setTimeout(function(){
				uBody.openCallRequest(true);
				clearTimeout(openCallRequest);
			}, 500)
		}
	});
}
/*
 * Screensaver Block
 */
uServe.screenSaver = function(){ 
	setInterval(function(){
		if (!bVars.atClick){
			if (bMap.varsArr['lang'] != bMap.varsArr['dlang']){ uBody.changeLang(bMap.varsArr['dlang']) }
			else{
				if (bVars.mode != 0){ uBody.openMapMode() }
				else if (!bVars.isRoot || $("div.store-wall").length > 0 || $("div.minisite-cont").length > 0 || bVars.store != null || bVars.si != null){ bMap.back2root() }
			}
			if (typeof(bVars.startScrs) != "number" || (typeof(bVars.startScrs) == "number" && !($("div.scrs-cont").length > 0))){
				bVars.startScrs = setTimeout(function(){ uBody.runScrsAnime() }, 3000)
			}
		}
	}, 6000);
}
uServe.showScrsAnime = function(id,attr){
	if (typeof(id) == "undefined" || typeof(attr) == "undefined"){ return false }
	var wCorr, hCorr;
	$.get(addrUrl.svapi("scrslast",id), function(){
		bVars.scrsStore = id;
		$(".scrs-anime-layer div").off("click", uServe.animeClick).hide();
		$("div.scrs-comm").off("click", uServe.animeClick).hide();
		if ($("div.video-player-scrs").length > 0){ $("div.video-player-scrs").remove() }
		switch(attr['type']){
			case "anime":
				$("div.sa" + id).show();
				$(".sa" + id + " div").show().css({"margin-top" : attr['scrsvcorr'], "margin-bottom" : attr['scrsvcorr'], 
					"margin-right" : attr['scrshcorr'], "margin-left" : attr['scrshcorr']}).on("click", uServe.animeClick);
			break;
			case "comm":
				$("div.scrs-comm").show().on("click", uServe.animeClick);
				uBody.openScrsVideo(id,attr);
			break;
		}
	});
}
uServe.scrsAnime = function(){
	var scrsInd = 1;
	var scrsStores = [];
	var scrsAttr = [];
	var renewQueue = false;
	$.getJSON(addrUrl.api + 19, function(data){
		$.each(data, function(key,val){
			scrsStores.push(parseFloat(key));
			scrsAttr.push(val);
		});
		setTimeout(function(){ uServe.showScrsAnime(scrsStores[0],scrsAttr[0]) }, 500);
		bVars.runScrs = setInterval(function(){
			uServe.showScrsAnime(scrsStores[scrsInd],scrsAttr[scrsInd]);
			scrsInd++;
			if ((scrsInd + 1) > data.length){ clearInterval(bVars.runScrs) }
		}, bVars.scrsRunInterval);
	});
}
uBody.runScrsAnime = function(){
	if ($("div.scrs-cont").length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0){ return false }
	var corrScrs = 2000;
	$("td.mw").append("<div class='scrs-cont'></div>");
	$("div.scrs-cont").load(addrUrl.loadBlock("screensaver"), function(){ $("div.scrs-cls-btn").on("click", uBody.closeScrsAnime) });
	uServe.scrsAnime();
	$.get(addrUrl.api + 20, function(data){ bVars.runScrsQueue = setInterval(function(){ uServe.scrsAnime() }, (bVars.scrsRunInterval * parseFloat(data) + corrScrs))	});
}
uBody.closeScrsAnime = function(){
	$("div.scrs-cont").remove();
	clearTimeout(bVars.startScrs);
	clearInterval(bVars.runScrsQueue);
	clearInterval(bVars.runScrs);
}
/*
 * --== Body control elements functions ==--
 */
uBody.openMapMode = function(){
	uServe.clearCurrMode(true);
	bVars.mode = 0;
	$("div.cbtn").mousedown(function(){ uBody.storesWall( $(this).attr("id") ) });
	$("div.map-btn").removeClass("map-pass-bckgr").addClass("mbtn-act")
	uBody.bcBack();
	$("div.bc-layer").show();
	$("div.sibtn").show();
	bVars.isRoot = true;
	bMap.setMap();
	$("div.map-btn").off("mousedown", uBody.openMapMode).on("mousedown", bMap.back2root);
	$.get(addrUrl.api + 16);
}
uBody.makeMapBtnAct = function(){
	if (!($("div.map-btn").hasClass("map-pass") || $("div.map-btn").hasClass("map-pass-bckgr"))){ return false }
	$("div.map-btn").removeClass("map-pass map-pass-bckgr").addClass("mbtn-act")
}
uBody.makeMapBtnPass = function(){
	if (bVars.isRoot){ $("div.map-btn").on("mousedown", bMap.back2root) }
	else{ uServe.loadLevSwitch() }
	$("div.map-btn").removeClass("mbtn-act").addClass("map-pass-bckgr");
}
uBody.manipulateMapControls = function(switcher){
	if (bVars.isRoot && switcher){ return false }
	if (switcher){
		$("div.bc-layer").hide();
		$("div.loop-panel").hide();
	}else{
		$("div.bc-layer").show();
		$("div.loop-panel").show();
	}
}
/*
 * Breadcrumbs block
 */
uBody.makeBcPass = function(){
	if (bVars.isRoot){ return false }
	$("div.bc-level").removeClass("bc-level-act").addClass("cbtn-pass");
	$("div.bc-layer").on("mousedown", uBody.bcBack);
}
uBody.makeBcAct = function(){
	if (bVars.isRoot){ return false }
	$("div.bc-level").removeClass("cbtn-pass").addClass("bc-level-act");
	if ($("div.bc-arr").attr("style") == "display: block;"){ $("div.bc-arr").hide() }
}
uBody.showBc = function(){
	// show level name
	$("div.bc-level").show();
	$("div.bc-level").load(addrUrl.api + 9);
}
uBody.bcBack = function(){
	if (bVars.isRoot){ uServe.clearCat(true) }
	else if ($("div.bc-level").hasClass("cbtn-pass")){
		uBody.makeBcAct();
		uServe.clearCat(true);
		uBody.closeWall();
		bMap.clearStores();
		uBody.closeSi();
	}else{ return false }
}
/*
 * Minisite block
 */
uBody.storeOnMap = function(id){
	bVars.store = parseFloat(id);
	uBody.closeMinisite(true);
	bMap.storeOnMap();
}
uBody.closeMinisite = function(clearStore,mapBtnAct){
	if ($("div.minisite-cont").length < 1){ return false }
	if (!clearStore){ bVars.store = null }
	if (bVars.isRoot && !mapBtnAct){ uBody.makeMapBtnAct() }
	if (!mapBtnAct){ uBody.manipulateMapControls() }
	uBody.top10close();
	uBody.closeVideo();
	uBody.closeCallRequest();
	$("div.minisite-cont").remove();
	$("div.bann-cell").removeClass("bann-act").addClass("bann-pass");
}
uBody.openMinisite = function(id){
	if (bVars.mode == 0){ if (bVars.dragCrit || mSnd.wd){ return false } }else{ uBody.openMapMode() }
	$.get(addrUrl.svapi("store", id), function(){
		bVars.store = parseFloat(id);
		uBody.manipulateMapControls(true);
		uBody.top10close();
		uBody.closeVideo();
		bMap.clearStores();
		uBody.closeWall();
		uBody.closeCallRequest();
		uBody.makeMapBtnPass();
		uBody.closeSi();
		uBody.makeBcPass();
		uBody.closeScrsAnime();
		// highlightening the category button if the was chosen from the map
		$.getJSON(addrUrl.getStoreCat(id), function(data){
			bVars.cat = parseFloat(data);
			$.get(addrUrl.svapi("cat", bVars.storeCat));
			uBody.makeCbtnPass();
			uBody.makeCbtnAct();
			bVars.cat = null;
		});
		if ($("div.minisite-cont").length < 1){ $("td.mw").append("<div class='minisite-cont'></div>") }
		if ($("div.bann" + id).length > 0){
			$("div.bann-cell").removeClass("bann-act").addClass("bann-pass");
			$("div.bann" + id).removeClass("bann-pass").addClass("bann-act");
			bVars.prevBann = $("div").index($("div.bann" + id));
		}
		$("div.minisite-cont").load(addrUrl.loadBlock("minisite"), function(){
			if ($("div.info-content").height() > 193){ $("div.ud-arr").show().mousedown(function(){ uBody.infoSlideMove($(this).attr("id")) })	}
			$("div.cls-btn-cross").mousedown(function(){
				uBody.closeMinisite();
				uBody.bcBack();
			});
			$("div.storemap-btn").on("mousedown", function(){ uBody.storeOnMap(id) });
			$("div.showcase").mousedown(function(){
				$.getJSON(addrUrl.checkFeature(id,8), function(data){
					$.getJSON(addrUrl.checkFeature(id,16), function(data2){
						if (data2){ uBody.openCallRequest() }
						else if (!data){
							if ($("div.video-btn").length > 0){ uBody.openVideo() }
							else if ($("div.top10-btn").length > 0){ uBody.top10open() }
							else if ($("div.gdisc-btn").length > 0){ uBody.openLottMode(id) }
							else if ($("div.contact-btn") > 0){ uBody.openCallRequest() }
							else{ uBody.storeOnMap(id) }
						}
					});
				});
			});
			$("div.gdisc-btn").on("mousedown", function(){ uBody.openLottMode(id) });
			$("div.top10-btn").on("mousedown", uBody.top10open);
			$("div.video-btn").on("mousedown", uBody.openVideo);
			$("div.contact-btn").on("mousedown", function(){ uBody.openCallRequest(false) });
		});
	});
}
uBody.top10close = function(){
	if (!$("div.top10-btn").hasClass("store-mbtn-act")){ return false }
	$("div.ttc-btn-layer").remove();
	$("div.top10-wall").hide();
	$("div.top10-btn").removeClass("store-mbtn-act").addClass("top10-btn-pass");
}
uBody.closeVideo = function(){
	if (!$("div.video-btn").hasClass("store-mbtn-act")){ return false }
	uBody.closePlayer();
	$("div.video-layer").remove();
	$("div.video-btn").removeClass("store-mbtn-act").addClass("video-btn-pass");
}
// Info slider
uBody.infoSlideMove = function(dir){
	if (bVars.allowInfoMove || (uServe.infoLimitProtect("sup") && dir == "info-arr-up") || (uServe.infoLimitProtect("inf") && dir == "info-arr-down")){ return false }
	if (dir == "info-arr-up"){ $("div.info-text").animate({"top":(++bVars.infoStepCount * bVars.infoStep) + "px"}, "normal") }
	else if (dir == "info-arr-down"){ $("div.info-text").animate({"top":(--bVars.infoStepCount * bVars.infoStep) + "px"}, "normal") }
	if (uServe.infoLimitProtect("sup")){ $("div#info-arr-up").removeClass("ud-arr-pass").addClass("ud-arr-act") }
	else{ $("div#info-arr-up").removeClass("ud-arr-act").addClass("ud-arr-pass") }
	if (uServe.infoLimitProtect("inf")){ $("div#info-arr-down").removeClass("ud-arr-pass").addClass("ud-arr-act") }
	else{ $("div#info-arr-down").removeClass("ud-arr-act").addClass("ud-arr-pass") }
	bVars.allowInfoMove = true;
	setTimeout(function(){ bVars.allowInfoMove = false }, 500);
}
// top10 wall
uBody.loadTop10Cat = function(id){
	var jfxApp = document.getElementById("wallApplet");
	if (jfxApp == null || jfxApp.script == null){ return false }
	jfxApp.script.updateContent(parseFloat(id));
	$("div.ttcat-btn").removeClass("store-mbtn-act").addClass("top10-btn-pass");
	$("div#" + id).removeClass("top10-btn-pass").addClass("store-mbtn-act");
}
uBody.top10open = function(){
	uBody.closeVideo();
	uBody.closeCallRequest();
	if ($("div.top10-btn").hasClass("top10-btn-pass")){
		$("div.top10-btn").removeClass("top10-btn-pass").addClass("store-mbtn-act");
		if ($("div.showcase").length > 0){ $("div.showcase").hide() }
		$("div.pct-uplayer").append("<div class='ttc-btn-layer'></div>");
		$("div.ttc-btn-layer").load(addrUrl.loadBlock("ttcats"), function(){
			$.get(addrUrl.api + 12, function(data){
				$("div.top10-wall").show();
				uBody.loadTop10Cat(parseFloat(data));
				$("div.ttcat-btn").mousedown(function(){ if ($(this).hasClass("top10-btn-pass")){ uBody.loadTop10Cat($(this).attr("id")) } });
			});
		});
	}else if ($("div.top10-btn").hasClass("store-mbtn-act")){
		uBody.top10close();
		$("div.showcase").show();
	}
}
// video block
uBody.closePlayer = function(){
	if ($("div.video-player").length == 0){ return false }
	$("div.vplayer-bckgr").remove();
	$("div.video-player").remove();
	if ($("div.video-close").length != 0){ $("div.video-close").remove() }
	if ($("div.videos-matrix").length != 0){ $("div.videos-matrix").css("opacity",1) }
}
uBody.openPlayer = function(trailerId,singleTrailer){
	var videoTBase = 510; // supremum of the entire video block
	var videoSBase = 731; // side alignment of the entire video block
	var clsTCorr = 30;
	var clsSCorr = 30;
	var videoDir,sideCh,topPos,sidePos;
	if ($("div.videos-matrix").length != 0){ $("div.videos-matrix").css("opacity",.4) }
	$.getJSON(addrUrl.api + 14, function(data){
		videoDir = addrUrl.base + "stores/" + data['tc'] + "/" + data['store'] + "/videos/";
		$("div.minisite-cont").append("<div class='vplayer-bckgr vplayer-bckgr-" + data['wdir'] + "'></div><div class='video-player'><div id='videoplayer7267'></div></div>");
		if (!singleTrailer){ $("div.minisite-cont").append("<div class='video-close'><div class='cls-btn-icon'></div></div>") }
		$("div.video-close").on("mousedown", uBody.closePlayer);
		topPos = videoTBase + ($("div.video-layer").height() - data['height'])/2;
		sidePos = videoSBase + ($("div.video-layer").width() - data['width'])/2;
		if (data['wdir'] == "rtl"){ sideCh = "right" }else if (data['wdir'] == "ltr"){ sideCh = "left" }
		$("div.video-player").css("top",topPos).css(sideCh,sidePos);
		if (!singleTrailer){ $("div.video-close").css("top",(topPos - clsTCorr)).css(sideCh,(sidePos + data['width'] - clsSCorr)).fadeIn(200) }
		$.getScript(addrUrl.base + "js/swfobject.js", function(){
			var flashvars = {"comment":"uniqoom","st":videoDir + "video55-1659.txt","file":videoDir + trailerId + ".flv"};
			var params = {wmode:"transparent",allowFullScreen:"true",allowScriptAccess:"always",id:"videoplayer7267"};
			new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf","videoplayer7267",data['width'],data['height'],"9.0.115.0",false,flashvars,params);
		});
	});
}
uBody.openVideo = function(){
	uBody.top10close();
	uBody.closeCallRequest();
	if ($("div.video-btn").hasClass("video-btn-pass")){
		$("div.showcase").hide();
		$("div.video-btn").removeClass("video-btn-pass").addClass("store-mbtn-act");
		$("div.pct-uplayer").append("<div class='video-layer'></div>");
		$.get(addrUrl.api + 13, function(data){
			if (parseFloat(data) > 1){
				$("div.video-layer").load(addrUrl.loadBlock("vtrailers"), function(){
					$("div.vtrailer-icon").click(function(){ uBody.openPlayer($(this).attr("id")) })
				});
			}else{ uBody.openPlayer(1,true) }
		});
	}else if ($("div.video-btn").hasClass("store-mbtn-act")){
		uBody.closeVideo();
		$("div.showcase").show();
	}
}
uBody.openScrsVideo = function(storeId,attr){
	var videoDir;
	$.getJSON(addrUrl.vapi + "tc", function(data){
		videoDir = addrUrl.base + "stores/" + data['tc'] + "/" + storeId + "/videos/";
		$("div.scrs-comm").append("<div class='video-player-scrs'><div id='videoplayer7267'></div></div>");
		$("div.video-player-scrs").css({"margin-top":attr['scrsvcorr'],"margin-bottom":attr['scrsvcorr'],"margin-right":attr['scrshcorr'],"margin-left":attr['scrshcorr']});
		$.getScript(addrUrl.base + "js/swfobject.js", function(){
			var flashvars = {"comment":"uniqoom","st":videoDir + "video55-1659.txt","file":videoDir + attr['no'] + ".flv"};
			var params = {wmode:"transparent",allowFullScreen:"true",allowScriptAccess:"always",id:"videoplayer7267"};
			new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf","videoplayer7267",attr['width'],attr['height'],"9.0.115.0",false,flashvars,params);
		});
	});
}
/*
 * Drum block
 */
function notifyGifts(gifts){
	var output = document.getElementById("drum-gifts-list");
	$.get(addrUrl.getLbl(86), function(data){
		var domUnsortedList = document.createElement("ol");
		for (key in gifts){
			var gift = gifts[key];
			var text = gift.sectorId + '. ' + gift.type + " " + gift.value + " " + data + " " + gift.storeName;
			var domText = document.createTextNode(unescape(text));
			var domListItem = document.createElement("ol");
			domListItem.appendChild(domText);
			domUnsortedList.appendChild(domListItem);
		}
		output.appendChild(domUnsortedList);
		return "Ok";
    });
}
uBody.openDrumMode = function(id){
	uServe.clearCurrMode();
	bVars.mode = 1;
	$("div.drum-btn").removeClass("drum-pass").addClass("mbtn-act");
	$("div.drum-layer").show();
	$("div.drum-gifts").show();
	$.get(addrUrl.api + 16);
}
/*
 * Lottery block
 */
uBody.openLottMode = function(id){
	uServe.clearCurrMode(true);
	bVars.mode = 2;
	$("div.lott-btn").removeClass("lott-pass").addClass("mbtn-act");
	$("div.lott-layer").show();
	bVars.cat = 0;
	uBody.makeCbtnAct();
	$("div.cbtn").on("mousedown", uBody.openLottCat);
	if (id){
		setTimeout(function(){
			var jfxApp = document.getElementById("lottApplet");
			if (jfxApp != null && jfxApp.script != null){ jfxApp.script.setStoreId(id) }
		}, 2500);
	}
	$.get(addrUrl.api + 16);
}
uBody.openLottCat = function(){
	var jfxApp = document.getElementById("lottApplet");
	if (jfxApp != null && jfxApp.script != null){ jfxApp.script.setCatalogueId(bVars.cat) }
}
/*
 * Hot Deals block
 */
uBody.openHotMode = function(){
	uServe.clearCurrMode();
	bVars.mode = 3;
	$("div.hot-btn").removeClass("hot-pass").addClass("mbtn-act");
	$("div.hot-layer").show();
	$("div.hot-info").show().load(addrUrl.loadBlock("hdinfo"));
	$.get(addrUrl.api + 16);
}
uBody.hideThanks = function(){
	$("div.thw-container").hide();
	$("div.hot-layer").show();
}
uBody.thanksWindow = function(){
	if (bVars.mode == 0){
		$("div.cr-dialer").hide();
		$("div.call-request").append("<div class='thanks-cr-text'></div>");
		$("div.thanks-cr-text").load(addrUrl.getLbl(16));
	}else if (bVars.mode == 3){
		$("div.hot-layer").hide();
		$("td.mw").append("<div class='thw-container'></div>");
		$("div.thw-container").load(addrUrl.loadBlock("thanks"), function(){ $("div.thanks-btn").on("click", uBody.hideThanks) });
	}
}
/*
 * Stores list block
 */
uBody.makeCbtnAct = function(){
	if (bVars.cat == null){ return false }
	$("div.cbtn").eq(bVars.cat).removeClass("cbtn-pass").addClass("cbtn-act");
	if (typeof(bVars.divcbtnNo) != null && bVars.divcbtnNo != bVars.cat){ uBody.makeCbtnPass() }
	bVars.divcbtnNo = bVars.cat;
}
uBody.makeCbtnPass = function(){
	if (!($("div.cbtn").hasClass("cbtn-act"))){ return false }
	$("div.cbtn" + bVars.divcbtnNo).removeClass("cbtn-act").addClass("cbtn-pass");
}
uBody.closeWall = function(switcher){
	if ($("div.list-cont").length < 1){ return false }
	if (switcher){ $("div.list-cont").hide() }else{ $("div.list-cont").remove() }
}
uBody.storesListThumb = function(no){
	if (bVars.dragSlBtnCrit || no == bVars.countSlide){ return false }
	bVars.countSlide = no;
	uBody.moveSlides(true);
}
uBody.protectLimits = function(switcher){
	/*
	 * possible values for the switcher
	 * 0 - protecting borders for pages buttons of stores' list while dragging 
	 * 1 - protecting borders for stores' list while dragging
	 */
	// start here
	switch(switcher){
		case 0:
			clearTimeout(bVars.allowSlBtnProtect);
			if ((bVars.slBtnStepCount - 1) < 0 || (bVars.slBtnStepCount + 1) == bVars.gsLimit){
				bVars.allowSlBtnProtect = setTimeout(function(){ $("div.ls-btn-cont").mouseup() }, 100)
			}
		break;
		case 1:
			clearTimeout(bVars.allowProtect);
			if ((bVars.countSlide + 1) == bVars.slideLimit || bVars.countSlide == 0){ bVars.allowProtect = setTimeout(function(){ $("div.slides-cont").mouseup() }, 250) }
		break;
	}
}
uBody.slidePrev = function(){ if ((bVars.countSlide - 1) >= 0){ bVars.countSlide-- } }
uBody.slideNext = function(){ if ((bVars.countSlide + 1) < bVars.slideLimit){ bVars.countSlide++ } }
uBody.moveSlides = function(switcher){
	// dragonly
	if (!switcher){
		if (bVars.slideBegPos < bVars.slideEndPos){ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slideNext() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slidePrev() }	}
		else{ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slidePrev() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slideNext() } }
	}
	if (bMap.varsArr['wdir'] == "rtl"){ $("div.slides-cont").animate({ "left" : (bVars.countSlide * bVars.slideStep) + "px" }, "fast") }
	else if (bMap.varsArr['wdir'] == "ltr"){ $("div.slides-cont").animate({ "left" : (bVars.countSlide * bVars.slideStep * (-1)) + "px" }, "fast") }
	if (bVars.countSlide != bVars.prevCountSlide){
		$("div.ls-btn").eq(bVars.countSlide).removeClass("ls-btn-pass").addClass("ls-btn-act");
		$("div.ls-btn").eq(bVars.prevCountSlide).removeClass("ls-btn-act").addClass("ls-btn-pass");
	}
	if (!switcher && bVars.gsLimit > 1){
		var gNum = 11;
		if (bVars.countSlide == (gNum * (bVars.slBtnStepCount + 1) + (bVars.slBtnStepCount + 1)) && bVars.countSlide > bVars.prevCountSlide){
			if (bMap.varsArr['wdir'] == "rtl"){ uBody.moveLsBtn(1) }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.moveLsBtn(0) }
		}
		if (bVars.countSlide == (gNum * bVars.slBtnStepCount + (bVars.slBtnStepCount - 1)) && bVars.countSlide < bVars.prevCountSlide){
			if (bMap.varsArr['wdir'] == "rtl"){ uBody.moveLsBtn(0) }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.moveLsBtn(1) }
		}
	}
	bVars.prevCountSlide = bVars.countSlide;
}
uBody.dragHandler = function(){
	$("div.slides-cont").draggable({
		axis: "x",
		iframeFix: true,
		distance: 50,
		start: function(event, ui){
			clearTimeout(bVars.allowClick);
			bVars.dragCrit = true;
			bVars.slideBegPos = ui.position.left;
			uBody.protectLimits(1);
		},stop: function(event, ui){
			bVars.allowClick = setTimeout(function(){ bVars.dragCrit = false }, 500);
			bVars.slideEndPos = ui.position.left;
			uBody.moveSlides();
		}
	});
}
uBody.slTriangle = function(switcher){
	var iNum;
	if (switcher){ iNum = 9 }else{ iNum = bVars.divcbtnNo }
	var startPoint = 15;
	var trStep = 73;
	var currPos = startPoint + trStep * iNum;
	if (bVars.divcbtnNo == 0){ uServe.smoothSLCorner(true) }else{ uServe.smoothSLCorner() }
	$("div.sl-tr").show().css("top",currPos);
}
uBody.loadStoresWall = function(){
	$.get(addrUrl.svapi("cat",bVars.cat), function(){
		$("div.stores-container").load(addrUrl.loadBlock("storeslist"), function(){
			$.getJSON(addrUrl.vapi + "slides_num,gs_num", function(data){
				bVars.slideLimit = data['slides_num'];
				bVars.gsLimit = data['gs_num'];
				bVars.countSlide = 0;
				bVars.prevCountSlide = 0;
				uBody.dragHandler();
				if (!uBody.closeMinisite(false,true)){ bVars.store = null }
				bMap.markStores();
				if ($("div.list-slider").length > 0){ $("div.ls-btn").click(function(){ uBody.storesListThumb($("div.ls-btn").index(this)) }) }
				if ($("div.ls-move").length > 0){
					uBody.slBtnDragHandler();
					$("div.ls-move").click(function(){
						if ($(this).hasClass("ls-move-act")){ return false }
						if (bMap.varsArr['wdir'] == "rtl"){
							if ($(this).attr("id") == "beg"){ uBody.moveLsBtn(0) }else if ($(this).attr("id") == "end"){ uBody.moveLsBtn(1) }
						}else if (bMap.varsArr['wdir'] == "ltr"){
							if ($(this).attr("id") == "beg"){ uBody.moveLsBtn(1) }else if ($(this).attr("id") == "end"){ uBody.moveLsBtn(0) }
						}
					});
				}
				$("div.store-btn-bckgr").click(function(){ uBody.openMinisite($(this).attr("id")) });
				$("div.close-wall").mousedown(function(){ 
					$("div.list-cont").hide();
					uBody.manipulateMapControls();
				});
			});
		});
	});
}
uBody.storesWall = function(btnId){
	if (bVars.mode != 0 && bVars.mode !=2){ return false }
	bVars.cat = btnId;
	uBody.makeMapBtnPass();
	uBody.makeCbtnAct();
	if (bVars.mode == 0){
		uBody.slTriangle();
		uBody.slTriangle();
		uBody.closeSi(true);
		uBody.makeBcPass();
		uBody.manipulateMapControls(true);
		uBody.closeScrsAnime();
		if (!($("div.list-cont").length > 0)){
			$("td.mw").append("<div class='list-cont'></div>");
			$("div.list-cont").load(addrUrl.html + "storeslistcont.php", function(){
				uBody.loadStoresWall();
				uBody.slTriangle();
			});
		}
		if ($("div.list-cont").attr("style") == "display: none;"){ $("div.list-cont").show() }
		uBody.loadStoresWall();
	}
}
uBody.slBtnDragHandler = function(){
	$("div.ls-btn-cont").draggable({
		axis: "x",
		iframeFix: true,
		distance: 50,
		start: function(event, ui){
			clearTimeout(bVars.allowSlBtnClick);
			bVars.dragSlBtnCrit = true;
			bVars.slBtnSlideBegPos = ui.position.left;
			uBody.protectLimits(0);
		},stop: function(event, ui){
			bVars.allowSlBtnClick = setTimeout(function(){ bVars.dragSlBtnCrit = false }, 500);
			if (bVars.slBtnSlideBegPos < ui.position.left){ uBody.moveLsBtn(1) }else{ uBody.moveLsBtn(0) }
		}
	});
}
uBody.moveLsBtn = function(dir){
	if (bVars.moveLsBtnLimiter){ return false }
	var startStep = 825;
	var aProgr = 3;
	var leftBorder = false;
	var rightBorder = false;
	bVars.moveLsBtnLimiter = true;
	if (bVars.allowSlBtnProtect != null && (bVars.slBtnStepCount + 1) == bVars.gsLimit){ rightBorder = true }
	if (bVars.allowSlBtnProtect != null && (bVars.slBtnStepCount - 1) < 0){ leftBorder = true }
	if (dir == 1){
		if (bMap.varsArr['wdir'] == "rtl"){
			if (rightBorder){
				$("div.ls-btn-cont").animate({"left":(startStep * bVars.slBtnStepCount + aProgr * bVars.slBtnStepCount) + "px"}, "fast")
			}else{ $("div.ls-btn-cont").animate({"left":(startStep * ++bVars.slBtnStepCount + aProgr * bVars.slBtnStepCount) + "px"}, "slow") }
		}else if (bMap.varsArr['wdir'] == "ltr"){
			if (leftBorder){
				$("div.ls-btn-cont").animate({"left":"0px"}, "fast")
			}else{
				$("div.ls-btn-cont").animate({"left":(startStep * --bVars.slBtnStepCount * (-1) - aProgr * bVars.slBtnStepCount) + "px"}, "slow")
			}
		}
	}else if (dir == 0){
		if (bMap.varsArr['wdir'] == "rtl"){
			if (leftBorder){ $("div.ls-btn-cont").animate({"left":"0px"}, "fast") }
			else{ $("div.ls-btn-cont").animate({"left":(startStep * --bVars.slBtnStepCount + aProgr * bVars.slBtnStepCount) + "px"}, "slow") }
		}else if (bMap.varsArr['wdir'] == "ltr"){
			if (rightBorder){
				$("div.ls-btn-cont").animate({"left":(startStep * bVars.slBtnStepCount * (-1) - aProgr * bVars.slBtnStepCount) + "px"}, "fast")
			}else{
				$("div.ls-btn-cont").animate({"left":(startStep * ++bVars.slBtnStepCount * (-1) - aProgr * bVars.slBtnStepCount) + "px"}, "slow")
			}
		}
	}
	if (bVars.slBtnStepCount == 0){ $("div.ls-move-beg").removeClass("ls-move-pass").addClass("ls-move-act") }
	else{ $("div.ls-move-beg").removeClass("ls-move-act").addClass("ls-move-pass") }
	if ((bVars.slBtnStepCount + 1) == bVars.gsLimit){ $("div.ls-move-end").removeClass("ls-move-pass").addClass("ls-move-act") }
	else{ $("div.ls-move-end").removeClass("ls-move-act").addClass("ls-move-pass") }
	setTimeout(function(){ bVars.moveLsBtnLimiter = false }, 500);
}
/*
 * Service icons
 */
uBody.closeSi = function(switcher,switcher2){
	if (!($("div.sibtn").hasClass("cbtn-act"))){ return false }
	$.get(addrUrl.svapi("si",0));
	bVars.si = null;
	bMap.clearSiFlags();
	if (!switcher){ uBody.closeWall() }
	uBody.makeBcAct();
	uBody.manipulateMapControls();
	$("div.sibtn").removeClass("cbtn-act").addClass("sibtn-pass");
	$("div.bc-otp-cont").remove();
	$("div.bc-arr").hide();
	if (switcher2 && bVars.isRoot){ uBody.makeMapBtnAct() }
}
uBody.showSi = function(id){
	if (!id){
		uServe.loadSi();
		return false; 
	}else{ bVars.si = id }
	mSnd.resetScale(true);
	uBody.closeWall(true);
	uBody.manipulateMapControls();
	$.get(addrUrl.svapi("si",bVars.si), function(){
		if (bVars.isRoot){ uServe.loadSi() }
		else{
			var crit = false;
			$.getJSON(addrUrl.vapi + "si_arr", function(data){
				$.each(data.si_arr[bVars.si], function(i,val){ if (bMap.varsArr['lev'] == val){ crit = true } });
				if (crit){ uServe.loadSi() }
				else{			
					paperLevel[bMap.varsArr['lev']].remove();
					bMap.varsArr['lev'] = data.si_arr[bVars.si][0];
					$.get(addrUrl.svapi("lev",bMap.varsArr['lev']), function(){
						bMap.setMap();
						setTimeout(function(){ uServe.loadSi() }, 500);
						uServe.loadLevSwitch();
					});
				}
			});
		}
		$("div.bc-otp").load(addrUrl.loadBlock("siname"));
		uBody.makeBcPass();
	});
}
uBody.siWall = function(){
	bMap.clearStores();
	uServe.clearCat();
	uBody.makeMapBtnPass();
	uBody.makeCbtnPass();
	uBody.manipulateMapControls(true);
	uBody.closeScrsAnime();
	if ($("div.minisite-cont").length > 0){
		uBody.closeMinisite();
		uBody.makeMapBtnPass();
	}
	$("div.sibtn").removeClass("sibtn-pass").addClass("cbtn-act");
	if ($("div.list-cont").length < 1){
		$("td.mw").append("<div class='list-cont'></div>")
		$("div.list-cont").load(addrUrl.html + "storeslistcont.php",function(){
			$("div.stores-container").load(addrUrl.loadBlock("si"), function(){
				$("div.si-btn").mousedown(function(){ uBody.showSi($(this).attr("id")) });
				$("div.close-wall").mousedown(function(){ uBody.closeSi(false,true) });
				uBody.slTriangle(true);
			});
		});
	}else{
		if ($("div.list-cont").attr("style") == "display: none;"){ $("div.list-cont").show() }
		$("div.stores-container").load(addrUrl.loadBlock("si"), function(){
			$("div.si-btn").mousedown(function(){ uBody.showSi($(this).attr("id")) });
			$("div.close-wall").mousedown(function(){ uBody.closeSi(false,true) });
			uBody.slTriangle(true);
		});
	}
}
/*
 * Levels switcher block
 */
uBody.lsPickUp = function(){
	$("div.lev-switch").css("top","-2px");
}
uBody.lsLower = function(){
	$("div.lev-switch").css("top","0px");
}
uBody.lsUp = function(){
	if (uServe.levSupremum()){ return false }
	else if (uServe.levInfimum()){
		$("div.lad-layer").removeClass("la-bckgr-act lad-frame-act-" + bMap.varsArr['wdir']);
		$("div.ls2").show();
		$("div.lev-arrow-down").css("border-top-color","#ffffff");
		$("div.ls1").css("top","0px");
		uBody.lsLower();
	}
	paperLevel[bMap.varsArr['lev']].remove();
	$.get(addrUrl.svapi("lev",++bMap.varsArr['lev']), function(){
		if (uServe.levSupremum()){
			$("div.lau-layer").addClass("la-bckgr-act lau-frame-act");
			$("div.lev-separate").hide();
			$("div.lev-arrow-up").css("border-bottom-color","#222222");
			uBody.lsPickUp();
		}
		uServe.makeLevSwitch();
	});
}
uBody.lsDown = function(){
	if (uServe.levInfimum()){ return false }
	else if (uServe.levSupremum()){
		$("div.lau-layer").removeClass("la-bckgr-act lau-frame-act");
		$("div.lev-separate").show();
		$("div.lev-arrow-up").css("border-bottom-color","#ffffff");
		uBody.lsLower();
	}
	paperLevel[bMap.varsArr['lev']].remove();
	$.get(addrUrl.svapi("lev",--bMap.varsArr['lev']), function(){
		if (uServe.levInfimum()){
			$("div.lad-layer").addClass("la-bckgr-act lad-frame-act-" + bMap.varsArr['wdir']);
			$("div.ls2").hide();
			$("div.lev-arrow-down").css("border-top-color","#222222");
			$("div.ls1").css("top","2px");
			uBody.lsPickUp();
		}
		uServe.makeLevSwitch();
	});
}
/*
 * Language and writing direction switch block 
 */
uBody.changeLang = function(lang){
	if (bMap.varsArr['lang'] == lang){ return false }
	$.get(addrUrl.svapi("lang",lang), function(){ window.location.reload() });
}
uBody.langOpenClose = function(){
	if ($("div.lang-btn").hasClass("lang-pass")){
		$("div.lang-btn").removeClass("lang-pass").addClass("lang-act");
		$("div.lang-close").on("mousedown", uBody.langOpenClose);
		uBody.langSwitcher = setTimeout(function(){ uBody.langOpenClose() }, 15000);
	}else if ($("div.lang-btn").hasClass("lang-act")){
		$("div.lang-btn").removeClass("lang-act").addClass("lang-pass");
		$("div.lang-close").off("mousedown", uBody.langOpenClose);
		clearTimeout(uBody.langSwitcher);
	}
	$("div.lang-panel").slideToggle();
}
/*
 * Loop Block
 */
uBody.sclHandler = function(){
	$("div.scale-plus").on("click", mSnd.pScale).mousedown(function(){
		mSnd.pprsLong = setTimeout(function(){
			mSnd.sclTimes = mSnd.sclLim - mSnd.sclCount + 1;
			mSnd.pScale();
		},600)
	}).mouseup(function(){
		clearTimeout(mSnd.pprsLong);
		mSnd.sclTimes = 1;
		mSnd.pScale();
	});
	$("div.scale-minus").on("click", mSnd.nScale).mousedown(function(){
		mSnd.nprsLong = setTimeout(function(){ mSnd.resetScale(true) },600)
	}).mouseup(function(){
		clearTimeout(mSnd.nprsLong);
		mSnd.sclTimes = 1;
		mSnd.nScale();
	});
}
/*
 * Call request dialer
 */
uBody.closeCallRequest = function(){
	if (!($("div.call-request").length > 0)){ return false }
	if ($("div.thanks-cr-text").length > 0){ $("div.thanks-cr-text").remove() }
	$("div.cr-dialer").show();
	$("div.call-request").hide();
	$("div.contact-btn").removeClass("store-mbtn-act").addClass("contact-btn-pass");
	$("div.showcase").show();
}
uBody.openCallRequest = function(switcher){
	if ((!switcher && $("div.contact-btn").hasClass("contact-btn-pass")) || switcher){
		uBody.top10close();
		uBody.closeVideo();
		$("div.contact-btn").removeClass("contact-btn-pass").addClass("store-mbtn-act");
		$("div.showcase").hide();
		$("div.call-request").show();
		setTimeout(function(){
			var jfxApp = document.getElementById("dialer");
			if (jfxApp != null && jfxApp.script != null){
				jfxApp.script.setBackgroundColor("#e6e7e8");
				jfxApp.script.setStoreId(bVars.store);
			}
		}, 500);		
		$("span#store-name").load(addrUrl.api + 18);
	}else if($("div.contact-btn").hasClass("store-mbtn-act")){ uBody.closeCallRequest() }
}
/*
 * Message Box
 */
uBody.togglePB = function(switcher){
	if (switcher && $("div.total-pb-bckgr").is(":hidden")){
		$("div.total-pb-bckgr").show();
		$("div.pb-icon-cont").show().on("mousedown", function(){ return false });
	}else if (!switcher && $("div.total-pb-bckgr").is(":visible")){
		$("div.total-pb-bckgr").hide();
		$("div.pb-icon-cont").hide().off("mousedown");
	}
}
uBody.closeMsgBox = function(){
	if ($("div.msg-box").is(":hidden")){ return false }
	$("div.msg-box").hide();
	$("div.total-pb-bckgr").off("mousedown", uBody.closeMsgBox);
	uBody.togglePB();
}
uBody.openMsgBox = function(id){
	$.get(addrUrl.getLbl(id), function(data){
		uBody.togglePB(true);
		$("div.pb-icon-cont").hide();
		$("div.msg-box").show().css({
			"left": ((window.innerWidth - $("div.msg-box").width()) / 2) + "px",
			"top": ((window.innerHeight - $("div.msg-box").height()) / 2) + "px"
		}).on("mousedown", function(){ return false });
		$("div.msg-txt>div").text(data);
		$("div.msg-cls").on("mousedown", uBody.closeMsgBox);
		$("div.total-pb-bckgr").on("mousedown", uBody.closeMsgBox);
		$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.closeMsgBox() } });
	});
}
//=======================
$(document).ready(function(){
	// Stores List
	bMap.setMap();
	$("div.list-btn").live("click", uBody.slOpenClose);
	$("div.cbtn").on("mousedown", function(){ uBody.storesWall($(this).attr("id")) });
	$("div.bann-cell").on("mousedown", function(){ uBody.openMinisite($(this).attr("id")) });
	$("div.sibtn").on("mousedown", uBody.siWall);
	$("div.lang-btn").on("mousedown", uBody.langOpenClose);
	$("div.lang-elem").on("mousedown", function(){ uBody.changeLang($(this).attr("id")) });
	$("div.drum-btn").on("mousedown", uBody.openDrumMode);
	$("div.lott-btn").on("mousedown", uBody.openLottMode);
	$("div.hot-btn").on("mousedown",  uBody.openHotMode);
	$("html, body").mousedown(function(){
		clearTimeout(bVars.makeAtClickFalse);
		bVars.atClick = true;
		bVars.makeAtClickFalse = setTimeout(function(){ bVars.atClick = false }, 120000);
	});
	uServe.screenSaver();
});