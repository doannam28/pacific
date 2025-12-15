<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/home/vendor/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/home/vendor/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="assets/home/vendor/swiper.min.css" />
    <link href="assets/home/vendor/animate.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/home/vendor/jquery.mCustomScrollbar.min.css" />
    <link href="assets/home/main.css?t=214" type="text/css" rel="stylesheet" />
    <link href="assets/home/custom.css?t=214" type="text/css" rel="stylesheet" />
    <link href="/assets/css/styles.css?v={{ env('VERSION_CSS') }}" rel="stylesheet">
    @yield('meta')
    <link rel="canonical" href="{{ url()->current() }}" itemprop="url" />
    <?php $setting = App\Helpers\Utility::setting();?>
    <link rel="shortcut icon" href="{{Storage::disk('admin')->url($setting->favicon)}}">
    @stack('css')
</head>
<body>
<script type="text/javascript" src="assets/home/vendor/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/jquery.show-more.js?v=3"></script>
<div class="wrap">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
<script type="text/javascript" src="assets/home/vendor/swiper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/1.1.6/waypoints.min.js"></script>
<script type="text/javascript" src="assets/home/vendor/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="assets/home/vendor/jquery.mCustomScrollbar.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="assets/home/vendor/bootstrap.min.js"></script>
<script src="assets/js/jquery.preload.min.js"></script>
<script type="text/javascript">
    var $i18n = {
        showMore: 'Xem thêm <span class="icon"><img src="assets/img-fix/chevron-down.png" alt=""></span>',
        showLess: 'Thu gọn <span class="icon"><img src="assets/img-fix/chevron-up.png" alt=""></span>',
    }
