
let responsiveWidth = 767;
$(document).ready(function(){
    // 새로고침 시 최상단 이동
    setTimeout(function(){
        $('html').scrollTop(0)
    },300) 

    // 공통
    common()
    
    // 라이더 페이지
    $('.riderPage').length > 0 && riderPage();

    // 허브 창업 페이지
    $('.foundedPage').length > 0 && foundedPage();

    // 허브 창업 페이지
    $('.aboutUsPage').length > 0 && aboutUsPage();

    // 풀페이지
    // $('[data-scroll="fullPage"]').length > 0 && fullPage();
    
    function common(){
        // 인트로
        $('*').hasClass('introBox') && introAni();

        // 반응형 로고 , 풀페이지 판단
        resizeLogo();
        resizeFull();
        $(window).resize(function(){
            resizeLogo();
            resizeFull();
        });

        // 스크롤 공통
        ($('.aboutUsPage').length > 0 && $(window).width() > responsiveWidth) ? scrollHeader($('main[data-scroll="area"]').find('[data-scroll="area"]').eq(1)) : scrollHeader($(window));
     
        // 메인페이지 하단 슬라이더
        $('.bottomSlider').length > 0 && bottomSlider();

        // 모바일 메뉴
        mobileMenu();

        // 푸터 메뉴 클릭
        footerMenu();
  

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
                $('.introBox').css('display','none');
                $('.deliveryPage > .topBox .imgArea').addClass('active');
            })
        }   /* 인트로 fin */

        // 스크롤시 해더
        function scrollHeader(selector){
            selector.scroll(function(){
                (selector.scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active');
                ($(this).scrollTop() > 0) ? $('.fixedLink').addClass('active') : $('.fixedLink').removeClass('active');
                ($(this).scrollTop() > 0) ? $('.topBtn').fadeIn() : $('.topBtn').fadeOut();
                // ($(this).scrollTop() > 0) ? $('.topBtn').addClass('active') : $('.topBtn').removeClass('active');
            })
        }   /* 스크롤시 해더 fin */

        // 반응형 로고
        function resizeLogo(){
            $(window).width() < 1450 ? $('header h1').addClass('active') : $('header h1').removeClass('active');
        }   /* 반응형 로고 fin */

        // 반응형 풀페이지
        function resizeFull(){
            if(/* $('[data-scroll="fullPage"]').length > 0 || */ $('.aboutUsPage').length > 0){
                $(window).width() < responsiveWidth ? $('body').removeAttr('style') : $('body').css('overflow','hidden');
            }
            
        }
        
        // 하단 슬라이더
        function bottomSlider(){
            var swiper = new Swiper(".bottomSlider", {
                slidesPerView: "auto",
                slidesPerView: 2,
                breakpoints: {
                    300: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    }
                }
            });
        }   /* 하단 슬라이더 fin */

       

        // 모바일 메뉴
        function mobileMenu(){
            $('header div button').click(function(){
                $(this).toggleClass('active');
                $('header div nav').toggleClass('active');
            })
        }  /* 모바일 메뉴 fin */

        // 푸터 메뉴 클릭
        function footerMenu(){
            $('footer .topArea div .linkArea > li b').click(function(){
                if($(window).width() < responsiveWidth){
                    $(this).toggleClass('active')
                    $(this).next().stop().slideToggle();
                }
            })
        }   /* 푸터 메뉴 클릭 fin */

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
        })
        // 목록 클릭시 값 변경
        $('[data-click="drop"] + div li').click(function(e){
            $(this).parent().parent().stop().slideUp();
            $(this).parent().parent().prev().html($(this).html())
            $('#revenue').attr('data-endCount' ,($('[data-date="hour"]').parent().prev().text() * $('[data-date="week"]').parent().prev().text() * 8095))
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
            breakpoints: {
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 5,
                }
            },
            loop: true,
        });
    }   /* 허브 창업 전용 fin */


    // 회사소개 전용
    function aboutUsPage(){
        // 회사소개 스크롤 이벤트
        $('[data-scroll="area"]').each(function(){
            // PC 
            $(this).on('mousewheel',function(e){
                if($(window).width() < responsiveWidth){return}
                e.stopPropagation();
                let delta = e.originalEvent.wheelDelta;
                let totalHeight = 0;
                let targetLi = $(this).children('[data-scrollAni]').find('[data-scroll="target"]').eq(0).children('li')
                let idx;
                
                $(this).children().each(function(){
                    totalHeight += $(this).outerHeight(true);
                })

                if($(this).parent().scrollTop() == 0 && Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && delta > 0){
                    if(scrollAni($(this).children('[data-scrollAni]') , delta)){
                        $(this).parent().removeClass('active');
                        targetLi.each(function(i){
                            if($(this).hasClass('active')){
                                idx = i;
                            }
                        })
                        if(idx == 0){
                            $(this).addClass('active');
                        }
                    }
                }else if(Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && delta < 0){
                    if(scrollAni($(this).children('[data-scrollAni]') , delta)){
                        $(this).removeClass('active');
                        targetLi.each(function(i){
                            if($(this).hasClass('active')){
                                idx = i;
                            }
                        })
                        if(idx == (targetLi.length - 1)){
                            $(this).parent().addClass('active');
                        }
                    }
                }
            })
            // PC fin

            // tablet
            let touchstartX; 
            let touchstartY; 
            let touchendX; 
            let touchendY; 

            $(this).on('touchstart',function(e){
                if($(window).width() < responsiveWidth){return}
                e.stopPropagation();
                touchstartX = e.touches[0].clientX;
                touchstartY = e.touches[0].clientY;
            })

            $(this).on('touchmove',function(e){
                if(Math.abs(touchstartX - e.changedTouches[0].clientX) > Math.abs(touchstartY - e.changedTouches[0].clientY)){
                    e.preventDefault();
                }
            })

            $(this).on('touchend',function(e){
                if($(window).width() < responsiveWidth){return}
                e.stopPropagation();
                touchendX = e.changedTouches[0].clientX;
                touchendY = e.changedTouches[0].clientY;
                let totalHeight = 0;
                let targetLi = $(this).children('[data-scrollAni]').find('[data-scroll="target"]').eq(0).children('li')
                let idx;
                let delta = -(touchstartY - touchendY);
                $(this).children().each(function(){
                    totalHeight += $(this).outerHeight(true);
                })

                if($(this).parent().scrollTop() == 0 && Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && delta > 0){
                    if(scrollAni($(this).children('[data-scrollAni]') , delta)){
                        $(this).parent().removeClass('active');
                        targetLi.each(function(i){
                            if($(this).hasClass('active')){
                                idx = i;
                            }
                        })
                        if(idx == 0){
                            $(this).addClass('active');
                        }
                    }
                }else if(Math.floor(totalHeight - $(this).height()) <= $(this).scrollTop() && delta < 0){
                    if(scrollAni($(this).children('[data-scrollAni]') , delta)){
                        $(this).removeClass('active');
                        targetLi.each(function(i){
                            if($(this).hasClass('active')){
                                idx = i;
                            }
                        })
                        if(idx == (targetLi.length - 1)){
                            $(this).parent().addClass('active');
                        }
                    }
                }
            })

            // tablet fin

            let touchList = $('.aboutUsPage [data-scrollAni="opacity"]');
            // 모바일
            touchList.on('touchstart',function(e){
                if($(window).width() > responsiveWidth) return;
                touchstartX = e.touches[0].clientX;
                touchstartY = e.touches[0].clientY;
            })

            $(this).on('touchmove',function(e){
                if(Math.abs(touchstartX - e.changedTouches[0].clientX) > Math.abs(touchstartY - e.changedTouches[0].clientY)){
                    e.preventDefault();
                }
            })

            touchList.on('touchend',function(e){
                if($(window).width() > responsiveWidth) return;
                touchendX = e.changedTouches[0].clientX;
                touchendY = e.changedTouches[0].clientY;
                if(Math.abs(touchstartX - touchendX) < Math.abs(touchstartY - touchendY)){
                    return;
                }

                let delta = -(touchstartX - touchendX);
                let targetArea = $(this);
                
                scrollAni(targetArea , delta)
        
            })

            // 모바일 fin
        })

        
        // 그래프 이벤트
        let graphArea = $('[data-specialAni="graph"]');
        let graphBreak = true;
        graphArea.parent().scroll(function(){
            if(graphArea.offset().top < $(window).height() - graphArea.height() && graphBreak){
                graphAni();
                eventAni(graphArea)
                // setTimeout(function(){
                // },1000)
                graphBreak = !graphBreak;
            }
        })  /* 그래프 이벤트 fin */

        // 연혁 클릭
        $('.roadArea .yearArea ol li').click(function(){
            let target = $('.roadArea').find('[data-scroll="target"]');
            let targetList =[]
            if(!target.length){return}
            target.each(function(){
                targetList.push($(this).children('li'));
            })
            if($(window).width() > responsiveWidth){
                moveAni(targetList ,target, $(this).index())
                $('[data-scroll="area"]').removeClass('active');
                if($(this).index() == 0){
                    $('[data-scroll="area"]').eq(1).addClass('active');
                }else if($(this).index() == ($('.roadArea .yearArea ol li').length - 1)){
                    $('[data-scroll="area"]').eq(0).addClass('active');
                }
            }else{
                $(this).addClass('active').siblings().removeClass('active')
                targetList[1].hide();
                targetList[1].eq($(this).index()).fadeIn();
            }
        }) /* // 연혁 클릭 fin */

        // 모바일 스크롤 그래프
        $(window).scroll(function(){
            if($(window).width() < responsiveWidth && $(window).scrollTop() > $('.numberArea').offset().top -($(window).height() * 0.3) && graphBreak){
                graphAni();
                setTimeout(function(){
                    eventAni(graphArea)
                },1000)
                graphBreak = !graphBreak;
            }
        })  /* 모바일 스크롤 그래프 fin */

        $('.topBtn').click(function(){
            if($(window).width() > responsiveWidth){
                $('[data-scroll="area"]').removeClass('active');
                $('[data-scroll="area"]').eq(-1).addClass('active');
                $('[data-scroll="area"]').animate({scrollTop : 0});
                $('main[data-scroll="area"]').find('[data-scroll="target"]').each(function(){
                    $(this).children('li').eq(1).addClass('active').siblings().removeClass('active');
                })
                $('main[data-scroll="area"]').find('[data-scrollAni]').each(function(){
                    scrollAni($(this) , 120)
                    let target = $('.roadArea').find('[data-scroll="target"]');
                    let targetList =[]
                    if(!target.length){return}
                    target.each(function(){
                        targetList.push($(this).children('li'));
                    })
                    $('.roadArea .yearArea li').eq(0).addClass('active').siblings().removeClass('active');
                    moveAni(targetList ,target, 0)
                })
            }else{
                $('html').animate({scrollTop : 0});
            }
        })
    }   /* // 회사소개 전용 fin */
    
    
    // 풀페이지
    function fullPage(){
        let fullPageList = $('[data-scroll="fullPage"] > *');
        let touchList = $('[data-scroll="fullPage"] [data-scrollAni="opacity"]');
        let idx = 0;

        // PC fullPage
        fullPageList.on('mousewheel',function(e){
            if($(window).width() < responsiveWidth) return;
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

            // 푸터 부분 스크롤 막기
            if($('.scrollArea > div').scrollTop() > 0){
                return;
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

        // PC fullPage fin

        let touchstartX; 
        let touchstartY; 
        let touchendX; 
        let touchendY; 

        // PC , tablet fullPage touch
        fullPageList.on('touchstart',function(e){
            if($(window).width() < responsiveWidth) return;
            touchstartX = e.touches[0].clientX;
            touchstartY = e.touches[0].clientY;
        })
        
        fullPageList.on('touchend',function(e){
            if($(window).width() < responsiveWidth) return;
            touchendX = e.changedTouches[0].clientX;
            touchendY = e.changedTouches[0].clientY;
            if($('html').is(':animated')) return;
            if(Math.abs(touchstartX - touchendX) > Math.abs(touchstartY - touchendY)){
                return;
            }
            let delta = -(touchstartY - touchendY);
            let targetArea = $(this);
            let nextTarget;
            
            // 해당 영역에 투명도 이벤트가 있을 때
            if(targetArea.attr('data-scrollAni')){
                if(scrollAni(targetArea , delta)){
                    return; 
                }
            }

            // 푸터 부분 스크롤 막기
            if($('.scrollArea > div').scrollTop() > 0){
                return;
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
        // PC , tablet fullPage touch fin

        // 모바일 opacity 터치 X축
        touchList.on('touchstart',function(e){
            if($(window).width() > responsiveWidth) return;
            touchstartX = e.touches[0].clientX;
            touchstartY = e.touches[0].clientY;
        })

        touchList.on('touchmove',function(e){
            if(Math.abs(touchstartX - e.changedTouches[0].clientX) > Math.abs(touchstartY - e.changedTouches[0].clientY)){
                e.preventDefault();
            }
        })

        touchList.on('touchend',function(e){
            if($(window).width() > responsiveWidth) return;
            touchendX = e.changedTouches[0].clientX;
            touchendY = e.changedTouches[0].clientY;
            if(Math.abs(touchstartX - touchendX) < Math.abs(touchstartY - touchendY)){
                return;
            }

            let delta = -(touchstartX - touchendX);
            let targetArea = $(this);
            
            scrollAni(targetArea , delta)
    
        })
        // 모바일 opacity 터치 X축 fin
    
        // fullPage 이동 이벤트
        function fullPageAni(nextTarget){
            nextTarget.addClass('active').siblings().removeClass('active');
            $('html').stop().animate({scrollTop : nextTarget.offset().top} , 500)
        }   /* fullPage 이동 이벤트 fin */

        // 모바일 스크롤시 숫자 카운트
        let countBreak = true;
        $(window).scroll(function(){
            if($(window).width() < responsiveWidth){
                $('[data-eventani="count"]').each(function(){
                    if($(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.3) && countBreak){
                        countAni($(this).find('[data-eventAni="target"]'))
                        countBreak = !countBreak;
                    }
                })
            }
        })  /* 모바일 스크롤시 숫자 카운트 fin */


        // fullPage (배달대행 , 라이더 , 허브창업) 탑 버튼
        $('.topBtn').click(function(){
            $('html').animate({scrollTop : 0})
            idx = 0;
            fullPageList.find('[data-scroll="target"]').each(function(){
                $(this).children('li').eq(1).addClass('active').siblings().removeClass('active');
            })
            fullPageList.each(function(){
                scrollAni($(this) , 120)
            })
        })  /* fullPage (배달대행 , 라이더 , 허브창업) 탑 버튼 fin */
        
    } /* 풀페이지 fin */
    
    // fullPage 안 scroll event
    let aniBreak = false;
    function scrollAni(targetArea , delta){
        if(aniBreak){ return true}
        
        let target = targetArea.find('[data-scroll="target"]');
        let targetList =[]
        let idx;
        if(!target.length){return}
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

        // 애니메이션이 끝나고 1초 동안 딜레이
        aniBreak = !aniBreak;
        setTimeout(()=>{
            aniBreak = !aniBreak;
        }, 1000)
        
        targetArea.attr('data-scrollAni') == 'opacity' && opacityAni(targetList , idx, targetArea.find('.progressBar'));
        targetArea.attr('data-specialAni') == 'bike' && bikeAni(targetArea , idx);
        targetArea.attr('data-scrollAni') == 'move' && moveAni(targetList , target, idx);
        return true;

        
    } /* fullPage 안 scroll event fin */
    
    // 투명도 효과
    function opacityAni(list , idx , progress){
        if(progress.find('span').is(':animated')) return;
        if($(window).width() > responsiveWidth){
            progress.find('span').animate({'top':progress.height()  / list[0].length * idx} , 500 , 'linear')
        }else{
            progress.find('span').animate({'left':progress.width()  / list[0].length * idx} , 500 , 'linear')
        }
        list.map((t)=>{
            t.eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().css('opacity',0).removeClass('active');
            // t.eq(idx).stop().fadeIn().addClass('active').siblings().hide().removeClass('active');
        })
    } // 투명도 효과 fin
    
    // 라이더 오토바이 효과
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
    }   /* 라이더 오토바이 효과 fin */

    // 회사소개 연혁 페이지이동
    function moveAni(targetList , target , idx){
        targetList[0].eq(idx).addClass('active').siblings().removeClass('active');
        targetList[1].eq(idx).addClass('active').siblings().removeClass('active');
        if($(window).width() > responsiveWidth){
            target.eq(1).stop().animate({top : -(targetList[1].eq(idx).position().top)} , 500); 
        }else{
            target.eq(1).eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().animate({opacity : 0} , 500).removeClass('active');
        }
    }   /* 회사소개 연혁 페이지이동 fin */


    // 카운터 
    function eventAni(t){
        let target = t.find('[data-eventAni="target"]');
        t.attr('data-eventAni') == 'count' && countAni(target , true);
    }   /* 카운터 fin */

    // 숫자 카운팅
    function countAni(list , decimal){
        const countOptions = {
            useEasing :true,
            separator : ",",
            decimal : decimal ? "," : '',
        };
        list.each(function(){
            var startCount;	
            let count;
            let endCount = $(this).attr('data-endCount').replace(/[^0-9]/g, "");
            if(startCount){
                startCount = $(this).attr('data-startCount').replace(/[^0-9]/g, "");
            }else{
                startCount = '';
                for(let a = 0; a < endCount.length; a++){
                    startCount += '0'
                }
            }
            if($(this).attr('id') == 'year'){
                count = new CountUp($(this).attr('id'),parseInt(startCount), endCount, 0, 2, {
                    useEasing :true,
                    separator : "",
                    decimal : '',
                });
            }else{
                count = new CountUp($(this).attr('id'),parseInt(startCount), endCount, 0, 2, countOptions);
            }
            count.start();
        });
    }   /* 숫자 카운팅 fin */

    // 그래프
    function graphAni(){
        let canvas , ctx , w , h , lines = [];
        function canvasInit(){
            canvas = document.getElementById('graph');
            ctx = canvas.getContext('2d');
            canvasSize();
            lines.push(new Line());
        }

        function canvasSize(){
            w = canvas.width = 680;
            h = canvas.height = 381;
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
        canvasInit();
        drawScene();
    }
    
    
})  /* document ready fin */




