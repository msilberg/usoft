/*
 * IE hacks
 */
$(document).ready(function(){
	// placeholder
	$.get(addrUrl.getLbl(105), function(data){ uServe.add_placeholder("sch-field",data) });
	$("input#sch-field").focus(function(){ bMap.keyboardnav.deactivate() }).blur(function(){ bMap.keyboardnav.activate() });
});
