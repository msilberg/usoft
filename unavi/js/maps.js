/*
 * map gears
 * @author mike silberg
 */
bMap.storesRootAttr = new Array({"fill":"#ffffff","stroke":"#00a8e3","stroke-width":1});
bMap.storesAttr = new Array({"fill":"#ffffff","stroke":"#00a8e3","stroke-width":2});
bMap.flagRootAttr = new Array({"fill":"#ff5f17","stroke":"#00a8e3","stroke-width":2});
bMap.flagAttr = new Array({"fill":"#ff5f17","stroke":"#00a8e3","stroke-width":3});
bMap.storesMarkedAttr = new Array({"fill":"#F07746"});
bMap.linkerAttr = new Array({"fill":"#ffffff","opacity":0});
bMap.circlePassAttr = new Array({"fill":"90-#f79844-#b80642","stroke":"none","r":4});
bMap.circleActAttr = new Array({"fill":"90-#fcec22-#d2a14d","stroke":"none","r":4});
bMap.modTargetAttr = new Array({"fill":"#00c400","stroke":"#00c400","opacity":1});
bMap.levNameTextColor = "#00a7e6";
bMap.linker = [];
bMap.prevMark = [];
bMap.somCrit = false; // criteria which indicates that the store is being shown on the map
bMap.loadIval = 500;

