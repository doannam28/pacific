const searchWrap = document.querySelector(".search-overlay");
const searchToggle = document.querySelector(".search-toggle");
document.addEventListener("DOMContentLoaded", () => {
    try {
        if ($(window).width() < 1200.1) {
            $("#fullpage").attr("id", "");
        }
        searchToggle.addEventListener("click", () => {
            searchWrap.classList.toggle("is-open");
        });
    } catch (error) {}
    mappingFunc();
    hideElement();
    setBackground();
    counterAnimate();
    generalFnc();
    fullPageInit();
    aosInit();
    swiperInit();
});
document.addEventListener("click", (event) => {
    if (!event.target.closest(".search-toggle, .search-overlay")) {
        searchWrap.classList.remove("is-open");
    }
});
window.addEventListener("load", AOS.refresh);
window.addEventListener("resize", function() {
    let width = this.window.innerWidth;
    if (width <= 1200.1) {
        mappingFunc();
        hideElement();
    }
    if ((width) => 1200.1) {
        aosInit();
    }
});
window.addEventListener("scroll", function() {
    const nav = document.querySelector(".sidenav-group");
    if (
        document.body.scrollTop > $(window).height() ||
        document.documentElement.scrollTop > $(window).height()
    ) {
        nav.classList.add("show");
    } else {
        nav.classList.remove("show");
    }
    if ($(window).width() > 1200.1) {
        if (
            document.body.scrollTop > 100 ||
            document.documentElement.scrollTop > 100
        ) {
            $("header").addClass("minimize");
        } else {
            $("header").removeClass("minimize");
        }
    }
});

Fancybox.bind("[data-fancybox]", {
    parentEl: document.body[0], // Element containing main structure
});

function aosInit() {
    AOS.init({
        // Global settings:

        disable: window.innerWidth < 1200,
        startEvent: "load", // name of the event dispatched on the document, that AOS should initialize on
        initClassName: "aos-init", // class applied after initialization
        animatedClassName: "aos-animate", // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 0, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 100, // the delay on throttle used while scrolling the page (advanced)
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 0, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 700, // values from 0 to 3000, with step 50ms
        easing: "ease-in-out-back", // default easing for AOS animations
        once: true,
        mirror: true, // whether elements should animate out while scrolling past them
        anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
    });
}

function fullPageInit() {
    try {
        var myFullpage = new fullpage("#fullpage", {
            licenseKey: "A3DA879C-B1254377-8A906973-AAE812EA",
            //Navigation
            bigSectionsDestination: null,
            menu: "#header,#menu-parallax",
            lockAnchors: false,
            fixedElements: "#header,#menu-parallax",
            anchors: [
                "page-section-1",
                "page-section-2",
                "page-section-3",
                "page-section-4",
                "page-section-5",
                "page-section-6",
                "page-section-7",
                "page-section-8",
                "page-section-9",
                "page-section-10",
                "page-section-11",
                "page-section-12",
            ],
            navigationTooltips: [
                "page-section-1",
                "page-section-2",
                "page-section-3",
                "page-section-4",
                "page-section-5",
                "page-section-6",
                "page-section-7",
                "page-section-8",
                "page-section-9",
                "page-section-10",
                "page-section-11",
                "page-section-12",
            ],

            slidesNavigation: true,
            slidesNavPosition: "bottom",
            showActiveTooltip: true,
            //Scrolling
            css3: true,
            offsetSections: true,
            scrollingSpeed: 700,
            autoScrolling: true,
            fitToSection: false,
            paddingTop: "150px",
            fitToSectionDelay: 600,
            scrollBar: false,
            easing: "easeInOutCubic",
            easingcss3: "ease",
            loopBottom: false,
            loopTop: false,
            loopHorizontal: true,
            continuousHorizontal: true,
            scrollHorizontally: true,
            continuousVertical: false,
            scrollOverflow: false,
            touchSensitivity: 15,
            normalScrollElementTouchThreshold: 5,
            //Accessibility
            keyboardScrolling: true,
            animateAnchor: true,
            recordHistory: true,
            //Design
            controlArrows: true,
            verticalCentered: true,
            resize: false,
            responsiveWidth: 0,
            responsiveHeight: 0,
            //Custom selectors
            sectionSelector: "section",
            dragAndMove: true,
            afterRender: function() {
                $("body").addClass("body-has-fp");
            },
            onLeave: function(origin, destination, direction) {
                $("section [data-aos]").removeClass("aos-animate");
                // Get the current section (the section that just became fully visible)
            },
            onSlideLeave: function() {
                $("section [data-aos]").removeClass("aos-animate");
            },
            afterSlideLoad: function() {
                $("section.active [data-aos]").addClass("aos-animate");
            },
            afterLoad: function(origin, destination, direction) {
                $("section.active [data-aos]").addClass("aos-animate");
            },
        });
    } catch (error) {}
}

