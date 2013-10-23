/**
 * @author Mike Silberg
 */

var bVars = {};
var bMap = {};
var uServe = {};
var uBody = {};
var uElem = {};

// Base Variables
uBody.langSwitcher = null;
bVars.cat = null;
bVars.store = null;
bVars.divcbtnNo = null;
bVars.prevBann = null;

// Sliding the stores wall
bVars.countSlide = 0;
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
bVars.pmType = null; // promotion type (top 10): 1 -  2nd level catalogue, 2 - search results, 3 - stand-by 
bVars.prevCountSlide = 0;
bVars.slBtnStepCount = 0;
bVars.infoStepCount = 0;
bVars.infoStep = 33;
bVars.allowInfoMove = false;
bVars.moveLsBtnLimiter = false;
bVars.maxScale = 10;
bVars.rootScale = 0;
bVars.tbToRoot = null; // back to Root Timer
bVars.bgThreshold = 3;
bVars.bgPointer = 0;
bVars.bgTail = 0;
bVars.specCat = [342];
bVars.pBtnNo = null; // price button number
bVars.omSize = {'w':22,'h':32};
bVars.chmSize = {'w':28,'h':44};
bVars.catChmSize = {'w':28,'h':44};
bVars.flagSize = {'w':52,'h':45};
bVars.singleTrailer = false;
bVars.showTTS = true;
// Screensaver vars
bVars.atClick = false;
bVars.makeAtClickFalse = null;
bVars.runScrs = null;
bVars.runScrsQueue = null;
bVars.startScrs = null;
bVars.scrsRunInterval = 120000;
bVars.ocrLimiter = false; // open call request limiter
bVars.scrsStore = null;
// Mapping vars
bVars.somCrit = false;
bVars.somNo = 0;
bVars.mIdArr = [];
bVars.chsmIdArr = [];
bVars.mArr = [];
bVars.openStore = true;
bVars.showStSw = false;
bVars.mlAlrClsd = false; // measurement line has been already closed
bVars.tOpnSt = null;
bVars.tMapMove = null;
bMap.stCoords = [];
bMap.chmCoords = [];
bMap.ppCoords = [];
bMap.mSmBounds = {
	"lbx": -138.37428975068707,
	"lby": -90.01754720240103,
	"rtx": 138.37935776289794,
	"rty": 89.99996241829405
}
bMap.mFullBounds = {
	"lbx": -180.37428975068707,
	"lby": -130.01754720240103,
	"rtx": 180.37935776289794,
	"rty": 130.99996241829405
}
// Server addressing variables
var addrUrl = {};
addrUrl.base = "http://localhost/public_html/unavimp/"
addrUrl.baseL = "http://uadmin.no-ip.biz:8080/";
addrUrl.body = addrUrl.base + "core/html/web/body.php";
addrUrl.html = addrUrl.base + "core/html/web/blocks/common/";
addrUrl.startApi = addrUrl.base + "core/interface/api.php";
addrUrl.urlBckgr = addrUrl.base + "config/35/web/bismall.txt";
addrUrl.api = addrUrl.startApi + "?query=";
addrUrl.vapi = addrUrl.startApi + "?var=";
addrUrl.getFile = addrUrl.baseL + "getfile/";
addrUrl.markers = function(){
	var extent = bMap.map.getExtent();
	return addrUrl.baseL + "geo?SERVICE=UniqoomAPI&REQUEST=milestone&TCID=" + bMap.varsArr['tc'] + "&X1=" + extent['left'] +"&X2=" + extent['right'] +
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
addrUrl.getJS = function(name){ return addrUrl.base + "js/web/common/" + name + ".js" }
addrUrl.getFCatId = function(){ return addrUrl.api + 12 }
addrUrl.getStandBySt = function(){ return addrUrl.api + 23 }
addrUrl.getJS = function(name){ return addrUrl.base + "js/" + name + ".js" }
addrUrl.getImage = function(img,ext){
	if (!ext){ ext = "png" }
	return "url(" + addrUrl.base + "graphics/" + img + "." + ext + ")";
}
addrUrl.getCImage = function(img,ext){
	if (!ext){ ext = "png" }
	return addrUrl.base + "graphics/" + img + "." + ext;
}
addrUrl.getSi = function(si){ return addrUrl.api + "24&sich=" + si }

// Debug Vars
bVars.tempo = null;
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
		if (!$.browser.msie){ $("div.go-fscr").show() }
		$("div.measure-switch").show();
		uServe.markerAboveBckgr();
	}else{
		$("div#smap").hide();
		if (!$.browser.msie){ $("div.go-fscr").hide() }
		$("div.measure-switch").hide();
		uBody.toggleAddCbtn();
	}
}
uServe.toggleListBtn = function(switcher){
	if (bVars.showTTS && switcher && $("div.show-st-list").is(":hidden")){ $("div.show-st-list").show() }
	else if (!switcher && $("div.show-st-list").is(":visible")){ $("div.show-st-list").hide() }
}
uServe.arrSub = function(arr1,arr2){
	var respond = $.grep(arr1, function(item){ return $.inArray(item, arr2) < 0 });
	return respond;
}
uServe.holdOpnStr = function(){
	clearTimeout(bVars.tOpnSt);
	bVars.openStore = false;
	bVars.tOpnSt = setTimeout(function(){ bVars.openStore = true }, 500);
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
			act = "ab";
			mId = bVars.mIdArr;
			catCrit = false;
		break;
		case 3:
			layer = bMap.catChsMarkers;
			size = new OpenLayers.Size(bVars.catChmSize['w'],bVars.catChmSize['h']);
			act = "ab";
			mId = bVars.chsmIdArr;
			if (isNaN(arr['cc']) || typeof(arr['cc']) == "undefined" || arr['cc'] == null){ catCrit = false }else{ catCrit = arr['cc'] }
		break;
	}
	if (isNaN(arr['icat']) || arr['icat'] == 0 || arr['icat'] == null){ pct = 16 }else{ pct = arr['icat'] }
	if (typeof(arr['store']) == "undefined"){ storeId = bVars.store }else{ storeId = parseFloat(arr['store']) }
	var icon = new OpenLayers.Icon(addrUrl.base + 'graphics/cmi/' + pct + act + '.png', size, new OpenLayers.Pixel(-(size.w/2), -size.h));
	var newMarker = new OpenLayers.Marker(lonLat, icon);
	newMarker.events.register('mouseup', layer, function(evt){
		if (bVars.openStore){ uBody.openMinisite(storeId,catCrit) }
		else{
			newMarker.mouseup();
			uServe.respiteSCS();
			return true;
		}
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
		if (bVars.bgPointer > bVars.bgTail){ addrUrl.urlBckgr = addrUrl.base + "config/" + bMap.varsArr['tc'] + "/web/binormal.txt" }
		else{ addrUrl.urlBckgr = addrUrl.base + "config/" + bMap.varsArr['tc'] + "/web/bismall.txt" }
		bMap.map.removeLayer(bMap.bckgrIcons);
		delete bMap.bckgrIcons;
		bMap.setBckgrIcons();
		uServe.markerAboveBckgr();
	}	
	bVars.bgTail = bVars.bgPointer;
}
uServe.resetSomNo = function(){ if (bVars.somNo != 0){ bVars.somNo = 0 } }
uServe.resetMapControls = function(switcher){
	if (++bVars.somNo < 2 && switcher == false){ return false }
	bMap.map.controls[3].deactivate();
	setTimeout(function(){
		bMap.map.controls[3].activate();
		bMap.selectControl.deactivate();
		bMap.selectControl.activate();
	}, 100);
}
uBody.showFltStList = function(){
	var fstWin = $("div#filter-stores");
	bVars.slType = 4;
	uServe.switchCountSlide();
	$("div#simple-slider").hide();
	if ($("div#fst-slider").length > 0){
		$("div#fst-slider").show();
	}else{ $.get(addrUrl.svapi("slider",bVars.slType), function(){ uServe.loadSlider() }) }
	$("div#stores").hide();
	$("div.img-filter").removeClass("img-filter-pass img-filter-act2").addClass("img-filter-act");
	$("div.full-list").removeClass("img-filter-act").addClass("img-filter-pass");
	if (fstWin.length > 0){ fstWin.show() }
	else{
		uServe.toggleLsContBckgr(true,true);
		$.get(addrUrl.loadBlock("filterlist"), function(data){
			uServe.toggleLsContBckgr(false,true);
			$("div.rst-list-cont").append(data);
			uServe.setUpRstEl();
		});
	}
}
uBody.closeFltStList = function(switcher){
	var fstWin = $("div#filter-stores");
	if (!(fstWin.length > 0)){ return false }
	uServe.switchCountSlide();
	if (switcher){
		fstWin.remove();
		$("div.filter-cont").remove();
		$("div#fst-slider").remove();
	}else{
		fstWin.hide();
		$("div#fst-slider").hide();
		$("div#stores").show();
		$("div#simple-slider").show();
		$("div.img-filter").removeClass("img-filter-act").addClass("img-filter-pass");
		$("div.full-list").removeClass("img-filter-pass img-filter-act2").addClass("img-filter-act");
	}
}
uServe.loadCntFilter = function(){
	$.getJSON(addrUrl.api + 22, function(data){
		if (!data){ return false }
		bVars.countSlideTC = bVars.countSlide; // temporal containers
		bVars.prevCountSlideTC = bVars.prevCountSlide;
		$.get(addrUrl.loadBlock("imgfilter"), function(data2){
			$("div.ls-header").append(data2);
			$("div.full-list, div.img-filter").mouseenter(function(){
				if ($(this).hasClass("img-filter-pass")){ $(this).removeClass("img-filter-pass").addClass("img-filter-act2") }
			}).mouseleave(function(){
				if ($(this).hasClass("img-filter-act2")){ $(this).removeClass("img-filter-act2").addClass("img-filter-pass") }
			});
			if (!$.browser.msie){ $("div.full-list, div.img-filter").tooltipster({delay: 1000}) }
			$("div.img-filter").on("click", uBody.showFltStList);
			$("div.full-list").on("click", function(){ uBody.closeFltStList(false) });
		});
	});
}
uServe.switchCountSlide = function(){
	var cs,pcs;
	cs = bVars.countSlideTC;
	pcs = bVars.prevCountSlideTC;
	bVars.countSlideTC = bVars.countSlide;
	bVars.prevCountSlideTC = bVars.prevCountSlide;
	bVars.countSlide = cs;
	bVars.prevCountSlide = pcs;
}
uServe.loadSlider = function(){
	$("div.close-wall").off("click").click(function(){ uBody.closeWall(true) });
	clearTimeout(bVars.tLoadSlider);
	bVars.tLoadSlider = setTimeout(function(){	
		$.get(addrUrl.loadBlock("slider"), function(data){
			$.getJSON(addrUrl.vapi + "slides_num,gs_num", function(data2){
				bVars.slideLimit = data2['slides_num'];
				bVars.gsLimit = data2['gs_num'];
				bVars.countSlide = 0;
				bVars.prevCountSlide = 0;
				uBody.storesListThumb(0,true);
				if ($("div#simple-slider").length > 0 && bVars.slType != 4){ $("div#simple-slider").remove() }
				$("div.ls-header").append(data);
				if (bVars.slType == 2){
					$("div.back2scat").live("click", function(){ if (bVars.showTTS){ uBody.showTTstores() }else{ uBody.scatsWall(bVars.cat) } });
					uServe.loadCntFilter();
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
uServe.loadFile = function(id){
	$("<form action='" + addrUrl.getFile + "' method='post'><input type='hidden' name='fileid' value='" + id + "' /></form>").appendTo("body").submit().remove();
}
uServe.setUpRstEl = function(){
	$("div.rst-el").click(function(){
		uBody.openMinisite($(this).attr("id"))
	}).mouseenter(function(){
		$(this).removeClass("rst-el-pass").addClass("cbtn-act2")
	}).mouseleave(function(){
		$(this).removeClass("cbtn-act2").addClass("rst-el-pass")
	});
}
uServe.rotateAL = function(){
	if ($.browser.msie){ return false }
	$("div.pb-icon>div:eq(0)").rotate({
		angle:0, 
		animateTo:360, 
		callback: uServe.rotateAL,
		easing: function (x,t,b,c,d){ return c*(t/d)+b }
	})
}
uServe.toggleLsContBckgr = function(switcher,switcher2){
	if (switcher){
		$("div.list-cont").css("background-image",addrUrl.getImage("ajax-loader","gif"));
		if (!switcher2){
			$("div.ls-header").hide();
			$("div.close-wall").hide();
		}
	}else{
		$("div.list-cont").css("background-image","none");
		if (!switcher2){
			$("div.ls-header").delay(600).fadeIn();
			$("div.close-wall").fadeIn();
		}
	}
}
/*
 * --== Minisite of the store ==--
 */
uServe.loadTopTen = function(id){
	uBody.closeMinisite(false,true);
	uBody.closePList();
	$("td.mw").append("<div class='tt-cont'></div>");
	$("div.tt-cont").load(addrUrl.loadBlock("wall"), function(){
		if ($.browser.msie){ return false }
		$.get(addrUrl.getLbl(118), function(lbl){
			$(".ttcat-list").chosen({no_results_text:lbl}).change(function(){ webWallSelectCatalogue(parseFloat($(".ttcat-list option:selected").val())) });
		});
		webWall(12, 57, "en", "uadmin.no-ip.biz:8080", id);
		$("div.cls-wall-btn").on("click", uBody.closeTopTen);
	});
}
uBody.openTopTen = function(){
	if ($.browser.msie){ uServe.loadTopTen() }
	else{
		$.getJSON(addrUrl.getFCatId(), function(data){
			if (!data){ return false }
			uServe.loadTopTen(parseInt(data));
		});
	}
}
uBody.closeTopTen = function(switcher){
	if (!($("div.tt-cont").length > 0)){ return false }
	$("div.tt-cont").remove();
	if (!switcher || isNaN(switcher)){ uBody.openMinisite(bVars.store) }
	if ($.browser.msie){ $("div.top10-btn").removeClass("sm-btn-pass").addClass("sm-btn-pass") }
}
uBody.openPList = function(){
	$("div.pct-uplayer").hide();
	$("div.minisite").append("<div class='plist-cont'></div>");
	$("div.price-btn").off("click").on("click", uBody.closePList).removeClass("sm-btn-pass").addClass("cbtn-act");
	$("div.sm-btn").eq(bVars.pBtnNo).off("mouseenter").removeClass("cbtn-act2").off("mouseleave");
	$("div.plist-cont").load(addrUrl.loadBlock("plist"), function(){
		$(this).css("background-image","none");
		if (!$.browser.msie && $(this).height() > 380){
			$("div.price-list>div:eq(0)").wrap("<div id='asc-plist' class='antiscroll-inner'></div>");
			$("div.price-list").antiscroll();
		}
		$("div.plist-elem").click(function(){
			uServe.loadFile($(this).attr("id"))
		}).mouseenter(function(){
			$(this).removeClass("plist-elem-pass").addClass("plist-elem-act")
		}).mouseleave(function(){
			$(this).removeClass("plist-elem-act").addClass("plist-elem-pass")
		});
	});
}
uBody.closePList = function(){
	if (!($("div.plist-cont").length > 0)){ return false }
	$("div.price-btn").off("click").on("click", uBody.openPList).removeClass("cbtn-act").addClass("sm-btn-pass");
	$("div.sm-btn").eq(bVars.pBtnNo).mouseenter(function(){
		$(this).removeClass("sm-btn-pass").addClass("cbtn-act2")
	}).mouseleave(function(){
		$(this).removeClass("cbtn-act2").addClass("sm-btn-pass")
	});
	$("div.plist-cont").remove();
	$("div.pct-uplayer").show();
}
uBody.closeMinisite = function(switcher,switcher2,switcher3){
	if ($("div.minisite-cont").length < 1){ return false }
	uServe.resetMapControls();
	if (switcher){
		if (uServe.chmEx()){
			if ((bVars.pmType == 1 && $("div.rst-list-cont").length > 0 && $("div.rst-list-cont").attr("style") != "display: none;") ||  
				(bVars.pmType == 2 && $("input.shw-sch-list").length > 0)){
				$("div.list-cont").show();
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
		uBody.closeTopTen(true);
		$("div.minisite-cont").remove();
	}else{ $("div.minisite-cont").hide() }
	if (!switcher2){ uServe.toggleMap(true) }
}
uBody.loadMinisite = function(id,switcher){
	if (!($("div.minisite-cont").length > 0)){ $("td.mw").append("<div class='minisite-cont'></div>") }
	$("div.minisite-cont").load(addrUrl.loadBlock("minisite"), function(){
		if ($("div.info-content").height() > 190){
			$("div.info-text").wrap("<div id='asc-stdescr' class='antiscroll-inner'></div>");
			$("div.info-content").antiscroll();
		}
		$("div.cls-btn-cross").click(function(){
			if (id == 0){
				uBody.back2root();
				return false;
			}
			if (bVars.pmType == 2){ uBody.toggleCbtn() }
			uBody.closeMinisite(true);
		});
		$("div.storemap-btn").click( function(){ if (id == 0){ uBody.back2root() }else{ bMap.storeOnMap() } });
		if ($("div.top10-btn").length > 0){ $("div.top10-btn").on("click", uBody.openTopTen) }
		if ($("div.price-btn").length > 0){
			$("div.price-btn").on("click", uBody.openPList);
			bVars.pBtnNo = parseFloat($("div.price-btn").attr("id"));
		}
		if ($("div.video-btn").length > 0){ $("div.video-btn").on("click", uBody.openVideo) }
		$("div.sm-btn").mouseenter( function(){
			if ($(this).hasClass("sm-btn-pass")){ $(this).removeClass("sm-btn-pass").addClass("cbtn-act2") }
		}).mouseleave( function(){
			if ($(this).hasClass("cbtn-act2")){ $(this).removeClass("cbtn-act2").addClass("sm-btn-pass") }
		});
		uBody.toggleMapBtn(true);
		if (bVars.showStSw){ bVars.showStSw = false	}
	});
}
uBody.openMinisite = function(id,switcher){
	if (bVars.dragCrit){ return false }
	var alrOpn = false;
	uServe.toggleMap();
	if (switcher && bVars.store != id){ uBody.toggleCbtn() }
	bMap.clearMeasure(true);
	uBody.toggleMapBtn(true);
	uServe.markSchList();
	uBody.closeWall();
	uServe.toggleListBtn(false);
	bMap.clearPopupMarkers();
	uBody.leaveFullcsreen();
	bMap.clearBckgrIcons();
	uBody.closeTopTen(true);
	uBody.closeSi();
	bMap.clearStore();
	if ($("div.minisite-cont").length > 0){
		if (bVars.store == id){
			$("div.minisite-cont").show();
			return false;
		}else{ $("div.minisite-cont").remove() }
	}
	bVars.store = id;
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
	});
}
/*
 * --== Mapping block ==--
 */
bMap.zoomBox = function(){
	OpenLayers.Control.CustomNavToolbar = OpenLayers.Class(OpenLayers.Control.Panel,{
		initialize: function(options){
			OpenLayers.Control.Panel.prototype.initialize.apply(this, [options]);
			this.addControls([
				new OpenLayers.Control.Navigation({ dragPanOptions:{ enableKinetic: true }}),
				new OpenLayers.Control.ZoomBox({alwaysZoom:true})
			]);
			this.displayClass = 'olControlNavToolbar'
		},
		draw: function(){
			var div = OpenLayers.Control.Panel.prototype.draw.apply(this, arguments);
			this.defaultControl = this.controls[0];
			return div;
		}
	});
}
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
	uBody.closeTopTen(true);
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
			newMarker.events.register('mouseup', bMap.ppm, function(evt){
				if (bVars.openStore){ uBody.openMinisite(val['id'],true) }
				newMarker.mouseup();
				OpenLayers.Event.stop(evt);
			});
			bMap.ppm.addMarker(newMarker);
			$.each(jQuery.parseJSON(val['descr_' + lang]), function(key,cit){
				$(bMap.ppm['markers'][i]['events']['element']).append("<span class='cit " + key + "'>" + cit + "</span><br/>");
			});
		});
	});
	
}
/*
 * Measure 
 */
uBody.stopMeasureCont = function(switcher){ 
	$("div#smap").off("mousemove", uBody.moveMeasureCont).off("dblclick", uBody.stopMeasureCont);
	$("div.olLayerDiv").off("click", uServe.showMeasureCont);
	if (switcher === true){ $("div.olLayerDiv").off("click", uServe.showMeasureCont) }else{ $("div.olLayerDiv").on("click", uServe.showMeasureCont) }
}
uBody.moveMeasureCont = function(e){
	if ($("div.measure-cont").is(":hidden")){
		$("div.measure-cont").show();
		$("div.measure-cls").on("click", bMap.clearMeasure);
	}
	uServe.setUpElems();
	$("div.measure-cont").css({
		left:  e.pageX + uElem.measureCont['x'],
    	top: e.pageY + uElem.measureCont['y']
	});
}
uBody.handleMeasurements = function(event){
	var out;
	var mV = "м";
	var kmV = "км";
	var corr = 17.34121;
	var km = 1000;
	var length = Math.round(event.measure.toFixed(3) / corr);
	if (length > km){
		var floor = Math.floor(length / km);
		out = floor + " " + kmV + " " + (length - floor * 1000) + " " + mV;
	}else{ out = length + " " + mV }
	document.getElementById('measure-otp').innerHTML = out;
}
bMap.setMeasure = function(){
	// measure tools
	$.getJSON(addrUrl.vapi + "shnomore", function(data){
		if (parseFloat(data['shnomore']) != 1){
			$.get(addrUrl.getLbl(138), function(data2){
				uBody.openMsgBox(137,"<p /><input type='checkbox' class='show-no-more' /> " + data2, uServe.msgShowNoMore);
			});
		}
	});
	bVars.mlAlrClsd = false;
	bMap.clearChsMarkers();
	uBody.closeSi();
	uBody.toggleCbtn();
	uBody.makeCbtnPass();
	$("div.measure-switch").removeClass("measure-pass").addClass("measure-act").off("click", bMap.setMeasure).on("click", bMap.clearMeasure);
	$("div#smap").on("mousemove", uBody.moveMeasureCont).on("dblclick", uBody.stopMeasureCont);
	var sketchSymbolizers = {
		"Line": {
			strokeWidth: 3,
			strokeOpacity: 1,
			strokeColor: "#6456e1",
			strokeDashstyle: "solid"
		}
	};
	var style = new OpenLayers.Style();
	style.addRules([
		new OpenLayers.Rule({symbolizer: sketchSymbolizers})
	]);
	var styleMap = new OpenLayers.StyleMap({"default": style});
	var renderer = OpenLayers.Util.getParameters(window.location.href).renderer;
	renderer = (renderer) ? [renderer] : OpenLayers.Layer.Vector.prototype.renderers;
	bMap.measureControls = {
		line: new OpenLayers.Control.Measure(
			OpenLayers.Handler.Path,{
				persist: true,
				handlerOptions:{
					layerOptions:{
						renderers: renderer,
						styleMap: styleMap
					}
				},
				geodesic: true
			}
		)
	};
	bMap.measureLine = bMap.measureControls['line'];
	bMap.measureLine.events.on({
		"measure": uBody.handleMeasurements,
		"measurepartial": uBody.handleMeasurements
	});
	bMap.map.addControl(bMap.measureLine);
	bMap.measureLine.activate();
}
bMap.clearMeasure = function(switcher){
	if (typeof(bMap.measureLine) == "undefined" || bVars.mlAlrClsd){ return; }
	bVars.mlAlrClsd = true;
	if (switcher !== true && bMap.map.getZoom() <= 1){ uBody.showStandByStores() }
	$("div.measure-switch").removeClass("measure-act").addClass("measure-pass").off("click", bMap.clearMeasure).on("click", bMap.setMeasure);
	uBody.stopMeasureCont(true);
	$("span#measure-otp").text("");
	$("div.measure-cont").css({left:0,top:0}).hide();
	$("div.measure-cls").off("click");
	bMap.measureLine.deactivate();
	bMap.map.removeControl(bMap.measureLine);
}
bMap.setMap = function(mapDiv){
	bMap.zoomBox();
	bMap.keyboardnav = new OpenLayers.Control.KeyboardDefaults();
	var mapOptions = {
		projection: "EPSG:4326",
		controls:[
			new OpenLayers.Control.PanZoomBar(),
			bMap.keyboardnav
		],
		restrictedExtent: new OpenLayers.Bounds(bMap.mSmBounds['lbx'],bMap.mSmBounds['lby'],bMap.mSmBounds['rtx'],bMap.mSmBounds['rty']),
		minScale: 90000000, maxScale: 1000000, numZoomLevels: 15
	};
	//minScale: 120 000 000, maxScale: 1000000, numZoomLevels: 15
	//maxExtent: new OpenLayers.Bounds(-138.37428975068707,-90.01754720240103,138.37935776289794,89.99996241829405),
	bMap.map = new OpenLayers.Map(mapDiv, mapOptions);
	bMap.map.addLayer(new OpenLayers.Layer.WMS( "Barabashovo", "http://uadmin.no-ip.biz:8080/geoserver/uniqoom/wms", {layers: 'umarket', format: "image/jpeg"}/*, {
		singleTile: true, 
		ratio: 1, 
		isBaseLayer: true,
		yx : {'EPSG:4326' : true}
	}*/ ));
	bMap.map.addControl(new OpenLayers.Control.CustomNavToolbar());
	bMap.map.addControl(
                new OpenLayers.Control.MousePosition({
                    prefix: '<a target="_blank" ' +
                        'href="http://spatialreference.org/ref/epsg/4326/">' +
                        'EPSG:4326</a> coordinates: ',
                    separator: ' | ',
                    numDigits: 2,
                    emptyString: 'Mouse is not over map.'
                })
            );
	bMap.map.addControl(new OpenLayers.Control.OverviewMap({ maximized: false, autoPan: true }));
	bMap.setBckgrIcons();
	bMap.map.events.register("move", null, bMap.controlScale);
	bMap.map.zoomToMaxExtent();
}
bMap.dragControlOn = function(){
	bMap.dcSwitch = new OpenLayers.Control.DragPan({'map': bMap.map, 'panMapDone':function(evt){
		bMap.map.userdragged = true;
		console.log('drag');
		uServe.holdOpnStr();
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
	}else if (typeof(bMap.markers) != "undefined"){
		bVars.mIdArr.length = 0;
		bMap.map.removeLayer(bMap.markers);
		delete bMap.markers;
		bMap.dragControlOff();
	}
	uServe.holdOpnStr();
	uBody.toggleMapBtn(true);
	uServe.toggleBckgr();
	uServe.respiteSCS();
}
bMap.storeOnMap = function(){
	uServe.resetMapControls();
	uBody.closeMinisite();
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
	uBody.toggleAddCbtn();
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
/*
 * List block
 */
uBody.toggleCbtn = function(switcher){
	var toggleCrit = ($("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0);
	if (switcher && !toggleCrit){
		var mbsp;
		if ($.browser.webkit){
			mspTF = 1;
			mspBF = 2;
			mspTB = 1;
			mspBB = 0;
		}else if ($.browser.mozilla){
			mspTF = 0;
			mspBF = 3;
			mspTB = 0;
			mspBB = 1;
		}else if ($.browser.opera){
			mspTF = 0;
			mspBF = 2;
			mspTB = 0;
			mspBB = 0;
		}else if ($.browser.msie){
			mspTF = 0;
			mspBF = 0;
			mspTB = 0;
			mspBB = 0;
		}
		if ($("div.rst-list-cont").length > 0){ $("div.list-cont").remove() }
		$("div.cbtn" + bVars.cat).removeClass("cbtn-act cbtn-pass").css({"margin-top":(mspTF + "px"),"margin-bottom":(mspBF + "px")}).off("click");
		$("div.ci-cont" + bVars.cat).wrap("<div class='ci-cont-bckgr'></div>").on("click", uBody.scatsWall);
		$.get(addrUrl.getLbl(123), function(data){
			$("div.ci-cont-bckgr").attr("title",data + " " + $(".cn-cont" + bVars.cat + " span.cname").text());
			if (!$.browser.msie){ $("div.ci-cont-bckgr").tooltipster({}) }
		});
		$(".cn-cont" + bVars.cat + " span.cname").hide();
		$("div.cn-cont" + bVars.cat).wrap("<div class='cn-cont-bckgr'></div>");
		uServe.setUpElems();
		uElem.cnCont.append(uElem.scName);
		$.get(addrUrl.getScatName(), function(data){ $("span#scname").text(data) });
		$.get(addrUrl.getLbl(122), function(data){
			$("div.cn-cont-bckgr").attr("title",data).on("click", uBody.showTTstores);
			if (!$.browser.msie){ $("div.cn-cont-bckgr").tooltipster({delay:700}) }
		});
		uBody.makeSiBtnPass();
	}else if (!switcher && toggleCrit){
		$("div.tooltip-message").remove();
		$("div.ci-cont" + bVars.divcbtnNo).unwrap().off("click", uBody.scatsWall);
		$("div.cn-cont" + bVars.divcbtnNo).unwrap().off("click", uBody.storesWall);
		$("div.cbtn" + bVars.divcbtnNo).css({"margin-top":(mspTB + "px"),"margin-bottom":(mspBB + "px")}).click(function(){ uBody.scatsWall(parseFloat($(this).attr("id"))) });
		$("span#scname").remove();
		$(".cn-cont" + bVars.divcbtnNo + " span").show();
	}
}
uBody.makeCbtnAct = function(){
	if (bVars.cat == null){ return false }
	$("div.cbtn" + bVars.cat).removeClass("cbtn-act2 cbtn-pass").addClass("cbtn-act");
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
}
uBody.makeSiBtnAct = function(){
	uBody.makeCbtnPass();
	$("div.sibtn").removeClass("sibtn-act2").addClass("sibtn-act");
}
uBody.makeSiBtnPass = function(){
	$("div.sibtn").removeClass("sibtn-act").addClass("sibtn-pass");
	$.get(addrUrl.getLbl(10), function(data){ uElem.siBtnName.text(data) });
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
		if (switcher && tCrit){
			$.get(addrUrl.getLbl(112), function(data){
				$("div.map-btn").removeClass("map-btn-act").addClass("map-btn-pass").on("click", uBody.back2root)
				uElem.mBtnCont.text(data);
			});
		}else if (!tCrit){
			$.get(addrUrl.getLbl(108), function(data){
				$("div.map-btn").removeClass("map-btn-pass").addClass("map-btn-act").off("click", uBody.back2root);
				uElem.mBtnCont.text(data);
				uServe.setUpElems();
				if (uElem.schField.length > 0){
					if ($.browser.msie){
						document.getElementById("sch-field").value = "";
						$.get(addrUrl.getLbl(105), function(data){ uServe.add_placeholder("sch-field",data) });
					}else{	$("input.sch-field").val("") }
				}
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
				return false;
			}else if(bVars.pmType == 2){ bMap.clearChsMarkers() }
		}
		$.get(addrUrl.svapi("scat",null));
		$("div.list-cont").remove();
		uBody.makeCbtnPass();
		bVars.cat = null;
		if (!switcher2){ uBody.toggleMapBtn() }
	}else{
		$("div#scats").hide();
		$("div.list-cont").hide();
	}
}
uBody.showTTstores = function(){
	uBody.closeMinisite(true,true,true);
	uBody.toggleAddCbtn();
	uServe.resetMapControls(true);
	if ($("div.tooltip-message").length > 0){ $("div.tooltip-message").remove() }
	if (uServe.chmEx() && bVars.pmType == 1){
		if ($("div.list-cont:visible").length > 0){ uBody.closeWall(true) }
		uServe.toggleMap(true);
	}else{
		if (bVars.pmType == 2){ $("div.list-cont").remove() }
		bVars.pmType = 1;
		uBody.togglePB(true);
		$.getJSON(addrUrl.getPrmSt(), function(data){ if (data){ uBody.showSpm(data,true) }else{ return false } });
	}
}
uBody.storesListThumb = function(no,switcher){
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
	uServe.setUpElems();
	// dragonly
	var lsBtn, slidesCont;
	// switching between filtered stores' list and other common lists
	if ($("div#scats:visible").length > 0){
		lsBtn = $("div.lsbtn-simple-slider");
		slidesCont = $("div#scats>div.slides-cont");
	}else if ($("div#stores:visible").length > 0){
		lsBtn = $("div.lsbtn-simple-slider");
		slidesCont = $("div#stores>div.slides-cont");
	}else if ($("div#fst-slider:visible").length > 0){
		lsBtn = $("div.lsbtn-fst-slider");
		slidesCont = $("div#filter-stores>div.slides-cont");
	}else if ($("div#schlist:visible").length > 0){
		lsBtn = $("div.lsbtn-simple-slider");
		slidesCont = $("div#schlist>div.slides-cont");
	}else if ($("div#si:visible").length > 0){
		lsBtn = $("div.lsbtn-simple-slider");
		slidesCont = $("div#si>div.slides-cont");
	}
	if (lsBtn.length == 0){ return false }
	if (!switcher){
		if (bVars.slideBegPos < bVars.slideEndPos){ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slideNext() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slidePrev() }	}
		else{ if (bMap.varsArr['wdir'] == "rtl"){ uBody.slidePrev() }else if (bMap.varsArr['wdir'] == "ltr"){ uBody.slideNext() } }
	}
	if (bMap.varsArr['wdir'] == "rtl"){ slidesCont.animate({ "left" : bVars.slideStep + "px" }, "fast") }
	else if (bMap.varsArr['wdir'] == "ltr"){ slidesCont.animate({ "left" : (bVars.slideStep*bVars.countSlide - bVars.ssCorrVal) * (-1) + "px" }, "fast") }
	if (bVars.countSlide != bVars.prevCountSlide){
		lsBtn.eq(bVars.countSlide).removeClass("ls-btn-pass").addClass("ls-btn-act");
		lsBtn.eq(bVars.prevCountSlide).removeClass("ls-btn-act").addClass("ls-btn-pass");
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
	if ($("div.list-slider").length > 0){
		var lsBtn;
		$("div.ls-btn").click(function(){
			if ($("div#fst-slider:visible").length > 0){ lsBtn = $("div.lsbtn-fst-slider") }else{ lsBtn = $("div.lsbtn-simple-slider") }
			uBody.storesListThumb(lsBtn.index(this))
		}).mouseover(function(){
			$(this).removeClass("ls-btn-pass").addClass("ls-btn-act2")
		}).mouseleave(function(){
			$(this).removeClass("ls-btn-act2").addClass("ls-btn-pass")
		})
	}
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
uBody.storesWall = function(){
	if ($("div.minisite-cont:visible").length > 0){ uBody.closeMinisite(true,true) }
	var newLcc = false;
	bVars.slType = 2;
	uServe.toggleListBtn(false);
	uServe.toggleMap();
	if ($("div.rst-list-cont").length > 0){
		$("div.list-cont").show();
		$("div.rst-list-cont").show();
		return false;
	}
	uServe.resetGsNum();
	if (!($("div.list-cont").length > 0)){
		$("td.mw").append("<div class='list-cont'></div>");
		newLcc = true;
	}
	$("div.list-cont:hidden").show();
	$("div.list-cont").append("<div class='rst-list-cont'></div>");
	$.get(addrUrl.svapi("slider",bVars.slType), function(){
		$("div.rst-list-cont").load(addrUrl.loadBlock("stlist"), function(){
			uServe.toggleLsContBckgr();
			if (newLcc){ $("div.list-cont").css("background-image","none") }
			uServe.setUpRstEl();
			if ($("div.ls-header").length > 0){ uServe.loadSlider() }
			else{
				$.get(addrUrl.loadBlock("wallheader"), function(data){
					$("div.stores-container").append(data);
					$("div.ls-header").css({"left":"0px","top":"-52px"});
					$("div.close-wall").css({"left":"657px","top":"-49px"});
					uServe.loadSlider();
				});				
			}
		});
	});
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
	uServe.toggleLsContBckgr();
	uBody.toggleCbtn();
	uBody.makeCbtnAct();
	bMap.clearStore();
	bMap.clearChsMarkers();
	bMap.clearPopupMarkers();
	bMap.clearBckgrIcons();
	uServe.toggleMap();
	bVars.ssCorrVal = 0;
	uServe.toggleListBtn(false);
	uServe.resetGsNum();
	uServe.resetSomNo();
	uBody.closeSi();
	if (!($("div.list-cont").length > 0)){
		$("td.mw").append("<div class='list-cont'></div>");
		bMap.clearMeasure(true);
	}else if (!($("div.rst-list-cont").length > 0) && !isNew){
		$("div.list-cont").show();
		$("div#scats").show();
		return false;
	}else if ($("div.rst-list-cont").length > 0){
		$("div.rst-list-cont").remove();
		uBody.closeFltStList(true);
	}
	$.get(addrUrl.svapi("cat,slider",bVars.cat + "," + bVars.slType), function(){
		$("div.list-cont").show().load(addrUrl.loadBlock("ellist"), function(){
			$("div.list-cont").css("background-image","none");
			$("div.store-btn-bckgr").click(function(){
				bVars.pmType = 1;
				uBody.togglePB(true);
				$.get(addrUrl.svapi("scat",$(this).attr("id")), function(){
					$.getJSON(addrUrl.getPrmSt(), function(data){
						if (data){
							bVars.showTTS = true;
							uBody.showSpm(data);
						}else{
							bVars.showTTS = false;
							uBody.togglePB();
							uBody.closeWall();
							uBody.storesWall();
							uServe.toggleListBtn(false);
						}
					});
				});
			}).mouseenter(function(){
				$(this).removeClass("store-btn-bckgr-pass").addClass("cbtn-act2")
			}).mouseleave(function(){
				$(this).removeClass("cbtn-act2").addClass("store-btn-bckgr-pass")
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
	if (uElem.schField.length == 0){ return false }
	bVars.slType = 3;
	uServe.toggleListBtn(false);
	uServe.toggleMap();
	uServe.resetGsNum();
	uServe.resetSomNo();
	if ($("div.list-cont").length > 0){ $("div.list-cont").show() }else{ $("td.mw").append("<div class='list-cont'></div>") }
	$.get(addrUrl.svapi('slider',bVars.slType), function(){
		$("div.list-cont").load(addrUrl.loadBlock("schlist"), function(){
			$("div.list-cont").css("background-image","none");
			$("div.store-btn-bckgr").click(function(){
				uBody.openMinisite($(this).attr("id"),true)
			}).mouseenter(function(){
				$(this).removeClass("store-btn-bckgr-pass").addClass("cbtn-act2")
			}).mouseleave(function(){
				$(this).removeClass("cbtn-act2").addClass("store-btn-bckgr-pass")
			});
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
	$("div.ls-move").click(function(){
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
	var startStep = 277;
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
	bMap.clearMeasure(true);
	bVars.ssCorrVal = 0;
	uServe.toggleListBtn(false);
	uServe.resetGsNum();
	uServe.resetSomNo();
	if (!($("div.list-cont").length > 0)){ $("td.mw").append("<div class='list-cont'></div>") }
	else if ($("div.list-cont").is(":hidden")){ $("div.list-cont").show() }
	uBody.toggleMapBtn(true);
	$.get(addrUrl.svapi("slider",bVars.slType), function(){
		$("div.list-cont").load(addrUrl.loadBlock("si"), function(){
			$("div.list-cont").css("background-image","none");
			$("div.ls-header").css({"top":"0px","left":"0px"});
			$("div.close-wall").css({"top":"3px","left":"655px"});
			$("div.si-bckgr").on("click", function(){
				bVars.si = parseInt($(this).find("div.si-btn").attr("id"));
				bMap.showSiMarkers();
				uElem.siBtnName.text($(this).find("span:eq(0)").text());
			});
			if (!$.browser.msie){ $("div.si-bckgr").tooltipster() }
			uServe.loadSlider();
			$("div.close-wall").on("click", uBody.closeSi);
		});
	});
}
/*
 * Stores' promotion on the map
 */
uBody.showSpm = function(inv,switcher){
	uServe.setUpElems();
	if (bVars.pmType == 2 && uElem.schField.length == 0){ return false }
	if (uServe.chmEx()){ bMap.clearChsMarkers() }
	uBody.closeSi();
	bMap.catChsMarkers = new OpenLayers.Layer.Markers("catChsMarkers");
	bMap.map.addLayer(bMap.catChsMarkers);
	uServe.markerAboveBckgr();
	$("div.show-st-list").mouseenter(function(){
		$(this).removeClass("show-st-list-pass").addClass("show-st-list-act")
	}).mouseleave(function(){
		$(this).removeClass("show-st-list-act").addClass("show-st-list-pass")
	});
	switch(bVars.pmType){
		case 1:
			// top ten of the subcategory
			uServe.toggleMap(true);
			uBody.togglePB();
			bMap.map.zoomToMaxExtent();
			clearTimeout(bVars.ttglBtn);
			bVars.ttglBtn = setTimeout(function(){ uBody.toggleCbtn(true) }, 200);
				uBody.closeWall();
			if (!switcher){ uServe.toggleLsContBckgr(true) }
			$.get(addrUrl.getLbl(114), function(data){
				$("div.show-st-list").off("click", uBody.schWall).on("click", uBody.storesWall);
				$("div.show-st-list>div>div").text(data);
			});
			$.each(inv, function(key,val){
				var chmCoords = {'x':val[0]['x'],'y':val[0]['y'],'icat':bVars.cat,'store':parseFloat(key)};
				uServe.addNewMarker(chmCoords,3);
				bMap.chmCoords.push(chmCoords);
			});
			uServe.toggleListBtn(true);
		break;
		case 2:
			// top ten of the search results
			uServe.toggleMap(true);
			uBody.closeWall(true,true);
			bMap.clearMeasure(true);
			uBody.toggleCbtn();
			uBody.makeCbtnPass();
			uBody.togglePB(true);
			uBody.closeMinisite(true,true);
			bMap.clearStore();
			uBody.closeTopTen(true);
			bMap.clearBckgrIcons();
			bMap.clearPopupMarkers();
			$.get(addrUrl.svapi("sch_txt",inv), function(){
				$.get(addrUrl.getLbl(117), function(data){
					$("div.show-st-list").off("click", uBody.storesWall).on("click", uBody.schWall);
					$("div.show-st-list>div>div").text(data);
				});
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
					uBody.toggleMapBtn(true);
				});
			});
			uServe.markerAboveBckgr();
		break;
		case 3:
			// stand-by promoted stores
			$.each(inv, function(key,val){
				var chmCoords = {'x':val['x'],'y':val['y'],'icat':val['cat'],'store':val['id'],'cc':true};
				uServe.addNewMarker(chmCoords,3);
				bMap.chmCoords.push(chmCoords);
			});
			uServe.markerAboveBckgr();
		break;
	}
}
uBody.showSt = function(){
	$.getJSON(addrUrl.vapi + "shwst,store", function(data){
		if (data['shwst']){
			bVars.showStSw = true;
			uBody.openMinisite(data['store'],true);
		}
	});
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
	uBody.toggleMapBtn();
	bMap.clearBckgrIcons();
	uServe.resetSomNo();
	uBody.showStandByStores();
	uBody.closeSi();
}
/*
 * Banners renewal
 */
uBody.bannRenewal = function(){
	var group = 0;
	var lim = 2;
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
		var scrW;
		if ($.browser.mozilla || $.browser.opera || $.browser.msie){ scrW = 15 }else if ($.browser.webkit){ scrW = 7 }
		if ($.browser.msie){ $("html, body").animate({ scrollTop: 0 }, 0) }
		$("html, body").css("overflow","hidden");
		$("body>center").css("margin-right", scrW + "px");
		if ($.browser.msie){ uServe.placeOnMiddle($(".pb-icon div")) }
		$("div.total-pb-bckgr").show();
		$("div.pb-icon-cont").show();
		uServe.placeOnMiddle($(".pb-icon div"),true);
		uServe.rotateAL();
	}else if (!switcher && $("div.total-pb-bckgr").is(":visible")){
		$("html, body").removeAttr("style");
		$("body>center").removeAttr("style");
		$("div.total-pb-bckgr").hide();
		$("div.pb-icon-cont").hide();
	}
}
uBody.closeMsgBox = function(){
	$("div.msg-box").hide();
	$("div.total-pb-bckgr").off("click", uBody.closeMsgBox);
	$("div.pb-icon").removeAttr("style");
	uBody.togglePB();
}
uBody.openMsgBox = function(id,addHTML,callback){
	$.get(addrUrl.getLbl(id), function(data){
		uBody.togglePB(true);
		$("div.pb-icon-cont").hide();
		uServe.placeOnMiddle($("div.msg-box"));
		var msgTxt = ($.browser.msie)? $("div.msg-txt>div>span") : $("div.msg-txt>div");  
		msgTxt.text(data).append(addHTML);
		$("div.msg-cls").on("click", uBody.closeMsgBox);
		$("div.total-pb-bckgr").on("click", uBody.closeMsgBox);
		$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.closeMsgBox() } });
		if (typeof(callback) == "function"){ callback() }
	});
}
/*
 * Language switch block
 */
uBody.openLangPanel = function(){
	uBody.togglePB(true);
	$("div.pb-icon-cont").hide();
	uServe.placeOnMiddle($("div.lang-panel"));
	$("div.lang-elem").click(function(){
		uServe.setLang($(this).attr("id"));
	}).mouseenter(function(){
		if ($(this).hasClass("lang-elem-pass")){ $(this).removeClass("lang-elem-pass").addClass("lang-elem-act2") }
	}).mouseleave(function(){
		if ($(this).hasClass("lang-elem-act2")){ $(this).removeClass("lang-elem-act2").addClass("lang-elem-pass") }
	});
	$("div.lang-cls").on("click", uBody.closeLangPanel);
	$("div.total-pb-bckgr").on("click", uBody.closeLangPanel);
	$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.closeLangPanel() } });
}
uBody.closeLangPanel = function(switcher){
	if ($("div.lang-panel").is(":hidden")){ return false }
	$("div.lang-panel").hide();
	$("div.total-pb-bckgr").off("click", uBody.closeLangPanel);
	$("div.pb-icon").removeAttr("style");
	if (switcher != true){ uBody.togglePB() }
}
/*
 * Login window block
 */
uBody.openLoginWindow = function(){
	uBody.togglePB(true);
	$("div.pb-icon-cont").hide();
	uServe.placeOnMiddle($("div.sw-body"));
	$("div.login-cls").on("click", uBody.closeLoginWindow);
	$("div.total-pb-bckgr").on("click", uBody.closeLoginWindow);
	if ($.browser.msie){
		$.get(addrUrl.getLbl(101), function(data){ uServe.add_placeholder("sw-uname",data) });
		bMap.keyboardnav.deactivate();
		$("span#sw-pass-ph").on("click", function(){
			$(this).hide();
			$("input#sw-pass").focus();
		});
		$("input#sw-pass").focus(function(){ $("span#sw-pass-ph").hide() }).blur(function(){
			if ($(this).val() == 0){ $("span#sw-pass-ph").show() }
		}); 
	}
	$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.closeLoginWindow() } });
}
uBody.closeLoginWindow = function(){
	if ($("div.sw-body").is(":hidden")){ return false }
	$("div.sw-body").hide();
	$("div.total-pb-bckgr").off("click", uBody.closeLoginWindow);
	$("div.pb-icon").removeAttr("style");
	uBody.togglePB();
	if ($.browser.msie){ bMap.keyboardnav.activate() }
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
/*
 * Measure 
 */
uServe.showMeasureCont = function(){
	$("div#smap").on("mousemove", uBody.moveMeasureCont).on("dblclick", uBody.stopMeasureCont);
	$("div.olLayerDiv").off("click");
}
uServe.msgShowNoMore = function(){
	$("input.show-no-more").on("click", function(){
		if ($(this).is(":checked")){ $.get(addrUrl.svapi("shnomore",1)) }
	});
}
/*
 * Screensaver block
 */
uServe.respiteSCS = function(switcher){
	clearTimeout(bVars.makeAtClickFalse);
	bVars.atClick = true;
	bVars.makeAtClickFalse = setTimeout(function(){ bVars.atClick = false }, 40000);
	uBody.closeScrsAnime(switcher);
}
uServe.screenSaver = function(){
	setInterval(function(){
		if (!bVars.atClick){
			if (
				(uServe.chmEx() && bVars.pmType != 3) || 
				bMap.map.getZoom() > 0 ||  
				$("div.minisite-cont").length > 0 || 
				$("div.list-cont").length > 0 || 
				$("div#smap").attr("style") > 0 || 
				typeof(bMap.ppm) != "undefined" || 
				$("div.olPopup").length > 0 || 
				$("div.msg-box").is(":visible")
			){ uBody.back2root() }
			else if (!uServe.chmEx()){
				uBody.toggleMapBtn(true);
				uBody.showStandByStores();
			}
			uBody.closeLangPanel(true);
			uBody.runScrsAnime();
		}
	}, 2000);
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
		$(".scrs-anime-layer>div").off("click", uServe.animeClick).hide();
		$("div.scrs-comm").off("click", uServe.animeClick).hide();
		if ($("div.video-player-scrs").length > 0){ $("div.video-player-scrs").remove() }
		if (attr['type'] == "anime"){
			$("div.sa" + id).css({"top":top+"px","left":left+"px","width":attr['width']+"px","height":attr['height']+"px"}).show().on("click", uServe.animeClick);
			$("div.sa" + id + ">div").removeAttr("style").show();
		}else if (attr['type'] == "comm"){
			$("div.scrs-comm").css({"top":top+"px","left":left+"px","width":attr['width']+"px","height":attr['height']+"px"}).show().on("click", uServe.animeClick);
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
uServe.setBrwsPref = function(){
	if ($.browser.mozilla){ bVars.brwsPref = "-moz-" }
	else if ($.browser.webkit){ bVars.brwsPref = "-webkit-" }
	else if ($.browser.opera){ bVars.brwsPref = "-o-" }
	else if ($.browser.msie){ bVars.brwsPref = "-ms-" }
}
uServe.setUpElems = function(){
	/*
	 * setting unique DOM elements for IE and other browser 
	 */
	uElem.measureCont = [];
	if ($.browser.msie && parseFloat($.browser.version) < 10){
		bVars.slideStep = 702;
		uElem.siBtnName = $("span.siname");
		uElem.mBtnCont = $("div.map-btn>div>span");
		uElem.cnCont = $("div.cn-cont-bckgr");
		uElem.scName = "<div id='scname-cell'><span id='scname'></span></div>";
		uElem.schField = encodeURIComponent(document.getElementById("sch-field").value);
		uElem.measureCont['x'] = 10;
		uElem.measureCont['y'] = -190;
		bVars.ssCorr = ($("div#stores:visible").length > 0 || $("div#fst-slider:visible").length > 0)? 6 : 2;
	}else{
		bVars.slideStep = 689;
		bVars.ssCorr = 2;
		uElem.siBtnName = $("div.sibtn-name");
		uElem.mBtnCont = $("div.map-btn>div");
		uElem.cnCont = $("div.cn-cont" + bVars.cat);
		uElem.scName = "<span id='scname'></span>";
		uElem.schField = $("input.sch-field").val();
		uElem.measureCont['x'] = 20;
		uElem.measureCont['y'] = 0;
	}
}
uServe.placeOnMiddle = function(elem,isVis){
	var iWidth, iHeight;
	if (!isVis){ elem.show() }
	if ($.browser.msie){
		iWidth = document.body.clientWidth;
		iHeight = document.body.clientHeight;
	}else{
		iWidth = window.innerWidth;
		iHeight = window.innerHeight;
	}
	elem.css({
		"left": ((iWidth - elem.width()) / 2) + "px",
		"top": ((iHeight - elem.height()) / 2) + "px"
	});
}
uServe.setLang = function(lang){
	$.get(addrUrl.svapi("lang",lang), function(){ window.location.reload() });
}
uServe.add_placeholder = function(id, placeholder)
{
	/*
	 * for IE only
	 */
	if (!$.browser.msie){ return false }
	var el = document.getElementById(id);
	el.placeholder = placeholder;
	el.onfocus = function(){
		if(this.value == this.placeholder)
		{
			this.value = '';
			el.style.cssText  = '';
		}
	}
	el.onblur = function(){
		if(this.value.length == 0)
		{
			this.value = this.placeholder;
			el.style.cssText = 'color:#0099CC;font-family:Arial;';
		}
	}
	el.onblur();
}
uBody.runScrsAnime = function(){
	// initiates screen saver start
	if ($("div.scrs-cont").length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0){ return false }
	var corrScrs = 2000;
	uBody.togglePB(true);
	$("td.mw").append("<div class='scrs-cont'></div>");
	$("div.scrs-cont").load(addrUrl.loadBlock("screensaver"), function(){
		$("div.pb-icon-cont").hide();
		$("div.scrs-cont").on("click", function(){ uBody.closeScrsAnime(false) });
		$("div.scrs-cls-btn").on("click", function(){ uBody.closeScrsAnime(false) });
	});
	uServe.scrsAnime();
	$.get(addrUrl.api + 21, function(data){ bVars.runScrsQueue = setInterval(function(){ uServe.scrsAnime() }, (bVars.scrsRunInterval * parseFloat(data) + corrScrs))	});
}
uBody.closeScrsAnime = function(switcher){
	if ($("div.scrs-cont").length > 0){ $("div.scrs-cont").remove() }
	if (!switcher){
		$("div.total-pb-bckgr").off("click", uBody.closeScrsAnime);
		uBody.togglePB();
	}
	clearTimeout(bVars.startScrs);
	clearInterval(bVars.runScrsQueue);
	clearInterval(bVars.runScrs);
}
/*
 * Fullscreen
 */
uBody.goFullscreen = function(){
	$("html, body").animate({ scrollTop: 0 }, 0).css("overflow","hidden");
	if (bMap.map.getZoom() < 3){ bMap.map.zoomTo(3) }
	$.get(addrUrl.getLbl(96), function(data){
		$("td.mw").append("<div class='leave-fscr'><span>" + data + "</span></div>");
		$("div.leave-fscr").click(function(){ uBody.leaveFullcsreen() });
		$("div#smap").css({"position":"absolute","top":"0px","left":"0px","width":"100%","height":"100%","z-index":"15"});
		$("body").scrollTop();
		bMap.map.setOptions({restrictedExtent: new OpenLayers.Bounds(bMap.mFullBounds['lbx'],bMap.mFullBounds['lby'],bMap.mFullBounds['rtx'],bMap.mFullBounds['rty'])});
		bMap.map.updateSize();
		$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.leaveFullcsreen() } });
	});
}
uBody.leaveFullcsreen = function(){
	if (!($("div.leave-fscr").length > 0)){ return false }
	$("div.leave-fscr").remove();
	$("div#smap").removeAttr("style");
	$("html, body").css("overflow","auto");
	bMap.map.setOptions({restrictedExtent: new OpenLayers.Bounds(bMap.mSmBounds['lbx'],bMap.mSmBounds['lby'],bMap.mSmBounds['rtx'],bMap.mSmBounds['rty'])});
	bMap.map.updateSize();
}
/*
 * Scale Hint
 */
uBody.hideScaleHint = function(){
	clearTimeout(bVars.tshSclHnt);
	if (!($("div.scale-hint-bckgr").is(":visible"))){ return false }
	bVars.thSclHnt = setTimeout(function(){
		$("div.scale-hint-bckgr").hide();
		$("div.scale-hint").fadeOut("slow");
	}, 500);
}
uBody.showScaleHint = function(){
	if (bMap.map.getZoom() >= bVars.maxScale){ return false }
	clearTimeout(bVars.thSclHnt);
	bVars.tshSclHnt = setTimeout(function(){
		$("div.scale-hint-bckgr").show();
		$("div.scale-hint").fadeIn().on("click", bMap.scaleByHint);
	}, 500);
}
/*
 * Promoted stores on the stan-by mode
 */
uBody.showStandByStores = function(){
	bVars.pmType = 3;
	$.getJSON(addrUrl.getStandBySt(), function(data){ if (data){ uBody.showSpm(data,true) }else{ return false } });
}
/*
 * Show additional panel
 */
uBody.setUpAddCbtn = function(){
	$("div.add-cbtn").on("click", function(){ uBody.scatsWall(bVars.cat) }).mouseenter(function(){
		$(this).removeClass("add-cbtn-pass").addClass("add-cbtn-act")
	}).mouseleave(function(){
		$(this).removeClass("add-cbtn-act").addClass("add-cbtn-pass")
	});
	$("div.add-tt-btn").on("click", uBody.showTTstores).mouseenter(function(){
		$(this).removeClass("add-cbtn-pass").addClass("add-cbtn-act")
	}).mouseleave(function(){
		$(this).removeClass("add-cbtn-act").addClass("add-cbtn-pass")
	});
}
uBody.toggleAddCbtn = function(switcher){
	if (switcher && $("div.add-cbtn-cont").is(":hidden")){ $("div.add-cbtn-cont").show() }
	else if (!switcher && $("div.add-cbtn-cont").is(":visible")){ $("div.add-cbtn-cont").hide() }
}
/*
 * Video block
 */
uBody.closePlayer = function(){
	if ($("div.video-player").length == 0){ return false }
	$("div.video-player").remove();
	$("div.video-close").remove();
	$("div.total-pb-bckgr").off("click", uBody.closePlayer);
	uBody.togglePB();
	if (bVars.singleTrailer){ uBody.closeVideo() }
}
uBody.openPlayer = function(trailerId){
	var clsCorr = 23;
	var videoDir,topPos,sidePos;
	uBody.togglePB(true);
	$.getJSON(addrUrl.api + 14, function(data){
		videoDir = addrUrl.base + "stores/" + data['tc'] + "/" + data['store'] + "/videos/web/";
		$("div.pb-icon-cont").hide();
		$("body>center").append("<div class='video-player'><div id='videoplayer7267'></div></div><div class='video-close'></div>");
		$("div.video-close").on("click", uBody.closePlayer);
		$("div.total-pb-bckgr").on("click", uBody.closePlayer);
		$(document).keydown(function(e){ if (e.keyCode == 27){ uBody.closePlayer() } });
		if ($.browser.msie && parseInt($.browser.version,10) <= 8){
			topPos = (document.body.clientHeight - data['height']) / 2;
			sidePos = (document.body.clientWidth - data['width']) / 2;
		}else{
			topPos = (window.innerHeight - data['height']) / 2;
			sidePos = (window.innerWidth - data['width']) / 2;
		}
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
	$("div.video-btn").removeClass("sm-btn-pass cbtn-act2").addClass("cbtn-act").off("click", uBody.openVideo);
	setTimeout(function(){ $("div.video-btn").on("click", uBody.closeVideo) }, 500);
	$("div.pct-uplayer").append("<div class='video-layer'></div>");
	$.get(addrUrl.api + 13, function(data){
		if (parseFloat(data) > 1){
			$("div.showcase").hide();
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
	$("div.video-btn").removeClass("cbtn-act").addClass("sm-btn-pass").off("click", uBody.closeVideo);
	setTimeout(function(){ $("div.video-btn").on("click", uBody.openVideo) }, 500);
	$("div.video-layer").remove();
	if ($("div.showcase").is(":hidden")){ $("div.showcase").show() }
	bVars.singleTrailer = false;
}
uBody.openScrsVideo = function(storeId,attr){
	var videoDir = addrUrl.base + "stores/" + bMap.varsArr['tc'] + "/" + storeId + "/videos/web/";
	$("div.scrs-comm").append("<div class='video-player-scrs'><div id='videoplayer7267'></div></div>");
	$.getScript(addrUrl.getJS("swfobject"), function(){
		var flashvars = {"comment":"uniqoom","st":videoDir + "video55-1659.txt","file":videoDir + attr['no'] + ".flv"};
		var params = {wmode:"transparent",allowFullScreen:"true",allowScriptAccess:"always",id:"videoplayer7267"};
		new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf","videoplayer7267",attr['width'],attr['height'],"9.0.115.0",false,flashvars,params);
	});
}
$(document).ready(function(){
	uServe.setBrwsPref();
	uServe.setUpElems();
	$.getJSON(addrUrl.vapi + "lang,wdir,tc,bann_no", function(data){
		bMap.varsArr = data;
		$.get(addrUrl.getSCName("bankers"), function(data2){ bMap.varsArr['bankers'] = parseFloat(data2) });
	});
	bMap.setMap('smap');
	uBody.showStandByStores();
	$("div.cbtn").click(function(){
		var catId = parseFloat($(this).attr("id"));
		if (uServe.inArray(catId,bVars.specCat)){ bMap.setPopupMarkers(catId) }else{ uBody.scatsWall(catId) }
	}).mouseenter(function(){
		if ($(this).hasClass("cbtn-pass")){ $(this).removeClass("cbtn-pass").addClass("cbtn-act2") }
	}).mouseleave(function(){
		if ($(this).hasClass("cbtn-act2")){ $(this).removeClass("cbtn-act2").addClass("cbtn-pass") }
	});
	$("div.sibtn").click(function(){ uBody.showSi() }).mouseenter(function(){
		if ($(this).hasClass("sibtn-pass")){ $(this).removeClass("sibtn-pass").addClass("sibtn-act2") }
	}).mouseleave(function(){
		if ($(this).hasClass("sibtn-act2")){ $(this).removeClass("sibtn-act2").addClass("sibtn-pass") }
	});
	$("div.bann-cell").click(function(){
		var storeId = $(this).attr("id");
		if (!isNaN(storeId)){ uBody.openMinisite(parseFloat(storeId),(storeId != 0)) }else{ window.location.href = storeId }
	});
	$("div.sch-btn").click(function(){
		uServe.setUpElems();
		bVars.pmType = 2;
		uBody.showSpm(uElem.schField);
	});
	$("input.sch-field").on('keypress', function(event){
		if (event.keyCode === 13){
			uServe.setUpElems();
			bVars.pmType = 2;
			uBody.showSpm(uElem.schField);
		}
	});
	$("div.go-fscr").click(function(){ uBody.goFullscreen() });
	if (!$.browser.msie){ $("div.go-fscr").tooltipster() }
	$.get(addrUrl.getLbl(121), function(data){
		$("div#olControlOverviewMapMaximizeButton").attr("title",data);
		if (!$.browser.msie){ $("div#olControlOverviewMapMaximizeButton").tooltipster() }
	});
	$(".olControlPanZoomBar>div:eq(4), .olControlPanZoomBar>div:eq(5), .olControlPanZoomBar>div:eq(6), .olControlPanZoomBar>div:eq(7)").
		mouseenter(function(){ uBody.showScaleHint() }).mouseleave(function(){ uBody.hideScaleHint() });
	$("div.scale-hint-bckgr").click(function(){ $(this).hide() }).mouseenter(function(){ uBody.showScaleHint() }).mouseleave(function(){ uBody.hideScaleHint() });
	$("div.lang-btn").click(function(){ uBody.openLangPanel() });
	$("div.measure-switch").on("click", bMap.setMeasure);
	$("div.drum-btn").click(function(){ uBody.openMsgBox(124) });
	$("div.lott-btn").click(function(){ uBody.openMsgBox(124) });
	$("div.hot-deal-btn").click(function(){ uBody.openMsgBox(124) });
	$("div.login-btn").on("click", uBody.openLoginWindow);
	uBody.setUpAddCbtn();
	//setTimeout(function(){ uBody.openMinisite(11741) }, 1000);
	//uServe.screenSaver();
	//uBody.bannRenewal();
	uBody.showSt();
}).on("click", uServe.respiteSCS);