bMap.openLevel = function(lev){
	$.get(addrUrl.svapi("is_root,lev","false," + lev), function(){
		if (bVars.isRoot){
			bVars.isRoot = false;
			for (var i = 0; i < bMap.varsArr['larr'].length; i++){ paperRoot[bMap.varsArr['larr'][i]].remove() }
			bMap.rlevNamesCanvas.remove();
		}else{ paperLevel[bMap.varsArr['lev']].remove() }
		bMap.prevMark.length = 0;
		uBody.makeMapBtnPass();
		bMap.setMap();
		$("td.mw").append("<div class='loop-cont'></div>");
		$("div.loop-cont").load(addrUrl.loadBlock("loop"), function(){ uBody.sclHandler() });
		if (bVars.store != null){
			$.getJSON(addrUrl.api + 11, function(data){
				if (uServe.inArray(lev,data)){
					setTimeout(function(){
						bMap.storeOnMap(true);
						uBody.makeBcPass();
					}, bMap.loadIval);
				}else{ bMap.eraseMarkedStore() }
			});
		}
	});
}
bMap.back2root = function(){
	if (bVars.isRoot){
		if (!uBody.closeMinisite()){ bVars.store = null }
		bMap.clearStores();
		setTimeout(function(){ bMap.clearStores() }, 500);
	}else{
		bVars.isRoot = true;
		uServe.resetMap();
		bMap.setMap();
		uBody.closeMinisite(true);
		if (bVars.store != null){
			if (bVars.atClick && bMap.somCrit){ setTimeout(function(){ bMap.storeOnMap(true) }, 900) }
			else{
				bVars.store = null;
				$("div.bc-otp-cont").remove();
				$("div.bc-arr").hide();
			}
		}else{ bVars.store = null }
		mSnd.resetScale();
		uBody.manipulateMapControls();
	}
	uServe.clearCat(true);
	if ($("div.list-cont").length > 0){ $("div.list-cont").remove() }
	bMap.prevMark.length = 0;
	uBody.closeSi();
	uBody.makeMapBtnAct();
	if ($("div.bc-level").hasClass("cbtn-pass")){ $("div.bc-level").removeClass("cbtn-pass").addClass("bc-level-act") }
	$("div.bc-level").hide();
	$.get(addrUrl.api + 16);
}
bMap.lbOtp = function(){
	// background output
	bMap.lbArr.length = 0;
	$.getJSON(addrUrl.api + 3, function(lbData){
		$.each(lbData,function(key,val){
			var i = 0;
			$.each(val,function(skey,sval){
				if (bVars.isRoot){
					bMap.lbArr[i] = paperRoot[key].path(sval.path);
					bMap.lbArr[i].scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'])
				}else{ bMap.lbArr[i] = paperLevel[key].path(sval.path) }
				bMap.lbArr[i].attr(sval.attr);
				bMap.lbArr[i++].drag(mSnd.move, mSnd.start, mSnd.up)
			});
		});
	});
}
bMap.btlOtp = function(){
	// background text output
	var markLevel;
	$.getJSON(addrUrl.api + 4, function(data){
		if (uServe.arrayKeys(data).length == 0){ return false }
		$.each(data, function(key,val){
			if (bVars.isRoot){ markLevel = paperRoot[key] }else{ markLevel = paperLevel[key] }
			$.each(val, function(i,sval){
				bMap.textArr.push(markLevel.text(sval.coords[0],sval.coords[1],sval.text));
				uServe.end(bMap.textArr).rotate(sval.rotate);
				uServe.end(bMap.textArr).attr(sval.attr);
				if (bVars.isRoot){ uServe.end(bMap.textArr).scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale']) }
			});
		});
	});
}
bMap.storeRootBuild = function(val){
	var tBuild;
	tBuild = paperRoot[val.key].path(val.area);
	tBuild.scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale']);
	tBuild.attr(bMap.storesRootAttr);
	return tBuild;
}
bMap.storeLevelBuild = function(base,temp){
	/*
	 * 0 - store's area
	 * 1 - text
	 * 2 - circle
	 */
	var tBuild;
	switch (base.switcher){
		case 0:
			tBuild = paperLevel[base.key].path(temp.area);
			tBuild.attr(bMap.storesAttr);
		break;
		case 1:
			tBuild = paperLevel[base.key].text(temp.textCoords[0],temp.textCoords[1],temp.name);
			tBuild.attr(temp.textAttr);
			tBuild.rotate(temp.textRotate);
		break;
		case 2:
			tBuild = paperLevel[base.key].circle(temp.circle[0],temp.circle[1]);
			tBuild.attr(bMap.circlePassAttr);
		break;
	}
	tBuild.drag(mSnd.move, mSnd.start, mSnd.up);
	tBuild.mousedown(function(){
		if (mSnd.sclCount <= 0){ uBody.openMinisite(base.storeId) }else{ return false }
	}).mouseup(function(){
		if (mSnd.sclCount > 0){ uBody.openMinisite(base.storeId) }else{ return false }
	});
	return tBuild;
}
bMap.storesOtp = function(){
	// stores output
	bMap.storesArr.length = 0;
	bMap.textArr.length = 0;
	bMap.circleArr.length = 0;
	bMap.linker.length = 0;
	$.getJSON(addrUrl.api + 5, function(storesData){
		$.each(storesData, function(key,val){
			$.each(val, function(skey,sval){
				if (bVars.isRoot){
					if (typeof(sval.mls) != "undefined"){
						if (typeof(bMap.storesArr[sval.id]) == "undefined"){ bMap.storesArr[sval.id] = [] }
						if (typeof(sval.area) == "string"){
							var valObj = new Object({ "key" : key, "area" : sval.area });
							bMap.storesArr[sval.id].push(bMap.storeRootBuild(valObj));
						}else if (typeof(sval.area) == "object"){
							var i = bMap.storesArr[sval.id].length;
							for (var j = 0; j < sval.area.length; j++){
								var valObj = new Object({ "key" : key, "area" : sval.area[j] });
								bMap.storesArr[sval.id][i++] = bMap.storeRootBuild(valObj);
							}
						}
					}else{
						var valObj = new Object({ "key" : key, "area" : sval.area });
						bMap.storesArr[sval.id] = bMap.storeRootBuild(valObj);
					}
				}else{
					var bVal = new Object({
						"key" : key,
						"storeId" : sval.id
					});
					if (typeof(sval.area) == "string"){
						// build stores
						bVal.switcher = 0;
						var tVal = new Object({ "area" : sval.area });
						bMap.storesArr[sval.id] = bMap.storeLevelBuild(bVal,tVal);
						// build text
						bVal.switcher = 1;
						var tVal = new Object({
							"textCoords" : sval.textCoords,
							"name" : sval.name,
							"textAttr" : sval.textAttr,
							"textRotate" : sval.textRotate
						});
						bMap.textArr[sval.id] = bMap.storeLevelBuild(bVal,tVal);
						// build circles
						if (sval.circle != null){
							bVal.switcher = 2;
							var tVal = new Object({ "circle" : sval.circle });
							bMap.circleArr[sval.id] = bMap.storeLevelBuild(bVal,tVal);
						}
					}else if (typeof(sval.area) == "object"){
						bMap.storesArr[sval.id] = [];
						bMap.textArr[sval.id] = [];
						bMap.circleArr[sval.id] = [];
						for (var i = 0; i < sval.area.length; i++){
							// build stores
							bVal.switcher = 0;
							var tVal = new Object({ "area" : sval.area[i] });
							bMap.storesArr[sval.id][i] = bMap.storeLevelBuild(bVal,tVal);
							// build text
							bVal.switcher = 1;
							var tVal = new Object({
								"textCoords" : sval.textCoords[i],
								"name" : sval.name,
								"textAttr" : sval.textAttr[i],
								"textRotate" : sval.textRotate[i]
							});
							bMap.textArr[sval.id][i] = bMap.storeLevelBuild(bVal,tVal);
							// build circles
							if (sval.circle[i] != null){
								bVal.switcher = 2;
								var tVal = new Object({ "circle" : sval.circle[i] });
								bMap.circleArr[sval.id][i] = bMap.storeLevelBuild(bVal,tVal);
							}
						}
					}
				}
			});
			if (bVars.cat != null){
				bMap.markStores();
				uBody.makeBcPass();
			}
			if (!bVars.isRoot && bVars.si != null){
				uBody.showSi();
				uBody.makeBcPass();
			}
			if (bVars.isRoot){
				bMap.linker[key]=paperRoot[key].rect(0,0,bMap.varsArr['canvas_w'] * bMap.varsArr['nscale'],bMap.varsArr['canvas_h'] * bMap.varsArr['nscale']);
				bMap.linker[key].attr(bMap.linkerAttr);
				bMap.linker[key].mousedown(function(){ bMap.openLevel(key) });
			}
		});
	});
}
bMap.eraseMarkedStore = function(){
	if (bVars.store != null){ bVars.store = null }
	bMap.somCrit = false;
	$("div.bc-otp-cont").remove();
	$("div.bc-arr").hide();
}
bMap.clearStores = function(){
	if (bMap.prevMark.length == 0){ return false }
	var attrCurr;
	if (bVars.isRoot){ attrCurr = bMap.storesRootAttr }
	else{ attrCurr = bMap.storesAttr }
	$.each(bMap.prevMark, function(i,val){
		if (typeof(val) == "object"){
			$.each(val.ind, function(j,sval){
				bMap.storesArr[val.id][sval].attr(attrCurr);
			});
		}else{ bMap.storesArr[val].attr(attrCurr) }
	});
	if (uServe.arrayKeys(bMap.flagArr).length > 0){ $.each(bMap.flagArr, function(i,val){ val.remove() }) }
	bMap.eraseMarkedStore();
	bMap.prevMark.length = 0;
}
bMap.clearSiFlags = function(){
	if (bMap.siFlagArr.length < 1){ return false }
	$.each(uServe.arrayKeys(bMap.siFlagArr), function(i,val){ bMap.siFlagArr[parseFloat(val)].remove() });
}
bMap.markStores = function(){
	if (bVars.store != null){ return false }
	$.getJSON(addrUrl.api + 6, function(data){
		bMap.clearStores();
		$.each(data, function(i,val){
			if (typeof(bMap.storesArr[val]) != "undefined"){
				if (bMap.storesArr[val].length > 1){
					tArr = [];
					$.each(bMap.storesArr[val], function(j,sval){
						sval.attr(bMap.storesMarkedAttr);
						tArr.push(j);
					});
					bMap.prevMark.push({"id":val,"ind":tArr});
				}else{
					bMap.storesArr[val].attr(bMap.storesMarkedAttr);
					bMap.prevMark.push(val);
				}
			}
		});
	});
}
bMap.markChosenStore = function(id,flag,wlev){
	var markLevel, rmCrit;
	var tArr = [];
	if (bVars.isRoot){ markLevel = paperRoot[wlev] }
	else{ markLevel = paperLevel[bMap.varsArr['lev']] }
	if (typeof(flag) == "object"){ $.each(flag, function(i,val){ bMap.flagArr.push(markLevel.path(val)) }) }
	else if (typeof(flag) == "string"){ bMap.flagArr.push(markLevel.path(flag)) }
	$.each(bMap.flagArr, function(i,val){
		val.attr(bMap.flagAttr);
		if (bVars.isRoot){
			val.scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale']);
			val.attr("stroke-width",2);
		}
	});
	if (uServe.inArray("id",uServe.arrayKeys(bMap.storesArr[id]))){
		bMap.storesArr[id].attr(bMap.storesMarkedAttr);
		bMap.prevMark.push(id);
	}else{
		rmCrit = bMap.prevMark.length == 0;
		$.each(bMap.storesArr[id], function(i,val){
			val.attr(bMap.storesMarkedAttr);
			if (rmCrit){ tArr.push(i) }
		});
		if (rmCrit){ bMap.prevMark = [{"id":id,"ind":tArr}] }
	}
}
bMap.storeOnMap = function(wayCrit){
	$.getJSON(addrUrl.api + 7, function(data){
		var lev;
		bMap.flagArr.length = 0;
		bMap.somCrit = true;
		mSnd.resetScale(true);
		$("div.bc-otp").load(addrUrl.loadBlock("storename"), function(){ $("div.bc-store-name").mousedown(function(){ uBody.openMinisite(bVars.store) }) });
		if (bVars.isRoot){
			$("div.bc-arr").hide();
			if (uServe.arrayKeys(data).length > 1 || wayCrit){
				uBody.makeMapBtnPass();
				$.each(data, function(key,val){ bMap.markChosenStore(bVars.store,val,key) });
				if (!wayCrit){
					bMap.clearTarget();
					bMap.targetOtp();
				}
			}else{
				lev = parseFloat(uServe.arrayKeys(data)[0]);
				$.get(addrUrl.svapi("lev",lev), function(){
					bMap.openLevel(lev);
					uServe.loadLevSwitch();
					$.each(data, function(key,val){ bMap.markChosenStore(bVars.store,val) });
					uBody.makeBcPass();
				});
			}
		}else{
			$("div.bc-arr").show();
			if (uServe.inArray(bMap.varsArr['lev'],uServe.arrayKeys(data))){
				setTimeout(function(){ $.each(data, function(key,val){ bMap.markChosenStore(bVars.store,val) }) }, bMap.loadIval);
				if (!wayCrit){
					bMap.clearTarget();
					bMap.targetOtp();
				}
			}else{
				$.get(addrUrl.svapi("lev",parseFloat(uServe.arrayKeys(data)[0])), function(){
					paperLevel[bMap.varsArr['lev']].remove();
					bMap.setMap();
					uServe.loadLevSwitch();
					setTimeout(function(){
						$.each(data, function(key,val){ bMap.markChosenStore(bVars.store,val) });
						uBody.makeBcPass();
					}, 800);
				});
			}
		}
	});
}
bMap.markSi = function(){
	var fAttr;
	var j = 0;
	bMap.clearSiFlags();
	$.each(bMap.varsArr['ssi_arr'], function(key,val){
		$.each(val, function(i,sval){
			if (bVars.isRoot){ 
				bMap.siFlagArr[j] = paperRoot[key].path(sval);
				bMap.siFlagArr[j].scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale']);
				bMap.siFlagArr[j].mousedown(function(){ bMap.openLevel(key) });
				fAttr = bMap.flagRootAttr;
			}else{ 
				bMap.siFlagArr[j] = paperLevel[key].path(sval);
				fAttr = bMap.flagAttr;
			}
			bMap.siFlagArr[j++].attr(fAttr);
		});
	});
}
/*
 * Module Targeting
 */
bMap.clearTarget = function(){
	//return false;
	if (uServe.arrayKeys(bMap.modTarget).length == 0){ return false }
	clearInterval(bMap.modTargetInt);
	bMap.modTarget.remove();
}
bMap.targetOtp = function(){
	return false;
	var markLevel;
	var tStep = .05;
	var tCorr = .4;
	var tScale = 1;
	var tDirect = false;
	$.getJSON(addrUrl.api + 10, function(data){
		$.each(data, function(key,val){
			if (!bVars.isRoot){
				if (key == bMap.varsArr['lev']){ bMap.targetOnMap = true }
				else{
					bMap.targetOnMap = false;
					return false;
				}
			}
			if (bVars.isRoot){ markLevel = paperRoot[key] }
			else{ markLevel = paperLevel[key] }
			bMap.modTarget = markLevel.path(val);
			bMap.modTarget.attr(bMap.modTargetAttr);
			if (bVars.isRoot){ bMap.modTarget.mousedown(function(){ bMap.openLevel(key) }) }else{ bMap.modTarget.attr("opacity",.7) }
			bMap.modTarget.scale(bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale'],bMap.varsArr['nscale']);		
		});
	});
	if (bMap.modTargetInt != null){ clearInterval(bMap.modTargetInt) }
	bMap.modTargetInt = setInterval(function(){
		if (tScale == 1 && tDirect){ tDirect = false }else if (tScale <= (tStep + tCorr)){ tDirect = true }
		if (!tDirect){ tScale -= tStep }else if (tDirect){ tScale += tStep }
		bMap.modTarget.scale(tScale,tScale);
	}, 60);
}
/*
 * Map Scaling Block
 */
mSnd.sclBorders = function(){
	mSnd.mw = 1120; // map width
	mSnd.mh = 725; // map height
	bMap.mPointer = paperLevel[bMap.varsArr['lev']].rect(0,0,1,1);
	mSnd.xBegInit = bMap.mPointer.getBBox().x;
	mSnd.yBegInit = bMap.mPointer.getBBox().y;
	mSnd.xEndInit = mSnd.xBegInit + mSnd.mw;
	mSnd.yEndInit = mSnd.yBegInit + mSnd.mh;
}
mSnd.getTextSize = function(){
	mSnd.fsizeInit.length = 0;
	mSnd.fsize.length = 0;
	$.each(uServe.runMapArr(bMap.textArr), function(i,val){
		mSnd.fsizeInit.push(val.attr("font-size"));
		mSnd.fsize.push(val.attr("font-size"));
	});
}
mSnd.moveIt = function(mOx,mOy){
	$.each(uServe.runMapArr(bMap.lbArr), function(i,val){ val.translate(mOx, mOy) });
	$.each(uServe.runMapArr(bMap.storesArr), function(i,val){ val.translate(mOx, mOy) });
	if (bMap.circleArr.length > 0){ $.each(uServe.runMapArr(bMap.circleArr), function(i,val){ val.translate(mOx, mOy) }) }
	if (bMap.siFlagArr.length > 0){ $.each(uServe.runMapArr(bMap.siFlagArr), function(i,val){ val.translate(mOx, mOy) }) }
	$.each(uServe.runMapArr(bMap.textArr), function(i,val){ val.translate(mOx, mOy) })
	bMap.mPointer.translate(mOx, mOy);
	if (bMap.flagArr.length > 0){ $.each(uServe.runMapArr(bMap.flagArr), function(i,val){ val.translate(mOx, mOy) }) }
}
mSnd.getCurrCoords = function(){
	mSnd.xBegCurr = bMap.mPointer.getBBox().x;
	mSnd.yBegCurr = bMap.mPointer.getBBox().y;
	mSnd.xEndCurr = mSnd.xBegCurr + mSnd.mw * mSnd.vscale;
	mSnd.yEndCurr = mSnd.yBegCurr + mSnd.mh * mSnd.vscale;
}
mSnd.alignIt = function(){
	var xbstep, ybstep;
	if (mSnd.sclCount == 0){
		xbstep = mSnd.xBegCurr - mSnd.xBegInit;
		ybstep = mSnd.yBegCurr - mSnd.yBegInit;
	}else{
		xbstep = (mSnd.xBegCurr - mSnd.xBegInit) / mSnd.sclCount;
		ybstep = (mSnd.yBegCurr - mSnd.yBegInit) / mSnd.sclCount;
	}
	xbstep *= (-1);
	ybstep *= (-1);
	mSnd.moveIt(xbstep, ybstep);
	mSnd.getCurrCoords();
}
mSnd.objScaleOwn = function(){
	$.each(uServe.runMapArr(bMap.lbArr), function(i,val){ val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale) });
	$.each(uServe.runMapArr(bMap.storesArr), function(i,val){ val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale) });
	if (bMap.circleArr.length > 0){ $.each(uServe.runMapArr(bMap.circleArr), function(i,val){ val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale) }) }
	if (bMap.siFlagArr.length > 0){ $.each(uServe.runMapArr(bMap.siFlagArr), function(i,val){ val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale) }) }
	if (bMap.flagArr.length > 0){ $.each(uServe.runMapArr(bMap.flagArr), function(i,val){ val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale) }) }
}
mSnd.controlSclButtons = function(switcher){
	if (switcher){
		$("div.scale-plus").removeClass("scale-btn-act").addClass("scale-btn-pass");
		$("div.loop-stick-plus").removeClass("loop-stick-act").addClass("loop-stick-pass");
		$("div.scale-minus").removeClass("scale-btn-pass").addClass("scale-btn-act");
		$("div.loop-stick-minus").removeClass("loop-stick-pass").addClass("loop-stick-act");
	}else{
		if (mSnd.sclCount > 0){ 
			$("div.scale-minus").removeClass("scale-btn-act").addClass("scale-btn-pass");
			$("div.loop-stick-minus").removeClass("loop-stick-act").addClass("loop-stick-pass");
		}else{
			$("div.scale-minus").removeClass("scale-btn-pass").addClass("scale-btn-act");
			$("div.loop-stick-minus").removeClass("loop-stick-pass").addClass("loop-stick-act");	
		}
		if (mSnd.sclCount == 8){
			$("div.scale-plus").removeClass("scale-btn-pass").addClass("scale-btn-act");
			$("div.loop-stick-plus").removeClass("loop-stick-pass").addClass("loop-stick-act");
		}else{
			$("div.scale-plus").removeClass("scale-btn-act").addClass("scale-btn-pass");
			$("div.loop-stick-plus").removeClass("loop-stick-act").addClass("loop-stick-pass");
		}
	}
}
mSnd.txtOxCorr = function(tElem){
	if ($.browser.mozilla){
		if (!(tElem.attr("text").indexOf("\n") > -1) &&
			(tElem.attr("text").charAt(0) == "A" || tElem.attr("text").charAt(1) == "А")){ tElem.translate(.5,0) }
	}else if ($.browser.webkit){ tElem.translate(.31,0) }
}
mSnd.pScale = function(){
	if (mSnd.sclCount <= mSnd.sclLim){			
		mSnd.vscale += (mSnd.sclStep * mSnd.sclTimes);
		$.each(uServe.runMapArr(bMap.textArr), function(i,val){
			for (var j = 0; j < mSnd.sclTimes; j++){ mSnd.fsize[i] *= (1 + mSnd.fpstep) }
			val.attr("font-size", mSnd.fsize[i]);
			val.scale(mSnd.vscale, mSnd.vscale, mSnd.vscale, mSnd.vscale);
			mSnd.txtOxCorr(val);
		});
		bMap.mPointer.scale(mSnd.vscale, mSnd.vscale, mSnd.vscale, mSnd.vscale);
		mSnd.sclCount += mSnd.sclTimes;
		mSnd.getCurrCoords();
		mSnd.controlSclButtons();
		if (bMap.targetOnMap){ bMap.modTarget.hide() }
		mSnd.objScaleOwn();
		// waving zero
		if (bMap.targetOnMap && bMap.varsArr['sclcorr_ox'] != null && bMap.varsArr['sclcorr_oy'] != null){
			mSnd.moveIt(bMap.varsArr['sclcorr_ox'] * mSnd.vscale * mSnd.sclTimes, bMap.varsArr['sclcorr_oy'] * mSnd.vscale * mSnd.sclTimes);
			mSnd.getCurrCoords();
		}
	}
}
mSnd.nScale = function(){
	if (mSnd.sclCount >= 1){
		mSnd.vscale -= (mSnd.sclStep * mSnd.sclTimes);
		if (mSnd.sclCount == 1 || mSnd.sclTimes > 1){
			$.each(uServe.runMapArr(bMap.textArr), function(i,val){
				val.attr("font-size", mSnd.fsizeInit[i]);
				val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale);
				mSnd.fsize[i] = mSnd.fsizeInit[i];
				mSnd.txtOxCorr(val);
			});
		}else{
			$.each(uServe.runMapArr(bMap.textArr), function(i,val){
				mSnd.fsize[i] *= (1 - mSnd.fnstep);
				val.attr("font-size",mSnd.fsize[i]);
				val.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale);
				mSnd.txtOxCorr(val);
			});
		}
		mSnd.objScaleOwn();
		bMap.mPointer.scale(mSnd.vscale,mSnd.vscale,mSnd.vscale,mSnd.vscale);
		mSnd.sclCount -= mSnd.sclTimes;
		mSnd.getCurrCoords();
		mSnd.alignIt();
		if (bMap.targetOnMap && mSnd.sclCount == 0){ bMap.modTarget.show() }
		mSnd.controlSclButtons();
	}
}
mSnd.resetScale = function(switcher){
	if (mSnd.sclCount == 0){ return false }
	if (switcher){
		mSnd.sclTimes = mSnd.sclCount;
		mSnd.nScale();
	}else{
		mSnd.sclCount = 0;
		mSnd.sclTimes = 1;
		mSnd.vscale = 1;
	}
}
/*
 * Dragging Block
 */
