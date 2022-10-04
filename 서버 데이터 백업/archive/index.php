<?php include "head.php"; ?>
<body>
    <div class="mainPage">
        <?php include "header.php"; ?>

        <main class="mainArea">
            <div class="leftArea">
                <div>
                    <div>
                        <b>Film <span>#12</span></b>
                    </div>
                    <img src="images/main/left01.png" alt="Film #12 당신은 나의 영웅 바로고가 당신을 응원합니다">
                </div>
                <div>
                    <div>
                        <b>Article</b>
                        <p>
                            바로고의 위대한 여정을<br/>
                            당신과 함께 시작합니다.
                        </p>
                    </div>
                    <img src="images/main/left02.png" alt="article 영역 배경 이미지">
                </div>
                <div>
                    <div>
                        <b>Poeple <span>#11</span></b>
                        <p>
                            청주상당허브로<br/>
                            지금 바로 떠나보실까요?
                        </p>
                    </div>
                    <img src="images/main/left03.png" alt="poeple 영역 배경 이미지">
                </div>
            </div>
            <section>
                <h2>Contents Archieve</h2>
                <ul class="listBox">
                    <?php
                    global $list;
                    if(checkArray($list,true)){
                        foreach ($list as $item){
                            // >> 본문 html태그 다 없애기
                            // >> 두줄로 제한해야되기 떄문에
                            $content   = stripslashes($item["content"]);
                            $content   = strip_tags($content);
                            if(mb_strlen($content)>110){
                                $content = mb_str_split($content,110);
                                $content = (count($content)>0) ? $content[0]."..." : "";
                            }
                            ?>
                            <li>
                                <a href="detail?id=<?=$item["board_id"]?>">
                                    <img src="<?=(!empty($item["ct_thum_file_path"]))?$item["ct_thum_file_path"]:$item["cp_thum_file_path"]?>" alt="">
                                    <strong><?=$item["subject"]?></strong>
                                    <p><?=$content?></p>
                                    <time><?=str_replace("-",".",$item["reg_date"])?></time>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>

<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/main/right02.png" alt="">-->
<!--                            <strong>바로고, 비전ㆍCI변경 ‘초연결 생태계 플랫폼으로 도약’</strong>-->
<!--                            <p>바로고가 새로운 비전과 기업 이미지(CI)를 선보이고, ‘세상에 활력을 더하는 초연결 생태계 플랫폼’으로 도약한다고 18일 밝혔다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/main/right03.png" alt="">-->
<!--                            <strong>바로고, 딜리버리랩과 상점주 위한 식자재 유통 효율화 방안 모색</strong>-->
<!--                            <p>바로고가 식자재 통합 유통 플랫폼 ‘오더히어로’의 운영사 ‘딜리버리랩’과 전략적 투자 계약을 체결했다고 12일 밝혔다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/main/right04.png" alt="">-->
<!--                            <strong>바로고 도시주방, ‘밀집’과 MOU… ‘외식 브랜드 경쟁력 강화’</strong>-->
<!--                            <p>바로고가 운영하는 주방 플랫폼 '도시주방'이 '밀집'과 MOU를 체결했습니다. 양사는 외식 브랜드 경쟁력 강화 및 공동 사업 분야 발굴을 위해 협업할 계획입니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/main/right05.png" alt="">-->
<!--                            <strong>바로고, KT 알뜰폰 유심배송…“배송 품목 범위 확장”</strong>-->
<!--                            <p>바로고가 KT와 서비스 제휴를 맺고 알뜰폰 유심을 배송한다고 19일 밝혔다. 바로고가 KT와 서비스 제휴를 맺고 알뜰폰 유심을 배송한다고 19일 밝혔다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/main/right06.png" alt="">-->
<!--                            <strong>당신은 나의 영웅, 바로고가 응원합니다</strong>-->
<!--                            <p>2022년 바로고는 새로운 도약을 준비합니다.-->
<!--                                세상에 활력을 더하는 초연결 생태계를 만드는 것.-->
<!--                                새롭게 태어날 바로고가 달려갈 길입니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php"></a>-->
<!--                        <img src="images/main/right07.png" alt="">-->
<!--                        <strong>늘 믿고 맡기는 바로고 TGIF 롯데캐슬 잠실점</strong>-->
<!--                        <p>'신속정확한 배달, 바로고에 믿고 맡겨요!'</p>-->
<!--                        <time>2022.06.15</time>-->
<!--                    </li>-->
                </ul>
            </section>
        </main>

        <?php include "../footer.php"; ?>
    </div>
</body>
</html>