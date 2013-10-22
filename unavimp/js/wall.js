
/**
 * @param absX absolute X coordinate.
 * @param absY absolute Y coordinate.
 * @param languageCode two letters language code ("en", "ru" etc.).
 * @param host host to operate with as datasource and syncronization manager.
 * @param catalogueId top10 catalogue ID.
 */
function webWall(absX, absY, languageCode, host, catalogueId) {
	var wWidth = ($.browser.msie)? 680 : 705;
    webWallV2(absX, absY, languageCode, host, catalogueId, wWidth, 525, 5, 2);
}

/**
 * @param absX absolute X coordinate.
 * @param absY absolute Y coordinate.
 * @param languageCode two letters language code ("en", "ru" etc.).
 * @param host host to operate with as datasource and syncronization manager.
 * @param catalogueId top10 catalogue ID.
 * @param width defines a width of the wall.
 * @param height defines a height of the wall.
 * @param columns
 * @param rows
 */
function webWallV2(absX, absY, languageCode, host, catalogueId, width, height, columns, rows) {
    var localizedStyle;
    if (isRtl(languageCode)) {
        localizedStyle = "direction: rtl; text-align: right;";
    } else {
        localizedStyle = "direction: ltr; text-align: left;";
    }
    $(".wall-placeholder").replaceWith(WEB_WALL_TEMPLATE);
    // Saves paremeters for future use.
    var root = $(".wall-container");
    root.data("wall-zoomed", "false");
    root.data("lottery-language", languageCode);
    root.data("wall-host", host);
    root.data("wall-width", width);
    root.data("wall-height", height);
    root.data("wall-columns", columns);
    root.data("wall-rows", rows);
    root.attr("style", $.format("left: {0}px; top: {1}px; width: {2}px; height: {3}px; {4}"
                    , absX, absY, width, height, localizedStyle));
    root.draggable({
            axis: "x",
            iframeFix: true,
            distance: 50,
            start: onDragStart,
            drag: onDrag
        });
    loadContent(host, catalogueId);
    $(".wall-info-rotate").on("click", null, rotate);
    $(".wall-back-rotate").on("click", null, rotateBack);
    $(".wall-fader").on("click", null, unzoom);
    $("table.wall-zoomed").on("click", null, unzoom);
    // Back text customization.
    var backTextStyle = 'height: ' + Math.ceil(height * 0.8 * 0.6) + 'px;';
    if (isRtl()) {
        backTextStyle += ' text-align: right;';
    } else {
        backTextStyle += ' text-align: left;';
    }
    $('#wall-back-text').attr('style', backTextStyle);
    // IE-specific alterations.
    if ($.browser.msie) {
        document.onselectstart = function() { return false; };
        $(".wall-fader").attr('style', $.format(
                'left: 2px; top: 2px; width: {0}px; height: {1}px; display: none;'
                , width - 5, height - 6)
        );
    }
}

function onDragStart(event, ui) {
    $(".wall-container").data("wall-drag-left", ui.position.left);
    $("table.wall-zoomed").data("zoomRequest", "false");
    return true;
}

function onDrag(event, ui) {
    if ("true" !== $(".wall-container").data("wall-zoomed")) {
        var oldX = $(".wall-container").data("wall-drag-left");
        var newX = ui.position.left;
        if (newX < oldX) {
            moveRight();
        } else {
            moveLeft();
        }
    }
    return false;
}

function moveRight() {
    // Pager.
    var root = $(".wall-container");
    var currentPage = root.data("current-page");
    var pagesCount = root.data("pages-count");
    if (isRtl()) {
        if (currentPage === 0) {
            // TODO: Implement first page notification.
            return;
        }
        currentPage--;
    } else {
        if (currentPage === pagesCount - 1) {
            // TODO: Implement last page notification.
            return;
        }
        currentPage++;
    }
    var wallWidth = root.data("wall-width");
    $(".wall-pager-item-active").attr("class", "wall-pager-item");
    if (isRtl() && !$.browser.msie) {
        $(".wall-pager-item").eq(pagesCount - (currentPage + 1)).attr("class", "wall-pager-item-active");
    } else {
        $(".wall-pager-item").eq(currentPage).attr("class", "wall-pager-item-active");
    }
    root.data("current-page", currentPage);
    // Wall.
    if (isRtl()) {
        $(".scrollable").animate({"left": wallWidth * currentPage + "px"}, "fast");
    } else {
        $(".scrollable").animate({"left": -1 * wallWidth * currentPage + "px"}, "fast");
    }
    return;
}

