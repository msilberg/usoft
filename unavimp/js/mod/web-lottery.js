jQuery(document).ready(function($) {
    $('.wl-close-icon').click(function(event) {
        webLotteryHide();
    });
});

function webLotteryShow() {
    $('#web-lottery-container').show();
    webLottery(0, 0, 1165, 815, "ru", "uadmin.no-ip.biz:8080", 6
            , "0(39|50|63|66|67|68|91|92|93|94|95|96|97|98|99)[0-9]{7}");
}

function webLotteryHide() {
    $('#web-lottery-container').hide();
    $('.lottery-container').replaceWith('<div class="lottery-placeholder"></div>');
}
