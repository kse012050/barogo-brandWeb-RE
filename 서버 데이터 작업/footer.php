<footer>
    <div class="topArea">
        <div class="CW">
            <ul class="linkArea">
                <li>
                    <b>회사</b>
                    <ul>
                        <li><a href="<?=MAIN_URL?>/aboutUs">회사 소개</a></li>
                        <?php
                        if(!empty(getSiteIntoValue($site,"recruiting_url"))){
                            ?>
                            <li><a href="<?=getSiteIntoValue($site,"recruiting_url")?>" target="_blank">채용</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="<?=MAIN_URL?>/board-disclosure">공시</a></li>
                    </ul>
                </li>
                <li>
                    <b>서비스</b>
                    <ul>
                        <li><a href="<?=MAIN_URL?>/index">배달대행 문의</a></li>
                        <li><a href="<?=MAIN_URL?>/rider">라이더 지원</a></li>
                        <li><a href="<?=MAIN_URL?>/hub">허브 창업</a></li>
                    </ul>
                </li>
                <li>
                    <b>지원</b>
                    <ul>
                        <li><a href="<?=MAIN_URL?>/news">뉴스</a></li>
                        <li><a href="<?=MAIN_URL?>/board-data">자료실</a></li>
                        <li><a href="<?=MAIN_URL?>/blog/">블로그</a></li>
                    </ul>
                </li>
                <li>
                    <b>이메일 문의</b>
                    <ul class="emailArea">
                        <li><a href="mailto:<?=getSiteIntoValue($site,"partners_email")?>" title="제휴"><?=getSiteIntoValue($site,"partners_email")?></a></li>
                        <li><a href="mailto:<?=getSiteIntoValue($site,"pr_email")?>" title="PR"><?=getSiteIntoValue($site,"pr_email")?></a></li>
                        <li><a href="mailto:<?=getSiteIntoValue($site,"marketing_email")?>" title="마케팅"><?=getSiteIntoValue($site,"marketing_email")?></a></li>
                        <li><a href="mailto:<?=getSiteIntoValue($site,"recruiting_email")?>" title="채용"><?=getSiteIntoValue($site,"recruiting_email")?></a></li>
                    </ul>
                </li>
            </ul>

            <ul class="SNSArea">
                <li><a href="<?=getSiteIntoValue($site,"facebook")?>" target="_blank">페이스북</a></li>
                <li><a href="<?=getSiteIntoValue($site,"youtube")?>" target="_blank">유튜브</a></li>
                <li><a href="<?=getSiteIntoValue($site,"blog")?>" target="_blank">블로그</a></li>
                <li><a href="<?=getSiteIntoValue($site,"instagram")?>" target="_blank">인스타</a></li>
            </ul>
        </div>
    </div>
    <div class="CW bottomArea">
        <div>
            <h2><a href="<?=MAIN_URL?>"><img src="<?=MAIN_IMG_URL?>/common/footer_logo.png" alt="BAROGO logo"></a></h2>
            <address>
                <p>대표자 : 이태권</p>
                <p>주소 : 서울특별시 강남구 언주로134길32</p>
                <p>사업자 등록번호 : 119-86-87135</p>
            </address>
            <p>© 2022 Barogo. All rights reserved. </p>
            <ul>
                <li><a href="<?=getSiteIntoValue($site,"site_agree1")?>" target="_blank"><?=getSiteIntoMemo($site,"site_agree1")?></a></li>
                <li><a href="<?=getSiteIntoValue($site,"site_agree2")?>" target="_blank"><?=getSiteIntoMemo($site,"site_agree2")?></a></li>
                <li><a href="<?=getSiteIntoValue($site,"site_agree3")?>" target="_blank"><?=getSiteIntoMemo($site,"site_agree3")?></a></li>
            </ul>
            <div>
                <img src="<?=MAIN_IMG_URL?>/common/ISMS.png" alt="ISMS 인증 마크">
                정보보호 관리체계 ISMS 인증 획득  |  인증범위 : 배달 및 상점 중계 플랫폼  |  유효기간 : 2023.07.05 ~2026.07.04
            </div>
        </div>
        <div>
            <!-- <b>대표번호</b>
            <a href="tel:+025509900">02-550-9900</a> -->
            <a href="<?=getSiteIntoValue($site,"kakao")?>" target="_blank">
                고객센터<br/>
                1:1 상담하기
            </a>
            <p>
                <!-- AM 10:00 ~ PM 05:00 (토, 일, 공휴일 휴무)<br/>
                (점심시간 PM 12:00 ~ PM 01:30) -->
                운영시간 <span>10:00 ~ 24:00 (연중무휴)</span>
            </p>
            <p>대표번호 <a href="tel:+025509900">02-550-9900</a></p>
        </div>
    </div>
</footer>