function moveLeft() {
    // Pager.
    var root = $(".wall-container");
    var currentPage = root.data("current-page");
    var pagesCount = root.data("pages-count");
    if (isRtl()) {
        if (currentPage === pagesCount - 1) {
            // TODO: Implement last page notification.
            return;
        }
        currentPage++;
    } else {
        if (currentPage === 0) {
            // TODO: Implement first page notification.
            return;
        }
        currentPage--;
    }
    var wallWidth = root.data("wall-width");
    $(".wall-pager-item-active").attr("class", "wall-pager-item");
    if (isRtl() && !$.browser.msie) {
        $(".wall-pager-item").eq(pagesCount - (currentPage + 1)).attr("class", "wall-pager-item-active");
    } else {
        $(".wall-pager-item").eq(currentPage).attr("class", "wall-pager-item-active");
    }
    root.data("current-page", currentPage);
    // Wall.
    if (isRtl()) {
        $(".scrollable").animate({"left": wallWidth * currentPage + "px"}, "fast");
    } else {
        $(".scrollable").animate({"left": -1 * wallWidth * currentPage + "px"}, "fast");
    }
}

function webWallSelectCatalogue(catalogueId) {
    unzoom(null);
    loadContent($(".wall-container").data("wall-host"), catalogueId);
}

function loadContent(host, catalogueId) {
    var src = $.format(URL_DATA_SOURCE, host, catalogueId);
    var root = $(".wall-container");
    var columns = root.data("wall-columns");
    var rows = root.data("wall-rows");
    var wallWidth = root.data("wall-width");
    var wallHeight = root.data("wall-height");
    var cellWidth = Math.ceil((wallWidth - 10 * (columns + 1)) / columns);
    var cellHeight = Math.ceil((wallHeight - 10 * (rows + 1)) * 0.96 / rows);
    var cellDimensions = $.format("width: {0}px; height: {1}px;", cellWidth, cellHeight);
    // Data-dependent part.
    $.getJSON(src, function(data) {
        var pagesCount = getPagesCount(data.length, columns, rows);
        // Scrollable layer.
        var scrollableLayer = constructScrollableLayer(root, pagesCount, wallWidth);
        // Pager.
        constructPager(root, pagesCount);
        var added = 0;
        var inRow = 0;
        var inPage = 0;
        var page = 0;
        var lastTable = null;
        var lastRow = null;
        var lastCell = null;
        $.each(data, function(i, product) {
            // Starts a new page.
            if (inPage === columns * rows) {
                inPage = 0;
                inRow = 0;
                page++;
            }
            // Creates a new table.
            if (inPage === 0) {
                // New table.
                lastTable = constructWallContainer(scrollableLayer, lastTable, page
                        , wallWidth, cellWidth
                        , data.length - added, columns, rows);
                // First row of new table.
                lastRow = $(document.createElement('tr'));
                lastRow.appendTo(lastTable);
            }
            // Creates a next row of a table.
            if (inRow === columns) {
                inRow = 0;
                var newRow = $(document.createElement('tr'));
                newRow.insertAfter(lastRow);
                lastRow = newRow;
            }
            // Creates a new cell.
            lastCell = constructCell(lastRow, product, cellDimensions);
            // Creates an image.
            var img = $(document.createElement('img')).attr("class", "wall-product");
            if ($.browser.msie) {
                img.attr("src", product.image + '/maxwidth/' + Math.ceil(cellWidth - 10)
                        + '/maxheight/' + Math.ceil(cellHeight - 10));
            } else {
                img.attr("src", product.image)
                        .attr('style', 'max-width: ' + Math.ceil(cellWidth - 20)
                        + 'px; max-height: ' + Math.ceil(cellHeight - 20) + 'px;');
            }
            img.on('dragstart', function(event) {event.preventDefault();});
            img.appendTo(lastCell);
            // Counters.
            inRow++;
            inPage++;
            added++;
        });
    });
}

