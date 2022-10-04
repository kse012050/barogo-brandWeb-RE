<?php include "head.php"; ?>
<body>
    <div class="detailPage">
        <?php include "header.php"; ?>

        <section class="CW">
            <h2 class="hiddenText">공지사항 상세 페이지</h2>
            <div class="titleArea">
                <h3><?=$data["subject"]?></h3>
                <time><?=$data["reg_date"]?></time>
            </div>
            <div class="contentArea">
                <?=stripslashes($data["content"])?>
            </div>
            <a href="news">목록으로</a>
        </section>

    </div>

    <?php include "footer.php"; ?>
</body>
</html>