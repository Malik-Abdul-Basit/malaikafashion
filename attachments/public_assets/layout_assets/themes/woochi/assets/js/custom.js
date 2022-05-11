(function($) {
    "use strict";


/* Cookie Notice */
    function ftc_cookie_popup() {
        var cookies_version = ftc_shortcode_params.cookies_version;
        if ($.cookie('ftc_cookies_' + cookies_version) == 'accepted') return;
        var popup = $('.ftc-cookies-popup');

        setTimeout(function() {
            popup.addClass('popup-display');
            popup.on('click', '.cookies-accept-btn', function(e) {
                e.preventDefault();
                acceptCookies();
            })
        }, 2500);

        var acceptCookies = function() {
            popup.removeClass('popup-display').addClass('popup-hide');
            $.cookie('ftc_cookies_' + cookies_version, 'accepted', { expires: 60, path: '/' });
        };
    };
    ftc_cookie_popup();

    
$('.portfolio-inner a[rel^="prettyPhoto"]').prettyPhoto({
        show_title: false
        ,deeplinking: false
        ,social_tools: false
    });
$(window).on('load', function(){
        if( typeof $.fn.isotope == 'function' ){
            $('.ftc-portfolio-wrapper .portfolio-inner').isotope({filter: '*'});
        }
    });

    $('.ftc-portfolio-wrapper .filter-bar li').on('click', function(){
        $(this).siblings('li').removeClass('current');
        $(this).addClass('current');
        var container = $(this).parents('.ftc-portfolio-wrapper').find('.portfolio-inner');
        var data_filter = $(this).data('filter');
        container.isotope({filter: data_filter});
    });

    $('.ftc-portfolio-wrapper').each(function(){
        var element = $(this);
        var atts = element.data('atts');
        
        element.find('a.load-more').bind('click', function(){
            var button = $(this);
            if( button.hasClass('loading') ){
                return false;
            }
            
            button.addClass('loading');
            var paged = button.attr('data-paged');
            
            $.ajax({
                type : "POST",
                timeout : 30000,
                url : ftc_shortcode_params.ajax_uri,
                data : {action: 'ftc_portfolio_load_items', paged: paged, atts : atts},
                error: function(xhr,err){

                },
                success: function(response) {
                    button.removeClass('loading');
                    button.attr('data-paged', ++paged);
                    if( response != 0 && response != '' ){
                        if( typeof $.fn.isotope == 'function' ){                                        
                            element.find('.portfolio-inner').isotope('insert', $(response));
                            element.find('.filter-bar li.current').trigger('click');
                            setTimeout(function(){
                                element.find('.portfolio-inner').isotope('layout');
                            }, 500);
                        }
                    }
                    else{ /* No results */
                        button.parent().remove();
                    }
                }
            });
            
            return false;
        });
    });
if($('body .ftc-portfolio-wrapper').length){
   $('body .ftc-portfolio-wrapper').parents('body').addClass('porta');
}

    
    $("button.button-banner").click(function() {
        $(".custom_content").remove();
    });
    /* Single Product Size Chart */
    jQuery('a.ftc-size_chart').prettyPhoto({
        deeplinking: false,
        opacity: 0.9,
        social_tools: false,
        default_width: 800,
        default_height: 506,
        theme: 'ftc-size_chart',
        changepicturecallback: function() {
            jQuery('.ftc-size-chart').addClass('loaded');
        }
    });
    $(".wishlist_table").html(function() {
        var tfoot = $("tfoot");
        if ($("div").hasClass("yith-wcwl-share")) {
            tfoot.show();
        } else {
            tfoot.hide();
        }
    });
    $(".last_text h4").html(function() {
        var text = $(this).text().trim().split(" ");
        var last = text.pop();
        return text.join(" ") + (text.length > 0 ? " <span class='color_title'>" + last + "</span>" : last);
    });

    /* Popup Newletter */
    $(document).ready(function() {
        $('.newsletterpopup .close-popup, .popupshadow').on('click', function() {
            $('.newsletterpopup').hide();
            $('.popupshadow').hide();
        });
    });
    $(window).load(function() {
        var wiw=$(window).width();
        if ($('.newsletterpopup').length) {
            var cookieValue = $.cookie("ftc_popup");
            if (cookieValue == 1) {
                $('.newsletterpopup').hide();
                $('.popupshadow').hide();
            } else {
                $('.newsletterpopup').show();
                $('.popupshadow').show();
            }
        }
    });
    $(".prod-cat-show-top-content-button").click(function(){
    $(".ftc-sidebar.product-category-top-content").slideToggle("fast");
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
        }
        else{
            $(this).addClass('active');
        }
    });
    $('#ftc_dont_show_again').change(function() {
        if ($(this).is(':checked')) {
            $.cookie("ftc_popup", 1, { expires: 24 * 60 * 60 * 1000 });
        }
    });
    $('.blog-image.gallery,.ftc-image-slider .ftc__slider__image').each(function() {
        $(this).addClass('loaded').removeClass('loading');
        $(this).owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            navText: [, ],
            navSpeed: 1000,
            slideBy: 1,
            rtl: $('body').hasClass('rtl'),
            margin: 10,
            navRewind: false,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            autoplaySpeed: 4000,
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                }
            }

        });

    });
    /* Infinite-Shop */
    function ftc_infinite_shop() {
        var container = $('.archive.infinite .woocommerce > .products')
        var container = $('.archive.term-dresses .woocommerce > .products'),
        paginationNext = '.woocommerce-pagination li a.next';
        if (container.length === 0 || $(paginationNext).length === 0) {
        return;
        }
        var loadProduct = container.infiniteScroll({
            path: paginationNext,
            append: '.product',
            checkLastPage: true,
            status: '.page-load-status',
            hideNav: '.woocommerce-pagination',
            history: 'push',
            debug: false,
            scrollThreshold: 400,
            loadOnScroll: true
        });
        loadProduct.on('append.infiniteScroll', function(event, response, path, items) {
        $('img.ftc-image').bind('load', function () {
            $(this).parents('.lazy-loading').removeClass('lazy-loading').addClass('lazy-loaded');
        });
        ftc_quickshop_process_action();
        $('img.ftc-image').each(function () {
            if ($(this).data('src')) {
            $(this).attr('src', $(this).data('src'));
            }
        });
        })
    }
    
        ftc_infinite_shop();
    
    /* Product 360*/
    $('a.ftc-video360').magnificPopup({
                type: 'inline',
                mainClass: 'product-360',
                preloader: false,
                fixedContentPos: false,
                callbacks: {
                    open: function() {
                        $(window).resize()
                    },
                },
            });
    /* Single Product Video */
    jQuery('a.ftc-single-video').prettyPhoto({
        deeplinking: false
        ,opacity: 0.9
        ,social_tools: false
        ,default_width: 800
        ,default_height: 506
        ,theme: 'ftc-product-video'
        ,changepicturecallback: function(){
        jQuery('.ftc-product-video').addClass('loaded');
        }
    });
    /* Mobile sticky */
    $(window).scroll(function() {
        var heightHeader = $('.header-ftc').height();
        if ($(this).scrollTop() > heightHeader) {
            $(".header-ftc .header-content ").addClass("header-sticky-mobile");
        } else {
            $(".header-ftc .header-content ").removeClass("header-sticky-mobile");
        }
    });
    /* Mobile Navigation */
    function ftc_open_menu() {
        var body = $('body');

        body.on("click", ".mobile-nav", function() {
            if (body.hasClass("has-mobile-menu")) {
                body.removeClass("has-mobile-menu");
            } else {
                body.addClass("has-mobile-menu");
            }
        });
        body.on("click", ".btn-toggle-canvas", function() {
            body.removeClass("has-mobile-menu");
        });
        body.on("click touchstart", ".ftc-close-popup", function() {
            body.removeClass("has-mobile-menu");
        });
    }
    ftc_open_menu();
    /* Cloud Zoom */
    function ftc_cloud_zoom() {
        jQuery('.cloud-zoom-wrap .cloud-zoom-big').remove();
        jQuery('.cloud-zoom, .cloud-zoom-gallery').unbind('click');
        var clz_width = jQuery('.cloud-zoom, .cloud-zoom-gallery').width();
        var clz_img_width = jQuery('.cloud-zoom, .cloud-zoom-gallery').children('img').width();
        var cl_zoom = jQuery('.cloud-zoom, .cloud-zoom-gallery').not('.on_pc');
        var temp = (clz_width - clz_img_width) / 2;
        if (cl_zoom.length > 0) {
            cl_zoom.data('zoom', null).siblings('.mousetrap').unbind().remove();
            cl_zoom.CloudZoom({
                adjustX: temp
            });
        }
    }

    ftc_cloud_zoom();
    if ($('.cloud-zoom, .cloud-zoom-gallery').length > 0) {
        $('form.variations_form').live('found_variation', function(event, variation) {
            $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom({});
        }).live('reset_image', function() {
            $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom({});
        });
    }
    // Show hide popover
    $(".dropdown-button").click(function() {
        $(this).find("#dropdown-list").slideToggle("fast");
    });

    $(".menu-ftc").click(function() {
        $('#primary-menu').slideToggle("fast");
    });
    $('#mega_main_menu').parent().addClass('menu-fix');

    $('img.ftc-image').each(function() {
        if ($(this).data('src')) {
            $(this).attr('src', $(this).data('src'));
        }
    });
    /*** Milestone ***/
    if (typeof $.fn.waypoint == 'function' && typeof $.fn.countTo == 'function') {
        $('.ftc-number').waypoint(function() {
            if (typeof this.disable == 'function') {
                this.disable();
                var element = $(this.element);
                var end_num = element.data('number');
            } else { 
                var element = $(this);
                var end_num = element.data('number');
            }

            element.find('.number').countTo({
                from: 0,
                to: end_num,
                speed: 2500,
                refreshInterval: 30
            });
        }, { offset: '75%',
             triggerOnce: true });
    }

    /* Ajax Search */
    if (typeof ftc_shortcode_params._ftc_enable_ajax_search != 'undefined' && ftc_shortcode_params._ftc_enable_ajax_search == 1) {
        ftc_ajax_search();
    }

    /*** Ajax search ***/
    function ftc_ajax_search() {
        var search_string = '';
        var search_previous_string = '';
        var search_timeout;
        var search_input;
        var search_cache_data = {};
        jQuery('.ftc_search_ajax').append('<div class="ftc-enable-ajax-search"></div>');
        var ftc_enable_ajax_search = jQuery('.ftc-enable-ajax-search');

        jQuery('.ftc_search_ajax input[name="s"]').bind('keyup', function(e) {
            search_input = jQuery(this);
            ftc_enable_ajax_search.hide();

            search_string = jQuery.trim(jQuery(this).val());
            if (search_string.length < 2) {
                search_input.parents('.ftc_search_ajax').removeClass('loading');
                return;
            }

            if (search_cache_data[search_string]) {
                ftc_enable_ajax_search.html(search_cache_data[search_string]);
                ftc_enable_ajax_search.show();
                search_previous_string = '';
                search_input.parents('.ftc_search_ajax').removeClass('loading');

                ftc_enable_ajax_search.find('.view-all-wrapper a').bind('click', function(e) {
                    e.preventDefault();
                    search_input.parents('form').submit();
                });

                return;
            }

            clearTimeout(search_timeout);
            search_timeout = setTimeout(function() {
                if (search_string == search_previous_string || search_string.length < 2) {
                    return;
                }
                search_previous_string = search_string;
                search_input.parents('.ftc_search_ajax').addClass('loading');

                /* check category */
                var category = '';
                var select_category = search_input.parents('.ftc_search_ajax').siblings('.select-category');
                if (select_category.length > 0) {
                    category = select_category.find(':selected').val();
                }

                jQuery.ajax({
                    type: 'POST',
                    url: ftc_shortcode_params.ajax_uri,
                    data: { action: 'ftc_ajax_search', search_string: search_string, category: category },
                    error: function(xhr, err) {
                        search_input.parents('.ftc_search_ajax').removeClass('loading');
                    },
                    success: function(response) {
                        if (response != '') {
                            response = JSON.parse(response);
                            if (response.search_string == search_string) {
                                ftc_enable_ajax_search.html(response.html);
                                search_cache_data[search_string] = response.html;

                                ftc_enable_ajax_search.css({
                                    'position': 'absolute',
                                    'display': 'block',
                                    'z-index': '999'
                                });

                                search_input.parents('.ftc_search_ajax').removeClass('loading');

                                ftc_enable_ajax_search.find('.view-all-wrapper a').bind('click', function(e) {
                                    e.preventDefault();
                                    search_input.parents('form').submit();
                                });
                            }
                        } else {
                            search_input.parents('.ftc_search_ajax').removeClass('loading');
                        }
                    }
                });
            }, 500);
        });

        ftc_enable_ajax_search.hover(function() {}, function() { ftc_enable_ajax_search.hide(); });

        jQuery('body').bind('click', function() {
            ftc_enable_ajax_search.hide();
        });

        jQuery('.ftc-search-product select.select-category').bind('change', function() {
            search_previous_string = '';
            search_cache_data = {};
            jQuery(this).parents('.ftc-search-product').find('.ftc_search_ajax input[name="s"]').trigger('keyup');
        });
    }

    /** To Top button **/
    if ($('html').offset().top < 100) {
        $("#to-top").hide().addClass("off");
    }
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $("#to-top").removeClass("off").addClass("on");
        } else {
            $("#to-top").removeClass("on").addClass("off");
        }
    });
    $('#to-top .scroll-button').click(function() {
        $('body,html').animate({
            scrollTop: '0px'
        }, 1000);
        return false;
    });

    /* Header Sticky */
    if (typeof ftc_shortcode_params._ftc_enable_sticky_header != 'undefined' && ftc_shortcode_params._ftc_enable_sticky_header) {
        ftc_sticky_menu();
    }

    function ftc_sticky_menu() {
        var top_spacing = 0;
        if (jQuery(window).width() > 991) {
            if (jQuery('body').hasClass('logged-in') && jQuery('body').hasClass('admin-bar')) {
                top_spacing = 30;
            }
            var top_begin = jQuery('header.header-ftc').height() + 30;

            setTimeout(function() {
                jQuery('.header-sticky').sticky({
                    topSpacing: top_spacing,
                    topBegin: top_begin
                });
            }, 100);
            var old_scroll_top = 0;
            var extra_space = 650 + top_spacing + top_begin;
            jQuery(window).scroll(function() {
                if (jQuery('.is-sticky').length > 0) {
                    var scroll_top = jQuery(this).scrollTop();
                    if (scroll_top > old_scroll_top && scroll_top > extra_space) { /* Scroll Down */
                        jQuery('.header-sticky').addClass('header-sticky-hide');
                    } else { /* Scroll Up */
                        if (jQuery('.header-sticky').hasClass('header-sticky-hide')) {
                            jQuery('.header-sticky').removeClass('header-sticky-hide');
                        }
                    }
                    old_scroll_top = scroll_top;
                }
            });
        }
    }

    // FTC Owl slider
    $('.ftc-product-slider,.ftc-list-category-slider,.ftc-product-time-deal').each(function() {
        var margin = $(this).data('margin');
        var columns = $(this).data('columns');
        var nav = $(this).data('nav') == 1;
        var auto_play = $(this).data('auto_play') == 1;
        var slider = $(this).data('slider') == 1;
        var desksmall_items = $(this).data('desksmall_items');
        var tabletmini_items = $(this).data('tabletmini_items');
        var tablet_items = $(this).data('tablet_items');
        var mobile_items = $(this).data('mobile_items');
        var mobilesmall_items = $(this).data('mobilesmall_items');


        if (slider) {
            var _slider_data = {
                loop: true,
                nav: nav,
                dots: true,
                navSpeed: 1000,
                navText: [, ],
                rtl: $('body').hasClass('rtl'),
                margin: margin,
                autoplay: auto_play,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: true,
                responsiveBaseElement: $('body'),
                responsiveRefreshRate: 400,
                responsive: {
                    0: {
                        items: mobilesmall_items
                    },
                    480: {
                        items: mobile_items
                    },
                    640: {
                        items: tabletmini_items
                    },
                    736: {
                        items: tablet_items
                    },
                    991: {
                        items: desksmall_items
                    },
                    1199: {
                        items: columns
                    }
                },
                onInitialized: function() {
                    $(this).addClass('loaded').removeClass('loading');
                }
            };
            $(this).find('.meta-slider > div').owlCarousel(_slider_data);
        }

    });
    function gallery_masory(){
    $('.blog-image.gallery').each(function() {
        $(this).addClass('loaded').removeClass('loading');
        $(this).owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            navText: [, ],
            navSpeed: 1000,
            slideBy: 1,
            rtl: $('body').hasClass('rtl'),
            margin: 10,
            navRewind: false,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            autoplaySpeed: 4000,
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                }
            }

            });
        });
    }

    /*** Blog Shortcode ***/
    $('.ftc-sb-blogs').each(function() {
        var element = $(this);
        var atts = element.data('atts');

        /* Slider */
        if (atts.is_slider) {
            var nav = parseInt(atts.show_nav) == 1;
            var auto_play = parseInt(atts.auto_play) == 1;
            var margin = parseInt(atts.margin);
            var columns = parseInt(atts.columns);
            var desksmall_items = parseInt(atts.desksmall_items);
            var tablet_items = parseInt(atts.tablet_items);
            var tabletmini_items = parseInt(atts.tabletmini_items);
            var mobile_items = parseInt(atts.mobile_items);
            var mobilesmall_items = parseInt(atts.mobilesmall_items);

            var slider_data = {
                loop: true,
                nav: nav,
                navText: [, ],
                navSpeed: 1000,
                slideBy: 1,
                rtl: $('body').hasClass('rtl'),
                margin: margin,
                navRewind: false,
                autoplay: auto_play,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                autoplaySpeed: false,
                autoHeight: true,
                mouseDrag: true,
                touchDrag: true,
                responsiveBaseElement: $('body'),
                responsiveRefreshRate: 400,
                responsive: {
                    0: {
                        items: mobilesmall_items
                    },
                    480: {
                        items: mobile_items
                    },
                    640: {
                        items: tabletmini_items
                    },
                    768: {
                        items: tablet_items
                    },
                    991: {
                        items: desksmall_items
                    },
                    1199: {
                        items: columns
                    }
                },
                onInitialized: function() {
                    element.find('.meta-slider').addClass('loaded').removeClass('loading');
                }
            };
            element.find('.meta-slider > .blogs').owlCarousel(slider_data);
        }

        /* Blog Gallery - Masonry - Load more */
        var is_masonry = false;
        if (atts.is_masonry && typeof $.fn.isotope == 'function') {
            is_masonry = true;
        }

        if (is_masonry) {
            $(window).bind('load', function() {
                element.find('.blogs').isotope();
            });
        }

        /* Show more */
        element.find('a.load-more').bind('click', function() {
            var button = $(this);
            if (button.hasClass('loading')) {
                return false;
            }

            button.addClass('loading');
            var paged = button.attr('data-paged');

            $.ajax({
                type: "POST",
                timeout: 30000,
                url: ftc_shortcode_params.ajax_uri,
                data: { action: 'ftc_blogs_load_items', paged: paged, atts: atts },
                error: function(xhr, err) {
                },
                success: function(response) {
                    button.removeClass('loading');
                    button.attr('data-paged', ++paged);
                    if (response != 0 && response != '') {
                        if (is_masonry) {
                            element.find('.blogs').isotope('insert', $(response));
                            setTimeout(function() {
                                element.find('.blogs').isotope('layout');
                            }, 500);
                        } else { /* Append and Update first-last classes */
                            element.find('.blogs').append(response);

                            var columns = parseInt(atts.columns);
                            element.find('.blogs .item').removeClass('first last');
                            element.find('.blogs .item').each(function(index, ele) {
                                if (index % columns == 0) {
                                    $(ele).addClass('first');
                                }
                                if (index % columns == columns - 1) {
                                    $(ele).addClass('last');
                                }
                            });
                        }
                    } else { /* No results */
                        button.parent().remove();
                    }
                    gallery_masory();
                }
            });

            return false;
        });

    });

    /* Load more Product*/
    $('.ftc-product').each(function() {
        var element = $(this);
        var atts = element.data('atts');

        /* Show more */
        element.find('a.load-more').bind('click', function() {
            var button = $(this);
            if (button.hasClass('loading')) {
                return false;
            }
            button.addClass('loading');
            var paged = button.attr('data-paged');

            $.ajax({
                type: "POST",
                timeout: 30000,
                url: ftc_shortcode_params.ajax_uri,
                data: { action: 'ftc_products_load_items', paged: paged, atts: atts },
                error: function(xhr, err) {

                },
                success: function(response) {
                    button.removeClass('loading');
                    button.attr('data-paged', ++paged);
                    if (response != 0 && response != '') {
                        element.find('.products').append(response);
                    } else { /* No results */
                        button.parent().remove();
                    }
                }
            });
            return false;
        });
    });

    // Ajax Remove Cart
    if ($('.ftc_cart_list')) {
        $(document).on('click', '.cart-item-wrapper .remove', function(event) {
            event.preventDefault();
            $(this).closest('li').addClass('loading');

            jQuery.ajax({
                type: 'POST',
                url: ftc_shortcode_params.ajax_uri,
                data: {
                    action: 'ftc_remove_cart_item',
                    cart_item_key: $(this).data('key')
                },
                success: function(data) {
                    if (data && data.fragments) {

                        $.each(data.fragments, function(key, value) {
                            $(key).replaceWith(value);
                        });
                    }
                }
            });
        });
    }

    $('.ftc-sb-brandslider').each(function() {
        var margin = $(this).data('margin');
        var columns = $(this).data('columns');
        var nav = $(this).data('nav') == 1;
        var auto_play = $(this).data('auto_play') == 1;
        var slider = $(this).data('slider') == 1;
        var desksmall_items = $(this).data('desksmall_items');
        var tabletmini_items = $(this).data('tabletmini_items');
        var tablet_items = $(this).data('tablet_items');
        var mobile_items = $(this).data('mobile_items');
        var mobilesmall_items = $(this).data('mobilesmall_items');
        var dot = $('.owl-dots .owl-dot');


        if (slider) {
            var _slider_data = {
                loop: true,
                nav: nav,
                dots: false,
                navSpeed: 1000,
                navText: [, ],
                rtl: $('body').hasClass('rtl'),
                margin: margin,
                autoplay: auto_play,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                responsiveBaseElement: $('body'),
                responsiveRefreshRate: 400,
                responsive: {
                    0: {
                        items: mobilesmall_items
                    },
                    480: {
                        items: mobile_items
                    },
                    640: {
                        items: tabletmini_items
                    },
                    768: {
                        items: tablet_items
                    },
                    991: {
                        items: desksmall_items
                    },
                    1199: {
                        items: columns
                    }
                },
                onInitialized: function() {
                    $(this).addClass('loaded').removeClass('loading');
                }
            };
            $(this).find('.meta-slider > div').owlCarousel(_slider_data);
        }

    });

    // Woocommerce Quantity on GitHub
    $(document).on('click', '.plus, .minus', function() {

        // Get values
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {

            if (max && (max == currentVal || currentVal > max)) {
                $qty.val(max);
            } else {
                $qty.val(currentVal + parseFloat(step));
            }

        } else {

            if (min && (min == currentVal || currentVal < min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val(currentVal - parseFloat(step));
            }

        }

        // Trigger change event
        $qty.trigger('change');

    });

    if ($('.single-product').length > 0) {
        /* Horizontal slider */
        var wrapper = $('.single-product .product:not(.vertical-thumbnail) .details-img .thumbnails.loading');
        wrapper.find('.details_thumbnails').owlCarousel({
            loop: true,
            nav: true,
            navText: [, ],
            dots: false,
            navSpeed: 1000,
            rtl: $('body').hasClass('rtl'),
            margin: 10,
            navRewind: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplaySpeed: 1000,
            responsiveBaseElement: wrapper,
            responsiveRefreshRate: 1000,
            responsive: {
                0: {
                    items: 1
                },
                100: {
                    items: 2
                },
                250: {
                    items: 3
                },
                290: {
                    items: 3
                }
            },
            onInitialized: function() {
                wrapper.addClass('loaded').removeClass('loading');
            }
        });

        var wrapper = $('.single-product .product.vertical-thumbnail .details-img .thumbnails.loading');
        if (wrapper.length > 0 && typeof $.fn.carouFredSel == 'function') {
            var items = 4;
            if ($('#left-sidebar').length > 0 || $('#right-sidebar').length > 0) {
                items = 3;
            }
            if ($('#left-sidebar').length > 0 && $('#right-sidebar').length > 0) {
                items = 4;
            }

            var _slider_data = {
                items: items,
                direction: 'up',
                width: 'auto',
                height: '150px',
                infinite: true,
                prev: wrapper.find('.owl-prev').selector,
                next: wrapper.find('.owl-next').selector,
                auto: {
                    play: true,
                    timeoutDuration: 5000,
                    duration: 800,
                    delay: 3000,
                    items: 1,
                    pauseOnHover: true
                },
                scroll: {
                    items: 1
                },
                swipe: {
                    onTouch: true,
                    onMouse: true
                },
                onCreate: function() {
                    wrapper.addClass('loaded').removeClass('loading');
                }
            };

            wrapper.find('.details_thumbnails').carouFredSel(_slider_data);

            $(window).bind('load', function() {
                $(window).trigger('resize');
            });

            $(window).bind('resize orientationchange', $.debounce(250, function() {
                if ($(window).width() < 420) {
                    _slider_data.items = 2;
                } else if ($(window).width() < 500) {
                    _slider_data.items = 3;
                } else if ($(window).width() < 768) {
                    _slider_data.items = 3;
                } else {
                    _slider_data.items = items;
                }
                wrapper.find('.details_thumbnails').trigger('configuration', _slider_data);
            }));
        }
    }

    $('.single-product .related .products').each(function() {
        $(this).addClass('loaded').removeClass('loading');
        $(this).owlCarousel({
            loop: true,
            nav: true,
            navText: [, ],
            dots: true,
            navSpeed: 1000,
            slideBy: 1,
            rtl: jQuery('body').hasClass('rtl'),
            margin: 30,
            autoplayTimeout: 5000,
            responsiveRefreshRate: 400,
            responsive: {
                0: {
                    items: 1
                },
                520: {
                    items: 2
                },
                640: {
                    items: 3
                },
                950: {
                    items: 4
                }
            }
        });
    });


    $('.single-post .related-posts.loading .meta-slider .blogs').each(function() {
        $(this).addClass('loaded').removeClass('loading');
        $(this).owlCarousel({
            loop: true,
            nav: false,
            navText: [, ],
            dots: false,
            navSpeed: 1000,
            slideBy: 1,
            rtl: jQuery('body').hasClass('rtl'),
            margin: 30,
            autoplayTimeout: 5000,
            responsiveRefreshRate: 400,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                800: {
                    items: 2
                },
                1400: {
                    items: 2
                }
            }
        });
    });


    $(document).on('click', '.widget_categories span.icon-toggle', function() {
        if (!$(this).parent().hasClass('active')) {
            $(this).parent().find('ul.children:first').slideDown(300);
            $(this).parent().addClass('active');
        } else {
            $(this).parent().find('ul.children').slideUp(300);
            $(this).parent().removeClass('active');
            $(this).parent().find('li.cat-parent').removeClass('active');
        }
    });
    $('.widget_categories li.current-cat').siblings('.icon-toggle').parents('ul.children').trigger('click').slideUp(300);

    $(document).on('click', '.widget-container.ftc-product-categories-widget .icon-toggle', function() {

        if (!$(this).parent().hasClass('active')) {
            $(this).parent().addClass('active');
            $(this).parent().find('ul.children:first').slideDown(300);
        } else {
            $(this).parent().find('ul.children').slideUp(300);
            $(this).parent().removeClass('active');
            $(this).parent().find('li.cat-parent').removeClass('active');
        }
    });

    $('.widget-container.ftc-product-categories-widget').each(function() {
        $(this).find('ul.children').parent('li').addClass('cat-parent');
        $(this).find('li.current').parents('ul.children').siblings('.icon-toggle').trigger('click');
    });


    $('.widget-title-wrapper a.block-control').bind('click', function(e) {
        e.preventDefault();
        $(this).parent().siblings().slideToggle(400);
        $(this).toggleClass('deactive');
    });

    ftc_widget_on_off();
    if (!on_touch) {
        $(window).bind('resize', $.throttle(250, function() {
            ftc_widget_on_off();
        }));
    }

    (function(a) {
        jQuery.browser.ftc_mobile = /android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
    })(navigator.userAgent || navigator.vendor || window.opera);

    function ftc_is_device_like_smartphone() {
        var is_touch = !!("ontouchstart" in window) ? true : false;
        if (jQuery.browser.ftc_mobile) {
            is_touch = true;
        }
        return is_touch;
    }
    var on_touch = ftc_is_device_like_smartphone();

    function ftc_take_width_of_scrollbar() {
        var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
        $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
        inner = $inner[0],
        outer = $outer[0];

        jQuery('body').append(outer);
        var width1 = inner.offsetWidth;
        $outer.css('overflow', 'scroll');
        var width2 = outer.clientWidth;
        $outer.remove();

        return (width1 - width2);
    }
    function ftc_widget_on_off() {
    if (typeof ftc_shortcode_params._ftc_enable_responsive != 'undefined' && !ftc_shortcode_params._ftc_enable_responsive) {
        return;
    }
    jQuery('.footer-container .widget-title-wrapper a.block-control').remove();
    var window_width = jQuery(window).width();
    window_width += ftc_take_width_of_scrollbar();
    if (window_width >= 768) {
        jQuery('.widget-title-wrapper a.block-control').removeClass('active').hide();
        jQuery('.widget-title-wrapper a.block-control').parent().siblings().show();
    } else {
        jQuery('.widget-title-wrapper a.block-control').show();
        jQuery('.footer-container .widget-title-wrapper').siblings().show();
    }
}

    $('form.woocommerce-ordering ul.orderby ul a').bind('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('current')) {
            return;
        }
        $(this).closest('form.woocommerce-ordering').find('select.orderby').val($(this).attr('data-orderby'));
        $(this).closest('form.woocommerce-ordering').submit();
    });

    function ftc_slider_products_categorytabs_is_slider(element, show_nav, auto_play, columns, responsive, margin) {
        if (element.find('.products .ftc-products').length > 0) {
            show_nav = (show_nav == 1) ? true : false;
            auto_play = (auto_play == 1) ? true : false;
            columns = parseInt(columns);
            var _slider_data = {
                loop: true,
                nav: show_nav,
                navText: [, ],
                dots: false,
                navSpeed: 1000,
                slideBy: 1,
                rtl: $('body').hasClass('rtl'),
                margin: 0,
                navRewind: false,
                autoplay: auto_play,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                autoplaySpeed: 1000,
                mouseDrag: true,
                touchDrag: true,
                responsiveBaseElement: $('body').find('.products'),
                responsiveRefreshRate: 400,
                responsive: {
                    0: {
                        items: 1
                    },
                    320: {
                        items: 2
                    },
                    470: {
                        items: 3
                    },
                    670: {
                        items: 4
                    },
                    870: {
                        items: 5
                    },
                    1100: {
                        items: columns
                    }
                },
                onInitialized: function() {
                }
            };

            if (responsive != undefined) {
                _slider_data.responsive = responsive;
            }

            if (margin != undefined) {
                _slider_data.margin = margin;
            }

            element.find('.products').owlCarousel(_slider_data);
        }
    }

    var ftc_type_of_products_data = [];

    $('.ftc-products-category .row-tabs .tab-item').bind('click', function() {
        /* Tab */
        if ($(this).hasClass('current') || $(this).parents('.ftc-products-category').find('.row-content').hasClass('loading')) {
            return;
        }
        $(this).parents('.ftc-products-category').find('.row-tabs .tab-item').removeClass('current');
        $(this).addClass('current')

        var element = $(this).parents('.ftc-products-category');
        var atts = element.data('atts');
        var margin = 30;
        var responsive = {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            900: {
                items: 3
            },
            1000: {
                items: atts.columns
            }
        };
        if (ftc_type_of_products_data[$(this).parents('.ftc-products-category').attr('id')] != undefined) {
            if (typeof ftc_quickshop_process_action == 'function') {
                ftc_quickshop_process_action();
            }
            $(this).parents('.ftc-products-category').find('.lazy-loading img').each(function() {
                if ($(this).data('src')) {
                    $(this).attr('src', $(this).data('src'));
                }
            });
            $(this).parents('.ftc-products-category').find('.lazy-loading').removeClass('lazy-loading').addClass('lazy-loaded');
        }
        $(this).parents('.ftc-products-category').find('.row-content').addClass('loading');

        $.ajax({
            type: "POST",
            timeout: 30000,
            url: ftc_shortcode_params.ajax_uri,
            data: { action: 'ftc_get_product_content_in_category_tab_2', atts: atts, product_cat: $(this).data('product_cat') },
            error: function(xhr, err) {},
            success: function(response) {
                if (response) {
                    element.find('.column-products .products.owl-carousel').owlCarousel('destroy');
                    element.find('.row-content > div').remove();
                    element.find('.row-content').append(response);
                    if (typeof ftc_quickshop_process_action == 'function') {
                        ftc_quickshop_process_action();
                    }
                    ftc_countdown(element.find('.product .counter-wrapper'));
                    ftc_slider_products_categorytabs_is_slider(element, atts.show_nav, atts.auto_play, atts.columns, responsive, margin);
                }
                element.find('.row-content').removeClass('loading');
            }
        });
    });

    $('.ftc-products-category').each(function() {
        var current_tab = 1;
        var count_tab = $(this).find('.row-tabs .tab-item').length;
        var atts = $(this).data('atts');
        if (atts.current_tab != undefined) {
            var defined_current_tab = parseInt(atts.current_tab);
            if (defined_current_tab > 1 && defined_current_tab <= count_tab) {
                current_tab = defined_current_tab;
            }
        }
        $(this).find('.row-tabs .tab-item').eq(current_tab - 1).trigger('click');
    });

    function ftc_countdown(countdown) {
        if (countdown.length > 0) {
            var interval = setInterval(function() {
                countdown.each(function(index, countdown) {
                    var day = 0;
                    var hour = 0;
                    var minute = 0;
                    var second = 0;

                    var delta = 0;
                    var time_day = 60 * 60 * 24;
                    var time_hour = 60 * 60;
                    var time_minute = 60;

                    $(countdown).find('.days .number-wrapper .number').each(function(i, e) {
                        day = parseInt($(e).text());
                    });
                    $(countdown).find('.hours .number-wrapper .number').each(function(i, e) {
                        hour = parseInt($(e).text());
                    });
                    $(countdown).find('.minutes .number-wrapper .number').each(function(i, e) {
                        minute = parseInt($(e).text());
                    });
                    $(countdown).find('.seconds .number-wrapper .number').each(function(i, e) {
                        second = parseInt($(e).text());
                    });

                    if (day != 0 || hour != 0 || minute != 0 || second != 0) {
                        delta = (day * time_day) + (hour * time_hour) + (minute * time_minute) + second;
                        delta--;

                        day = Math.floor(delta / time_day);
                        delta -= day * time_day;

                        hour = Math.floor(delta / time_hour);
                        delta -= hour * time_hour;

                        minute = Math.floor(delta / time_minute);
                        delta -= minute * time_minute;

                        if (delta > 0) {
                            second = delta;
                        } else {
                            second = '0';
                        }

                        day = (day < 10) ? ftc_start_number_timer(day, 2) : day.toString();
                        hour = (hour < 10) ? ftc_start_number_timer(hour, 2) : hour.toString();
                        minute = (minute < 10) ? ftc_start_number_timer(minute, 2) : minute.toString();
                        second = (second < 10) ? ftc_start_number_timer(second, 2) : second.toString();

                        $(countdown).find('.days .number-wrapper .number').each(function(i, e) {
                            $(e).text(day);
                        });

                        $(countdown).find('.hours .number-wrapper .number').each(function(i, e) {
                            $(e).text(hour);
                        });

                        $(countdown).find('.minutes .number-wrapper .number').each(function(i, e) {
                            $(e).text(minute);
                        });

                        $(countdown).find('.seconds .number-wrapper .number').each(function(i, e) {
                            $(e).text(second);
                        });
                    }
                });
            }, 1000);
        }
    }

    ftc_countdown($('.product .counter-wrapper, .ftc-countdown .counter-wrapper'));

    function ftc_start_number_timer(str, max) {
        str = str.toString();
        return str.length < max ? ftc_start_number_timer('0' + str, max) : str;
    }

    $('.ftc-sb-testimonial.ftc-slider').each(function() {
        var slider = true;
        if ($(this).find('.item').length <= 1) {
            slider = false;
        }

        if (slider) {
            var nav = $(this).data('nav') == 1;
            var dots = $(this).data('dots') == 1;
            var autoplay = $(this).data('auto_play') == 1;
            $(this).addClass('loaded').removeClass('loading');
            $(this).owlCarousel({
                items: 1,
                loop: true,
                nav: nav,
                dots: dots,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                navText: [, ],
                navSpeed: 500,
                rtl: $('body').hasClass('rtl'),
                margin: 0,
                autoplay: autoplay,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                center: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1024: {
                        items: 3
                    }
                }
            });
        }
    });


    function ftc_googlemap_start_up(map_content_obj, address, zoom, map_type, title) {
        var geocoder, map;
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'address': address }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var _ret_array = new Array(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    title: title,
                    position: results[0].geometry.location
                });
            }
        });

        var mapCanvas = map_content_obj.get(0);
        var mapOptions = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: zoom,
            mapTypeId: google.maps.MapTypeId[map_type],
            scrollwheel: false,
            zoomControl: true,
            panControl: true,
            scaleControl: true,
            streetViewControl: false,
            overviewMapControl: true,
            disableDoubleClickZoom: false
        }
        map = new google.maps.Map(mapCanvas, mapOptions)
    }

    $(window).bind('load resize', function() {
        $('.google-map-container').each(function() {
            var element = $(this);
            var map_content = $(this).find('> div');
            var address = element.data('address');
            var zoom = element.data('zoom');
            var map_type = element.data('map_type');
            var title = element.data('title');
            ftc_googlemap_start_up(map_content, address, zoom, map_type, title);
        });
    });


    $('.ftc-product-items-widget.ftc-slider').each(function() {
        var nav = $(this).data('nav') == 1;
        var auto_play = $(this).data('auto_play') == 1;
        var columns = $(this).data('columns');
        var margin = $(this).data('margin');

        $(this).owlCarousel({
            loop: true,
            items: 1,
            nav: nav,
            navText: [, ],
            dots: false,
            navSpeed: 1000,
            slideBy: 1,
            rtl: $('body').hasClass('rtl'),
            navRewind: false,
            columns: columns,
            margin: margin,
            autoplay: auto_play,
            autoplayTimeout: 5000,
            responsiveRefreshRate: 1000,
            responsive: {
                0: {
                    items: columns
                }
            }
        });
    });

    function ftc_update_information_tini_wishlist() {
        if (typeof ftc_shortcode_params.ajax_uri == 'undefined') {
            return;
        }
        var wishlist = jQuery('.ftc-my-wishlist');
        if (wishlist.length == 0) {
            return;
        }

        wishlist.addClass('loading');
        jQuery.ajax({
            type: 'POST',
            url: ftc_shortcode_params.ajax_uri,
            data: { action: 'update_tini_wishlist' },
            success: function(response) {
                var first_icon = wishlist.children('i.fa:first');
                wishlist.html(response);
                if (first_icon.length > 0) {
                    wishlist.prepend(first_icon);
                }
                wishlist.removeClass('loading');
            }
        });
    }
    $('body').bind('added_to_wishlist', function() {
        ftc_update_information_tini_wishlist();
        $('.yith-wcwl-wishlistaddedbrowse.show, .yith-wcwl-wishlistexistsbrowse.show').closest('.yith-wcwl-add-to-wishlist').addClass('added');
    });
    $(document).on('click', '#yith-wcwl-form table tbody tr td a.remove, #yith-wcwl-form table tbody tr td a.add_to_cart_button', function() {
        var old_num_product = $('#yith-wcwl-form table tbody tr[id^="yith-wcwl-row"]').length;
        var count = 1;
        var time_interval = setInterval(function() {
            count++;
            var new_num_product = $('#yith-wcwl-form table tbody tr[id^="yith-wcwl-row"]').length;
            if (old_num_product != new_num_product || count == 20) {
                clearInterval(time_interval);
                ftc_update_information_tini_wishlist();
            }
        }, 500);
    });

    function ftc_quickshop_process_action() {
        jQuery('a.quickview').prettyPhoto({
            deeplinking: false,
            opacity: 0.9,
            social_tools: false,
            default_width: 900,
            default_height: 450,
            theme: 'pp_woocommerce',
            changepicturecallback: function() {
                jQuery('.pp_inline').find('form.variations_form').wc_variation_form();
                jQuery('.pp_inline').find('form.variations_form .variations select').change();
                jQuery('body').trigger('wc_fragments_loaded');

                jQuery('.pp_inline .variations_form').on('click', '.reset_variations', function() {
                    jQuery(this).closest('.variations').find('.ftc-product-attribute .option').removeClass('selected');
                });

                jQuery('.pp_woocommerce').addClass('loaded');

                var _this = jQuery('.ftc-quickshop-wrapper .images-slider-wrapper');

                if (_this.find('.image-item').length <= 1) {
                    return;
                }

                var owl = _this.find('.image-items').owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    navText: [, ],
                    dots: false,
                    navSpeed: 1000,
                    slideBy: 1,
                    rtl: jQuery('body').hasClass('rtl'),
                    margin: 10,
                    navRewind: false,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: false,
                    autoplaySpeed: false,
                    mouseDrag: true,
                    touchDrag: true,
                    responsiveBaseElement: _this,
                    responsiveRefreshRate: 1000,
                    onInitialized: function() {
                        _this.addClass('loaded').removeClass('loading');
                    }
                });

            }
        });

    }
    ftc_quickshop_process_action();

    function ftc_off_canvas_cart() {
        var body = $('body');
        body.on("click", ".cart-item-canvas", function(t) {
            t.preventDefault();
            if (body.hasClass('cart-canvas')) {
                body.removeClass('cart-canvas');
            } else {
                body.addClass('cart-canvas');
            }
        });
        body.on("click", ".close-cart", function(t) {
            if (body.hasClass('cart-canvas')) {
                body.removeClass('cart-canvas');
            }
        });
        body.on("click", ".ftc-close-popup", function(t) {
            body.removeClass('cart-canvas');
        });
        if ($(".ftc_cart").hasClass('cart-item-canvas')) {
            $('body').on('added_to_cart', function(event, fragments, cart_hash) {
                body.addClass('cart-canvas');
            });
            var height_canvas = $('ul.woocommerce-mini-cart.cart_list.product_list_widget').height();
            var height_window = $(window).height();
            var width_wd = $(window).width();
            
        }
    }
    ftc_off_canvas_cart();

    


    $(document).ready(function() {
        if($('.wcvendors_sold_by_in_loop').length){
           $('.product .item-description').addClass('wc-vendor');      
        }

    });
     $(document).ready(function() {
        if($('.page-container .ftc-sidebar#left-sidebar').length){
            $('.page-container').find('.pv_shop_description').addClass('col-md-9');
        }
     });
     $(document).ready(function() {
        if($('.page-container .ftc-sidebar#right-sidebar').length){
            $('.page-container').find('.pv_shop_description').addClass('col-md-12');
        }
     });
    /* Single Product - Variable Product options */
$(document).on('click', '.variations_form .ftc-product-attribute .variation-product__option a', function(){
    var _this = $(this);
    var val = _this.closest('.variation-product__option').data('variation');
    var selector = _this.closest('.ftc-product-attribute').siblings('select');
    if( selector.length > 0 ){
        if( selector.find('option[value="' + val + '"]').length > 0 ){
            selector.val(val).change();
            _this.closest('.ftc-product-attribute').find('.variation-product__option').removeClass('selected');
            _this.closest('.variation-product__option').addClass('selected');
        }
    }
    return false;
});

$('.variations_form').on('click', '.reset_variations', function(){
    $(this).closest('.variations').find('.ftc-product-attribute .variation-product__option').removeClass('selected');
});






})(jQuery);