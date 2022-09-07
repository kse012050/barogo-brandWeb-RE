$(document).ready(function(){
    logo()
    $(window).resize(function(){
        logo()
    })

    $('*').hasClass('introBox') && introAni();

    // 스크롤 공통
    $(window).scroll(function(){
        ($(window).scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active');
    })

    // 슬라이더
    $('*').hasClass('mySwiper') && swiperSlider();
    $('*').hasClass('foundedSlider') && test();

    // 풀페이지
    $('[data-scroll="fullPage"]').length > 0 && fullPage();

    // 라이더 지원
    $('*').hasClass('riderPage') && riderEvent()

    // 회사소개 스크롤 이벤트
    $('[data-scroll="area"]').length > 0 && scrollFix();

    $('.topBtn').click(function(){
        $('html').animate({scrollTop : 0})
    })
});

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
}

// 반응형 로고
function logo(){
    $(window).width() < 1450 ? $('header h1').addClass('active') : $('header h1').removeClass('active');
}

// 슬라이더
function swiperSlider(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        slidesPerView: 2,
    });
}

function test(){
    var swiper = new Swiper(".foundedSlider", {
        direction: "vertical",
        slidesPerView: 5,
        spaceBetween: 12,
        autoplay: {
            delay: 1000,
        },
        loop: true
    });
}

// 풀페이지
function fullPage(){
    $('body').css('overflow','hidden');
    $(window).scroll(function(){
        ($(window).scrollTop() > 0) ? $('.fixedLink').addClass('active') : $('.fixedLink').removeClass('active');
        ($(window).scrollTop() > 0) ? $('.topBtn').fadeIn() : $('.topBtn').fadeOut();
    })
    let fullAniBool = true;
    $('[data-scroll="fullPage"] > *').on('mousewheel',function(e){
        if(targetAni){ return;}
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
            if(!$(this).prev().length) return;
            (targetIdx > 0) ? fullAniBool = opacityAni(targetLi, --targetIdx , progress) : (scrollTopValue = $(this).prev(),count = $(this).prev().attr('data-count'));
        }else{
            // 휠을 아래로
            if(!$(this).next().length) return;
            (targetIdx < (targetLength - 1)) ? fullAniBool = opacityAni(targetLi, ++targetIdx , progress) : (scrollTopValue = $(this).next(),count = $(this).next().attr('data-count'));
        }
        fullAniBool ? fullPageAni(scrollTopValue , count) : 
        setTimeout(()=>{
            fullAniBool = !fullAniBool;
        },1000);
    })

    function fullPageAni(scrollTopValue){
        scrollTopValue.addClass('active').siblings().removeClass('active');
        $('html').stop().animate({scrollTop : scrollTopValue.offset().top} , 500)
        count == 'area' && countAni($('[data-count="area"] [data-count="target"]'));
    }

}

// opacity 애니메이션
let targetAni = false;
function opacityAni(list , idx , progress){
    progress.find('span').animate({'top':progress.height()  / list[0].length * idx} , 500 , 'linear')
    list.map((t)=>{
        t.eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().animate({opacity : 0} , 500).removeClass('active');
    })
    targetAni = !targetAni;
    setTimeout(function(){
        targetAni = !targetAni;
    },1000)
    return false;
}

function scrollAni(list , idx){
     $('.roadArea .yearArea li').eq(idx).addClass('active').siblings().removeClass('active');
    list.eq(idx).addClass('active').siblings().removeClass('active');
    $('[data-scrollAni="scroll"] [data-scroll="target"]').stop().animate({top : -(list.eq(idx).position().top)} , 500);
    
    targetAni = !targetAni;
    setTimeout(function(){
        targetAni = !targetAni;
    },1000)
}

