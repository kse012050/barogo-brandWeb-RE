<?php include "head.php"; ?>
<body>
    <div class="inquiryPage">
        <header>
            <div class="CW">
                <h1><a href="index.php"><img src="images/common/logo.png" alt="barogo logo"></a></h1>
                <a href="deliveryInquiry.php">뒤로가기</a>
                <p>배달대행 문의</p>
            </div>
        </header>

        <div class="CW">
            <form id="inquiryForm" onsubmit="return false">
                <input type="hidden" name="type" value="<?=INQUIRY_TYPE_1?>">
                <fieldset class="inquiryArea">
                    <div class="textArea">
                        <legend class="TC-01">배달대행 문의</legend>
                        <mark class="">일반 매장 배달대행 문의</mark>
                    </div>
                    <ul class="overLine-right inputArea">
                        <li class="required">
                            <label for="storeName">매장명</label>
                            <input type="text" placeholder="매장명" name="shop_name" autocomplete="off" required id="storeName">
                        </li>
                        <li class="required">
                            <label for="businessNumber">사업자번호</label>
                            <input class="digit_number" type="text" placeholder="사업자번호 (숫자 10자리)" name="company_number" maxlength="10" autocomplete="off" required id="businessNumber">
                        </li>
                        <li class="required">
                            <label for="storeLocation">매장 위치</label>
                            <div>
                                <select class="sido" name="si_name[]" id="sido1" required id="storeLocation">
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
                                <select class="gugun" name="si_gun_gu_name[]" id="gugun1" required>
                                    <option value="">시/군/구</option>
                                </select>
                                <select name="dong_name[]" id="dong1" required>
                                    <option value="">읍/면/동</option>
                                </select>
                            </div>
                            <input type="text" placeholder="상세 주소 입력" name="address_detail" autocomplete="off" required>
                        </li>
                        <li class="required">
                            <label for="userName">성함</label>
                            <input class="hangle" type="text" placeholder="성함" name="name" autocomplete="off" required id="userName">
                        </li>
                        <li class="required">
                            <label for="userContact">연락처</label>
                            <div>
                                <select name="mobile1" id="mobile1" required id="userContact">
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
                                <input type="text" value="" name="mobile2" id="mobile2" class="digit_number"  maxlength="4" autocomplete="off" required>
                                <input type="text" value="" name="mobile3" id="mobile3" class="digit_number"  maxlength="4" autocomplete="off" required>
                            </div>
                        </li>
                        <li class="required">
                            <label for="userEmail">이메일</label>
                            <input type="email" placeholder="welcome@barogo.com" name="email" autocomplete="off" required id="userEmail">
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
                            <input type="checkbox" name="agree2_yn" value="<?=Y?>" id="agree2_yn">
                            <label for="agree2_yn">개인정보 제 3자 제공 동의 <mark>(필수)</mark></label>
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
                <input type="submit" value="제출" onclick="api('inquiryForm')">
            </form>
        </div>
    </div>
</body>
</html>