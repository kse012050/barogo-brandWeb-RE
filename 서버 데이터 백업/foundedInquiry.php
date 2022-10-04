<?php include "head.php"; ?>
<body>
    <div class="inquiryPage">
        <header>
            <div class="CW">
                <h1><a href="index.php"><img src="images/common/logo.png" alt="barogo logo"></a></h1>
                <a href="founded.php">뒤로가기</a>
                <p>허브 창업 문의</p>
            </div>
        </header>

        <div class="CW">
            <form id="inquiryForm" onsubmit="return false">
                <input type="hidden" name="type" value="<?=INQUIRY_TYPE_4?>">
                <input type="hidden" name="mobile_auth_id" value="" id="mobile_auth_id">
                <input type="hidden" name="mobile" value="" id="mobile">
                <fieldset class="inquiryArea">
                    <div class="textArea">
                        <legend class="TC-01">허브 창업 문의</legend>
                        <p>1분이면 한번에 끝!</p>
                    </div>
                    <ul class="overLine-right inputArea">
                        <li class="required">
                            <label for="">성함</label>
                            <input class="hangle" type="text" placeholder="성함 (한글만 입력가능)" name="name" id="userName" autocomplete="off">
                        </li>
                        <li id="mobileLi" class="required">
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
                                <input class="digit_number" type="text" value="" name="mobile2" id="mobile2" autocomplete="off" maxlength="4">
                                <input class="digit_number" type="text" value="" name="mobile3" id="mobile3" autocomplete="off" maxlength="4">
                                <button onclick="requestMobileAuth()">인증번호 발송</button>
                            </div>
                        </li>
                        <li id="mobilAuthLi" style="display: none">
                            <label for="">인증번호</label>
                            <div>
                                <div>
                                    <input class="digit_number" type="text" name="auth_number" id="auth_number" autocomplete="off" maxlength="6">
                                    <time></time>
                                    <time></time>
                                </div>
                                <button onclick="checkMobileAuth()">인증하기</button>
                            </div>
                        </li>
                        <li class="required">
                            <label for="">배달 대행 운영 경험</label>
                            <div>
                                <input type="radio" checked name="delivery_operation_yn" id="delivery_operation_yn1" value="<?=Y?>">
                                <label for="delivery_operation_yn1">운영 경험 있음</label>
                                <input type="radio" name="delivery_operation_yn" id="delivery_operation_yn2" value="<?=N?>">
                                <label for="delivery_operation_yn2">운영 경험 없음</label>
                            </div>
                        </li>
                        <li class="required">
                            <label for="">현재 배달 대행 운영 여부</label>
                            <div>
                                <input type="radio" checked name="current_delivery_operation_yn" id="current_delivery_operation_yn1" value="<?=Y?>">
                                <label for="current_delivery_operation_yn1">운영중</label>
                                <input type="radio" name="current_delivery_operation_yn" id="current_delivery_operation_yn2" value="<?=N?>">
                                <label for="current_delivery_operation_yn2">운영하지않음</label>
                            </div>
                        </li>
                        <li class="required current-option">
                            <label for="">현재 사용중인 프로그램</label>
                            <input type="text" placeholder="ex. 바로고 프로그램" name="current_use_program"  id="current_use_program" autocomplete="off">
                        </li>
                        <li class="required current-option">
                            <label for="">함께하는 라이더 수</label>
                            <input class="digit_number" type="text" placeholder="" name="together_rider_count" id="together_rider_count" autocomplete="off">
                        </li>
                        <li class="required current-option">
                            <label for="">운영 중인 가맹점 수</label>
                            <input class="digit_number" type="text" placeholder="" name="store_count" id="store_count" autocomplete="off">
                        </li>
                        <li class="required current-option">
                            <label for="">하루 평균 주문 수행 건수</label>
                            <div>
                                <input class="digit_number" type="text" placeholder="주중 평균 수행량" name="weekdays_delivery_count" id="weekdays_delivery_count" autocomplete="off">
                                <input class="digit_number" type="text" placeholder="주말 평균 수행량" name="weekend_delivery_count" id="weekend_delivery_count" autocomplete="off">
                            </div>
                        </li>
                        <li class="required" id="hope_location_li">
                            <label for="">희망 개설 지역</label>
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
                                <input type="text" placeholder="읍/면/동" name="dong_name[]">
                            </div>
                        </li>
                        <li>
                            <label for="">기타 참고 사항</label>
                            <input type="text" placeholder="ex. 운영기간, 권역 범위 등" name="comment" id="comment" autocomplete="off">
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
                    </ul>
                </fieldset>
                <input type="submit" value="제출" onclick="api('inquiryForm')">
            </form>
        </div>
    </div>
</body>
</html>