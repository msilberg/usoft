var base = {};
	base.gPointer = 0;
	base.dcTimer = null;
base.detectCaret = function(){
	var el = document.getElementById("sch-area");
	if (el.selectionStart || el.selectionStart == '0'){ base.gPointer = el.selectionStart }
}
base.runLeft = function(){
	if (base.gPointer == 0){ return false }
	var el = document.getElementById("sch-area");
	el.selectionStart = el.selectionEnd = --base.gPointer;
	$("div.otp").text(base.gPointer);
}
base.runRight = function(){
	var el = document.getElementById("sch-area");
	if (base.gPointer == el.value.length){ return false }
	el.selectionStart = el.selectionEnd = ++base.gPointer;
	$("div.otp").text(base.gPointer);
}
$(document).ready(function(){

$('textarea#keyboard').keyboard({
  // *** choose layout ***
  layout: 'qwerty-russian',
  customLayout: {
  	'default': [
		"\u0451 1 2 3 4 5 6 7 8 9 0 - = {bksp}",
		"\u0439 \u0446 \u0443 \u043a \u0435 \u043d \u0433 \u0448 \u0449 \u0437 \u0445 \u044a \\",
		"\u0444 \u044b \u0432 \u0430 \u043f \u0440 \u043e \u043b \u0434 \u0436 \u044d",
		"{shift} \u044f \u0447 \u0441 \u043c \u0438 \u0442 \u044c \u0431 \u044e . {shift}",
		"{accept} {alt} {space} {cancel} {meta1} {meta2}"
	],
	'meta1': [],
	'meta2': [],
	'shift': [
		'\u0401 ! " № ; % : ? * ( ) _ + {bksp}',
		"\u0419 \u0426 \u0423 \u041a \u0415 \u041d \u0413 \u0428 \u0429 \u0417 \u0425 \u042a |",
		'\u0424 \u042b \u0412 \u0410 \u041f \u0420 \u041e \u041b \u0414 \u0416 \u042d',
		"{shift} \u042f \u0427 \u0421 \u041c \u0418 \u0422 \u042c \u0411 \u042e . {shift}",
		"{accept} {alt} {space} {cancel} {meta1} {meta2}"
	],
	'alt-shift': [
		"~ ! @ # $ % ^ & * ( ) _ + {bksp}",
		"Q W E R T Y U I O P { } |",
		'A S D F G H J K L : "',
		"{shift} Z X C V B N M < > ? {shift}",
		"{accept} {alt} {space} {cancel} {meta1} {meta2}"
	],
	'alt': [
		'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
		"q w e r t y u i o p [ ] \\",
		"a s d f g h j k l ; '",
		"{shift} z x c v b n m , . / {shift}",
		"{accept} {alt} {space} {cancel} {meta1} {meta2}"
	] 
  	
   },
  position     : {
    of : null, // optional - null (attach to input/textarea) or a jQuery object (attach elsewhere)
    my : 'center top',
    at : 'center top',
    at2: 'center bottom' // used when "usePreview" is false (centers keyboard at bottom of the input/textarea)
  },

  // preview added above keyboard if true, original input/textarea used if false
  usePreview   : true,

  // if true, the keyboard will always be visible
  alwaysOpen   : false,

  // if true, keyboard will remain open even if the input loses focus.
  stayOpen     : false,

  // *** change keyboard language & look ***
  display : {
    'a'      : '\u2714:Accept (Shift-Enter)', // check mark - same action as accept
    'accept' : 'Найти:Accept (Shift-Enter)',
    'alt'    : 'English:Alternate Graphemes',
    'b'      : '\u2190:Backspace',    // Left arrow (same as &larr;)
    'bksp'   : '\u0008\u27F5\u0008:Backspace',
    'c'      : '\u2716:Cancel (Esc)', // big X, close - same action as cancel
    'cancel' : 'Закрыть:Cancel (Esc)',
    'clear'  : 'C:Clear',             // clear num pad
    'combo'  : '\u00f6:Toggle Combo Keys',
    'dec'    : '.:Decimal',           // decimal point for num pad (optional), change '.' to ',' for European format
    'e'      : '\u21b5:Enter',        // down, then left arrow - enter symbol
    'enter'  : 'Enter:Enter',
    'lock'   : '\u21ea Lock:Caps Lock', // caps lock
    'next'   : 'Next',
    'prev'   : 'Prev',
    's'      : '\u21e7:Shift',        // thick hollow up arrow
    'shift'  : '\u21e7:Shift',
    'sign'   : '\u00b1:Change Sign',  // +/- sign for num pad
    'space'  : '&nbsp;:Space',
    't'      : '\u21e5:Tab',          // right arrow to bar (used since this virtual keyboard works with one directional tabs)
    'tab'    : '\u21e5 Tab:Tab'       // \u21b9 is the true tab symbol (left & right arrows)
  },

  // Message added to the key title while hovering, if the mousewheel plugin exists
  wheelMessage : '',

  css : {
    input          : 'ui-widget-content ui-corner-all', // input & preview
    container      : 'ui-widget-content ui-widget ui-corner-all ui-helper-clearfix', // keyboard container
    buttonDefault  : 'ui-state-default ui-corner-all', // default state
    buttonHover    : 'ui-state-hover',  // hovered button
    buttonAction   : 'ui-state-active', // Action keys (e.g. Accept, Cancel, Tab, etc); replaces "actionClass"
    buttonDisabled : 'ui-state-disabled' // used when disabling the decimal button {dec}
  },

  // *** Useability ***
  // Auto-accept content when clicking outside the keyboard (popup will close)
  autoAccept   : false,

  // Prevents direct input in the preview window when true
  lockInput    : false,

  // Prevent keys not in the displayed keyboard from being typed in
  restrictInput: false,

  // Check input against validate function, if valid the accept button is clickable;
  // if invalid, the accept button is disabled.
  acceptValid  : true,

  // Use tab to navigate between input fields
  tabNavigation: false,

  // press enter (shift-enter in textarea) to go to the next input field
  enterNavigation : true,
  // mod key options: 'ctrlKey', 'shiftKey', 'altKey', 'metaKey' (MAC only)
  enterMod : 'altKey', // alt-enter to go to previous; shift-alt-enter to accept & go to previous

  // if true, the next button will stop on the last keyboard input/textarea; prev button stops at first
  // if false, the next button will wrap to target the first input/textarea; prev will go to the last
  stopAtEnd : true,

  // Set this to append the keyboard immediately after the input/textarea it is attached to.
  // This option works best when the input container doesn't have a set width and when the
  // "tabNavigation" option is true
  appendLocally: false,

  // If false, the shift key will remain active until the next key is (mouse) clicked on;
  // if true it will stay active until pressed again
  stickyShift  : true,

  // Prevent pasting content into the area
  preventPaste : false,

  // Set the max number of characters allowed in the input, setting it to false disables this option
  maxLength    : false,

  // Mouse repeat delay - when clicking/touching a virtual keyboard key, after this delay the key
  // will start repeating
  repeatDelay  : 500,

  // Mouse repeat rate - after the repeatDelay, this is the rate (characters per second) at which the
  // key is repeated. Added to simulate holding down a real keyboard key and having it repeat. I haven't
  // calculated the upper limit of this rate, but it is limited to how fast the javascript can process
  // the keys. And for me, in Firefox, it's around 20.
  repeatRate   : 20,

  // resets the keyboard to the default keyset when visible
  resetDefault : false,

  // Event (namespaced) on the input to reveal the keyboard. To disable it, just set it to ''.
  openOn       : 'focus',

  // When the character is added to the input
  keyBinding   : 'mousedown',

  // combos (emulate dead keys : http://en.wikipedia.org/wiki/Keyboard_layout#US-International)
  // if user inputs `a the script converts it to à, ^o becomes ô, etc.
  useCombos    : true,

  // *** Methods ***
  // Callbacks - add code inside any of these callback functions as desired
  initialized : function(e, keyboard, el) {},
  visible     : function(e, keyboard, el) {},
  change      : function(e, keyboard, el) {},
  beforeClose : function(e, keyboard, el, accepted) {},
  accepted    : function(e, keyboard, el) {},
  canceled    : function(e, keyboard, el) {},
  hidden      : function(e, keyboard, el) {},

  switchInput : null, // called instead of base.switchInput

  // this callback is called just before the "beforeClose" to check the value
  // if the value is valid, return true and the keyboard will continue as it should
  // (close if not always open, etc)
  // if the value is not value, return false and the clear the keyboard value
  // ( like this "keyboard.$preview.val('');" ), if desired
  // The validate function is called after each input, the "isClosing" value will be false;
  // when the accept button is clicked, "isClosing" is true
  validate    : function(keyboard, value, isClosing){
  	$("textarea.ui-widget-content:eq(1)").attr("id","sch-area");
  	base.detectCaret();
    $("button.ui-keyboard-meta1").replaceWith("<button class='ui-keyboard-button ui-state-default ui-corner-all cnt-arr-left' onclick='base.runLeft()'>&larr;</button>");
    $("button.ui-keyboard-meta2").replaceWith("<button class='ui-keyboard-button ui-state-default ui-corner-all cnt-arr-right' onclick='base.runRight()'>&rarr;</button>");
  	return true;
  }
});

});