function constructScrollableLayer(root, pagesCount, wallWidth) {
    $("div.scrollable").remove();
    var result = $(document.createElement('div'))
            .attr("class", "scrollable")
            .attr("style", "width: " + pagesCount * wallWidth + "px; left: 0px;")
            .appendTo(root);
    return result;
}

function constructWallContainer(scrollableLayer, lastTable, page
        , wallWidth, cellWidth
        , itemsLeft, columns, rows) {
    // Width of a table.
    var tableWidth;
    if (itemsLeft < columns) {
        tableWidth = cellWidth * itemsLeft + itemsLeft * 10;
    } else {
        tableWidth = wallWidth;
    }
    var tableHeight;
    if (itemsLeft <= columns * rows) {
        tableHeight = 100 / rows +"%";
    } else {
        tableHeight = "100%";
    }
    // Height of a table.
    var left;
    if (isRtl()) {
        left = -1 * wallWidth * page;
        if (itemsLeft < columns) {
            var emptyCells = columns - itemsLeft;
            left += emptyCells * cellWidth
                    + (emptyCells + 1) * 10;
        }
    } else {
        left = wallWidth * page;
    }
    var result = $(document.createElement('table'))
            .attr("class", "wall-products")
            .attr("style", "width: " + tableWidth + "px; "
                    + "height: " + tableHeight + "; "
                    + "left: " + left + "px;"
            );
    if (lastTable === null) {
        result.appendTo(scrollableLayer);
    } else {
        result.insertAfter(lastTable);
    }
    return result;
}

function constructCell(row, product, cellDimensions) {
    var result = $(document.createElement('td'));
    result.attr("class", "wall-product")
            .attr("style", cellDimensions)
            .data("itemName", product.name)
            .data("costOld", product.priceOld)
            .data("costNew", product.priceNew)
            .data("itemDescription", product.description)
            .on("click", null, zoom)
            .on("mousedown", null, zoomPreparation)
            .appendTo(row);
    return result;
}

function constructPager(root, pagesCount) {
    root.data("current-page", 0);
    root.data("pages-count", pagesCount);
    $("div.wall-pager").remove();
    var container = $('<div>')
            .addClass("wall-pager")
            .appendTo(root);
    if (isRtl() && !$.browser.msie) {
        for (var i = pagesCount; 0 < i ; i--) {
            var item = $('<div>');
            if (i === 1) {
                item.addClass("wall-pager-item-active");
            } else {
                item.addClass("wall-pager-item");
            }
            item.text(i).appendTo(container);
        }
    } else {
        for (var i = 0; i < pagesCount; i++) {
            var item = $('<div>');
            if (i === 0) {
                item.addClass("wall-pager-item-active");
            } else {
                item.addClass("wall-pager-item");
            }
            item.text(i + 1).appendTo(container);
        }
    }
}

function getPagesCount(count, columns, rows) {
    var result = Math.ceil(count / (columns * rows));
    if (result <= 0) {
        result = 1;
    }
    return result;
}

function zoomPreparation(e) {
    $("table.wall-zoomed").data("zoomRequest", "true");
}

