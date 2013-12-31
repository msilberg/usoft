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
bVars.scrsRunInterval = 95e3;
bVars.ocrLimiter = false; // open call request limiter
bVars.scrsStore = null;
// Mapping vars
bVars.maxScale = 4;
bVars.zoomSup = 10;
bVars.somCrit = false;
bVars.openOrigin = null;
bVars.mIdArr = [];
bVars.chsmIdArr = [];
bVars.mArr = [];
bVars.tMapMove = null;
/**
 * Contains current module ID.
 * @type Number
 */
bVars.moduleId = 0;
/**
 * Contains array of modules coordinate pairs.
 * @type Array
 */
bVars.moduleCoords = {
    35: {x: 36.304408555408, y: 50.003896349536}
    , 36: {x: 36.308293281479, y: 50.004126987207}
    , 37: {x: 36.310059173938, y: 50.006908617281}
    , 39: {x: 36.297443416462, y: 50.001083268871}
};
bMap.stCoords = [];
bMap.chmCoords = [];
bMap.ppCoords = [];
bMap.path = null;

// Server addressing variables
var addrUrl = {};
addrUrl.base = "http://uadmin.no-ip.biz/";
//addrUrl.base = "http://192.167.1.2/unavimp/";
addrUrl.startApi = addrUrl.base + "api.php";
addrUrl.urlBckgr = addrUrl.base + "config/1003/mod/bismall.txt";
addrUrl.api = addrUrl.startApi + "?query=";
addrUrl.vapi = addrUrl.startApi + "?var=";
addrUrl.markers = function() {
    var e = bMap.map.getExtent();
    return"http://uadmin.no-ip.biz:8080/geo?SERVICE=UniqoomAPI&REQUEST=milestone&TCID=1003&X1="
//    return"http://192.167.1.2:8080/geo?SERVICE=UniqoomAPI&REQUEST=milestone&TCID=1003&X1="
            + e["left"] + "&X2=" + e["right"] + "&Y1=" + e["bottom"] + "&Y2=" + e["top"]
            + "&jsoncallback=?"
};
addrUrl.svapi = function(e, t) {
    return addrUrl.startApi + "?setvar&name=" + e + "&val=" + t
};
addrUrl.loadBlock = function(e) {
    return addrUrl.api + "1&block=" + e
};
addrUrl.getLbl = function(e) {
    return addrUrl.api + "2&lbl=" + e
};
addrUrl.getStoreCat = function(e) {
    return addrUrl.api + "8&sch=" + e
};
addrUrl.checkFeature = function(e, t) {
    return addrUrl.api + "17&store=" + e + "&feat=" + t
};
addrUrl.getSCName = function(e) {
    return addrUrl.api + "4&cname=" + e
};
addrUrl.getPrmSt = function() {
    return addrUrl.api + 5
};
addrUrl.getSchId = function() {
    return addrUrl.api + 6
};
addrUrl.getScatName = function() {
    return addrUrl.api + 7
};
addrUrl.getJS = function(e) {
    return addrUrl.base + "js/" + e + ".js"
};
addrUrl.getFCatId = function() {
    return addrUrl.api + 12
};
addrUrl.getIcon = function(e) {
    return"url(" + addrUrl.base + "graphics/icons/mod/" + e + ".png)"
};
addrUrl.getStandBySt = function() {
    return addrUrl.api + 23
};
addrUrl.getImage = function(e, t) {
    if (!t) {
        t = "png"
    }
    return"url(" + addrUrl.base + "graphics/" + e + "." + t + ")"
};
addrUrl.getCImage = function(e, t) {
    if (!t) {
        t = "png"
    }
    return addrUrl.base + "graphics/" + e + "." + t
};
addrUrl.getMCoords = function() {
    return addrUrl.api + 19
};
addrUrl.getSi = function(e) {
    return addrUrl.api + "24&sich=" + e
};
uServe.arrayKeys = function(e, t, n) {
    var r = new Array, n = !!n, i = true, s = 0;
    for (key in e) {
        i = true;
        if (t != undefined) {
            if (n && e[key] !== t) {
                i = false
            } else if (e[key] != t) {
                i = false
            }
        }
        if (i) {
            r[s] = key;
            s++
        }
    }
    return r
};
uServe.arrayEnd = function(e) {
    var t, n;
    if (e.constructor === Array) {
        t = e[e.length - 1]
    } else {
        for (n in e) {
            t = e[n]
        }
    }
    return t
};
uServe.inArray = function(e, t) {
    if ($.inArray(e, t) == -1) {
        return false
    } else {
        return true
    }
};
uServe.end = function(e) {
    var t, n;
    if (e.constructor === Array) {
        t = e[e.length - 1]
    } else {
        for (n in e) {
            t = e[n]
        }
    }
    return t
};
uServe.toggleMap = function(e) {
    if (e) {
        $("div#smap").show();
        $("div#scl-cnt").show();
        uServe.markerAboveBckgr();
    } else {
        $("div#smap").hide();
        $("div#scl-cnt").hide();
        uBody.toggleAddCbtn();
    }
};
uServe.toggleListBtn = function(e) {
    if (bVars.showTTS && e && !$("div.show-st-list").is(":visible")) {
        $("div.show-st-list").show()
    } else if (!e && $("div.show-st-list").is(":visible")) {
        $("div.show-st-list").hide()
    }
};
uServe.arrSub = function(e, t) {
    var n = $.grep(e, function(e) {
        return $.inArray(e, t) < 0
    });
    return n
};
uServe.addNewMarker = function(e, t) {
    var n, r, i, s, o, u;
    var a = [];
    var f = (new OpenLayers.LonLat(e["x"], e["y"])).transform(new OpenLayers.Projection("EPSG:4326"), bMap.map.getProjectionObject());
    switch (t) {
        case 1:
            o = bMap.markers;
            r = new OpenLayers.Size(bVars.omSize["w"], bVars.omSize["h"]);
            s = "";
            a = bVars.mIdArr;
            u = true;
            break;
        case 2:
            o = bMap.chsMarker;
            r = new OpenLayers.Size(bVars.chmSize["w"], bVars.chmSize["h"]);
            s = "a";
            a = bVars.mIdArr;
            u = false;
            break;
        case 3:
            o = bMap.catChsMarkers;
            r = new OpenLayers.Size(bVars.catChmSize["w"], bVars.catChmSize["h"]);
            s = "a";
            a = bVars.chsmIdArr;
            if (isNaN(e["cc"]) || typeof e["cc"] == "undefined" || e["cc"] == null) {
                u = false
            } else {
                u = e["cc"]
            }
            break
    }
    if (isNaN(e["icat"]) || e["icat"] == 0 || e["icat"] == null) {
        n = 16
    } else {
        n = e["icat"]
    }
    if (typeof e["store"] == "undefined") {
        i = bVars.store
    } else {
        i = parseFloat(e["store"])
    }
    var iconURI = null;
    if (t === 3) {
        iconURI = addrUrl.base + "graphics/cmi/top-10.png";
    } else {
        iconURI = addrUrl.base + "graphics/cmi/mod/" + n + s + ".png";
    }
    var l = new OpenLayers.Icon(
        iconURI
        , r
        , new OpenLayers.Pixel(-(r.w / 2), -r.h)
    );
    var c = new OpenLayers.Marker(f, l);
    c.events.register("mousedown", o, function(e) {
        uBody.openMinisite(i, u);
        uServe.respiteSCS();
        OpenLayers.Event.stop(e)
    });
    c.planeID = i;
    o.addMarker(c);
    bVars.mArr.push(c);
    a.push(i)
};
uServe.resetGsNum = function() {
    bVars.slBtnStepCount = 0
};
uServe.markerAboveBckgr = function() {
    var e = parseFloat(bMap.bckgrIcons.getZIndex());
    if (typeof bMap.markers != "undefined" && e > parseFloat(bMap.markers.getZIndex())) {
        bMap.markers.setZIndex(e + 8)
    }
    if (typeof bMap.ppm != "undefined" && e > parseFloat(bMap.ppm.getZIndex())) {
        bMap.ppm.setZIndex(e + 9)
    }
    if (typeof bMap.chsMarker != "undefined" && e > parseFloat(bMap.chsMarker.getZIndex())) {
        bMap.chsMarker.setZIndex(e + 10)
    }
    if (typeof bMap.catChsMarkers != "undefined" && e > parseFloat(bMap.catChsMarkers.getZIndex())) {
        bMap.catChsMarkers.setZIndex(e + 11)
    }
};
uServe.toggleBckgr = function() {
    if (bMap.map.getZoom() >= bVars.bgThreshold) {
        bVars.bgPointer = 1
    } else {
        bVars.bgPointer = 0
    }
    if (bVars.bgPointer != bVars.bgTail) {
        if (bVars.bgPointer > bVars.bgTail) {
            addrUrl.urlBckgr = addrUrl.base + "config/1003/mod/binormal.txt"
        } else {
            addrUrl.urlBckgr = addrUrl.base + "config/1003/mod/bismall.txt"
        }
        bMap.map.removeLayer(bMap.bckgrIcons);
        delete bMap.bckgrIcons;
        bMap.setBckgrIcons();
        uServe.markerAboveBckgr()
    }
    bVars.bgTail = bVars.bgPointer
};
uServe.loadSlider = function(e) {
    var t = true;
    $("div.close-wall").off("mousedown").mousedown(function() {
        uBody.closeWall(true)
    });
    clearTimeout(bVars.tLoadSlider);
    bVars.tLoadSlider = setTimeout(function() {
        if (!($("div.ls-cont").length > 0)) {
            $("td.mw").append("<div class='ls-cont' style='display:none;'></div>")
        } else {
            $("div.ls-cont").hide()
        }
        $("div.ls-cont").load(addrUrl.loadBlock("slider"), function() {
            $.getJSON(addrUrl.vapi + "slides_num,gs_num", function(e) {
                if (!($("div.list-cont").length > 0)) {
                    $("div.ls-cont").remove();
                    return false
                } else if ($("div.list-cont").is(":hidden")) {
                    t = false
                }
                bVars.slideLimit = e["slides_num"];
                bVars.gsLimit = e["gs_num"];
                bVars.countSlide = 0;
                bVars.prevCountSlide = 0;
                uBody.storesListThumb(0, true);
                switch (bVars.slType) {
                    case 1:
                        $("div.ls-cont").attr("id", "lsbtn-scats");
                        break;
                    case 2:
                        $("div.back2scat").mousedown(function() {
                            if (bVars.showTTS) {
                                uBody.showTTstores()
                            } else {
                                uBody.scatsWall(bVars.cat)
                            }
                        });
                        $("div.ls-cont").attr("id", "lsbtn-stores");
                        break;
                    case 3:
                        $("div.ls-cont").attr("id", "lsbtn-sch");
                        break;
                    case 5:
                        $("div.ls-cont").attr("id", "lsbtn-si");
                        break
                }
                if (t) {
                    $("div.ls-cont").fadeIn(200)
                }
                if (!($("div.close-wall").length > 0) && $("div.rst-list-cont").length > 0) {
                    $("div.list-cont").append("<div class='subcat-container subcat-container-" + bMap.varsArr["wdir"] + "'></div>");
                    $.get(addrUrl.loadBlock("wallheader"), function(e) {
                        $("div.subcat-container").append(e);
                        $("div.close-wall").mousedown(function() {
                            uBody.closeWall(true)
                        })
                    })
                }
                uBody.dragHandler();
                uBody.slBtnDragHandler()
            })
        })
    }, 500)
};
uServe.chmEx = function() {
    if (typeof bMap.catChsMarkers != "undefined" && bVars.chsmIdArr.length > 0) {
        return true
    } else {
        return false
    }
};
uServe.markSchList = function() {
    if (!($("div#schlist").length > 0)) {
        return false
    }
    if ($("div#schlist").is(":visible")) {
        $("div#schlist").append("<input type='hidden' class='shw-sch-list' />")
    }
};
uServe.showHiddenMarker = function(e) {
    var t = false;
    for (var n in bVars.mArr) {
        if (bVars.mArr[n].planeID == bVars.store && bVars.mArr[n].onScreen()) {
            t = true
        }
    }
    if (t) {
        bMap.map.zoomToMaxExtent()
    } else {
        bMap.map.moveTo(new OpenLayers.LonLat(e["x"], e["y"]), bVars.rootScale)
    }
};
uServe.controlSclBtns = function() {
    var e = bMap.map.getZoom();
    if (e > 0) {
        $("div.olControlZoomOutItemInactive").removeClass("scl-btn-act").addClass("scl-btn-pass")
    } else {
        $("div.olControlZoomOutItemInactive").removeClass("scl-btn-pass").addClass("scl-btn-act")
    }
    if (e < bVars.zoomSup - 1) {
        $("div.olControlZoomInItemInactive").removeClass("scl-btn-act").addClass("scl-btn-pass")
    } else {
        $("div.olControlZoomInItemInactive").removeClass("scl-btn-pass").addClass("scl-btn-act")
    }
};
uServe.rotateAL = function() {
    $("div.pb-icon>div:eq(0)").rotate({angle: 0, animateTo: 360, callback: uServe.rotateAL, easing: function(e, t, n, r, i) {
            return r * (t / i) + n
        }})
};
uServe.setBrwsPref = function() {
    if ($.browser.mozilla) {
        bVars.brwsPref = "-moz-"
    } else if ($.browser.webkit) {
        bVars.brwsPref = "-webkit-"
    }
};
uServe.detectCaret = function() {
    var e = document.getElementById("sch-area");
    if (e.selectionStart || e.selectionStart == "0") {
        bVars.shcPnt = e.selectionStart
    }
};
uServe.moveCaret2End = function() {
    var e = document.getElementById("sch-area");
    e.selectionStart = e.selectionEnd = bVars.shcPnt = e.value.length
};
uServe.runCaretLeft = function() {
    if (bVars.shcPnt == 0) {
        return false
    }
    var e = document.getElementById("sch-area");
    e.selectionStart = e.selectionEnd = --bVars.shcPnt
};
uServe.runCaretRight = function() {
    var e = document.getElementById("sch-area");
    if (bVars.shcPnt == e.value.length) {
        return false
    }
    e.selectionStart = e.selectionEnd = ++bVars.shcPnt
};
uServe.toggleLsContBckgr = function(e, t) {
    if (e) {
        $("div.list-cont").css("background-image", addrUrl.getImage("ajax-loader_mod", "gif"));
        if (!t) {
            $("div.ls-cont").remove()
        }
    } else {
        $("div.list-cont").css("background-image", "none")
    }
};
uServe.respiteSCS = function(e) {
    clearTimeout(bVars.makeAtClickFalse);
    bVars.atClick = true;
    bVars.makeAtClickFalse = setTimeout(function() {
        bVars.atClick = false
    }, 12e4);
    uBody.closeScrsAnime(e)
};
uServe.screenSaver = function() {
    setInterval(function() {
        if (!bVars.atClick) {
            if (bMap.varsArr["lang"] != bMap.varsArr["dlang"]) {
                uServe.changeLang(bMap.varsArr["dlang"])
            } else {
                if (uServe.chmEx() && bVars.pmType != 3 || bMap.map.getZoom() > 0 || $("textarea.sch-field").val().length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0 || $("div#smap").attr("style") > 0 || typeof bMap.ppm != "undefined" || $("div.olPopup").length > 0 || $("div.msg-box").is(":visible") || $("div.ui-keyboard").is(":visible")) {
                    uBody.back2root()
                } else if (!uServe.chmEx()) {
                    uBody.toggleMapBtn(true);
                    uBody.showStandByStores()
                }
                $.get(addrUrl.api + 21, function(e) {
                    if (parseInt(e) > 0) {
                        uBody.runScrsAnime()
                    }
                })
            }
        }
    }, 1e4)
};
uServe.animeClick = function() {
    uBody.closeScrsAnime();
    uBody.openMinisite(bVars.scrsStore, true)
};
uServe.showScrsAnime = function(e, t) {
    if (typeof e == "undefined" || typeof t == "undefined") {
        return false
    }
    var n = (window.innerWidth - t["width"]) / 2;
    var r = (window.innerHeight - t["height"]) / 2;
    $.get(addrUrl.svapi("scrslast", e), function() {
        bVars.scrsStore = e;
        $(".scrs-anime-layer>div").off("mousedown", uServe.animeClick).hide();
        $("div.scrs-comm").off("mousedown", uServe.animeClick).hide();
        if ($("div.video-player-scrs").length > 0) {
            $("div.video-player-scrs").remove()
        }
        if (t["type"] == "anime") {
            $("div.sa" + e).css({top: r + "px", left: n + "px", width: t["width"] + "px", height: t["height"] + "px"}).show().on("mousedown", uServe.animeClick);
            $("div.sa" + e + ">div").removeAttr("style").show()
        } else if (t["type"] == "comm") {
            $("div.scrs-comm").css({top: r + "px", left: n + "px", width: t["width"] + "px", height: t["height"] + "px"}).show().on("mousedown", uServe.animeClick);
            uBody.openScrsVideo(e, t)
        }
    })
};
uServe.scrsAnime = function() {
    var e = 1;
    var t = [];
    var n = [];
    var r = false;
    $.getJSON(addrUrl.api + 20, function(r) {
        $.each(r, function(e, r) {
            t.push(parseFloat(e));
            n.push(r)
        });
        setTimeout(function() {
            uServe.showScrsAnime(t[0], n[0])
        }, 500);
        bVars.runScrs = setInterval(function() {
            uServe.showScrsAnime(t[e], n[e]);
            e++;
            if (e + 1 > r.length) {
                clearInterval(bVars.runScrs)
            }
        }, bVars.scrsRunInterval)
    })
};
uBody.runScrsAnime = function() {
    if ($("div.scrs-cont").length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0) {
        return false
    }
    var e = 2e3;
    uBody.togglePB(true);
    $("td.mw").append("<div class='scrs-cont'></div>");
    $("div.scrs-cont").load(addrUrl.loadBlock("screensaver"), function() {
        $("div.pb-icon-cont").hide();
        $("div.scrs-cont").on("mousedown", uBody.closeScrsAnime);
        $("div.scrs-cls-btn").on("mousedown", uBody.closeScrsAnime)
    });
    uServe.scrsAnime();
    $.get(addrUrl.api + 21, function(t) {
        bVars.runScrsQueue = setInterval(function() {
            uServe.scrsAnime()
        }, bVars.scrsRunInterval * parseFloat(t) + e)
    })
};
uBody.closeScrsAnime = function(e) {
    if ($("div.scrs-cont").length > 0) {
        $("div.scrs-cont").remove()
    }
    if (!e) {
        $("div.total-pb-bckgr").off("mousedown", uBody.closeScrsAnime);
        uBody.togglePB()
    }
    clearTimeout(bVars.startScrs);
    clearInterval(bVars.runScrsQueue);
    clearInterval(bVars.runScrs)
};
uBody.closePlayer = function() {
    if ($("div.video-player").length == 0) {
        return false
    }
    $("div.video-player").remove();
    $("div.video-close").remove();
    $("div.total-pb-bckgr").off("mousedown", uBody.closePlayer);
    uBody.togglePB();
    if (bVars.singleTrailer) {
        uBody.closeVideo()
    }
};
uBody.openPlayer = function(e) {
    var t = 36;
    var n, r, i;
    uBody.togglePB(true);
    $.getJSON(addrUrl.api + 14, function(s) {
        $("div.pb-icon-cont").hide();
        n = addrUrl.base + "stores/" + s["tc"] + "/" + s["store"] + "/videos/mod/";
        $("body").append("<div class='video-player'><div id='videoplayer7267'></div></div><div class='video-close'></div>");
        $("div.video-player").on("mousedown", function() {
            return false
        });
        $("div.video-close").on("mousedown", uBody.closePlayer);
        $("div.total-pb-bckgr").on("mousedown", uBody.closePlayer);
        r = (window.innerHeight - s["height"]) / 2;
        i = (window.innerWidth - s["width"]) / 2;
        $("div.video-player").css({top: r + "px", left: i + "px"});
        $("div.video-close").css({top: r - t + "px", left: i + s["width"] - t + "px"});
        $.getScript(addrUrl.base + "js/swfobject.js", function() {
            var t = {comment: "uniqoom", st: n + "video55-1659.txt", file: n + e + ".flv"};
            var r = {wmode: "transparent", allowFullScreen: "true", allowScriptAccess: "always", id: "videoplayer7267"};
            new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf", "videoplayer7267", s["width"], s["height"], "9.0.115.0", false, t, r)
        })
    })
};
uBody.openVideo = function() {
    uBody.closeTopTen();
    $("div.video-btn").removeClass("sm-btn-pass").addClass("sm-btn-act").off("mousedown", uBody.openVideo);
    setTimeout(function() {
        $("div.video-btn").on("mousedown", uBody.closeVideo)
    }, 500);
    $.get(addrUrl.api + 13, function(e) {
        if (parseFloat(e) > 1) {
            $("div.showcase").hide();
            $("div.pct-uplayer").append("<div class='video-layer'></div>");
            $("div.video-layer").load(addrUrl.loadBlock("vtrailers"), function() {
                $("div.vtrailer-icon").click(function() {
                    uBody.openPlayer($(this).attr("id"))
                })
            })
        } else {
            uBody.openPlayer(1);
            bVars.singleTrailer = true
        }
    })
};
uBody.closeVideo = function() {
    $("div.video-btn").removeClass("sm-btn-act").addClass("sm-btn-pass").off("mousedown", uBody.closeVideo);
    setTimeout(function() {
        $("div.video-btn").on("mousedown", uBody.openVideo)
    }, 500);
    $("div.video-layer").remove();
    if ($("div.showcase").is(":hidden")) {
        $("div.showcase").show()
    }
    bVars.singleTrailer = false
};
uBody.openScrsVideo = function(e, t) {
    var n;
    $.getJSON(addrUrl.vapi + "tc", function(r) {
        n = addrUrl.base + "stores/" + r["tc"] + "/" + e + "/videos/mod/";
        $("div.scrs-comm").append("<div class='video-player-scrs'><div id='videoplayer7267'></div></div>");
        $.getScript(addrUrl.getJS("swfobject"), function() {
            var e = {comment: "uniqoom", st: n + "video55-1659.txt", file: n + t["no"] + ".flv"};
            var r = {wmode: "transparent", allowFullScreen: "true", allowScriptAccess: "always", id: "videoplayer7267"};
            new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf", "videoplayer7267", t["width"], t["height"], "9.0.115.0", false, e, r)
        })
    })
};
uBody.showDDList = function(e) {
    $.get(addrUrl.svapi("listtype", e), function() {
        uBody.togglePB(true);
        $("div.pb-icon-cont").hide();
        if ($("div.ddl-cont").length > 0) {
            $("div.ddl-cont").show();
            return false
        }
        $("td.mw").append("<div class='ddl-cont'></div>");
        $("div.ddl-cont").load(addrUrl.loadBlock("ddlist"), function() {
            var e = (window.innerHeight - $("div.ddl-layer").height()) / 2;
            $("div.ddl-layer").css({left: (window.innerWidth - $("div.ddl-layer").width()) / 2 + "px", top: e + "px"});
            $("div.ddl-layer-frame>ul>li").mousedown(function() {
                webWall.webWallSelectCatalogue(parseInt($(this).attr("id")));
                $("div.ddl-layer-frame>ul>li>div").removeClass("ddl-act");
                $(this).children("div").addClass("ddl-act");
                $("div.ttbh-frame>div").text($(this).children("div").attr("id"));
                uBody.closeDDList(true)
            });
            $("div.ddl-cls-btn").css("top", e).on("mousedown", uBody.closeDDList);
            $("div.total-pb-bckgr").on("mousedown", uBody.closeDDList)
        })
    })
};
uBody.closeDDList = function(e) {
    if (!($("div.ddl-cont").length > 0)) {
        return false
    }
    if (e) {
        $("div.ddl-cont").hide()
    } else {
        $("div.ddl-cont").remove();
        $("div.total-pb-bckgr").off("mousedown", uBody.closeDDList)
    }
    uBody.togglePB()
};
uBody.openTopTen = function() {
    $.getJSON(addrUrl.getFCatId(), function(e) {
        if (!e) {
            return false
        }
        $("div.pct-uplayer").hide();
        $("div.top10-btn").removeClass("sm-btn-pass").addClass("sm-btn-act").off("mousedown", uBody.openTopTen).on("mousedown", uBody.closeTopTen);
        $("td.mw").append("<div class='tt-cont'></div>");
        $("div.tt-cont").load(addrUrl.loadBlock("wall"), function() {
            webWall.initV2(0, 63, "ru", "uadmin.no-ip.biz:8080", parseInt(e), 789, 522, 5, 2);
            if ($("div.ttcat-btn-header").attr("id") == "ttbh-bckgr-pass") {
                $("div.ttcat-btn-header").mousedown(function() {
                    uBody.showDDList("ttcat")
                })
            }
        })
    })
};
uBody.closeTopTen = function() {
    if (!($("div.tt-cont").length > 0)) {
        return false
    }
    $("div.top10-btn").removeClass("sm-btn-act").addClass("sm-btn-pass").off("mousedown", uBody.closeTopTen).on("mousedown", uBody.openTopTen);
    $("div.tt-cont").remove();
    $("div.pct-uplayer").show();
    uBody.closeDDList()
};
uBody.closeMinisite = function(e, t, n) {
    if ($("div.minisite-cont").length < 1) {
        return false
    }
    if (e) {
        if (uServe.chmEx()) {
            var r;
            if ($.browser.webkit) {
                r = " "
            }
            if (bVars.pmType == 1 && $("div.rst-list-cont").length > 0 && $("div.rst-list-cont").attr("style") != "display: none;" + r || bVars.pmType == 2 && $("input.shw-sch-list").length > 0) {
                $("div.list-cont").show();
                $("div.ls-cont").show();
                uBody.toggleSlTr(true);
                t = true
            } else {
                uServe.toggleListBtn(true)
            }
            if (bVars.pmType == 2) {
                uBody.makeCbtnPass()
            }
        } else if (!n) {
            uBody.toggleCbtn();
            uBody.makeCbtnPass();
            bMap.clearStore();
            uBody.toggleMapBtn();
            uBody.closeWall(true);
        }
        uBody.closeTopTen();
        $("div.minisite-cont").remove()
    } else {
        $("div.minisite-cont").hide()
    }
    if (!t) {
        uServe.toggleMap(true);
    }
    $("div.bann-cell").removeClass("bann-act").addClass("bann-pass")
};
uBody.loadMinisite = function(e, t) {
    if (!($("div.minisite-cont").length > 0)) {
        $("td.mw").append("<div class='minisite-cont'></div>")
    }
    uBody.toggleMapBtn(true);
    $("div.minisite-cont").load(addrUrl.loadBlock("minisite"), function() {
        if ($("div.info-content").height() > 135) {
            $("div.info-content").css({"overflow-y": "scroll", "overflow-x": "hidden", "max-width": "720px", "padding-right": "15px"})
        } else {
            $("div.info-content").css({overflow: "hidden", "max-width": "723px", padding: "0px"})
        }
        $("div.cls-btn-cross").mousedown(function() {
            if (e == 0) {
                uBody.back2root();
                return false
            }
            if (bVars.pmType == 2) {
                uBody.toggleCbtn()
            }
            uBody.closeMinisite(true)
        });
        $("div.storemap-btn").mousedown(function() {
            if (e == 0) {
                uBody.back2root()
            } else {
                bMap.storeOnMap()
            }
        });
        if ($("div.top10-btn").length > 0) {
            $("div.top10-btn").on("mousedown", uBody.openTopTen)
        }
        if ($("div.video-btn").length > 0) {
            $("div.video-btn").on("mousedown", uBody.openVideo)
        }
    })
};
uBody.openMinisite = function(e, t) {
    if (bVars.dragCrit) {
        return false;
    }
    uServe.toggleMap();
    if (t) {
        uBody.toggleCbtn();
    }
    uServe.markSchList();
    uBody.closeWall();
    uServe.toggleListBtn(false);
    bMap.clearPopupMarkers();
    uBody.leaveFullcsreen();
    bMap.clearBckgrIcons();
    uBody.closeTopTen();
    uBody.closeSi();
    bMap.clearStore();
    if ($("div.minisite-cont").length > 0) {
        if (bVars.store == e) {
            $("div.minisite-cont").show();
            uBody.toggleMapBtn(true);
            return false
        } else {
            $("div.minisite-cont").remove()
        }
    }
    bVars.store = parseFloat(e);
    $.get(addrUrl.svapi("store", bVars.store), function() {
        if (bVars.store == 0) {
            uBody.loadMinisite(bVars.store);
            uBody.toggleCbtn();
            uBody.makeCbtnPass();
            return false
        }
        if (t) {
            $.get(addrUrl.getStoreCat(bVars.store), function(e) {
                uBody.makeCbtnPass();
                if (isNaN(e)) {
                    bVars.cat = 16;
                    uBody.makeCbtnAct()
                } else {
                    bVars.cat = parseFloat(e);
                    if (uServe.inArray(bVars.cat, bVars.specCat)) {
                        uBody.makeCbtnAct()
                    } else {
                        uBody.toggleCbtn(true)
                    }
                }
                bVars.divcbtnNo = bVars.cat;
                uBody.loadMinisite(bVars.store);
                if (bVars.pmType !== 2) {
                    bMap.clearChsMarkers();
                }
            })
        } else {
            uBody.loadMinisite(bVars.store)
        }
        if (uServe.chmEx()) {
            bVars.openOrigin = 1
        } else {
            bVars.openOrigin = 2
        }
    })
};
bMap.setMarkers = function() {
    var e;
    var t = [];
    var n = [];
    $.getJSON(addrUrl.markers(), function(r) {
        t.length = 0;
        $.each(r, function(n, r) {
            $.each(r, function(n, r) {
                e = parseFloat(n);
                if (uServe.chmEx() && uServe.inArray(e, bVars.chsmIdArr) || bVars.somCrit && e == bVars.store || typeof bMap.ppm != "undefined" && r[2] == bMap.varsArr["bankers"]) {
                    return true
                }
                if (!uServe.inArray(e, bVars.mIdArr)) {
                    uServe.addNewMarker({x: r[0], y: r[1], icat: r[2], store: e}, 1)
                }
                t.push(e)
            })
        });
        n = uServe.arrSub(bVars.mIdArr, t);
        if (n.length > 0) {
            $.each(n, function(e, t) {
                if (t == bVars.store) {
                    return true
                }
                for (var n in bVars.mArr) {
                    if (bVars.mArr[n].planeID == t) {
                        bMap.markers.removeMarker(bVars.mArr[n]);
                        bVars.mArr.splice(n, 1)
                    }
                }
            })
        }
        bVars.mIdArr = t
    })
};
bMap.clearBckgrIcons = function() {
    if (!($("div.olPopup").length > 0)) {
        return false
    }
    $("div.olPopup").remove()
};
bMap.setBckgrIcons = function() {
    if (typeof bMap.bckgrIcons != "undefined") {
        return false
    }
    bMap.bckgrIcons = new OpenLayers.Layer.Vector("POIs", {strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})], protocol: new OpenLayers.Protocol.HTTP({url: addrUrl.urlBckgr, format: new OpenLayers.Format.Text})});
    bMap.map.addLayer(bMap.bckgrIcons);
    bMap.selectControl = new OpenLayers.Control.SelectFeature(bMap.bckgrIcons);
    bMap.map.addControl(bMap.selectControl);
    bMap.selectControl.activate();
    bMap.bckgrIcons.events.on({featureselected: uBody.onFeatureSelect, featureunselected: uBody.onFeatureUnselect})
};
bMap.showPopup = function(e, t) {
    var n = 400;
    var r = 200;
    var i = new OpenLayers.Popup("mod-popup", new OpenLayers.LonLat(e, t), new OpenLayers.Size(n, r), "<canvas id='myCanvas' width='" + n + "' height='" + r + "'></canvas>", true);
    i.setBackgroundColor("transparent");
    bMap.map.addPopup(i);
    $("div.olPopupCloseBox").css({top: "17px", right: "34px", width: "64px", height: "64px", "background-image": addrUrl.getImage("cls_popup_inv")});
    var s = document.getElementById("myCanvas");
    var o = s.getContext("2d");
    var u = 34;
    var a = 85;
    var f = 205;
    $.get(addrUrl.getLbl(134), function(e) {
        o.beginPath();
        o.moveTo(3, 3);
        o.lineWidth = 5;
        o.lineTo(100, 45);
        o.lineTo(360, 45);
        o.lineTo(360, 180);
        o.lineTo(50, 180);
        o.lineTo(50, 100);
        o.lineTo(3, 2);
        o.fillStyle = "#4b6370";
        o.fill();
        o.font = "18pt Verdana";
        o.textAlign = "center";
        o.fillStyle = "#c9e12d";
        $.each(e.split("/"), function(e, t) {
            o.fillText(t, f, a + u * e)
        });
        o.strokeStyle = "#c9e12d";
        o.stroke()
    })
};
bMap.clearPopupMarkers = function() {
    if (typeof bMap.ppm == "undefined") {
        return false
    }
    bMap.map.removeLayer(bMap.ppm);
    delete bMap.ppm;
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.ppCoords, function(e, t) {
            uServe.addNewMarker({x: t["x"], y: t["y"], icat: t["icat"], store: t["id"]}, 1)
        })
    }
    bMap.ppCoords.length = 0
};
bMap.setPopupMarkers = function(e) {
    if (typeof bMap.ppm != "undefined") {
        return false
    }
    var t, n, r;
    var i = "df";
    uBody.closeWall(true, true);
    uBody.closeMinisite();
    uBody.closeTopTen();
    uServe.toggleMap(true);
    uBody.toggleMapBtn(true);
    bMap.clearStore();
    bMap.clearBckgrIcons();
    bMap.clearChsMarkers();
    bVars.cat = e;
    uBody.toggleCbtn();
    uBody.makeCbtnAct();
    bMap.map.zoomToMaxExtent();
    bMap.ppm = new OpenLayers.Layer.Markers("ppm");
    bMap.map.addLayer(bMap.ppm);
    bMap.ppm.setZIndex(752);
    $.getJSON(addrUrl.api + 3, function(e) {
        $.each(e, function(e, s) {
            t = (new OpenLayers.LonLat(s["x"], s["y"])).transform(new OpenLayers.Projection("EPSG:4326"), bMap.map.getProjectionObject());
            n = new OpenLayers.Size(120, 97);
            r = new OpenLayers.Icon(addrUrl.base + "graphics/cmi/banker.png", n, new OpenLayers.Pixel(-(n.w / 2), -n.h));
            bMap.ppCoords.push({id: s["id"], x: s["x"], y: s["y"], icat: bMap.varsArr["bankers"]});
            var o = new OpenLayers.Marker(t, r);
            o.events.register("mousedown", bMap.ppm, function(e) {
                uBody.openMinisite(s["id"], true);
                OpenLayers.Event.stop(e)
            });
            bMap.ppm.addMarker(o);
            $.each(jQuery.parseJSON(s["descr_" + i]), function(t, n) {
                $(bMap.ppm["markers"][e]["events"]["element"]).append("<span class='cit " + t + "'>" + n + "</span><br/>")
            })
        })
    })
};
bMap.setMap = function(e) {
    var extent = new OpenLayers.Bounds(36.28608, 49.99570, 36.31434, 50.01656);
    var t = {
        projection: "EPSG:4326"
        , controls: [new OpenLayers.Control.Navigation({dragPanOptions: {enableKinetic: true}})]
        , restrictedExtent: extent
        , maxExtent: extent
        , numZoomLevels: 7
        , maxResolution: "auto"
    };
    bMap.map = new OpenLayers.Map(e, t);
    bMap.map.addLayer(new OpenLayers.Layer.WMS("Barabashovo"
        , "http://uadmin.no-ip.biz:8080/geoserver/uniqoom/wms?BGCOLOR=0x000c15"
        , {layers: "2013-07-14-kiosk", format: "image/png"}
    ));
    uBody.setOverview();
    uBody.setSclCnt();
    uBody.setPanCnt();
    bMap.setBckgrIcons();
    bMap.map.events.register("move", null, bMap.controlScale);
    bMap.map.zoomToMaxExtent()
};
bMap.dragControlOn = function() {
    bMap.dcSwitch = new OpenLayers.Control.DragPan({map: bMap.map, panMapDone: function(e) {
            bMap.map.userdragged = true;
            console.log("drag");
            bMap.setMarkers()
        }});
    bMap.dcSwitch.draw();
    bMap.map.addControl(bMap.dcSwitch);
    bMap.dcSwitch.activate()
};
bMap.dragControlOff = function() {
    bMap.map.removeControl(bMap.dcSwitch);
    bMap.dcSwitch.deactivate()
};
bMap.controlScale = function() {
    if (bMap.map.getZoom() >= bVars.maxScale) {
        if (typeof bMap.markers == "undefined") {
            bMap.markers = new OpenLayers.Layer.Markers("Markers");
            bMap.map.addLayer(bMap.markers);
            uServe.markerAboveBckgr();
            bMap.dragControlOn()
        }
        clearTimeout(bVars.tMapMove);
        bVars.tMapMove = setTimeout(function() {
            bMap.setMarkers()
        }, 500);
        uBody.togglePanCnt(true)
    } else {
        if (typeof bMap.markers != "undefined") {
            bVars.mIdArr.length = 0;
            bMap.map.removeLayer(bMap.markers);
            delete bMap.markers;
            bMap.dragControlOff()
        }
        uBody.togglePanCnt()
    }
    uBody.toggleMapBtn(true);
    uServe.toggleBckgr();
    uServe.controlSclBtns();
    uServe.respiteSCS()
};
bMap.storeOnMap = function() {
    uBody.closeMinisite();
    uBody.closeTopTen();
    bMap.clearStore();
    bMap.clearChsMarkers();
    uBody.toggleAddCbtn(true);
    if (bVars.cat == bMap.varsArr["bankers"]) {
        bMap.clearPopupMarkers()
    }
    var uri = null;
    var data = {};
    var calls = [];
    calls.push(
        $.getJSON(addrUrl.api + 9, function(e) {
            if (e[0]["x"] === null) {
                return false;
            }
            bVars.somCrit = true;
            bMap.chsMarker = new OpenLayers.Layer.Markers("chsMarker");
            bMap.map.addLayer(bMap.chsMarker);
            bMap.stCoords.push({x: e[0]["x"], y: e[0]["y"], icat: bVars.cat});
            uServe.addNewMarker(bMap.stCoords[0], 2);
            uServe.showHiddenMarker({x: bMap.stCoords[0]["x"], y: bMap.stCoords[0]["y"]});
            uServe.markerAboveBckgr();
            uri = 'http://uadmin.no-ip.biz:8080/geo?SERVICE=UniqoomAPI&REQUEST=path'
//            uri = 'http://192.167.1.2:8080/geo?SERVICE=UniqoomAPI&REQUEST=path'
                + '&X1=' + bVars.moduleCoords[bVars.moduleId]['x']
                + '&Y1=' + bVars.moduleCoords[bVars.moduleId]['y']
                + '&X2=' + e[0]["x"]
                + '&Y2=' + e[0]["y"]
                + '&jsoncallback=?';
        })
    );
    $.when.apply($, calls).then(function() {
        $.getJSON(uri, function(data) {
            if (bMap.path !== null) {
                bMap.map.removeLayer(bMap.path);
                bMap.path = null;
            }
            bMap.path = new OpenLayers.Layer.Vector("Path");
            bMap.map.addLayer(bMap.path);
            var points = [];
            data.forEach(function(entry) {
                points.push(new OpenLayers.Geometry.Point(entry[0], entry[1])
                        .transform(new OpenLayers.Projection("EPSG:4326")
                        , bMap.map.getProjectionObject()));
            });
            var line = new OpenLayers.Geometry.LineString(points);
            var style = {
                strokeColor: '#ff5f17',
                strokeOpacity: 0.75,
                strokeWidth: 5
            };
            var lineFeature = new OpenLayers.Feature.Vector(line, null, style);
            bMap.path.addFeatures([lineFeature]);
        });
    });
};
bMap.clearStore = function() {
    if (!bVars.somCrit || typeof bMap.chsMarker == "undefined") {
        return false
    }
    bVars.somCrit = false;
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.stCoords, function(e, t) {
            uServe.addNewMarker({x: t["x"], y: t["y"], icat: t["icat"], store: bVars.store}, 1)
        })
    }
    bVars.store = null;
    bMap.stCoords.length = 0;
    bMap.map.removeLayer(bMap.chsMarker);
    delete bMap.chsMarker
};
bMap.clearChsMarkers = function() {
    if (!uServe.chmEx()) {
        return false
    }
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.chmCoords, function(e, t) {
            uServe.addNewMarker({x: t["x"], y: t["y"], icat: t["icat"], store: t["store"]}, 1)
        })
    }
    uServe.toggleListBtn(false);
    bVars.chsmIdArr.length = 0;
    bMap.chmCoords.length = 0;
    bMap.map.removeLayer(bMap.catChsMarkers);
    delete bMap.catChsMarkers
};
bMap.scaleByHint = function() {
    bMap.map.zoomTo(bVars.maxScale)
};
bMap.centerMBM = function() {
    $.getJSON(addrUrl.getMCoords(), function(e) {
        uBody.closeWall(true);
        uBody.closeMinisite(true);
        bMap.clearStore();
        bMap.clearChsMarkers();
        bMap.clearPopupMarkers();
        uBody.toggleCbtn();
        uBody.makeCbtnPass();
        uServe.toggleMap(true);
        bMap.clearBckgrIcons();
        bMap.map.moveTo(new OpenLayers.LonLat(e["lon"], e["lat"]), 5);
        bMap.showPopup(e["lon"], e["lat"])
    })
};
uBody.toggleCbtn = function(e) {
    var t = $("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0;
    if (e && !t) {
        var n;
        if ($.browser.webkit) {
            mspTF = 1;
            mspBF = 0;
            mspTB = 1;
            mspBB = 0
        } else if ($.browser.mozilla) {
            mspTF = 1;
            mspBF = 0;
            mspTB = 1;
            mspBB = 0
        }
        if ($("div.rst-list-cont").length > 0) {
            $("div.list-cont").remove()
        }
        $("div.cbtn" + bVars.cat).removeClass("cbtn-act cbtn-pass").css({"margin-top": mspTF + "px", "margin-bottom": mspBF + "px"}).off("mousedown");
        $("div.ci-cont" + bVars.cat).wrap("<div class='ci-cont-bckgr'></div>").css("background-image", addrUrl.getIcon(bVars.cat)).on("mousedown", uBody.scatsWall);
        $(".cn-cont" + bVars.cat + " span.cname").hide();
        $("div.cn-cont" + bVars.cat).wrap("<div class='cn-cont-bckgr'></div>").append("<span id='scname'></span>");
        $.get(addrUrl.getScatName(), function(e) {
            $("span#scname").text(e)
        });
        $.get(addrUrl.getLbl(122), function(e) {
            $("div.cn-cont-bckgr").on("mousedown", uBody.showTTstores)
        });
        uBody.makeSiBtnPass()
    } else if (!e && t) {
        $("div.ci-cont" + bVars.divcbtnNo).unwrap().off("mousedown", uBody.scatsWall);
        $("div.cn-cont" + bVars.divcbtnNo).unwrap().off("mousedown", uBody.storesWall);
        $("div.cbtn" + bVars.divcbtnNo).css({"margin-top": mspTB + "px", "margin-bottom": mspBB + "px"}).mousedown(function() {
            uBody.scatsWall(parseFloat($(this).attr("id")))
        });
        $("span#scname").remove();
        $(".cn-cont" + bVars.divcbtnNo + " span").show()
    }
};
uBody.makeCbtnAct = function() {
    if (bVars.cat == null) {
        return false
    }
    $("div.cbtn" + bVars.cat).removeClass("cbtn-act2 cbtn-pass").addClass("cbtn-act");
    $("div.ci-cont" + bVars.cat).css("background-image", addrUrl.getIcon(bVars.cat + "act"));
    if (typeof bVars.divcbtnNo != null && bVars.divcbtnNo != bVars.cat) {
        uBody.makeCbtnPass()
    }
    bVars.divcbtnNo = bVars.cat;
    uBody.makeSiBtnPass()
};
uBody.makeCbtnPass = function() {
    if ($("div.cbtn" + bVars.divcbtnNo).hasClass("cbtn-pass") || $("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0) {
        return false
    }
    $("div.cbtn" + bVars.divcbtnNo).removeClass("cbtn-act").addClass("cbtn-pass");
    $("div.ci-cont" + bVars.divcbtnNo).css("background-image", addrUrl.getIcon(bVars.divcbtnNo))
};
uBody.makeSiBtnAct = function() {
    uBody.makeCbtnPass();
    $("div.sibtn").removeClass("sibtn-pass").addClass("sibtn-act");
    $("div.sibtn-icon").css("background-image", addrUrl.getIcon("siact"))
};
uBody.makeSiBtnPass = function() {
    $("div.sibtn").removeClass("sibtn-act").addClass("sibtn-pass");
    $("div.sibtn-icon").css("background-image", addrUrl.getIcon("si"));
    $.get(addrUrl.getLbl(10), function(e) {
        $("div.sibtn-name").text(e)
    })
};
uBody.toggleMapBtn = function(e) {
    clearTimeout(bVars.tbToRoot);
    bVars.tbToRoot = setTimeout(function() {
        var t = bVars.somCrit || typeof bMap.ppm != "undefined" || $("div.olPopup").length > 0 || uServe.chmEx() && bVars.pmType != 3 || $("div.list-cont").length > 0 || $("div.minisite-cont").length > 0 || bMap.map.getZoom() > bVars.rootScale;
        var n = $("textarea.sch-field").val().length > 0;
        if (e && (t || n)) {
            $.get(addrUrl.getLbl(112), function(e) {
                $(".map-btn").text(e).removeClass("mbtn-act").addClass("map-pass").on("mousedown", uBody.back2root)
            })
        } else if (!t) {
            $.get(addrUrl.getLbl(108), function(e) {
                $(".map-btn").text(e).removeClass("map-pass").addClass("mbtn-act").off("mousedown", uBody.back2root);
                if ($("textarea.sch-field").val().length > 0) {
                    $("textarea.sch-field").val("")
                }
            })
        }
    }, 300)
};
uBody.closeWall = function(e, t) {
    if ($("div.list-cont").length < 1) {
        return false
    }
    if (e) {
        uServe.toggleMap(true);
        if ($("div.list-cont").is(":visible")) {
            if (bVars.pmType == 1 && $("div.rst-list-cont").length > 0) {
                uServe.toggleListBtn(true);
                $("div.list-cont").hide();
                $("div.rst-list-cont").hide();
                $("div.ls-cont").hide();
                return false
            } else if (bVars.pmType == 2) {
                bMap.clearChsMarkers()
            }
        }
        $.get(addrUrl.svapi("scat", null));
        $("div.list-cont").remove();
        $("div.ls-cont").remove();
        uBody.makeCbtnPass();
        bVars.cat = null;
        if (!t) {
            uBody.toggleMapBtn()
        }
    } else {
        $("div#scats").hide();
        $("div.list-cont").hide();
        $("div.ls-cont").hide()
    }
    uBody.toggleSlTr()
};
uBody.showTTstores = function() {
    uBody.closeMinisite(true, true, true);
    uBody.toggleAddCbtn();
    if (uServe.chmEx() && bVars.pmType == 1) {
        if ($("div.list-cont:visible").length > 0) {
            uBody.closeWall(true)
        }
        uServe.toggleMap(true)
    } else {
        if (bVars.pmType == 2) {
            $("div.list-cont").remove();
            $("div.ls-cont").remove();
            uBody.toggleSlTr();
            uBody.togglePB(true)
        }
        bVars.pmType = 1;
        $.getJSON(addrUrl.getPrmSt(), function(e) {
            if (e) {
                uBody.showSpm(e, true)
            } else {
                return false
            }
        })
    }
};
uBody.storesListThumb = function(e, t) {
    if (!t && (bVars.dragSlBtnCrit || e == bVars.countSlide)) {
        return false
    }
    bVars.countSlide = e;
    bVars.ssCorrVal = bVars.countSlide * bVars.ssCorr;
    if (!t) {
        uBody.moveSlides(true)
    }
};
uBody.protectLimits = function(e) {
    switch (e) {
        case 0:
            clearTimeout(bVars.allowSlBtnProtect);
            if (bVars.slBtnStepCount - 1 < 0 || bVars.slBtnStepCount + 1 == bVars.gsLimit) {
                bVars.allowSlBtnProtect = setTimeout(function() {
                    $("div.ls-btn-cont").mouseup()
                }, 100)
            }
            break;
        case 1:
            clearTimeout(bVars.allowProtect);
            if (bVars.countSlide + 1 == bVars.slideLimit || bVars.countSlide == 0) {
                bVars.allowProtect = setTimeout(function() {
                    $("div.slides-cont").mouseup()
                }, 250)
            }
            break
    }
};
uBody.slidePrev = function() {
    if (bVars.countSlide - 1 >= 0) {
        bVars.countSlide--;
        bVars.ssCorrVal -= bVars.ssCorr
    }
};
uBody.slideNext = function() {
    if (bVars.countSlide + 1 < bVars.slideLimit) {
        bVars.countSlide++;
        bVars.ssCorrVal += bVars.ssCorr
    }
};
uBody.moveSlides = function(e) {
    if (!e) {
        if (bVars.slideBegPos < bVars.slideEndPos) {
            if (bMap.varsArr["wdir"] == "rtl") {
                uBody.slideNext()
            } else if (bMap.varsArr["wdir"] == "ltr") {
                uBody.slidePrev()
            }
        } else {
            if (bMap.varsArr["wdir"] == "rtl") {
                uBody.slidePrev()
            } else if (bMap.varsArr["wdir"] == "ltr") {
                uBody.slideNext()
            }
        }
    }
    $("div.slides-cont").animate({left: (bVars.slideStep * bVars.countSlide - bVars.ssCorrVal) * -1 + "px"}, "fast");
    if (bVars.countSlide != bVars.prevCountSlide) {
        $("div.ls-btn").eq(bVars.countSlide).removeClass("ls-btn-pass").addClass("ls-btn-act");
        $("div.ls-btn").eq(bVars.prevCountSlide).removeClass("ls-btn-act").addClass("ls-btn-pass")
    }
    if (!e && bVars.gsLimit > 1) {
        var t = 9;
        if (bVars.countSlide == t * (bVars.slBtnStepCount + 1) + (bVars.slBtnStepCount + 1) && bVars.countSlide > bVars.prevCountSlide) {
            if (bMap.varsArr["wdir"] == "rtl") {
                uBody.moveLsBtn(1)
            } else if (bMap.varsArr["wdir"] == "ltr") {
                uBody.moveLsBtn(0)
            }
        }
        if (bVars.countSlide == t * bVars.slBtnStepCount + (bVars.slBtnStepCount - 1) && bVars.countSlide < bVars.prevCountSlide) {
            if (bMap.varsArr["wdir"] == "rtl") {
                uBody.moveLsBtn(0)
            } else if (bMap.varsArr["wdir"] == "ltr") {
                uBody.moveLsBtn(1)
            }
        }
    }
    bVars.prevCountSlide = bVars.countSlide
};
uBody.dragHandler = function() {
    if ($("div.list-slider").length > 0) {
        $("div.ls-btn").click(function() {
            uBody.storesListThumb($("div.ls-btn").index(this))
        })
    }
    $("div.slides-cont").draggable({axis: "x", iframeFix: true, distance: 50, start: function(e, t) {
            clearTimeout(bVars.allowClick);
            bVars.dragCrit = true;
            bVars.slideBegPos = t.position.left;
            uBody.protectLimits(1)
        }, stop: function(e, t) {
            bVars.allowClick = setTimeout(function() {
                bVars.dragCrit = false
            }, 750);
            bVars.slideEndPos = t.position.left;
            uBody.moveSlides()
        }})
};
uBody.storesWall = function() {
    if ($("div.minisite-cont:visible").length > 0) {
        uBody.closeMinisite(true, true)
    }
    bVars.slType = 2;
    uServe.toggleListBtn(false);
    uServe.toggleMap();
    uBody.slTriangle();
    uBody.toggleSlTr(true);
    if ($("div.rst-list-cont").length > 0) {
        $("div.list-cont").show();
        $("div.rst-list-cont").show();
        $("div.ls-cont").show();
        return false
    }
    uServe.resetGsNum();
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>")
    }
    $("div.list-cont:hidden").show();
    $("div.list-cont").append("<div class='rst-list-cont'></div>");
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.rst-list-cont").load(addrUrl.loadBlock("stlist"), function() {
            uServe.toggleLsContBckgr();
            $("div.rst-el").click(function() {
                uBody.openMinisite($(this).attr("id"))
            });
            uServe.loadSlider()
        })
    })
};
uBody.toggleSlTr = function(e) {
    if (e && $("div.sl-tr").is(":hidden")) {
        $("div.sl-tr").show()
    } else if (!e && $("div.sl-tr").is(":visible")) {
        $("div.sl-tr").hide()
    }
};
uBody.slTriangle = function(e) {
    var t, n;
    if (e) {
        t = 8
    } else {
        t = bVars.divcbtnNo - 9
    }
    if ($.browser.mozilla) {
        n = 324
    } else if ($.browser.webkit) {
        n = 323
    }
    var r = 73;
    var i = n + r * t;
    $("div.sl-tr").show().css("top", i)
};
uBody.scatsWall = function(e) {
    if (bVars.dragCrit) {
        return false
    }
    var t;
    bVars.slType = 1;
    if (!uBody.closeMinisite(true)) {
        bVars.store = null
    }
    if (isNaN(e)) {
        t = false
    } else {
        t = bVars.cat != e;
        bVars.cat = e
    }
    uBody.toggleCbtn();
    if ($("div.cbtn" + bVars.cat).hasClass("cbtn-pass")) {
        if ($("div.subcat-container").length > 0) {
            $("div.subcat-container").remove()
        } else if ($("div.stores-container").length > 0) {
            $("div.stores-container").remove()
        } else if ($("div.sch-container").length > 0) {
            $("div.sch-container").remove()
        }
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
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>")
    } else if (!($("div.rst-list-cont").length > 0) && !t) {
        $("div.list-cont").show();
        $("div#scats").show();
        uServe.toggleLsContBckgr();
        uServe.loadSlider();
        return false
    } else if ($("div.rst-list-cont").length > 0) {
        $("div.rst-list-cont").remove()
    }
    if ($("div.list-cont").attr("style") != null) {
        $("div.list-cont").removeAttr("style")
    }
    $.get(addrUrl.svapi("cat,slider", bVars.cat + "," + bVars.slType), function() {
        $("div.list-cont").show().load(addrUrl.loadBlock("ellist"), function() {
            uServe.toggleLsContBckgr();
            $("div.store-btn-bckgr").click(function() {
                bVars.pmType = 1;
                if (!bVars.dragCrit) {
                    uBody.togglePB(true)
                }
                $.get(addrUrl.svapi("scat", $(this).attr("id")), function() {
                    $.getJSON(addrUrl.getPrmSt(), function(e) {
                        if (e) {
                            bVars.showTTS = true;
                            uBody.showSpm(e)
                        } else {
                            bVars.showTTS = false;
                            uBody.togglePB();
                            uBody.closeWall();
                            uBody.storesWall();
                            uServe.toggleListBtn(false)
                        }
                    })
                })
            });
            uServe.loadSlider()
        });
        uBody.toggleMapBtn(true)
    })
};
uBody.schWall = function() {
    if ($("textarea#sch-area").val().length == 0) {
        return false
    }
    bVars.slType = 3;
    uServe.toggleListBtn(false);
    uServe.toggleMap();
    uServe.resetGsNum();
    uBody.toggleSlTr();
    if ($("div.list-cont").length > 0) {
        $("div.list-cont").show()
    } else {
        $("td.mw").append("<div class='list-cont'></div>")
    }
    $("div.list-cont").css("left", "23px");
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.list-cont").load(addrUrl.loadBlock("schlist"), function() {
            $("div.list-cont").css("background-image", "none");
            $("div.store-btn-bckgr").click(function() {
                uBody.openMinisite($(this).attr("id"), true)
            });
            uServe.loadSlider()
        })
    })
};
uBody.slBtnDragHandler = function() {
    if (!($("div.ls-move").length > 0)) {
        return false
    }
    $("div.ls-btn-cont").draggable({axis: "x", iframeFix: true, distance: 50, start: function(e, t) {
            clearTimeout(bVars.allowSlBtnClick);
            bVars.dragSlBtnCrit = true;
            bVars.slBtnSlideBegPos = t.position.left;
            uBody.protectLimits(0)
        }, stop: function(e, t) {
            bVars.allowSlBtnClick = setTimeout(function() {
                bVars.dragSlBtnCrit = false
            }, 500);
            if (bVars.slBtnSlideBegPos < t.position.left) {
                uBody.moveLsBtn(1)
            } else {
                uBody.moveLsBtn(0)
            }
        }});
    $("div.ls-move").mousedown(function() {
        if ($(this).hasClass("ls-move-act")) {
            return false
        }
        if (bMap.varsArr["wdir"] == "rtl") {
            if ($(this).attr("id") == "beg") {
                uBody.moveLsBtn(0)
            } else if ($(this).attr("id") == "end") {
                uBody.moveLsBtn(1)
            }
        } else if (bMap.varsArr["wdir"] == "ltr") {
            if ($(this).attr("id") == "beg") {
                uBody.moveLsBtn(1)
            } else if ($(this).attr("id") == "end") {
                uBody.moveLsBtn(0)
            }
        }
    })
};
uBody.moveLsBtn = function(e) {
    if (bVars.moveLsBtnLimiter) {
        return false
    }
    var t = 685;
    var n = 5;
    var r = false;
    var i = false;
    bVars.moveLsBtnLimiter = true;
    if (bVars.allowSlBtnProtect != null && bVars.slBtnStepCount + 1 == bVars.gsLimit) {
        i = true
    }
    if (bVars.allowSlBtnProtect != null && bVars.slBtnStepCount - 1 < 0) {
        r = true
    }
    if (e == 1) {
        if (bMap.varsArr["wdir"] == "rtl") {
            if (i) {
                $("div.ls-btn-cont").animate({left: t * bVars.slBtnStepCount + n * bVars.slBtnStepCount + "px"}, "fast")
            } else {
                $("div.ls-btn-cont").animate({left: t * ++bVars.slBtnStepCount + n * bVars.slBtnStepCount + "px"}, "slow")
            }
        } else if (bMap.varsArr["wdir"] == "ltr") {
            if (r) {
                $("div.ls-btn-cont").animate({left: "0px"}, "fast")
            } else {
                $("div.ls-btn-cont").animate({left: t * --bVars.slBtnStepCount * -1 - n * bVars.slBtnStepCount + "px"}, "slow")
            }
        }
    } else if (e == 0) {
        if (bMap.varsArr["wdir"] == "rtl") {
            if (r) {
                $("div.ls-btn-cont").animate({left: "0px"}, "fast")
            } else {
                $("div.ls-btn-cont").animate({left: t * --bVars.slBtnStepCount + n * bVars.slBtnStepCount + "px"}, "slow")
            }
        } else if (bMap.varsArr["wdir"] == "ltr") {
            if (i) {
                $("div.ls-btn-cont").animate({left: t * bVars.slBtnStepCount * -1 - n * bVars.slBtnStepCount + "px"}, "fast")
            } else {
                $("div.ls-btn-cont").animate({left: t * ++bVars.slBtnStepCount * -1 - n * bVars.slBtnStepCount + "px"}, "slow")
            }
        }
    }
    if (bVars.slBtnStepCount == 0) {
        $("div.ls-move-beg").removeClass("ls-move-pass").addClass("ls-move-act")
    } else {
        $("div.ls-move-beg").removeClass("ls-move-act").addClass("ls-move-pass")
    }
    if (bVars.slBtnStepCount + 1 == bVars.gsLimit) {
        $("div.ls-move-end").removeClass("ls-move-pass").addClass("ls-move-act")
    } else {
        $("div.ls-move-end").removeClass("ls-move-act").addClass("ls-move-pass")
    }
    setTimeout(function() {
        bVars.moveLsBtnLimiter = false
    }, 500)
};
uBody.showSpm = function(e, t) {
    if (bVars.pmType == 1 && bVars.dragCrit || bVars.pmType == 2 && $("textarea#sch-area").val().length == 0) {
        return false
    }
    if (uServe.chmEx()) {
        bMap.clearChsMarkers()
    }
    uServe.toggleMap(true);
    uBody.closeSi();
    bMap.catChsMarkers = new OpenLayers.Layer.Markers("catChsMarkers");
    bMap.map.addLayer(bMap.catChsMarkers);
    uServe.markerAboveBckgr();
    switch (bVars.pmType) {
        case 1:
            uBody.togglePB();
            bMap.map.zoomToMaxExtent();
            clearTimeout(bVars.ttglBtn);
            bVars.ttglBtn = setTimeout(function() {
                uBody.toggleCbtn(true)
            }, 200);
            uBody.closeWall();
            if (!t) {
                uServe.toggleLsContBckgr(true)
            }
            $.get(addrUrl.getLbl(114), function(e) {
                $("div.show-st-list").off("mousedown", uBody.schWall).on("mousedown", uBody.storesWall).text(e)
            });
            $.each(e, function(e, t) {
                var n = {x: t[0]["x"], y: t[0]["y"], icat: bVars.cat, store: parseFloat(e)};
                uServe.addNewMarker(n, 3);
                bMap.chmCoords.push(n)
            });
            uServe.toggleListBtn(true);
            break;
        case 2:
            uBody.closeWall(true, true);
            uBody.toggleCbtn();
            uBody.makeCbtnPass();
            uBody.togglePB(true);
            uBody.closeMinisite(true, true);
            bMap.clearStore();
            uBody.closeTopTen();
            bMap.clearBckgrIcons();
            bMap.clearPopupMarkers();
            $.get(addrUrl.svapi("sch_txt", e), function() {
                $.get(addrUrl.getLbl(117), function(e) {
                    $("div.show-st-list").off("mousedown", uBody.storesWall).on("mousedown", uBody.schWall).text(e)
                });
                $.getJSON(addrUrl.getSchId(), function(e) {
                    if (!e) {
                        uBody.openMsgBox(118);
                        return false
                    }
                    $.each(e, function(e, t) {
                        var n = {x: t["x"], y: t["y"], icat: t["cat"], store: t["id"], cc: true};
                        uServe.addNewMarker(n, 3);
                        bMap.chmCoords.push(n)
                    });
                    if (e.length == 1) {
                        uServe.showHiddenMarker({x: e[0]["x"], y: e[0]["y"]})
                    } else {
                        bMap.map.zoomToMaxExtent()
                    }
                    uServe.toggleListBtn(true);
                    uBody.togglePB()
                })
            });
            uServe.markerAboveBckgr();
            break;
        case 3:
            $.each(e, function(e, t) {
                var n = {x: t["x"], y: t["y"], icat: t["cat"], store: t["id"], cc: true};
                uServe.addNewMarker(n, 3);
                bMap.chmCoords.push(n)
            });
            break
    }
};
uBody.back2root = function() {
    uBody.closeWall(true);
    uBody.closeMinisite(true);
    bMap.map.moveTo(new OpenLayers.LonLat(0, 0), bVars.rootScale);
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
    uBody.setOverview()
    if (bMap.path !== null) {
        bMap.map.removeLayer(bMap.path);
        bMap.path = null;
    }
};
uBody.bannRenewal = function() {
    var e = 0;
    var t = 1;
    bVars.brCycle = setInterval(function() {
        $("div.bann-group-" + e).fadeOut(700);
        if (e + 1 > t) {
            e = 0
        } else {
            e++
        }
        $("div.bann-group-" + e).fadeIn(1e3)
    }, 1e4)
};
uBody.togglePB = function(e) {
    if (e && $("div.total-pb-bckgr").is(":hidden")) {
        $("div.total-pb-bckgr").show();
        $("div.pb-icon-cont").show().on("mousedown", function() {
            return false
        });
        uServe.rotateAL()
    } else if (!e && $("div.total-pb-bckgr").is(":visible")) {
        $("div.total-pb-bckgr").hide();
        $("div.pb-icon-cont").hide().off("mousedown")
    }
};
uBody.closeMsgBox = function() {
    if ($("div.msg-box").is(":hidden")) {
        return false
    }
    $("div.msg-box").hide();
    $("div.total-pb-bckgr").off("mousedown", uBody.closeMsgBox);
    uBody.togglePB()
};
uBody.openMsgBox = function(e) {
    $.get(addrUrl.getLbl(e), function(e) {
        uBody.togglePB(true);
        $("div.pb-icon-cont").hide();
        $("div.msg-box").show().css({left: (window.innerWidth - $("div.msg-box").width()) / 2 + "px", top: (window.innerHeight - $("div.msg-box").height()) / 2 + "px"}).on("mousedown", function() {
            return false
        });
        $("div.msg-txt>div").text(e);
        $("div.msg-cls").on("mousedown", uBody.closeMsgBox);
        $("div.total-pb-bckgr").on("mousedown", uBody.closeMsgBox);
        $(document).keydown(function(e) {
            if (e.keyCode == 27) {
                uBody.closeMsgBox()
            }
        })
    })
};
uBody.onPopupClose = function(e) {
    var t = this.feature;
    if (t.layer) {
        bMap.selectControl.unselect(t)
    } else {
        this.destroy()
    }
};
uBody.onFeatureSelect = function(e) {
    feature = e.feature;
    popup = new OpenLayers.Popup.FramedCloud("featurePopup", feature.geometry.getBounds().getCenterLonLat(), new OpenLayers.Size(100, 100), "<span class='popup-header'>" + feature.attributes.title + "</span><hr/>" + "<span class='popup-text'>" + feature.attributes.description + "</span>", null, true, uBody.onPopupClose);
    feature.popup = popup;
    popup.feature = feature;
    bMap.map.addPopup(popup, true);
    uBody.toggleMapBtn(true);
    uBody.makeCbtnPass();
    bMap.clearPopupMarkers();
    bMap.clearStore();
    bMap.clearChsMarkers();
    uBody.toggleCbtn();
    uBody.makeCbtnPass()
};
uBody.onFeatureUnselect = function(e) {
    feature = e.feature;
    if (feature.popup) {
        popup.feature = null;
        bMap.map.removePopup(feature.popup);
        feature.popup.destroy();
        feature.popup = null;
        setTimeout(function() {
            if (!($("div.olPopup").length > 0)) {
                uBody.toggleMapBtn()
            }
        }, 400)
    }
};
uBody.setSclCnt = function() {
    bMap.sclPnl = new OpenLayers.Control.Panel({div: document.getElementById("scl-cnt")});
    bMap.map.addControl(bMap.sclPnl);
    bMap.cntZoomIn = new OpenLayers.Control.ZoomIn;
    bMap.cntZoomOut = new OpenLayers.Control.ZoomOut;
    bMap.map.addControl(bMap.cntZoomIn);
    bMap.map.addControl(bMap.cntZoomOut);
    bMap.sclPnl.addControls([bMap.cntZoomIn, bMap.cntZoomOut]);
    $("div.olControlZoomInItemInactive").addClass("scl-btn-pass").append("<span>+</span>").mousedown(function() {
        bVars.pprsLong = setTimeout(function() {
            bMap.map.zoomTo(bVars.zoomSup - 1)
        }, 650)
    }).mouseup(function() {
        clearTimeout(bVars.pprsLong)
    });
    $("div.olControlZoomOutItemInactive").addClass("scl-btn-act").append("<span>−</span>").mousedown(function() {
        bVars.nprsLong = setTimeout(function() {
            bMap.map.zoomTo(0)
        }, 650)
    }).mouseup(function() {
        clearTimeout(bVars.nprsLong)
    });
    $("div#scl-cnt").append("<div id='pan-panel'></div><div class='go-fscr'><div class='go-fscr-icon'></div></div><div class='leave-fscr'><div class='leave-fscr-icon'></div></div>")
};
uBody.togglePanCnt = function(e) {
    if (e && $("div#pan-panel").is(":hidden")) {
        $("div#pan-panel").show().animate({height: "352px"}, 650)
    } else if (!e && $("div#pan-panel").is(":visible")) {
        $("div#pan-panel").animate({height: "0px"}, {duration: 650, complete: function() {
                $(this).hide()
            }})
    }
};
uBody.setPanCnt = function() {
    bMap.panPnl = new OpenLayers.Control.Panel({div: document.getElementById("pan-panel")});
    bMap.map.addControl(bMap.panPnl);
    bMap.panCnt = new OpenLayers.Control.PanPanel({slideFactor: 500});
    bMap.map.addControl(bMap.panCnt);
    bMap.panPnl.addControls(bMap.panCnt);
    $("div.olControlPanPanel").appendTo("div#pan-panel");
    $("div.olControlPanPanel>div").css({display: "block", position: "relative", top: "-10px", left: "-5px", "margin-top": "14px", "border-radius": "10px", "min-width": "70px", "min-height": "70px", border: "2px solid #499460", "background-position": "0px 0px", cursor: "default", "background-image": bVars.brwsPref + "linear-gradient(-90deg, #2e9d40, #00652e)"}).append("<div class='pan-cnt-icon'></div>");
    $("div.pan-cnt-icon").css({display: "inline-block", width: "100%", height: "100%", "background-repeat": "no-repeat", "background-position": "center center"});
    $("div.pan-cnt-icon:eq(0)").css("background-image", addrUrl.getImage("tr_up_mod"));
    $("div.pan-cnt-icon:eq(1)").css("background-image", addrUrl.getImage("tr_down_mod"));
    $("div.pan-cnt-icon:eq(2)").css("background-image", addrUrl.getImage("tr_right_mod"));
    $("div.pan-cnt-icon:eq(3)").css("background-image", addrUrl.getImage("tr_left_mod"))
};
uBody.goFullscreen = function() {
    $("html, body").animate({scrollTop: 0}, 0).css("overflow", "hidden");
    if (bMap.map.getZoom() < 3) {
        bMap.map.zoomTo(3)
    }
    $("div.go-fscr").hide();
    $("div.leave-fscr").show().on("mousedown", uBody.leaveFullcsreen);
    $("div#smap").css({position: "absolute", top: "0px", left: "0px", width: "100%", height: "100%", "z-index": "18"});
    $("div#scl-cnt").css({top: "15px", left: "30px", "z-index": "19"});
    bMap.map.updateSize()
};
uBody.leaveFullcsreen = function() {
    if ($("div.leave-fscr").is(":hidden")) {
        return false
    }
    $("div.go-fscr").show();
    $("div.leave-fscr").hide().off("click");
    $("div#smap").removeAttr("style");
    $("div#scl-cnt").removeAttr("style");
    bMap.map.updateSize()
};
uBody.showStandByStores = function() {
    bVars.pmType = 3;
    $.getJSON(addrUrl.getStandBySt(), function(e) {
        if (e) {
            uBody.showSpm(e, true)
        } else {
            return false
        }
    })
};
uBody.clsVKbd = function() {
    $("div.total-pb-bckgr").off("mousedown");
    uBody.togglePB()
};
uBody.vKbd = function() {
    $("textarea#sch-area-txt").keyboard({
        layout: "qwerty-russian"
        , customLayout: {
            "default": [
                "ё 1 2 3 4 5 6 7 8 9 0 - = {bksp}"
                , "й ц у к е н г ш щ з х ъ \\"
                , "ф ы в а п р о л д ж э"
                , "{shift} я ч с м и т ь б ю . {shift}"
                , "{cancel} {alt} {space} {accept} {meta1} {meta2}"
            ], meta1: []
            , meta2: []
            , shift: [
                'Ё ! " № ; % : ? * ( ) _ + {bksp}', "Й Ц У К Е Н Г Ш Щ З Х Ъ |"
                , "Ф Ы В А П Р О Л Д Ж Э"
                , "{shift} Я Ч С М И Т Ь Б Ю , {shift}"
                , "{cancel} {alt} {space} {accept} {meta1} {meta2}"
            ], "alt-shift": [
                "~ ! @ # $ % ^ & * ( ) _ + {bksp}"
                , "Q W E R T Y U I O P { } |"
                , 'A S D F G H J K L : "'
                , "{shift} Z X C V B N M < > ? {shift}"
                , "{cancel} {alt} {space} {accept} {meta1} {meta2}"
            ], alt: [
                "` 1 2 3 4 5 6 7 8 9 0 - = {bksp}"
                , "q w e r t y u i o p [ ] \\", "a s d f g h j k l ; '"
                , "{shift} z x c v b n m , . / {shift}"
                , "{cancel} {alt} {space} {accept} {meta1} {meta2}"
            ]}
        , position: {
            of: null
            , my: "center top"
            , at: "center top"
            , at2: "center bottom"
        }, usePreview: true
        , alwaysOpen: false
        , stayOpen: false
        , display: {
            a: "✔:"
            , accept: "Найти:"
            , alt: "English:"
            , b: "←:"
            , bksp: "\b⟵\b:"
            , c: "✖:"
            , cancel: "Закрыть:"
            , clear: "C:Clear"
            , combo: "ö:"
            , dec: ".:"
            , e: "↵:Enter"
            , enter: "Enter:Enter"
            , lock: "⇪ Lock:"
            , next: "Next"
            , prev: "Prev"
            , s: "⇧:"
            , shift: "⇧:"
            , sign: "±:"
            , space: "", t: "⇥:"
            , tab: "⇥ Tab:"}
        , wheelMessage: ""
        , css: {
            input: "sch-field"
            , container: "kb-bckgr ui-widget ui-helper-clearfix"
            , buttonDefault: "kb-btn-pass"
            , buttonHover: "kb-btn-act"
            , buttonAction: "kb-btn-act2"
            , buttonDisabled: "kb-btn-pass"
        }, autoAccept: false
        , lockInput: false
        , restrictInput: false
        , acceptValid: true
        , tabNavigation: false
        , enterNavigation: true
        , enterMod: "altKey"
        , stopAtEnd: true
        , appendLocally: false
        , stickyShift: true
        , preventPaste: false
        , maxLength: 50
        , repeatDelay: 500
        , repeatRate: 20
        , resetDefault: false
        , openOn: "focus"
        , keyBinding: "mousedown"
        , useCombos: true
        , initialized: function(e, t, n) {
        }, visible: function(e, t, n) {
            uServe.moveCaret2End()
        }, change: function(e, t, n) {
            uServe.respiteSCS(true)
        }, beforeClose: function(e, t, n, r) {
        }, accepted: function(e, t, n) {
            if ($("textarea#sch-area").val().length == 0) {
                t.cancel;
                uBody.clsVKbd()
            } else {
                bVars.pmType = 2;
                $("div.pb-icon-cont").show();
                uBody.showSpm($("textarea#sch-area").val());
                uBody.toggleMapBtn(true)
            }
        }, canceled: function(e, t, n) {
            uBody.clsVKbd()
        }, hidden: function(e, t, n) {
        }, switchInput: null, validate: function(e, t, n) {
            var r = false;
            uBody.togglePB(true);
            $("div.pb-icon-cont").hide();
            setTimeout(function() {
                r = true
            }, 700);
            $("div.total-pb-bckgr").on("mousedown", function() {
                if (r) {
                    e.cancel;
                    uBody.clsVKbd()
                } else {
                    return false
                }
            });
            $("textarea.sch-field:eq(1)").attr("id", "sch-area");
            uServe.detectCaret();
            $.get(addrUrl.getLbl(129), function(e) {
                $("textarea.sch-field:eq(1)").attr("placeholder", e)
            });
            $("button.ui-keyboard-meta1").replaceWith("<button class='ui-keyboard-button kb-btn-pass' onclick='uServe.runCaretLeft()'>←</button>");
            $("button.ui-keyboard-meta2").replaceWith("<button class='ui-keyboard-button kb-btn-pass' onclick='uServe.runCaretRight()'>→</button>");
            return true
        }})
};
uServe.changeLang = function(e) {
    if (bMap.varsArr["lang"] == e) {
        return false
    }
    $.get(addrUrl.svapi("lang", e), function() {
        window.location.reload()
    })
};
uBody.langOpenClose = function() {
    if ($("div.lang-btn").hasClass("lang-pass")) {
        $("div.lang-btn").removeClass("lang-pass").addClass("lang-act");
        $("div.lang-close").on("mousedown", uBody.langOpenClose);
        uBody.langSwitcher = setTimeout(function() {
            uBody.langOpenClose()
        }, 15e3)
    } else if ($("div.lang-btn").hasClass("lang-act")) {
        $("div.lang-btn").removeClass("lang-act").addClass("lang-pass");
        $("div.lang-close").off("mousedown", uBody.langOpenClose);
        clearTimeout(uBody.langSwitcher)
    }
    $("div.lang-elem").on("mousedown", function() {
        uServe.changeLang($(this).attr("id"))
    });
    $("div.lang-panel").slideToggle()
};
uBody.setUpAddCbtn = function() {
    $("div.add-cbtn").on("mousedown", function() {
        uBody.scatsWall(bVars.cat);
    });
    $("div.add-tt-btn").on("mousedown", uBody.showTTstores)
};
uBody.toggleAddCbtn = function(e) {
    if (e && $("div.add-cbtn-cont").is(":hidden")) {
        $("div.add-cbtn-cont").show()
    } else if (!e && $("div.add-cbtn-cont").is(":visible")) {
        $("div.add-cbtn-cont").hide()
    }
};
bMap.clearSiMarkers = function(e) {
    if (typeof bMap.sim == "undefined") {
        return
    }
    if (e) {
        bMap.map.removeLayer(bMap.sim);
        delete bMap.sim;
        delete bVars.simSize;
        delete bVars.simOffset;
        delete bVars.simIcon;
        delete bMap.simArr
    } else {
        for (var t = 0; t < bMap.simArr.length; t++) {
            bMap.sim.removeMarker(bMap.simArr[t])
        }
        bMap.simArr.length = 0
    }
};
bMap.showSiMarkers = function() {
    var e;
    if (typeof bMap.sim == "undefined") {
        bMap.sim = new OpenLayers.Layer.Markers("sim");
        bMap.map.addLayer(bMap.sim);
        bVars.simSize = new OpenLayers.Size(bVars.flagSize["w"], bVars.flagSize["h"]);
        bVars.simOffset = new OpenLayers.Pixel(-(bVars.simSize.w / 2), -bVars.simSize.h);
        bVars.simIcon = new OpenLayers.Icon(addrUrl.getCImage("flag"), bVars.simSize, bVars.simOffset);
        bMap.simArr = new Array
    }
    uBody.closeSi(true);
    bMap.clearSiMarkers();
    $.getJSON(addrUrl.getSi(bVars.si), function(t) {
        $.each(t, function(t, n) {
            e = new OpenLayers.Marker(new OpenLayers.LonLat(n["path_ox"], n["path_oy"]), bVars.simIcon.clone());
            bMap.sim.addMarker(e);
            bMap.simArr.push(e)
        })
    })
};
uBody.closeSi = function(e) {
    if (e === true) {
        $("div.list-cont").hide();
        $("div.ls-cont").hide();
        uServe.toggleMap(true)
    } else {
        if ($("div.si-cont").length > 0) {
            $("div.list-cont").remove();
            $("div.close-wall").off("click", uBody.closeSi)
        }
        uBody.makeSiBtnPass();
        bMap.clearSiMarkers(true)
    }
};
uBody.showSi = function() {
    bVars.slType = 5;
    bMap.map.zoomToMaxExtent();
    uServe.toggleMap();
    uServe.toggleLsContBckgr();
    uBody.toggleCbtn();
    uBody.makeSiBtnAct();
    bMap.clearStore();
    uBody.closeMinisite(true, true, true);
    bMap.clearChsMarkers();
    bMap.clearPopupMarkers();
    bMap.clearBckgrIcons();
    bVars.ssCorrVal = 0;
    uServe.toggleListBtn(false);
    uServe.resetGsNum();
    uBody.slTriangle(true);
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>")
    } else if ($("div.list-cont").is(":hidden")) {
        $("div.list-cont").show();
        $("div.ls-cont").show()
    }
    uBody.toggleMapBtn(true);
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.list-cont").load(addrUrl.loadBlock("si"), function() {
            $("div.list-cont").css("background-image", "none");
            $("div.close-wall").css({top: "749px", left: "1018px"});
            $("div.si-bckgr").on("click", function() {
                if (!bVars.dragCrit) {
                    bVars.si = parseInt($(this).find("div.si-btn").attr("id"));
                    bMap.showSiMarkers();
                    $("div.sibtn-name").text($(this).attr("title"))
                }
            });
            uServe.loadSlider();
            $("div.close-wall").on("mousedown", uBody.closeSi)
        })
    })
};
uBody.setOverview = function() {
    if (typeof bMap.mOverview != "undefined") {
        bMap.map.removeControl(bMap.mOverview);
        bMap.mOverview.destroy;
        delete bMap.mOverview
    }
    bMap.mOverview = new OpenLayers.Control.OverviewMap({maximized: false, autoPan: true, size: new OpenLayers.Size(380, 200)});
    bMap.map.addControl(bMap.mOverview);
    var e = {width: "50px", height: "50px", "background-image": bVars.brwsPref + "linear-gradient(bottom , #1c4591, #00adee)", "border-radius": "5px 0px 0px 5px", cursor: "default"};
    $("div#olControlOverviewMapMaximizeButton").css(e).append("<div class='overview-map-plus'></div>");
    $("div#olControlOverviewMapMaximizeButton").find("img").hide();
    $("div#OpenLayers_Control_minimizeDiv").css(e).append("<div class='overview-map-minus'></div>");
    $("div#OpenLayers_Control_minimizeDiv").find("img").hide();
    $("div.olControlOverviewMapElement").css("background-color", "#C9E12D")
};
$(document).ready(function() {
    uServe.setBrwsPref();
    $.getJSON(addrUrl.vapi + "lang,dlang,wdir", function(e) {
        bMap.varsArr = e;
        $.get(addrUrl.getSCName("bankers"), function(e) {
            bMap.varsArr["bankers"] = parseFloat(e)
        })
    });
    bMap.setMap("smap");
    uBody.vKbd();
    uBody.showStandByStores();
    $("div.cbtn").on("mousedown", function() {
        var e = parseFloat($(this).attr("id"));
        if (uServe.inArray(e, bVars.specCat)) {
            bMap.setPopupMarkers(e)
        } else {
            uBody.scatsWall(e)
        }
    });
    $("div.sibtn").on("mousedown", uBody.showSi);
    $("div.drum-btn").mousedown(function() {
        webLotteryHide();
        webDrumShow();
    });
    $("div.lott-btn").mousedown(function() {
        webDrumHide();
        webLotteryShow();
    });
    $("div.hot-btn").mousedown(function() {
        uBody.openMsgBox(124)
    });
    $("div.bann-item").mousedown(function() {
        var e;
        var t = parseFloat($(this).attr("id"));
        if (t == 0) {
            e = false
        } else {
            e = true
        }
        uBody.openMinisite(t, e);
        $("div.bann-cell").removeClass("bann-act").addClass("bann-pass");
        $(this).parent(".bann-cell").removeClass("bann-pass").addClass("bann-act")
    });
    $("div.go-fscr").mousedown(function() {
        uBody.goFullscreen()
    });
    $("div.mcoords-btn").mousedown(function() {
        bMap.centerMBM()
    });
    $("div.lang-btn").mousedown(function() {
        uBody.langOpenClose()
    });
    $("body").mousedown(function() {
        uServe.respiteSCS()
    });
    $("img.wall-product").live("mousedown", function() {
        return false
    });
    $("img.wall-zoomed").live("mousedown", function() {
        return false
    });
    uBody.setUpAddCbtn();
    uServe.screenSaver();
    uBody.bannRenewal()
})
