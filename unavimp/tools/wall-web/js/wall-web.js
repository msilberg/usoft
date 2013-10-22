
var ANIMATION_TIME = 250;

/**
 * @param absX absolute X coordinate.
 * @param absY absolute Y coordinate.
 * @param languageCode two letters language code ("en", "ru" etc.).
 * @param host host to operate with as datasource and syncronization manager.
 * @param catalogueId top10 catalogue ID.
 */
function webWall(absX, absY, languageCode, host, catalogueId) {
    var styleAlign;
    if (languageCode == "he") {
        styleAlign = "wall-back-text-rtl";
    } else {
        styleAlign = "wall-back-text";
    }
    var wall = $($.format(WEB_WALL_TEMPLATE, styleAlign));
    $(".wall-placeholder")
            .replaceWith(wall)
            .attr("style", $.format("left: {0}; top: {1};", absX, absY));
    loadContent(host, catalogueId);
    $("td.wall-product").on("click", null, zoom);
    $(".wall-info-rotate").on("click", null, rotate);
    $(".wall-back-rotate").on("click", null, rotateBack);
    $(".wall-fader").on("click", null, unzoom);
    $("table.wall-zoomed").on("click", null, unzoom);
    // Saves paremeters for future use.
    $("#lottery-language").attr("value", languageCode);
    $("#wall-host").attr("value", host);
}

function webWallSelectCatalogue(catalogueId) {
    unzoom(null);
    loadContent($("#wall-host").attr("value"), catalogueId);
}

function loadContent(host, catalogueId) {
    var src = $.format(URL_DATA_SOURCE, host, catalogueId);
    $.getJSON(src, function(data) {
        var cells = $("td.wall-product");
        var images = $("img.wall-product");
        var maxCell = 0;
        $.each(data, function(i, product) {
            if ("error" == i) {
                var fader = $("div.wall-fader");
                fader.show();
                var node = $.format(DATASOURE_ERROR, product);
                $(node).appendTo(fader);
                return;
            }
            cells.eq(i).data("itemName", product.name);
            cells.eq(i).data("costOld",product.priceOld);
            cells.eq(i).data("costNew", product.priceNew);
            cells.eq(i).data("itemDescription", product.description);
            cells.eq(i).show();
            if ($.browser.msie) {
                images.eq(i).attr("src", product.image
                    + "/maxwidth/100/maxheight/200");
            } else {
                images.eq(i).attr("src", product.image);
            }
            maxCell++;
        });
        for (i = maxCell; i < 10; i++) {
            cells.eq(i).hide();
        }
    });
}

function zoom(e) {
    var el = $(this);
    var src = el.find("img").attr("src");
    $("img.wall-zoomed").attr("src", src);
    // Item title/name.
    var text = el.data("itemName");
    var dom = $(".wall-info-item");
    dom.html(text);
    if (text.length == 0) {
        dom.hide();
    } else {
        dom.show();
    }
    // Old cost.
    text = el.data("costOld");
    dom = $(".wall-info-old-cost");
    dom.html(text);
    if (text.length == 0) {
        dom.hide();
    } else {
        dom.show();
    }
    // New cost.
    text = el.data("costNew");
    dom = $(".wall-info-new-cost");
    dom.html(text);
    if (text.length == 0) {
        dom.hide();
    } else {
        dom.show();
    }
    $(".wall-back-title").html(el.data("itemName"));
    $("#wall-back-text").html(el.data("itemDescription"));
    var fader = $("div.wall-fader");
    fader.fadeIn(ANIMATION_TIME);
    var zoomed = $("table.wall-zoomed");
    zoomed.fadeIn(ANIMATION_TIME);
}

function unzoom(e) {
    var fader = $("div.wall-fader");
    fader.fadeOut(ANIMATION_TIME);
    var zoomed = $("table.wall-zoomed");
    zoomed.fadeOut(ANIMATION_TIME);
    rotateBack(null);
}

function rotate(e) {
    $('table.wall-zoomed').rotate3Di('flip', 500, {"sideChange": flipped});
    return false;
}

function rotateBack(e) {
    $('table.wall-zoomed').rotate3Di('unflip', 500, {"sideChange": flipped});
    return false;
}

function flipped(front) {
    var image = $("img.wall-zoomed");
    var btnFlip = $(".wall-info-rotate");
    var infoTitle = $(".wall-info-item");
    var infoCostOld = $(".wall-info-old-cost");
    var infoCostNew= $(".wall-info-new-cost");
    // Bottom side.
    var btnUnflip = $(".wall-back-rotate");
    var backInfo = $("table.wall-back-info");
    if (front) {
        image.show();
        btnFlip.show();
        if (infoTitle.html().length != 0) {
            infoTitle.show();
        }
        if (infoCostOld.html().length != 0) {
            infoCostOld.show();
        }
        if (infoCostNew.html().length != 0) {
            infoCostNew.show();
        }
        btnUnflip.hide();
        backInfo.hide();
    } else {
        image.hide();
        btnFlip.hide();
        infoTitle.hide();
        infoCostOld.hide();
        infoCostNew.hide();
        btnUnflip.show();
        backInfo.show();
    }
}

var DATASOURE_ERROR = "<td style=\"width: 100%;color: white; text-align: center; font-weight: bold;\">Datasource error: {0}</td>";
var URL_DATA_SOURCE = "http://{0}/getproductsunsec/version/2/top10id/{1}?jsoncallback=?";
var WEB_WALL_TEMPLATE = '<div class="wall-container"><input type="hidden" id="lottery-language" value="" /><input type="hidden" id="wall-host" value="" /><table class="wall-products"><tbody><tr id="wall-row-0"><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td></tr><tr id="wall-row-1"><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td><td class="wall-product"><img class="wall-product" src=""/></td></tr></tbody></table><div class="wall-fader" style="display: none;"></div><table class="wall-zoomed" style="display: none;"><tr><td class="wall-zoomed"><img class="wall-zoomed" src="images/logo-00.png" /><div class="wall-info-rotate"></div><div class="wall-back-rotate" style="display: none;"></div><div class="wall-info-item"></div><div class="wall-info-old-cost"></div><div class="wall-info-new-cost"></div><table class="wall-back-info" style="display: none;"><tr><td class="wall-back-title"></td></tr><tr><td id="wall-back-text" class="{0}"></td></tr></table></td></tr></table></div>';
