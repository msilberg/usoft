/**
 * @author Mike Silberg
 */

var bVars = {};
var bMap = {};
var uServe = {};
var uBody = {};

// Base Variables
uBody.langSwitcher = null;
bVars.cat = null;
bVars.store = null;
bVars.divcbtnNo = null;
bVars.prevBann = null;

// Sliding the stores wall
bVars.countSlide = 0;
bVars.slideStep = 1118;
bVars.ssCorr = 4;
bVars.slType = null;
bVars.ssCorrVal = 0
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
bVars.ppMMBtnPass = null;
bMap.varsArr = null;
bVars.tLoadSlider = null;
bVars.thSclHnt = null;
bVars.tshSclHnt = null;
bVars.ttglBtn = null;
bVars.pmType = null; // promotion type
bVars.prevCountSlide = 0;
bVars.slBtnStepCount = 0;
bVars.moveLsBtnLimiter = false;
bVars.rootScale = 0;
bVars.tbToRoot = null; // back to Root Timer
bVars.bgThreshold = 3;
bVars.bgPointer = 0;
bVars.bgTail = 0;
bVars.specCat = [342];
bVars.omSize = {'w':51,'h':76};
bVars.chmSize = {'w':56,'h':89};
bVars.catChmSize = {'w':56,'h':89};
bVars.flagSize = {'w':52,'h':45};
bVars.shcPnt = 0; // pointer of caret in the search field  
bVars.brwsPref = null;
bVars.showTTS = true;
bVars.singleTrailer = false;
// Screensaver vars
bVars.atClick = false;
bVars.makeAtClickFalse = null;
bVars.runScrs = null;
bVars.runScrsQueue = null;
bVars.startScrs = null;
bVars.scrsRunInterval = 3000; //95000;
bVars.ocrLimiter = false; // open call request limiter
bVars.scrsStore = null;
// Mapping vars
bVars.maxScale = 8;
bVars.zoomSup = 10;
bVars.somCrit = false;
bVars.openOrigin = null;
bVars.mIdArr = [];
bVars.chsmIdArr = [];
bVars.mArr = [];
bVars.tMapMove = null;
bMap.stCoords = [];
bMap.chmCoords = [];
bMap.ppCoords = [];

// Server addressing variables
var addrUrl = {};
addrUrl.base = "http://localhost/public_html/unavimp/"
addrUrl.startApi = addrUrl.base + "core/interface/api.php";
addrUrl.urlBckgr = addrUrl.base + "config/35/mod/bismall.txt";
addrUrl.api = addrUrl.startApi + "?query=";
addrUrl.vapi = addrUrl.startApi + "?var=";
addrUrl.markers = function(){
	var extent = bMap.map.getExtent();
	return "http://uadmin.no-ip.biz:8080/geo?SERVICE=UniqoomAPI&REQUEST=milestone&TCID=35&X1=" + extent['left'] +"&X2=" + extent['right'] +
		"&Y1=" + extent['bottom'] + "&Y2=" + extent['top'] + "&jsoncallback=?";
}
addrUrl.svapi = function (name,val){ return addrUrl.startApi + "?setvar&name=" + name + "&val=" + val }
addrUrl.loadBlock = function(block){ return addrUrl.api + "1&block=" + block }
addrUrl.getLbl = function(lbl){ return addrUrl.api + "2&lbl=" + lbl }
addrUrl.getStoreCat = function(sch){ return addrUrl.api + "8&sch=" + sch }
addrUrl.checkFeature = function(storeId,featId){ return addrUrl.api + "17&store=" + storeId + "&feat=" + featId }
addrUrl.getSCName = function(cname){ return addrUrl.api + "4&cname=" + cname }
addrUrl.getPrmSt = function(){ return addrUrl.api + 5 }
addrUrl.getSchId = function(){ return addrUrl.api + 6 }
addrUrl.getScatName = function(){ return addrUrl.api + 7 }
addrUrl.getJS = function(name){ return addrUrl.base + "js/" + name + ".js" }
addrUrl.getFCatId = function(){ return addrUrl.api + 12 }
addrUrl.getIcon = function(icon){ return "url(" + addrUrl.base + "graphics/icons/mod/" + icon + ".png)" }
addrUrl.getStandBySt = function(){ return addrUrl.api + 23 }
addrUrl.getImage = function(img,ext){
	if (!ext){ ext = "png" }
	return "url(" + addrUrl.base + "graphics/" + img + "." + ext + ")";
}
addrUrl.getCImage = function(img,ext){
	if (!ext){ ext = "png" }
	return addrUrl.base + "graphics/" + img + "." + ext;
}
addrUrl.getMCoords = function(){ return addrUrl.api + 19 }
addrUrl.getSi = function(si){ return addrUrl.api + "24&sich=" + si }

// Debug Vars
bVars.tempo = 15;
bVars.tempo2 = null;
bVars.tempoArr = [];
bVars.tempoArr2 = [];

/*
 * --== Service functions ==--
 */