</script>
<script type="text/javascript">
    // Function click map

    $(document).ready(function () {
        // waypoint Number
        //$('#map-runner1').waypoint(function () {
        //    increment(1, 8);
        //},
        //    { offset: '75%' });
        //$('#map-runner2').waypoint(function () {
        //    increment(2, 302);
        //},
        //    { offset: '75%' });

        function increment(elem, finalVal) {
            var currVal = parseInt(document.getElementById(elem).innerHTML, 10);
            if (currVal < finalVal) {
                currVal++;
                document.getElementById(elem).innerHTML = currVal;

                setTimeout(function () {
                    increment(elem, finalVal);
                }, 40)
            }
        };
        /* Menu Moblie */
        var windowsize = $(window).width();
        if (windowsize <= 991) {
            $(function () {
                $("nav#menu").mmenu({
                    extensions: ["effect-slide-menu", "pageshadow"],
                    counters: true,
                    navbar: {
                        title: "Danh mục"
                    },
                    navbars: [
                        {
                            position: "top",
                            // content   : [ 'searchfield' ]
                            // }, {
                            content: ["prev", "title", "close"]
                        },
                        {
                            position: "bottom",
                            content: []
                        }
                    ]
                });
            });
        }
        else {

        }

        // Slide banner
        var swiper_banner = new Swiper("#slider-banner-home", {
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,
            autoHeight: true,

            autoplay: {
                delay: 3000,
            },
            roundLengths: true,
            speed: 800,
            simulateTouch: false,
            pagination: {
                el: "#pagination-banner",
                type: "bullets",
                clickable: true
            }



        });
        // Slide research-development
        // var menu_pagination = ['01','02','03']
        var swiper_research_development = new Swiper("#slide-research-development", {
            slidesPerView: 1,
            loop: true,
            keyboard: {
                enabled: true
            },
            roundLengths: true,
            speed: 800,
            pagination: {
                el: '#pagination-research-development',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                }
            },

            breakpoints: {
                991: {
                    slidesPerView: 1,
                    autoHeight: true,
                },
            }

        });
        $('#research .wp-research-development--right .item-picture-wp:eq(0)').addClass('active');
        swiper_research_development.on('transitionEnd', function () {
            $('#research .wp-research-development--right .item-picture-wp').removeClass('active');
            $('#research .wp-research-development--right .item-picture-wp:eq(' + swiper_research_development.realIndex + ')').addClass('active');
        });
        if (windowsize >= 991) {
            $(".item-picture-wp:nth-child(1) .texture-animation").click(function () {
                setTimeout(function () {
                    swiper_research_development.slideTo(1);
                }, 175);
            })
            $(".item-picture-wp:nth-child(2) .texture-animation").click(function () {
                setTimeout(function () {
                    swiper_research_development.slideTo(2);
                }, 175);
            })
            $(".item-picture-wp:nth-child(3) .texture-animation").click(function () {
                setTimeout(function () {
                    swiper_research_development.slideTo(3);
                }, 175);
            })
        }

        /* Slide new */
        var swiperNew = new Swiper("#slider-new", {
            slidesPerView: '4',
            roundLengths: true,
            speed: 500,

            navigation: {
                nextEl: "#next-new",
                prevEl: "#prev-new",
            },
            breakpoints: {
                991: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                767: {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                },
                575: {
                    slidesPerView: 1.2,
                    spaceBetween: 0,
                },
            }


        });
        /* Scroll menu */

        $(window).scroll(function (event) {
            offsetAdd = $(window).scrollTop();
            if (offsetAdd >= 50) {
                $('.wp-menu-header').addClass('scroll');
            }
            else {
                $('.wp-menu-header').removeClass('scroll');
            }
        });
        /* Scrollspy */
        $('.txt-menu-dk').click(function () {
            $('.txt-menu-dk').removeClass('active');
            $(this).addClass('active');
            var idMenu = '#' + $(this).attr('href').split('#')[1];
            $('html,body').animate({
                scrollTop: $(idMenu).offset().top - 40
            }, 600);

        });
        $(window).scroll(function () {
            var offsetWindow = $(window).scrollTop();
            var wpMenu = ['research', 'products', 'sustainable', 'global'];
            var menuActive;
            for (var i = 0; i < wpMenu.length; i++) {
                if ($('#' + wpMenu[i]).offset().top - 40 <= offsetWindow) {
                    menuActive = wpMenu[i];
                }
            }
            $('.txt-menu-dk').removeClass('active');
            $(".item-menu-page a[href='/vi/#" + menuActive + "']").addClass('active');
        });
        /* Search */
        $('.icon-search').click(function (event) {
            $('.form-search').toggleClass('open-search');
            $('.wp-menu-page').removeClass('open-menu');
            $('.menu-language').removeClass('active');
        });
        function RemoveSearch(argument) {
            $('.form-search').removeClass('open-search');
            $('.wp-menu-page').removeClass('open-menu');
        }

        function doSearch() {
            var kw = $('.search-trigger').val();
            if (kw != '') {
                window.location.href = '/vi/search.htm?keyword=' + kw;
            }
        }
        $('#main-btn-search').click(function () {
            doSearch();
        });
        $('.search-trigger').off('keydown').on('keydown', function (evt) {
            if (evt.keyCode == 13) {
                evt.preventDefault();
                doSearch();
                return false;
            }
        });

        $(window).scroll(function (event) {
            offsetAdd = $(window).scrollTop();
            if (offsetAdd >= 0) {
                RemoveSearch()
            }

        });
        /* Click Language  */
        //$('.item-language.en').hide();
        //$(".vn").click(function () {
        //    $('.item-language.vn').hide();
        //    $('.item-language.en').show();
        //});
        //$(".en").click(function () {
        //    $('.item-language.en').hide();
        //    $('.item-language.vn').show();
        //});
        // Click tab menu detail
        $('.icon-menu-mb').click(function (event) {
            $('.block-menu-detail').addClass('open-menu');
            if (windowsize > 991) {
                $('body').addClass('menu-opened');
            }
        });
        $('.icon-close-menu-detail').click(function (event) {
            $('.block-menu-detail').removeClass('open-menu');
            if (windowsize > 991) {
                $('body').removeClass('menu-opened');
            }
        });
        /* Click menu remove search */
        $('.nav-menu').click(function (event) {
            $('.form-search').removeClass('open-search');
            $('.wp-menu-page').removeClass('open-menu');
        });


        // Click content andress Map
        $('.icon-plus-map').click(function () {
            $('.info-map-dl').removeClass('active');
            if ($(this).hasClass('rotate')) {
                $('.scroll-layout-map').removeClass('active');
                $('.icon-plus-map').removeClass('rotate');
            } else {
                $(this).parents('.info-map-dl').addClass('active');
                $('.scroll-layout-map').removeClass('active');
                $('.icon-plus-map').removeClass('rotate');
                $(this).closest('.info-map-dl').find('.scroll-layout-map').addClass('active');
                $(this).closest('.info-map-dl').find('.icon-plus-map').addClass('rotate');
                $(this).closest('.info-map-dl').find('.scroll-layout-map').css({
                    top: - $(this).closest('.info-map-dl').find('.scroll-layout-map').height() / 2
                });
            }
        });
        $('.close-content-box').click(function (event) {
            $('.scroll-layout-map').removeClass('active');
            $('.icon-plus-map').removeClass('rotate');
        });

        // Scroll aniamtion Research & Development
        $(window).scroll(function (event) {
            var OffsetBox_Research = $('.wp-research-development').offset().top;
            if ($(window).scrollTop() > OffsetBox_Research - 100) {
                $('.wp-research-development').addClass('animation-circle');
            }
            else {

            }
        });

        // Scroll animation Products

        $(window).scroll(function (event) {
            var OffsetBox_Research = $('.block-tab-solution-products').offset().top;
            if ($(window).scrollTop() > OffsetBox_Research - 100) {
                $('.block-content-solution-products').addClass('animation-circle');
            }
            else {

            }
        });

        // Set Height block Research & Development


        if (windowsize <= 767) {

            //$('.txt-read-more').click(function (event) {

            //    $('.content-item-slide').removeClass('ellipse-text');
            //    $(this).closest('.layout-item-slide').find('.content-item-slide').addClass('ellipse-text');
            //    var heightParent = $(this).closest('.content-item-slide').height();
            //    var heightTotalPB = 58;
            //    var HeightTotal = heightParent + heightTotalPB;
            //    $('.pagination-rd').css("top", HeightTotal);
            //});

            //$('.txt-remove-more').click(function (event) {
            //    $('.content-item-slide').removeClass('ellipse-text');
            //    $('.pagination-rd').css("top", 244);

            //});
            //swiper_research_development.on('slideChange', function () {
            //    $('.content-item-slide').removeClass('ellipse-text');
            //    $('.pagination-rd').css("top", 244);
            //});
        }
        $('.item-menu-products').each(function () {
            var url = $(this).attr('data-url');
            if (url && url.startsWith('http')) {
                $(this).attr('href', url);
                $(this).attr('target', '_blank');
                return;
            }
        });
        $('.item-menu-products').click(function (event) {
            var url = $(this).attr('data-url');
            if (url && url.startsWith('http')) {
                //window.location.href = url;
                return;
            }
            $('.layout-solutions-procuts').hide();
            var dataId = $(this).attr('data-id');
            $('#' + dataId).show();
            $('.item-menu-products').removeClass('active');
            $(this).addClass('active');
            $('.prev-zone-btn, .next-zone-btn').hide();
            if ($(window).width() > 768) {
                $('.prev-zone-btn[data-slide="' + dataId + '"]').show();
                $('.next-zone-btn[data-slide="' + dataId + '"]').show();
                if (!$(this).hasClass('slide-inited')) {
                    var id = dataId;
                    // SLIDE PRODUCTS
                    var swiper = new Swiper("#" + id, {
                        slidesPerView: 3,
                        slidesPerGroup: 1,
                        spaceBetween: 40,
                        loop: false,
                        centeredSlides: false,
                        roundLengths: true,
                        speed: 800,
                        navigation: {
                            nextEl: $('.next-zone-btn[data-slide="' + dataId + '"]'),
                            prevEl: $('.prev-zone-btn[data-slide="' + dataId + '"]')
                        },
                        pagination: {
                            el: "#pagination-products",
                            type: "bullets",
                            clickable: true
                        },
                        breakpoints: {
                            991: {
                                slidesPerView: 2,
                                slidesPerGroup: 1,
                                centeredSlides: false
                            },
                            575: {
                                slidesPerView: 1,
                                centeredSlides: false
                            }
                        }
                    });
                    $(this).addClass('slide-inited');
                    var swiper__slidecount = swiper.slides.length - 2;
                    if (swiper__slidecount < 3) {
                        $('.prev-zone-btn[data-slide="' + dataId + '"]').remove();
                        $('.next-zone-btn[data-slide="' + dataId + '"]').remove();
                    }
                }
            }
        });
        $('.item-menu-products:eq(0)').trigger('click');
        //.addClass('active');
        //$('.layout-solutions-procuts').hide();
        //$('.layout-solutions-procuts:eq(0)').show();

        function iOS() {
            return [
                    'iPad Simulator',
                    'iPhone Simulator',
                    'iPod Simulator',
                    'iPad',
                    'iPhone',
                    'iPod'
                ].includes(navigator.platform)
                // iPad on iOS 13 detection
                || (navigator.userAgent.includes("Mac") && "ontouchend" in document)
        }
        $(function () {
            //if (!iOS()) {
            //    $('img').preload({
            //        placeholder: '/img-fix/img-bg-logo-green.png',
            //        notFound: '/img-fix/img-bg-logo-green.png'
            //    });
            //}
            if ($(window).width() <= 1024) {
                $('.img-sustainable').click(function () {
                    if ($(this).hasClass('clicked')) {
                        $(this).removeClass('clicked');
                    } else {
                        $(this).addClass('clicked');
                    }
                });
            }
            if (windowsize <= 767) {
                $('.txt-nd-item-slide').showMore({
                    minheight: 77,
                    buttontxtmore: $i18n.showMore,
                    buttontxtless: $i18n.showLess,
                    callback: function (isShow, $elm) {
                        //$('.pagination-rd').css("top", HeightTotal);
                        if (isShow) {
                            setTimeout(function () {
                                var heightParent = $elm.closest('.content-item-slide').height();
                                var heightTotalPB = 40;
                                var HeightTotal = heightParent + heightTotalPB;
                                $('.pagination-rd').css("top", HeightTotal);
                                //$('.pagination-rd').css("top", 330);
                            }, 100)
                        }
                        else
                            $('.pagination-rd').css("top", 220);
                    }
                });
                swiper_research_development.on('slideChange', function () {
                    $('.pagination-rd').css("top", 220);
                    $('.txt-nd-item-slide').css('max-height', '77px');
                    $('.showmore-button').html($i18n.showMore)
                });
            }
        })
    });


