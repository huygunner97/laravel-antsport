
$(function(){
    $('#main-category').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            700:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});

$(function(){
    $('.owl-hot-product').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            700:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});

$(function(){
    $('.hot-product-tab').each(function() {
        if (!$(this).hasClass('has-content')) {
            $(this).hide();
        }
    });

    $('.tabs-link').click(function(){
        var tabs_link = $(this);
        var data_tab = $(this).attr('data-tab');
        $('.tabs-link').each(function(){
            if ($(this).hasClass('current')) {
                $(this).removeClass('current');
            }
        });
        $(this).addClass('current');

        $('.hot-product-tab').each(function() {
            if ($(this).attr('id') == data_tab){
                if (!$(this).hasClass('has-content')) {
                    $('.hot-product-tab').each(function() {
                        $(this).hide();
                        if ($(this).hasClass('has-content')) {
                            $(this).removeClass('has-content');
                        }
                    });
                    $(this).fadeIn('500');
                    $(this).addClass('has-content');
                }
            }
        });
    });
});

$(function(){
    $('.owl-news').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});
