// hover menu
var item = document.getElementsByClassName("item");
var i;
for (i =0; i< item.length; i++) {
    item[i].addEventListener("mouseover", function() {
        document.getElementById("opacity").style.display = "block";
    });
    item[i].addEventListener("mouseout", function() {
        document.getElementById("opacity").style.display = "none";
    });
}


// menu - responsive
function openNav() {
    document.getElementById("mySidenav").style.left = "0%";
    document.getElementById("opacity-responsive").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-75%";
    document.getElementById("opacity-responsive").style.display = "none";
}

$(document).ready(function(){
    $('.dropdown-btn').click(function(){
        $(this).next().slideToggle(300);
    });
    $('.dropdown-btn-footer').click(function(){
        $(this).next().slideToggle(300);
        $(this).children('#down').toggle();
        $(this).children('#up').toggle();
    });
});

// scroll to top
var scrollTopButton = document.getElementById("scroll-top");
var html = document.documentElement;

window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopButton.style.display = "block";
    } else {
        scrollTopButton.style.display = "none";
    }
};
scrollTopButton.onclick = function() {
    var timeLeft = html.scrollTop/20;
    var scrollByPixel = setInterval(function () {
        var percentSpent = (html.scrollTop/20 - timeLeft) / (html.scrollTop/20);
        if (timeLeft >= 0 ) {
            var newScrollTop = html.scrollTop * (1 - Math.pow(percentSpent, 5));
            html.scrollTop = newScrollTop;
            timeLeft--;
        }
        else if (timeLeft <= 0 && html.scrollTop >0){
            html.scrollTop=0;
        } 
        else {
            clearInterval(scrollByPixel);
        }
    }, 1);
}

// show extra img of product when hover

// $(function(){
//     $('.detail').mouseenter(function(){
//         $(this).find('.img').hide();
//         $(this).find('.img-extra').fadeIn(600);
//     });
//     $('.detail').mouseleave(function(){
//         $(this).find('.img').show();
//         $(this).find('.img-extra').hide();
//     });
//     $('.detail-hot').mouseenter(function(){
//         $(this).find('.img').hide();
//         $(this).find('.img-extra').fadeIn(600);
//     });
//     $('.detail-hot').mouseleave(function(){
//         $(this).find('.img').show();
//         $(this).find('.img-extra').hide();
//     });
// });

$(function(){
    $('#footer-banner').owlCarousel({
        loop:false,
        autoplay:false,
        margin:30,
        nav:false,
        responsive:{
            0:{
                items:1,
                loop:true,
                autoplay:true,
                autoTimeout:5000,
            },
            600:{
                items:2,
                loop:true,
                autoplay:true,
                autoTimeout:5000,
            },
            1000:{
                items:3
            }
        }
    });
});