<?php include "head.php"; ?>
<body>
    <div class="detailPage">
        <?php include "header.php"; ?>

        <section class="CW">
            <h2 class="hiddenText">공시 상세 페이지</h2>
            <div class="titleArea">
                <h3><?=$data["subject"]?></h3>
                <time><?=$data["reg_date"]?></time>
            </div>
            <div class="contentArea">
                <?=stripslashes($data["content"])?>
            </div>
            <?php
            if(checkArray($data["attach"],true)){
                ?>
                <div class="fileArea">
                    <ul class="textArea" title="첨부파일">
                        <?php
                        foreach ($data["attach"] as $attach){
                            $filename = basename($attach["url"]);
                            ?>
                            <li><a <?=homepageLinkCheck($attach["url"])?>><?=$filename?></a></li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <?php
            }
            ?>

            <a href="board-disclosure.php">목록으로</a>
        </section>

    </div>

    <?php include "footer.php"; ?>
</body>
</html>