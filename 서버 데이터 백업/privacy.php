<?php include "../head.php"; ?>
<body>

<div class="policyPage">
    <?php include "../header.php"; ?>
    <main class="CW">
        <h2>개인정보처리방침</h2>
        <!-- 에디터 기능 contentArea 클래스 추가-->
        <div class="contentArea">
            <?=stripslashes(getSiteIntoValue($site,"policy_privacy"))?>
        </div>
    </main>
    <?php include "../footer.php"; ?>
</div>
</body>
</html>