</script>
<div id='arcontactus'></div>
<script>
    var arcface = '';
    var arczalo = '';
    var arcsky = '';
    var arcemail = 'southernseed@ssc.com.vn';
    var arctel = '02839483089';
    var arCuMessages ='';
    var btnContactText ='';
    var btnSendEmail ='';

    var language=$('.item-language').text();

    if(language == 'Tiếng Việt'){

        arCuMessages = ["Hello", "Can I help you?"];
        btnContactText = 'Contact';
        btnSendEmail ='Send Email';
    }else{
        arCuMessages = ["Xin chào", "SSC có thể giúp gì cho bạn?"];
        btnContactText = 'Liên hệ';
        btnSendEmail ='Gửi Email';
    }

    var arCuLoop = false;

    var arCuCloseLastMessage = false;

    var arCuPromptClosed = false;

    var _arCuTimeOut = null;

    var arCuDelayFirst = 2000;

    var arCuTypingTime = 2000;

    var arCuMessageTime = 4000;

    var arCuClosedCookie = 0;

    var arcItems = [];

    window.addEventListener('load', function () {

        arCuClosedCookie = arCuGetCookie('arcu-closed');

        jQuery('#arcontactus').on('arcontactus.init', function () {

            if (arCuClosedCookie) {

                return false;

            }

            arCuShowMessages();

        });

        jQuery('#arcontactus').on('arcontactus.openMenu', function () {

            clearTimeout(_arCuTimeOut);

            arCuPromptClosed = true;

            jQuery('#contact').contactUs('hidePrompt');

            arCuCreateCookie('arcu-closed', 1, 30);

        });

        jQuery('#arcontactus').on('arcontactus.hidePrompt', function () {

            clearTimeout(_arCuTimeOut);

            arCuPromptClosed = true;

            arCuCreateCookie('arcu-closed', 1, 30);

        });



        var arcItem = {};

        arcItem.id = 'msg-item-1';

        arcItem.class = 'msg-item-facebook-messenger';

        arcItem.title = 'Messenger';

        arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z"></path></svg>';

        arcItem.href = 'https://m.me/' + arcface;

        arcItem.color = '#567AFF';

        if (arcface != '') {
            arcItems.push(arcItem);
        }



        var arcItem = {};

        arcItem.id = 'msg-item-9';

        arcItem.class = 'msg-item-telegram-plane';

        arcItem.title = 'Zalo Chat';

        arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path></svg>';

        arcItem.href = 'https://zalo.me/' + arczalo;

        arcItem.color = '#1EBEA5';

        if (arczalo != '') {
            arcItems.push(arcItem);
        }
        var arcItem = {};

        arcItem.id = 'msg-item-6';

        arcItem.class = 'msg-item-skype';

        arcItem.title = 'Skype Chat';

        arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.7 299.8c2.9-14 4.7-28.9 4.7-43.8 0-113.5-91.9-205.3-205.3-205.3-14.9 0-29.7 1.7-43.8 4.7C161.3 40.7 137.7 32 112 32 50.2 32 0 82.2 0 144c0 25.7 8.7 49.3 23.3 68.2-2.9 14-4.7 28.9-4.7 43.8 0 113.5 91.9 205.3 205.3 205.3 14.9 0 29.7-1.7 43.8-4.7 19 14.6 42.6 23.3 68.2 23.3 61.8 0 112-50.2 112-112 .1-25.6-8.6-49.2-23.2-68.1zm-194.6 91.5c-65.6 0-120.5-29.2-120.5-65 0-16 9-30.6 29.5-30.6 31.2 0 34.1 44.9 88.1 44.9 25.7 0 42.3-11.4 42.3-26.3 0-18.7-16-21.6-42-28-62.5-15.4-117.8-22-117.8-87.2 0-59.2 58.6-81.1 109.1-81.1 55.1 0 110.8 21.9 110.8 55.4 0 16.9-11.4 31.8-30.3 31.8-28.3 0-29.2-33.5-75-33.5-25.7 0-42 7-42 22.5 0 19.8 20.8 21.8 69.1 33 41.4 9.3 90.7 26.8 90.7 77.6 0 59.1-57.1 86.5-112 86.5z"></path></svg>';

        arcItem.href = 'skype://' + arcsky + '?chat';

        arcItem.color = '#1C9CC5';

        if (arcsky != '') {
            arcItems.push(arcItem);
        }

        var arcItem = {};

        arcItem.id = 'msg-item-7';

        arcItem.class = 'msg-item-envelope';

        arcItem.title = btnSendEmail;

        arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>';

        arcItem.href = 'mailto:' + arcemail;

        arcItem.color = '#FF643A';

        if (arcemail != '') {
            arcItems.push(arcItem);
        }

        var arcItem = {};

        arcItem.id = 'msg-item-8';

        arcItem.class = 'msg-item-phone';

        arcItem.title = 'Call ' + arctel;

        arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';

        arcItem.href = 'tel:' + arctel;

        arcItem.color = '#4EB625';

        if (arctel != '') {
            arcItems.push(arcItem);
        }



        jQuery('#arcontactus').contactUs({

            items: arcItems

        });

    });

