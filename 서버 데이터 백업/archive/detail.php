<?php include "head.php"; ?>
<body>
    <div class="detailPage">
        <?php include "header.php"; ?>

        <main>
            <div class="imgBox" style="background-image: url('images/detail/top-detail.png');">
                상단 이미지
                <!-- 게시판 분류 목록 리스트 , '상단 이미지' 글자보다 아래 있어야 합니다 -->
                <span>NEW</span>
            </div>

            <article>
                <div class="pager">
                    HOME
                    <span>Article</span>
                </div>
                <h2>
                    <?= $data["subject"] ?>
                </h2>
                <time><?= $data["reg_date"] ?></time>
                <?php
                    // 기획 기사?
                    $thum_p = $data["thum_p"];
                    if(!is_null($thum_p)){
                        ?>
                        <img src="<?=$thum_p["url"]?>" alt="임시 이미지">
                        <?php
                    }
                ?>
                <?= stripslashes($data["content"]) ?>

                <?php
                // 게시판의 태그가 있을 경우
                if (checkArray($data["tags"], true)) {
                    echo '<ul>';
                    foreach ($data["tags"] as $tag) {
                        ?>
                        <li><a href=""><?=$tag["tag_name"]?></a></li>
                        <?php
                    }
                    echo '</ul>';
                }
                ?>

                <?php
                    $scheme = (isHttpsRequest()) ? "https://" : "http://";
                    $url    = $scheme . $_SERVER['HTTP_HOST'] . "/share/".$data["board_id"];
                ?>
                <a href=""  onclick="copyToClipboard('<?=$url?>')" class="shareBtn">공유하기</a>

                <?php


                if(checkArray($data["boards"],true)){
                    ?>
                    <section>
                        <h3>다른 아티클 보기</h3>
                        <?php
                        foreach ($data["boards"] as $board){
                            $content   = stripslashes($board["content"]);
                            $content   = strip_tags($content);
                            if(mb_strlen($content)>110){
                                $content = mb_str_split($content,110);
                                $content = (count($content)>0) ? $content[0]."..." : "";
                            }
                            ?>
                            <a href="detail?id=<?=$board["board_id"]?>">
                                <div class="textArea">
                                    <mark><?=$board["tag_name"]?></mark>
                                    <strong><?=$board["subject"]?></strong>
                                    <p><?=$content?></p>
                                </div>
                                <div class="imgBox" style="background-image: url('<?=(!empty($board["ct_thum_file_path"]))?$board["ct_thum_file_path"]:$board["cp_thum_file_path"]?>');">이전 아티클 이미지</div>
                            </a>
                            <?php
                        }
                        ?>

<!--                        <a href="">-->
<!--                            <div class="textArea">-->
<!--                                <mark>뉴스</mark>-->
<!--                                <strong>당신은 나의 영웅입니다</strong>-->
<!--                                <p>언제 어디서나 바로고는 당신과 함께하겠습니다. 언제 어디서나 바로고는 당신과 함께하겠습니다.</p>-->
<!--                            </div>-->
<!--                            <div class="imgBox" style="background-image: url('https://via.placeholder.com/240x130');">다음 아티클 이미지</div>-->
<!--                        </a>-->
                    </section>
                    <?php
                }
                ?>

            </article>
        </main>

        <?php include "../footer.php"; ?>
    </div>
</body>
</html>