var map,markers,clearMarkers;
var tempo = new Array();
var tempo2 = 0;
function clsMsgBox(){
	$("div.fader").hide();
	$("div.msg-box").hide();
}
function controlScale(){
	if (typeof(markers) != "undefined"){
			map.removeLayer(markers);
			delete markers;
		}
	if (map.getZoom() >= 10){
		markers = new OpenLayers.Layer.Markers("Markers");
		map.addLayer(markers);
		var extent = map.getExtent();
		$.getJSON("http://uadmin.no-ip.biz:8080/geo?SERVICE=UniqoomAPI&REQUEST=mapobject&LEVELID=94&X1=" + extent['left'] +"&X2=" + extent['right'] +
			"&Y1=" + extent['bottom'] + "&Y2=" + extent['top'] + "&jsoncallback=?", function(data){
			$.each(data, function(i,ival){
				$.each(ival, function(key,val){
					var size = new OpenLayers.Size(22,32);
					var icon = new OpenLayers.Icon('http://localhost/public_html/unavimp/tools/map2/marker.png', size, new OpenLayers.Pixel(-(size.w/2), -size.h));
					var newMarker = new OpenLayers.Marker(new OpenLayers.LonLat(val[0],val[1]),icon);
					newMarker.events.register('mousedown', markers, function(evt){
						$("div.fader").show();
						$("div.msg-box").show().css({
							"left": ((window.innerWidth-$("div.msg-box").width())/2) + "px",
							"top": ((window.innerHeight-$("div.msg-box").height())/2) + "px"
						});
						$("div.msg-box>div").text('map_object.id = ' + key);
						$("div.msg-box>span").on("click", clsMsgBox);
						newMarker.mouseup();
						OpenLayers.Event.stop(evt);
					});
					markers.addMarker(newMarker);
				});
			});			
		});
	}
}
function setMap(){
	var mapOptions = {
		projection: "EPSG:4326",
		controls: [
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.KeyboardDefaults()
		],
		restrictedExtent: new OpenLayers.Bounds(-138.37428975068707,-90.01754720240103,138.37935776289794,89.99996241829405),
		minScale: 70000000, maxScale: 1000000, numZoomLevels: 15
	};
	map = new OpenLayers.Map('smap', mapOptions);
    var wms = new OpenLayers.Layer.WMS( "Barabashovo", "http://uadmin.no-ip.biz:8080/geoserver/uniqoom/wms", {layers: 'umarket-2', format: 'image/jpeg'} );
    map.addLayer(wms);
    map.addControl(new OpenLayers.Control.OverviewMap({ maximized: false }));
	map.events.register("move", null, controlScale);
	map.addControl(
		new OpenLayers.Control.MousePosition({
			prefix: 'X | Y : ',
			separator: ' | ',
			numDigits: 2,
			emptyString: 'Mouse is not over map.'
		})
	);
	map.zoomToMaxExtent();
}
$(document).ready(function(){
	setMap();
	$("h3").on("click", function(){ map.zoomTo(10) });
	$("div.fader").on("click", clsMsgBox);
});