function generalFnc() {
    //Toggle Javascript code
    const bodyWrap = document.querySelector("body");
    const menuToggle = document.querySelector(".site-menu-toggle");
    const hamburger = document.querySelector(".hamburger");
    const menuMobile = document.querySelector(".mobile-nav-wrap");
    const backTop = document.querySelector(".back-to-top");

    // Menu function

    menuToggle.addEventListener("click", () => {
        menuMobile.classList.toggle("is-open");
        hamburger.classList.toggle("is-active");
        bodyWrap.classList.toggle("overlay-bg");
    });

    if ($(window).width() < 1200.1) {
        $(".drop-down .title em").on("click", function() {
            if ($(this).parents(".drop-down").hasClass("is-open")) {
                $(".drop-down .nav-sub").slideUp();
                $(".drop-down").removeClass("is-open");
            } else {
                $(".drop-down .nav-sub").slideUp();
                $(".drop-down").removeClass("is-open");
                $(this).parent().next().slideDown();
                $(this).parents(".drop-down").addClass("is-open");
            }
        });
    }

    //Side Nav  and back to top
    backTop.addEventListener("click", (event) => {
        event.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, "300");
    });

    //Tab function
    $(".tab-nav li a").on("click", function() {
        $(this).parents(".tab-nav").find("li").removeClass("active");
        $(this).parents("li").addClass("active");

        var display = $(this).attr("data-type");
        $(this).parents("section").find(".tab-item").removeClass("active");
        $("#" + display).addClass("active");
    });
}

