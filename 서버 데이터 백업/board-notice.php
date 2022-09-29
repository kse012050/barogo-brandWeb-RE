<?php include "head.php"; ?>

<body>
    <div class="boardPage">
        <?php include "header.php"; ?>

        <section class="CW">
            <h2>공지사항</h2>
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
                            <a href="detail-notice?id=<?=$item["board_id"]?>">
                                게시물 보기
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <?php  echo settingNavWeb($page, $total_count, $limit); ?>

        </section>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>