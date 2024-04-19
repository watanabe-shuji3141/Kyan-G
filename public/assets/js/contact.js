$(function(){
    $('#Navber').addClass('d-none').removeClass('navbar-collapse ');
    $('.navbar-toggler').addClass('d-none');
});

$(function(){
    $('#start_day').on('input',function(){
        var start_day = $(this).val();
        $(this).attr('data-original-title',start_day);
    });
    $('#end_day').on('input',function(){
        var end_day = $(this).val();
        $(this).attr('data-original-title',end_day);
    });
});

$(function() {
    function toggle_contacts(){
        var val = $('[name=contacts]').val();
        if (val == 0) {     //　予約
            $('label[for="contents"]').parent().addClass('d-none');
            // $('label[for="tel"]').parent().removeClass('d-none');
            $('label[for="pref31"]').parent().removeClass('d-none');
            $('label[for="addr31"]').parent().removeClass('d-none');
            $('label[for="ges"]').parent().removeClass('d-none');
            $('label[for="zip"]').parent().removeClass('d-none');
            $('label[for="ges"]').parent().removeClass('d-none');
            $('label[for="stay-day"]').parent().removeClass('d-none');
            $('[name="addr31"]').attr('required',true);

        }else if(val == 1){     // お問い合わせ
            $('label[for="contents"]').parent().removeClass('d-none');
            // $('label[for="tel"]').parent().addClass('d-none');
            $('label[for="pref31"]').parent().addClass('d-none');
            $('label[for="addr31"]').parent().addClass('d-none');
            $('label[for="ges"]').parent().addClass('d-none');
            $('label[for="zip"]').parent().addClass('d-none');
            $('label[for="ges"]').parent().addClass('d-none');
            $('label[for="stay-day"]').parent().addClass('d-none');
            $('[name="addr31"]').attr('required',false);
        }
    }
    $('[name=contacts]').change(toggle_contacts);
    $(window).load(toggle_contacts);
});

$(function() {
    $(".stay-day").on('change',function(){
        var start_day = $('[name="start_day"]').val();
        var end_day = $('[name="end_day"]').val();
        start_day = new Date(start_day);
        end_day = new Date(end_day);
        if (start_day.getTime() > end_day.getTime()) {
            $("button[type='submit']").css("pointer-events","none");
            $("button[type='submit']").parent().attr('data-original-title','宿泊予定日の入力が間違っています');
        }else{
            $("button[type='submit']").css("pointer-events","");
            $("button[type='submit']").parent().attr('data-original-title','');
        }
    });
});
