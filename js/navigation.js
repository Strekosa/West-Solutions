/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
    const siteNavigation = document.getElementById('site-navigation');

    // Return early if the navigation doesn't exist.
    if (!siteNavigation) {
        return;
    }

    const button = siteNavigation.getElementsByTagName('button')[0];

    // Return early if the button doesn't exist.
    if ('undefined' === typeof button) {
        return;
    }

    const menu = siteNavigation.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    if (!menu.classList.contains('nav-menu')) {
        menu.classList.add('nav-menu');
    }

    // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
    button.addEventListener('click', function () {
        siteNavigation.classList.toggle('toggled');

        if (button.getAttribute('aria-expanded') === 'true') {
            button.setAttribute('aria-expanded', 'false');
        } else {
            button.setAttribute('aria-expanded', 'true');
        }
    });

    // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
    document.addEventListener('click', function (event) {
        const isClickInside = siteNavigation.contains(event.target);

        if (!isClickInside) {
            siteNavigation.classList.remove('toggled');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // Get all the link elements within the menu.
    const links = menu.getElementsByTagName('a');

    // Get all the link elements with children within the menu.
    const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // Toggle focus each time a menu link is focused or blurred.
    for (const link of links) {
        link.addEventListener('focus', toggleFocus, true);
        link.addEventListener('blur', toggleFocus, true);
    }

    // Toggle focus each time a menu link with children receive a touch event.
    for (const link of linksWithChildren) {
        link.addEventListener('touchstart', toggleFocus, false);
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        if (event.type === 'focus' || event.type === 'blur') {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains('nav-menu')) {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase()) {
                    self.classList.toggle('focus');
                }
                self = self.parentNode;
            }
        }

        if (event.type === 'touchstart') {
            const menuItem = this.parentNode;
            event.preventDefault();
            for (const link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove('focus');
                }
            }
            menuItem.classList.toggle('focus');
        }
    }
}());

document.addEventListener("DOMContentLoaded", function (event) {
    var selected = $('.drop-dl .current-lang img').attr('src');
    $('.lang-chose img').attr('src', selected);

    $('.lang-chose').click(function (event) {
        $('.drop-dl ul').slideToggle(500);
        event.preventDefault();
        return false;
    });

    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("drop-dl"))
            $(".drop-dl ul").hide();
    });
});

$(document).ready(function () {


    $('.nav-tgl').click(function (event) {
        $('.nav-tgl,.header-menu').toggleClass('active');
        $('body').toggleClass('lock');
    });


    $('.search .search-toggle').click(function (event) {
        event.preventDefault();
        if ($(this).parent().hasClass('open')) {
            $(this).parent().removeClass('open').find('.search-form').slideUp();
        } else {
            $(this).parent().addClass('open').find('.search-form').slideDown();
        }

    });


    //Accordion
    $('.accordion-list > li > .answer').hide();

    $('.accordion-list > li').click(function () {
        console.log()
        if ($(this).hasClass("active")) {
            $(this).removeClass("active").find(".answer").slideUp('slow');

        } else {
            $(".accordion-list > li.active .answer").slideUp('slow');
            $(".accordion-list > li.active").removeClass("active");
            $(this).addClass("active").find(".answer").slideDown();
        }
        return false;
    });

   // Counter
    var scrollCounter = true;

    function beginCount() {

        if ($('.counter').length) {
            var elementTop = $(".counter").offset().top;
            var elementBottom = elementTop + $(".counter").outerHeight();

            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            var isOnViewPort = elementBottom > viewportTop && elementTop < viewportBottom;

            if (scrollCounter === true && isOnViewPort) {
                console.log(555)
                $('.counter__value span:first-of-type').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
                scrollCounter = false;
            }
        }
    }


    $(window).on('scroll', function(e) {
        beginCount();
    });


    //Slider
    jQuery('.hero-slider').slick({

        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        customPaging: function (slider, i) {
            var title = $(slider.$slides[i]).data('title');
            return '<a> ' + title + ' </a>';
        },
        dots: true,
        responsive: [

            {
                breakpoint: 769,
                settings: {
                    dots: false,
                    arrows: true,

                }
            },
        ]

    });

})