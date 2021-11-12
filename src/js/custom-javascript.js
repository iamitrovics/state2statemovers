(function ($) {
    jQuery(document).ready(function () {
        
        setTimeout(function () {
            $(".page-wrapper").css({
                "padding-top": $("#header").height()
            });
        }, 600);

        $('#cookie-notice').addClass('slide-up');

        $('#close-notice, #accept-cookie').click(function (e) {
            e.preventDefault();
            $("#cookie-notice").removeClass("slide-up");
            $("#cookie-notice").addClass("slide-down");
        });

        // new $.Zebra_Tooltips($('.zebra_tooltips_below'), {
        //     max_width: 500,
        //     position: 'below'
        // });

        /* jQuery(".default-accordion").accordion({
             heightStyle: "content",
             header: "h4",
             autoHeight: false,
             clearStyle: true,
             active: false,
             collapsible: true,
         });*/

        $(".default-accordion .faq-box > h4").on("click", function (e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                    .siblings(".default-accordion .faq-box div")
                    .slideUp(200);
            } else {
                $(".default-accordion .faq-box > h4").removeClass("active");
                $(this).addClass("active");
                $(".default-accordion .faq-box div").slideUp(200);
                $(this)
                    .siblings(".default-accordion .faq-box div")
                    .slideDown(200);
            }
            e.preventDefault();
        });

        // Sticky header
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 60) {
                $('#menu_area').addClass("sticky");
            } else {
                $('#menu_area').removeClass("sticky");
            }
        });

        // desktop multilevel menu
        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass("show");
            });
            return false;
        })

        // mobile multilevel menu
        $("#menu").slidingMenu();

        jQuery("#mobile-menu--btn").click(function () {
            jQuery(".menu-overlay").addClass("active-overlay");
            jQuery("html,body").addClass("fixed");
            jQuery('.main-menu-sidebar').addClass("menu-active");
        });

        jQuery('.main-menu-sidebar .close-menu-btn, .menu-overlay').click(function () {
            jQuery('.main-menu-sidebar').removeClass("menu-active");
            jQuery("html,body").removeClass("fixed");
            jQuery(".menu-overlay").removeClass("active-overlay");
        });

        // $('#city-gallery-slider [data-fancybox="city-gal"]').fancybox();
        //$('#gallery-photos [data-fancybox="gallery"]').fancybox();

        $(".get-quote--tabs a").click(function (e) {
            var isActive = $(this).hasClass('active');
            $('.active').removeClass('active');
            if (!isActive) {
                $(this).addClass('active');
            }
        });
        $("#homeqq").click(function () {
            $(".homeqq").show();
            $(this).addClass("active");
            $(".carqq").hide();
        });
        $("#carqq").click(function () {
            $(".carqq").show();
            $(".homeqq").hide();
        });

        //scroll to anchored
        $(document).on('click', '#faq-page #faq-questions ul li a', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 110
            }, 500);
        });

        // date picker
        $(".quote-form .calendar input[type=text]").datepicker({
            minDate: '0'
        });

        $(".date-input").datepicker({
            minDate: '0'
        });


        $(function () {

            var date1 = new Date('05/05/2021');
            var date2 = new Date('05/20/2021');

            var date3 = new Date('06/05/2021');
            var date4 = new Date('06/20/2021');

            var date5 = new Date('07/05/2021');
            var date6 = new Date('07/20/2021');

            $(".date-picker-input").datepicker({
                minDate: '0',
                showOtherMonths: true,
                selectOtherMonths: true,


                beforeShowDay: function (date) {
                    var highlight = date >= date1 && date <= date2
                    var highlight2 = date >= date3 && date <= date4
                    var highlight3 = date >= date5 && date <= date6
                    if (highlight || highlight2 || highlight3) {
                        return [true, "event", 'Tooltip text'];
                    } else {
                        return [true, '', ''];
                    }
                }

            });

        });

        $('.date-picker-input').on('click', function (e) {
            e.preventDefault();
            $(this).attr("autocomplete", "off");
        });

        $(".date-picker-input").attr("autocomplete", "off");

        //toggle search
        $('#menu_area .navbar .top-search a').click(function () {
            $('#top-search-form').slideToggle();
        });

        $('#top-search-form .close-btn').click(function () {
            $('#top-search-form').slideUp();
        });

        //$('#category-page .category-box .category-content h2').matchHeight();

        $(function () {
            $('.quote-cta--single a.btn-cta').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        $('.blog-content-single a').attr("target", "_blank");

        // modal script
        setTimeout(function () {
            jQuery('.modal-overlay').addClass('show');
        }, 1000);
        $('.toggle-modal').click(function (e) {
            var myEm = $(this).attr('data-my-element');
            var modal = $('.modal-overlay[data-my-element = ' + myEm + '], .modal[data-my-element = ' + myEm + ']');
            e.preventDefault();
            modal.addClass('active');
            $('html').addClass('fixed');
        });
        $('.close-modal').click(function () {
            var modal = $('.modal-overlay, .modal');
            $('html').removeClass('fixed');
            modal.removeClass('active');
        });

        jQuery("#fixed-cta").hover(function () {
            jQuery(".menu-overlay").toggleClass("active-overlay--cta");
        });        

    });
})(jQuery);