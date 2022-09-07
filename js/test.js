$(document).ready(function(){

    // 공통
    common()

    

    
    // 라이더 페이지
    $('.riderPage').length > 0 && riderPage();

    // 허브 창업 페이지
    $('.foundedPage').length > 0 && foundedPage();

    // 풀페이지
    $('[data-scroll="fullPage"]').length > 0 && fullPage();


   
    
    

    

    
    
    
    
    function common(){
        // 인트로
        $('*').hasClass('introBox') && introAni();

        // 반응형 로고
        resizeLogo()
        $(window).resize(function(){
            resizeLogo()
        })

        // 스크롤 공통
        $(window).scroll(function(){
            // 스크롤시 해더
            scrollHeader();
        })

        $('.bottomSlider').length > 0 && bottomSlider();


        /* ! 함수 생성 */
        // 인트로
        function introAni(){
            let introDuration = 1.3;
            let introDelay = 1;
            $('.introBox .BG').css({
                'animationDuration' : introDuration + 's',
                'animationDelay' : introDelay + 's'
            });
            $('.introBox .textArea span').css('animationDelay' , introDelay + 's');
            $('.introBox .textArea span').eq(0).css('animationDuration' , + introDuration / 3 + introDuration / 10 +'s')
            $('.introBox .textArea span').eq(1).css('animationDuration' , + introDuration / 2 +'s')
            $('.introBox .textArea span').eq(2).css('animationDuration' , + introDuration / 3 * 2 +'s')
            $('.introBox .BG').on('animationend', function(){
                $('.introBox').css('display','none')
            })
        }   /* 인트로 fin */

        // 스크롤시 해더
        function scrollHeader(){
            ($(window).scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active');
        }   /* 스크롤시 해더 fin */

        // 반응형 로고
        function resizeLogo(){
            $(window).width() < 1450 ? $('header h1').addClass('active') : $('header h1').removeClass('active');
        }   /* 반응형 로고 fin */
        
        // 하단 슬라이더
        function bottomSlider(){
            var swiper = new Swiper(".bottomSlider", {
                slidesPerView: "auto",
                slidesPerView: 2,
            });
        }
    }   /* common fin */



    // 라이더 전용
    function riderPage(){
        // 시간 넣기
        for(let a = 1; a <= 24; a++){
            $('[data-date="hour"]').append('<li class="FC-01">'+a+'</li>')
        }
        // 일 넣기
        for(let a = 1; a <= 7; a++){
            $('[data-date="week"]').append('<li class="FC-01">'+a+'</li>')
        }
        // 배경 클릭시 닫기
        $('.revenueArea').click(function(){
            $('[data-click="drop"] + div').stop().slideUp();
        })

        // 드랍 목록 스크롤 만들기 변수
        let dropHeight = $('[data-click="drop"] + div').height();
        let dropTotitleHeight;
        // 클릭시 목록 나오기
        $('[data-click="drop"]').click(function(e){
            e.stopPropagation();
            $('[data-click="drop"] + div').stop().slideUp();
            $(this).next('div').stop().slideToggle();
            dropTotitleHeight = $(this).next('div').find('li').height() * $(this).next('div').find('li').length;
            $(this).next('div').children('.progressBar').css('height',(dropHeight / dropTotitleHeight * 100) + '%')
        })
        // 목록 클릭시 값 변경
        $('[data-click="drop"] + div li').click(function(e){
            console.log(e);
            $(this).parent().parent().stop().slideUp();
            $(this).parent().parent().prev().html($(this).html())
            $('#revenue').text($('[data-date="hour"]').parent().prev().text() * $('[data-date="week"]').parent().prev().text() * 8095)
            eventAni($(this).parents('[data-eventAni="count"]'));
        })
        // 목록위에서 스크롤 막기
        $('[data-click="drop"] + div').on('mousewheel',function(e){
            e.stopPropagation();
        })
        // 드랍 목록 스크롤 움직이기
        $('[data-click="drop"] + div ul').scroll(function(){
            $(this).prev().css('top',($('[data-click="drop"] + div ul').scrollTop() / dropTotitleHeight) * 100 + '%');
        })
    }   /* 라이더 전용 fin */

    // 허브 창업 전용
    function foundedPage(){
        var swiper = new Swiper(".foundedSlider", {
            direction: "vertical",
            slidesPerView: 5,
            spaceBetween: 12,
            autoplay: {
                delay: 1000,
            },
            loop: true
        });
    }   /* 허브 창업 전용 fin */


    // 풀페이지
    function fullPage(){
        $('body').css('overflow','hidden');
    
        let fullPageList = $('[data-scroll="fullPage"] > *');
        let idx = 0;
        fullPageList.on('mousewheel',function(e){
            if($('html').is(':animated')) return;
            let delta = e.originalEvent.wheelDelta;
            let targetArea = $(this);
            let nextTarget;
            
            // 해당 영역에 투명도 이벤트가 있을 때
            if(targetArea.attr('data-scrollAni')){
                if(scrollAni(targetArea , delta)){
                    return; 
                }
            }

            // 풀페이지 이동 넘버 설정
            if(delta > 0 && 0 < idx){
                nextTarget = $(this).prev();
                idx--;
            }else if(delta < 0 && idx < fullPageList.length - 1){
                nextTarget = $(this).next();
                idx++;
            }

            // 라이더 페이지 풀페이지 이동 했을 때
            if(nextTarget && nextTarget.attr('data-eventAni')){
                eventAni(nextTarget , delta)
            }

    
            fullPageAni(fullPageList.eq(idx))
        })
    
        function fullPageAni(nextTarge){
            nextTarge.addClass('active').siblings().removeClass('active');
            $('html').stop().animate({scrollTop : nextTarge.offset().top} , 500)
        }
    } /* 풀페이지 fin */
    
    
})  /* document ready fin */


let aniBreak = false;
function scrollAni(targetArea , delta){
    if(aniBreak) return true;
    aniBreak = !aniBreak;
    setTimeout(()=>{
        aniBreak = !aniBreak;
    }, 1000)


    let target = targetArea.find('[data-scroll="target"]');
    let targetList =[]
    let idx;
    target.each(function(){
        targetList.push($(this).children('li'));
    })
    targetList[0].each(function(i){
        targetList[0].eq(i).hasClass('active') && (idx = i);
    })
    if(delta > 0 && idx > 0){
        idx--;
    }else if(delta < 0 && idx < targetList[0].length - 1){
        idx++;
    }else{
        return false;
    }
 

    targetArea.attr('data-scrollAni') == 'opacity' && opacityAni(targetList , idx, targetArea.find('.progressBar'));
    targetArea.attr('data-specialAni') == 'bike' && bikeAni(targetArea , idx);
    return true;

    // 투명도 효과
    function opacityAni(list , idx , progress){
        if(progress.find('span').is(':animated')) return;
        progress.find('span').animate({'top':progress.height()  / list[0].length * idx} , 500 , 'linear')
        list.map((t)=>{
            t.eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().animate({opacity : 0} , 500).removeClass('active');
        })
    } // 투명도 효과 fin
    

    function bikeAni(targetArea , idx){
        targetList = targetArea.find('[data-special="target"]')
        /* 바이크 이미지 */
        let targetRight = -(parseInt($('.CW').css('margin-right')) + targetList.width() - 50);
        /* 바이크 위치 */

        if(idx == 0){
            targetList.css('right',targetRight)
        }else if(idx == 1 ){
            targetList.css('right',targetRight / 2)
        }else{
            targetList.css('right',0)
        }
    }
}

function eventAni(t){
    let target = t.find('[data-eventAni="target"]');

    t.attr('data-eventAni') == 'count' && countAni(target , true);

    function countAni(list , decimal){
        const countOptions = {
            useEasing :true,
            separator : ",",
            decimal : decimal ? "," : '',
        };
        list.each(function(){
            var result = $(this).text().replace(/[^0-9]/g, "");	
            let count;
            let currnetCount = $(this).attr('data-currnetCount');
            if(currnetCount){
                $(this).attr('data-currnetCount').replace(/[^0-9]/g, "");
            }else{
                currnetCount = '';
                for(let a = 0; a < result.length; a++){
                    currnetCount += '0'
                }
            }
            if($(this).attr('data-currnetCount')){
                count = new CountUp($(this).attr('id'),currnetCount, result, 0, 2, countOptions);
            }else{
                count = new CountUp($(this).attr('id'),0000, result, 0, 2, countOptions);
            }
            count.start();
        });
    }
}

