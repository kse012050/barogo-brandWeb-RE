<header>
    <div class="CW">
        <h1><a href="/"><img src="<?=MAIN_IMG_URL?>/common/logo.png" alt="barogo logo"></a></h1>
        <nav>
            <ul>
                <li class="FC-01 <?=($thisfilename == FILE_INDEX) ? "active" :"" ?>"><a href="<?=MAIN_URL?>">배달대행 문의</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_RIDER) ? "active" :"" ?>"><a href="<?=MAIN_URL?>/rider">라이더 지원</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_FOUNDED) ? "active" :"" ?>"><a href="<?=MAIN_URL?>/founded">허브 창업</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_ABOUTUS) ? "active" :"" ?>"><a href="<?=MAIN_URL?>/aboutUs">회사 소개</a></li>
                <?php
                if(!empty(getSiteIntoValue($site,"recruiting_url"))){
                    ?>
                    <li class="FC-01"><a href="<?=getSiteIntoValue($site,"recruiting_url")?>" target="_blank">채용</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <button>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>