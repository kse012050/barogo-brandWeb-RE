$(document).ready(function(){
    $(window).scroll(function(){
        ($(window).scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active')
    })

    // 슬라이더
    $('*').hasClass('mySwiper') && swiperSlider();
    $('*').hasClass('mainPage') && fullPage();
});

function swiperSlider(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        slidesPerView: 2,
    });
}

function fullPage(){
    $('body').css('overflow','hidden');
    $('[data-scroll="fullPage"] > *').on('mousewheel',function(e){
        let delta = e.originalEvent.wheelDelta;
        let scrollTopValue;
        let target = $(this).find('[data-scroll="target"]');
        let targetLi = [];
        let targetIdx;
        let targetLength;
        target.each(function(i){
            targetLi.push(target.eq(i).find('li'))
        })
        targetLi.length > 0 && (targetLength = targetLi[0].length);
        
        targetLi.map(function(list){
            list.each(function(i){
                list.eq(i).hasClass('active') && (targetIdx = i);
            })
        })
        if(delta > 0 && targetIdx > 0){
            targetIdx--;
            targetLi.map((t)=>{
                t.removeClass('active');
                t.eq(targetIdx).addClass('active');
            })
            return
        }else if(delta < 0 && targetIdx < (targetLength - 1)){
            targetIdx++;
            targetLi.map((t)=>{
                t.removeClass('active');
                t.eq(targetIdx).addClass('active');
            })
            return;
        }

        if(delta > 0 && (targetIdx == 0 || targetIdx == undefined)){
            // 휠을 위로
            scrollTopValue = $(this).prev().offset().top;
        }else if(targetIdx == (targetLength - 1) || targetIdx == undefined){
            // 휠을 아래로
            scrollTopValue = $(this).next().offset().top;
        }
        $('html').stop().animate({scrollTop : scrollTopValue});
    })
}