uServe.arrayKeys = function(input, search_value, strict){
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
uServe.arrayEnd = function(array){
	var last_elm, key;
	if (array.constructor === Array){ last_elm = array[(array.length-1)]}
	else{ for (key in array){ last_elm = array[key] } }
	return last_elm;
}
uServe.inArray = function(needle, haystack){
	if ($.inArray(needle, haystack) == -1){ return false }else{ return true }
}
uServe.end = function(array){
	var last_elm, key;
	if (array.constructor === Array){ last_elm = array[(array.length-1)] }
	else{ for (key in array){ last_elm = array[key] } }
	return last_elm;
}
uServe.toggleMap = function(switcher){
	if (switcher){
		$("div#smap").show();
		$("div#scl-cnt").show();
		uServe.markerAboveBckgr();
	}else{
		$("div#smap").hide();
		$("div#scl-cnt").hide();
		uBody.toggleAddCbtn();
	}
}
uServe.toggleListBtn = function(switcher){
	if (bVars.showTTS && switcher && !($("div.show-st-list").is(":visible"))){ $("div.show-st-list").show() }
	else if (!switcher && $("div.show-st-list").is(":visible")){ $("div.show-st-list").hide() }
}
uServe.arrSub = function(arr1,arr2){
	var respond = $.grep(arr1,function (item){
		return $.inArray(item, arr2) < 0;
	});
	return respond;
}
uServe.addNewMarker = function(arr,type){
	/*
	 * Marker types
	 * 1 - ordinar marker
	 * 2 - chosen marker
	 * 3 - chosen category markers
	 */
	var pct, size, storeId, act, layer, catCrit;
	var mId = [];
	var lonLat = new OpenLayers.LonLat(arr['x'],arr['y']).transform(new OpenLayers.Projection("EPSG:4326"),bMap.map.getProjectionObject());
	switch (type){
		case 1:
			layer = bMap.markers;
			size = new OpenLayers.Size(bVars.omSize['w'],bVars.omSize['h']);
			act = "";
			mId = bVars.mIdArr;
			catCrit = true;
		break;
		case 2:
			layer = bMap.chsMarker;
			size = new OpenLayers.Size(bVars.chmSize['w'],bVars.chmSize['h']);
			act = "a";
			mId = bVars.mIdArr;
			catCrit = false;
		break;
		case 3:
			layer = bMap.catChsMarkers;
			size = new OpenLayers.Size(bVars.catChmSize['w'],bVars.catChmSize['h']);
			act = "a";
			mId = bVars.chsmIdArr;
			if (isNaN(arr['cc']) || typeof(arr['cc']) == "undefined" || arr['cc'] == null){ catCrit = false }else{ catCrit = arr['cc'] }
		break;
	}
	if (isNaN(arr['icat']) || arr['icat'] == 0 || arr['icat'] == null){ pct = 16 }else{ pct = arr['icat'] }
	if (typeof(arr['store']) == "undefined"){ storeId = bVars.store }else{ storeId = parseFloat(arr['store']) }
	var icon = new OpenLayers.Icon(addrUrl.base + 'graphics/cmi/mod/' + pct + act + '.png', size, new OpenLayers.Pixel(-(size.w/2), -size.h));
	var newMarker = new OpenLayers.Marker(lonLat, icon);
	newMarker.events.register('mousedown', layer, function(evt){
		uBody.openMinisite(storeId,catCrit);
		uServe.respiteSCS();
		OpenLayers.Event.stop(evt);
	});
	newMarker.planeID = storeId;
	layer.addMarker(newMarker);
	bVars.mArr.push(newMarker);
	mId.push(storeId);
}
uServe.resetGsNum = function(){
	bVars.slBtnStepCount = 0;
}
uServe.markerAboveBckgr = function(){
	var bckgrZi = parseFloat(bMap.bckgrIcons.getZIndex());
	if (typeof(bMap.markers) != "undefined" && bckgrZi > parseFloat(bMap.markers.getZIndex())){ bMap.markers.setZIndex(bckgrZi + 8) }
	if (typeof(bMap.ppm) != "undefined" && bckgrZi > parseFloat(bMap.ppm.getZIndex())){ bMap.ppm.setZIndex(bckgrZi + 9) }
	if (typeof(bMap.chsMarker) != "undefined" && bckgrZi > parseFloat(bMap.chsMarker.getZIndex())){ bMap.chsMarker.setZIndex(bckgrZi + 10) }
	if (typeof(bMap.catChsMarkers) != "undefined" && bckgrZi > parseFloat(bMap.catChsMarkers.getZIndex())){ bMap.catChsMarkers.setZIndex(bckgrZi + 11) }
}
uServe.toggleBckgr = function(){
	if (bMap.map.getZoom() >= bVars.bgThreshold){ bVars.bgPointer = 1 }else{ bVars.bgPointer = 0 }
	if (bVars.bgPointer != bVars.bgTail){
		if (bVars.bgPointer > bVars.bgTail){ addrUrl.urlBckgr = addrUrl.base + "config/35/mod/binormal.txt" }
		else{ addrUrl.urlBckgr = addrUrl.base + "config/35/mod/bismall.txt" }
		bMap.map.removeLayer(bMap.bckgrIcons);
		delete bMap.bckgrIcons;
		bMap.setBckgrIcons();
		uServe.markerAboveBckgr();
	}	
	bVars.bgTail = bVars.bgPointer;
}
uServe.loadSlider = function(slider){
	var showCrit = true;
	$("div.close-wall").off("mousedown").mousedown(function(){ uBody.closeWall(true) });
	clearTimeout(bVars.tLoadSlider);
	bVars.tLoadSlider = setTimeout(function(){
		if (!($("div.ls-cont").length > 0)){ $("td.mw").append("<div class='ls-cont' style='display:none;'></div>") }else{ $("div.ls-cont").hide() }
		$("div.ls-cont").load(addrUrl.loadBlock("slider"), function(){
			$.getJSON(addrUrl.vapi + "slides_num,gs_num", function(data){
				if (!($("div.list-cont").length > 0)){
					$("div.ls-cont").remove();
					return false;
				}else if ($("div.list-cont").is(":hidden")){ showCrit = false }
				bVars.slideLimit = data['slides_num'];
				bVars.gsLimit = data['gs_num'];
				bVars.countSlide = 0;
				bVars.prevCountSlide = 0;
				uBody.storesListThumb(0,true);
				switch(bVars.slType){
					case 1: $("div.ls-cont").attr("id","lsbtn-scats");
					break;
					case 2:
						$("div.back2scat").mousedown(function(){ if (bVars.showTTS){ uBody.showTTstores() }else{ uBody.scatsWall(bVars.cat) } });
						$("div.ls-cont").attr("id","lsbtn-stores");
					break;
					case 3: $("div.ls-cont").attr("id","lsbtn-sch");
					break;
					case 5: $("div.ls-cont").attr("id","lsbtn-si");
					break;		
				}
				if (showCrit){ $("div.ls-cont").fadeIn(200) }
				if (!($("div.close-wall").length > 0) && $("div.rst-list-cont").length > 0){
					$("div.list-cont").append("<div class='subcat-container subcat-container-" + bMap.varsArr['wdir'] + "'></div>");
					$.get(addrUrl.loadBlock("wallheader"), function(data){
						$("div.subcat-container").append(data);
						$("div.close-wall").mousedown(function(){ uBody.closeWall(true) });
					});
				}
				uBody.dragHandler();
				uBody.slBtnDragHandler();
			});
		});
	}, 500);
}
uServe.chmEx = function(){
	// checks if chosen markers by the category exist on the map
	if (typeof(bMap.catChsMarkers) != "undefined" && bVars.chsmIdArr.length > 0){ return true }else{ return false }
}
uServe.markSchList = function(){
	// marking a search list window for its retrieve in the case of hiding it
	if (!($("div#schlist").length > 0)){ return false }
	if ($("div#schlist").is(":visible")){ $("div#schlist").append("<input type='hidden' class='shw-sch-list' />") }
}
uServe.showHiddenMarker = function(arr){
	var crit = false;
	for (var i in bVars.mArr){ if (bVars.mArr[i].planeID == bVars.store && bVars.mArr[i].onScreen()){ crit = true } }
	if (crit){ bMap.map.zoomToMaxExtent() }else{ bMap.map.moveTo(new OpenLayers.LonLat(arr['x'],arr['y']),bVars.rootScale) }
}
uServe.controlSclBtns = function(){
	var mScl = bMap.map.getZoom();
	if (mScl > 0){
		$("div.olControlZoomOutItemInactive").removeClass("scl-btn-act").addClass("scl-btn-pass")
	}else{
		$("div.olControlZoomOutItemInactive").removeClass("scl-btn-pass").addClass("scl-btn-act")
	}
	if (mScl < (bVars.zoomSup - 1)){
		$("div.olControlZoomInItemInactive").removeClass("scl-btn-act").addClass("scl-btn-pass")
	}else{
		$("div.olControlZoomInItemInactive").removeClass("scl-btn-pass").addClass("scl-btn-act")
	}
}
uServe.rotateAL = function(){
	// rotate ajax
	$("div.pb-icon>div:eq(0)").rotate({
		angle:0, 
		animateTo:360, 
		callback: uServe.rotateAL,
		easing: function (x,t,b,c,d){ return c*(t/d)+b }
	})
}
uServe.setBrwsPref = function(){
	if ($.browser.mozilla){ bVars.brwsPref = "-moz-" }else if ($.browser.webkit){ bVars.brwsPref = "-webkit-" }
}
uServe.detectCaret = function(){
	var el = document.getElementById("sch-area");
	if (el.selectionStart || el.selectionStart == '0'){ bVars.shcPnt = el.selectionStart }
}
uServe.moveCaret2End = function(){
	var el = document.getElementById("sch-area");
	el.selectionStart = el.selectionEnd = bVars.shcPnt = el.value.length;
}
uServe.runCaretLeft = function(){
	if (bVars.shcPnt == 0){ return false }
	var el = document.getElementById("sch-area");
	el.selectionStart = el.selectionEnd = --bVars.shcPnt;
}
uServe.runCaretRight = function(){
	var el = document.getElementById("sch-area");
	if (bVars.shcPnt == el.value.length){ return false }
	el.selectionStart = el.selectionEnd = ++bVars.shcPnt;
}
uServe.toggleLsContBckgr = function(switcher,switcher2){
	if (switcher){
		$("div.list-cont").css("background-image",addrUrl.getImage("ajax-loader_mod","gif"));
		if (!switcher2){ $("div.ls-cont").remove() }
	}else{ $("div.list-cont").css("background-image","none") }
}
/*
 * Screensaver block
 */
uServe.respiteSCS = function(switcher){
	clearTimeout(bVars.makeAtClickFalse);
	bVars.atClick = true;
	bVars.makeAtClickFalse = setTimeout(function(){ bVars.atClick = false }, 2000); //120000);
	uBody.closeScrsAnime(switcher);
}
uServe.screenSaver = function(){
	setInterval(function(){
		if (!bVars.atClick){
			if (bMap.varsArr['lang'] != bMap.varsArr['dlang']){ uServe.changeLang(bMap.varsArr['dlang']) }
			else{
				if (
					(uServe.chmEx() && bVars.pmType != 3) || 
					bMap.map.getZoom() > 0 || 
					$("textarea.sch-field").val().length > 0 || 
					$("div.minisite-cont").length > 0 || 
					$("div.list-cont").length > 0 || 
					$("div#smap").attr("style") > 0 || 
					typeof(bMap.ppm) != "undefined" || 
						$("div.olPopup").length > 0 || 
					$("div.msg-box").is(":visible") || 
					$("div.ui-keyboard").is(":visible")
				){ uBody.back2root() }
				else if (!uServe.chmEx()){
					uBody.toggleMapBtn(true);
					uBody.showStandByStores();
				}
				$.get(addrUrl.api + 21, function(data){ if (parseInt(data) > 0){ uBody.runScrsAnime() } });
			}
		}
	}, 1500); //10000);
}
uServe.animeClick = function(){
	uBody.closeScrsAnime();	
	uBody.openMinisite(bVars.scrsStore,true)
}
uServe.showScrsAnime = function(id,attr){
	if (typeof(id) == "undefined" || typeof(attr) == "undefined"){ return false }
	var left = (window.innerWidth - attr['width']) / 2;
	var top = (window.innerHeight - attr['height']) / 2;
	$.get(addrUrl.svapi("scrslast",id), function(){
		bVars.scrsStore = id;
		$(".scrs-anime-layer>div").off("mousedown", uServe.animeClick).hide();
		$("div.scrs-comm").off("mousedown", uServe.animeClick).hide();
		if ($("div.video-player-scrs").length > 0){ $("div.video-player-scrs").remove() }
		if (attr['type'] == "anime"){
			$("div.sa" + id).css({"top":top+"px","left":left+"px","width":attr['width']+"px","height":attr['height']+"px"}).show().on("mousedown", uServe.animeClick);
			$("div.sa" + id + ">div").removeAttr("style").show();
		}else if (attr['type'] == "comm"){
			$("div.scrs-comm").css({"top":top+"px","left":left+"px","width":attr['width']+"px","height":attr['height']+"px"}).show().on("mousedown", uServe.animeClick);
			uBody.openScrsVideo(id,attr);
		}
	});
}
uServe.scrsAnime = function(){
	var scrsInd = 1;
	var scrsStores = [];
	var scrsAttr = [];
	var renewQueue = false;
	$.getJSON(addrUrl.api + 20, function(data){
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
	// initiates screen saver start
	if ($("div.scrs-cont").length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0){ return false }
	var corrScrs = 2000;
	uBody.togglePB(true);
	$("td.mw").append("<div class='scrs-cont'></div>");
	$("div.scrs-cont").load(addrUrl.loadBlock("screensaver"), function(){
		$("div.pb-icon-cont").hide();
		$("div.scrs-cont").on("mousedown", uBody.closeScrsAnime);
		$("div.scrs-cls-btn").on("mousedown", uBody.closeScrsAnime);
	});
	uServe.scrsAnime();
	$.get(addrUrl.api + 21, function(data){ bVars.runScrsQueue = setInterval(function(){ uServe.scrsAnime() }, (bVars.scrsRunInterval * parseFloat(data) + corrScrs))	});
}
uBody.closeScrsAnime = function(switcher){
	if ($("div.scrs-cont").length > 0){ $("div.scrs-cont").remove() }
	if (!switcher){
		$("div.total-pb-bckgr").off("mousedown", uBody.closeScrsAnime);
		uBody.togglePB();
	}
	clearTimeout(bVars.startScrs);
	clearInterval(bVars.runScrsQueue);
	clearInterval(bVars.runScrs);
}
/*
 * Video block
 */
uBody.closePlayer = function(){
	if ($("div.video-player").length == 0){ return false }
	$("div.video-player").remove();
	$("div.video-close").remove();
	$("div.total-pb-bckgr").off("mousedown", uBody.closePlayer);
	uBody.togglePB();
	if (bVars.singleTrailer){ uBody.closeVideo() }
}
uBody.openPlayer = function(trailerId){
	var clsCorr = 36;
	var videoDir,topPos,sidePos;
	uBody.togglePB(true);
	$.getJSON(addrUrl.api + 14, function(data){
		$("div.pb-icon-cont").hide();
		videoDir = addrUrl.base + "stores/" + data['tc'] + "/" + data['store'] + "/videos/mod/";
		$("body").append("<div class='video-player'><div id='videoplayer7267'></div></div><div class='video-close'></div>");
		$("div.video-player").on("mousedown", function(){ return false });
		$("div.video-close").on("mousedown", uBody.closePlayer);
		$("div.total-pb-bckgr").on("mousedown", uBody.closePlayer);
		topPos = (window.innerHeight - data['height']) / 2;
		sidePos = (window.innerWidth - data['width']) / 2;
		$("div.video-player").css({
			"top": topPos + "px",
			"left": sidePos + "px"
		});
		$("div.video-close").css({
			"top": (topPos - clsCorr) + "px",
			"left": (sidePos + data['width'] - clsCorr) + "px"
		});
		$.getScript(addrUrl.base + "js/swfobject.js", function(){
			var flashvars = {"comment":"uniqoom","st":videoDir + "video55-1659.txt","file":videoDir + trailerId + ".flv"};
			var params = {wmode:"transparent",allowFullScreen:"true",allowScriptAccess:"always",id:"videoplayer7267"};
			new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf","videoplayer7267",data['width'],data['height'],"9.0.115.0",false,flashvars,params);
		});
	});
}
uBody.openVideo = function(){
	uBody.closeTopTen();
	$("div.video-btn").removeClass("sm-btn-pass").addClass("sm-btn-act").off("mousedown", uBody.openVideo);
	setTimeout(function(){ $("div.video-btn").on("mousedown", uBody.closeVideo) }, 500);
	$.get(addrUrl.api + 13, function(data){
		if (parseFloat(data) > 1){
			$("div.showcase").hide();
			$("div.pct-uplayer").append("<div class='video-layer'></div>");
			$("div.video-layer").load(addrUrl.loadBlock("vtrailers"), function(){
				$("div.vtrailer-icon").click(function(){ uBody.openPlayer($(this).attr("id")) })
			});
		}else{
			uBody.openPlayer(1);
			bVars.singleTrailer = true;
		}
	});
}
uBody.closeVideo = function(){
	$("div.video-btn").removeClass("sm-btn-act").addClass("sm-btn-pass").off("mousedown", uBody.closeVideo);
	setTimeout(function(){ $("div.video-btn").on("mousedown", uBody.openVideo) }, 500);
	$("div.video-layer").remove();
	if ($("div.showcase").is(":hidden")){ $("div.showcase").show() }
	bVars.singleTrailer = false;
}
uBody.openScrsVideo = function(storeId,attr){
	var videoDir;
	$.getJSON(addrUrl.vapi + "tc", function(data){
		videoDir = addrUrl.base + "stores/" + data['tc'] + "/" + storeId + "/videos/mod/";
		$("div.scrs-comm").append("<div class='video-player-scrs'><div id='videoplayer7267'></div></div>");
		$.getScript(addrUrl.getJS("swfobject"), function(){
			var flashvars = {"comment":"uniqoom","st":videoDir + "video55-1659.txt","file":videoDir + attr['no'] + ".flv"};
			var params = {wmode:"transparent",allowFullScreen:"true",allowScriptAccess:"always",id:"videoplayer7267"};
			new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf","videoplayer7267",attr['width'],attr['height'],"9.0.115.0",false,flashvars,params);
		});
	});
}
/*
 * --== Minisite of the store ==--
 */
uBody.showDDList = function(type){
	$.get(addrUrl.svapi("listtype",type), function(){
		uBody.togglePB(true);
		$("div.pb-icon-cont").hide();
		if ($("div.ddl-cont").length > 0){
			$("div.ddl-cont").show();
			return false;
		}
		$("td.mw").append("<div class='ddl-cont'></div>");
		$("div.ddl-cont").load(addrUrl.loadBlock("ddlist"), function(){
			var ddlTop = (window.innerHeight - $("div.ddl-layer").height()) / 2;
			$("div.ddl-layer").css({
				"left": ((window.innerWidth - $("div.ddl-layer").width()) / 2) + "px",
				"top": ddlTop + "px"
			});
			$("div.ddl-layer-frame>ul>li").mousedown(function(){
				webWallSelectCatalogue(parseFloat($(this).attr("id")));
				$("div.ddl-layer-frame>ul>li>div").removeClass("ddl-act");
				$(this).children("div").addClass("ddl-act");
				$("div.ttbh-frame>div").text($(this).children("div").attr("id"));
				uBody.closeDDList(true);
			});
			$("div.ddl-cls-btn").css("top",ddlTop).on("mousedown", uBody.closeDDList);
			$("div.total-pb-bckgr").on("mousedown", uBody.closeDDList);
		});
	});
}
uBody.closeDDList = function(switcher){
	if (!($("div.ddl-cont").length > 0)){ return false }
	if (switcher){ $("div.ddl-cont").hide()	}
	else{
		$("div.ddl-cont").remove();
		$("div.total-pb-bckgr").off("mousedown", uBody.closeDDList);
	}
	uBody.togglePB();
}
uBody.openTopTen = function(){
	$.getJSON(addrUrl.getFCatId(), function(data){
		if (!data){ return false }
		$("div.pct-uplayer").hide();
		$("div.top10-btn").removeClass("sm-btn-pass").addClass("sm-btn-act").off("mousedown", uBody.openTopTen).on("mousedown", uBody.closeTopTen);
		$("td.mw").append("<div class='tt-cont'></div>");
		$("div.tt-cont").load(addrUrl.loadBlock("wall"), function(){
			webWall("50px", "50px", "he", "uadmin.no-ip.biz:8080", parseFloat(data));
			if ($("div.ttcat-btn-header").attr("id") == "ttbh-bckgr-pass"){
				$("div.ttcat-btn-header").mousedown(function(){ uBody.showDDList("ttcat") });
			}
		});
	});
}
uBody.closeTopTen = function(){
	if (!($("div.tt-cont").length > 0)){ return false }
	$("div.top10-btn").removeClass("sm-btn-act").addClass("sm-btn-pass").off("mousedown", uBody.closeTopTen).on("mousedown", uBody.openTopTen);
	$("div.tt-cont").remove();
	$("div.pct-uplayer").show();
	uBody.closeDDList();
}
uBody.closeMinisite = function(switcher,switcher2,switcher3){
	if ($("div.minisite-cont").length < 1){ return false }
	if (switcher){
		if (uServe.chmEx()){
			var bspace;
			if ($.browser.webkit){ bspace = " " }
			if ((bVars.pmType == 1 && $("div.rst-list-cont").length > 0 && $("div.rst-list-cont").attr("style") != "display: none;" + bspace) || 
				(bVars.pmType == 2 && $("input.shw-sch-list").length > 0)){
				$("div.list-cont").show();
				$("div.ls-cont").show();
				uBody.toggleSlTr(true);
				switcher2 = true;
			}else{ uServe.toggleListBtn(true) }
			if (bVars.pmType == 2){ uBody.makeCbtnPass() }
		}else if (!switcher3){
			uBody.toggleCbtn();
			uBody.makeCbtnPass();
			bMap.clearStore();
			uBody.toggleMapBtn();
			uBody.closeWall(true);
			if (bMap.map.getZoom() <= 1){ uBody.showStandByStores() }
		}
		uBody.closeTopTen();
		$("div.minisite-cont").remove();
	}else{ $("div.minisite-cont").hide() }
	if (!switcher2){ uServe.toggleMap(true)	}
	$("div.bann-cell").removeClass("bann-act").addClass("bann-pass");
}
uBody.loadMinisite = function(id,switcher){
	if (!($("div.minisite-cont").length > 0)){ $("td.mw").append("<div class='minisite-cont'></div>") }
	uBody.toggleMapBtn(true);
	$("div.minisite-cont").load(addrUrl.loadBlock("minisite"), function(){
		if ($("div.info-content").height() > 135){
			$("div.info-content").css({"overflow-y":"scroll","overflow-x":"hidden","max-width":"720px","padding-right":"15px"})
		}else{ $("div.info-content").css({"overflow":"hidden","max-width":"723px","padding":"0px"}) }
		$("div.cls-btn-cross").mousedown(function(){
			if (id == 0){
				uBody.back2root();
				return false;
			}
			if (bVars.pmType == 2){ uBody.toggleCbtn() }
			uBody.closeMinisite(true);
		});
		$("div.storemap-btn").mousedown( function(){ if (id == 0){ uBody.back2root() }else{ bMap.storeOnMap() } });
		if ($("div.top10-btn").length > 0){ $("div.top10-btn").on("mousedown", uBody.openTopTen) }
		if ($("div.video-btn").length > 0){ $("div.video-btn").on("mousedown", uBody.openVideo) }
	});
}
uBody.openMinisite = function(id,switcher){
	if (bVars.dragCrit){ return false }
	uServe.toggleMap();
	if (switcher){ uBody.toggleCbtn() }
	uServe.markSchList();
	uBody.closeWall();
	uServe.toggleListBtn(false);
	bMap.clearPopupMarkers();
	uBody.leaveFullcsreen();
	bMap.clearBckgrIcons();
	uBody.closeTopTen();
	uBody.closeSi();
	bMap.clearStore();
	if ($("div.minisite-cont").length > 0){
		if (bVars.store == id){
			$("div.minisite-cont").show();
			uBody.toggleMapBtn(true);
			return false;
		}else{ $("div.minisite-cont").remove() }
	}
	bVars.store = parseFloat(id);
	$.get(addrUrl.svapi("store", bVars.store), function(){
		if (bVars.store == 0){
			// sample minisite
			uBody.loadMinisite(bVars.store);
			uBody.toggleCbtn();
			uBody.makeCbtnPass();
			return false;
		}
		if (switcher){
			$.get(addrUrl.getStoreCat(bVars.store), function(data){
				uBody.makeCbtnPass();
				if (isNaN(data)){
					bVars.cat = 16;
					uBody.makeCbtnAct();
				}else{
					bVars.cat = parseFloat(data);
					if (uServe.inArray(bVars.cat,bVars.specCat)){ uBody.makeCbtnAct() }else{ uBody.toggleCbtn(true) }
				}
				bVars.divcbtnNo = bVars.cat;
				uBody.loadMinisite(bVars.store);
				if (bVars.pmType != 2){ bMap.clearChsMarkers() }
			});
		}else{ uBody.loadMinisite(bVars.store) }
		if (uServe.chmEx()){ bVars.openOrigin = 1 }else{ bVars.openOrigin = 2 }
	});
}

/*
 * --== Mapping block ==--
 */
bMap.setMarkers = function(){
	var storeId;
	var knArr = [];
	var tbrIdArr = [];
	$.getJSON(addrUrl.markers(), function(data){
		knArr.length = 0;
		$.each(data, function(i,ival){
			$.each(ival, function(key,val){
				storeId = parseFloat(key);
				if (
					(uServe.chmEx() && uServe.inArray(storeId,bVars.chsmIdArr)) || 
					(bVars.somCrit && storeId == bVars.store) ||
					(typeof(bMap.ppm) != "undefined" && val[2] == bMap.varsArr['bankers'])
				){ return true }
				if (!uServe.inArray(storeId,bVars.mIdArr)){ uServe.addNewMarker({'x':val[0],'y':val[1],'icat':val[2],'store':storeId},1) }
				knArr.push(storeId);
			});
		});
		tbrIdArr = uServe.arrSub(bVars.mIdArr,knArr);
		if (tbrIdArr.length > 0){
			$.each(tbrIdArr, function(i,val){
				if (val == bVars.store){ return true }
				for (var j in bVars.mArr){ 
					if (bVars.mArr[j].planeID == val){
						bMap.markers.removeMarker(bVars.mArr[j]);
						bVars.mArr.splice(j,1);
					}
				}
			});
		}
		bVars.mIdArr = knArr;
	});
}
bMap.clearBckgrIcons = function(){
	if (!($("div.olPopup").length > 0)){ return false }
	$("div.olPopup").remove();
}
bMap.setBckgrIcons = function(){
	if (typeof(bMap.bckgrIcons) != "undefined"){ return false }
	bMap.bckgrIcons = new OpenLayers.Layer.Vector("POIs", {
		strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
		protocol: new OpenLayers.Protocol.HTTP({
			url: addrUrl.urlBckgr,
			format: new OpenLayers.Format.Text()
		})
	});
	bMap.map.addLayer(bMap.bckgrIcons);
	bMap.selectControl = new OpenLayers.Control.SelectFeature(bMap.bckgrIcons);
	bMap.map.addControl(bMap.selectControl);
	bMap.selectControl.activate();
	bMap.bckgrIcons.events.on({
		'featureselected': uBody.onFeatureSelect,
		'featureunselected': uBody.onFeatureUnselect
	});
}
bMap.showPopup = function(lon,lat){
	var popupWidth = 400;
	var popupHeight = 200;
	var popup = new OpenLayers.Popup(
		"mod-popup",
		new OpenLayers.LonLat(lon,lat),
		new OpenLayers.Size(popupWidth,popupHeight),
		"<canvas id='myCanvas' width='" + popupWidth + "' height='" + popupHeight + "'></canvas>",
		true
	);
	popup.setBackgroundColor("transparent");
	bMap.map.addPopup(popup);
	$("div.olPopupCloseBox").css({
		"top": "17px",
		"right": "34px",
		"width": "64px",
		"height": "64px",
		"background-image": addrUrl.getImage("cls_popup_inv")
	});
	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");
	var txtInt = 34;
	var txtTop = 85;
	var txtLeft = 205;
	$.get(addrUrl.getLbl(134), function(data){
		ctx.beginPath();
		ctx.moveTo(3,3);
		ctx.lineWidth = 5;
		ctx.lineTo(100,45);
		ctx.lineTo(360,45);
		ctx.lineTo(360,180);
		ctx.lineTo(50,180);
		ctx.lineTo(50,100);
		ctx.lineTo(3,2);
		ctx.fillStyle = "#4b6370";
		ctx.fill();
		ctx.font = "18pt Verdana";
		ctx.textAlign = 'center';
		ctx.fillStyle = '#c9e12d';
		$.each(data.split("/"), function(i,val){ ctx.fillText(val, txtLeft, txtTop + txtInt * i) });
		ctx.strokeStyle = "#c9e12d";
		ctx.stroke();
	});
}
bMap.clearPopupMarkers = function(){
	if (typeof(bMap.ppm) == "undefined"){ return false }
	bMap.map.removeLayer(bMap.ppm);
	delete bMap.ppm;
	if (bMap.map.getZoom() >= bVars.maxScale){
		$.each(bMap.ppCoords, function(i,val){ uServe.addNewMarker({'x':val['x'],'y':val['y'],'icat':val['icat'],'store':val['id']},1) });
	}
	bMap.ppCoords.length = 0;
}
bMap.setPopupMarkers = function(id){
	if (typeof(bMap.ppm) != "undefined"){ return false }
	var lonLat, size, icon;
	var lang = "df";
	uBody.closeWall(true,true);
	uBody.closeMinisite();
	uBody.closeTopTen();
	uServe.toggleMap(true);
	uBody.toggleMapBtn(true);
	bMap.clearStore();
	bMap.clearBckgrIcons();
	bMap.clearChsMarkers();
	bVars.cat = id;
	uBody.toggleCbtn();
	uBody.makeCbtnAct();
	bMap.map.zoomToMaxExtent();
	bMap.ppm = new OpenLayers.Layer.Markers("ppm");
	bMap.map.addLayer(bMap.ppm);
	bMap.ppm.setZIndex(752);
	$.getJSON(addrUrl.api + 3, function(data){
		$.each(data, function(i,val){ 
			lonLat = new OpenLayers.LonLat(val['x'], val['y']).transform(new OpenLayers.Projection("EPSG:4326"), bMap.map.getProjectionObject());
			size = new OpenLayers.Size(120,97);
			icon = new OpenLayers.Icon(addrUrl.base + 'graphics/cmi/banker.png', size, new OpenLayers.Pixel(-(size.w/2), -size.h));
			bMap.ppCoords.push({'id':val['id'],'x':val['x'],'y':val['y'],'icat':bMap.varsArr['bankers']});
			var newMarker = new OpenLayers.Marker(lonLat, icon);
			newMarker.events.register('mousedown', bMap.ppm, function(evt){
				uBody.openMinisite(val['id'],true)
				OpenLayers.Event.stop(evt);
			});
			bMap.ppm.addMarker(newMarker);
			$.each(jQuery.parseJSON(val['descr_' + lang]), function(key,cit){
				$(bMap.ppm['markers'][i]['events']['element']).append("<span class='cit " + key + "'>" + cit + "</span><br/>");
			});
		});
	});
	
}
bMap.setMap = function(mapDiv){
	var mapOptions = {
		projection: "EPSG:4326",
		controls: [ new OpenLayers.Control.Navigation({ dragPanOptions: { enableKinetic: true }}) ],
		restrictedExtent: new OpenLayers.Bounds(-138.37428975068707,-90.01754720240103,138.37935776289794,89.99996241829405),
		minScale: 70000000, maxScale: 1000000, numZoomLevels: bVars.zoomSup
	};
	bMap.map = new OpenLayers.Map(mapDiv, mapOptions);
	bMap.map.addLayer(new OpenLayers.Layer.WMS( "Barabashovo", "http://uadmin.no-ip.biz:8080/geoserver/uniqoom/wms?BGCOLOR=0x4f5458", {layers: 'umarket-kiosk', format: "image/png"} ));
	bMap.map.addControl(
		new OpenLayers.Control.MousePosition({
			prefix: 'X | Y : ',
			separator: ' | ',
			numDigits: 2,
			emptyString: 'Mouse is not over map.'
		})
	);
	uBody.setOverview();
	uBody.setSclCnt();
	uBody.setPanCnt();
	bMap.setBckgrIcons();
	bMap.map.events.register("move", null, bMap.controlScale);
	bMap.map.zoomToMaxExtent();
}
bMap.dragControlOn = function(){
	bMap.dcSwitch = new OpenLayers.Control.DragPan({'map': bMap.map, 'panMapDone':function(evt){
		bMap.map.userdragged = true;
		console.log('drag');
		bMap.setMarkers();
	}});
	bMap.dcSwitch.draw();
	bMap.map.addControl(bMap.dcSwitch);
	bMap.dcSwitch.activate();
}
bMap.dragControlOff = function(){
	bMap.map.removeControl(bMap.dcSwitch);
	bMap.dcSwitch.deactivate();
}
bMap.controlScale = function(){
	if (bMap.map.getZoom() >= bVars.maxScale){
		if (typeof(bMap.markers) == "undefined"){
			bMap.markers = new OpenLayers.Layer.Markers( "Markers" );
			bMap.map.addLayer(bMap.markers);
			uServe.markerAboveBckgr();
			bMap.dragControlOn();
		}
		clearTimeout(bVars.tMapMove);
		bVars.tMapMove = setTimeout(function(){ bMap.setMarkers() }, 500);
		uBody.togglePanCnt(true);
	}else{
		if (typeof(bMap.markers) != "undefined"){
			bVars.mIdArr.length = 0;
			bMap.map.removeLayer(bMap.markers);
			delete bMap.markers;
			bMap.dragControlOff();
		}
		uBody.togglePanCnt();
	}
	uBody.toggleMapBtn(true);
	uServe.toggleBckgr();
	uServe.controlSclBtns();
	uServe.respiteSCS();
}
bMap.storeOnMap = function(){
	uBody.closeMinisite();
	uBody.closeTopTen();
	bMap.clearStore();
	bMap.clearChsMarkers();
	uBody.toggleAddCbtn(true);
	if (bVars.cat == bMap.varsArr['bankers']){ bMap.clearPopupMarkers() }
	$.getJSON(addrUrl.api + 9, function(data){
		if (data[0]['x'] == null){ return false }
		bVars.somCrit = true;
		bMap.chsMarker = new OpenLayers.Layer.Markers("chsMarker");
		bMap.map.addLayer(bMap.chsMarker);
		bMap.stCoords.push({'x':data[0]['x'],'y':data[0]['y'],'icat':bVars.cat});
		uServe.addNewMarker(bMap.stCoords[0],2);
		uServe.showHiddenMarker({'x':bMap.stCoords[0]['x'],'y':bMap.stCoords[0]['y']});
		uServe.markerAboveBckgr();
	});
}
bMap.clearStore = function(){
	if (!bVars.somCrit || typeof(bMap.chsMarker) == "undefined"){ return false }
	bVars.somCrit = false;
	if (bMap.map.getZoom() >= bVars.maxScale){
		$.each(bMap.stCoords, function(i,val){ uServe.addNewMarker({'x':val['x'],'y':val['y'],'icat':val['icat'],'store':bVars.store},1) })
	}
	bVars.store = null;
	bMap.stCoords.length = 0;
	bMap.map.removeLayer(bMap.chsMarker);
	delete bMap.chsMarker;
}
bMap.clearChsMarkers = function(){
	if (!uServe.chmEx()){ return false }
	if (bMap.map.getZoom() >= bVars.maxScale){
		$.each(bMap.chmCoords, function(i,val){ uServe.addNewMarker({'x':val['x'],'y':val['y'],'icat':val['icat'],'store':val['store']},1) })
	}
	uServe.toggleListBtn(false);
	bVars.chsmIdArr.length = 0;
	bMap.chmCoords.length = 0;
	bMap.map.removeLayer(bMap.catChsMarkers);
	delete bMap.catChsMarkers;
}
bMap.scaleByHint = function(){	bMap.map.zoomTo(bVars.maxScale) }
bMap.centerMBM = function(){
	$.getJSON(addrUrl.getMCoords(), function(data){
		uBody.closeWall(true);
		uBody.closeMinisite(true);
		bMap.clearStore();
		bMap.clearChsMarkers();
		bMap.clearPopupMarkers();
		uBody.toggleCbtn();
		uBody.makeCbtnPass();
		uServe.toggleMap(true);
		bMap.clearBckgrIcons();
		bMap.map.moveTo(new OpenLayers.LonLat(data['lon'],data['lat']),5);
		bMap.showPopup(data['lon'],data['lat']);
	});
}
/*
 * List block
 */
uBody.toggleCbtn = function(switcher){
	var toggleCrit = ($("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0);
	if (switcher && !toggleCrit){
		var mbsp;
		if ($.browser.webkit){
			mspTF = 1;
			mspBF = 0;
			mspTB = 1;
			mspBB = 0;
		}else if ($.browser.mozilla){
			mspTF = 1;
			mspBF = 0;
			mspTB = 1;
			mspBB = 0;
		}
		if ($("div.rst-list-cont").length > 0){ $("div.list-cont").remove() }
		$("div.cbtn" + bVars.cat).removeClass("cbtn-act cbtn-pass").css({"margin-top":(mspTF + "px"),"margin-bottom":(mspBF + "px")}).off("mousedown");
		$("div.ci-cont" + bVars.cat).wrap("<div class='ci-cont-bckgr'></div>").css("background-image",addrUrl.getIcon(bVars.cat)).on("mousedown", uBody.scatsWall);
		$(".cn-cont" + bVars.cat + " span.cname").hide();
		$("div.cn-cont" + bVars.cat).wrap("<div class='cn-cont-bckgr'></div>").append("<span id='scname'></span>");
		$.get(addrUrl.getScatName(), function(data){ $("span#scname").text(data) });
		$.get(addrUrl.getLbl(122), function(data){ $("div.cn-cont-bckgr").on("mousedown", uBody.showTTstores) })
		uBody.makeSiBtnPass();
	}else if (!switcher && toggleCrit){
		$("div.ci-cont" + bVars.divcbtnNo).unwrap().off("mousedown", uBody.scatsWall);
		$("div.cn-cont" + bVars.divcbtnNo).unwrap().off("mousedown", uBody.storesWall);
		$("div.cbtn" + bVars.divcbtnNo).css({"margin-top":(mspTB + "px"),"margin-bottom":(mspBB + "px")}).mousedown(function(){ uBody.scatsWall(parseFloat($(this).attr("id"))) });
		$("span#scname").remove();
		$(".cn-cont" + bVars.divcbtnNo + " span").show();
	}
}
uBody.makeCbtnAct = function(){
	if (bVars.cat == null){ return false }
	$("div.cbtn" + bVars.cat).removeClass("cbtn-act2 cbtn-pass").addClass("cbtn-act");
	$("div.ci-cont" + bVars.cat).css("background-image",addrUrl.getIcon(bVars.cat + "act"));
	if (typeof(bVars.divcbtnNo) != null && bVars.divcbtnNo != bVars.cat){ uBody.makeCbtnPass() }
	bVars.divcbtnNo = bVars.cat;
	uBody.makeSiBtnPass();
}
uBody.makeCbtnPass = function(){
	if (
		$("div.cbtn" + bVars.divcbtnNo).hasClass("cbtn-pass") ||
		($("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0)
	){ return false }
	$("div.cbtn" + bVars.divcbtnNo).removeClass("cbtn-act").addClass("cbtn-pass");
	$("div.ci-cont" + bVars.divcbtnNo).css("background-image",addrUrl.getIcon(bVars.divcbtnNo));
}
uBody.makeSiBtnAct = function(){
	uBody.makeCbtnPass();
	$("div.sibtn").removeClass("sibtn-pass").addClass("sibtn-act");
	$("div.sibtn-icon").css("background-image",addrUrl.getIcon("siact"));
}
uBody.makeSiBtnPass = function(){
	$("div.sibtn").removeClass("sibtn-act").addClass("sibtn-pass");
	$("div.sibtn-icon").css("background-image",addrUrl.getIcon("si"));
	$.get(addrUrl.getLbl(10), function(data){ $("div.sibtn-name").text(data) });
}
uBody.toggleMapBtn = function(switcher){
	clearTimeout(bVars.tbToRoot);
	bVars.tbToRoot = setTimeout(function(){
		var tCrit = (
			bVars.somCrit ||  
			typeof(bMap.ppm) != "undefined" ||  
			$("div.olPopup").length > 0 ||  
			(uServe.chmEx() && bVars.pmType != 3) || 
			$("div.list-cont").length > 0 || 
			$("div.minisite-cont").length > 0 ||  
			bMap.map.getZoom() > bVars.rootScale
		);
		var tCrit2 = $("textarea.sch-field").val().length > 0;
		if (switcher && (tCrit || tCrit2)){
			$.get(addrUrl.getLbl(112), function(data){
				$("div.map-btn").text(data).removeClass("mbtn-act").addClass("map-pass").on("mousedown", uBody.back2root)
			});
		}else if (!tCrit){
			$.get(addrUrl.getLbl(108), function(data){
				$("div.map-btn").text(data).removeClass("map-pass").addClass("mbtn-act").off("mousedown", uBody.back2root);
				if ($("textarea.sch-field").val().length > 0){ $("textarea.sch-field").val("") }
			});
		}
	}, 300);
}
uBody.closeWall = function(switcher,switcher2){
	if ($("div.list-cont").length < 1){ return false }
	if (switcher){
		uServe.toggleMap(true);
		if ($("div.list-cont").is(":visible")){
			if (bVars.pmType == 1 && $("div.rst-list-cont").length > 0){
				uServe.toggleListBtn(true);
				$("div.list-cont").hide();
				$("div.rst-list-cont").hide();
				$("div.ls-cont").hide();
				return false;
			}else if(bVars.pmType == 2){ bMap.clearChsMarkers() }
		}
		$.get(addrUrl.svapi("scat",null));
		$("div.list-cont").remove();
		$("div.ls-cont").remove();
		uBody.makeCbtnPass();
		bVars.cat = null;
		if (!switcher2){ uBody.toggleMapBtn() }
	}else{
		$("div#scats").hide();
		$("div.list-cont").hide();
		$("div.ls-cont").hide();
	}
	uBody.toggleSlTr();
}
uBody.showTTstores = function(){
	uBody.closeMinisite(true,true,true);
	uBody.toggleAddCbtn();
	if (uServe.chmEx() && bVars.pmType == 1){
		if ($("div.list-cont:visible").length > 0){ uBody.closeWall(true) }
		uServe.toggleMap(true);
	}else{
		if (bVars.pmType == 2){
			$("div.list-cont").remove();
			$("div.ls-cont").remove();
			uBody.toggleSlTr();
			uBody.togglePB(true);
		}
		bVars.pmType = 1;
		$.getJSON(addrUrl.getPrmSt(), function(data){ if (data){
			uBody.showSpm(data,true);
		}else{ return false } });
	}
}
uBody.storesListThumb = function(no, switcher){
	if (!switcher && (bVars.dragSlBtnCrit || no == bVars.countSlide)){ return false }
	bVars.countSlide = no;
	bVars.ssCorrVal = bVars.countSlide * bVars.ssCorr; 
	if (!switcher){ uBody.moveSlides(true) }
}
uBody.protectLimits = function(switcher){
	/*
	 * possible values for the switcher
	 * 0 - protecting borders for pages buttons of stores' list while dragging 
	 * 1 - protecting borders for stores' list while dragging
	 */
	// start here
	switch (switcher){
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
uBody.slidePrev = function(){ if ((bVars.countSlide - 1) >= 0){ 
	bVars.countSlide--;
	bVars.ssCorrVal -= bVars.ssCorr;
} }
uBody.slideNext = function(){ if ((bVars.countSlide + 1) < bVars.slideLimit){ 
	bVars.countSlide++;
	bVars.ssCorrVal += bVars.ssCorr;
} }
uBody.moveSlides = function(switcher){
	// dragonly
	if (!switcher){
		if (bVars.slideBegPos < bVars.slideEndPos){ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slideNext() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slidePrev() }	}
		else{ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slidePrev() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slideNext() } }
	}
	$("div.slides-cont").animate({ "left" : (bVars.slideStep*bVars.countSlide - bVars.ssCorrVal) *(-1) + "px" }, "fast"); // ltr only
	if (bVars.countSlide != bVars.prevCountSlide){
		$("div.ls-btn").eq(bVars.countSlide).removeClass("ls-btn-pass").addClass("ls-btn-act");
		$("div.ls-btn").eq(bVars.prevCountSlide).removeClass("ls-btn-act").addClass("ls-btn-pass");
	}
	if (!switcher && bVars.gsLimit > 1){
		var gNum = 9;
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
	if ($("div.list-slider").length > 0){ $("div.ls-btn").click(function(){ uBody.storesListThumb($("div.ls-btn").index(this)) }) }
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
			bVars.allowClick = setTimeout(function(){ bVars.dragCrit = false }, 750);
			bVars.slideEndPos = ui.position.left;
			uBody.moveSlides();
		}
	});
}
uBody.storesWall = function(){
	if ($("div.minisite-cont:visible").length > 0){ uBody.closeMinisite(true,true) }
	bVars.slType = 2;
	uServe.toggleListBtn(false);
	uServe.toggleMap();
	uBody.slTriangle();
	uBody.toggleSlTr(true);
	if ($("div.rst-list-cont").length > 0){
		$("div.list-cont").show();
		$("div.rst-list-cont").show();
		$("div.ls-cont").show();
		return false;
	}
	uServe.resetGsNum();
	if (!($("div.list-cont").length > 0)){ $("td.mw").append("<div class='list-cont'></div>") }
	$("div.list-cont:hidden").show();
	$("div.list-cont").append("<div class='rst-list-cont'></div>");
	$.get(addrUrl.svapi("slider",bVars.slType), function(){
		$("div.rst-list-cont").load(addrUrl.loadBlock("stlist"), function(){
			uServe.toggleLsContBckgr();
			$("div.rst-el").click(function(){ uBody.openMinisite($(this).attr("id")) });
			uServe.loadSlider();
		});
	});
}
uBody.toggleSlTr = function(switcher){
	if (switcher && $("div.sl-tr").is(":hidden")){ $("div.sl-tr").show() }else if (!switcher && $("div.sl-tr").is(":visible")){ $("div.sl-tr").hide() }
}
uBody.slTriangle = function(switcher){
	var iNum,startPoint;
	if (switcher){ iNum = 8 }else{ iNum = (bVars.divcbtnNo - 9) }
	if ($.browser.mozilla){ startPoint = 324 }else if ($.browser.webkit){ startPoint = 323 }
	var trStep = 73;
	var currPos = startPoint + trStep * iNum;
	$("div.sl-tr").show().css("top",currPos);
}
uBody.scatsWall = function(catId){
	if (bVars.dragCrit){ return false }
	var isNew;
	bVars.slType = 1;
	if (!uBody.closeMinisite(true)){ bVars.store = null }
	if (isNaN(catId)){ isNew = false }
	else{
		isNew = (bVars.cat != catId);
		bVars.cat = catId;
	}
	uBody.toggleCbtn();
	if ($("div.cbtn" + bVars.cat).hasClass("cbtn-pass")){
		if ($("div.subcat-container").length > 0){ $("div.subcat-container").remove() }
		else if ($("div.stores-container").length > 0){ $("div.stores-container").remove() }
		else if ($("div.sch-container").length > 0){ $("div.sch-container").remove() }
	}
	uBody.makeCbtnAct();
	uBody.slTriangle();
	bMap.clearStore();
	uBody.closeMinisite(true);
	bMap.clearChsMarkers();
	bMap.clearPopupMarkers();
	bMap.clearBckgrIcons();
	uServe.toggleMap();
	bVars.ssCorrVal = 0;
	uServe.toggleListBtn(false);
	uServe.resetGsNum();
	uBody.closeSi();
	if (!($("div.list-cont").length > 0)){ $("td.mw").append("<div class='list-cont'></div>") }
	else if (!($("div.rst-list-cont").length > 0) && !isNew){
		$("div.list-cont").show();
		$("div#scats").show();
		uServe.toggleLsContBckgr();
		uServe.loadSlider();
		return false;
	}else if ($("div.rst-list-cont").length > 0){ $("div.rst-list-cont").remove() }
	if ($("div.list-cont").attr("style") != null){ $("div.list-cont").removeAttr("style") }
	$.get(addrUrl.svapi("cat,slider",bVars.cat + "," + bVars.slType), function(){
		$("div.list-cont").show().load(addrUrl.loadBlock("ellist"), function(){
			uServe.toggleLsContBckgr();
			$("div.store-btn-bckgr").click(function(){
				bVars.pmType = 1;
				if (!bVars.dragCrit){ uBody.togglePB(true) }
				$.get(addrUrl.svapi("scat",$(this).attr("id")), function(){
					$.getJSON(addrUrl.getPrmSt(), function(data){
						if (data){
							bVars.showTTS = true;
							uBody.showSpm(data)
						}else{
							bVars.showTTS = false;
							uBody.togglePB();
							uBody.closeWall();
							uBody.storesWall();
							uServe.toggleListBtn(false);
						}
					});
				});
			});
			uServe.loadSlider();
		});
		uBody.toggleMapBtn(true);
	});
}
/*
 * Search block
 */
uBody.schWall = function(){
	if ($("textarea#sch-area").val().length == 0){ return false }
	bVars.slType = 3;
	uServe.toggleListBtn(false);
	uServe.toggleMap();
	uServe.resetGsNum();
	uBody.toggleSlTr();
	if ($("div.list-cont").length > 0){ $("div.list-cont").show() }else{ $("td.mw").append("<div class='list-cont'></div>") }
	$("div.list-cont").css("left","23px");
	$.get(addrUrl.svapi('slider',bVars.slType), function(){
		$("div.list-cont").load(addrUrl.loadBlock("schlist"), function(){
			$("div.list-cont").css("background-image","none");
			$("div.store-btn-bckgr").click(function(){	uBody.openMinisite($(this).attr("id"),true)	});
			uServe.loadSlider();
		});
	});
}
uBody.slBtnDragHandler = function(){
	if (!($("div.ls-move").length > 0)){ return false }
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
	$("div.ls-move").mousedown(function(){
		if ($(this).hasClass("ls-move-act")){ return false }
		if (bMap.varsArr['wdir'] == "rtl"){
			if ($(this).attr("id") == "beg"){ uBody.moveLsBtn(0) }else if ($(this).attr("id") == "end"){ uBody.moveLsBtn(1) }
		}else if (bMap.varsArr['wdir'] == "ltr"){
			if ($(this).attr("id") == "beg"){ uBody.moveLsBtn(1) }else if ($(this).attr("id") == "end"){ uBody.moveLsBtn(0) }
		}
	});
}
uBody.moveLsBtn = function(dir){
	if (bVars.moveLsBtnLimiter){ return false }
	var startStep = 685;
	var aProgr = 5;
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
 * Stores' promotion on the map
 */
uBody.showSpm = function(inv,switcher){
	if ((bVars.pmType == 1 && bVars.dragCrit) || (bVars.pmType == 2 && $("textarea#sch-area").val().length == 0)){ return false }
	if (uServe.chmEx()){ bMap.clearChsMarkers() }
	uServe.toggleMap(true);
	uBody.closeSi();
	bMap.catChsMarkers = new OpenLayers.Layer.Markers("catChsMarkers");
	bMap.map.addLayer(bMap.catChsMarkers);
	uServe.markerAboveBckgr();
	switch (bVars.pmType){
		case 1:
			uBody.togglePB();
			bMap.map.zoomToMaxExtent();
			clearTimeout(bVars.ttglBtn);
			bVars.ttglBtn = setTimeout(function(){ uBody.toggleCbtn(true) }, 200);
			uBody.closeWall();
			if (!switcher){ uServe.toggleLsContBckgr(true) }
			$.get(addrUrl.getLbl(114), function(data){	$("div.show-st-list").off("mousedown", uBody.schWall).on("mousedown", uBody.storesWall).text(data) });
			$.each(inv, function(key,val){
				var chmCoords = {'x':val[0]['x'],'y':val[0]['y'],'icat':bVars.cat,'store':parseFloat(key)};
				uServe.addNewMarker(chmCoords,3);
				bMap.chmCoords.push(chmCoords);
			});
			uServe.toggleListBtn(true);
		break;
		case 2:
			uBody.closeWall(true,true);
			uBody.toggleCbtn();
			uBody.makeCbtnPass();
			uBody.togglePB(true);
			uBody.closeMinisite(true,true);
			bMap.clearStore();
			uBody.closeTopTen();
			bMap.clearBckgrIcons();
			bMap.clearPopupMarkers();
			$.get(addrUrl.svapi("sch_txt",inv), function(){
				$.get(addrUrl.getLbl(117), function(data){ $("div.show-st-list").off("mousedown", uBody.storesWall).on("mousedown", uBody.schWall).text(data) });
				$.getJSON(addrUrl.getSchId(), function(data){
					if (!data){
						uBody.openMsgBox(118);
						return false;
					}
					$.each(data, function(i,val){
						var chmCoords = {'x':val['x'],'y':val['y'],'icat':val['cat'],'store':val['id'],'cc':true};
						uServe.addNewMarker(chmCoords,3);
						bMap.chmCoords.push(chmCoords);
					});
					if (data.length == 1){ uServe.showHiddenMarker({'x':data[0]['x'],'y':data[0]['y']}) }else{ bMap.map.zoomToMaxExtent() }
					uServe.toggleListBtn(true);
					uBody.togglePB();
				});
			});
			uServe.markerAboveBckgr();
		break;
		case 3:
			$.each(inv, function(key,val){
				var chmCoords = {'x':val['x'],'y':val['y'],'icat':val['cat'],'store':val['id'],'cc':true};
				uServe.addNewMarker(chmCoords,3);
				bMap.chmCoords.push(chmCoords);
			});
		break;
	}
}
/*
 * Back To Root
 */
uBody.back2root = function(){
	uBody.closeWall(true);
	uBody.closeMinisite(true);
	bMap.map.moveTo(new OpenLayers.LonLat(0,0),bVars.rootScale);
	bMap.clearStore();
	bMap.clearChsMarkers();
	bMap.clearPopupMarkers();
	uBody.toggleCbtn();
	uBody.makeCbtnPass();
	uServe.toggleMap(true);
	bMap.clearBckgrIcons();
	uBody.leaveFullcsreen();
	uBody.closeMsgBox();
	uBody.clsVKbd();
	uBody.toggleMapBtn();
	$("div.ui-keyboard").hide();
	uBody.showStandByStores();
	uBody.closeSi();
	uBody.setOverview();
}
/*
 * Banners renewal
 */
uBody.bannRenewal = function(){
	var group = 0;
	var lim = 1;
	bVars.brCycle = setInterval(function(){
		$("div.bann-group-" + group).fadeOut(700);
		if ((group + 1) > lim){ group = 0 }else{ group++ }
		$("div.bann-group-" + group).fadeIn(1000);
	}, 10000);
}
/*
 * Message Box
 */
uBody.togglePB = function(switcher){
	if (switcher && $("div.total-pb-bckgr").is(":hidden")){
		$("div.total-pb-bckgr").show();
		$("div.pb-icon-cont").show().on("mousedown", function(){ return false });
		uServe.rotateAL();
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
/*
 * Popup
 */
uBody.onPopupClose = function(evt){
	var feature = this.feature;
	if (feature.layer){ bMap.selectControl.unselect(feature) }else{ this.destroy() }
}
uBody.onFeatureSelect = function(evt){
	feature = evt.feature;
	popup = new OpenLayers.Popup.FramedCloud("featurePopup",
		feature.geometry.getBounds().getCenterLonLat(),
		new OpenLayers.Size(100,100),
		"<span class='popup-header'>" + feature.attributes.title + "</span><hr/>" +
		"<span class='popup-text'>" + feature.attributes.description + "</span>",
		null, true, uBody.onPopupClose);
	feature.popup = popup;
	popup.feature = feature;
	bMap.map.addPopup(popup, true);
	uBody.toggleMapBtn(true);
	uBody.makeCbtnPass();
	bMap.clearPopupMarkers();
	bMap.clearStore();
	bMap.clearChsMarkers();
	uBody.toggleCbtn();
	uBody.makeCbtnPass();
}
uBody.onFeatureUnselect = function(evt){
	feature = evt.feature;
	if (feature.popup){
		popup.feature = null;
		bMap.map.removePopup(feature.popup);
		feature.popup.destroy();
		feature.popup = null;
		setTimeout(function(){ if (!($("div.olPopup").length > 0)){ uBody.toggleMapBtn() } }, 400);
	}
}
uBody.setSclCnt = function(){
	bMap.sclPnl = new OpenLayers.Control.Panel({ div: document.getElementById("scl-cnt") });
	bMap.map.addControl(bMap.sclPnl);
	bMap.cntZoomIn = new OpenLayers.Control.ZoomIn();
	bMap.cntZoomOut = new OpenLayers.Control.ZoomOut();
	bMap.map.addControl(bMap.cntZoomIn);
	bMap.map.addControl(bMap.cntZoomOut);
	bMap.sclPnl.addControls([bMap.cntZoomIn,bMap.cntZoomOut]);
	$("div.olControlZoomInItemInactive").addClass("scl-btn-pass").append('<span>+</span>').mousedown(function(){
		bVars.pprsLong = setTimeout(function(){ bMap.map.zoomTo(bVars.zoomSup-1) },650)
	}).mouseup(function(){	clearTimeout(bVars.pprsLong) });
	$("div.olControlZoomOutItemInactive").addClass("scl-btn-act").append('<span>−</span>').mousedown(function(){
		bVars.nprsLong = setTimeout(function(){ bMap.map.zoomTo(0) },650)
	}).mouseup(function(){	clearTimeout(bVars.nprsLong) });
	$("div#scl-cnt").append("<div id='pan-panel'></div><div class='go-fscr'><div class='go-fscr-icon'></div></div><div class='leave-fscr'><div class='leave-fscr-icon'></div></div>");
}
uBody.togglePanCnt = function(switcher){
	if (switcher && $("div#pan-panel").is(":hidden")){
		$("div#pan-panel").show().animate({"height":"352px"},650);
	}else if (!switcher && $("div#pan-panel").is(":visible")){
		$("div#pan-panel").animate(
			{"height":"0px"},{
				duration: 650,
				complete: function(){ $(this).hide() }
			}
		);
	}
}
uBody.setPanCnt = function(){
	bMap.panPnl = new OpenLayers.Control.Panel({ div: document.getElementById("pan-panel") });
	bMap.map.addControl(bMap.panPnl);
	bMap.panCnt = new OpenLayers.Control.PanPanel({slideFactor:500});
	bMap.map.addControl(bMap.panCnt);
	bMap.panPnl.addControls(bMap.panCnt);
	$("div.olControlPanPanel").appendTo("div#pan-panel");	
	$("div.olControlPanPanel>div").css({
		'display':'block',
		'position':'relative',
		'top':'-10px',
		'left':'-5px',
		'margin-top':'14px',
		'border-radius':'10px',
		'min-width':'70px',
		'min-height':'70px',
		'border':'2px solid #499460',
		'background-position':'0px 0px',
		'cursor':'default',
		'background-image': bVars.brwsPref + 'linear-gradient(-90deg, #2e9d40, #00652e)'
	}).append("<div class='pan-cnt-icon'></div>");
	$("div.pan-cnt-icon").css({
		'display':'inline-block',
		'width':'100%',
		'height':'100%',
		'background-repeat':'no-repeat',
		'background-position':'center center'
	});
	$("div.pan-cnt-icon:eq(0)").css('background-image',addrUrl.getImage('tr_up_mod'));
	$("div.pan-cnt-icon:eq(1)").css('background-image',addrUrl.getImage('tr_down_mod'));
	$("div.pan-cnt-icon:eq(2)").css('background-image',addrUrl.getImage('tr_right_mod'));
	$("div.pan-cnt-icon:eq(3)").css('background-image',addrUrl.getImage('tr_left_mod'));
}
/*
 * Fullscreen
 */
uBody.goFullscreen = function(){
	$("html, body").animate({ scrollTop: 0 }, 0).css("overflow","hidden");
	if (bMap.map.getZoom() < 3){ bMap.map.zoomTo(3) }
	$("div.go-fscr").hide();
	$("div.leave-fscr").show().on("mousedown", uBody.leaveFullcsreen);
	$("div#smap").css({"position":"absolute","top":"0px","left":"0px","width":"100%","height":"100%","z-index":"18"});
	$("div#scl-cnt").css({"top":"15px","left":"30px","z-index":"19"});
	bMap.map.updateSize();
}
uBody.leaveFullcsreen = function(){
	if ($("div.leave-fscr").is(":hidden")){ return false }
	$("div.go-fscr").show();
	$("div.leave-fscr").hide().off("click");
	$("div#smap").removeAttr("style");
	$("div#scl-cnt").removeAttr("style");
	bMap.map.updateSize();
}
/*
 * Promoted stores on the stan-by mode
 */
uBody.showStandByStores = function(){
	bVars.pmType = 3;
	$.getJSON(addrUrl.getStandBySt(), function(data){ if (data){ uBody.showSpm(data,true) }else{ return false } });
}
/*
 * Virtual keyboard
 */
uBody.clsVKbd = function(){
	$("div.total-pb-bckgr").off("mousedown");
	uBody.togglePB();
}
uBody.vKbd = function(){
	$('textarea#sch-area-txt').keyboard({
		layout: 'qwerty-russian',
		customLayout: {
			'default': [
				"\u0451 1 2 3 4 5 6 7 8 9 0 - = {bksp}",
				"\u0439 \u0446 \u0443 \u043a \u0435 \u043d \u0433 \u0448 \u0449 \u0437 \u0445 \u044a \\",
				"\u0444 \u044b \u0432 \u0430 \u043f \u0440 \u043e \u043b \u0434 \u0436 \u044d",
				"{shift} \u044f \u0447 \u0441 \u043c \u0438 \u0442 \u044c \u0431 \u044e . {shift}",
				"{cancel} {alt} {space} {accept} {meta1} {meta2}"
			],
			'meta1': [],
			'meta2': [],
			'shift': [
				'\u0401 ! " № ; % : ? * ( ) _ + {bksp}',
				"\u0419 \u0426 \u0423 \u041a \u0415 \u041d \u0413 \u0428 \u0429 \u0417 \u0425 \u042a |",
				'\u0424 \u042b \u0412 \u0410 \u041f \u0420 \u041e \u041b \u0414 \u0416 \u042d',
				"{shift} \u042f \u0427 \u0421 \u041c \u0418 \u0422 \u042c \u0411 \u042e , {shift}",
				"{cancel} {alt} {space} {accept} {meta1} {meta2}"
			],
			'alt-shift': [
				"~ ! @ # $ % ^ & * ( ) _ + {bksp}",
				"Q W E R T Y U I O P { } |",
				'A S D F G H J K L : "',
				"{shift} Z X C V B N M < > ? {shift}",
				"{cancel} {alt} {space} {accept} {meta1} {meta2}"
			],
			'alt': [
				'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
				"q w e r t y u i o p [ ] \\",
				"a s d f g h j k l ; '",
				"{shift} z x c v b n m , . / {shift}",
				"{cancel} {alt} {space} {accept} {meta1} {meta2}"
			]
		},
		position: {
			of: null,
			my: 'center top',
			at: 'center top',
			at2: 'center bottom'
  		},
		usePreview: true,
		alwaysOpen: false,
		stayOpen: false,
		display: {
			'a'      : '\u2714:',
			'accept' : 'Найти:',
			'alt'    : 'English:',
			'b'      : '\u2190:',
			'bksp'   : '\u0008\u27F5\u0008:',
			'c'      : '\u2716:',
			'cancel' : 'Закрыть:',
			'clear'  : 'C:Clear',
			'combo'  : '\u00f6:',
			'dec'    : '.:',
			'e'      : '\u21b5:Enter',
			'enter'  : 'Enter:Enter',
			'lock'   : '\u21ea Lock:',
			'next'   : 'Next',
			'prev'   : 'Prev',
			's'      : '\u21e7:',
			'shift'  : '\u21e7:',
			'sign'   : '\u00b1:',
			'space'  : '',
			't'      : '\u21e5:',
			'tab'    : '\u21e5 Tab:'
		},
		wheelMessage: '',
		css: {
			input          : 'sch-field',
			container      : 'kb-bckgr ui-widget ui-helper-clearfix',
			buttonDefault  : 'kb-btn-pass',
			buttonHover    : 'kb-btn-act',
			buttonAction   : 'kb-btn-act2',
			buttonDisabled : 'kb-btn-pass'
		},
		autoAccept: false,
		lockInput: false,
		restrictInput: false,
		acceptValid: true,
		tabNavigation: false,
		enterNavigation : true,
		enterMod: 'altKey',
		stopAtEnd : true,
		appendLocally: false,
		stickyShift: true,
		preventPaste: false,
		maxLength: 50,
		repeatDelay: 500,
		repeatRate: 20,
		resetDefault: false,
		openOn: 'focus',
		keyBinding: 'mousedown',
		useCombos: true,
		initialized: function(e, keyboard, el){},
		visible: function(e, keyboard, el){ uServe.moveCaret2End() },
		change: function(e, keyboard, el){	uServe.respiteSCS(true) },
		beforeClose: function(e, keyboard, el, accepted){},
		accepted: function(e, keyboard, el){
			if ($("textarea#sch-area").val().length == 0){
				keyboard.cancel;
				uBody.clsVKbd();
			}else{
				bVars.pmType = 2;
				$("div.pb-icon-cont").show();
				uBody.showSpm($("textarea#sch-area").val());
				uBody.toggleMapBtn(true);
			}
		},
		canceled: function(e, keyboard, el){ uBody.clsVKbd() },
		hidden: function(e, keyboard, el){},
		switchInput: null,
		validate: function(keyboard, value, isClosing){
			var vkclsTimer = false;
			uBody.togglePB(true);
			$("div.pb-icon-cont").hide();
			setTimeout(function(){ vkclsTimer = true }, 700);
			$("div.total-pb-bckgr").on("mousedown", function(){
				if (vkclsTimer){
					keyboard.cancel;
					uBody.clsVKbd();
				}else{ return false }
			});
			$("textarea.sch-field:eq(1)").attr("id","sch-area");
			uServe.detectCaret();
			$.get(addrUrl.getLbl(129), function(data){ $("textarea.sch-field:eq(1)").attr("placeholder",data) });
			$("button.ui-keyboard-meta1").replaceWith("<button class='ui-keyboard-button kb-btn-pass' onclick='uServe.runCaretLeft()'>&larr;</button>");
			$("button.ui-keyboard-meta2").replaceWith("<button class='ui-keyboard-button kb-btn-pass' onclick='uServe.runCaretRight()'>&rarr;</button>");
			return true;
		}
	});
}
/*
 * Language and writing direction switch block 
 */
uServe.changeLang = function(lang){
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
	$("div.lang-elem").on("mousedown", function(){ uServe.changeLang($(this).attr("id")) });
	$("div.lang-panel").slideToggle();
}
/*
 * Show additional panel
 */
uBody.setUpAddCbtn = function(){
	$("div.add-cbtn").on("mousedown", function(){ uBody.scatsWall(bVars.cat) });
	$("div.add-tt-btn").on("mousedown", uBody.showTTstores);
}
uBody.toggleAddCbtn = function(switcher){
	if (switcher && $("div.add-cbtn-cont").is(":hidden")){ $("div.add-cbtn-cont").show() }
	else if (!switcher && $("div.add-cbtn-cont").is(":visible")){ $("div.add-cbtn-cont").hide() }
}
/*
 * Service icons block
 */
bMap.clearSiMarkers = function(switcher){
	if (typeof(bMap.sim) == "undefined"){ return; }
	if (switcher){
		bMap.map.removeLayer(bMap.sim);
		delete bMap.sim;
		delete bVars.simSize;
		delete bVars.simOffset;
		delete bVars.simIcon;
		delete bMap.simArr;
	}else{
		for (var i = 0; i < bMap.simArr.length; i++){ bMap.sim.removeMarker(bMap.simArr[i]) }
		bMap.simArr.length = 0;
	}
}
bMap.showSiMarkers = function(){
	var newMarker;
	if (typeof(bMap.sim) == "undefined"){
		bMap.sim = new OpenLayers.Layer.Markers("sim");
		bMap.map.addLayer(bMap.sim);
		bVars.simSize = new OpenLayers.Size(bVars.flagSize['w'],bVars.flagSize['h']);
		bVars.simOffset = new OpenLayers.Pixel(-(bVars.simSize.w/2), -bVars.simSize.h);
		bVars.simIcon = new OpenLayers.Icon(addrUrl.getCImage("flag"), bVars.simSize, bVars.simOffset);
		bMap.simArr = new Array();
	}
	uBody.closeSi(true);
	bMap.clearSiMarkers();
	$.getJSON(addrUrl.getSi(bVars.si), function(data){
		$.each(data, function(i,val){
			newMarker = new OpenLayers.Marker(new OpenLayers.LonLat(val['path_ox'],val['path_oy']),bVars.simIcon.clone());
			bMap.sim.addMarker(newMarker);
			bMap.simArr.push(newMarker);
		});
	});
}
uBody.closeSi = function(switcher){
	if (switcher === true){
		$("div.list-cont").hide();
		$("div.ls-cont").hide();
		uServe.toggleMap(true);
	}else{
		if ($("div.si-cont").length > 0){
			$("div.list-cont").remove();
			$("div.close-wall").off("click", uBody.closeSi);
		}
		uBody.makeSiBtnPass();
		bMap.clearSiMarkers(true);
	}
}
uBody.showSi = function(){
	bVars.slType = 5; // service icons slider type
	bMap.map.zoomToMaxExtent();
	uServe.toggleMap();
	uServe.toggleLsContBckgr();
	uBody.toggleCbtn();
	uBody.makeSiBtnAct();
	bMap.clearStore();
	uBody.closeMinisite(true,true,true);
	bMap.clearChsMarkers();
	bMap.clearPopupMarkers();
	bMap.clearBckgrIcons();
	bVars.ssCorrVal = 0;
	uServe.toggleListBtn(false);
	uServe.resetGsNum();
	uBody.slTriangle(true);
	if (!($("div.list-cont").length > 0)){ $("td.mw").append("<div class='list-cont'></div>") }
	else if ($("div.list-cont").is(":hidden")){
		$("div.list-cont").show();
		$("div.ls-cont").show();
	}
	uBody.toggleMapBtn(true);
	$.get(addrUrl.svapi("slider",bVars.slType), function(){
		$("div.list-cont").load(addrUrl.loadBlock("si"), function(){
			$("div.list-cont").css("background-image","none");
			$("div.close-wall").css({"top":"749px","left":"1018px"});
			$("div.si-bckgr").on("click", function(){
				if (!bVars.dragCrit){
					bVars.si = parseInt($(this).find("div.si-btn").attr("id"));
					bMap.showSiMarkers();
					$("div.sibtn-name").text($(this).attr("title"));
				}
			});
			uServe.loadSlider();
			$("div.close-wall").on("mousedown", uBody.closeSi);
		});
	});
}
/*
 * Map Overview
 */
uBody.setOverview = function(){
	// clear previous one
	if (typeof(bMap.mOverview) != "undefined"){
		bMap.map.removeControl(bMap.mOverview);
		bMap.mOverview.destroy;
		delete bMap.mOverview;
	}
	// initialization
	bMap.mOverview = new OpenLayers.Control.OverviewMap({
		maximized: false,
		autoPan: true,
		size: new OpenLayers.Size(380,200)
	});
	bMap.map.addControl(bMap.mOverview);
	// styling
	var btnStyle = {
		"width": "50px",
		"height": "50px",
		"background-image": bVars.brwsPref + "linear-gradient(bottom , #1c4591, #00adee)",
		"border-radius": "5px 0px 0px 5px",
		"cursor": "default"
	};
	$("div#olControlOverviewMapMaximizeButton").css(btnStyle).append("<div class='overview-map-plus'></div>");
	$("div#olControlOverviewMapMaximizeButton").find("img").hide();
	$("div#OpenLayers_Control_minimizeDiv").css(btnStyle).append("<div class='overview-map-minus'></div>");
	$("div#OpenLayers_Control_minimizeDiv").find("img").hide();
	$("div.olControlOverviewMapElement").css("background-color","#C9E12D");
}
$(document).ready(function(){
	uServe.setBrwsPref();
	$.getJSON(addrUrl.vapi + "lang,dlang,wdir", function(data){
		bMap.varsArr = data;
		$.get(addrUrl.getSCName("bankers"), function(data2){ bMap.varsArr['bankers'] = parseFloat(data2) });
	});
	bMap.setMap('smap');
	uBody.vKbd();
	uBody.showStandByStores();
	$("div.cbtn").on("mousedown", function(){
		var catId = parseFloat($(this).attr("id"));
		if (uServe.inArray(catId,bVars.specCat)){ bMap.setPopupMarkers(catId) }else{ uBody.scatsWall(catId) }
	});
	$("div.sibtn").on("mousedown", uBody.showSi);
	$("div.drum-btn").mousedown(function(){ uBody.openMsgBox(124) });
	$("div.lott-btn").mousedown(function(){ uBody.openMsgBox(124) });
	$("div.hot-btn").mousedown(function(){ uBody.openMsgBox(124) });
	$("div.bann-item").mousedown(function(){
		var sw;
		var storeId = parseFloat($(this).attr("id"));
		if (storeId == 0){ sw = false }else{ sw = true }
		uBody.openMinisite(storeId,sw);
		$("div.bann-cell").removeClass("bann-act").addClass("bann-pass");
		$(this).parent(".bann-cell").removeClass("bann-pass").addClass("bann-act");
	});
	$("div.go-fscr").mousedown(function(){ uBody.goFullscreen() });
	$("div.mcoords-btn").mousedown(function(){ bMap.centerMBM() });
	$("div.lang-btn").mousedown(function(){ uBody.langOpenClose() });
	$("body").mousedown(function(){ uServe.respiteSCS() });
	$("img.wall-product").live("mousedown", function(){ return false });
	$("img.wall-zoomed").live("mousedown", function(){ return false });
	uBody.setUpAddCbtn();
	//setTimeout(function(){ uBody.openMinisite(20620) }, 1000);
	//uServe.screenSaver();
	//uBody.bannRenewal();
});