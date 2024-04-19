$(function(){
    $('.slider').slick({
        autoplay:true,
        autoplaySpeed:4000,
        cssEase: 'linear',
        speed:1500,
        dots:false,
        fade:true,
        touchMove:false,
        draggable:false,
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false
    });
});

$(function(){
    $(".carousel-control-prev").addClass("d-none");
    $(".num1").addClass("table-info");
    $(".num2").addClass("table-success");
    $(".num0").addClass("table-danger");
    $(".num3").addClass("table-secondary");
});

$(function(){
    $("input[type='submit']").click(function(){
        $("input[name='reserve_month']").val($(this).data('month'));
    });
    $(".carousel-control-next").click(function(){
        $(".carousel-control-prev").removeClass("d-none");
        $(this).addClass("d-none");
    });
    $(".carousel-control-prev").click(function(){
        $(".carousel-control-next").removeClass("d-none");
        $(this).addClass("d-none");
    });
});


$(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$(function(){
    if($('.facility').length){    
        var facility = $(".facility").offset().top;
        var charge = $(".charge").offset().top;
        var reserve = $(".reserve").offset().top;
        var speed = 800;
        $(".facility-btn").click(function () {
            facility = facility - 75;
            $("html,body").animate({scrollTop:facility},speed);
        });    
        $(".charge-btn").click(function () {
            charge = charge - 75;
            $("html,body").animate({scrollTop:charge},speed);
        });
        $(".reserve-btn").click(function () {
            reserve = reserve - 75;
            $("html,body").animate({scrollTop:reserve},speed);
        });
    }
});

