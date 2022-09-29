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
                <input type="hidden" name="type" value="<?=INQUIRY_TYPE_2?>">
                <fieldset class="inquiryArea">
                    <div class="textArea">
                        <legend class="TC-01">배달대행 문의</legend>
                        <mark class="">기업 본사 배달제휴 문의</mark>
                    </div>
                    <ul class="overLine-right inputArea">
                        <li class="required">
                            <label for="nameRank">성함/직급</label>
                            <input type="text" placeholder="성함/직급" name="name" autocomplete="off" required id="nameRank">
                        </li>
                        <li class="required">
                            <label for="userContact">연락처</label>
                            <div>
                                <select name="mobile1" id="userContact" required>
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
                                <input class="digit_number" type="text"  name="mobile2" autocomplete="off" maxlength="4" required>
                                <input class="digit_number" type="text"  name="mobile3" autocomplete="off" maxlength="4" required>
                            </div>
                        </li>
                        <li class="required">
                            <label for="storeLocation">매장 위치</label>
                            <input type="text" placeholder="매장위치입력" name="address_detail" autocomplete="off" id="storeLocation" required>
                        </li>
                        <li class="required">
                            <label for="brandName">법인명(브랜드명)</label>
                            <input type="text" placeholder="법인명(브랜드명)" name="brand_name" autocomplete="off" id="brandName" required>
                        </li>
                        <li class="required">
                            <label for="deliveryItem">희망 배달 품목</label>
                            <input type="text" placeholder="배달품목" name="hope_delivery_item" autocomplete="off" id="deliveryItem" required>
                        </li>
                        <li class="required">
                            <label for="deliveryArea">희망 배달 지역</label>
                            <input type="text" placeholder="ex. 강남구, 서초구 일대 / 부산 / 전국구 등" name="hope_delivery_location" autocomplete="off" id="deliveryArea" required>
                        </li>
                        <li class="required">
                            <label for="userEmail">이메일</label>
                            <input type="email" placeholder="welcome@barogo.com" name="email" autocomplete="off" id="userEmail" required>
                        </li>
                        <li>
                            <label for="userInquiry">문의 사항 (300자 이내)</label>
                            <textarea placeholder="자유롭게 문의 사항을 남겨 주세요" name="comment" maxlength="300" id="userInquiry"></textarea>
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
                <input type="submit" value="제출" onclick="api('inquiryForm')">
            </form>
        </div>
    </div>
</body>
</html>