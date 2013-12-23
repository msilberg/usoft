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
bVars.pmType = null;  // promotion type (top 10): 1 -  2nd level catalogue, 2 - search results, 3 - stand-by 
bVars.prevCountSlide = 0;
bVars.slBtnStepCount = 0;
bVars.infoStepCount = 0;
bVars.infoStep = 33;
bVars.allowInfoMove = false;
bVars.moveLsBtnLimiter = false;
bVars.maxScale = 4;
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
/**
 * Defines an ID value for Catalogue controller.
 * @type Integer.
 */
bVars.controlInitialCategory = null;
/**
 * Defines if finance controller should be executed.
 * @type Boolean.
 */
bVars.controlFinance = false;
/**
 * Defines if services controller should be executed.
 * @type Boolean.
 */
bVars.controlServices = false;
bMap.stCoords = [];
bMap.chmCoords = [];
bMap.ppCoords = [];
/**
 * Layer that is used to display shortest path between two points (module and store usually).
 * @type @exp;OpenLayers@pro;Layer@call;Vector
 */
bMap.layerPath = null;
bMap.mSmBounds = {
    lbx: 36.28508
    , lby: 49.99170
    , rtx: 36.31534
    , rty: 50.01756
};
bMap.mFullBounds = {
    lbx: 36.28508
    , lby: 49.99170
    , rtx: 36.31534
    , rty: 50.01756
};
// Server addressing variables
var addrUrl = {};
addrUrl.base = "http://un.barabashovo.ua/";
addrUrl.baseL = "http://un.barabashovo.ua:8080/";
//addrUrl.base = "http://192.167.1.2/unavimp/";
//addrUrl.baseL = "http://192.167.1.2:8080/";
addrUrl.body = addrUrl.base + "core/html/web/body.php";
addrUrl.html = addrUrl.base + "core/html/web/blocks/common/";
addrUrl.startApi = addrUrl.base + "api.php";
addrUrl.urlBckgr = addrUrl.base + "config/1003/web/bismall.txt";
addrUrl.api = addrUrl.startApi + "?query=";
addrUrl.vapi = addrUrl.startApi + "?var=";
addrUrl.getFile = addrUrl.baseL + "getfile/";
addrUrl.markers = function() {
    var extent = bMap.map.getExtent();
    return addrUrl.baseL + "geo?SERVICE=UniqoomAPI&REQUEST=milestone&TCID=" + bMap.varsArr["tc"]
            + "&X1=" + extent["left"] + "&X2=" + extent["right"]
            + "&Y1=" + extent["bottom"] + "&Y2=" + extent["top"]
            + "&jsoncallback=?";
};
addrUrl.svapi = function(b, a) {
    return addrUrl.startApi + "?setvar&name=" + b + "&val=" + a;
};
addrUrl.loadBlock = function(a) {
    return addrUrl.api + "1&block=" + a;
};
addrUrl.getLbl = function(a) {
    return addrUrl.api + "2&lbl=" + a;
};
addrUrl.getStoreCat = function(a) {
    return addrUrl.api + "8&sch=" + a;
};
addrUrl.checkFeature = function(b, a) {
    return addrUrl.api + "17&store=" + b + "&feat=" + a;
};
addrUrl.getSCName = function(a) {
    return addrUrl.api + "4&cname=" + a;
};
addrUrl.getPrmSt = function() {
    return addrUrl.api + 5;
};
addrUrl.getSchId = function() {
    return addrUrl.api + 6;
};
addrUrl.getScatName = function() {
    return addrUrl.api + 7;
};
addrUrl.getJS = function(a) {
    return addrUrl.base + "js/web/common/" + a + ".js";
};
addrUrl.getFCatId = function() {
    return addrUrl.api + 12;
};
addrUrl.getStandBySt = function() {
    return addrUrl.api + 23;
};
addrUrl.getJS = function(a) {
    return addrUrl.base + "js/" + a + ".js";
};
addrUrl.getImage = function(b, a) {
    if (!a) {
        a = "png";
    }
    return"url(" + addrUrl.base + "graphics/" + b + "." + a + ")";
};
addrUrl.getCImage = function(b, a) {
    if (!a) {
        a = "png";
    }
    return addrUrl.base + "graphics/" + b + "." + a;
};
addrUrl.getSi = function(a) {
    return addrUrl.api + "24&sich=" + a;
};
uServe.arrayKeys = function(f, b, g) {
    var d = new Array, g = !!g, a = true, c = 0;
    for (key in f) {
        a = true;
        if (b !== undefined) {
            if (g && f[key] !== b) {
                a = false;
            } else {
                if (f[key] !== b) {
                    a = false;
                }
            }
        }
        if (a) {
            d[c] = key;
            c++;
        }
    }
    return d;
};
uServe.arrayEnd = function(b) {
    var a, c;
    if (b.constructor === Array) {
        a = b[b.length - 1];
    } else {
        for (c in b) {
            a = b[c];
        }
    }
    return a;
};
uServe.inArray = function(b, a) {
    if ($.inArray(b, a) === -1) {
        return false;
    } else {
        return true;
    }
};
uServe.end = function(b) {
    var a, c;
    if (b.constructor === Array) {
        a = b[b.length - 1];
    } else {
        for (c in b) {
            a = b[c];
        }
    }
    return a;
};
uServe.toggleMap = function(a) {
    if (a) {
        $("div#smap").show();
        if (!$.browser.msie) {
            $("div.go-fscr").show();
        }
        $("div.measure-switch").show();
        uServe.markerAboveBckgr();
    } else {
        $("div#smap").hide();
        if (!$.browser.msie) {
            $("div.go-fscr").hide();
        }
        $("div.measure-switch").hide();
        uBody.toggleAddCbtn();
    }
};
uServe.toggleListBtn = function(a) {
    if (bVars.showTTS && a && $("div.show-st-list").is(":hidden")) {
        $("div.show-st-list").show();
    } else {
        if (!a && $("div.show-st-list").is(":visible")) {
            $("div.show-st-list").hide();
        }
    }
};
uServe.arrSub = function(b, a) {
    var c = $.grep(b, function(d) {
        return $.inArray(d, a) < 0;
    });
    return c;
};
uServe.holdOpnStr = function() {
    clearTimeout(bVars.tOpnSt);
    bVars.openStore = false;
    bVars.tOpnSt = setTimeout(function() {
        bVars.openStore = true;
    }, 500);
};
uServe.addNewMarker = function(m, w) {
    var g, iconSize, j, x, layerMarkers, v;
    var q = [];
    var coord = (new OpenLayers.LonLat(m.x, m.y)).transform(new OpenLayers.Projection("EPSG:4326"), bMap.map.getProjectionObject());
    switch (w) {
        case 1:
            layerMarkers = bMap.markers;
            iconSize = new OpenLayers.Size(bVars.omSize.w, bVars.omSize.h);
            x = "";
            q = bVars.mIdArr;
            v = true;
            break;
        case 2:
            layerMarkers = bMap.chsMarker;
            iconSize = new OpenLayers.Size(bVars.chmSize.w, bVars.chmSize.h);
            x = "ab";
            q = bVars.mIdArr;
            v = false;
            break;
        case 3:
            layerMarkers = bMap.catChsMarkers;
            iconSize = new OpenLayers.Size(bVars.catChmSize.w, bVars.catChmSize.h);
            x = "ab";
            q = bVars.chsmIdArr;
            if (isNaN(m.cc) || typeof m.cc === "undefined" || m.cc === null) {
                v = false;
            } else {
                v = m.cc;
            }
            break;
    }
    if (isNaN(m.icat) || m.icat === 0 || m.icat === null) {
        g = 16;
    } else {
        g = m.icat;
    }
    if (typeof m.store === "undefined") {
        j = bVars.store;
    } else {
        j = parseFloat(m.store);
    }
    var iconURI = null;
    if (w === 3) {
        iconURI = addrUrl.base + "graphics/cmi/top-10.png";
    } else {
        iconURI = addrUrl.base + "graphics/cmi/" + g + x + ".png";
    }
    var icon = new OpenLayers.Icon(
        iconURI
        , iconSize
        , new OpenLayers.Pixel(-(iconSize.w / 2), -iconSize.h)
    );
    var marker = new OpenLayers.Marker(coord, icon);
    marker.events.register("mouseup", layerMarkers, function(a) {
        if (bVars.openStore) {
            uBody.openMinisite(j, v);
        } else {
            uServe.respiteSCS();
            return true;
        }
        OpenLayers.Event.stop(a);
    });
    marker.planeID = j;
    layerMarkers.addMarker(marker);
    bVars.mArr.push(marker);
    q.push(j);
};
uServe.resetGsNum = function() {
    bVars.slBtnStepCount = 0;
};
uServe.markerAboveBckgr = function() {
    var a = parseFloat(bMap.bckgrIcons.getZIndex());
    if (typeof bMap.markers !== "undefined" && a > parseFloat(bMap.markers.getZIndex())) {
        bMap.markers.setZIndex(a + 8);
    }
    if (typeof bMap.ppm !== "undefined" && a > parseFloat(bMap.ppm.getZIndex())) {
        bMap.ppm.setZIndex(a + 9);
    }
    if (typeof bMap.chsMarker !== "undefined" && a > parseFloat(bMap.chsMarker.getZIndex())) {
        bMap.chsMarker.setZIndex(a + 10);
    }
    if (typeof bMap.catChsMarkers !== "undefined" && a > parseFloat(bMap.catChsMarkers.getZIndex())) {
        bMap.catChsMarkers.setZIndex(a + 11);
    }
};
uServe.toggleBckgr = function() {
    if (bMap.map.getZoom() >= bVars.bgThreshold) {
        bVars.bgPointer = 1;
    } else {
        bVars.bgPointer = 0;
    }
    if (bVars.bgPointer !== bVars.bgTail) {
        if (bVars.bgPointer > bVars.bgTail) {
            addrUrl.urlBckgr = addrUrl.base + "config/" + bMap.varsArr.tc + "/web/binormal.txt";
        } else {
            addrUrl.urlBckgr = addrUrl.base + "config/" + bMap.varsArr.tc + "/web/bismall.txt";
        }
        bMap.map.removeLayer(bMap.bckgrIcons);
        delete bMap.bckgrIcons;
        bMap.setBckgrIcons();
        uServe.markerAboveBckgr();
    }
    bVars.bgTail = bVars.bgPointer;
};
uServe.resetSomNo = function() {
    if (bVars.somNo !== 0) {
        bVars.somNo = 0;
    }
};
uServe.resetMapControls = function(a) {
    if (++bVars.somNo < 2 && a === false) {
        return false;
    }
    bMap.map.controls[3].deactivate();
    setTimeout(function() {
        bMap.map.controls[3].activate();
        bMap.selectControl.deactivate();
        bMap.selectControl.activate();
    }, 100);
};
uBody.showFltStList = function() {
    var a = $("div#filter-stores");
    bVars.slType = 4;
    uServe.switchCountSlide();
    $("div#simple-slider").hide();
    if ($("div#fst-slider").length > 0) {
        $("div#fst-slider").show();
    } else {
        $.get(addrUrl.svapi("slider", bVars.slType), function() {
            uServe.loadSlider();
        });
    }
    $("div#stores").hide();
    $("div.img-filter").removeClass("img-filter-pass img-filter-act2").addClass("img-filter-act");
    $("div.full-list").removeClass("img-filter-act").addClass("img-filter-pass");
    if (a.length > 0) {
        a.show();
    } else {
        uServe.toggleLsContBckgr(true, true);
        $.get(addrUrl.loadBlock("filterlist"), function(b) {
            uServe.toggleLsContBckgr(false, true);
            $("div.rst-list-cont").append(b);
            uServe.setUpRstEl();
        });
    }
};
uBody.closeFltStList = function(b) {
    var a = $("div#filter-stores");
    if (!(a.length > 0)) {
        return false;
    }
    uServe.switchCountSlide();
    if (b) {
        a.remove();
        $("div.filter-cont").remove();
        $("div#fst-slider").remove();
    } else {
        a.hide();
        $("div#fst-slider").hide();
        $("div#stores").show();
        $("div#simple-slider").show();
        $("div.img-filter").removeClass("img-filter-act").addClass("img-filter-pass");
        $("div.full-list").removeClass("img-filter-pass img-filter-act2").addClass("img-filter-act");
    }
};
uServe.loadCntFilter = function() {
    $.getJSON(addrUrl.api + 22, function(a) {
        if (!a) {
            return false;
        }
        bVars.countSlideTC = bVars.countSlide;
        bVars.prevCountSlideTC = bVars.prevCountSlide;
        $.get(addrUrl.loadBlock("imgfilter"), function(b) {
            $("div.ls-header").append(b);
            $("div.full-list, div.img-filter").mouseenter(function() {
                if ($(this).hasClass("img-filter-pass")) {
                    $(this).removeClass("img-filter-pass").addClass("img-filter-act2");
                }
            }).mouseleave(function() {
                if ($(this).hasClass("img-filter-act2")) {
                    $(this).removeClass("img-filter-act2").addClass("img-filter-pass");
                }
            });
            if (!$.browser.msie) {
                $("div.full-list, div.img-filter").tooltipster({delay: 1000});
            }
            $("div.img-filter").on("click", uBody.showFltStList);
            $("div.full-list").on("click", function() {
                uBody.closeFltStList(false);
            });
        });
    });
};
uServe.switchCountSlide = function() {
    var b, a;
    b = bVars.countSlideTC;
    a = bVars.prevCountSlideTC;
    bVars.countSlideTC = bVars.countSlide;
    bVars.prevCountSlideTC = bVars.prevCountSlide;
    bVars.countSlide = b;
    bVars.prevCountSlide = a;
};
uServe.loadSlider = function() {
    $("div.close-wall").off("click").click(function() {
        uBody.closeWall(true);
    });
    clearTimeout(bVars.tLoadSlider);
    bVars.tLoadSlider = setTimeout(function() {
        $.get(addrUrl.loadBlock("slider"), function(a) {
            $.getJSON(addrUrl.vapi + "slides_num,gs_num", function(b) {
                bVars.slideLimit = b.slides_num;
                bVars.gsLimit = b.gs_num;
                bVars.countSlide = 0;
                bVars.prevCountSlide = 0;
                uBody.storesListThumb(0, true);
                if ($("div#simple-slider").length > 0 && bVars.slType !== 4) {
                    $("div#simple-slider").remove();
                }
                $("div.ls-header").append(a);
                if (bVars.slType === 2) {
                    $("div.back2scat").live("click", function() {
                        if (bVars.showTTS) {
                            uBody.showTTstores();
                        } else {
                            uBody.scatsWall(bVars.cat);
                        }
                    });
                    uServe.loadCntFilter();
                }
                uBody.dragHandler();
                uBody.slBtnDragHandler();
            });
        });
    }, 500);
};
uServe.chmEx = function() {
    if (typeof bMap.catChsMarkers !== "undefined" && bVars.chsmIdArr.length > 0) {
        return true;
    } else {
        return false;
    }
};
uServe.markSchList = function() {
    if (!($("div#schlist").length > 0)) {
        return false;
    }
    if ($("div#schlist").is(":visible")) {
        $("div#schlist").append("<input type='hidden' class='shw-sch-list' />");
    }
};
uServe.showHiddenMarker = function(b) {
    var a = false;
    for (var c in bVars.mArr) {
        if (bVars.mArr[c].planeID === bVars.store && bVars.mArr[c].onScreen()) {
            a = true;
        }
    }
    if (a) {
        bMap.map.zoomToMaxExtent();
    } else {
        bMap.map.moveTo(new OpenLayers.LonLat(b.x, b.y), bVars.rootScale);
    }
};
uServe.loadFile = function(a) {
    $("<form action='" + addrUrl.getFile
            + "' method='post'><input type='hidden' name='fileid' value='"
            + a + "' /></form>").appendTo("body").submit().remove();
};
uServe.setUpRstEl = function() {
    $("div.rst-el").click(function() {
        uBody.openMinisite($(this).attr("id"));
    }).mouseenter(function() {
        $(this).removeClass("rst-el-pass").addClass("cbtn-act2");
    }).mouseleave(function() {
        $(this).removeClass("cbtn-act2").addClass("rst-el-pass");
    });
};
uServe.rotateAL = function() {
    if ($.browser.msie) {
        return false;
    }
    $("div.pb-icon>div:eq(0)").rotate({
        angle: 0
        , animateTo: 360
        , callback: uServe.rotateAL
        , easing: function(d, b, f, c, a) {
            return c * (b / a) + f;
        }});
};
uServe.toggleLsContBckgr = function(b, a) {
    if (b) {
        $("div.list-cont").css("background-image", addrUrl.getImage("ajax-loader", "gif"));
        if (!a) {
            $("div.ls-header").hide();
            $("div.close-wall").hide();
        }
    } else {
        $("div.list-cont").css("background-image", "none");
        if (!a) {
            $("div.ls-header").delay(600).fadeIn();
            $("div.close-wall").fadeIn();
        }
    }
};
uServe.loadTopTen = function(a) {
    uBody.closeMinisite(false, true);
    uBody.closePList();
    $("td.mw").append("<div class='tt-cont'></div>");
    $("div.tt-cont").load(addrUrl.loadBlock("wall"), function() {
        if ($.browser.msie) {
            return false;
        }
        $.get(addrUrl.getLbl(118), function(b) {
            $(".ttcat-list").chosen({no_results_text: b}).change(function() {
                webWallSelectCatalogue(parseFloat($(".ttcat-list option:selected").val()));
            });
        });
        webWall(12, 57, "en", "uadmin.no-ip.biz:8080", a);
//        webWall(12, 57, "en", "192.167.1.2:8080", a);
        $("div.cls-wall-btn").on("click", uBody.closeTopTen);
    });
};
uBody.openTopTen = function() {
    if ($.browser.msie) {
        uServe.loadTopTen();
    } else {
        $.getJSON(addrUrl.getFCatId(), function(a) {
            if (!a) {
                return false;
            }
            uServe.loadTopTen(parseInt(a));
        });
    }
};
uBody.closeTopTen = function(a) {
    if (!($("div.tt-cont").length > 0)) {
        return false;
    }
    $("div.tt-cont").remove();
    if (!a || isNaN(a)) {
        uBody.openMinisite(bVars.store);
    }
    if ($.browser.msie) {
        $("div.top10-btn").removeClass("sm-btn-pass").addClass("sm-btn-pass");
    }
};
uBody.openPList = function() {
    $("div.pct-uplayer").hide();
    $("div.minisite").append("<div class='plist-cont'></div>");
    $("div.price-btn").off("click").on("click", uBody.closePList).removeClass("sm-btn-pass").addClass("cbtn-act");
    $("div.sm-btn").eq(bVars.pBtnNo).off("mouseenter").removeClass("cbtn-act2").off("mouseleave");
    $("div.plist-cont").load(addrUrl.loadBlock("plist"), function() {
        $(this).css("background-image", "none");
        if (!$.browser.msie && $(this).height() > 380) {
            $("div.price-list>div:eq(0)").wrap("<div id='asc-plist' class='antiscroll-inner'></div>");
            $("div.price-list").antiscroll();
        }
        $("div.plist-elem").click(function() {
            uServe.loadFile($(this).attr("id"));
        }).mouseenter(function() {
            $(this).removeClass("plist-elem-pass").addClass("plist-elem-act");
        }).mouseleave(function() {
            $(this).removeClass("plist-elem-act").addClass("plist-elem-pass");
        });
    });
};
uBody.closePList = function() {
    if (!($("div.plist-cont").length > 0)) {
        return false;
    }
    $("div.price-btn").off("click").on("click", uBody.openPList)
            .removeClass("cbtn-act").addClass("sm-btn-pass");
    $("div.sm-btn").eq(bVars.pBtnNo).mouseenter(function() {
        $(this).removeClass("sm-btn-pass").addClass("cbtn-act2");
    }).mouseleave(function() {
        $(this).removeClass("cbtn-act2").addClass("sm-btn-pass");
    });
    $("div.plist-cont").remove();
    $("div.pct-uplayer").show();
};
uBody.closeMinisite = function(b, a, c) {
    if ($("div.minisite-cont").length < 1) {
        return false;
    }
    uServe.resetMapControls();
    if (b) {
        if (uServe.chmEx()) {
            if (bVars.pmType === 1
                    && $("div.rst-list-cont").length > 0
                    && $("div.rst-list-cont").attr("style") !== "display: none;"
                    || bVars.pmType === 2
                    && $("input.shw-sch-list").length > 0) {
                $("div.list-cont").show();
                a = true;
            } else {
                uServe.toggleListBtn(true);
            }
            if (bVars.pmType === 2) {
                uBody.makeCbtnPass();
            }
        } else {
            if (!c) {
                uBody.toggleCbtn();
                uBody.makeCbtnPass();
                bMap.clearStore();
                uBody.toggleMapBtn();
                uBody.closeWall(true);
                if (bMap.map.getZoom() <= 1) {
                    uBody.showStandByStores();
                }
            }
        }
        uBody.closeTopTen(true);
        $("div.minisite-cont").remove();
    } else {
        $("div.minisite-cont").hide();
    }
    if (!a) {
        uServe.toggleMap(true);
    }
};
uBody.loadMinisite = function(b, a) {
    if (!($("div.minisite-cont").length > 0)) {
        $("td.mw").append("<div class='minisite-cont'></div>");
    }
    $("div.minisite-cont").load(addrUrl.loadBlock("minisite"), function() {
        if ($("div.info-content").height() > 190) {
            $("div.info-text").wrap("<div id='asc-stdescr' class='antiscroll-inner'></div>");
            $("div.info-content").antiscroll();
        }
        $("div.cls-btn-cross").click(function() {
            if (b === 0) {
                uBody.back2root();
                return false;
            }
            if (bVars.pmType === 2) {
                uBody.toggleCbtn();
            }
            uBody.closeMinisite(true);
        });
        $("div.storemap-btn").click(function() {
            if (b === 0) {
                uBody.back2root();
            } else {
                bMap.storeOnMap();
            }
        });
        if ($("div.top10-btn").length > 0) {
            $("div.top10-btn").on("click", uBody.openTopTen);
        }
        if ($("div.price-btn").length > 0) {
            $("div.price-btn").on("click", uBody.openPList);
            bVars.pBtnNo = parseFloat($("div.price-btn").attr("id"));
        }
        if ($("div.video-btn").length > 0) {
            $("div.video-btn").on("click", uBody.openVideo);
        }
        $("div.sm-btn").mouseenter(function() {
            if ($(this).hasClass("sm-btn-pass")) {
                $(this).removeClass("sm-btn-pass").addClass("cbtn-act2");
            }
        }).mouseleave(function() {
            if ($(this).hasClass("cbtn-act2")) {
                $(this).removeClass("cbtn-act2").addClass("sm-btn-pass");
            }
        });
        uBody.toggleMapBtn(true);
        if (bVars.showStSw) {
            bVars.showStSw = false;
        }
    });
};
uBody.openMinisite = function(b, a) {
    if (bVars.dragCrit) {
        return false;
    }
    var c = false;
    uServe.toggleMap();
    if (a && bVars.store !== b) {
        uBody.toggleCbtn();
    }
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
    if ($("div.minisite-cont").length > 0) {
        if (bVars.store === b) {
            $("div.minisite-cont").show();
            return false;
        } else {
            $("div.minisite-cont").remove();
        }
    }
    bVars.store = b;
    $.get(addrUrl.svapi("store", bVars.store), function() {
        if (bVars.store === 0) {
            uBody.loadMinisite(bVars.store);
            uBody.toggleCbtn();
            uBody.makeCbtnPass();
            return false;
        }
        if (a) {
            $.get(addrUrl.getStoreCat(bVars.store), function(d) {
                uBody.makeCbtnPass();
                if (isNaN(d)) {
                    bVars.cat = 16;
                    uBody.makeCbtnAct();
                } else {
                    bVars.cat = parseFloat(d);
                    if (uServe.inArray(bVars.cat, bVars.specCat)) {
                        uBody.makeCbtnAct();
                    } else {
                        uBody.toggleCbtn(true);
                    }
                }
                bVars.divcbtnNo = bVars.cat;
                uBody.loadMinisite(bVars.store);
                if (bVars.pmType != 2) {
                    bMap.clearChsMarkers();
                }
            });
        } else {
            uBody.loadMinisite(bVars.store);
        }
    })
};
bMap.zoomBox = function() {
    OpenLayers.Control.CustomNavToolbar = OpenLayers.Class(OpenLayers.Control.Panel, {initialize: function(a) {
            OpenLayers.Control.Panel.prototype.initialize.apply(this, [a]);
            this.addControls([new OpenLayers.Control.Navigation({dragPanOptions: {enableKinetic: true}}), new OpenLayers.Control.ZoomBox({alwaysZoom: true})]);
            this.displayClass = "olControlNavToolbar";
        }, draw: function() {
            var a = OpenLayers.Control.Panel.prototype.draw.apply(this, arguments);
            this.defaultControl = this.controls[0];
            return a;
        }});
};
bMap.setMarkers = function() {
    var b;
    var a = [];
    var c = [];
    $.getJSON(addrUrl.markers(), function(data) {
        a.length = 0;
        $.each(data, function(f, e) {
            $.each(e, function(h, g) {
                b = parseFloat(h);
                if (uServe.chmEx()
                        && uServe.inArray(b, bVars.chsmIdArr)
                        || bVars.somCrit && b === bVars.store
                        || typeof bMap.ppm !== "undefined"
                        && g[2] === bMap.varsArr.bankers) {
                    return true;
                }
                if (!uServe.inArray(b, bVars.mIdArr)) {
                    uServe.addNewMarker({x: g[0], y: g[1], icat: g[2], store: b}, 1);
                }
                a.push(b);
            });
        });
        c = uServe.arrSub(bVars.mIdArr, a);
        if (c.length > 0) {
            $.each(c, function(g, f) {
                if (f === bVars.store) {
                    return true;
                }
                for (var h in bVars.mArr) {
                    if (bVars.mArr[h].planeID === f) {
                        bMap.markers.removeMarker(bVars.mArr[h]);
                        bVars.mArr.splice(h, 1);
                    }
                }
            });
        }
        bVars.mIdArr = a;
    });
};
bMap.clearBckgrIcons = function() {
    if (!($("div.olPopup").length > 0)) {
        return false;
    }
    $("div.olPopup").remove();
};
bMap.setBckgrIcons = function() {
    if (typeof bMap.bckgrIcons !== "undefined") {
        return false;
    }
    bMap.bckgrIcons = new OpenLayers.Layer.Vector("POIs", {
        strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})]
        , protocol: new OpenLayers.Protocol.HTTP({
            url: addrUrl.urlBckgr
            , format: new OpenLayers.Format.Text
        })
    });
    bMap.map.addLayer(bMap.bckgrIcons);
    bMap.selectControl = new OpenLayers.Control.SelectFeature(bMap.bckgrIcons);
    bMap.map.addControl(bMap.selectControl);
    bMap.selectControl.activate();
    bMap.bckgrIcons.events.on({
        featureselected: uBody.onFeatureSelect
        , featureunselected: uBody.onFeatureUnselect
    });
};
bMap.clearPopupMarkers = function() {
    if (typeof bMap.ppm === "undefined") {
        return false;
    }
    bMap.map.removeLayer(bMap.ppm);
    delete bMap.ppm;
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.ppCoords, function(b, a) {
            uServe.addNewMarker({x: a.x, y: a.y, icat: a.icat, store: a.id}, 1);
        });
    }
    bMap.ppCoords.length = 0;
};
bMap.setPopupMarkers = function(d) {
    if (typeof bMap.ppm !== "undefined") {
        return false;
    }
    var languageCode = "df";
    uBody.closeWall(true, true);
    uBody.closeMinisite();
    uBody.closeTopTen(true);
    uServe.toggleMap(true);
    uBody.toggleMapBtn(true);
    bMap.clearStore();
    bMap.clearBckgrIcons();
    bMap.clearChsMarkers();
    bVars.cat = d;
    uBody.toggleCbtn();
    uBody.makeCbtnAct();
    bMap.map.zoomToMaxExtent();
    bMap.ppm = new OpenLayers.Layer.Markers("ppm");
    bMap.map.addLayer(bMap.ppm);
    bMap.ppm.setZIndex(752);
    $.getJSON(addrUrl.api + 3, function(g) {
        // Removes "favourites" icons as a part of the "finance" controller execution.
        if (bVars.controlFinance) {
            bVars.controlFinance = false;
            bMap.clearChsMarkers();
        }
        $.each(g, function(i, mapObject) {
            var layer = (new OpenLayers.LonLat(mapObject.x, mapObject.y))
                    .transform(new OpenLayers.Projection("EPSG:4326"), bMap.map.getProjectionObject());
            var parsedJson = $.parseJSON(mapObject["descr_" + languageCode]);
            if (parsedJson === null
                    || typeof(parsedJson.type) === 'undefined'
                    || typeof(parsedJson.name) === 'undefined') {
                return true;
            }
            var dimensions = null;
            var icon = null;
            if (parsedJson.type === 'bank') {
                dimensions = new OpenLayers.Size(86, 16);
                icon = new OpenLayers.Icon(addrUrl.base + "graphics/cmi/icon-bank.png"
                        , dimensions, new OpenLayers.Pixel(-(dimensions.w / 2), -dimensions.h));
            } else if (parsedJson.type === 'exchange') {
                dimensions = new OpenLayers.Size(77, 16);
                icon = new OpenLayers.Icon(addrUrl.base + "graphics/cmi/icon-exchange.png"
                        , dimensions, new OpenLayers.Pixel(-(dimensions.w / 2), -dimensions.h));
            }
            bMap.ppCoords.push({
                id: mapObject.id
                , x: mapObject.x
                , y: mapObject.y
                , icat: bMap.varsArr.bankers
            });
            var marker = new OpenLayers.Marker(layer, icon);
            marker.events.register("mouseup", bMap.ppm, function(k) {
                if (bVars.openStore) {
                    uBody.openMinisite(mapObject.id, true);
                }
                OpenLayers.Event.stop(k);
            });
            bMap.ppm.addMarker(marker);
            $(bMap.ppm.markers[i]["events"]["element"])
                    .append("<span class='cit " + i + "'>" + parsedJson.name + "</span><br/>");
        });
    });
};
uBody.stopMeasureCont = function(a) {
    $("div#smap").off("mousemove", uBody.moveMeasureCont).off("dblclick", uBody.stopMeasureCont);
    $("div.olLayerDiv").off("click", uServe.showMeasureCont);
    if (a === true) {
        $("div.olLayerDiv").off("click", uServe.showMeasureCont);
    } else {
        $("div.olLayerDiv").on("click", uServe.showMeasureCont);
    }
};
uBody.moveMeasureCont = function(a) {
    if ($("div.measure-cont").is(":hidden")) {
        $("div.measure-cont").show();
        $("div.measure-cls").on("click", bMap.clearMeasure);
    }
    uServe.setUpElems();
    $("div.measure-cont").css({left: a.pageX + uElem.measureCont.x, top: a.pageY + uElem.measureCont.y});
};
uBody.handleMeasurements = function(g) {
    var c;
    var j = "м";
    var f = "км";
    var b = 17.34121;
    var d = 1000;
    var h = Math.round(g.measure.toFixed(3) / b);
    if (h > d) {
        var a = Math.floor(h / d);
        c = a + " " + f + " " + (h - a * 1000) + " " + j;
    } else {
        c = h + " " + j
    }
    document.getElementById("measure-otp").innerHTML = c;
};
bMap.setMeasure = function() {
    $.getJSON(addrUrl.vapi + "shnomore", function(f) {
        if (parseFloat(f.shnomore) != 1) {
            $.get(addrUrl.getLbl(138), function(g) {
                uBody.openMsgBox(137, "<p /><input type='checkbox' class='show-no-more' /> " + g, uServe.msgShowNoMore);
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
    var c = {Line: {strokeWidth: 3, strokeOpacity: 1, strokeColor: "#6456e1", strokeDashstyle: "solid"}};
    var a = new OpenLayers.Style;
    a.addRules([new OpenLayers.Rule({symbolizer: c})]);
    var d = new OpenLayers.StyleMap({"default": a});
    var b = OpenLayers.Util.getParameters(window.location.href).renderer;
    b = b ? [b] : OpenLayers.Layer.Vector.prototype.renderers;
    bMap.measureControls = {line: new OpenLayers.Control.Measure(OpenLayers.Handler.Path, {persist: true, handlerOptions: {layerOptions: {renderers: b, styleMap: d}}, geodesic: true})};
    bMap.measureLine = bMap.measureControls.line;
    bMap.measureLine.events.on({measure: uBody.handleMeasurements, measurepartial: uBody.handleMeasurements});
    bMap.map.addControl(bMap.measureLine);
    bMap.measureLine.activate();
};
bMap.clearMeasure = function(a) {
    if (typeof bMap.measureLine == "undefined" || bVars.mlAlrClsd) {
        return;
    }
    bVars.mlAlrClsd = true;
    if (a !== true && bMap.map.getZoom() <= 1) {
        uBody.showStandByStores();
    }
    $("div.measure-switch").removeClass("measure-act").addClass("measure-pass").off("click", bMap.clearMeasure).on("click", bMap.setMeasure);
    uBody.stopMeasureCont(true);
    $("span#measure-otp").text("");
    $("div.measure-cont").css({left: 0, top: 0}).hide();
    $("div.measure-cls").off("click");
    bMap.measureLine.deactivate();
    bMap.map.removeControl(bMap.measureLine);
};
bMap.setMap = function(parentNodeId) {
    var extent = new OpenLayers.Bounds(bMap.mSmBounds.lbx, bMap.mSmBounds.lby
            , bMap.mSmBounds.rtx, bMap.mSmBounds.rty);
    var zoomLimit = new OpenLayers.Bounds(36.29508, 50.00170, 36.30534, 50.00756);
    bMap.zoomBox();
    bMap.keyboardnav = new OpenLayers.Control.KeyboardDefaults;
    var options = {
        projection: "EPSG:4326"
        , controls: [new OpenLayers.Control.PanZoomBar, bMap.keyboardnav]
        , restrictedExtent: extent
        , maxExtent: extent
        , numZoomLevels: 7
        , maxResolution: "auto"
    };
    bMap.map = new OpenLayers.Map(parentNodeId, options);
    bMap.map.addLayer(new OpenLayers.Layer.WMS(
            "Barabashovo"
            , "http://uadmin.no-ip.biz:8080/geoserver/uniqoom/wms"
                + '?BGCOLOR=0xf4f3f0&TRANSPARENT=false'
            , {layers: "2013-07-14", format: "image/png"})
    );
    bMap.map.addControl(new OpenLayers.Control.CustomNavToolbar);
    bMap.map.addControl(new OpenLayers.Control.OverviewMap({maximized: false, autoPan: true}));
    bMap.setBckgrIcons();
    bMap.map.events.register("move", null, bMap.controlScale);
    bMap.map.zoomToExtent(zoomLimit);
};
bMap.dragControlOn = function() {
    bMap.dcSwitch = new OpenLayers.Control.DragPan({map: bMap.map, panMapDone: function(a) {
            bMap.map.userdragged = true;
            uServe.holdOpnStr();
            bMap.setMarkers();
        }});
    bMap.dcSwitch.draw();
    bMap.map.addControl(bMap.dcSwitch);
    bMap.dcSwitch.activate();
};
bMap.dragControlOff = function() {
    bMap.map.removeControl(bMap.dcSwitch);
    bMap.dcSwitch.deactivate();
};
bMap.controlScale = function() {
    if (bMap.map.getZoom() >= bVars.maxScale) {
        if (typeof bMap.markers === "undefined") {
            bMap.markers = new OpenLayers.Layer.Markers("Markers");
            bMap.map.addLayer(bMap.markers);
            uServe.markerAboveBckgr();
            bMap.dragControlOn();
        }
        clearTimeout(bVars.tMapMove);
        bVars.tMapMove = setTimeout(function() {
            bMap.setMarkers();
        }, 500);
    } else {
        if (typeof bMap.markers !== "undefined") {
            bVars.mIdArr.length = 0;
            bMap.map.removeLayer(bMap.markers);
            delete bMap.markers;
            bMap.dragControlOff();
        }
    }
    uServe.holdOpnStr();
    uBody.toggleMapBtn(true);
    uServe.toggleBckgr();
    uServe.respiteSCS();
};
bMap.storeOnMap = function() {
    uServe.resetMapControls();
    uBody.closeMinisite();
    bMap.clearStore();
    bMap.clearChsMarkers();
    uBody.toggleAddCbtn(true);
    if (bVars.cat === bMap.varsArr.bankers) {
        bMap.clearPopupMarkers();
    }
    $.getJSON(addrUrl.api + 9, function(a) {
        if (a[0]["x"] === null) {
            return false;
        }
        bVars.somCrit = true;
        bMap.chsMarker = new OpenLayers.Layer.Markers("chsMarker");
        bMap.map.addLayer(bMap.chsMarker);
        bMap.stCoords.push({x: a[0]["x"], y: a[0]["y"], icat: bVars.cat});
        uServe.addNewMarker(bMap.stCoords[0], 2);
        uServe.showHiddenMarker({x: bMap.stCoords[0]["x"], y: bMap.stCoords[0]["y"]});
        uServe.markerAboveBckgr();
        // Removes pathfinder layer.
        if (bMap.layerPath !== null) {
            bMap.map.removeLayer(bMap.layerPath);
            bMap.layerPath = null;
        }
        // Shows a pathfinder dialog.
        var destName = $('.info-text span b').text();
        pathfinder.show(destName, a[0]['x'], a[0]['y']);
    });
};
bMap.clearStore = function() {
    if (!bVars.somCrit || typeof bMap.chsMarker === "undefined") {
        return false;
    }
    bVars.somCrit = false;
    uBody.toggleAddCbtn();
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.stCoords, function(b, a) {
            uServe.addNewMarker({x: a.x, y: a.y, icat: a.icat, store: bVars.store}, 1);
        });
    }
    bVars.store = null;
    bMap.stCoords.length = 0;
    bMap.map.removeLayer(bMap.chsMarker);
    delete bMap.chsMarker;
};
bMap.clearChsMarkers = function() {
    if (!uServe.chmEx()) {
        return false;
    }
    if (bMap.map.getZoom() >= bVars.maxScale) {
        $.each(bMap.chmCoords, function(b, a) {
            uServe.addNewMarker({x: a.x, y: a.y, icat: a.icat, store: a.store}, 1);
        });
    }
    uServe.toggleListBtn(false);
    bVars.chsmIdArr.length = 0;
    bMap.chmCoords.length = 0;
    bMap.map.removeLayer(bMap.catChsMarkers);
    delete bMap.catChsMarkers;
};
bMap.scaleByHint = function() {
    bMap.map.zoomTo(bVars.maxScale);
};
uBody.toggleCbtn = function(b) {
    var a = $("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0;
    if (b && !a) {
        var c;
        if ($.browser.webkit) {
            mspTF = 1;
            mspBF = 2;
            mspTB = 1;
            mspBB = 0;
        } else {
            if ($.browser.mozilla) {
                mspTF = 0;
                mspBF = 3;
                mspTB = 0;
                mspBB = 1;
            } else {
                if ($.browser.opera) {
                    mspTF = 0;
                    mspBF = 2;
                    mspTB = 0;
                    mspBB = 0;
                } else {
                    if ($.browser.msie) {
                        mspTF = 0;
                        mspBF = 0;
                        mspTB = 0;
                        mspBB = 0;
                    }
                }
            }
        }
        if ($("div.rst-list-cont").length > 0) {
            $("div.list-cont").remove();
        }
        $("div.cbtn" + bVars.cat).removeClass("cbtn-act cbtn-pass").css({"margin-top": mspTF + "px", "margin-bottom": mspBF + "px"}).off("click");
        $("div.ci-cont" + bVars.cat).wrap("<div class='ci-cont-bckgr'></div>").on("click", uBody.scatsWall);
        $.get(addrUrl.getLbl(123), function(d) {
            $("div.ci-cont-bckgr").attr("title", d + " " + $(".cn-cont" + bVars.cat + " span.cname").text());
            if (!$.browser.msie) {
                $("div.ci-cont-bckgr").tooltipster({});
            }
        });
        $(".cn-cont" + bVars.cat + " span.cname").hide();
        $("div.cn-cont" + bVars.cat).wrap("<div class='cn-cont-bckgr'></div>");
        uServe.setUpElems();
        uElem.cnCont.append(uElem.scName);
        $.get(addrUrl.getScatName(), function(d) {
            $("span#scname").text(d);
        });
        $.get(addrUrl.getLbl(122), function(d) {
            $("div.cn-cont-bckgr").attr("title", d).on("click", uBody.showTTstores);
            if (!$.browser.msie) {
                $("div.cn-cont-bckgr").tooltipster({delay: 700});
            }
        });
        uBody.makeSiBtnPass();
    } else {
        if (!b && a) {
            $("div.tooltip-message").remove();
            $("div.ci-cont" + bVars.divcbtnNo).unwrap().off("click", uBody.scatsWall);
            $("div.cn-cont" + bVars.divcbtnNo).unwrap().off("click", uBody.storesWall);
            $("div.cbtn" + bVars.divcbtnNo).css({"margin-top": mspTB + "px", "margin-bottom": mspBB + "px"}).click(function() {
                uBody.scatsWall(parseFloat($(this).attr("id")));
            });
            $("span#scname").remove();
            $(".cn-cont" + bVars.divcbtnNo + " span").show();
        }
    }
};
uBody.makeCbtnAct = function() {
    if (bVars.cat == null) {
        return false;
    }
    $("div.cbtn" + bVars.cat).removeClass("cbtn-act2 cbtn-pass").addClass("cbtn-act");
    if (typeof bVars.divcbtnNo != null && bVars.divcbtnNo != bVars.cat) {
        uBody.makeCbtnPass();
    }
    bVars.divcbtnNo = bVars.cat;
    uBody.makeSiBtnPass();
};
uBody.makeCbtnPass = function() {
    if ($("div.cbtn" + bVars.divcbtnNo).hasClass("cbtn-pass") || $("div.ci-cont-bckgr").length > 0 && $("div.cn-cont-bckgr").length > 0) {
        return false;
    }
    $("div.cbtn" + bVars.divcbtnNo).removeClass("cbtn-act").addClass("cbtn-pass");
};
uBody.makeSiBtnAct = function() {
    uBody.makeCbtnPass();
    $("div.sibtn").removeClass("sibtn-act2").addClass("sibtn-act");
};
uBody.makeSiBtnPass = function() {
    $("div.sibtn").removeClass("sibtn-act").addClass("sibtn-pass");
    $.get(addrUrl.getLbl(10), function(a) {
        uElem.siBtnName.text(a);
    });
};
uBody.toggleMapBtn = function(a) {
    clearTimeout(bVars.tbToRoot);
    bVars.tbToRoot = setTimeout(function() {
        var b = bVars.somCrit || typeof bMap.ppm != "undefined" || $("div.olPopup").length > 0 || uServe.chmEx() && bVars.pmType != 3 || $("div.list-cont").length > 0 || $("div.minisite-cont").length > 0 || bMap.map.getZoom() > bVars.rootScale;
        if (a && b) {
            $.get(addrUrl.getLbl(112), function(c) {
                $(".map-btn").removeClass("map-btn-act").addClass("map-btn-pass").on("click", uBody.back2root);
                uElem.mBtnCont.text(c);
            });
        } else {
            if (!b) {
                $.get(addrUrl.getLbl(108), function(c) {
                    $(".map-btn").removeClass("map-btn-pass").addClass("map-btn-act").off("click", uBody.back2root);
                    uElem.mBtnCont.text(c);
                    uServe.setUpElems();
                    if (uElem.schField.length > 0) {
                        if ($.browser.msie) {
                            document.getElementById("sch-field").value = "";
                            $.get(addrUrl.getLbl(105), function(d) {
                                uServe.add_placeholder("sch-field", d);
                            });
                        } else {
                            $("input#sch-field").val("")
                        }
                    }
                });
            }
        }
    }, 300);
};
uBody.closeWall = function(b, a) {
    if ($("div.list-cont").length < 1) {
        return false;
    }
    if (b) {
        uServe.toggleMap(true);
        if ($("div.list-cont").is(":visible")) {
            if (bVars.pmType == 1 && $("div.rst-list-cont").length > 0) {
                uServe.toggleListBtn(true);
                $("div.list-cont").hide();
                $("div.rst-list-cont").hide();
                return false;
            } else {
                if (bVars.pmType == 2) {
                    bMap.clearChsMarkers();
                }
            }
        }
        $.get(addrUrl.svapi("scat", null));
        $("div.list-cont").remove();
        uBody.makeCbtnPass();
        bVars.cat = null;
        if (!a) {
            uBody.toggleMapBtn();
        }
    } else {
        $("div#scats").hide();
        $("div.list-cont").hide();
    }
};
uBody.showTTstores = function() {
    uBody.closeMinisite(true, true, true);
    uBody.toggleAddCbtn();
    uServe.resetMapControls(true);
    if ($("div.tooltip-message").length > 0) {
        $("div.tooltip-message").remove();
    }
    if (uServe.chmEx() && bVars.pmType == 1) {
        if ($("div.list-cont:visible").length > 0) {
            uBody.closeWall(true);
        }
        uServe.toggleMap(true);
    } else {
        if (bVars.pmType == 2) {
            $("div.list-cont").remove();
        }
        bVars.pmType = 1;
        uBody.togglePB(true);
        $.getJSON(addrUrl.getPrmSt(), function(a) {
            if (a) {
                uBody.showSpm(a, true);
            } else {
                return false;
            }
        });
    }
};
uBody.storesListThumb = function(b, a) {
    if (!a && (bVars.dragSlBtnCrit || b == bVars.countSlide)) {
        return false;
    }
    bVars.countSlide = b;
    bVars.ssCorrVal = bVars.countSlide * bVars.ssCorr;
    if (!a) {
        uBody.moveSlides(true);
    }
};
uBody.protectLimits = function(a) {
    switch (a) {
        case 0:
            clearTimeout(bVars.allowSlBtnProtect);
            if (bVars.slBtnStepCount - 1 < 0 || bVars.slBtnStepCount + 1 == bVars.gsLimit) {
                bVars.allowSlBtnProtect = setTimeout(function() {
                    $("div.ls-btn-cont").mouseup();
                }, 100);
            }
            break;
        case 1:
            clearTimeout(bVars.allowProtect);
            if (bVars.countSlide + 1 == bVars.slideLimit || bVars.countSlide == 0) {
                bVars.allowProtect = setTimeout(function() {
                    $("div.slides-cont").mouseup();
                }, 250);
            }
            break
        }
};
uBody.slidePrev = function() {
    if (bVars.countSlide - 1 >= 0) {
        bVars.countSlide--;
        bVars.ssCorrVal -= bVars.ssCorr;
    }
};
uBody.slideNext = function() {
    if (bVars.countSlide + 1 < bVars.slideLimit) {
        bVars.countSlide++;
        bVars.ssCorrVal += bVars.ssCorr;
    }
};
uBody.moveSlides = function(c) {
    uServe.setUpElems();
    var a, d;
    if ($("div#scats:visible").length > 0) {
        a = $("div.lsbtn-simple-slider");
        d = $("div#scats>div.slides-cont");
    } else {
        if ($("div#stores:visible").length > 0) {
            a = $("div.lsbtn-simple-slider");
            d = $("div#stores>div.slides-cont");
        } else {
            if ($("div#fst-slider:visible").length > 0) {
                a = $("div.lsbtn-fst-slider");
                d = $("div#filter-stores>div.slides-cont");
            } else {
                if ($("div#schlist:visible").length > 0) {
                    a = $("div.lsbtn-simple-slider");
                    d = $("div#schlist>div.slides-cont");
                } else {
                    if ($("div#si:visible").length > 0) {
                        a = $("div.lsbtn-simple-slider");
                        d = $("div#si>div.slides-cont");
                    }
                }
            }
        }
    }
    if (a.length == 0) {
        return false;
    }
    if (!c) {
        if (bVars.slideBegPos < bVars.slideEndPos) {
            if (bMap.varsArr.wdir == "rtl") {
                uBody.slideNext();
            } else {
                if (bMap.varsArr.wdir == "ltr") {
                    uBody.slidePrev();
                }
            }
        } else {
            if (bMap.varsArr.wdir == "rtl") {
                uBody.slidePrev();
            } else {
                if (bMap.varsArr.wdir == "ltr") {
                    uBody.slideNext();
                }
            }
        }
    }
    if (bMap.varsArr.wdir == "rtl") {
        d.animate({left: bVars.slideStep + "px"}, "fast");
    } else {
        if (bMap.varsArr.wdir == "ltr") {
            d.animate({left: (bVars.slideStep * bVars.countSlide - bVars.ssCorrVal) * -1 + "px"}, "fast");
        }
    }
    if (bVars.countSlide != bVars.prevCountSlide) {
        a.eq(bVars.countSlide).removeClass("ls-btn-pass").addClass("ls-btn-act");
        a.eq(bVars.prevCountSlide).removeClass("ls-btn-act").addClass("ls-btn-pass");
    }
    if (!c && bVars.gsLimit > 1) {
        var b = 9;
        if (bVars.countSlide == b * (bVars.slBtnStepCount + 1) + (bVars.slBtnStepCount + 1) && bVars.countSlide > bVars.prevCountSlide) {
            if (bMap.varsArr.wdir == "rtl") {
                uBody.moveLsBtn(1);
            } else {
                if (bMap.varsArr.wdir == "ltr") {
                    uBody.moveLsBtn(0);
                }
            }
        }
        if (bVars.countSlide == b * bVars.slBtnStepCount + (bVars.slBtnStepCount - 1) && bVars.countSlide < bVars.prevCountSlide) {
            if (bMap.varsArr.wdir == "rtl") {
                uBody.moveLsBtn(0);
            } else {
                if (bMap.varsArr.wdir == "ltr") {
                    uBody.moveLsBtn(1);
                }
            }
        }
    }
    bVars.prevCountSlide = bVars.countSlide;
};
uBody.dragHandler = function() {
    if ($("div.list-slider").length > 0) {
        var a;
        $("div.ls-btn").click(function() {
            if ($("div#fst-slider:visible").length > 0) {
                a = $("div.lsbtn-fst-slider")
            } else {
                a = $("div.lsbtn-simple-slider")
            }
            uBody.storesListThumb(a.index(this))
        }).mouseover(function() {
            $(this).removeClass("ls-btn-pass").addClass("ls-btn-act2")
        }).mouseleave(function() {
            $(this).removeClass("ls-btn-act2").addClass("ls-btn-pass")
        })
    }
    $("div.slides-cont").draggable({axis: "x", iframeFix: true, distance: 50, start: function(c, b) {
            clearTimeout(bVars.allowClick);
            bVars.dragCrit = true;
            bVars.slideBegPos = b.position.left;
            uBody.protectLimits(1)
        }, stop: function(c, b) {
            bVars.allowClick = setTimeout(function() {
                bVars.dragCrit = false
            }, 500);
            bVars.slideEndPos = b.position.left;
            uBody.moveSlides()
        }})
};
uBody.storesWall = function() {
    if ($("div.minisite-cont:visible").length > 0) {
        uBody.closeMinisite(true, true)
    }
    var a = false;
    bVars.slType = 2;
    uServe.toggleListBtn(false);
    uServe.toggleMap();
    if ($("div.rst-list-cont").length > 0) {
        $("div.list-cont").show();
        $("div.rst-list-cont").show();
        return false
    }
    uServe.resetGsNum();
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>");
        a = true
    }
    $("div.list-cont:hidden").show();
    $("div.list-cont").append("<div class='rst-list-cont'></div>");
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.rst-list-cont").load(addrUrl.loadBlock("stlist"), function() {
            uServe.toggleLsContBckgr();
            if (a) {
                $("div.list-cont").css("background-image", "none")
            }
            uServe.setUpRstEl();
            if ($("div.ls-header").length > 0) {
                uServe.loadSlider()
            } else {
                $.get(addrUrl.loadBlock("wallheader"), function(b) {
                    $("div.stores-container").append(b);
                    $("div.ls-header").css({left: "0px", top: "-52px"});
                    $("div.close-wall").css({left: "657px", top: "-49px"});
                    uServe.loadSlider()
                })
            }
        })
    })
};
uBody.scatsWall = function(b) {
    if (bVars.dragCrit) {
        return false
    }
    var a;
    bVars.slType = 1;
    if (!uBody.closeMinisite(true)) {
        bVars.store = null
    }
    if (isNaN(b)) {
        a = false
    } else {
        a = bVars.cat != b;
        bVars.cat = b
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
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>");
        bMap.clearMeasure(true)
    } else {
        if (!($("div.rst-list-cont").length > 0) && !a) {
            $("div.list-cont").show();
            $("div#scats").show();
            return false
        } else {
            if ($("div.rst-list-cont").length > 0) {
                $("div.rst-list-cont").remove();
                uBody.closeFltStList(true)
            }
        }
    }
    $.get(addrUrl.svapi("cat,slider", bVars.cat + "," + bVars.slType), function() {
        $("div.list-cont").show().load(addrUrl.loadBlock("ellist"), function() {
            $("div.list-cont").css("background-image", "none");
            $("div.store-btn-bckgr").click(function() {
                bVars.pmType = 1;
                uBody.togglePB(true);
                $.get(addrUrl.svapi("scat", $(this).attr("id")), function() {
                    $.getJSON(addrUrl.getPrmSt(), function(c) {
                        if (c) {
                            bVars.showTTS = true;
                            uBody.showSpm(c)
                        } else {
                            bVars.showTTS = false;
                            uBody.togglePB();
                            uBody.closeWall();
                            uBody.storesWall();
                            uServe.toggleListBtn(false)
                        }
                    })
                })
            }).mouseenter(function() {
                $(this).removeClass("store-btn-bckgr-pass").addClass("cbtn-act2")
            }).mouseleave(function() {
                $(this).removeClass("cbtn-act2").addClass("store-btn-bckgr-pass")
            });
            uServe.loadSlider()
        });
        uBody.toggleMapBtn(true)
    })
};
uBody.schWall = function() {
    if (uElem.schField.length == 0) {
        return false
    }
    bVars.slType = 3;
    uServe.toggleListBtn(false);
    uServe.toggleMap();
    uServe.resetGsNum();
    uServe.resetSomNo();
    if ($("div.list-cont").length > 0) {
        $("div.list-cont").show()
    } else {
        $("td.mw").append("<div class='list-cont'></div>")
    }
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.list-cont").load(addrUrl.loadBlock("schlist"), function() {
            $("div.list-cont").css("background-image", "none");
            $("div.store-btn-bckgr").click(function() {
                uBody.openMinisite($(this).attr("id"), true)
            }).mouseenter(function() {
                $(this).removeClass("store-btn-bckgr-pass").addClass("cbtn-act2")
            }).mouseleave(function() {
                $(this).removeClass("cbtn-act2").addClass("store-btn-bckgr-pass")
            });
            uServe.loadSlider()
        })
    })
};
uBody.slBtnDragHandler = function() {
    if (!($("div.ls-move").length > 0)) {
        return false
    }
    $("div.ls-btn-cont").draggable({axis: "x", iframeFix: true, distance: 50, start: function(b, a) {
            clearTimeout(bVars.allowSlBtnClick);
            bVars.dragSlBtnCrit = true;
            bVars.slBtnSlideBegPos = a.position.left;
            uBody.protectLimits(0)
        }, stop: function(b, a) {
            bVars.allowSlBtnClick = setTimeout(function() {
                bVars.dragSlBtnCrit = false
            }, 500);
            if (bVars.slBtnSlideBegPos < a.position.left) {
                uBody.moveLsBtn(1)
            } else {
                uBody.moveLsBtn(0)
            }
        }});
    $("div.ls-move").click(function() {
        if ($(this).hasClass("ls-move-act")) {
            return false
        }
        if (bMap.varsArr.wdir == "rtl") {
            if ($(this).attr("id") == "beg") {
                uBody.moveLsBtn(0)
            } else {
                if ($(this).attr("id") == "end") {
                    uBody.moveLsBtn(1)
                }
            }
        } else {
            if (bMap.varsArr.wdir == "ltr") {
                if ($(this).attr("id") == "beg") {
                    uBody.moveLsBtn(1)
                } else {
                    if ($(this).attr("id") == "end") {
                        uBody.moveLsBtn(0)
                    }
                }
            }
        }
    })
};
uBody.moveLsBtn = function(d) {
    if (bVars.moveLsBtnLimiter) {
        return false
    }
    var b = 277;
    var f = 3;
    var c = false;
    var a = false;
    bVars.moveLsBtnLimiter = true;
    if (bVars.allowSlBtnProtect != null && bVars.slBtnStepCount + 1 == bVars.gsLimit) {
        a = true
    }
    if (bVars.allowSlBtnProtect != null && bVars.slBtnStepCount - 1 < 0) {
        c = true
    }
    if (d == 1) {
        if (bMap.varsArr.wdir == "rtl") {
            if (a) {
                $("div.ls-btn-cont").animate({left: b * bVars.slBtnStepCount + f * bVars.slBtnStepCount + "px"}, "fast")
            } else {
                $("div.ls-btn-cont").animate({left: b * ++bVars.slBtnStepCount + f * bVars.slBtnStepCount + "px"}, "slow")
            }
        } else {
            if (bMap.varsArr.wdir == "ltr") {
                if (c) {
                    $("div.ls-btn-cont").animate({left: "0px"}, "fast")
                } else {
                    $("div.ls-btn-cont").animate({left: b * --bVars.slBtnStepCount * -1 - f * bVars.slBtnStepCount + "px"}, "slow")
                }
            }
        }
    } else {
        if (d == 0) {
            if (bMap.varsArr.wdir == "rtl") {
                if (c) {
                    $("div.ls-btn-cont").animate({left: "0px"}, "fast")
                } else {
                    $("div.ls-btn-cont").animate({left: b * --bVars.slBtnStepCount + f * bVars.slBtnStepCount + "px"}, "slow")
                }
            } else {
                if (bMap.varsArr.wdir == "ltr") {
                    if (a) {
                        $("div.ls-btn-cont").animate({left: b * bVars.slBtnStepCount * -1 - f * bVars.slBtnStepCount + "px"}, "fast")
                    } else {
                        $("div.ls-btn-cont").animate({left: b * ++bVars.slBtnStepCount * -1 - f * bVars.slBtnStepCount + "px"}, "slow")
                    }
                }
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
bMap.clearSiMarkers = function(b) {
    if (typeof bMap.sim == "undefined") {
        return
    }
    if (b) {
        bMap.map.removeLayer(bMap.sim);
        delete bMap.sim;
        delete bVars.simSize;
        delete bVars.simOffset;
        delete bVars.simIcon;
        delete bMap.simArr
    } else {
        for (var a = 0; a < bMap.simArr.length; a++) {
            bMap.sim.removeMarker(bMap.simArr[a])
        }
        bMap.simArr.length = 0
    }
};
bMap.showSiMarkers = function() {
    var a;
    if (typeof bMap.sim == "undefined") {
        bMap.sim = new OpenLayers.Layer.Markers("sim");
        bMap.map.addLayer(bMap.sim);
        bVars.simSize = new OpenLayers.Size(bVars.flagSize.w, bVars.flagSize.h);
        bVars.simOffset = new OpenLayers.Pixel(-(bVars.simSize.w / 2), -bVars.simSize.h);
        bVars.simIcon = new OpenLayers.Icon(addrUrl.getCImage("flag"), bVars.simSize, bVars.simOffset);
        bMap.simArr = new Array
    }
    uBody.closeSi(true);
    bMap.clearSiMarkers();
    $.getJSON(addrUrl.getSi(bVars.si), function(b) {
        $.each(b, function(c, d) {
            a = new OpenLayers.Marker(new OpenLayers.LonLat(d.path_ox, d.path_oy), bVars.simIcon.clone());
            bMap.sim.addMarker(a);
            bMap.simArr.push(a)
        })
    })
};
uBody.closeSi = function(a) {
    if (a === true) {
        $("div.list-cont").hide();
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
    bMap.clearMeasure(true);
    bVars.ssCorrVal = 0;
    uServe.toggleListBtn(false);
    uServe.resetGsNum();
    uServe.resetSomNo();
    if (!($("div.list-cont").length > 0)) {
        $("td.mw").append("<div class='list-cont'></div>")
    } else {
        if ($("div.list-cont").is(":hidden")) {
            $("div.list-cont").show()
        }
    }
    uBody.toggleMapBtn(true);
    $.get(addrUrl.svapi("slider", bVars.slType), function() {
        $("div.list-cont").load(addrUrl.loadBlock("si"), function() {
            $("div.list-cont").css("background-image", "none");
            $("div.ls-header").css({top: "0px", left: "0px"});
            $("div.close-wall").css({top: "3px", left: "655px"});
            $("div.si-bckgr").on("click", function() {
                bVars.si = parseInt($(this).find("div.si-btn").attr("id"));
                bMap.showSiMarkers();
                uElem.siBtnName.text($(this).find("span:eq(0)").text())
            });
            if (!$.browser.msie) {
                $("div.si-bckgr").tooltipster()
            }
            uServe.loadSlider();
            $("div.close-wall").on("click", uBody.closeSi)
        })
        if (bVars.controlServices) {
            bVars.controlServices = false;
            bMap.clearChsMarkers();
        }
    })
};
uBody.showSpm = function(b, a) {
    uServe.setUpElems();
    if (bVars.pmType == 2 && uElem.schField.length == 0) {
        return false
    }
    if (uServe.chmEx()) {
        bMap.clearChsMarkers()
    }
    uBody.closeSi();
    bMap.catChsMarkers = new OpenLayers.Layer.Markers("catChsMarkers");
    bMap.map.addLayer(bMap.catChsMarkers);
    uServe.markerAboveBckgr();
    $("div.show-st-list").mouseenter(function() {
        $(this).removeClass("show-st-list-pass").addClass("show-st-list-act")
    }).mouseleave(function() {
        $(this).removeClass("show-st-list-act").addClass("show-st-list-pass")
    });
    switch (bVars.pmType) {
        case 1:
            uServe.toggleMap(true);
            uBody.togglePB();
            bMap.map.zoomToMaxExtent();
            clearTimeout(bVars.ttglBtn);
            bVars.ttglBtn = setTimeout(function() {
                uBody.toggleCbtn(true)
            }, 200);
            uBody.closeWall();
            if (!a) {
                uServe.toggleLsContBckgr(true)
            }
            $.get(addrUrl.getLbl(114), function(c) {
                $("div.show-st-list").off("click", uBody.schWall).on("click", uBody.storesWall);
                $("div.show-st-list>div>div").text(c)
            });
            $.each(b, function(d, c) {
                var f = {x: c[0]["x"], y: c[0]["y"], icat: bVars.cat, store: parseFloat(d)};
                uServe.addNewMarker(f, 3);
                bMap.chmCoords.push(f)
            });
            uServe.toggleListBtn(true);
            break;
        case 2:
            uServe.toggleMap(true);
            uBody.closeWall(true, true);
            bMap.clearMeasure(true);
            uBody.toggleCbtn();
            uBody.makeCbtnPass();
            uBody.togglePB(true);
            uBody.closeMinisite(true, true);
            bMap.clearStore();
            uBody.closeTopTen(true);
            bMap.clearBckgrIcons();
            bMap.clearPopupMarkers();
            $.get(addrUrl.svapi("sch_txt", b), function() {
                $.get(addrUrl.getLbl(117), function(c) {
                    $("div.show-st-list").off("click", uBody.storesWall).on("click", uBody.schWall);
                    $("div.show-st-list>div>div").text(c)
                });
                $.getJSON(addrUrl.getSchId(), function(c) {
                    if (!c) {
                        uBody.openMsgBox(118);
                        return false
                    }
                    $.each(c, function(f, d) {
                        var g = {x: d.x, y: d.y, icat: d.cat, store: d.id, cc: true};
                        uServe.addNewMarker(g, 3);
                        bMap.chmCoords.push(g)
                    });
                    if (c.length == 1) {
                        uServe.showHiddenMarker({x: c[0]["x"], y: c[0]["y"]})
                    } else {
                        bMap.map.zoomToMaxExtent()
                    }
                    uServe.toggleListBtn(true);
                    uBody.togglePB();
                    uBody.toggleMapBtn(true)
                })
            });
            uServe.markerAboveBckgr();
            break;
        case 3:
            $.each(b, function(d, c) {
                var f = {x: c.x, y: c.y, icat: c.cat, store: c.id, cc: true};
                uServe.addNewMarker(f, 3);
                bMap.chmCoords.push(f)
            });
            uServe.markerAboveBckgr();
            break
        }
};
uBody.showSt = function() {
    $.getJSON(addrUrl.vapi + "shwst,store", function(a) {
        if (a.shwst) {
            bVars.showStSw = true;
            uBody.openMinisite(a.store, true)
        }
    })
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
    uBody.toggleMapBtn();
    bMap.clearBckgrIcons();
    uServe.resetSomNo();
    uBody.showStandByStores();
    uBody.closeSi();
    // Resets pathfinder dialog.
    pathfinder.hide();
    pathfinder.reset();
};
uBody.bannRenewal = function() {
    var b = 0;
    var a = 2;
    bVars.brCycle = setInterval(function() {
        $("div.bann-group-" + b).fadeOut(700);
        if (b + 1 > a) {
            b = 0
        } else {
            b++
        }
        $("div.bann-group-" + b).fadeIn(1000)
    }, 10000)
};
uBody.togglePB = function(b) {
    if (b && $("div.total-pb-bckgr").is(":hidden")) {
        var a;
        if ($.browser.mozilla || $.browser.opera || $.browser.msie) {
            a = 15
        } else {
            if ($.browser.webkit) {
                a = 7
            }
        }
        if ($.browser.msie) {
            $("html, body").animate({scrollTop: 0}, 0)
        }
        $("html, body").css("overflow", "hidden");
        $("body>center").css("margin-right", a + "px");
        if ($.browser.msie) {
            uServe.placeOnMiddle($(".pb-icon div"))
        }
        $("div.total-pb-bckgr").show();
        $("div.pb-icon-cont").show();
        uServe.placeOnMiddle($(".pb-icon div"), true);
        uServe.rotateAL()
    } else {
        if (!b && $("div.total-pb-bckgr").is(":visible")) {
            $("html, body").removeAttr("style");
            $("body>center").removeAttr("style");
            $("div.total-pb-bckgr").hide();
            $("div.pb-icon-cont").hide()
        }
    }
};
uBody.closeMsgBox = function() {
    $("div.msg-box").hide();
    $("div.total-pb-bckgr").off("click", uBody.closeMsgBox);
    $("div.pb-icon").removeAttr("style");
    uBody.togglePB()
};
uBody.openMsgBox = function(b, a, c) {
    $.get(addrUrl.getLbl(b), function(f) {
        uBody.togglePB(true);
        $("div.pb-icon-cont").hide();
        uServe.placeOnMiddle($("div.msg-box"));
        var d = $.browser.msie ? $("div.msg-txt>div>span") : $("div.msg-txt>div");
        d.text(f).append(a);
        $("div.msg-cls").on("click", uBody.closeMsgBox);
        $("div.total-pb-bckgr").on("click", uBody.closeMsgBox);
        $(document).keydown(function(g) {
            if (g.keyCode == 27) {
                uBody.closeMsgBox()
            }
        });
        if (typeof c == "function") {
            c()
        }
    })
};
uBody.openLangPanel = function() {
    uBody.togglePB(true);
    $("div.pb-icon-cont").hide();
    uServe.placeOnMiddle($("div.lang-panel"));
    $("div.lang-elem").click(function() {
        uServe.setLang($(this).attr("id"))
    }).mouseenter(function() {
        if ($(this).hasClass("lang-elem-pass")) {
            $(this).removeClass("lang-elem-pass").addClass("lang-elem-act2")
        }
    }).mouseleave(function() {
        if ($(this).hasClass("lang-elem-act2")) {
            $(this).removeClass("lang-elem-act2").addClass("lang-elem-pass")
        }
    });
    $("div.lang-cls").on("click", uBody.closeLangPanel);
    $("div.total-pb-bckgr").on("click", uBody.closeLangPanel);
    $(document).keydown(function(a) {
        if (a.keyCode == 27) {
            uBody.closeLangPanel()
        }
    })
};
uBody.closeLangPanel = function(a) {
    if ($("div.lang-panel").is(":hidden")) {
        return false
    }
    $("div.lang-panel").hide();
    $("div.total-pb-bckgr").off("click", uBody.closeLangPanel);
    $("div.pb-icon").removeAttr("style");
    if (a != true) {
        uBody.togglePB()
    }
};
uBody.openLoginWindow = function() {
    uBody.togglePB(true);
    $("div.pb-icon-cont").hide();
    uServe.placeOnMiddle($("div.sw-body"));
    $("div.login-cls").on("click", uBody.closeLoginWindow);
    $("div.total-pb-bckgr").on("click", uBody.closeLoginWindow);
    if ($.browser.msie) {
        $.get(addrUrl.getLbl(101), function(a) {
            uServe.add_placeholder("sw-uname", a)
        });
        bMap.keyboardnav.deactivate();
        $("span#sw-pass-ph").on("click", function() {
            $(this).hide();
            $("input#sw-pass").focus()
        });
        $("input#sw-pass").focus(function() {
            $("span#sw-pass-ph").hide()
        }).blur(function() {
            if ($(this).val() == 0) {
                $("span#sw-pass-ph").show()
            }
        })
    }
    $(document).keydown(function(a) {
        if (a.keyCode == 27) {
            uBody.closeLoginWindow()
        }
    })
};
uBody.closeLoginWindow = function() {
    if ($("div.sw-body").is(":hidden")) {
        return false
    }
    $("div.sw-body").hide();
    $("div.total-pb-bckgr").off("click", uBody.closeLoginWindow);
    $("div.pb-icon").removeAttr("style");
    uBody.togglePB();
    if ($.browser.msie) {
        bMap.keyboardnav.activate()
    }
};
uBody.onPopupClose = function(b) {
    var a = this.feature;
    if (a.layer) {
        bMap.selectControl.unselect(a)
    } else {
        this.destroy()
    }
};
uBody.onFeatureSelect = function(a) {
    feature = a.feature;
    popup = new OpenLayers.Popup.FramedCloud("featurePopup", feature.geometry.getBounds().getCenterLonLat(), new OpenLayers.Size(100, 100), "<span class='popup-header'>" + feature.attributes.title + "</span><hr/><span class='popup-text'>" + feature.attributes.description + "</span>", null, true, uBody.onPopupClose);
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
uBody.onFeatureUnselect = function(a) {
    feature = a.feature;
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
uServe.showMeasureCont = function() {
    $("div#smap").on("mousemove", uBody.moveMeasureCont).on("dblclick", uBody.stopMeasureCont);
    $("div.olLayerDiv").off("click")
};
uServe.msgShowNoMore = function() {
    $("input.show-no-more").on("click", function() {
        if ($(this).is(":checked")) {
            $.get(addrUrl.svapi("shnomore", 1))
        }
    })
};
uServe.respiteSCS = function(a) {
    clearTimeout(bVars.makeAtClickFalse);
    bVars.atClick = true;
    bVars.makeAtClickFalse = setTimeout(function() {
        bVars.atClick = false
    }, 40000);
    uBody.closeScrsAnime(a)
};
uServe.screenSaver = function() {
    setInterval(function() {
        if (!bVars.atClick) {
            if (uServe.chmEx() && bVars.pmType != 3 || bMap.map.getZoom() > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0 || $("div#smap").attr("style") > 0 || typeof bMap.ppm != "undefined" || $("div.olPopup").length > 0 || $("div.msg-box").is(":visible")) {
                uBody.back2root()
            } else {
                if (!uServe.chmEx()) {
                    uBody.toggleMapBtn(true);
                    uBody.showStandByStores()
                }
            }
            uBody.closeLangPanel(true);
            uBody.runScrsAnime()
        }
    }, 2000)
};
uServe.animeClick = function() {
    uBody.closeScrsAnime();
    uBody.openMinisite(bVars.scrsStore, true)
};
uServe.showScrsAnime = function(c, a) {
    if (typeof c == "undefined" || typeof a == "undefined") {
        return false
    }
    var d = (window.innerWidth - a.width) / 2;
    var b = (window.innerHeight - a.height) / 2;
    $.get(addrUrl.svapi("scrslast", c), function() {
        bVars.scrsStore = c;
        $(".scrs-anime-layer>div").off("click", uServe.animeClick).hide();
        $("div.scrs-comm").off("click", uServe.animeClick).hide();
        if ($("div.video-player-scrs").length > 0) {
            $("div.video-player-scrs").remove()
        }
        if (a.type == "anime") {
            $("div.sa" + c).css({top: b + "px", left: d + "px", width: a.width + "px", height: a.height + "px"}).show().on("click", uServe.animeClick);
            $("div.sa" + c + ">div").removeAttr("style").show()
        } else {
            if (a.type == "comm") {
                $("div.scrs-comm").css({top: b + "px", left: d + "px", width: a.width + "px", height: a.height + "px"}).show().on("click", uServe.animeClick);
                uBody.openScrsVideo(c, a)
            }
        }
    })
};
uServe.scrsAnime = function() {
    var c = 1;
    var a = [];
    var d = [];
    var b = false;
    $.getJSON(addrUrl.api + 20, function(e) {
        $.each(e, function(g, f) {
            a.push(parseFloat(g));
            d.push(f)
        });
        setTimeout(function() {
            uServe.showScrsAnime(a[0], d[0])
        }, 500);
        bVars.runScrs = setInterval(function() {
            uServe.showScrsAnime(a[c], d[c]);
            c++;
            if (c + 1 > e.length) {
                clearInterval(bVars.runScrs)
            }
        }, bVars.scrsRunInterval)
    })
};
uServe.setBrwsPref = function() {
    if ($.browser.mozilla) {
        bVars.brwsPref = "-moz-"
    } else {
        if ($.browser.webkit) {
            bVars.brwsPref = "-webkit-"
        } else {
            if ($.browser.opera) {
                bVars.brwsPref = "-o-"
            }
        }
    }
};
uServe.setUpElems = function() {
    uElem.measureCont = [];
    if ($.browser.msie) {
        bVars.slideStep = 702;
        uElem.siBtnName = $("span.siname");
        uElem.mBtnCont = $(".map-btn");
        uElem.cnCont = $("div.cn-cont-bckgr");
        uElem.scName = "<div id='scname-cell'><span id='scname'></span></div>";
        uElem.schField = encodeURIComponent(document.getElementById("sch-field").value);
        uElem.measureCont.x = 10;
        uElem.measureCont.y = -190;
        bVars.ssCorr = $("div#stores:visible").length > 0 || $("div#fst-slider:visible").length > 0 ? 6 : 2
    } else {
        bVars.slideStep = 689;
        bVars.ssCorr = 2;
        uElem.siBtnName = $("div.sibtn-name");
        uElem.mBtnCont = $(".map-btn");
        uElem.cnCont = $("div.cn-cont" + bVars.cat);
        uElem.scName = "<span id='scname'></span>";
        uElem.schField = $("input#sch-field").val();
        uElem.measureCont.x = 20;
        uElem.measureCont.y = 0
    }
};
uServe.placeOnMiddle = function(c, a) {
    var d, b;
    if (!a) {
        c.show()
    }
    if ($.browser.msie) {
        d = document.body.clientWidth;
        b = document.body.clientHeight
    } else {
        d = window.innerWidth;
        b = window.innerHeight
    }
    c.css({left: (d - c.width()) / 2 + "px", top: (b - c.height()) / 2 + "px"})
};
uServe.setLang = function(a) {
    $.get(addrUrl.svapi("lang", a), function() {
        window.location.reload()
    })
};
uServe.add_placeholder = function(b, a) {
    if (!$.browser.msie) {
        return false
    }
    var c = document.getElementById(b);
    c.placeholder = a;
    c.onfocus = function() {
        if (this.value == this.placeholder) {
            this.value = "";
            c.style.cssText = ""
        }
    };
    c.onblur = function() {
        if (this.value.length == 0) {
            this.value = this.placeholder;
            c.style.cssText = "color:#0099CC;font-family:Arial;"
        }
    };
    c.onblur()
};
uBody.runScrsAnime = function() {
    if ($("div.scrs-cont").length > 0 || $("div.minisite-cont").length > 0 || $("div.list-cont").length > 0) {
        return false
    }
    var a = 2000;
    uBody.togglePB(true);
    $("td.mw").append("<div class='scrs-cont'></div>");
    $("div.scrs-cont").load(addrUrl.loadBlock("screensaver"), function() {
        $("div.pb-icon-cont").hide();
        $("div.scrs-cont").on("click", function() {
            uBody.closeScrsAnime(false)
        });
        $("div.scrs-cls-btn").on("click", function() {
            uBody.closeScrsAnime(false)
        })
    });
    uServe.scrsAnime();
    $.get(addrUrl.api + 21, function(b) {
        bVars.runScrsQueue = setInterval(function() {
            uServe.scrsAnime()
        }, bVars.scrsRunInterval * parseFloat(b) + a)
    })
};
uBody.closeScrsAnime = function(a) {
    if ($("div.scrs-cont").length > 0) {
        $("div.scrs-cont").remove()
    }
    if (!a) {
        $("div.total-pb-bckgr").off("click", uBody.closeScrsAnime);
        uBody.togglePB()
    }
    clearTimeout(bVars.startScrs);
    clearInterval(bVars.runScrsQueue);
    clearInterval(bVars.runScrs)
};
uBody.goFullscreen = function() {
    $("html, body").animate({scrollTop: 0}, 0).css("overflow", "hidden");
    if (bMap.map.getZoom() < 3) {
        bMap.map.zoomTo(3)
    }
    $.get(addrUrl.getLbl(96), function(a) {
        $("td.mw").append("<div class='leave-fscr'><span>" + a + "</span></div>");
        $("div.leave-fscr").click(function() {
            uBody.leaveFullcsreen()
        });
        $("div#smap").css({position: "absolute", top: "0px", left: "0px", width: "100%", height: "100%", "z-index": "15"});
        $("body").scrollTop();
        bMap.map.setOptions({restrictedExtent: new OpenLayers.Bounds(bMap.mFullBounds.lbx, bMap.mFullBounds.lby, bMap.mFullBounds.rtx, bMap.mFullBounds.rty)});
        bMap.map.updateSize();
        $(document).keydown(function(b) {
            if (b.keyCode == 27) {
                uBody.leaveFullcsreen()
            }
        })
    })
};
uBody.leaveFullcsreen = function() {
    if (!($("div.leave-fscr").length > 0)) {
        return false
    }
    $("div.leave-fscr").remove();
    $("div#smap").removeAttr("style");
    $("html, body").css("overflow", "auto");
    bMap.map.setOptions({restrictedExtent: new OpenLayers.Bounds(bMap.mSmBounds.lbx, bMap.mSmBounds.lby, bMap.mSmBounds.rtx, bMap.mSmBounds.rty)});
    bMap.map.updateSize()
};
uBody.hideScaleHint = function() {
    clearTimeout(bVars.tshSclHnt);
    if (!$("div.scale-hint-bckgr").is(":visible")) {
        return false
    }
    bVars.thSclHnt = setTimeout(function() {
        $("div.scale-hint-bckgr").hide();
        $("div.scale-hint").fadeOut("slow")
    }, 500)
};
uBody.showScaleHint = function() {
    if (bMap.map.getZoom() >= bVars.maxScale) {
        return false
    }
    clearTimeout(bVars.thSclHnt);
    bVars.tshSclHnt = setTimeout(function() {
        $("div.scale-hint-bckgr").show();
        $("div.scale-hint").fadeIn().on("click", bMap.scaleByHint)
    }, 500)
};
uBody.showStandByStores = function() {
    bVars.pmType = 3;
    $.getJSON(addrUrl.getStandBySt(), function(a) {
        if (a) {
            uBody.showSpm(a, true)
        } else {
            return false
        }
    })
};
uBody.setUpAddCbtn = function() {
    $("div.add-cbtn").on("click", function() {
        uBody.scatsWall(bVars.cat)
    }).mouseenter(function() {
        $(this).removeClass("add-cbtn-pass").addClass("add-cbtn-act")
    }).mouseleave(function() {
        $(this).removeClass("add-cbtn-act").addClass("add-cbtn-pass")
    });
    $("div.add-tt-btn").on("click", uBody.showTTstores).mouseenter(function() {
        $(this).removeClass("add-cbtn-pass").addClass("add-cbtn-act")
    }).mouseleave(function() {
        $(this).removeClass("add-cbtn-act").addClass("add-cbtn-pass")
    })
};
uBody.toggleAddCbtn = function(a) {
    if (a && $("div.add-cbtn-cont").is(":hidden")) {
        $("div.add-cbtn-cont").show()
    } else {
        if (!a && $("div.add-cbtn-cont").is(":visible")) {
            $("div.add-cbtn-cont").hide()
        }
    }
};
uBody.closePlayer = function() {
    if ($("div.video-player").length == 0) {
        return false
    }
    $("div.video-player").remove();
    $("div.video-close").remove();
    $("div.total-pb-bckgr").off("click", uBody.closePlayer);
    uBody.togglePB();
    if (bVars.singleTrailer) {
        uBody.closeVideo()
    }
};
uBody.openPlayer = function(d) {
    var b = 23;
    var f, c, a;
    uBody.togglePB(true);
    $.getJSON(addrUrl.api + 14, function(e) {
        f = addrUrl.base + "stores/" + e.tc + "/" + e.store + "/videos/web/";
        $("div.pb-icon-cont").hide();
        $("body>center").append("<div class='video-player'><div id='videoplayer7267'></div></div><div class='video-close'></div>");
        $("div.video-close").on("click", uBody.closePlayer);
        $("div.total-pb-bckgr").on("click", uBody.closePlayer);
        $(document).keydown(function(g) {
            if (g.keyCode == 27) {
                uBody.closePlayer()
            }
        });
        if ($.browser.msie && parseInt($.browser.version, 10) <= 8) {
            c = (document.body.clientHeight - e.height) / 2;
            a = (document.body.clientWidth - e.width) / 2
        } else {
            c = (window.innerHeight - e.height) / 2;
            a = (window.innerWidth - e.width) / 2
        }
        $("div.video-player").css({top: c + "px", left: a + "px"});
        $("div.video-close").css({top: c - b + "px", left: a + e.width - b + "px"});
        $.getScript(addrUrl.base + "js/swfobject.js", function() {
            var g = {comment: "uniqoom", st: f + "video55-1659.txt", file: f + d + ".flv"};
            var h = {wmode: "transparent", allowFullScreen: "true", allowScriptAccess: "always", id: "videoplayer7267"};
            new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf", "videoplayer7267", e.width, e.height, "9.0.115.0", false, g, h)
        })
    })
};
uBody.openVideo = function() {
    $("div.video-btn").removeClass("sm-btn-pass cbtn-act2").addClass("cbtn-act").off("click", uBody.openVideo);
    setTimeout(function() {
        $("div.video-btn").on("click", uBody.closeVideo)
    }, 500);
    $("div.pct-uplayer").append("<div class='video-layer'></div>");
    $.get(addrUrl.api + 13, function(a) {
        if (parseFloat(a) > 1) {
            $("div.showcase").hide();
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
    $("div.video-btn").removeClass("cbtn-act").addClass("sm-btn-pass").off("click", uBody.closeVideo);
    setTimeout(function() {
        $("div.video-btn").on("click", uBody.openVideo)
    }, 500);
    $("div.video-layer").remove();
    if ($("div.showcase").is(":hidden")) {
        $("div.showcase").show()
    }
    bVars.singleTrailer = false
};
uBody.openScrsVideo = function(b, a) {
    var c = addrUrl.base + "stores/" + bMap.varsArr.tc + "/" + b + "/videos/web/";
    $("div.scrs-comm").append("<div class='video-player-scrs'><div id='videoplayer7267'></div></div>");
    $.getScript(addrUrl.getJS("swfobject"), function() {
        var f = {comment: "uniqoom", st: c + "video55-1659.txt", file: c + a.no + ".flv"};
        var d = {wmode: "transparent", allowFullScreen: "true", allowScriptAccess: "always", id: "videoplayer7267"};
        new swfobject.embedSWF(addrUrl.base + "animation/uplayer/uppod.swf", "videoplayer7267", a.width, a.height, "9.0.115.0", false, f, d)
    });
};
$(document).ready(function() {
    uServe.setBrwsPref();
    uServe.setUpElems();
    $.getJSON(addrUrl.vapi + "lang,wdir,tc,bann_no", function(a) {
        bMap.varsArr = a;
        $.get(addrUrl.getSCName("bankers"), function(b) {
            bMap.varsArr.bankers = parseFloat(b)
        })
    });
    bMap.setMap("smap");
    uBody.showStandByStores();
    $("div.cbtn").click(function() {
        var a = parseFloat($(this).attr("id"));
        if (uServe.inArray(a, bVars.specCat)) {
            bMap.setPopupMarkers(a)
        } else {
            uBody.scatsWall(a)
        }
    }).mouseenter(function() {
        if ($(this).hasClass("cbtn-pass")) {
            $(this).removeClass("cbtn-pass").addClass("cbtn-act2")
        }
    }).mouseleave(function() {
        if ($(this).hasClass("cbtn-act2")) {
            $(this).removeClass("cbtn-act2").addClass("cbtn-pass")
        }
    });
    $("div.sibtn").click(function() {
        uBody.showSi()
    }).mouseenter(function() {
        if ($(this).hasClass("sibtn-pass")) {
            $(this).removeClass("sibtn-pass").addClass("sibtn-act2")
        }
    }).mouseleave(function() {
        if ($(this).hasClass("sibtn-act2")) {
            $(this).removeClass("sibtn-act2").addClass("sibtn-pass")
        }
    });
    $("div.bann-cell").click(function() {
        var a = $(this).attr("id");
        if (!isNaN(a)) {
            uBody.openMinisite(parseFloat(a), a != 0)
        } else {
            window.location.href = a
        }
    });
    $(".search-image").click(function() {
        bVars.pmType = 2;
        uBody.showSpm(uElem.schField)
    });
    $("input#sch-field").on("keypress", function(a) {
        if (a.keyCode === 13) {
            uServe.setUpElems();
            bVars.pmType = 2;
            uBody.showSpm(uElem.schField)
        }
    });
    $("div.go-fscr").click(function() {
        uBody.goFullscreen()
    });
    if (!$.browser.msie) {
        $("div.go-fscr").tooltipster()
    }
    $.get(addrUrl.getLbl(121), function(a) {
        $("div#olControlOverviewMapMaximizeButton").attr("title", a);
        if (!$.browser.msie) {
            $("div#olControlOverviewMapMaximizeButton").tooltipster()
        }
    });
    $(".olControlPanZoomBar>div:eq(4), .olControlPanZoomBar>div:eq(5), .olControlPanZoomBar>div:eq(6), .olControlPanZoomBar>div:eq(7)").mouseenter(function() {
        uBody.showScaleHint()
    }).mouseleave(function() {
        uBody.hideScaleHint()
    });
    $("div.scale-hint-bckgr").click(function() {
        $(this).hide()
    }).mouseenter(function() {
        uBody.showScaleHint()
    }).mouseleave(function() {
        uBody.hideScaleHint()
    });
    $(".lang-btn").click(function() {
        uBody.openLangPanel()
    });
    $("div.measure-switch").on("click", bMap.setMeasure);
    $(".drum-btn").click(function() {
        uBody.openMsgBox(124)
    });
    $(".lott-btn").click(function() {
        uBody.openMsgBox(124)
    });
    $(".hot-deal-btn").click(function() {
        uBody.openMsgBox(124)
    });
    $(".login-btn").on("click", uBody.openLoginWindow);
    uBody.setUpAddCbtn();
    // TODO: Uncomment to enable banners cycling.
//    uBody.bannRenewal();
    uBody.showSt();
    // Performs controllers execution.
    if (bVars.controlInitialCategory !== null) {
        uBody.scatsWall(bVars.controlInitialCategory);
    } else if (bVars.controlFinance) {
        bMap.setPopupMarkers(bVars.specCat[0]);
    } else if (bVars.controlServices) {
        uBody.showSi();
    }
}).on("click", uServe.respiteSCS);
