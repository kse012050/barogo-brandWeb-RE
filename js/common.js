$(document).ready(function(){
    $(window).scroll(function(){
        ($(window).scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active')
    })

    // 슬라이더
    $('*').hasClass('mySwiper') && swiperSlider();

    // 풀페이지
    $('[data-scroll="fullPage"]').length > 0 && fullPage();

    // 회사소개 스크롤 이벤트
    $('[data-scroll="area"]').length > 0 && scrollFix();
});

function swiperSlider(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        slidesPerView: 2,
    });
}

function fullPage(){
    $('body').css('overflow','hidden');
    let scrollAniBool = true;
    $('[data-scroll="fullPage"] > *').on('mousewheel',function(e){
        if($('html').is(':animated') || $('.progressBar span').is(':animated')) return
        let delta = e.originalEvent.wheelDelta;
        let scrollTopValue;
        let target = $(this).find('[data-scroll="target"]');
        let targetLi = [];
        let targetIdx;
        let targetLength;
        let progress = $(this).find('.progressBar');
        target.each(function(i){
            targetLi.push(target.eq(i).find('li'))
        })
        targetLi.length > 0 && (targetLength = targetLi[0].length);
        
        targetLi.map(function(list){
            list.each(function(i){
                list.eq(i).hasClass('active') && (targetIdx = i);
            })
        })

        if(delta > 0){
            // 휠을 위로
            (targetIdx > 0) ? scrollAniBool = targetActive(targetLi, --targetIdx , progress) : (scrollTopValue = $(this).prev());
        }else{
            // 휠을 아래로
            (targetIdx < (targetLength - 1)) ? scrollAniBool = targetActive(targetLi, ++targetIdx , progress) : (scrollTopValue = $(this).next());
        }
        scrollAniBool ? scrollAni(scrollTopValue) : 
        setTimeout(()=>{
            scrollAniBool = !scrollAniBool;
        },500);
    })

    function scrollAni(scrollTopValue){
        scrollTopValue.addClass('active').siblings().removeClass('active');
        $('html').stop().animate({scrollTop : scrollTopValue.offset().top} , 500)
    }

}

function targetActive(list , idx , progress){
    progress.find('span').animate({'top':progress.height()  / list[0].length * idx} , 500 , 'linear')
    list.map((t)=>{
        t.eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().animate({opacity : 0} , 500).removeClass('active');
    })
    return false;
}

function scrollFix(){
    $('body').css('overflow','hidden');
    $('[data-scroll="wrap"] > .scrollArea').scroll(function(){
        $(this).scrollTop() > 0 ? $('header').addClass('active') : $('header').removeClass('active');
    })

    $('[data-scroll="area"]').on('mousewheel',function(e){
        if($('.progressBar span').is(':animated')) {
            e.preventDefault()
            return
        }
        let delta = e.originalEvent.wheelDelta;
        let target = $(this).find('[data-scroll="target"]');
        let targetLi = [];
        let targetIdx;
        let targetLength;
        let progress = $(this).find('.progressBar');
        target.each(function(i){
            targetLi.push(target.eq(i).find('li'))
        })
        targetLi.length > 0 && (targetLength = targetLi[0].length);
        
        targetLi.map(function(list){
            list.each(function(i){
                list.eq(i).hasClass('active') && (targetIdx = i);
            })
        })
        if(delta > 0){
            // 휠을 위로
            if($('.aboutUsPage').scrollTop() == 0){
                if(targetIdx > 0){
                    e.preventDefault();
                    scrollAniBool = targetActive(targetLi, --targetIdx , progress)
                }else{
                    $('main').removeClass('active');
                    $('.scrollArea').removeClass('active');
                }
            }
        }else{
            // 휠을 아래로
            if(targetIdx < (targetLength - 1) && Math.floor($('.scrollArea > div').height() - $('.scrollArea').height()) <= $('.scrollArea').scrollTop()){ 
                e.preventDefault();
                scrollAniBool = targetActive(targetLi, ++targetIdx , progress)
            }else if(targetIdx == (targetLength - 1)){
                $('main').addClass('active');
                $('.scrollArea').addClass('active');
            }
        }
    })


    $('[data-scroll="wrap"]').scroll(function(){
        $('[data-scroll="fixed"]').each(function(){
            let fixedHeight = $(this).height();
            if($(this).offset().top < $(this).find('[data-scroll="target2"]').innerHeight() - fixedHeight){
                $(this).find('[data-scroll="target2"]').css({
                    'position' : 'absolute',
                    'top' :fixedHeight - $(this).find('[data-scroll="target2"]').innerHeight()
                });
            }else if($(this).offset().top < 0){
                $(this).find('[data-scroll="target2"]').css({
                    'position' : 'fixed',
                    'top' : 0
                });
            }else{
                $(this).find('[data-scroll="target2"]').css({
                    'position' : 'absolute',
                    'top' : 0
                });
            }

        })
    })

    $('.yearArea li').click(function(){
        // $(this).addClass('active').siblings().removeClass('active');
        let liHeight = 0;
        for(let a = 0; a < $(this).index(); a++){
            liHeight += $('.monthArea > li').eq(a).outerHeight(true)
        }
        $('[data-scroll="wrap"]').animate({scrollTop : 
            $('.scrollArea').outerHeight(true) + $('.numberArea').outerHeight(true) + parseInt($('.monthArea').css('padding-top')) + liHeight
        })
        
    })
    let liHeightArray = [
        $('.scrollArea').outerHeight(true) + $('.numberArea').outerHeight(true) + parseInt($('.monthArea').css('padding-top')),
        $('.scrollArea').outerHeight(true) + $('.numberArea').outerHeight(true) + parseInt($('.monthArea').css('padding-top')) + $('.monthArea > li').eq(0).outerHeight(true),
        $('.scrollArea').outerHeight(true) + $('.numberArea').outerHeight(true) + parseInt($('.monthArea').css('padding-top')) + $('.monthArea > li').eq(0).outerHeight(true) + $('.monthArea > li').eq(1).outerHeight(true)
    ];
    $('[data-scroll="wrap"]').scroll(function(){
        let test = $(this).scrollTop();
        liHeightArray.map(function(a , i){
            if(test > a - 10){
                $('.yearArea li').eq(i).addClass('active').siblings().removeClass('active');
            }
        })
    })

}