function swiperInit() {
    var primarySwiper = new Swiper(".primary-banner .swiper", {
        loop: false,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // Optional parameters
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        preventInteractionOnTransition: true,
        speed: 1205,
        lazy: {
            loadPrevNext: true,
        },
        navigation: {
            nextEl: ".primary-banner .next",
            prevEl: ".primary-banner .prev",
        },

        pagination: {
            el: ".primary-banner .swiper-pagination",
            type: "bullets",
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 3,
        },
    });
    var galleryThumbArray = [];
    var galleryMainArray = [];

    let swiperThumbInstance = $(".gallery-thumb .swiper");
    for (let index = 0; index < swiperThumbInstance.length; index++) {
        let $this = $(swiperThumbInstance[index]);
        $this.addClass("thumb-instance-" + index);
        $this
            .parent()
            .find(".nav-prev")
            .addClass("thumb-prev-" + index);
        $this
            .parent()
            .find(".nav-next")
            .addClass("thumb-next-" + index);
        $this
            .parent()
            .find(".swiper-pagination")
            .addClass("pagination-thumb-" + index);
        var galleryThumb = new Swiper(".thumb-instance-" + index, {
            speed: 1205,
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },
            speed: 750,
            observer: true,
            spaceBetween: 4,
            observeParents: true,
            slideToClickedSlide: true,
            slidesPerView: 3,
            navigation: {
                nextEl: ".thumb-next-" + index,
                prevEl: ".thumb-prev-" + index,
            },
            pagination: {
                el: ".pagination-thumb-" + index,
                type: "bullets",
                clickable: true,
            },
        });
        galleryThumbArray.push(galleryThumb);
    }

    let swiperMainInstances = $(".gallery-main  .swiper");
    for (let index = 0; index < swiperMainInstances.length; index++) {
        let $this = $(swiperMainInstances[index]);
        $this.addClass("main-instance-" + index);
        $this
            .parent()
            .find(".nav-prev")
            .addClass("main-prev-" + index);
        $this
            .parent()
            .find(".nav-next")
            .addClass("main-next-" + index);
        $this
            .parent()
            .find(".swiper-pagination")
            .addClass("pagination-main-" + index);
        var galleryMain = new Swiper(".main-instance-" + index, {
            speed: 1205,
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },
            speed: 750,
            observer: true,
            spaceBetween: 30,
            observeParents: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".main-next-" + index,
                prevEl: ".main-prev-" + index,
            },
            pagination: {
                el: ".pagination-main-" + index,
                type: "bullets",
                clickable: true,
            },
        });
        galleryMainArray.push(galleryMain);
    }

    for (var index = 0; index < galleryThumbArray.length; index++) {
        var thumbSwiper = galleryThumbArray[index];
        var mainSwiper = galleryMainArray[index];
        thumbSwiper.controller.control = mainSwiper;
        mainSwiper.controller.control = thumbSwiper;
    }

    $(".swiper-grid-member .swiper").each(function(index, element) {
        var $this = $(this);
        $this.addClass("grid-inst-" + index);
        $this
            .parent()
            .find(".prev")
            .addClass("prev-grid-" + index);
        $this
            .parent()
            .find(".next")
            .addClass("next-grid-" + index);

        var swiper = new Swiper(".grid-inst-" + index, {
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },
            observer: true,
            spaceBetween: 30,
            observeParents: true,
            breakpoints: {
                200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                460: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                    grid: {
                        rows: 2,
                        fill: "row",
                    },
                },
                1600: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    grid: {
                        rows: 2,
                        fill: "row",
                    },
                },
            },
            navigation: {
                nextEl: ".next-grid-" + index,
                prevEl: ".prev-grid-" + index,
            },
        });
    });

    var swiperGrid = new Swiper(".sector-detail-gallery .swiper", {
        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
        },
        lazy: {
            loadPrevNext: true,
        },
        observer: true,
        spaceBetween: 30,
        observeParents: true,

        breakpoints: {
            200: {
                slidesPerView: 1,
            },
            460: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: "row",
                },
            },
        },

        navigation: {
            nextEl: ".sector-detail-gallery .next",
            prevEl: ".sector-detail-gallery .prev",
        },
        pagination: {
            el: ".sector-detail-gallery .swiper-pagination",
            clickable: true,
        },
    });

    var swiperGrid = new Swiper(".grid-swiper .swiper", {
        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
        },
        lazy: {
            loadPrevNext: true,
        },
        observer: true,
        spaceBetween: 30,
        observeParents: true,

        breakpoints: {
            200: {
                slidesPerView: 1,
            },
            460: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: "row",
                },
            },
        },

        navigation: {
            nextEl: ".grid-swiper .next",
            prevEl: ".grid-swiper .prev",
        },
        pagination: {
            el: ".grid-swiper .swiper-pagination",
            clickable: true,
        },
    });

    var memberSwiper = new Swiper(".member-swiper .swiper", {
        loop: false,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        // Optional parameters
        observer: true,
        spaceBetween: 30,
        observeParents: true,
        breakpoints: {
            200: {
                slidesPerView: 1,
            },
            360: {
                slidesPerView: 2,
            },
            560: {
                slidesPerView: 3,
            },
            769: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
            1200: {
                slidesPerView: 6,
            },
        },
        observer: true,
        observeParents: true,
        preventInteractionOnTransition: true,
        speed: 1205,
        lazy: {
            loadPrevNext: true,
        },
        navigation: {
            nextEl: ".member-swiper .next",
            prevEl: ".member-swiper .prev",
        },
        pagination: {
            el: ".member-swiper  .swiper-pagination",
            type: "bullets",
            clickable: true,
        },
    });

    $(".single-swiper .swiper").each(function(index, element) {
        var $this = $(this);
        $this.addClass("single-instance-" + index);
        $this
            .parent()
            .find(".prev")
            .addClass("btn-prev-single-" + index);
        $this
            .parent()
            .find(".next")
            .addClass("btn-next-single-" + index);
        $this
            .parent()
            .find(".swiper-pagination")
            .addClass("pagination-instance-" + index);

        var swiper = new Swiper(".single-instance-" + index, {
            loop: true,
            speed: 1205,
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },
            speed: 750,
            observer: true,
            spaceBetween: 30,
            observeParents: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".btn-next-single-" + index,
                prevEl: ".btn-prev-single-" + index,
            },
            pagination: {
                el: ".pagination-instance-" + index,
                type: "bullets",
                clickable: true,
            },
        });
    });
    $(".trinity-swiper .swiper").each(function(index, element) {
        var $this = $(this);
        $this.addClass("tri-instance-" + index);
        $this
            .parent()
            .find(".prev")
            .addClass("btn-prev-tri-" + index);
        $this
            .parent()
            .find(".next")
            .addClass("btn-next-tri-" + index);

        var swiper = new Swiper(".tri-instance-" + index, {
            speed: 1205,
            loop: true,
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },

            speed: 750,
            observer: true,
            spaceBetween: 30,
            observeParents: true,
            breakpoints: {
                200: {
                    slidesPerView: 1,
                },
                576: {
                    slidesPerView: 2,
                },
                769: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 3,
                },
            },
            navigation: {
                nextEl: ".btn-next-tri-" + index,
                prevEl: ".btn-prev-tri-" + index,
            },
        });
    });

    $(".four-swiper .swiper").each(function(index, element) {
        var $this = $(this);
        $this.addClass("instance-four" + index);
        $this
            .parent()
            .find(".prev")
            .addClass("btn-prev-" + index);
        $this
            .parent()
            .find(".next")
            .addClass("btn-next-" + index);

        var swiper = new Swiper(".instance-four" + index, {
            speed: 1205,
            loop: true,
            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },
            lazy: {
                loadPrevNext: true,
            },
            speed: 750,
            observer: true,
            spaceBetween: 30,
            observeParents: true,
            breakpoints: {
                200: {
                    slidesPerView: 1,
                },
                420: {
                    slidesPerView: 2,
                },
                769: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                },
            },
            navigation: {
                nextEl: ".btn-next-" + index,
                prevEl: ".btn-prev-" + index,
            },
        });
    });
}

