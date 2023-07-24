<?php include "head.php"; ?>
<body class="bodyHidden">
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

        <?php
        if(getSiteIntoValue($site,"popup_exposure_yn") == Y){
            $comment    = getSiteIntoValue($site,"popup_content");
            $commentArr = explode("\n",$comment);

            $popupComment = "";
            foreach ($commentArr as $value){
                $popupComment .= "<p>".$value."</p>";
            }
            ?>
            <div class="popupBox" data-popup="mainPopup">
                <div>
                    <strong><mark><?=getSiteIntoValue($site,"popup_title")?></mark></strong>
                    <div class="textArea">
                        <?=$popupComment?>
                    </div>
                    <div class="btnArea">
                        <button data-close="mainPopup">닫기</button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


        <!-- 배달대행 -->
        <main class="deliveryPage" data-scroll="area">
            <div data-scroll="area" class="active">
                <!-- 페이지 상단 부분 공통 -->
                <section class="topBox">
                    <div class="CW">
                        <h1 class="TC-02">
                            무엇이든 어디서나<br/>
                            배달은 누구보다 확실하게
                        </h1>
                        <a href="deliveryInquiry" class="BTN-arrow">바로 문의하기</a>
                    </div>
                    <div class="imgArea">
                        배달대형문의 이미지
                    </div>
                    <span></span>
                </section>

                <section class="qualitativeArea" data-scrollAni="move">
                    <div class="CW">
                        <h2 class="TC-02">
                            사장님의 정성 그대로<br/>
                            빠르고 확실하게
                        </h2>

                        <div>
                            <ul class="pageBox" data-scroll="target">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul data-scroll="target" class="scrollSlider">
                                <li class="active">
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth2_subject1")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth2_content1"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <img src="images/delivery/qualitative01.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth2_subject2")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth2_content2"))?>
                                        </p>
                                        <div class="btnArea">
                                            <a <?=homepageLinkCheck((checkArrayVal("file1",$content)?getValue($content,"file1"):getValue($content,"link1")))?> title="바로고 사장님 프로그램 다운로드" class="BBTN-download">사장님 프로그램</a>
                                            <a <?=homepageLinkCheck((checkArrayVal("file2",$content)?getValue($content,"file2"):getValue($content,"link2")))?> title="바로고 사장님 프로그램 사용 설명서" class="BBTN-download">사용 설명서</a>
                                        </div>
                                    </div>
                                    <div class="imgArea">
                                        <video src="video/delivery/qualitative01.mp4" autoplay muted loop></video>
                                    </div>
                                </li>
                                <li>
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth2_subject3")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth2_content3"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <video src="video/delivery/qualitative03.mp4" autoplay muted loop></video>
                                    </div>
                                </li>
                            </ul>
                        </div>
                       
                        
                        
                        

                        <!-- <div class="swiper partSlider">
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
                                            <a <?=homepageLinkCheck((checkArrayVal("file1",$content)?getValue($content,"file1"):getValue($content,"link1")))?> class="BBTN-download">사장님 프로그램</a>
                                            <a <?=homepageLinkCheck((checkArrayVal("file2",$content)?getValue($content,"file2"):getValue($content,"link2")))?> class="BBTN-download">사용 설명서</a>
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
                        </div> -->
                    </div>
                </section>
            </div>

            <!-- <section class="mindArea">
                <div class="CW">
                    <div class="imgArea">
                        <img src="images/delivery/mind.png" alt="사장님의 따뜻한 마음 그대로 이미지">
                    </div>
                    <div class="textArea">
                        <h2 class="TC-02">사장님의 따뜻한 마음 그대로</h2>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth3_content1"))?>
                        </p>
                        <a <?=homepageLinkCheck((checkArrayVal("file3",$content)?getValue($content,"file3"):getValue($content,"link3")))?> class="BBTN-go">패키지 더 알아보기</a>
                    </div>
                </div>
            </section> -->

            <section class="knowHowArea">
                <div class="CW">
                    <div class="textArea">
                        <h2 class="TC-02">성공하는 매장의 노하우</h2>
                        <p class="FC-01">
                            <?=nl2br(getValue($content,"depth4_content1"))?>
                        </p>
                        <ul>
                            <li><a <?=homepageLinkCheck((checkArrayVal("file4",$content)?getValue($content,"file4"):getValue($content,"link4")))?> title="바로레터 구독하기" class="BBTN-subscribe">바로레터 구독하기</a></li>
                            <li><a <?=homepageLinkCheck((checkArrayVal("file5",$content)?getValue($content,"file5"):getValue($content,"link5")))?> title="바로고 딜리버리 리포트 다운로드" class="BBTN-download">딜리버리 리포트</a></li>
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
                    <div class="textArea overLine-right-active">
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

            <?php
            $content_exposure_yn = getValue($content,"content_exposure_yn");
            if($content_exposure_yn != N){
                ?>
                <section class="sliderBox">
                    <div class="CW">
                        <div class="titleArea">
                            <h2 class="TC-02">바로고 사장님</h2>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="swiper bottomSlider">
                            <div class="swiper-wrapper">
                                <?php
                                if(checkArray($archives,true)){
                                    foreach ($archives as $archive){
                                        ?>
                                        <div class="swiper-slide" onclick="javascript:location.href='<?=ARCHIVE_URL?>/detail/<?=$archive["board_id"]?>'" style="cursor: pointer">
                                            <div class="imgArea" style="background-image: url('<?=imageDomainCheck($archive["thum_file_path"])?>');"></div>
                                            <mark class="FC-01">#<?=$archive["tag_name"]?></mark>
                                            <p class="FC-01"><?= stripslashes($archive["subject"]) ?></p>
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
                <?php
            }

            ?>


            <div class="supportArea">
                <div>
                    <div class="CW">
                        <mark class="TC-03" title="대한민국 대표 브랜드들이 바로고와 함께 합니다">대한민국 대표 브랜드들이 바로고와 함께 합니다</mark>
                        <b class="FC-01">B2B 브랜드</b>
                        <span>B2B 브랜드 이미지</span>
                        <b class="FC-01">주문 중개 플랫폼</b>
                        <span>주문중개 플랫폼 이미지</span>
                        <b class="FC-01">협업사 & 협력 단체</b>
                        <span>협업사 & 협력 단체 이미지</span>
                    </div>
                </div>
                <button class="topBtn">최상단으로 이동</button>
            </div>
            <?php include "footer.php"; ?>
        </main>
    </div>
    <a href="deliveryInquiry" class="fixedLink">바로 문의하기</a>
</body>
</html>