</script>
<style>
    .arcontactus-widget.right.arcontactus-message { right: 20px }
    .arcontactus-widget.right.arcontactus-message { bottom: 20px }
    .arcontactus-widget .arcontactus-message-button
    .pulsation { -webkit-animation-duration: 2s; animation-duration: 2s }
    .arcontactus-widget.md .arcontactus-message-button, .arcontactus-widget.md.arcontactus-message { width: 60px; height: 60px }
    .arcontactus-widget { opacity: 0; transition: .2s opacity }
    .arcontactus-widget * { box-sizing: border-box }
    .arcontactus-widget.left.arcontactus-message { left: 20px; right: auto }
    .arcontactus-widget.left .arcontactus-message-button { right: auto; left: 0 }
    .arcontactus-widget.left .arcontactus-prompt { left: 80px; right: auto; transform-origin: 0 50% }
    .arcontactus-widget.left .arcontactus-prompt:before { border-right: 8px solid #FFF; border-top: 8px solid transparent; border-left: 8px solid transparent; border-bottom: 8px solid transparent; right: auto; left: -15px }
    .arcontactus-widget.left .messangers-block { right: auto; left: 0; -webkit-transform-origin: 10% 105%; -ms-transform-origin: 10% 105%; transform-origin: 10% 105% }
    .arcontactus-widget.left .callback-countdown-block { left: 0; right: auto }
    .arcontactus-widget.left .callback-countdown-block::before, .arcontactus-widget.left .messangers-block::before { left: 25px; right: auto }
    .arcontactus-widget.md .callback-countdown-block, .arcontactus-widget.md .messangers-block { bottom: 70px }
    .arcontactus-widget.md .arcontactus-prompt { bottom: 5px }
    .arcontactus-widget.md.left .callback-countdown-block:before, .arcontactus-widget.md.left .messangers-block:before { left: 21px }
    .arcontactus-widget.md.left .arcontactus-prompt { left: 70px }
    .arcontactus-widget.md.right .callback-countdown-block:before, .arcontactus-widget.md.right .messangers-block:before { right: 21px }
    .arcontactus-widget.md.right .arcontactus-prompt { right: 70px }
    .arcontactus-widget.md .arcontactus-message-button .pulsation { width: 74px; height: 74px }
    .arcontactus-widget.md .arcontactus-message-button .callback-state, .arcontactus-widget.md .arcontactus-message-button .icons { width: 40px; height: 40px; margin-top: -20px; margin-left: -20px }
    .arcontactus-widget.sm .arcontactus-message-button, .arcontactus-widget.sm.arcontactus-message { width: 50px; height: 50px }
    .arcontactus-widget.sm .callback-countdown-block, .arcontactus-widget.sm .messangers-block { bottom: 60px }
    .arcontactus-widget.sm .arcontactus-prompt { bottom: 0 }
    .arcontactus-widget.sm.left .callback-countdown-block:before, .arcontactus-widget.sm.left .messangers-block:before { left: 16px }
    .arcontactus-widget.sm.left .arcontactus-prompt { left: 60px }
    .arcontactus-widget.sm.right .callback-countdown-block:before, .arcontactus-widget.sm.right .messangers-block:before { right: 16px }
    .arcontactus-widget.sm.right .arcontactus-prompt { right: 60px }
    .arcontactus-widget.sm .arcontactus-message-button .pulsation { width: 64px; height: 64px }
    .arcontactus-widget.sm .arcontactus-message-button .icons { width: 40px; height: 40px; margin-top: -20px; margin-left: -20px }
    .arcontactus-widget.sm .arcontactus-message-button .static { margin-top: -16px }
    .arcontactus-widget.sm .arcontactus-message-button .callback-state { width: 40px; height: 40px; margin-top: -20px; margin-left: -20px }
    .arcontactus-widget.active { opacity: 1 }
    .arcontactus-widget .icons.hide, .arcontactus-widget .static.hide { opacity: 0; transform: scale(0) }
    .arcontactus-widget.arcontactus-message { z-index: 10000; right: 20px; bottom: 20px; position: fixed !important; height: 70px; width: 70px }
    .arcontactus-widget .arcontactus-message-button { width: 70px; position: absolute; height: 70px; right: 0; background-color: #18A850; border-radius: 50px; -webkit-box-sizing: border-box; box-sizing: border-box; text-align: center; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; cursor: pointer }
    .arcontactus-widget .arcontactus-message-button p { font-family: Ubuntu,Arial,sans-serif; color: #fff; font-weight: 700; font-size: 10px; line-height: 11px; margin: 0 }
    .arcontactus-widget .arcontactus-message-button .pulsation { width: 84px; height: 84px; background-color: red; border-radius: 50px; position: absolute; left: -7px; top: -7px; z-index: -1; -webkit-transform: scale(0); -ms-transform: scale(0); transform: scale(0); -webkit-animation: arcontactus-pulse 2s infinite; animation: arcontactus-pulse 2s infinite }
    .arcontactus-widget .arcontactus-message-button .icons { background-color: #fff; width: 44px; height: 44px; border-radius: 50px; position: absolute; overflow: hidden; top: 50%; left: 50%; margin-top: -22px; margin-left: -22px }
    .arcontactus-widget .arcontactus-message-button .static { position: absolute; top: 50%; left: 50%; margin-top: -19px; margin-left: -26px; width: 52px; height: 52px; text-align: center }
    .arcontactus-widget .arcontactus-message-button .static img { display: inline }
    .arcontactus-widget .arcontactus-message-button .static svg { width: 24px; height: 24px; color: #FFF }
    .arcontactus-widget .arcontactus-message-button.no-text .static { margin-top: -12px }
    .arcontactus-widget .pulsation:nth-of-type(2n) { -webkit-animation-delay: .5s; animation-delay: .5s }
    .arcontactus-widget .pulsation.stop { -webkit-animation: none; animation: none }
    .arcontactus-widget .icons-line { top: 10px; left: 12px; display: -webkit-box; display: -ms-flexbox; display: flex; position: absolute; -webkit-transition: cubic-bezier(.13,1.49,.14,-.4); -o-transition: cubic-bezier(.13,1.49,.14,-.4); -webkit-animation-delay: 0s; animation-delay: 0s; -webkit-transform: translateX(30px); -ms-transform: translateX(30px); transform: translateX(30px); height: 24px; transition: .2s all }
    .arcontactus-widget .icons, .arcontactus-widget .static { transition: .2s all }
    .arcontactus-widget .icons-line.stop { -webkit-animation-play-state: paused; animation-play-state: paused }
    .arcontactus-widget .icons-line span { display: inline-block; width: 24px; height: 24px; color: red }
    .arcontactus-widget .icons-line span i, .arcontactus-widget .icons-line span svg { width: 24px; height: 24px }
    .arcontactus-widget .icons-line span i { display: block; font-size: 24px; line-height: 24px }
    .arcontactus-widget .icons-line img, .arcontactus-widget .icons-line span { margin-right: 40px }
    .arcontactus-widget .icons.hide .icons-line { transform: scale(0) }
    .arcontactus-widget .icons .icon:first-of-type { margin-left: 0 }
    .arcontactus-widget .arcontactus-close { color: #FFF }
    .arcontactus-widget .arcontactus-close svg { -webkit-transform: rotate(180deg) scale(0); -ms-transform: rotate(180deg) scale(0); transform: rotate(180deg) scale(0); -webkit-transition: ease-in .12s all; -o-transition: ease-in .12s all; transition: ease-in .12s all; display: block }
    .arcontactus-widget .arcontactus-close.show-messageners-block svg { -webkit-transform: rotate(0) scale(1); -ms-transform: rotate(0) scale(1); transform: rotate(0) scale(1) }
    .arcontactus-widget .arcontactus-prompt, .arcontactus-widget .messangers-block { background: center no-repeat #FFF; box-shadow: 0 0 10px rgba(0,0,0,.6); width: 235px; position: absolute; bottom: 80px; right: 0; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -webkit-box-align: start; -ms-flex-align: start; align-items: flex-start; padding: 14px 0; -webkit-box-sizing: border-box; box-sizing: border-box; border-radius: 7px; -webkit-transform-origin: 80% 105%; -ms-transform-origin: 80% 105%; transform-origin: 80% 105%; -webkit-transform: scale(0); -ms-transform: scale(0); transform: scale(0); -webkit-transition: ease-out .12s all; -o-transition: ease-out .12s all; transition: ease-out .12s all; z-index: 10000 }
    .arcontactus-widget .arcontactus-prompt:before, .arcontactus-widget .messangers-block:before { position: absolute; bottom: -7px; right: 25px; left: auto; display: inline-block !important; border-right: 8px solid transparent; border-top: 8px solid #FFF; border-left: 8px solid transparent; content: '' }
    .arcontactus-widget .arcontactus-prompt.show-messageners-block, .arcontactus-widget .messangers-block.show-messageners-block { -webkit-transform: scale(1); -ms-transform: scale(1); transform: scale(1) }
    .arcontactus-widget .arcontactus-prompt { color: #787878; font-family: Arial,sans-serif; font-size: 16px; line-height: 18px; width: auto; bottom: 10px; right: 80px; white-space: nowrap; padding: 18px 20px 14px }
    .arcontactus-widget .arcontactus-prompt:before { border-right: 8px solid transparent; border-top: 8px solid transparent; border-left: 8px solid #FFF; border-bottom: 8px solid transparent; bottom: 16px; right: -15px }
    .arcontactus-widget .arcontactus-prompt.active { -webkit-transform: scale(1); -ms-transform: scale(1); transform: scale(1) }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-close { position: absolute; right: 6px; top: 6px; cursor: pointer; z-index: 100; height: 14px; width: 14px; padding: 2px }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-close svg { height: 10px; width: 10px; display: block }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-typing { border-radius: 10px; display: inline-block; left: 3px; padding: 0; position: relative; top: 4px; width: 50px }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-typing > div { position: relative; float: left; border-radius: 50%; width: 10px; height: 10px; background: #ccc; margin: 0 2px; -webkit-animation: arcontactus-updown 2s infinite; animation: arcontactus-updown 2s infinite }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-typing > div:nth-child(2) { animation-delay: .1s }
    .arcontactus-widget .arcontactus-prompt .arcontactus-prompt-typing > div:nth-child(3) { animation-delay: .2s }
    .arcontactus-widget .messangers-block.sm .messanger { padding-left: 50px; min-height: 44px }
    .arcontactus-widget .messangers-block.sm .messanger span { height: 32px; width: 32px; margin-top: -16px }
    .arcontactus-widget .messangers-block.sm .messanger span svg { height: 20px; width: 20px; margin-top: -10px; margin-left: -10px }
    .arcontactus-widget .messanger { display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -webkit-box-align: center; -ms-flex-align: center; align-items: center; margin: 0; cursor: pointer; width: 100%; padding: 8px 20px 8px 60px; position: relative; min-height: 54px; text-decoration: none }
    .arcontactus-widget .messanger:hover { background-color: #EEE }
    .arcontactus-widget .messanger:before { background-repeat: no-repeat; background-position: center }
    .arcontactus-widget .messanger.facebook span { background: #0084ff }
    .arcontactus-widget .messanger.viber span { background: #7c529d }
    .arcontactus-widget .messanger.telegram span { background: #2ca5e0 }
    .arcontactus-widget .messanger.skype span { background: #31c4ed }
    .arcontactus-widget .messanger.email span { background: #ff8400 }
    .arcontactus-widget .messanger.contact span { background: #7eb105 }
    .arcontactus-widget .messanger.call-back span { background: #54cd81 }
    .arcontactus-widget .messanger span { position: absolute; left: 10px; top: 50%; margin-top: -20px; display: block; width: 40px; height: 40px; border-radius: 50%; background-color: #0084ff; margin-right: 10px; color: #FFF; text-align: center; vertical-align: middle }
    .arcontactus-widget .messanger span i, .arcontactus-widget .messanger span svg { width: 24px; height: 24px; vertical-align: middle; text-align: center; display: block; position: absolute; top: 50%; left: 50%; margin-top: -12px; margin-left: -12px }
    .arcontactus-widget .messanger span i { font-size: 24px; line-height: 24px }
    .arcontactus-widget .messanger p { margin: 0; font-family: Arial,sans-serif; font-size: 14px; color: rgba(0,0,0,.87) }

    @-webkit-keyframes arcontactus-pulse {
        0% { -webkit-transform: scale(0); transform: scale(0); opacity: 1 }
        50% { opacity: .5 }
        100% { -webkit-transform: scale(1); transform: scale(1); opacity: 0 }
    }

    @media (max-width:468px) {
        .arcontactus-widget.opened.arcontactus-message, .arcontactus-widget.opened.left.arcontactus-message { width: auto; right: 20px; left: 20px }
    }

    @keyframes arcontactus-updown {
        0%,100%,43% { transform: translate(0,0) }
        25%,35% { transform: translate(0,-10px) }
    }

    @-webkit-keyframes arcontactus-updown {
        0%,100%,43% { transform: translate(0 0) }
        25%,35% { transform: translate(-10px 0) }
    }

    @keyframes arcontactus-pulse {
        0% { -webkit-transform: scale(0); transform: scale(0); opacity: 1 }
        50% { opacity: .5 }
        100% { -webkit-transform: scale(1); transform: scale(1); opacity: 0 }
    }

    @-webkit-keyframes arcontactus-show-stat {
        0%,100%,20%,85% { -webkit-transform: scale(1); transform: scale(1) }
        21%,84% { -webkit-transform: scale(0); transform: scale(0) }
    }

    @keyframes arcontactus-show-stat {
        0%,100%,20%,85% { -webkit-transform: scale(1); transform: scale(1) }
        21%,84% { -webkit-transform: scale(0); transform: scale(0) }
    }

    @-webkit-keyframes arcontactus-show-icons {
        0%,100%,20%,85% { -webkit-transform: scale(0); transform: scale(0) }
        21%,84% { -webkit-transform: scale(1); transform: scale(1) }
    }

    @keyframes arcontactus-show-icons {
        0%,100%,20%,85% { -webkit-transform: scale(0); transform: scale(0) }
        21%,84% { -webkit-transform: scale(1); transform: scale(1) }
    }
</style>
<script>
    function arCuGetCookie(t) { return document.cookie.length > 0 && (c_start = document.cookie.indexOf(t + "="), -1 != c_start) ? (c_start = c_start + t.length + 1, c_end = document.cookie.indexOf(";", c_start), -1 == c_end && (c_end = document.cookie.length), unescape(document.cookie.substring(c_start, c_end))) : 0 } function arCuCreateCookie(t, e, s) { var n; if (s) { var i = new Date; i.setTime(i.getTime() + 24 * s * 60 * 60 * 1e3), n = "; expires=" + i.toGMTString() } else n = ""; document.cookie = t + "=" + e + n + "; path=/" } function arCuShowMessage(t) { if (arCuPromptClosed) return !1; void 0 !== arCuMessages[t] ? (jQuery("#arcontactus").contactUs("showPromptTyping"), _arCuTimeOut = setTimeout(function () { if (arCuPromptClosed) return !1; jQuery("#arcontactus").contactUs("showPrompt", { content: arCuMessages[t] }), t++ , _arCuTimeOut = setTimeout(function () { if (arCuPromptClosed) return !1; arCuShowMessage(t) }, arCuMessageTime) }, arCuTypingTime)) : (arCuCloseLastMessage && jQuery("#arcontactus").contactUs("hidePrompt"), arCuLoop && arCuShowMessage(0)) } function arCuShowMessages() { setTimeout(function () { clearTimeout(_arCuTimeOut), arCuShowMessage(0) }, arCuDelayFirst) } !function (t) { function e(s, n) { this._initialized = !1, this.settings = null, this.options = t.extend({}, e.Defaults, n), this.$element = t(s), this.init(), this.x = 0, this.y = 0, this._interval, this._menuOpened = !1, this._callbackOpened = !1, this.countdown = null } e.Defaults = { align: "right", countdown: 0, drag: !1, buttonText: btnContactText, buttonSize: "large", menuSize: "normal", items: [], iconsAnimationSpeed: 1200, theme: "#18A850", buttonIcon: '<svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Canvas" transform="translate(-825 -308)"><g id="Vector"><use xlink:href="#path0_fill0123" transform="translate(825 308)" fill="#FFFFFF"/></g></g><defs><path id="path0_fill0123" d="M 19 4L 17 4L 17 13L 4 13L 4 15C 4 15.55 4.45 16 5 16L 16 16L 20 20L 20 5C 20 4.45 19.55 4 19 4ZM 15 10L 15 1C 15 0.45 14.55 0 14 0L 1 0C 0.45 0 0 0.45 0 1L 0 15L 4 11L 14 11C 14.55 11 15 10.55 15 10Z"/></defs></svg>', closeIcon: '<svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Canvas" transform="translate(-4087 108)"><g id="Vector"><use xlink:href="#path0_fill" transform="translate(4087 -108)" fill="currentColor"></use></g></g><defs><path id="path0_fill" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path></defs></svg>' }, e.prototype.init = function () { this.destroy(), this.settings = t.extend({}, this.options), this.$element.addClass("arcontactus-widget").addClass("arcontactus-message"), "left" === this.settings.align ? this.$element.addClass("left") : this.$element.addClass("right"), this.settings.items.length ? (this._initCallbackBlock(), this._initMessengersBlock(), this._initMessageButton(), this._initPrompt(), this._initEvents(), this.startAnimation(), this.$element.addClass("active")) : console.info("jquery.contactus:no items"), this._initialized = !0, this.$element.trigger("arcontactus.init") }, e.prototype.destroy = function () { if (!this._initialized) return !1; this.$element.html(""), this._initialized = !1, this.$element.trigger("arcontactus.destroy") }, e.prototype._initCallbackBlock = function () { }, e.prototype._initMessengersBlock = function () { var e = t("<div>", { class: "messangers-block" }); "normal" !== this.settings.menuSize && "large" !== this.settings.menuSize || e.addClass("lg"), "small" === this.settings.menuSize && e.addClass("sm"), this._appendMessengerIcons(e), this.$element.append(e) }, e.prototype._appendMessengerIcons = function (e) { t.each(this.settings.items, function (s) { if ("callback" == this.href) var n = t("<div>", { class: "messanger call-back " + (this.class ? this.class : "") }); else if (n = t("<a>", { class: "messanger " + (this.class ? this.class : ""), id: this.id ? this.id : null, href: this.href, target: this.target ? this.target : "_blank" }), this.onClick) { var i = this; n.on("click", function (t) { i.onClick(t) }) } var a = t("<span>", { style: this.color ? "background-color:" + this.color : null }); a.append(this.icon), n.append(a), n.append("<p>" + this.title + "</p>"), e.append(n) }) }, e.prototype._initMessageButton = function () { var e = this, s = t("<div>", { class: "arcontactus-message-button", style: this._backgroundStyle() }); "large" === this.settings.buttonSize && this.$element.addClass("lg"), "medium" === this.settings.buttonSize && this.$element.addClass("md"), "small" === this.settings.buttonSize && this.$element.addClass("sm"); var n = t("<div>", { class: "static" }); n.append(this.settings.buttonIcon), !1 !== this.settings.buttonText ? n.append("<p>" + this.settings.buttonText + "</p>") : s.addClass("no-text"); var i = t("<div>", { class: "callback-state", style: e._colorStyle() }); i.append(this.settings.callbackStateIcon); var a = t("<div>", { class: "icons hide" }), o = t("<div>", { class: "icons-line" }); t.each(this.settings.items, function (s) { var n = t("<span>", { style: e._colorStyle() }); n.append(this.icon), o.append(n) }), a.append(o); var r = t("<div>", { class: "arcontactus-close" }); r.append(this.settings.closeIcon); var c = t("<div>", { class: "pulsation", style: e._backgroundStyle() }), l = t("<div>", { class: "pulsation", style: e._backgroundStyle() }); s.append(n).append(i).append(a).append(r).append(c).append(l), this.$element.append(s) }, e.prototype._initPrompt = function () { var e = t("<div>", { class: "arcontactus-prompt" }), s = t("<div>", { class: "arcontactus-prompt-close", style: this._colorStyle() }); s.append(this.settings.closeIcon); var n = t("<div>", { class: "arcontactus-prompt-inner" }); e.append(s).append(n), this.$element.append(e) }, e.prototype._initEvents = function () { var e = this.$element, s = this; e.find(".arcontactus-message-button").on("mousedown", function (t) { s.x = t.pageX, s.y = t.pageY }).on("mouseup", function (t) { t.pageX === s.x && t.pageY === s.y && (s.toggleMenu(), t.preventDefault()) }), this.settings.drag && (e.draggable(), e.get(0).addEventListener("touchmove", function (t) { var s = t.targetTouches[0]; e.get(0).style.left = s.pageX - 25 + "px", e.get(0).style.top = s.pageY - 25 + "px", t.preventDefault() }, !1)), t(document).on("click", function (t) { s.closeMenu() }), e.on("click", function (t) { t.stopPropagation() }), e.find(".call-back").on("click", function () { s.openCallbackPopup() }), e.find(".callback-countdown-block-close").on("click", function () { null != s.countdown && (clearInterval(s.countdown), s.countdown = null), s.closeCallbackPopup() }), e.find(".arcontactus-prompt-close").on("click", function () { s.hidePrompt() }) }, e.prototype.show = function () { this.$element.addClass("active"), this.$element.trigger("arcontactus.show") }, e.prototype.hide = function () { this.$element.removeClass("active"), this.$element.trigger("arcontactus.hide") }, e.prototype.openMenu = function () { var t = this.$element; t.find(".messangers-block").hasClass("show-messageners-block") || (this.stopAnimation(), t.find(".messangers-block, .arcontactus-close").addClass("show-messageners-block"), t.find(".icons, .static").addClass("hide"), t.find(".pulsation").addClass("stop"), this._menuOpened = !0, this.$element.trigger("arcontactus.openMenu")) }, e.prototype.closeMenu = function () { var t = this.$element; t.find(".messangers-block").hasClass("show-messageners-block") && (t.find(".messangers-block, .arcontactus-close").removeClass("show-messageners-block"), t.find(".icons, .static").removeClass("hide"), t.find(".pulsation").removeClass("stop"), this.startAnimation(), this._menuOpened = !1, this.$element.trigger("arcontactus.closeMenu")) }, e.prototype.toggleMenu = function () { var t = this.$element; if (this.hidePrompt(), t.find(".callback-countdown-block").hasClass("display-flex")) return !1; t.find(".messangers-block").hasClass("show-messageners-block") ? this.closeMenu() : this.openMenu(), this.$element.trigger("arcontactus.toggleMenu") }, e.prototype.openCallbackPopup = function () { var t = this.$element; t.addClass("opened"), this.closeMenu(), this.stopAnimation(), t.find(".icons, .static").addClass("hide"), t.find(".pulsation").addClass("stop"), t.find(".callback-countdown-block").addClass("display-flex"), this._callbackOpened = !0, this.$element.trigger("arcontactus.openCallbackPopup") }, e.prototype.closeCallbackPopup = function () { var t = this.$element; t.removeClass("opened"), t.find(".messangers-block").removeClass("show-messageners-block"), t.find(".arcontactus-close").removeClass("show-messageners-block"), t.find(".icons, .static").removeClass("hide"), this.startAnimation(), this._callbackOpened = !1, this.$element.trigger("arcontactus.closeCallbackPopup") }, e.prototype.startAnimation = function () { var t = this.$element, e = t.find(".icons-line"), s = t.find(".static"), n = t.find(".icons-line>span:first-child").width() + 40; if ("large" === this.settings.buttonSize) var i = 2, a = 0; "medium" === this.settings.buttonSize && (i = 4, a = -2), "small" === this.settings.buttonSize && (i = 4, a = -2); var o = t.find(".icons-line>span").length, r = 0; if (this.stopAnimation(), 0 === this.settings.iconsAnimationSpeed) return !1; this._interval = setInterval(function () { 0 === r && (e.parent().removeClass("hide"), s.addClass("hide")); var t = "translate(" + -(n * r + i) + "px, " + a + "px)"; e.css({ "-webkit-transform": t, "-ms-transform": t, transform: t }), ++r > o && (r > o + 1 && (r = 0), e.parent().addClass("hide"), s.removeClass("hide"), t = "translate(" + -i + "px, " + a + "px)", e.css({ "-webkit-transform": t, "-ms-transform": t, transform: t })) }, this.settings.iconsAnimationSpeed) }, e.prototype.stopAnimation = function () { clearInterval(this._interval); var t = this.$element, e = t.find(".icons-line"), s = t.find(".static"); e.parent().addClass("hide"), s.removeClass("hide"); var n = "translate(-2px, 0px)"; e.css({ "-webkit-transform": n, "-ms-transform": n, transform: n }) }, e.prototype.showPrompt = function (t) { var e = this.$element.find(".arcontactus-prompt"); t && t.content && e.find(".arcontactus-prompt-inner").html(t.content), e.addClass("active"), this.$element.trigger("arcontactus.showPrompt") }, e.prototype.hidePrompt = function () { this.$element.find(".arcontactus-prompt").removeClass("active"), this.$element.trigger("arcontactus.hidePrompt") }, e.prototype.showPromptTyping = function () { this.$element.find(".arcontactus-prompt").find(".arcontactus-prompt-inner").html(""), this._insertPromptTyping(), this.showPrompt({}), this.$element.trigger("arcontactus.showPromptTyping") }, e.prototype._insertPromptTyping = function () { var e = this.$element.find(".arcontactus-prompt-inner"), s = t("<div>", { class: "arcontactus-prompt-typing" }), n = t("<div>"); s.append(n), s.append(n.clone()), s.append(n.clone()), e.append(s) }, e.prototype.hidePromptTyping = function () { this.$element.find(".arcontactus-prompt").removeClass("active"), this.$element.trigger("arcontactus.hidePromptTyping") }, e.prototype._backgroundStyle = function () { return "background-color: " + this.settings.theme }, e.prototype._colorStyle = function () { return "color: " + this.settings.theme }, t.fn.contactUs = function (s) { var n = Array.prototype.slice.call(arguments, 1); return this.each(function () { var i = t(this), a = i.data("ar.contactus"); a || (a = new e(this, "object" == typeof s && s), i.data("ar.contactus", a)), "string" == typeof s && "_" !== s.charAt(0) && a[s].apply(a, n) }) }, t.fn.contactUs.Constructor = e }(jQuery);
</script>
<style>
    .support-online{display:none!important;}
    .arcontactus-widget.right.arcontactus-message{bottom:80px!important;right:10px!important;}
    /*
    .arcontactus-message-button{background-color:#18A850!important;}
    .arcontactus-widget .icons-line span{color:#789a3d!important;}
    */
</style>
</body>
</html>