// Side
function setBackground() {
    const elements = document.querySelectorAll("[setBackground]");
    elements.forEach((element) => {
        element.style.cssText = `
		background-image: url(${element.getAttribute("setBackground")});
		background-size: cover;
		background-position: center;
	  `;
    });
}

function counterAnimate() {
    const counterItem = document.querySelectorAll(".counter");
    if (counterItem.length) {
        const counterUp = window.counterUp.default;
        const callback = (entries) => {
            entries.forEach((entry) => {
                const el = entry.target;
                if (
                    entry.isIntersecting &&
                    !el.classList.contains("is-visible")
                ) {
                    counterUp(el, {
                        duration: 2000,
                        delay: 200,
                    });
                    el.classList.add("is-visible");
                }
            });
        };
        const IO = new IntersectionObserver(callback, {
            threshold: 1
        });
        counterItem.forEach((counter) => {
            IO.observe(counter);
        });
    }
}

function mappingFunc() {
    new MappingListener({
        selector: ".header-nav-left",
        mobileWrapper: ".mobile-nav-wrap",
        mobileMethod: "appendTo",
        desktopWrapper: ".header-top-left",
        desktopMethod: "insertAfter",
        breakpoint: 1200.1,
    }).watch();
    new MappingListener({
        selector: ".header-contact-group",
        mobileWrapper: "main",
        mobileMethod: "appendTo",
        desktopWrapper: ".site-menu-toggle",
        desktopMethod: "insertBefore",
        breakpoint: 1200.1,
    }).watch();
    new MappingListener({
        selector: ".header-nav-right",
        mobileWrapper: ".mobile-nav-wrap",
        mobileMethod: "appendTo",
        desktopWrapper: ".site-menu-toggle",
        desktopMethod: "insertBefore",
        breakpoint: 1200.1,
    }).watch();
    new MappingListener({
        selector: ".search-wrap",
        mobileWrapper: ".site-menu-toggle",
        mobileMethod: "insertBefore",
        desktopWrapper: ".language-wrap",
        desktopMethod: "insertAfter",
        breakpoint: 1200.1,
    }).watch();
}

function hideElement() {
    if ($(window).width() < 1200.1) {
        const [menu_left, menu_right, header_contact] = [
            ".header-nav-left",
            ".header-nav-right",
            ".header-contact-group",
        ].map((selector) => document.querySelector(selector));

        [menu_left, menu_right, header_contact].forEach(
            (el) => (el.style.display = "flex")
        );
    }
}