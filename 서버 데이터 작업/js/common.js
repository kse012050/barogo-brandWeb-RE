
let responsiveWidth = 767;
$(document).ready(function(){
    // ie 일 때 클래스 넣기
    var ua = window.navigator.userAgent;
    if (ua.indexOf('MSIE ') > 0 || ua.indexOf('Trident/') > 0) {
        $('.topBox').addClass('ie')
    }

    // 공통
    common()
    
    // 라이더 페이지
    $('.riderPage').length > 0 && riderPage();

    // 허브 창업 페이지
    $('.foundedPage').length > 0 && foundedPage();

    // 회사 소개 페이지
    $('.aboutUsPage').length > 0 && aboutUsPage();
    $('.mainPage').length > 0 && test();
    $('.foundedPage').length > 0 && test();
    $('.riderPage').length > 0 && test();

    // 문의 페이지
    $('.inquiryPage').length > 0 && inquiryPage();
    
    
    $('.detailPage').length > 0 && detailPage();

    /* 장소 - 허브리스트 검색 */
    $('.placePage .hublistPage').length > 0 && placeHubSearch();

    // 개인정보처리방침 링크
    $('.policyPage .linkArea').length > 0 && privacyLink();

    function common(){
        // 인트로
        if($('.introBox').length > 0) {
            $('.introBox').addClass('active')
             introAni();
        }

        // 반응형 로고 , 풀페이지 판단
        resizeLogo();
        $(window).resize(function(){
            resizeLogo();
        });

        // 스크롤 공통
        ($('body').hasClass('bodyHidden') && $(window).width() > responsiveWidth) ? scrollHeader($('main[data-scroll="area"]').find('[data-scroll="area"].active')) : scrollHeader($(window));
     
        // 메인페이지 하단 슬라이더
        $('.bottomSlider').length > 0 && bottomSlider();

        // 버튼 클릭 애니
        $('[class *= "BTN"]').length > 0 && buttonClickAni();
        
        // 모바일 메뉴
        mobileMenu();

        // 푸터 메뉴 클릭
        footerMenu();
  

        /* ! 함수 생성 */
        // 인트로
        function introAni(){
            // 임시 메인 팝업
            $('.mainPage .popupBox').length > 0 && $('body').css('overflow','hidden');
            $('[data-close]').click(function(){
                var attrName = $(this).attr('data-close');
                $('[data-popup='+attrName+']').fadeOut();
                $('body').removeAttr('style');
            })

            
            let introDuration = 0.8;
            let introDelay = 0.7;
            let topDelay = 400;
            let afterDelay = 0;
            if($.cookie('introAni') == 'true'){
                $('.introBox').remove();
            }else{
                $('.introBox').css('display' , 'block');
                $('.introBox .BG').css({
                    'animationName' : 'introBG',
                    'animationDuration' : introDuration + 's',
                    'animationDelay' : introDelay + 's'
                });
                $('.introBox .textArea span').css('animationDelay' , introDelay + 's');
                $('.introBox .textArea span').eq(0).css('animationDuration' , + introDuration / 3 + introDuration / 10 +'s')
                $('.introBox .textArea span').eq(1).css('animationDuration' , + introDuration / 2 +'s')
                $('.introBox .textArea span').eq(2).css('animationDuration' , + introDuration / 3 * 2 +'s')
                afterDelay = ((introDuration / 3 * 2) + introDelay + 0.3) * 1000;
                setTimeout(function(){
                    $('.introBox').remove();
                }, afterDelay )
            }

            $('.mainPage .topBox span').css('animation-delay' , afterDelay + 'ms');
            // 메인 애니메이션 시간 PC 
            if($(window).width() > responsiveWidth){
                $('.mainPage .topBox .imgArea').css('animation-delay' , afterDelay + 500 + 'ms');
                $('.mainPage .topBox .CW :is(h1 , h2) , .mainPage .topBox .CW a').css('animation-delay' , afterDelay + 700 + 'ms');
            }else{
                // Mobile
                $('.mainPage .topBox .imgArea').css('animation-delay' , afterDelay + 300 + 'ms');
                $('.mainPage .topBox .CW :is(h1 , h2)').css('animation-delay' , afterDelay + 600 + 'ms');
            }
            $.cookie('introAni' , 'true', {path :'/'});
        }   /* 인트로 fin */


        // 스크롤시 해더
        function scrollHeader(selector){
            selector.scroll(function(){
                (selector.scrollTop() > 0) ? $('header').addClass('active') : $('header').removeClass('active');
                ($(this).scrollTop() > 0) ? $('.fixedLink').addClass('active') : $('.fixedLink').removeClass('active');
                ($(this).scrollTop() > 0) ? $('.topBtn').fadeIn() : $('.topBtn').fadeOut();
                if($('.topBtn').length > 0){
                    ($(this).scrollTop() > $('footer').offset().top - $(window).height()) ? $('.topBtn').addClass('active') : $('.topBtn').removeClass('active')
                }
            })
        }   /* 스크롤시 해더 fin */

        // 반응형 로고
        function resizeLogo(){
            $(window).width() < 1450 ? $('header :is(h1 , h2)').addClass('active') : $('header :is(h1 , h2)').removeClass('active');
        }   /* 반응형 로고 fin */

        // 하단 슬라이더
        function bottomSlider(){
            var swiper = new Swiper(".bottomSlider", {
                slidesPerView: "auto",
                slidesPerView: 2,
                breakpoints: {
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    10000: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    }
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
            });
            
        }   /* 하단 슬라이더 fin */

       

        // 버튼 클릭 애니
        function buttonClickAni(){
            $('[class *= "BTN"] , .fixedLink').on('mousedown',function(e){
                e.preventDefault();
                posX = e.offsetX;
                posY = e.offsetY;

                var ripples = $('<span></span');
                $(this).append(ripples);
                ripples.css({
                    'left' : posX,
                    'top' : posY
                });
                
                setTimeout(function(){
                    ripples.remove();
                },3000);

            })
        }   /* 버튼 클릭 애니 fin */

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

        $('.topBtn').click(function(){
            $(this).hasClass('active') && $('html').animate({scrollTop : 0});
        })

        if($('.mainPage [class*="overLine"]').length){
            $('.mainPage [class*="overLine"]').closest('[data-scroll="area"]').scroll(function(){
                let windowHeight = $(this).height() * 0.7;
                $('[class*="overLine"]').each(function(){
                    $(this).offset().top < windowHeight ?
                        $(this).addClass('active') : 
                        $(this).removeClass('active');
                })
                $('[data-scroll="animation"]').each(function(){
                    $(this).offset().top < windowHeight ?
                        $(this).addClass('active') : 
                        $(this).removeClass('active');
                })
            })
        }
       
    }   /* common fin */



    // 라이더 전용
    function riderPage(){
        // 라이더 상단 애니 (이미지 내려옴)
        $('[data-scroll="animation"]').each(function(){
            const aniTise = $(this);
            $(this).closest('[data-scroll="area"]').scroll(function(){
                console.log(1);
                if($(this).scrollTop() > ($(this).height() * 0.7)){
                    aniTise.addClass('active');
                }else{
                    aniTise.removeClass('active');
                }
            })
        })


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
            let hourPrice = Number($('#revenue').attr('data-hour_price'));
            $('#revenue').attr('data-endCount' ,($('[data-date="hour"]').parent().prev().text() * $('[data-date="week"]').parent().prev().text() * 4 * hourPrice))
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

        // 플레이 슬라이더
        var playgroundSwiper;
        initPlaygroundSwiper()
        $(window).resize(function(){
            initPlaygroundSwiper()
        })
        function initPlaygroundSwiper(){
            if($(window).width() > responsiveWidth && playgroundSwiper != undefined){
                playgroundSwiper.destroy();
                playgroundSwiper = undefined;
            }else if($(window).width() < responsiveWidth && playgroundSwiper == undefined){
                playgroundSwiper = new Swiper(".playgroundSwiper", {
                    slidesPerView: 1,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    allowTouchMove: false,
                    on : {
                        slideChangeTransitionEnd : function(){
                            $('.playgroundArea .mobileText mark').html($('.playgroundSwiper .swiper-slide-active .textArea mark').html())
                            $('.playgroundArea .mobileText p').html($('.playgroundSwiper .swiper-slide-active .textArea p').html())
                        }
                    }
                });
                let touchstartX; 
                let touchstartY; 
                let touchendX; 
                let touchendY; 
                $('.sliderArea').on('touchstart',function(e){
                    touchstartX = e.touches[0].clientX;
                    touchstartY = e.touches[0].clientY;
                })
                $('.sliderArea').on('touchend',function(e){
                    touchendX = e.changedTouches[0].clientX;
                    touchendY = e.changedTouches[0].clientY;
                    if(Math.abs(touchstartY - touchendY) < Math.abs(touchstartX - touchendX)){
                        if(touchstartX > touchendX){
                            playgroundSwiper.slideNext();
                        }else{
                            playgroundSwiper.slidePrev();
                        }
                    }
                })
                let isClick;
                $('.sliderArea').on('mousedown',function(e){
                    touchstartX = e.clientX;
                    touchstartY = e.clientY;
                    isClick = true;
                })
                $('.sliderArea').on('mouseup',function(e){
                    if(isClick){
                        touchendX = e.clientX;
                        touchendY = e.clientY;
                        if(touchstartX > touchendX){
                            playgroundSwiper.slideNext();
                        }else{
                            playgroundSwiper.slidePrev();
                        }
                    }
                })
               
         
            }
        }   // // 플레이 슬라이더 fin

        let countBreak = true;
        $('main').scroll(function(){
            if($(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.3 && countBreak)){
                countAni($(this).find('[data-eventAni="target"]'))
                countBreak = false;
            }
        })

         // 스크롤 바이크 이벤트
         if($('.riderPage').length){
            $('.riderPage').scroll(function(){
                bikeAni($(this).height() * 0.7)
            })

            $(window).scroll(function(){
                bikeAni($(this).scrollTop() + $(this).height() * 0.7)
            })

            function bikeAni(scrollValue){
                let riderY = $('.riderPage .startArea .CW .imgArea').offset().top;
                if(riderY < scrollValue){
                    $('.riderPage .startArea .CW .imgArea').addClass('active');
                }else{
                    $('.riderPage .startArea .CW .imgArea').removeClass('active');
                }
            }
        }   // 스크롤 바이크 이벤트 fin

        // 굿즈 슬라이더
        var goodsSwiper;
        initGoodsSwiper()
        $(window).resize(function(){
            initGoodsSwiper()
        })
        function initGoodsSwiper(){
            if($(window).width() < responsiveWidth && goodsSwiper != undefined){
                goodsSwiper.destroy();
                goodsSwiper = undefined;
            }else if($(window).width() > responsiveWidth && goodsSwiper == undefined){
                goodsSwiper = new Swiper(".goodsSwiper", {
                    slidesPerView: "auto",
                    spaceBetween: 30,
                    loop : true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction : false,
                        pauseOnMouseEnter : true
                    },
    
                });
            }
        } /* 굿즈 슬라이더 fin */
    }   /* 라이더 전용 fin */

    // 허브 창업 전용
    function foundedPage(){
        var swiper = new Swiper(".foundedSlider", {
            direction: "vertical",
            slidesPerView: "auto",
            centeredSlides: true,
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
                    slidesPerView: 4,
                }
            },
            loop: true,
        });
        let countBreak = true;
        $('main').scroll(function(){
            if($(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.3 && countBreak)){
                countAni($(this).find('[data-eventAni="target"]'))
                countBreak = false;
            }
        })
    }   /* 허브 창업 전용 fin */

    function test(){
        setTimeout(function(){
            $('html').scrollTop(0)
        },300) 
        // 회사소개 스크롤 이벤트
        $('[data-scroll="area"]').each(function(){
            // PC 
            $(this).on('mousewheel',function(e){
                if($(window).width() < responsiveWidth){return}
                e.stopPropagation();
                let delta = e.originalEvent.wheelDelta;
                // aaaa($(this) , delta)

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
                let delta = -(touchstartY - touchendY);
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
        })
        function aaaa(thisSelector , delta){
            let totalHeight = 0;
            let targetLi = thisSelector.children('[data-scrollAni]').find('[data-scroll="target"]').eq(0).children('li')
            let idx;
            
            thisSelector.children().each(function(){
                totalHeight += $(this).outerHeight(true);
            })
            
            if(thisSelector.parent().scrollTop() == 0 && Math.floor(totalHeight - thisSelector.height()) <= thisSelector.scrollTop() && delta > 0){
                if(scrollAni(thisSelector.children('[data-scrollAni]') , delta)){
                    thisSelector.parent().removeClass('active');
                    targetLi.each(function(i){
                        if(thisSelector.hasClass('active')){
                            idx = i;
                        }
                    })
                    if(idx == 0){
                        thisSelector.addClass('active');
                    }
                }
            }else if(Math.floor(totalHeight - thisSelector.height()) <= thisSelector.scrollTop() && delta < 0){
                console.log(1);
                if(scrollAni(thisSelector.children('[data-scrollAni]') , delta)){
                    console.log(2);
                    thisSelector.removeClass('active');
                    targetLi.each(function(i){
                        if(thisSelector.hasClass('active')){
                            idx = i;
                        }
                    })
                    console.log(targetLi);
                    if(idx == (targetLi.length - 1)){
                        thisSelector.parent().addClass('active');
                    }
                }
            }
        }


        
    }

    // 회사소개 전용
    function aboutUsPage(){
        setTimeout(function(){
            $('html').scrollTop(0)
        },300) 
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

                topButton()
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
                let delta = -(touchstartY - touchendY);
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

                topButton();
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
                topButton();
            })

            function topButton(){
                if($('.supportArea').offset().top < 0 ){
                    $('.topBtn').addClass('active');
                }else{
                    $('.topBtn').removeClass('active');
                }
            }

            // 모바일 fin
        })

        
        // 그래프 이벤트
        let graphArea = $('[data-specialAni="graph"]');
        let graphBreak = true;
        graphArea.parent().scroll(function(){
            if(graphArea.offset().top < $(window).height() - graphArea.height() + (graphArea.height() / 3) && graphBreak){
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
            if(!$(this).hasClass('active'))return;
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

    // 문의 페이지 전용
    function inquiryPage(){
        
        // 문의 페이지 팝업
        inquiryPopup();

        // 문의 페이지 팝업
        function inquiryPopup(){
            $('[data-click*="popup"]').click(function(e){
                e.preventDefault();
                let attrName = $(this).attr('data-click');
                $('[data-popup="'+attrName+'"]').fadeIn().css('display','flex');
                $('body').css('overflow','hidden');
            })
            $('.popupBox').click(function(){
                closePopup();
            })
            $('.popupBox div').click(function(e){
                e.stopPropagation();
            })

            $('.popupBox div button').click(function(e){
                e.preventDefault();
            })

            $('.popupBox div [data-close]').click(function(){
                closePopup();
            })

            $('.popupBox div [data-chk]').click(function(){
                closePopup();
                let attrName = $(this).attr('data-chk');
                $('#' + attrName).prop('checked',true);

                let bChek = true;
                let allcheck = true;
                let list = $("input[type=checkbox]");
                $.each(list, function (idx, item) {
                    if ($(item).attr('id') !== 'allCheck') {
                        if (!$(item).prop("checked")) {
                            allcheck = false;
                        }
                        if ($(item).attr('id').startsWith('agree')) {
                            // 필수 약관동의 , 체크가 안되어 있는 경우
                            if (!$(item).prop("checked")) {
                                bChek = false;
                            }
                        }
                    }
                });
                if (allcheck) {
                    $("#allCheck").prop("checked", true);
                } else {
                    $("#allCheck").prop("checked", false);
                }

                // 필수 동의 시 체크
                if (bChek) $("input[type=submit]").addClass('active');
                else $("input[type=submit]").removeClass('active');

            })

            function closePopup(){
                $('.popupBox').fadeOut();
                $('body').removeAttr('style');
            }
        }   /* 문의 페이지 팝업 fin */

        // submit 버튼 활성화되지 않으면 클릭 막기
        $('.inquiryPage input[type="submit"]').click(function(e){
            if(!$(this).hasClass('active')){
                e.preventDefault();
            }
        })

    }   /* 문의하기 전용 fin */
    
    // scroll event
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
        setTimeout(function(){
            aniBreak = !aniBreak;
        }, 500)
        // }, 1000)

        targetArea.attr('data-scrollAni') == 'fixed' && opacityAni(targetList , idx, targetArea.find('.progressBar'));
        targetArea.attr('data-scrollAni') == 'opacity' && opacityAni(targetList , idx, targetArea.find('.progressBar'));
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
        list.map(function(t){
            t.eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().css('opacity',0).removeClass('active');
            // t.eq(idx).stop().fadeIn().addClass('active').siblings().hide().removeClass('active');
        })
    } // 투명도 효과 fin
    

    // 회사소개 연혁 페이지이동
    function moveAni(targetList , target , idx){
        targetList.map((t)=>{
            t.eq(idx).addClass('active').siblings().removeClass('active');
        })
        if($(window).width() > responsiveWidth){
            if(target.length > 1){
                target.eq(1).stop().animate({top : -(targetList[1].eq(idx).position().top)} , 500); 
            }else{
                $('[data-scrollAni="move"] [data-scroll="target"]').each(function(){
                    target.stop().animate({top : -(target.find('li').eq(idx).position().top)} , 500); 
                })
            }
        }else{
            if($('.aboutUsPage').length){
                target.eq(1).eq(idx).stop().animate({opacity : 1} , 500).addClass('active').siblings().animate({opacity : 0} , 500).removeClass('active');
            }
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

    function detailPage(){
        $('.detailPage .contentArea *').css('line-height','');
    }


    /* 장소 - 허브리스트 검색 */
    function placeHubSearch(){
        $('.searchArea .clearBtn').click(function(){
            $(this).siblings('input').val('').focus();
        })
    }

    // 개인정보처리방침 링크
    function privacyLink(){
        $('.policyPage .linkArea a').click(function(e){
            e.preventDefault();
            const height = $($(this).attr('href')).offset().top;
            console.log($('header').height());
            $(window).scrollTop(height - $('header').innerHeight())
        })
    }

})  /* document ready fin */




