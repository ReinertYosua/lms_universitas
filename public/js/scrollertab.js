var hidWidth;
var scrollBarWidths = 40;

var widthOfList = function() {
    var itemsWidth = 0;
    $('.list a').each(function() {
        var itemWidth = $(this).outerWidth();
        itemsWidth += itemWidth;
        //alert(itemWidth);
    });
    return itemsWidth;
};

var widthOfHidden = function(){
    var ww = 0 - $('.wrapper-nav').outerWidth();

    var hw = (($('.wrapper-nav').outerWidth()) - widthOfList() - getLeftPosi()) - scrollBarWidths;

    var rp = $(document).width() - ($('.nav-item.nav-link').last().offset().left + $('.nav-item.nav-link').last().outerWidth());
    //alert(ww+"*"+hw+"*"+rp);
    if (ww > rp) {
        return (rp > ww ? rp : ww);
    }
    else {
        return (hw > ww ? hw : ww);
        
    }
};

var getLeftPosi = function(){
    
    var ww = 0 - $('.wrapper-nav').outerWidth();
    var lp = $('.list').position().left;
    
    if (ww > lp) {
        return ww;
    }
    else {
        return lp;
    }
};

var reAdjust = function(){
    // check right pos of last nav item
    var rp = $(document).width() - ($('.nav-item.nav-link').last().offset().left + $('.nav-item.nav-link').last().outerWidth());

    if (($('.wrapper-nav').outerWidth()) < widthOfList() && (rp < 0)) {
        $('.scroller-right').show().css('display', 'flex');
    }
    else {
        $('.scroller-right').hide();
    }
    
    if (getLeftPosi() < 0) {
        $('.scroller-left').show().css('display', 'flex');
    }
    else {
        $('.scroller-left').hide();
    }
}

reAdjust();

$(window).on('resize',function(e){
    reAdjust();
});

$('.scroller-right').click(function() {
    $('.scroller-left').fadeIn('slow');
    $('.scroller-right').fadeOut('slow');

    $('.list').animate({ left: `+=${widthOfHidden()}px` }, 'slow', function() {
        reAdjust();
    });
});

$('.scroller-left').click(function() {

    $('.scroller-right').fadeIn('slow');
    $('.scroller-left').fadeOut('slow');

    $('.list').animate({ left: `-=${getLeftPosi()}px` }, 'slow', function() {
        reAdjust();
    });
});