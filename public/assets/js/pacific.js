$(function () {
    $('.search-toggle').on('click', function (e) {
        e.preventDefault();
        $('.search-box-wrapper').toggle();
    });
    $('.thumb').click(function () {
        var thisImg = $(this);
        $('.main-image').attr('src',thisImg.attr('data'));
        $('.thumb').removeClass('active');
        thisImg.addClass('active');
    })
});
