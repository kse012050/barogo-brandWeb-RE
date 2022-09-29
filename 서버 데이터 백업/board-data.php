<?php include "head.php"; ?>
<body>
    <div class="boardPage">
        <?php include "header.php"; ?>

        <section class="CW">
            <h2>자료실
                <small>필요한 자료를 다운로드 받아 활용하세요</small>
            </h2>
            <?php
            if(checkArray($tags,true)){
                ?>
                <ul class="listArea">
                    <?php
                    foreach ($tags as $item){
                        $active = "";
                        if($item["tag_name"] == $tag) $active = 'class="active"';
                        if(empty($tag) && $item["tag_name"] == "ALL")$active = 'class="active"';
                        ?>
                        <li data-tag="<?=$item["tag_name"]?>" <?=$active?> onclick=""><a onclick="">#<?=$item["tag_name"]?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>

            <ul class="boardArea">
                <form id="formSearch" action="<?= $thisfilename ?>">
                    <input type="hidden" name="page" id="page" value="<?=$page?>">
                    <input type="hidden" name="tag"  id="tag" value="<?=$tag?>">
                </form>
                <?php
                if (checkArray($list, true)) {
                    foreach ($list as $item) {
                        ?>
                        <li>
                            <?php
                            if(!empty($item["thum_file_path"])){
                                ?>
                                <img src="<?=$item["thum_file_path"]?>" alt="임시 이미지">
                                <?php
                            }
                            ?>
                            <div>
                                <mark>#<?=$item["tag_name"]?></mark>
                                <p><?=$item["subject"]?></p>
                                <time><?=$item["reg_date"]?></time>
                            </div>
                            <a href="detail-data?id=<?=$item["board_id"]?>">
                                게시물 보기
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>

<!--                <li>-->
<!--                    <img src="https://via.placeholder.com/160x120" alt="임시 이미지">-->
<!--                    <div>-->
<!--                        <mark>#태그1</mark>-->
<!--                        <p>허브창업 지원 포스터</p>-->
<!--                        <time>2022.07.01</time>-->
<!--                    </div>-->
<!--                    <a href="detail-data.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="https://via.placeholder.com/160x120" alt="임시 이미지">-->
<!--                    <div>-->
<!--                        <mark>#태그1</mark>-->
<!--                        <p>허브창업 지원 포스터</p>-->
<!--                        <time>2022.07.01</time>-->
<!--                    </div>-->
<!--                    <a href="detail-data.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="https://via.placeholder.com/160x120" alt="임시 이미지">-->
<!--                    <div>-->
<!--                        <mark>#태그1</mark>-->
<!--                        <p>허브창업 지원 포스터</p>-->
<!--                        <time>2022.07.01</time>-->
<!--                    </div>-->
<!--                    <a href="detail-data.php">-->
<!--                        게시물 보기-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="https://via.placeholder.com/160x120" alt="임시 이미지">-->
<!--                    <div>-->
<!--                        <mark>#태그1</mark>-->
<!--                        <p>허브창업 지원 포스터</p>-->
<!--                        <time>2022.07.01</time>-->
<!--                    </div>-->
<!--                    <a href="detail-data.php">-->
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