function scrollFix(){
    $('body').css('overflow','hidden');
    canvasInit();
    $('main[data-scroll="area"]').find('[data-scroll="area"]').eq(-1).scroll(function(){
        $(this).scrollTop() > 0 ? $('header').addClass('active') : $('header').removeClass('active');
        ($(this).scrollTop() > 0) ? $('.fixedLink').addClass('active') : $('.fixedLink').removeClass('active');
        ($(this).scrollTop() > 0) ? $('.topBtn').fadeIn() : $('.topBtn').fadeOut();
    })
    $('.topBtn').click(function(){
        $('[data-scroll="area"]').removeClass('active');
        $('[data-scroll="area"]').eq(2).addClass('active');
        $('[data-scroll="area"]').animate({scrollTop : 0});
        let test = []
        test.push($('[data-scrollAni] [data-scroll="target"] li'))
        for(let a = 0 ; a < $('[data-scrollAni] [data-scroll="target"]').length; a++){
        }
        opacityAni(test , 0 , $('[data-scrollAni] [data-scroll="target"] .progressBar'))
    })
  
    let countBool = true;
    $('[data-scroll="area"]').each(function(){
        $(this).on('mousewheel',function(e){
            // if(!$(this).hasClass('active')) return;
            e.stopPropagation();
            if(targetAni){ return;}
            if($('.progressBar span').is(':animated')) {
                e.preventDefault()
                return
            }
            let delta = e.originalEvent.wheelDelta;
            let aniName = $(this).children('[data-scrollAni]').attr('data-scrollAni');
            let target = $(this).find('[data-scroll="target"]');
            let targetLi = [];
            let targetIdx;
            let targetLength;
            let progress = $(this).find('.progressBar');
            target.each(function(i){
                targetLi.push(target.eq(i).children('li'))
            })
            targetLi.length > 0 && (targetLength = targetLi[targetLi.length -1].length);
            
            targetLi.map(function(list){
                list.each(function(i){
                    list.eq(i).hasClass('active') && (targetIdx = i);
                })
            })
            let totalHeight = 0;
            $(this).children().each(function(){
                totalHeight += $(this).outerHeight(true);
            })

            if(delta > 0){
                // 휠을 위로
                if($('[data-scroll="area"].active').length == 0 && targetIdx > 0){
                    if(aniName == 'opacity'){
                        opacityAni(targetLi, --targetIdx , progress);
                    }else if(aniName == 'scroll'){
                        scrollAni(targetLi[targetLi.length-1], --targetIdx)
                    }
                }else if($('[data-scroll="area"].active').length == 0 && targetIdx == 0){
                    $(this).addClass('active');
                }
                
                if($('[data-scroll="area"].active').scrollTop() == 0){
                    $('[data-scroll="area"].active').removeClass('active');
                }
            }else{
                // 휠을 아래로
                if(Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && targetIdx < (targetLength - 1)){
                    $(this).removeClass('active');
                    if(aniName == 'opacity'){
                        opacityAni(targetLi, ++targetIdx , progress);
                    }else if(aniName == 'scroll'){
                        scrollAni(targetLi[targetLi.length-1] , ++targetIdx)
                    }
                }else if(Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && targetIdx == (targetLength - 1)){
                    $(this).parent().addClass('active');
                }
            }
        })
        
        
        $(this).scroll(function(){
            if(!$(this).hasClass('active')) return;
            if($('[data-count="area"]').offset().top <= 0 && countBool){
                countBool = !countBool;
                drawScene();
                setTimeout(function(){
                    countAni($('[data-count="area"] [data-count="target"]'));
                },1000)
            }
        })
    })

    $('.roadArea .yearArea li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        scrollAni($('[data-scrollAni="scroll"] [data-scroll="target"] > li') , $(this).index());
    })

}

// 라이더 페이지 이벤트
function riderEvent(){
    clickDrop();
    bikeAni();
}

// 라이더 수익 클릭 드랍
function clickDrop(){
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
        $(this).parent().parent().stop().slideUp();
        $(this).parent().parent().prev().html($(this).html())
        countAni($('[data-date="hour"]').parent().prev().text() * $('[data-date="week"]').parent().prev().text() * 8095)
    })
    // 목록위에서 스크롤 막기
    $('[data-click="drop"] + div').on('mousewheel',function(e){
        e.stopPropagation();
    })
    // 드랍 목록 스크롤 움직이기
    $('[data-click="drop"] + div ul').scroll(function(){
        $(this).prev().css('top',($('[data-click="drop"] + div ul').scrollTop() / dropTotitleHeight) * 100 + '%');
    })

}

// 카운트
function countAni(list){
    const countOptions = {
        useEasing :true,
        separator : ",",
        decimal : ",",
    };
    if(typeof(list) == 'number'){
        let count = new CountUp(revenue,0000, list, 0, 2, countOptions);
        count.start();
    }else{
        list.each(function(){
            var result = $(this).text().replace(/[^0-9]/g, "");	
            let count;
            let result2 = $(this).attr('data-countUp') ? $(this).attr('data-countUp').replace(/[^0-9]/g, "") : false;
            if($(this).attr('id') == 'year'){
                count = new CountUp($(this).attr('id'),result, result2, 0, 2, {
                    useEasing :true,
                    separator : "",
                    decimal : "",
                });
            }else if($(this).attr('data-countUp')){
                // let result2 = $(this).attr('data-countUp').replace(/[^0-9]/g, "");
                count = new CountUp($(this).attr('id'),result, result2, 0, 2, countOptions);
            }else{
                count = new CountUp($(this).attr('id'),0000, result, 0, 2, countOptions);
            }
            count.start();
        });
    }
}

