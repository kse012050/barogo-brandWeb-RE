<?php include "head.php"; ?>
<body>
    <div class="mainPage">
        <?php include "header.php"; ?>

        <main class="foundedPage" data-scroll="fullPage">
            <section class="topBox">
                <div class="CW">
                    <h2 class="TC-02">
                        상생 물류 산업의 시작<br/>
                        바로고 허브
                    </h2>
                    <a href="foundedInquiry" class="BTN-arrow">바로 문의하기</a>
                </div>
                <div class="imgArea">
                    허브 창업 이미지
                </div>
            </section>

            <section class="reasonArea">
                <div class="CW">
                    <h2 class="TC-02">
                        바로고와 함께하는 이유
                    </h2>
                    <!-- 슬라이더 -->
                    <div class="swiper partSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="textArea">
                                    <mark class="TC-03"><?=getValue($content,"depth2_subject1")?></mark>
                                    <p class="FC-01">
                                        <?=nl2br(getValue($content,"depth2_content1"))?>
                                    </p>
                                </div>
                                <div class="imgArea">
                                    <div class="swiper foundedSlider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand01.png" alt="CU logo">
                                                <div>
                                                    <span>주문 금액 32,000원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand02.png" alt="Burger King logo">
                                                <div>
                                                    <span>주문 금액 11,000원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand03.png" alt="McDonald's logo">
                                                <div>
                                                    <span>주문 금액 47,000원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand04.png" alt="Baskin Robbins logo">
                                                <div>
                                                    <span>주문 금액 21,600원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand05.png" alt="Ediya logo">
                                                <div>
                                                    <span>주문 금액 19,800원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand06.png" alt="Paris Baguette logo">
                                                <div>
                                                    <span>주문 금액 24,800원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand07.png" alt="Dunkin logo">
                                                <div>
                                                    <span>주문 금액 12,000원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand08.png" alt="olive young logo">
                                                <div>
                                                    <span>주문 금액 56,000원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand09.png" alt="GS25 logo">
                                                <div>
                                                    <span>주문 금액 10,800원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="images/founded/brand10.png" alt="Lotteria logo">
                                                <div>
                                                    <span>주문 금액 22,500원</span>
                                                    <p>주문이 들어왔습니다</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="textArea">
                                    <mark class="TC-03"><?=getValue($content,"depth2_subject2")?></mark>
                                    <p class="FC-01">
                                        <?=nl2br(getValue($content,"depth2_content2"))?>
                                    </p>
                                </div>
                                <div class="imgArea">
                                    <img src="images/founded/reason02.png" alt="안정적 수입 창출">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="textArea">
                                    <mark class="TC-03"><?=getValue($content,"depth2_subject3")?></mark>
                                    <p class="FC-01">
                                        <?=nl2br(getValue($content,"depth2_content3"))?>
                                    </p>
                                </div>
                                <div class="imgArea">
                                    <img src="images/founded/reason03.png" alt="배달 중 문제 신속 해결">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- 슬라이더 fin -->
                </div>
            </section>
           
            
            <section class="growthArea" data-eventAni="count">
                <div class="CW">
                    <div>
                        <h2 class="TC-02">바로고의 놀라운 성장세</h2>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth3_content1"))?>
                        </p>
                    </div>
                    <ul>
                        <li>
                            <mark class="FC-01">월 배달 수행량</mark>
                            <p class="TC-03" data-eventAni="target" id="test01" data-endCount="<?=intval(getValue($content,"depth3_subject2"))?>"><?=number_format(getValue($content,"depth3_subject2"))?></p>
                        </li>
                        <li>
                            <mark class="FC-01">전문라이더</mark>
                            <p class="TC-03" data-eventAni="target" id="test02" data-endCount="<?=intval(getValue($content,"depth3_subject3"))?>"><?=number_format(getValue($content,"depth3_subject3"))?></p>
                        </li>
                        <li>
                            <mark class="FC-01">전국 허브</mark>
                            <p class="TC-03" data-eventAni="target" id="test03" data-endCount="<?=intval(getValue($content,"depth3_subject4"))?>"><?=number_format(getValue($content,"depth3_subject4"))?></p>
                        </li>
                        <li>
                            <mark class="FC-01">제휴 상점</mark>
                            <p class="TC-03" data-eventAni="target" id="test04" data-endCount="<?=intval(getValue($content,"depth3_subject5"))?>"><?=number_format(getValue($content,"depth3_subject5"))?></p>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="companionArea">
                <div class="CW">
                    <div class="textArea">
                        <h2 class="TC-02">
                            허브 성장의 동반자,
                            바로고와 함께하세요!
                        </h2>
                        <p class="FC-01">
                            바로고는 지금도 성장하는 중입니다.<br/>
                            상생 물류, 넥스트 물류 시대에 합류하세요!
                        </p>
                    </div>
                    <div class="imgArea">
                        <img src="images/founded/companion.png" alt="BAROGO 강남지사 이미지">
                    </div>
                    <ul>
                        <li>
                            <strong class="TC-03"><?=getValue($content,"depth4_subject1")?></strong>
                            <mark class="FC-01">
                                <?=nl2br(getValue($content,"depth4_content1_a"))?>
                            </mark>
                            <p>
                                <?=nl2br(getValue($content,"depth4_content1_b"))?>
                            </p>
                        </li>
                        <li>
                            <strong class="TC-03"><?=getValue($content,"depth4_subject2")?></strong>
                            <mark class="FC-01">
                                <?=nl2br(getValue($content,"depth4_content2_a"))?>
                            </mark>
                            <p>
                                <?=nl2br(getValue($content,"depth4_content2_b"))?>
                            </p>
                        </li>
                        <li>
                            <strong class="TC-03"><?=getValue($content,"depth4_subject3")?></strong>
                            <mark class="FC-01">
                                <?=nl2br(getValue($content,"depth4_content3_a"))?>
                            </mark>
                            <p>
                                <?=nl2br(getValue($content,"depth4_content3_b"))?>
                            </p>
                        </li>
                    </ul>
                </div>
            </section>

            <div class="bannerArea">
                <div class="CW">
                    <p>
                        <?=nl2br(getValue($content,"depth5_content1"))?>
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
                <button class="topBtn">최상단으로 이동</button>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </div>
    <!-- 허브 창업 컨텐츠 fin -->

    
    <a href="foundedInquiry" class="fixedLink">바로 문의하기</a>
</body>
</html>