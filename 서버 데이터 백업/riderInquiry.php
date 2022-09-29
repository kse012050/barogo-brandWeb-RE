<?php include "head.php"; ?>
<body>
    <div class="inquiryPage">
        <header>
            <div class="CW">
                <h1><a href="index.php"><img src="images/common/logo.png" alt="barogo logo"></a></h1>
                <a href="rider.php">뒤로가기</a>
                <p>라이저 지원</p>
            </div>
        </header>

        <div class="CW">
            <form id="inquiryForm" onsubmit="return false">
                <input type="hidden" name="type" value="<?=INQUIRY_TYPE_3?>">
                <input type="hidden" name="mobile_auth_id" value="" id="mobile_auth_id">
                <fieldset class="inquiryArea">
                    <div class="textArea">
                        <legend class="TC-01">라이더 지원</legend>
                        <p>1분이면 한번에 끝!</p>
                    </div>
                    <ul class="overLine-right inputArea">
                        <li>
                            <label for="">성함</label>
                            <input class="hangle" type="text" placeholder="성함" name="name" autocomplete="off">
                        </li>
                        <li>
                            <label for="">생년월일</label>
                            <input class="digit_number"  maxlength="8" type="text" placeholder="ex. 19991010" name="birthdate" autocomplete="off">
                        </li>
                        <li>
                            <label for="">연락처</label>
                            <div>
                                <select name="mobile1" id="mobile1">
                                    <option value="010">010</option>
                                    <option value="02">02</option>
                                    <option value="031">031</option>
                                    <option value="032">032</option>
                                    <option value="033">033</option>
                                    <option value="041">041</option>
                                    <option value="042">042</option>
                                    <option value="043">043</option>
                                    <option value="044">044</option>
                                    <option value="051">051</option>
                                    <option value="052">052</option>
                                    <option value="053">053</option>
                                    <option value="054">054</option>
                                    <option value="055">055</option>
                                    <option value="061">061</option>
                                    <option value="062">062</option>
                                    <option value="063">063</option>
                                </select>
                                <input type="text" value="" class="digit_number" name="mobile2" id="mobile2" autocomplete="off" maxlength="4">
                                <input type="text" value="" class="digit_number" name="mobile3" id="mobile3" autocomplete="off" maxlength="4">
                                <button onclick="requestMobileAuth()">인증번호 발송</button>
                            </div>
                        </li>
                        <li id="mobilAuthLi" style="display: none">
                            <label for="">인증번호</label>
                            <div>
                                <div>
                                    <input class="digit_number" type="text" name="auth_number" id="auth_number" autocomplete="off">
                                    <time></time>
                                </div>
                                <button onclick="checkMobileAuth()">인증하기</button>
                            </div>
                        </li>
                        <li>
                            <label for="">배달 경험</label>
                            <div class="showThree">
                                <input type="radio" checked name="delivery_experience" value="없음" id="delivery_experience1">
                                <label for="delivery_experience1">없음</label>
                                <input type="radio" name="delivery_experience" value="6개월 미만" id="delivery_experience2">
                                <label for="delivery_experience2">6개월 미만</label>
                                <input type="radio" name="delivery_experience" value="6개월~1년" id="delivery_experience3">
                                <label for="delivery_experience3">6개월~1년</label>
                                <input type="radio" name="delivery_experience" value="1년 이상" id="delivery_experience4">
                                <label for="delivery_experience4">1년 이상</label>
                                <input type="radio" name="delivery_experience" value="2년 이상" id="delivery_experience5">
                                <label for="delivery_experience5">2년 이상</label>
                            </div>
                        </li>
                        <li>
                            <label for="">희망 근무 시간</label>
                            <div>
                                <input type="radio" checked name="hope_delivery_time" value="풀타임" id="hope_delivery_time1">
                                <label for="hope_delivery_time1">풀타임</label>
                                <input type="radio" name="hope_delivery_time" value="파트타임" id="hope_delivery_time2">
                                <label for="hope_delivery_time2">파트타임</label>
                            </div>
                        </li>
                        <li>
                            <label for="">바이크를 보유 여부</label>
                            <div>
                                <input type="radio" checked name="bike_own_yn" value="<?=Y?>" id="bike_own_yn1">
                                <label for="bike_own_yn1">네, 보유하고 있습니다.</label>
                                <input type="radio" name="bike_own_yn" value="<?=N?>" id="bike_own_yn2">
                                <label for="bike_own_yn2">아니오, 없습니다.</label>
                            </div>
                        </li>
                        <li>
                            <strong>희망 근무 지역</strong><small>희망지역 순으로 해당지역 바로고 허브 매칭</small>
                            <label for="">1지망</label>
                            <div>
                                <select class="sido" name="si_name[]" id="sido1">
                                    <option value="">시/도</option>
                                    <?php
                                    $optionList = array_reduce($sidoList, function ($arr, $item) {
                                        $arr[$item['name']] = $item['name'];
                                        return $arr;
                                    }, array());
                                    echo getCategoryoption($optionList, "");
                                    unset($optionList);
                                    ?>
                                </select>
                                <select class="gugun" name="si_gun_gu_name[]" id="gugun1">
                                    <option value="">시/군/구</option>
                                </select>
                                <select name="dong_name[]" id="dong1">
                                    <option value="">읍/면/동</option>
                                </select>
                            </div>
                            <label for="">2지망</label>
                            <div>
                                <select class="sido" name="si_name[]" id="sido2">
                                    <option value="">시/도</option>
                                    <?php
                                    $optionList = array_reduce($sidoList, function ($arr, $item) {
                                        $arr[$item['name']] = $item['name'];
                                        return $arr;
                                    }, array());
                                    echo getCategoryoption($optionList, "");
                                    unset($optionList);
                                    ?>
                                </select>
                                <select class="gugun" name="si_gun_gu_name[]" id="gugun2">
                                    <option value="">시/군/구</option>
                                </select>
                                <select name="dong_name[]" id="dong2">
                                    <option value="">읍/면/동</option>
                                </select>
                            </div>
                            <label for="">3지망</label>
                            <div>
                                <select class="sido" name="si_name[]" id="sido3">
                                    <option value="">시/도</option>
                                    <?php
                                    $optionList = array_reduce($sidoList, function ($arr, $item) {
                                        $arr[$item['name']] = $item['name'];
                                        return $arr;
                                    }, array());
                                    echo getCategoryoption($optionList, "");
                                    unset($optionList);
                                    ?>
                                </select>
                                <select class="gugun" name="si_gun_gu_name[]" id="gugun3">
                                    <option value="">시/군/구</option>
                                </select>
                                <select name="dong_name[]" id="dong3">
                                    <option value="">읍/면/동</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </fieldset>
                <fieldset class="agreeArea">
                    <legend>동의</legend>
                    <input type="checkbox" id="allCheck">
                    <label for="allCheck">전체동의</label>
                    <ul>
                        <li>
                            <input type="checkbox" name="agree1_yn" value="<?=Y?>" id="agree1_yn">
                            <label for="agree1_yn">개인정보 수집 및 이용 동의 <mark>(필수)</mark></label>
                            <a href="">보기</a>
                        </li>
                        <li>
                            <input type="checkbox" name="marketing_yn" value="<?=Y?>" id="marketing_yn">
                            <label for="marketing_yn">마케팅을 위한 개인정보 수집 이용 동의 <span>(선택)</span></label>
                            <a href="">보기</a>
                        </li>
                        <li>
                            <input type="checkbox" name="letter_subscription_yn" value="<?=Y?>" id="letter_subscription_yn">
                            <label for="letter_subscription_yn">바로레터 구독 동의 <span>(선택)</span></label>
                            <a href="">보기</a>
                        </li>
                    </ul>
                </fieldset>
                <input type="submit" value="제출" class="BTN-arrow" onclick="api('inquiryForm')">
            </form>
        </div>
    </div>
</body>
</html>