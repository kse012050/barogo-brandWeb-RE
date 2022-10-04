<?php include "head.php"; ?>
<body>
    <div class="mainPage">
        <?php include "header.php"; ?>

        <main class="riderPage" data-scroll="fullPage">
            <section class="topBox">
                <div class="CW">
                    <h2 class="TC-02">
                        프로답게, 당당하게<br/>
                        바로고 라이더
                    </h2>
                    <a href="riderInquiry" class="BTN-arrow">바로 문의하기</a>
                </div>
                <div class="imgArea">
                    라이더 이미지
                </div>
            </section>

            <section class="lifeArea" data-scroll="animation">
                <div class="CW">
                    <div class="textArea">
                        <h2 class="TC-02">
                            프로를 프로답게<br/>
                            바로고 라이더 라이프
                        </h2>
                        <mark class="TC-03"><?=getValue($content,"depth2_subject1")?></mark>
                        <p class="FC-01"><?=getValue($content,"depth2_content1")?><</p>
                        <mark class="TC-03"><?=getValue($content,"depth2_subject2")?></mark>
                        <p class="FC-01"><?=getValue($content,"depth2_content2")?></p>
                        <mark class="TC-03"><?=getValue($content,"depth2_subject3")?></mark>
                        <p class="FC-01"><?=getValue($content,"depth2_content3")?></p>
                    </div>
                    <div class="imgArea">
                        <img src="images/rider/life.png" alt="프로를 프로답게 바로고 라이더 파이프 이미지" data-scroll="target">
                    </div>
                </div>
            </section>

            <section class="playgroundArea" data-scrollAni="fixed">
                <div>
                    <div class="CW">
                        <div class="textArea">
                            <div>
                                <h2 class="TC-02">
                                    라이더님만을 위한 놀이터<br/>
                                    바로고 플레이
                                </h2>
                                <p class="FC-01">
                                    당신의 라이딩이 더욱 즐겁고 풍성하도록<br/>
                                    달릴수록 즐거워지는 바로고 플레이!<br/>
                                    오직 바로고에만 있습니다.
                                </p>
                            </div>
                            <div class="progressArea">
                                <div class="progressBar">
                                    <span></span>
                                </div>
                                <ul data-scroll="target">
                                    <li class="active">
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject1")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth3_content1"))?>
                                        </p>
                                    </li>
                                    <li>
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject2")?></mark>
                                        <p class="FC-01"><?=nl2br(getValue($content,"depth3_content2"))?></p>
                                    </li>
                                    <li>
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject3")?></mark>
                                        <p class="FC-01"><?=nl2br(getValue($content,"depth3_content3"))?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="imgArea" data-scroll="target">
                            <li class="active">
                                <img src="images/rider/playground01.png" alt="">
                            </li>
                            <li>
                                <img src="images/rider/playground02.png" alt="">
                            </li>
                            <li>
                                <img src="images/rider/playground03.png" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="revenueArea" data-eventAni="count">
                <div class="CW">
                    <div class="textArea">
                        <small class="FC-01">나의 라이프스타일에 맞춰 주간스케쥴을 입력해보세요</small>
                        <div class="TC-02">
                            하루에 
                            <div>
                                <button data-click="drop">8</button>
                                <div>
                                    <ul class="scrollBox" data-date="hour">
                                        
                                    </ul>
                                </div>
                            </div>
                            시간, <br/>
                            일주일
                            <div>
                                <button data-click="drop">5</button>
                                <div>
                                    <ul data-date="week">
                                        
                                    </ul>
                                </div>
                            </div>
                            일 근무할 때 
                        </div>
                    </div>
                    <div>
                        <p class="FC-01">나의 한달 예상 수익은?</p>
                        <?php
                        $totalPrice = intval(getValue($content,"depth4_subject1")) * 8 * 5 * 4;
                        ?>
                        <span id="revenue" data-eventAni="target" data-hour_price="<?=getValue($content,"depth4_subject1")?>"
                              data-endCount="<?=$totalPrice?>"><?=$totalPrice?></span>
                    </div>
                </div>
            </div>

            <section class="startArea" data-scrollAni="fixed" data-specialAni="bike">
                <div>
                    <div class="CW">
                        <div class="textArea">
                            <h2 class="TC-02">망설이지 말고<br/>바로 시작하세요!</h2>
                            <div class="progressArea">
                                <div class="progressBar">
                                    <span></span>
                                </div>
                                <ul data-scroll="target">
                                    <li class="active">
                                        <mark class="TC-03"><?=getValue($content,"depth5_subject1")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth5_content1"))?>
                                        </p>
                                    </li>
                                    <li>
                                        <mark class="TC-03"><?=getValue($content,"depth5_subject2")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth5_content2"))?>
                                        </p>
                                    </li>
                                    <li>
                                        <mark class="TC-03"><?=getValue($content,"depth5_subject3")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth5_content3"))?>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="imgArea">
                            <img src="images/rider/bike.png" alt="오토바이 이미지" data-special="target">
                        </div>
                    </div>
                </div>
            </section>

            <section class="goodsArea">
                <div class="CW">
                    <h2 class="TC-02 overLine-left">라이더에게 최적화된 바로고 기능성 굿즈</h2>
                    <ul>
                        <li>
                            <p>전문적</p>
                            <p>열정</p>
                            <p>자신감</p>
                            <p>활기</p>
                        </li>
                        <li>바로고 굿즈 이미지</li>
                        <li>바로고 굿즈 이미지</li>
                        <li>바로고 굿즈 이미지</li>
                        <li>바로고 굿즈 이미지</li>
                        <li>바로고 굿즈 이미지</li>
                    </ul>
                </div>
            </section>

            <div class="bannerArea">
                <div class="CW">
                    <p>
                        <?=nl2br(getValue($content,"depth7_content1"))?>
                    </p>
                </div>
            </div>

            <section class="sliderBox">
                <div class="CW">
                    <div class="titleArea">
                        <h2 class="TC-02">#바로고 사장님</h2>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper bottomSlider">
                        <div class="swiper-wrapper">
                            <?php
                            if(checkArray($archives,true)){
                                foreach ($archives as $archive){
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="imgArea" style="background-image: url('<?=$archive["thum_file_path"]?>');"></div>
                                        <mark class="FC-01">#<?=$archive["tag_name"]?></mark>
                                        <p class="FC-01"><?=$archive["subject"]?></p>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
<!--                            <div class="swiper-slide">-->
<!--                                <div class="imgArea" style="background-image: url('images/common/sample.png');"></div>-->
<!--                                <mark class="FC-01">#Film</mark>-->
<!--                                <p class="FC-01">당신은 나의 영웅, 바로고가 응원합니다.</p>-->
<!--                            </div>-->
<!--                            <div class="swiper-slide">-->
<!--                                <div class="imgArea" style="background-image: url('images/common/sample.png');"></div>-->
<!--                                <mark class="FC-01">#Film</mark>-->
<!--                                <p class="FC-01">당신은 나의 영웅, 바로고가 응원합니다.</p>-->
<!--                            </div>-->
<!--                            <div class="swiper-slide">-->
<!--                                <div class="imgArea" style="background-image: url('images/common/sample.png');"></div>-->
<!--                                <mark class="FC-01">#Film</mark>-->
<!--                                <p class="FC-01">당신은 나의 영웅, 바로고가 응원합니다.</p>-->
<!--                            </div>-->
<!--                            <div class="swiper-slide">-->
<!--                                <div class="imgArea" style="background-image: url('images/common/sample.png');"></div>-->
<!--                                <mark class="FC-01">#Film</mark>-->
<!--                                <p class="FC-01">당신은 나의 영웅, 바로고가 응원합니다.</p>-->
<!--                            </div>-->
<!--                            <div class="swiper-slide">-->
<!--                                <div class="imgArea" style="background-image: url('images/common/sample.png');"></div>-->
<!--                                <mark class="FC-01">#Film</mark>-->
<!--                                <p class="FC-01">당신은 나의 영웅, 바로고가 응원합니다.</p>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </section>

            <div class="supportArea">
                <div>
                    <div class="CW">
                        <mark class="TC-03" title="대한민국 대표 브랜드들이 바로고와 함께 합니다">대한민국 대표 브랜드들이 바로고와 함께 합니다</mark>
                        <b class="FC-01">B2B 브랜드</b>
                        <span>B2B 브랜드 이미지</span>
                        <b class="FC-01">주문중개 플랫폼</b>
                        <span>주문중개 플랫폼 이미지</span>
                        <b class="FC-01">협업사 & 협력 단체</b>
                        <span>협업사 & 협력 단체 이미지</span>
                    </div>
                </div>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </div>
    <!-- 라이더 지원 컨텐츠 fin -->

    
    <a href="riderInquiry.php" class="fixedLink">바로 지원하기</a>
    <button class="topBtn">최상단으로 이동</button>
</body>
</html>