mSnd.stopIt = function(){
	$.each(uServe.runMapArr(bMap.lbArr), function(i,val){ val.undrag() });
	$.each(uServe.runMapArr(bMap.storesArr), function(i,val){ val.undrag() });
	if (bMap.circleArr.length > 0){ $.each(uServe.runMapArr(bMap.circleArr), function(i,val){ val.undrag() }) }
	if (bMap.siFlagArr.length > 0){ $.each(uServe.runMapArr(bMap.siFlagArr), function(i,val){ val.undrag() }) }
	$.each(uServe.runMapArr(bMap.textArr), function(i,val){ val.undrag() });
	bMap.mPointer.undrag();
	if (bMap.flagArr.length > 0){ $.each(uServe.runMapArr(bMap.flagArr), function(i,val){ val.undrag() }) }
}
mSnd.start = function(){
	mSnd.x0 = 0;
	mSnd.y0 = 0;
	clearTimeout(mSnd.mfWd);
	mSnd.mtWd = setTimeout(function(){ mSnd.wd = true }, 500);
};
mSnd.move = function(dx,dy){
	if (mSnd.sclCount > 0){
		mSnd.getCurrCoords();
		mSnd.dxt = dx - mSnd.x0;
		mSnd.dyt = dy - mSnd.y0;
		if ((mSnd.xBegCurr >= mSnd.xBegInit && mSnd.dxt > 0) || (mSnd.xEndCurr <= mSnd.xEndInit && mSnd.dxt < 0)){ mSnd.dxt = 0 }
		if ((mSnd.yBegCurr >= mSnd.yBegInit && mSnd.dyt > 0) || (mSnd.yEndCurr <= mSnd.yEndInit && mSnd.dyt < 0)){ mSnd.dyt = 0 }
		if (mSnd.dxt == 0 && mSnd.dyt == 0){ mSnd.stopIt() }else{ mSnd.moveIt(mSnd.dxt, mSnd.dyt) }
		mSnd.x0 = dx;
		mSnd.y0 = dy;
	}
}
mSnd.up = function(){
	clearInterval(mSnd.mtWd);
	mSnd.mfWd = setTimeout(function(){ mSnd.wd = false }, 1000);
};

