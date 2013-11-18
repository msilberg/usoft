	/*
	 * Scaling and dragging 
	 */
	
	function checkTarget(){
		if ("target" in targetObj){ return true }
		else { return false }
	}
	if (runApi('sclcorrOx')!=0 || runApi('sclcorrOy')!=0){ wzCrit = true }
	function moveIt(mOx,mOy){
		for (var i = 0; i < bckgrArr.length; i++){ bckgrArr[i].translate(mOx, mOy) }
		for (var i = 0; i < areaArr.length; i++){ areaArr[i].translate(mOx, mOy) }
		if (circleArr.length > 0){ for (var i = 0; i < circleArr.length; i++){ circleArr[i].translate(mOx, mOy)} }
		if (siArr.length > 0){ for (var i = 0; i < siArr.length; i++){ siArr[i].translate(mOx, mOy)} }
		for (var i = 0; i < textArr.length; i++){ textArr[i].translate(mOx, mOy) }
		mapPointer.translate(mOx, mOy);
		if (flagArr.length >= 1){ for (var i=0; i < flagArr.length; i++){ flagArr[i].translate(mOx, mOy) } }
	}
	function getCurrCoords(){
		xBegCurr = mapPointer.getBBox().x;
		yBegCurr = mapPointer.getBBox().y;
		xEndCurr = xBegCurr + mw * vscale;
		yEndCurr = yBegCurr + mh * vscale;
	}
	function alignIt(){
		var xbstep, ybstep;
		if (sclCount == 0){
			xbstep = xBegCurr - xBegInit;
			ybstep = yBegCurr - yBegInit;
		}else{
			xbstep = (xBegCurr - xBegInit) / sclCount;
			ybstep = (yBegCurr - yBegInit) / sclCount;
		}
		xbstep *= (-1);
		ybstep *= (-1);
		moveIt(xbstep, ybstep);
		getCurrCoords();
	}
	function objScaleOwn(){
		for (var i = 0; i < bckgrArr.length; i++){ bckgrArr[i].scale(vscale,vscale,vscale,vscale) }
		for (var i = 0; i < areaArr.length; i++){ areaArr[i].scale(vscale,vscale,vscale,vscale) }
		if (circleArr.length > 0){ for (var i = 0; i < circleArr.length; i++){ circleArr[i].scale(vscale,vscale,vscale,vscale)} }
		if (siArr.length > 0){ for (var i = 0; i < siArr.length; i++){ siArr[i].scale(vscale,vscale,vscale,vscale) } }
		if (flagArr.length >= 1){ for (var i=0; i < flagArr.length; i++){ flagArr[i].scale(vscale, vscale, vscale, vscale) } }
	}
	function controlSclButtons(){
		if (sclCount > 0 ){ $("div.scl-minus").removeClass("nscale-act").addClass("nscale-pass") }
		else{ $("div.scl-minus").removeClass("nscale-pass").addClass("nscale-act") }
		if (sclCount == 8){ $("div.scl-plus").removeClass("pscale-pass").addClass("pscale-act") }
		else{ $("div.scl-plus").removeClass("pscale-act").addClass("pscale-pass") }
	}
	function txtOxCorr(i){
		if ($.browser.mozilla){
			if (!(textArr[i].attr("text").indexOf("\n") > -1) &&
				(textArr[i].attr("text").charAt(0) == "A" || textArr[i].attr("text").charAt(0) == "А"))
				{textArr[i].translate(.5,0)}
		}else if ($.browser.webkit){textArr[i].translate(.31,0)}
	}
	for (var i = 0; i < textArr.length; i++){
		fsizeInit.push(parseInt(textArr[i].attr("font-size")));
		fsize.push(parseInt(textArr[i].attr("font-size")));
		tOX.push(textArr[i].getBBox().x);
	}
	function pScale(){
		if (sclCount <= sclLim){
			vscale += (sclStep * sclTimes);
			for (var i = 0; i < textArr.length; i++) {
				for (var j = 0; j < sclTimes; j++){ fsize[i] *= (1 + fpstep) }
				textArr[i].attr("font-size", fsize[i]);
				textArr[i].scale(vscale, vscale, vscale, vscale);
				txtOxCorr(i);
			}
			mapPointer.scale(vscale, vscale, vscale, vscale);
			sclCount += sclTimes;
			if (sclCount == sclTimes){ sclAccum++ }
			getCurrCoords();
			controlSclButtons();
			if (checkTarget()){ targeting.run(sclCount) }
			objScaleOwn();
			if (wzCrit){
				moveIt(sclcorrOx * vscale * sclTimes, sclcorrOy * vscale * sclTimes);
				getCurrCoords();
			}
		}
	}
	function nScale(){
		if (sclCount >= 1){
			vscale -= (sclStep * sclTimes);
			if (sclCount == 1 || sclTimes > 1){
				if (sclAccum <= 1){ vscale *= sclMiddle }
				for (var i = 0; i < textArr.length; i++){
					textArr[i].attr("font-size",fsizeInit[i]);
					textArr[i].scale(vscale,vscale,vscale,vscale);
					fsize[i] = fsizeInit[i];
					txtOxCorr(i);
				}
			}else{
				for (var i = 0; i < textArr.length; i++){
					fsize[i] *= (1 - fnstep);
					textArr[i].attr("font-size",fsize[i]);
					textArr[i].scale(vscale,vscale,vscale,vscale);
					txtOxCorr(i);
				}
			}
			objScaleOwn();
			mapPointer.scale(vscale,vscale,vscale,vscale);
			sclCount -= sclTimes;
			getCurrCoords();
			alignIt();
			if (checkTarget()){ targeting.run(sclCount) }
			controlSclButtons();
		}
	}
	$("div.scl-plus").mousedown(function(){
		pprsLong = setTimeout(function(){
			sclTimes = sclLim - sclCount + 1;
			pScale();
		},1000)
	}).mouseup(function(){
		clearTimeout(pprsLong);
		sclTimes = 1;
		pScale();
	});
	$("div.scl-minus").mousedown(function(){
		nprsLong = setTimeout(function(){
			sclTimes = sclCount;
			nScale();
		},1000)
	}).mouseup(function(){
		clearTimeout(nprsLong);
		sclTimes = 1;
		nScale();
	});
	// the dragging
	var x0, y0, dx, dy, dxt, dyt, xBegCurr, yBegCurr, xEndCurr, yEndCurr;
	var mw = 1127;
	var mh = 645;
	var xBegInit = mapPointer.getBBox().x;
	var yBegInit = mapPointer.getBBox().y;
	var xEndInit = xBegInit + mw;
	var yEndInit = yBegInit + mh;
	
	function stopIt(){
		for (var i = 0; i < bckgrArr.length; i++){bckgrArr[i].undrag()}
		for (var i = 0; i < areaArr.length; i++){areaArr[i].undrag()}
		if (circleArr.length > 0){ for (var i = 0; i < circleArr.length; i++){circleArr[i].undrag()} }
		if (siArr.length > 0){ for (var i = 0; i < siArr.length; i++){siArr[i].undrag()} }
		for (var i = 0; i < textArr.length; i++){textArr[i].undrag()}
		mapPointer.undrag();
		if (typeof(flag) != "undefined"){flag.undrag()}
		if (flagArr.length >= 1){ for (var i=0; i < flagArr.length; i++){ flagArr[i].undrag() } }
	}
	
	var start = function(){
		x0 = 0;
		y0 = 0;
		clearTimeout(mfWd);
		mtWd = setTimeout(function(){ wd = true },500);
	},move = function(dx,dy){
		if (sclCount > 0){
			getCurrCoords();
			dxt = dx - x0;
			dyt = dy - y0;
			if (
				(xBegCurr >= xBegInit && dxt > 0) ||
				(yBegCurr >= yBegInit && dyt > 0) ||
				(xEndCurr <= xEndInit && dxt < 0) ||
				(yEndCurr <= yEndInit && dyt < 0) 
			){stopIt()}
			else{moveIt(dxt, dyt)}
			x0 = dx;
			y0 = dy;
		}
	},up = function(){
		clearInterval(mtWd);
		mfWd = setTimeout(function(){ wd = false },1000);
	};
	for (var i = 0; i < bckgrArr.length; i++){ bckgrArr[i].drag(move, start, up) }
	for (var i = 0; i < areaArr.length; i++){ areaArr[i].drag(move, start, up) }
	if (circleArr.length > 0){ for (var i = 0; i < circleArr.length; i++){ circleArr[i].drag(move, start, up) } }
	if (siArr.length > 0){ for (var i = 0; i < siArr.length; i++){ siArr[i].drag(move, start, up) } }
	for (var i = 0; i < textArr.length; i++){ textArr[i].drag(move, start, up) }
	mapPointer.drag(move, start, up);
	if (flagArr.length >= 1){ for (var i=0; i < flagArr.length; i++) { flagArr[i].drag(move, start, up) } }