function zoom(e) {
    if ("true" !== $("table.wall-zoomed").data("zoomRequest")) {
        return;
    }
    $(".wall-container").data("wall-zoomed", "true");
    var el = $(this);
    var image = el.find("img");
    var src = image.attr("src");
    var imgZoomed = $("img.wall-zoomed");
    if (imgZoomed !== null) {
        imgZoomed.attr("src", src);
        imgZoomed.on('dragstart', function(event) {event.preventDefault();});
    }
    // Item title/name.
    var text = el.data("itemName");
    var dom = $(".wall-info-item");
    dom.html(text);
    if (text.length === 0) {
        dom.hide();
    } else {
        dom.show();
    }
    // Old cost.
    text = el.data("costOld");
    dom = $(".wall-info-old-cost");
    dom.html(text);
    if (text.length === 0) {
        dom.hide();
    } else {
        dom.show();
    }
    // New cost.
    text = el.data("costNew");
    dom = $(".wall-info-new-cost");
    dom.html(text);
    if (text.length === 0) {
        dom.hide();
    } else {
        dom.show();
    }
    $(".wall-back-title").html(el.data("itemName"));
    $("#wall-back-text").html(el.data("itemDescription"));
    $("table.wall-zoomed").fadeIn("fast");
    $("div.wall-fader").fadeIn("fast");
    if ($.browser.msie) {
        var wallHeight = $(".wall-container").data("wall-height");
        var padding = Math.ceil((wallHeight * 0.8 * 0.75 - image.height()) / 2);
        $('td.wall-zoomed').attr('style', 'padding-top: ' + padding + 'px;');
    }
}

function unzoom(e) {
    var fader = $("div.wall-fader");
    fader.fadeOut("fast");
    var zoomed = $("table.wall-zoomed");
    zoomed.fadeOut("fast");
    rotateBack(null);
    $(".wall-container").data("wall-zoomed", "false");
}

function rotate(e) {
    if ($.browser.msie) {
        $('table.wall-zoomed').rotate3Di('flip', 0, {"sideChange": flipped});
        $('td.wall-zoomed').attr('style', '');
    } else {
        $('table.wall-zoomed').rotate3Di('flip', 500, {"sideChange": flipped});
    }
    return false;
}

function rotateBack(e) {
    if ($.browser.msie) {
        $('table.wall-zoomed').rotate3Di('unflip', 0, {"sideChange": flipped});
        var root = $(".wall-container");
        var rows = root.data("wall-rows");
        var wallHeight= root.data("wall-height");
        var cellHeight = (wallHeight - 10 * (rows + 1)) * 0.96 / rows;
        $('td.wall-zoomed').attr('style', 'padding-top: ' + (wallHeight * 0.6 - cellHeight) + 'px;');
    } else {
        $('table.wall-zoomed').rotate3Di('unflip', 500, {"sideChange": flipped});
    }
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
    var backInfo = $(".wall-back-info");
    if (front) {
        image.show();
        btnFlip.show();
        if (infoTitle.html().length !== 0) {
            infoTitle.show();
        }
        if (infoCostOld.html().length !== 0) {
            infoCostOld.show();
        }
        if (infoCostNew.html().length !== 0) {
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

function isRtl(languageCode) {
    if (typeof languageCode === 'undefined') {
        languageCode = $(".wall-container").data("lottery-language");
    }
    return "he" === languageCode;
}

var DATASOURE_ERROR = "<td style=\"width: 100%;color: white; text-align: center; font-weight: bold;\">Datasource error: {0}</td>";
var URL_DATA_SOURCE = "http://{0}/getproductsunsec/version/3/top10id/{1}?jsoncallback=?";
var WEB_WALL_TEMPLATE = '<div class="wall-container">\
    <div class="wall-fader" style="display: none;"></div>\
    <table class="wall-zoomed" style="display: none;">\
        <tr>\
            <td class="wall-zoomed">\
                <img class="wall-zoomed" src="" />\
                <div class="wall-info-rotate"></div>\
                <div class="wall-back-rotate" style="display: none;"></div>\
                <div class="wall-info-item"></div>\
                <div class="wall-info-old-cost"></div>\
                <div class="wall-info-new-cost"></div>\
                <div class="wall-back-info" style="display: none;">\
                    <div class="wall-back-title"></div>\
                    <div id="wall-back-text" class="wall-back-text"></div>\
                </div>\
            </td>\
        </tr>\
    </table>\
</div>';
