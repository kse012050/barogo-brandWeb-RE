<?php include "head.php"; ?>
<body>
    <div class="boardPage">
        <?php include "header.php"; ?>

        <section class="CW disclosureArea">
            <h2>공시</h2>
<!--            <ul class="listArea">-->
<!--                <li class="active"><a href="">수시공시</a></li>-->
<!--                <li><a href="">정기보고서</a></li>-->
<!--                <li><a href="">순자본비율</a></li>-->
<!--            </ul>-->
            <ul class="boardArea">

                <?php

                if (checkArray($list, true)) {
                    foreach ($list as $item) {
                        ?>
                        <li>
                            <div>
                                <p><?=$item["subject"]?></p>
                                <time><?=$item["reg_date"]?></time>
                            </div>
                            <a <?=homepageLinkCheck($item["file_path"])?>>다운로드</a>
                            <a href="detail-disclosure?id=<?=$item["board_id"]?>">
                                게시물 보기
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>


<!--                <li>-->
<!--                    <div>-->
<!--                        <p>임시주주총회 결과</p>-->
<!--                        <time>2022.07.27</time>-->
<!--                    </div>-->
<!--                    <a href="http://www.google.com">다운로드</a>-->
<!--                    <a href="detail-disclosure.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div>-->
<!--                        <p>[주요 경영상황 공시] 임시 주주총회 소집결의</p>-->
<!--                        <time>2022.07.27</time>-->
<!--                    </div>-->
<!--                    <a href="http://www.google.com">다운로드</a>-->
<!--                    <a href="detail-disclosure.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div>-->
<!--                        <p>신주발행 및 신주배정기준일 공고</p>-->
<!--                        <time>2022.07.27</time>-->
<!--                    </div>-->
<!--                    <a href="http://www.google.com">다운로드</a>-->
<!--                    <a href="detail-disclosure.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div>-->
<!--                        <p>임시주주총회 결과</p>-->
<!--                        <time>2022.07.27</time>-->
<!--                    </div>-->
<!--                    <a href="http://www.google.com">다운로드</a>-->
<!--                    <a href="detail-disclosure.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div>-->
<!--                        <p>[주요 경영상황 공시] 임시 주주총회 소집결의</p>-->
<!--                        <time>2022.07.27</time>-->
<!--                    </div>-->
<!--                    <a href="http://www.google.com">다운로드</a>-->
<!--                    <a href="detail-disclosure.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
            <?php  echo settingNavWeb($page, $total_count, $limit); ?>
        </section>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>