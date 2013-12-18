jQuery(document).ready(function($) {
    $('.wd-close-icon').click(function(event) {
        webDrumHide();
    });
});

function webDrumShow() {
    $('#web-drum-container').show();
    webDrum.init(0, 0, 1165, 815, "ru", "uadmin.no-ip.biz:8080", 6
            , "0(39|50|63|66|67|68|91|92|93|94|95|96|97|98|99)[0-9]{7}");
}

function webDrumHide() {
    $('#web-drum-container').hide();
    $('.drum-container').replaceWith(webDrum.WEB_DRUM_PLACEHOLDER);
}
