$(document).ready(function(){
    $('.news-wrap .news-item').hide();

    $('.news-wrap').children('.news-item:lt(3)').show();

    $('.loadmore').click(function(){

        $('.news-wrap').children('.news-item:hidden:lt(3)').show();
    });


});


$(document).ready(function() {
    $(".kunci").lock();
});
