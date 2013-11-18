function run_the_strip(){
	$("div.hor-scroller").PlayScroller();
}
// *** beginning. base timer ***
var secs;
var timerID = null;
var timerRunning = false;
var delay = 1000;
function InitializeTimer(){
	// Setting the length of the timer, in seconds
	secs=5;
	StopTheClock();
	StartTheTimer();
}
function StopTheClock(){
	if (timerRunning) {
		clearTimeout(timerID);
	}
   	timerRunning=false;
}
function StartTheTimer(){
	if (secs==0){
	StopTheClock();
		// Here's where you put something useful that's supposed to happen after the allotted time
		run_the_strip();
   	}else{
		self.status=secs;
		secs-=1;
		timerRunning=true;
		timerID=self.setTimeout("StartTheTimer()",delay);
   	}
}
// *** end. base timer ***
$(document).ready(function(){
	// disabling image dragging
	window.onload = function (e) {
	    var evt = e || window.event,// define event (cross browser)
        	divs,                   // images collection
	        i;                      // used in local loop
	    // if preventDefault exists, then define onmousedown event handlers
	    if (evt.preventDefault) {
        // collect all images on the page
        divs = document.getElementsByTagName('div');
        // loop through fetched images
        for (i = 0; i < divs.length; i++) {
            // and define onmousedown event handler
            divs[i].onmousedown = disableDragging;
        	}
    	}
	};
	function disableDragging(e) {
	    e.preventDefault();
	}
	$('.hor-scroller').SetScroller({
										velocity: 93,
										direction: 'horizontal',
										startfrom: rsDir,
										loop: 'infinite',
										movetype: 'linear',
										onstartup: 'play',
									});
	$("div.hor-scroller").mouseover(function(){ InitializeTimer() });
});