<?php include "head.php"; ?>
<body class="bodyHidden">
    <?php 
        $userAgent = $_SERVER["HTTP_USER_AGENT"]; 
        if ( preg_match("/Trident*/", $userAgent &&  preg_match("/rv:11.0*/", $userAgent &&  preg_match("/Gecko*/", $userAgent) ) ) ) {
        }else{
            ?>
            <script src="js/aboutUs-graph.js"></script>
            <?php 
        }
    ?>
    <div class="aboutUsPage">
        <?php include "header.php"; ?>

        <main data-scroll="area" class="">
            <div data-scroll="area" class="active">
                <section class="makeArea">
                    <h2 class="CW TC-01">
                        세상에 활력을 더하는<br/>
                        초연결 생태계를 만듭니다.
                    </h2>
                    <div>
                        <div class="CW">
                            <p>
                                바로고는 기존의 배달, 물류산업을 넘어 무한한 연결을 실현하여<br class="mobile"/>
                                상생, 성장, 나눔의 新물류 시대를 열어갑니다.
                            </p>
                        </div>
                    </div>
                    <p>
                        <?=nl2br(getValue($content,"depth2_content1_a"))?>
                    </p>
                    <p>
                        <?=nl2br(getValue($content,"depth2_content1_b"))?>
                    </p>
                    <ul>
                        <li>
                            <strong><?=getValue($content,"depth2_subject2")?></strong>
                            <p>
                                <?=nl2br(getValue($content,"depth2_content2"))?>
                            </p>
                        </li>
                        <li>
                            <strong><?=getValue($content,"depth2_subject3")?></strong>
                            <p>
                                <?=nl2br(getValue($content,"depth2_content3"))?>
                            </p>
                        </li>
                        <li>
                            <strong><?=getValue($content,"depth2_subject4")?></strong>
                            <p>
                                <?=nl2br(getValue($content,"depth2_content4"))?>
                            </p>
                        </li>
                    </ul>
                </section>

                <p class="metaArea">
                    <span class="blackColor">META LOGISTICS UNIVERSE</span><mark>META LOGISTICS UNIVERSE</mark><span class="grayColor">META LOGISTICS UNIVERSE</span>
                </p>

                <section class="toDoArea">
                    <div class="CW">
                        <div class="titleArea">
                            <h2 class="TC-02">초연결 생태계를 만들기 위해 바로고가 하는 것</h2>
                            <p class="FC-01">
                                바로고는 상점-라이더-고객을 잇는 라스트마일 인프라를 넘어<br/>
                                수많은 파트너들의 꿈과 기회를 연결하며, Meta Logistics의 시대를 열어갑니다.
                            </p>
                        </div>
                         <!-- 슬라이더 -->
                         <div class="swiper partSlider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject1")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth3_content1"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <img src="images/aboutUs/toDo01.png" alt="배달대행 플랫폼 이미지">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject2")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth3_content2"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <img src="images/aboutUs/toDo02.png" alt="사륜 물류 배송 서비스 이미지">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject3")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth3_content3"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <img src="images/aboutUs/toDo03.png" alt="도시주방 이미지">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="textArea">
                                        <mark class="TC-03"><?=getValue($content,"depth3_subject4")?></mark>
                                        <p class="FC-01">
                                            <?=nl2br(getValue($content,"depth3_content4"))?>
                                        </p>
                                    </div>
                                    <div class="imgArea">
                                        <img src="images/aboutUs/toDo04.png" alt="배달 패키지 이미지">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!-- 슬라이더 fin -->
                    </div>
                </section>

                <section class="numberArea" data-specialAni="graph" data-eventAni="count">
                    <div class="CW">
                        <div class="textArea">
                            <h2>숫자로 보는 바로고</h2>
                            <p>
                                <?=nl2br(getValue($content,"depth4_content1"))?>
                            </p>
                        </div>
                        <div class="countArea">
                            <div class="graphArea">
                                <mark id="percent" data-eventAni="target" data-startCount="0" data-endCount="<?=getValue($content,"depth4_subject1_a")?>">0</mark>
                                <img src="images/common/graph.png" alt="그래프 배경">
                                <canvas id="graph"></canvas>
                            </div>
                            <div class="yearArea">
                                <h3 id="year" data-eventAni="target" data-startCount="2016" data-endCount="2022">2016</h3>
                                <ul>
                                    <li title="허브 수">
                                        <p id="herbs" data-eventAni="target" data-startCount="190" data-endCount="<?=getValue($content,"depth4_subject1_c")?>">190</p>
                                    </li>
                                    <li title="활동 라이더 수">
                                        <p id="riders" data-eventAni="target" data-startCount="14,000" data-endCount="<?=getValue($content,"depth4_subject1_b")?>">14,000</p>
                                    </li>
                                    <li title="등록 상점 수">
                                        <p id="store" data-eventAni="target" data-startCount="8,000" data-endCount="<?=getValue($content,"depth4_subject1_d")?>">8,000</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="roadArea" data-scrollAni="move">
                    <div class="CW">
                        <div class="textArea">
                            <h2>바로고가 걸어온 길</h2>
                            <p>
                                딜리버리 플랫폼 시대의 첫 장을 펴낸 바로고. 
                                바로고의 역사는 그대로 대한민국 라스트마일 
                                딜리버리의 역사가 됩니다. 
                            </p>
                            <div class="yearArea scrollBox">
                                <ol data-scroll="target">
                                    <li class="active">2015 - 2017</li>
                                    <li>2018 - 2019</li>
                                    <li>2020 - 현재</li>
                                </ol>
                            </div>
                        </div>
                        <div class="monthArea">
                            <ol class="overLine-right" data-scroll="target">
                                <li>
                                    <strong>2015 - 2017</strong>
                                    <ol>
                                        <li title="2015.02">바로고 법인 설립</li>
                                        <li title="2015.08">B2B 첫 계약</li>
                                        <li title="2016.08">월 배송 건 수 100만 건 돌파</li>
                                    </ol>
                                </li>
                                <li>
                                    <strong>2018 - 2019</strong>
                                    <ol>
                                        <li title="2018.05">시리즈 A 투자 (200억원)</li>
                                        <li title="2019.04">바로고앤 설립</li>
                                        <li title="2019.06">시리즈 B & B+ 투자 (200억원)</li>
                                        <li title="2019.09">누적 배달 건수 1억건 돌파</li>
                                        <li title="2019.09">모빌리티 플랫폼 무빙(50/50 JV) 설립</li>
                                        <li title="2019.12">예비 유니콘 선정</li>
                                    </ol>
                                </li>
                                <li class="active">
                                    <strong>2020 - 현재</strong>
                                    <ol>
                                        <li title="2020.10">
                                            도시주방(바로고의 공유주방 브랜드) 1호점 오픈</small>
                                            <div class="imgArea">
                                                <img src="images/aboutUs/2020-01.png" alt="2020.01 이미지">
                                            </div>
                                        </li>
                                        <li title="2021.01">시리즈 C & C+ 투자 (1500억원)</li>
                                        <li title="2021.07">월 배달 건 수 1,893만 건 돌파</li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </section>
            </div>

            <section class="breandArea">
                <div class="CW">
                    <h2>
                        BAROGO<br/>
                        Brand Identity
                    </h2>
                    <div>
                        <p>
                            <?=nl2br(getValue($content,"depth5_content1_a"))?>
                        </p>
                        <p>
                            <?=nl2br(getValue($content,"depth5_content1_b"))?>
                        </p>
                    </div>
                    <ul title="LOGO SYSTEM" class="logoArea">
                        <li>
                            <b>Horizontal</b>
                            <img src="images/aboutUs/logoSystem01.png" alt="Horizontal">
                        </li>
                        <li>
                            <b>Vertical</b>
                            <img src="images/aboutUs/logoSystem03.png" alt="Vertical">
                        </li>
                    </ul>
                    <ul title="COLOR SYSTEM" class="colorArea">
                        <li>
                            <b>VITAL ORANGE</b>
                            <p>
                                Pantone 1655C<br/>
                                RGB 250 80 20<br/>
                                CMYK 0 75 100 0 <br/>
                                #FA5014
                            </p>
                        </li>
                        <li>
                            <b>BLACK</b>
                            <p>
                                RGB 0 0 0<br/>
                                CMYK 0 0 0 100 <br/>
                                #000000
                            </p>
                        </li>
                        <li>
                            <b>WHITE</b>
                            <p>
                                RGB 255 255 255<br/>
                                CMYK 0 0 0 0 <br/>
                                #FFFFFF 
                            </p>
                        </li>
                    </ul>
                    <ul title="SECONDARY COLOR SYSTEM" class="secondaryArea">
                        <li>
                            <b>VITAL BLUE</b>
                            <p>
                                RGB 45 60 230<br/>
                                CMYK 90 65 0 0<br/>
                                #2D3CE6
                            </p>
                        </li>
                        <li>
                            <b>LIGHT GRAY</b>
                            <p>
                                Cool Gray 2 C<br/>
                                RGB 220 220 220<br/>
                                CMYK 0 0 0 20
                            </p>
                        </li>
                    </ul>
                    <a <?=homepageLinkCheck("https://barogo.com/data/recruit/2021_바로고_배달_트렌드_리포트.pdf")?> class="BBTN-download">BI / GUIDE</a>
                </div>
            </section>

            <section class="sliderBox">
                <div class="CW">
                    <div class="titleArea">
                        <h2 class="TC-02">#바로고 소식</h2>
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
            <?php include "footer.php"; ?>
            <?php
            if(!empty(getSiteIntoValue($site,"recruiting_url"))){
                ?>
                <a href="<?=getSiteIntoValue($site,"recruiting_url")?>" class="fixedLink" target="_blank">인재채용 바로가기</a>
                <?php
            }
            ?>
        </main>
    </div>
</body>
</html>