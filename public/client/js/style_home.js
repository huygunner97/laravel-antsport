// slide show
$(document).ready(function() {
    var slide = new Array();
    slide[0] = "public/images/slider_1.jpg";
    slide[1] = "public/images/slider_2.jpg";
    var n = 1;
    setInterval(function() {
        $("#slide-images").fadeOut(function(){
            $("#slide-images").attr("src", slide[n]);
            $("#slide-images").fadeIn();
            n++;
            if (n == slide.length){
                n = 0;
            }
        });
    },5000);
});

//  loadmore
$(document).ready(function(){
    $("#loadmore").click(function(){
        $(".showmore").hide();
        $(".loader").show();
        setTimeout(function(){
            $.ajax({
                url : 'http://localhost/sport-project/laravel/api',
                type : 'get',
                dataType : 'json',
                success : function (result){
                    var html = '';
                    $.each (result, function (key, item){
                        html += '<div class="detail">';
                            html += '<a href="chi-tiet/'+item['pk_product_id']+'/'+item['c_name']+'">';
                                html += '<div class="products-background">'
                                    html += '<img src="public/upload/product/'+item['c_img']+'">';
                                html += '</div>';
                                html += '<div class="products-description">';
                                    html += ' <div class="description" title="'+item['c_name']+'">'+item["c_name"]+'</div>' ;
                                    html += '<div class="price">'+item["c_price"]+'₫</div>';
                                    html += '<div class="hidden">';
                                        html += '<i class="fas fa-share"></i>&nbsp;Chi Tiết';
                                        html += '<i class="far fa-heart" style="float: right;"></i>';
                                    html += '</div>';
                                html += '</div>';  
                            html += '</a>'; 
                        html += '</div>';
                    });
                    $("#product_loadmore").append(html);
                    $(".detail:gt(7)").hide();
                    $(".detail:gt(7)").fadeIn();
                }
            });
            $(".loader").fadeOut();
        },1500)
    })
});

// owlCarousel
$(document).ready(function(){
    $('#hot-products').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('#main_introduct').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('#news').owlCarousel({
        loop:false,
        margin:30,
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