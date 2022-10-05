<?php include "head.php"; ?>
<body>
    <div class="introBox">
        <div class="BG">

        </div>
        <p class="textArea">
            <span>ANYTHING</span><br/>
            <span>FROM</span><br/>
            <span>ANYWHERE</span>
        </p>
    </div>
    <div class="mainPage">
        <?php include "header.php"; ?>

        <!-- 배달대행 -->
        <main class="deliveryPage">
            <!-- 페이지 상단 부분 공통 -->
            <section class="topBox">
                <div class="CW">
                    <h2 class="TC-02">
                        무엇이든 어디서나<br/>
                        배달은 누구보다 확실하게
                    </h2>
                    <a href="deliveryInquiry" class="BTN-arrow">바로 문의하기</a>
                </div>
                <div class="imgArea">
                    배달대형문의 이미지
                </div>
            </section>

            <section class="qualitativeArea">
                <div class="CW">
                    <h2 class="TC-02">
                        사장님의 정성 그대로<br/>
                        빠르고 확실하게
                    </h2>
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
                                    <img src="images/delivery/qualitative01.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="textArea">
                                    <mark class="TC-03"><?=getValue($content,"depth2_subject2")?></mark>
                                    <p class="FC-01">
                                        <?=nl2br(getValue($content,"depth2_content2"))?>
                                    </p>
                                    <div>
                                        <a <?=homepageLinkCheck(getValue($content,"link1"))?> class="BBTN-download">사장님 프로그램</a>
                                        <a <?=homepageLinkCheck(getValue($content,"link2"))?> class="BBTN-download">사용 설명서</a>
                                    </div>
                                </div>
                                <div class="imgArea">
                                    <video src="video/delivery/qualitative01.mp4" autoplay muted loop></video>
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
                                    <video src="video/delivery/qualitative03.mp4" autoplay muted loop></video>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>

            <section class="mindArea">
                <div class="CW">
                    <div class="imgArea">
                        <img src="images/delivery/mind.png" alt="사장님의 따뜻한 마음 그대로 이미지">
                    </div>
                    <div class="textArea">
                        <h2 class="TC-02">사장님의 따뜻한 마음 그대로</h2>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth3_content1"))?>
                        </p>
                        <p class="FC-01">배달 전문가가 우리 메뉴에 꼭 맞는<br/>패키지를 추천해드립니다.</p>
                        <a <?=homepageLinkCheck(getValue($content,"link3"))?> class="BBTN-go">패키지 더 알아보기</a>
                    </div>
                </div>
            </section>

            <section class="knowHowArea">
                <div class="CW">
                    <div class="textArea">
                        <h2 class="TC-02">성공하는 매장의 노하우</h2>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth4_content1"))?>
                        </p>
                        <ul>
                            <li><a <?=homepageLinkCheck(getValue($content,"link4"))?> class="BBTN-subscribe">바로레터 구독하기</a></li>
                            <li><a <?=homepageLinkCheck(getValue($content,"link5"))?> class="BBTN-download">트랜드 리포트</a></li>
                        </ul>
                    </div>
                    <div class="imgArea">
                        <img src="images/delivery/knowHow.png" alt="성공하는 매자의 노하우 이미지">
                    </div>
                </div>
            </section>

            <section class="distributionArea" data-scroll="animation">
                <div class="CW">
                    <div class="imgArea">
                        <img src="images/delivery/distribution.png" alt="프리미엄 라스트마일 물류 서비스 이미지" data-scroll="target">
                    </div>
                    <div class="textArea overLine-right">
                        <h2 class="TC-02">
                            기업 고객을 위한<br/>
                            프리미엄 라스트마일 물류 서비스
                        </h2>
                        <mark class="TC-03" title="<?=getValue($content,"depth5_subject1")?>"><?=getValue($content,"depth5_subject1")?></mark>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth5_content1"))?>
                        </p>
                        <mark class="TC-03" title="<?=getValue($content,"depth5_subject2")?>"><?=getValue($content,"depth5_subject2")?></mark>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth5_content2"))?>
                        </p>
                    </div>
                </div>
            </section>

            <div class="bannerArea">
                <div class="CW">
                    <p>
                        <?=nl2br(getValue($content,"depth6_content1"))?>
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
                                    <div class="swiper-slide" onclick="javascript:location.href='<?=ARCHIVE_URL?>/detail/<?=$archive["board_id"]?>'">
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
    <a href="deliveryInquiry" class="fixedLink">바로 문의하기</a>
</body>
</html>