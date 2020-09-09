$(document).ready(function () {

    // selecte slider owlCarousel
    $('.selected-product.owl-carousel').owlCarousel({
        loop: true,
        margin: 2,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 4
            }
        }
    })

    // products in today owlCarousel
    $('.product-in-today.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 4
            }
        }
    })
});
