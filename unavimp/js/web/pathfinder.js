var pathfinder = {

    init: function(dialogId) {
        var id = '#' + dialogId;
        pathfinder.root = $(id).dialog({
            autoOpen: false
            , resizable: false
            , width: 410
            , height: 210
            , position: {
                my: "center"
                , at: "top"
                , of: window
            }
        });
        $(id).data('dialog').uiDialog.draggable('option', {
            cancel: '.ui-dialog-titlebar-close, #pf-a-select, #pf-b-select, #pf-calculate, .clickable'
            , handle: '.ui-dialog-titlebar, .ui-dialog-content'
        });
        pathfinder.source = $('#pf-a-select');
        pathfinder.destination = $('#pf-b-select');
        $('#pf-close').click(function(event) {
            $('#pathfinder').dialog('close');
        });
        pathfinder.fillSourceSelect();
        $('.clickable').click(pathfinder.onButtonClicked);
        $('#pf-calculate').click(pathfinder.onCalculateClick);
        $(document).tooltip({
            track: true
            , tooltipClass: 'pf-tooltip'
        });
    }

    , fillSourceSelect: function() {
        pathfinder.source.empty();
        $.each(pathfinder.sources[pathfinder.mode], function(index, value) {
            pathfinder.source.append(new Option(value[0], index));
        });
    }

    , onButtonClicked: function(event) {
        var button = $(event.currentTarget);
        if (button.is('.pf-transport-cell')) {
            button.addClass('pf-transport-active');
            var id = button.attr('id');
            $('.pf-transport-cell:not(#' + id + ')').removeClass('pf-transport-active');
            pathfinder.mode = id.replace('pf-', '');
            pathfinder.fillSourceSelect();
        }
    }
    
    , onCalculateClick: function(event) {
        var option = $("#pf-a-select option:selected").val();
        var point = pathfinder.sources[pathfinder.mode][option];
        var uri = 'http://' + pathfinder.host + '/geo?SERVICE=UniqoomAPI&REQUEST=path'
                + '&X1=' + pathfinder.x
                + '&Y1=' + pathfinder.y
                + '&X2=' + point[1]
                + '&Y2=' + point[2]
                + '&jsoncallback=?';
        $.getJSON(uri, function(data) {
            if (bMap.layerPath !== null) {
                bMap.map.removeLayer(bMap.layerPath);
                bMap.layerPath = null;
            }
            bMap.layerPath = new OpenLayers.Layer.Vector("Path");
            bMap.map.addLayer(bMap.layerPath);
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
            bMap.layerPath.addFeatures([lineFeature]);
        });
    }

    , show: function(destName, destX, destY) {
        if (pathfinder.root === null || typeof(pathfinder.root) === 'undefined') {
            return;
        }
        pathfinder.destination.val(destName);
        pathfinder.x = destX;
        pathfinder.y = destY;
        $('#pathfinder').dialog('open');
    }

    , hide: function() {
        $('#pathfinder').dialog('close');
    }

    , reset: function() {
        pathfinder.x = 0;
        pathfinder.y = 0;
        pathfinder.mode = 'car';
        pathfinder.fillSourceSelect();
    }

    , root: null
    , source: null
    , destination: null
    , x: 0
    , y: 0
    /**
     * Defines current dialog mode. Next values are valid: pedestrian, car, marshrutka, bus, tram
     * , metro.
     * @type String
     */
    , mode: 'car'
    , sources: {
        pedestrian: {0: ['Choose initial point on map', 0, 0]}
        , car: {
            1: ['Проспектная - Марселя Кашена', 36.2908215846, 50.0037276654]
            , 2: ['Проспектная - Елены Стасовой (запад)',36.292664674933, 50.004964504807]
            , 3: ['Проспектная - Елены Стасовой (восток)',36.296140547689, 50.00699132069]
            , 4: ['Академика Барабашова',36.299445187262, 50.011259282413]
            , 5: ['Районная',36.299119032982, 50.00758771709]
            , 6: ['Елены Стасовой - Якира',36.298481869485, 50.001726258743]
            , 7: ['Якира',36.302071896238, 50.001274302099]
            , 8: ['Академика Павлова - Амурская',36.306523316464, 50.002406523387]
            , 9: ['Академика Павлова - 50-летия ВЛКСМ (север)',36.30836841782, 50.003235887128]
            , 10: ['Академика Павлова - 50-летия ВЛКСМ (юг)',36.309090039629, 50.000743136561]
            , 11: ['Внутренний двор 1',36.308080124012, 50.009498049308]
            , 12: ['Внутренний двор 2',36.311444172443, 50.008631410792]
            , 13: ['Север',36.311043468613, 50.013775329723]
        } , marshrutka: {
            1: ['Въезд от магазина "Строитель" (ул. Якира)', 36.297653087069, 49.999890476089]
            , 2: ['Въезд с ул. Якира', 36.299917529642, 50.001260324065]
        }
        , bus: {
            1: ['Въезд от магазина "Строитель" (ул. Якира)', 36.297653087069, 49.999890476089]
            , 2: ['Въезд с ул. Якира', 36.299917529642, 50.001260324065]
        }
        , tram: {
            1: ['Въезд со стороны перекрестка ул. Ак. Павлова - ул. Якира', 36.304398658669, 49.99984854197]
            , 2: ['Центральный въезд ул. Ак. Павлова/50 Лет ВЛКСМ', 36.308321828723, 50.003678525088]
            , 3: ['Въезд со стороны метро Ак. Павлова', 36.312095899678, 50.007364068452]
        }
        , metro: {
            1: ['Выход метро (каменные ряды)', 36.3016323552, 50.0047952678]
            , 2: ['Выход метро (красная река)', 36.30432759707, 50.004955186125]
            , 3: ['Выход метро (лужники)', 36.301760296952, 50.003664547046]
            , 4: ['Выход метро (круг троллейбуса)', 36.304519801687, 50.003128722158]
        }
    }
    , host: 'uadmin.no-ip.biz:8080'
//    , host: '192.167.1.2:8080'
};
