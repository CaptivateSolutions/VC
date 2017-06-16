AppName.Modules.ThemeModule = (function () {
    //Dependencies
    var core = AppName.Core;

    //////////////////////
    // Private Methods //
    ////////////////////
    var _fullBannerScroll = function () {
        $(window).on('resize load', function(){
            if ($('main').hasClass('home')) {
                var windowHeight = $(window).height();
                $('.home .full-banner').css('height', windowHeight);
                $('.goToLink').click(function (event) {
                    $('html, body').animate({
                        scrollTop: $($.attr(this, 'href')).offset().top
                    }, 500);
                    event.preventDefault();
                });

                var curWinWidth = $(window).width();
                if ( (curWinWidth+17) > 767) {
                    $('.bookNowLink').click(function (event) {
                        $('html, body').animate({
                            scrollTop: $($.attr(this, 'href')).offset().top - $('.custom-navbar').height() - 30
                        }, 500);
                        $('body').removeAttr('style');
                        event.preventDefault();
                    });
                } else {
                    $('.bttn-home-Up').click(function () {
                        $('#booking-now').show();
                        $('#booking-now').addClass('showFilter');
                        $('body').css('overflow', 'hidden');
                    });
                    $('.bookNowLink').click(function () {
                        $('#booking-now').show();
                        $('#booking-now').addClass('showFilter');
                        $('body').css('overflow', 'hidden');
                    });
                    $('.close-booking').click(function () {
                        $('#booking-now').removeClass('showFilter');
                        $('body').removeAttr('style');
                    });
                }
            }
        });
    };

    var _toggleNav = function () {
        
        $('.navbar-toggle').click(function () {
            $(this).toggleClass('menu-on');
            if ($(this).hasClass('menu-on')) {
                $('.custom-navbar').addClass('changeBg');
            }
            else {
                $('.custom-navbar').removeClass('changeBg');
            }
        });

        var toggleNavWidth = $(window).width();
        if ( (toggleNavWidth+17) > 767) {
            if ($(window.location.hash).length > 0) {
                $('html,body').animate({
                    scrollTop: $(window.location.hash).offset().top - $('.custom-navbar').height()
                });
            }
        }
        if ((toggleNavWidth+17) < 768) {
            $(window).load(function () {
                if ($(window.location.hash).length > 0) {
                    $('#booking-now').show();
                    $('.bttn-home-Up').trigger('click');
                }
            });
        }
    };

    var _datePicker = function () {
        $(document).ready(function () {
            $('#datepicker, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6').datetimepicker({
                format: 'LL',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                minDate: moment()
            });
            $('#timepicker, #timepicker2, #timepicker3, #timepicker4').datetimepicker({
                format: 'LT',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
            });

        });
    };

    var _bookingStep = function () {
        $(document).ready(function () {
			$('.nav-tabs a[href="' + window.location.hash + '"]').tab('show').parent().removeClass('not-active');
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('not-active')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {
                var $active = $('.nav-book-steps .nav-tabs li.active, .nav-payment-steps .nav-tabs li.active ');
                $active.next().removeClass('not-active');
                nextTab($active);
            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
    };

    var _historyBack = function () {
        $(document).ready(function () {
            $('a.goBackLink').click(function () {
                parent.history.back();
                return false;
            });
        });
    };

    var _instaFeeds = function () {
        var feed = new Instafeed({
            get: 'user',
            // userId: '3899437469',
            // accessToken: '3899437469.ec52627.b76ed1d5e4834bca889ec5c1ea2e1389',
            userId: '187545495',
            accessToken: '187545495.5d9f2bd.37fcc9720147480498e3d81468eab24c',
            template: '<div class="item"><a href="{{link}}" target="_blank"><img src="{{image}}" /><span></span></a></div>',
            target: 'instagram-carousel',
            limit: 10,
            resolution: 'standard_resolution' ,
            after: function () {
                $('#instagram-carousel').owlCarousel({
                    autoPlay: 3000,
                    pagination: false,
                    nav: false,
                    items: 6,
                    itemsDesktop: [1200, 6],
                    itemsDesktopSmall: [1199, 4],
                    itemsTablet: [991, 3],
                    itemsTabletSmall: [767,2],
                    itemsMobile: [479, 2]
                });
            }
        });
        feed.run();
    };

    var _ieObjectFit = function () {
        $(document).ready(function () {
            if (window.navigator.userAgent.indexOf("MSIE ") > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                $('#hero-carousel .item').each(function () {
                    var $container = $(this),
                        imgUrl = $container.find('img').prop('src');
                    if (imgUrl) {
                        $container
                            .css('backgroundImage', 'url(' + imgUrl + ')')
                            .addClass('compat-object-fit');
                    }
                });
            }
        });   
    };

    var _masonryGrid = function () {
        $(window).load(function () {
            if ($('main').hasClass('menu-page')) {
                function imgHeight() {
                    var imgWidth = $('.grid-item .img-holder').width();
                    $('.img-holder').css('height', imgWidth);
                };

                $(document).ready(function () {
                    imgHeight();
                });

                $('.grid').masonry({
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-item',
                    gutter: 20
                });
                $('body').delay(500).queue(function () {
                    $('.instruct_holder').addClass('showCallout');
                    $('.close-callout-instruct').click(function () {
                        $('.instruct_holder').removeClass('showCallout');
                    });
                    $(this).dequeue();
                });
            }
        });
    };

    var _quantityCount = function () {
        if ($('main').hasClass('menu-page-order')) {
            var newVal;
            $(document).on("click", '.minus-holder', function (e) {
                e.stopPropagation();
                var oldValue = $(this).siblings('input').val();
                if (oldValue > 0) {
                    newVal = parseInt(oldValue) - 1;
                    oldValue = newVal;
                    $(this).siblings('input').val(newVal);
                    $(this).siblings('.item-count-holder').find('.item-count').find('.count').text(newVal);
                    if (newVal == 0) {
                        $(this).parent('.grid-item').removeClass('showCount');
                    }
                }
            });
            $(document).on("click", '.plus-order', function (e) {
                e.stopPropagation();
                $(this).parent().parent('.grid-item').addClass('showCount');
                var oldValue = $(this).parent().siblings('input').val();
                if (oldValue >= 0) {
                    newVal = parseInt(oldValue) + 1;
                    oldValue = newVal;
                    $(this).parent().siblings('input').val(newVal);
                    $(this).parent().siblings('.item-count-holder').find('.item-count').find('.count').text(newVal);
                }
            });
        }
    };

    var _scrollUp = function () {
        $('#showFormMenu').hide();
        var bannerPageWidth = $(window).width();
        if ($('main').hasClass('home')) {
            $(window).scroll(function () {
                var scroll = $(this).scrollTop();
                var nav = $('#thisLink').offset().top
                if (scroll >= nav) {
                    $('.custom-navbar').addClass('fixed-top');
                }
                else {
                    $('.custom-navbar').removeClass('fixed-top');
                }
            });
        }
        if ($('main').hasClass('home') && ( (bannerPageWidth+17) < 768)) {
            $('#booking-now').hide();
            $(window).scroll(function () {
                var scroll = $(this).scrollTop();
                if (scroll > 59 ) {

                    $('#showFormMenu').show();
                    $('#showFormMenu').click(function(){
                        $('#booking-now').show();
                        $('#booking-now').addClass('showFilter');
                        $('#showFormMenu').hide();
                    });

                }
                else {
                    $('bttn-home-Up').hide();
                    // $('#booking-now').hide();
                    $('#showFormMenu').hide();
                }  
            });
            
            $('.close-booking').click(function () {
                $('#booking-now').removeClass('showFilter');
                $('body').removeAttr('style');
                $('#showFormMenu').show();

                if ( ($(window).scrollTop()) == 0 ) {
                    $('#booking-now').hide();
                    $('#showFormMenu').hide();
                }
            });
        }
    };

    var _galleryPreview = function () {
        $(document).ready(function () {
            if ($('main').hasClass('gallery')) {
                $(document).on('click', '.itm_img_holder', function (e) {
                    $('body').addClass('unScroll');
                    var mainImg = $(this).find('img').attr("src"),
                        itemName = $(this).siblings('.desc').find('.itm-name').text(),
                        itemLoc = $(this).siblings('.desc').find('.itm-loc').text(),
                        itemGallery = $(this).siblings('.thumb_list').html(),
                        previewHolder = $('.itm_gal_preview');

                    previewHolder.find('.prev_itm_main_img img').attr('src', mainImg);
                    previewHolder.find('.prev_header .prev_itm_name').text(itemName);
                    previewHolder.find('.prev_header .prev_itm_loc').text(itemLoc);
                    previewHolder.find('.prev_footer .thumb_list').html(itemGallery);
                    $('.prev_footer .thumb_list').owlCarousel({
                        pagination: false,
                        nav: false,
                        items: 10,
                        itemsDesktop: [1200, 10],
                        itemsDesktopSmall: [1199, 6],
                        itemsTablet: [991, 6],
                        itemsTabletSmall: [767, 4],
                        itemsMobile: [479, 2]
                    });
                    previewHolder.addClass('showPreview');
                    $('.thumb_list .itm_thumb').click(function () {
                        var newImage = $(this).find('img').attr("src");
                        $('.prev_itm_main_img img').attr('src', newImage);
                    });
                    $('.close_itm_prev').click(function () {
                        $('.itm_gal_preview').removeClass('showPreview');
                        $('body').removeClass('unScroll');
                    });
                    $(".itm_gal_preview, .itm_prev_holder").click(function (e) {
                        if (e.target !== this)
                            return;
                        $('.itm_gal_preview').removeClass('showPreview');
                        $('body').removeClass('unScroll');
                    });
                    $(".prev_footer .thumb_list").data('owlCarousel').reinit();
                });
            }
        });
    };

    var _inputUpload = function () {
        $(document).ready(function () {
            $('.cvFile').change(function () {
                var filename = $(this).val();
                $(this).siblings($('.upload-text')).val(filename);
            });
        });
    };

    var _openFilter = function () {
        $(document).ready(function () {
            if ($('main').hasClass('room-selection')) {
                $('.open-room-selection').click(function () {
                    $('.room-selection-sidebar').addClass('showFilter');
                    $('body').css('overflow', 'hidden');
                });
                $('.close-room-selection').click(function () {
                    $('.room-selection-sidebar').removeClass('showFilter');
                    $('body').removeAttr('style');
                });
            }
            if ($('main').hasClass('menu-page-order')) {
                $('.open-room-selection').click(function () {
                    $('.menu-food-sel-sb').addClass('showFilter');
                    $('body').css('overflow', 'hidden');
                });
                $('.close-room-selection').click(function () {
                    $('.menu-food-sel-sb').removeClass('showFilter');
                    $('body').removeAttr('style');
                });
            }
            if ($('main').hasClass('gallery')) {
                $('.open-gallery').click(function () {
                    $('.gallery-sidebar').addClass('showFilter');
                    $('body').css('overflow', 'hidden');
                });
                $('.close-gallery').click(function () {
                    $('.gallery-sidebar').removeClass('showFilter');
                    $('body').removeAttr('style');
                });
                $('#showRoomBookFilter').click(function () {
                    $('#bookRoom').addClass('showFilter');
                });
                $('.close_roomBook').click(function () {
                    $('#bookRoom').removeClass('showFilter');
                });
            }
        });

    }

    var _stickySidebar = function () {
        $(window).load(function () {
            var inWinWidth = $(window).width();
            if((inWinWidth+17) > 767) {
                $('body').delay(500).queue(function () {
                    if ($('div').hasClass('sticky-sidebar')) {
                        var stickyElement = $('.sticky-sidebar');
                        var parentElement = stickyElement.parent();
                        var container = stickyElement.closest('section');
                        var header = $('nav');
                        var containerHeight = container.height() + 'px';
                        var mediaBreakPoint = '(min-width: 768)';
                        var height = stickyElement.height();
                        var heightString = height + 'px';
                        var widthString = stickyElement.width() + 'px';
                        var headerHeight = header.height() + 'px';
                        var stickyoffSet = container.height() - stickyElement.outerHeight(true) + container.offset().top;

                        if (header.css('position') == 'fixed') {
                            stickyoffSet = stickyoffSet - header.height();
                        }
                        function scrollStickySidebar() {
                            $(window).scroll(function () {
                                var scroll = $(this).scrollTop();

                                setParentOrContainerHeight();
                                setStickyElementScrollDefaultStyles();

                                var length = stickyoffSet;
                                var offsetTop = parentElement.offset().top;

                                if (!window.matchMedia(mediaBreakPoint).matches) {
                                    if (header.css('position') == 'fixed') {
                                        offsetTop = parseInt(offsetTop - header.height());
                                    }
                                    if (scroll < offsetTop) {
                                        stickyElement.css({
                                            'position': 'absolute',
                                            'top': '0',
                                            'bottom': 'auto'
                                        });
                                    }
                                    else if (scroll > length) {
                                        stickyElement.css({
                                            'position': 'absolute',
                                            'top': 'auto',
                                            'bottom': '0'
                                        });
                                    }
                                    else {
                                        stickyElement.css({
                                            'position': 'fixed',
                                            'top': '0',
                                            'bottom': 'auto'
                                        });
                                        if (header.css('position') == 'fixed') {
                                            stickyElement.css({
                                                top: headerHeight
                                            });
                                        }
                                    }
                                }
                                else {
                                    setStickyElementMobileDefaultStyles();
                                }
                            }
                          )
                        };


                        function setStickyElementScrollDefaultStyles() {
                            stickyElement.css({
                                'height': heightString,
                                'width': widthString,
                                'max-width': widthString
                            });
                        }

                        function setStickyElementMobileDefaultStyles() {
                            setParentToAutoHeight();

                            stickyElement.css({
                                'position': 'relative',
                                'top': 'auto',
                                'bottom': 'auto',
                                'height': 'auto',
                                'width': '100%',
                                'max-width': '16.688em'
                            });
                        }

                        function setParentOrContainerHeight() {
                            if (height < container.height()) {
                                parentElement.css({
                                    'height': containerHeight
                                });
                            }
                            else {
                                parentElement.css({
                                    'height': heightString
                                });
                                container.css({
                                    'height': heightString
                                });
                            }
                        }

                        function setParentToAutoHeight() {
                            parentElement.css({
                                'height': 'auto'
                            });
                        }

                        scrollStickySidebar($);

                        $(window).resize(scrollStickySidebar);
                    }

                    $(this).dequeue();
                });
            }
        });
    };

    var _mobileArrangement = function () {
        $(window).on('resize scroll load', function () {
            var vpWidth = $(window).width();
            if ((vpWidth + 17) < 767) {
                $('.js-checkinfo').appendTo('.second-mbl');
                $('.js-customerdetails').appendTo('.first-mbl');
            } else {
                $('.js-checkinfo').appendTo('.first-mbl');
                $('.js-customerdetails').appendTo('.second-mbl');
            }
        });
    };

    var _roomSelect = function () {
        $(document).ready(function () {
            if ($('main').hasClass('room-selection')) {
                $(".room-sr-holder input[type='checkbox']").change(function () {
                    if ($(this).is(":checked")) {
                        window.location.href = $(this).data("target")
                    }
                });
            }
        });
    };

    var _socialHover = function () {
        //$(document).ready(function () {
        //    $('.soc-links .fb-link').hover(function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-fb-black.png');
        //    }, function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-fb.png');
        //    });
        //    $('.soc-links .twitter-link').hover(function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-twitter-black.png');
        //    }, function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-twitter.png');
        //    });
        //    $('.soc-links .insta-link').hover(function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-instagram-black.png');
        //    }, function () {
        //        $(this).find('img').attr('src', 'assets/images/icon-instagram.png');
        //    });
        //});
    };

    /////////////////////
    // Public Methods //
    ///////////////////
    var init = function () {
        _scrollUp();
        _fullBannerScroll();
        _toggleNav();
        _datePicker();
        _bookingStep();
        _historyBack();
        _instaFeeds();
        _ieObjectFit();
        _masonryGrid();
        _quantityCount();
        _galleryPreview();
        _inputUpload();
        _stickySidebar();
        _openFilter();
        _mobileArrangement();
        _roomSelect();
        _socialHover();
    };

    return {
        init: init
    };
})();
