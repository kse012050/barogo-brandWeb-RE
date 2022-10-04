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
                            <a href="" data-click="popup01">보기</a>
                            <div class="popupBox" data-popup="popup01">
                                <div>
                                    <strong><mark>개인정보 수집 및 이용동의</mark></strong>
                                    <div class="textArea">
                                        <b>개인정보 수집·이용 동의서 (필수)</b>
                                        <p>주식회사 바로고는 『개인정보보호법』 등 관련 법령에 의거하여 다음과 같이 개인정보에 대한 수집·이용 동의서를 수취하고 있는 바, 본인은 귀사가 아래의 내용과 같이 본인의 개인정보를 수집·이용하는 것에 동의합니다.</p>
                                        <ol>
                                            <li title="개인정보 수집·이용 내역">
                                                <div class="tableArea">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th>수집하는 개인정보 항목</th>
                                                                <th>개인정보 수집 및 이용 목적</th>
                                                                <th>개인정보 보유 및 이용기간</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th rowspan="2">배달대행 문의 시</th>
                                                                <th>상점계약 문의</th>
                                                                <td>상점명, 이름, 연락처, 이메일</td>
                                                                <td rowspan="2">서비스 가입 의사확인,
                                                                    문의사항 처리</td>
                                                                <td><span>문의 종료일로부터 1년간</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>배달대행 서비스(B2B)
                                                                    문의</th>
                                                                <td>이름 및 직급, 연락처, 이메일</td>
                                                                <td><span>문의 종료일로부터 1년간</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">허브창업 문의 시</th>
                                                                <td>이름, 연락처, 이메일</td>
                                                                <td>서비스 가입 의사확인,
                                                                    문의사항 처리</td>
                                                                <td><span>문의 종료일로부터 1년간</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">라이더 지원 시</th>
                                                                <td>이름, 생년월일, 연락처,
                                                                    라이더 경력</td>
                                                                <td>지원 의사 확인, 고용 알선</td>
                                                                <td>
                                                                    <span>
                                                                        채용 절차 종료일로부터
                                                                        1년간
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <li title="동의를 거부할 권리 및 동의를 거부할 경우의 불이익">
                                                귀하는 동의를 거부할 권리가 있으나, 위 사항에 동의하지 않으실 경우 바로고 홈페이지를 통한 서비스 이용의 전부 또는 일부가 불가능할 수 있습니다.
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="btnArea">
                                        <button data-close="popup01">닫기</button>
                                        <button data-chk="agree1_yn">동의하기</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="checkbox" name="marketing_yn" value="<?=Y?>" id="marketing_yn">
                            <label for="marketing_yn">마케팅을 위한 개인정보 수집 이용 동의 <span>(선택)</span></label>
                            <a href="" data-click="popup03">보기</a>
                            <div class="popupBox" data-popup="popup03">
                                <div>
                                    <strong><mark>마케팅을 위한 개인정보 수집·이용 동의서</mark></strong>
                                    <div class="textArea">
                                        <b>마케팅을 위한 개인정보 수집·이용 동의서 (선택)</b>
                                        <p>주식회사 바로고는 『개인정보보호법』 등 관련 법령에 의거하여 다음과 같이 마케팅을 위한 개인정보 수집·이용 동의서를 수취하고 있는 바, 본인은 귀사가 아래의 내용과 같이 본인의 개인정보를 수집·이용하는 것에 동의합니다.</p>
                                        <ol>
                                            <li title="개인정보 수집·이용 내역">
                                                <div class="tableArea">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th>수집하는 개인정보 항목</th>
                                                                <th>개인정보 수집 및 이용 목적</th>
                                                                <th>개인정보 보유 및 이용기간</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th rowspan="2">배달대행 문의 시</th>
                                                                <th>상점계약 문의</th>
                                                                <td>상점계약 문의 시 수집한 항목</td>
                                                                <td rowspan="4">
                                                                    <span>이벤트 및 마케팅 정보 또는 각종 혜택 정보 안내</span>, 경품 및 프로모션 제공 목적 
                                                                </td>
                                                                <td rowspan="4"><span>동의 철회 시 까지</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>배달대행 서비스 문의</th>
                                                                <td>배달대행 서비스 문의 시 수집한 항목</td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">허브창업 문의 시</th>
                                                                <td>허브창업 문의 시 수집한 항목</td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">라이더 지원 시</th>
                                                                <td>라이더 지원 시 수집한 항목</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <li title="동의를 거부할 권리 및 동의를 거부할 경우의 불이익">
                                                귀하는 동의를 거부할 권리가 있으나, 위 사항에 동의하지 않으실 경우 바로고 홈페이지를 통한 서비스 이용의 전부 또는 일부가 불가능할 수 있습니다.
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="btnArea">
                                        <button data-close="popup03">닫기</button>
                                        <button data-chk="marketing_yn">동의하기</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
                <input type="submit" value="제출" onclick="api('inquiryForm')">
            </form>
        </div>
    </div>
</body>
</html>