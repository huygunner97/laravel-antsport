$(function(){
    $('.owl-footer').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
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

//opacity
$(function () {
    $('.nav-item').hover(function () {
        $('#opacity').css('display', 'block');
    }, function () {
        $('#opacity').css('display', 'none');
    })
});

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
        // $(this).next().slideToggle(300);
        $(this).children('.dropdown-container').slideToggle(300);
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
};

// login, signup
function openLogin() {
    $('#opacity-login').css('display', 'block');
    $('.login').css('display', 'block');
}
function closeLogin() {
    $('#opacity-login').css('display', 'none');
    $('.login').css('display', 'none');
}

function openSignup() {
    $('#opacity-login').css('display', 'block');
    $('.signup').css('display', 'block');
}
function closeSignup() {
    $('#opacity-login').css('display', 'none');
    $('.signup').css('display', 'none');
}

function openCheckout() {
    $('#opacity-login').css('display', 'block');
    $('.checkout').css('display', 'block');
}
function closeCheckout() {
    $('#opacity-login').css('display', 'none');
    $('.checkout').css('display', 'none');
}


$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.login').find('#submit').click(function (e) {
        e.preventDefault();
        var password = $('.login').find("input[name=password]").val();
        var email = $('.login').find("input[name=email]").val();
        $('.login').find('.err-email').html('');
        $('.login').find('.err-pass').html('');
        $.ajax({
            url : "http://localhost/sport-project/laravel-update/login-client",
            type : "post",
            dataType: 'json',
            data: {
                email:email, password:password,
            },
            success : function (data){
                var result = [];
                $.each(data, function (key, item) {
                    result[key] = item;
                })
                if (result['email']) {
                    var html ='';
                    $.each(result['email'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.login').find('.err-email').html(html);
                } else if (result['password']) {
                    var html ='';
                    $.each(result['password'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.login').find('.err-pass').html(html);
                }  else if (result['err-email']) {
                    var html ='';
                    $.each(result['err-email'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.login').find('.err-email').html(html);
                } else if (result['err-pass']) {
                    var html ='';
                    $.each(result['err-pass'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.login').find('.err-pass').html(html);
                }  else {
                    alert(result['ok']);
                    location.href = '';
                }
            }
        });
    })
});

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.signup').find('#submit').click(function (e) {
        e.preventDefault();
        var password = $('.signup').find("input[name=password]").val();
        var email = $('.signup').find("input[name=email]").val();
        var name = $('.signup').find("input[name=name]").val();
        var confirm = $('.signup').find("input[name=confirm]").val();
        var address = $('.signup').find("input[name=address]").val();
        var phone = $('.signup').find("input[name=phone]").val();

        $('.signup').find('.err-email').html('');
        $('.signup').find('.err-pass').html('');
        $('.signup').find('.err-confirm').html('');
        $('.signup').find('.err-name').html('');
        $('.signup').find('.err-address').html('');
        $('.signup').find('.err-phone').html('');

        $.ajax({
            url: "http://localhost/sport-project/laravel-update/signup-client",
            type: "post",
            dataType: 'json',
            data: {
                email: email, password: password, name: name, confirm: confirm, phone: phone, address: address
            },
            success: function (data) {
                var result = [];
                $.each(data, function (key, item) {
                    result[key] = item;
                })
                if (result['name']) {
                    var html ='';
                    $.each(result['name'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-name').html(html);
                } else if (result['email']) {
                    var html ='';
                    $.each(result['email'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-email').html(html);
                } else if (result['password']) {
                    var html ='';
                    $.each(result['password'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-pass').html(html);
                } else if (result['err-pass']) {
                    var html ='';
                    $.each(result['err-pass'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-confirm').html(html);
                } else if (result['address']) {
                    var html ='';
                    $.each(result['address'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-address').html(html);
                } else if (result['phone']) {
                    var html ='';
                    $.each(result['phone'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.signup').find('.err-phone').html(html);
                } else {
                    alert(result['ok']);
                    closeSignup();
                    openLogin();
                    $('.login').find("input[name=email]").attr('value', result['user']);
                    $('.login').find("input[name=password]").attr('value', result['pass']);
                }

            }
        });
    })
});

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.checkout').find('#submit').click(function (e) {
        e.preventDefault();
        var name = $('.checkout').find("input[name=name]").val();
        var address = $('.checkout').find("input[name=address]").val();
        var phone = $('.checkout').find("input[name=phone]").val();

        $('.checkout').find('.err-name').html('');
        $('.checkout').find('.err-address').html('');
        $('.checkout').find('.err-phone').html('');

        $.ajax({
            url: "http://localhost/sport-project/laravel-update/checkout",
            type: "post",
            dataType: 'json',
            data: {
                name: name, phone: phone, address: address
            },
            success: function (data) {
                var result = [];
                $.each(data, function (key, item) {
                    result[key] = item;
                });
                if (result['name']) {
                    var html ='';
                    $.each(result['name'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.checkout').find('.err-name').html(html);
                } else if (result['address']) {
                    var html ='';
                    $.each(result['address'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.checkout').find('.err-address').html(html);
                } else if (result['phone']) {
                    var html ='';
                    $.each(result['phone'], function (key, item) {
                        html += ''+item+'</br>';
                    });
                    $('.checkout').find('.err-phone').html(html);
                } else {
                    alert(result['ok']);
                    location.href = 'gio-hang';
                }
            }
        });
    })
});