<?php include "head.php"; ?>
<body>
<div class="detailPage">
    <?php include "header.php"; ?>

    <section class="CW">
        <h2 class="hiddenText">자료실 상세 페이지</h2>
        <div class="titleArea">
            <?php
            // 게시판의 태그가 있을 경우
            if (checkArray($data["tags"], true)) {
                foreach ($data["tags"] as $tag) {
                    ?>
                    <mark>#<?=$tag["tag_name"]?></mark>
                    <?php
                }

            }
            ?>
            <h3><?= $data["subject"] ?></h3>
            <time><?= $data["reg_date"] ?></time>
        </div>
        <div class="contentArea">
            <?= stripslashes($data["content"]) ?>
        </div>

        <?php
        // 첨부파일이 있을 경우 
        if (checkArray($data["attach"], true)) {
            ?>
            <div class="fileArea">
                <ul class="textArea" title="첨부파일">
                    <?php
                    foreach ($data["attach"] as $attach) {
                        $filename = basename($attach["url"]);
                        ?>
                        <li><a <?= homepageLinkCheck($attach["url"]) ?>><?= $filename ?></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <?php
        }
        ?>
        <!--            <div class="fileArea">-->
        <!--                <ul class="textArea" title="첨부파일">-->
        <!--                    <li><a href="#">이미지1.jpg</a></li>-->
        <!--                    <li><a href="#">이미지2.jpg</a></li>-->
        <!--                    <li><a href="#">이미지3.jpg</a></li>-->
        <!--                    <li><a href="#">이미지4.jpg</a></li>-->
        <!--                    <li><a href="#">이미지5.jpg</a></li>-->
        <!--                </ul>-->
        <!--                <ul class="imgArea">-->
        <!--                    <li><a href="#" style="background-image: url('images/detail/sample.png');">이미지 다운로드</a></li>-->
        <!--                    <li><a href="#" style="background-image: url('images/detail/sample.png');">이미지 다운로드</a></li>-->
        <!--                    <li><a href="#" style="background-image: url('images/detail/sample.png');">이미지 다운로드</a></li>-->
        <!--                    <li><a href="#" style="background-image: url('images/detail/sample.png');">이미지 다운로드</a></li>-->
        <!--                    <li><a href="#" style="background-image: url('images/detail/sample.png');">이미지 다운로드</a></li>-->
        <!--                </ul>-->
        <!--            </div>-->

        <a href="board-data">목록으로</a>
    </section>

</div>

<?php include "footer.php"; ?>
</body>
</html>