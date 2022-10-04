<header>
    <div class="CW">
        <h1><a href="/"><img src="images/common/logo.png" alt="barogo logo"></a></h1>
        <nav>
            <ul>
                <li class="FC-01 <?=($thisfilename == FILE_INDEX) ? "active" :"" ?>"><a href="/">배달대행 문의</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_RIDER) ? "active" :"" ?>"><a href="rider">라이더 지원</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_FOUNDED) ? "active" :"" ?>"><a href="founded">허브 창업</a></li>
                <li class="FC-01 <?=($thisfilename == FILE_ABOUTUS) ? "active" :"" ?>"><a href="aboutUs">회사 소개</a></li>
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