<?php include "../head.php"; ?>
<body>
    
    <div class="policyPage">
    <?php include "../header.php"; ?>
    <main class="CW">
        <h2>위치기반서비스이용약관</h2>
        <!-- 에디터 기능 contentArea 클래스 추가-->
        <div class="contentArea">
            <?=stripslashes(getSiteIntoValue($site,"policy_locationbased"))?>
        </div>
    </main>
    <?php include "../footer.php"; ?>
    </div>
</body>
</html>