function bikeAni(){
    let area;
    let target;
    let targetRight;
    let scrollList;
    let idx;

    bikeInit();
    target.css('right' , targetRight);

    $('[data-bike="area"]').on('mousewheel',function(e){
        bikeInit();
        scrollList.each(function(i){
            $(this).hasClass('active') && (idx = i);
        })
        if(idx == 0){
            target.css('right',targetRight)
        }else if(idx == 1 ){
            target.css('right',targetRight / 2)
        }else{
            target.css('right',0)
        }
    })

    function bikeInit(){
        area = $('[data-bike="area"]');
        target = area.find('[data-bike="target"]');
        scrollList = area.find('[data-scroll="target"] li');
        targetRight = -(parseInt($('.CW').css('margin-right')) + target.width() - 50);
    }
}



// 그래프
let canvas , ctx , w , h , lines = [];
function canvasInit(){
    canvas = document.getElementById('graph');
    ctx = canvas.getContext('2d');
    canvasSize();
    lines.push(new Line());
}

function canvasSize(){
    w = canvas.width = document.querySelector('.graphArea').offsetWidth;
    h = canvas.height = document.querySelector('.graphArea').offsetHeight;
}

function drawScene(){
    animationLoop();
}

function animationLoop(){
    ctx.clearRect(0,0,w,h);
    lines.map((l)=>{
        l.draw();
        l.update();
    })
    requestAnimationFrame(animationLoop)
}

class Line{
    constructor(){
        this.x = 40;
        this.y = 329;
        this.lineX = this.x;
        this.lineY = this.y;
        this.progress = 0;
        this.point = [
            {x : 40 , y : 329},
            {x : 139, y : 317},
            {x : 249, y : 298},
            {x : 360, y : 261},
            {x : 469, y : 188},
            {x : 583, y : 97},
        ]
        this.line = [];
        this.count = 0;
        this.balls = [new Ball(this.point[0].x , this.point[0].y)];
        this.lastCheck = false;
    }
    draw(){
        ctx.beginPath();
        this.line.map((l , i)=>{
            ctx.moveTo(this.point[i].x , this.point[i].y);
            ctx.lineTo(l.x , l.y)
        })
        ctx.moveTo(this.point[this.count].x , this.point[this.count].y);
        ctx.lineTo(this.lineX , this.lineY)
        ctx.strokeStyle = 'black';
        ctx.lineWidth = 4
        ctx.stroke();

        this.balls.map((b)=>{
            b.draw();
            b.update();
        })
    }
    update(){
        if(this.count < this.point.length - 1){ 
            if(this.count == this.point.length - 2){
                this.lastCheck = true;
            }
            if(this.progress <= 1){
                this.lineX = this.point[this.count].x + (this.progress * (this.point[this.count + 1].x - this.point[this.count].x))
                this.lineY = this.point[this.count].y + (this.progress * (this.point[this.count + 1].y - this.point[this.count].y))
                this.progress += 0.1;
            }else{
                this.lineX = this.point[this.count + 1].x;
                this.lineY = this.point[this.count + 1].y;
                this.line.push({x : this.lineX , y : this.lineY});
                this.count++;
                this.progress = 0;
                this.balls.push(new Ball(this.lineX , this.lineY , this.lastCheck));
            }
        }
        
    }
}

class Ball{
    constructor(x , y , lastCheck){
        this.x = x;
        this.y = y;
        this.size = 0;
        this.lastCheck = lastCheck;
    }

    draw(){
        if(this.lastCheck){
            ctx.beginPath();
            ctx.arc(this.x , this.y , this.size <=19 ? this.size : 19 , 0 , Math.PI * 2 );
            ctx.fillStyle = 'rgba(250,80,20,1)';
            ctx.fill()
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(this.x , this.y , this.size <=45 ? this.size : 45 , 0 , Math.PI * 2 );
            ctx.fillStyle = 'rgba(250,80,20,0.3)';
            ctx.fill()

            ctx.beginPath();
            ctx.arc(this.x , this.y , this.size , 0 , Math.PI * 2 );
            ctx.fillStyle = 'rgba(250,80,20,0.1)';
            ctx.fill()
        }else{
            ctx.beginPath();
            ctx.arc(this.x , this.y , this.size, 0 , Math.PI * 2);
            ctx.fillStyle = 'black';
            ctx.fill()
        }
    }

    update(){
        if(this.lastCheck){
            if(this.size < 70){
                this.size = this.size + 0.5; 
            }
        }else{
            if(this.size < 8){
                this.size = this.size + 0.5; 
            }
        }
    }
}