// Setting up a Map
bMap.setMap = function(){
	bMap.varsArr = [];
	bMap.clearTarget();
	if (bVars.isRoot){
		$.get(addrUrl.svapi("is_root","true"), function(){
			$.getJSON(addrUrl.vapi + "larr,ccoords,canvas_w,canvas_h,nscale,lang,dlang,rccorrox,rccorroy,rlevnames_coords,lev_names,wdir", function(data){
				bMap.varsArr = data;
				bMap.rlevNamesCanvas = Raphael(bMap.varsArr['rlevnames_coords'][0],bMap.varsArr['rlevnames_coords'][1],bMap.varsArr['canvas_w'],bMap.varsArr['canvas_h']);
				$.each(bMap.varsArr['larr'], function(i,val){
					bMap.levNamesArr.push(bMap.rlevNamesCanvas.text(bMap.varsArr['lev_names'][val]['pos'][0],
						bMap.varsArr['lev_names'][val]['pos'][1],bMap.varsArr['lev_names'][val]['name']));
					uServe.end(bMap.levNamesArr).attr({"fill":bMap.levNameTextColor,"font-size":bMap.varsArr['lev_names'][val]['size']});
					if (bMap.varsArr['lev_names'][val]['rotate'] != 0){ uServe.end(bMap.levNamesArr).rotate(bMap.varsArr['lev_names'][val]['rotate']) }
					uServe.end(bMap.levNamesArr).mousedown(function(){ bMap.openLevel(val) });
					paperRoot[val] = Raphael(bMap.varsArr['ccoords'][i][0],bMap.varsArr['ccoords'][i][1],
						bMap.varsArr['canvas_w'] * bMap.varsArr['nscale'] * bMap.varsArr['rccorrox'],
						bMap.varsArr['canvas_h'] * bMap.varsArr['nscale'] * bMap.varsArr['rccorroy'])
				});
				bMap.lbOtp();
				setTimeout(function(){
					bMap.storesOtp();
					bMap.btlOtp();
				}, 400);
				setTimeout(function(){ bMap.targetOtp() }, 1100);
			});
		});
	}else{
		$.getJSON(addrUrl.vapi + "larr,corr_xmap,corr_ymap,canvas_w,canvas_h,lev,sclcorr_ox,sclcorr_oy,lang,dlang,wdir", function(data){
			bMap.varsArr = data;
			paperLevel[bMap.varsArr['lev']] = Raphael(bMap.varsArr['corr_xmap'],bMap.varsArr['corr_ymap'],
				bMap.varsArr['canvas_w'],bMap.varsArr['canvas_h']);
			mSnd.sclBorders();
			bMap.mPointer.attr("stroke","none");
			bMap.lbOtp();
			$.get(addrUrl.api + 15);
			// 1st phase
			setTimeout(function(){ 
				bMap.storesOtp();
				bMap.btlOtp();
			}, 400);
			// 2nd phase
			setTimeout(function(){ 
				bMap.targetOtp();
				mSnd.getTextSize();
			}, 900);
		});
		uBody.showBc();
	}
}