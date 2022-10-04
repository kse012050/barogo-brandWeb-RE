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
                            <input type="text" placeholder="성함/직급" name="name" autocomplete="off" id="nameRank">
                            <p class="active">한글만 입력 가능합니다</p>
                        </li>
                        <li class="required">
                            <label for="mobile1">연락처</label>
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
                                <input class="digit_number" type="text"  name="mobile2" id="mobile2" autocomplete="off" maxlength="4">
                                <input class="digit_number" type="text"  name="mobile3" id="mobile3" autocomplete="off" maxlength="4">
                            </div>
                        </li>

                        <li class="required">
                            <label for="brandName">법인명(브랜드명)</label>
                            <input type="text" placeholder="법인명(브랜드명)" name="brand_name" autocomplete="off" id="brandName">
                        </li>
                        <li class="required">
                            <label for="deliveryItem">희망 배달 품목</label>
                            <input type="text" placeholder="배달품목" name="hope_delivery_item" autocomplete="off" id="deliveryItem">
                        </li>
                        <li class="required">
                            <label for="deliveryArea">희망 배달 지역</label>
                            <input type="text" placeholder="ex. 강남구, 서초구 일대 / 부산 / 전국구 등" name="hope_delivery_location" autocomplete="off" id="deliveryArea">
                        </li>
                        <li class="required">
                            <label for="userEmail">이메일</label>
                            <input type="text" placeholder="welcome@barogo.com" name="email" autocomplete="off" id="userEmail">
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
                        <li>
                            <input type="checkbox" name="letter_subscription_yn" value="<?=Y?>" id="letter_subscription_yn">
                            <label for="letter_subscription_yn">바로레터 구독 동의 <span>(선택)</span></label>
                            <a href="" data-click="popup04">보기</a>
                            <div class="popupBox" data-popup="popup04">
                                <div>
                                    <strong><mark>바로레터 구독</mark></strong>
                                    <div class="textArea">
                                        <ul class="imgArea">
                                            <li>
                                                <img src="images/inquiry/letter01.jpg" alt="[바로레터8] 다시 울트라콜, 우리 깃발은 어디에?">
                                                <p>[바로레터8] 다시 울트라콜, 우리 깃발은 어디에?</p>
                                            </li>
                                            <li>
                                                <img src="images/inquiry/letter02.png" alt="[바로레터12] 포장용기의 변신, 이제는 배달용기!">
                                                <p>[바로레터12] 포장용기의 변신, 이제는 배달용기!</p>
                                            </li>
                                            <li>
                                                <img src="images/inquiry/letter03.jpg" alt="[바로레터19] 라이더와의 갈등, 어떻게 해결할까?">
                                                <p>[바로레터19] 라이더와의 갈등, 어떻게 해결할까?</p>
                                            </li>
                                            <li>
                                                <img src="images/inquiry/letter04.jpg" alt="[바로레터20] 성공하는 매장의 필수조건… 위생!">
                                                <p>[바로레터20] 성공하는 매장의 필수조건… 위생!</p>
                                            </li>
                                        </ul>
                                        <b><mark>바로레터란?</mark></b>
                                        <p>
                                            매장 운영에 어려움을 겪고 있는 사장님!<br/>
                                            생각보다 저조한 배달 주문에 고민인 사장님!<br/>
                                            사장님을 위해 바로고가 나섰습니다.
                                        </p>
                                        <p>
                                            국내 최초 배달 전문 뉴스레터 &lt;바로레터&gt;<br/>
                                            업계 최신 소식부터 트렌드, 배달 데이터 분석, 성공 사례 인터뷰와 팁까지!
                                        </p>
                                        <p>
                                            사장님의 성공적인 매장 운영을 위한 양질의 콘텐츠가<br/>
                                            매주 1회 이메일을 통해 무료로 배달됩니다.
                                        </p>
                                        <p>
                                            지금 바로 &lt;바로레터&gt;를 구독해보세요!
                                        </p>
                                        <b>개인정보 수집 및 이용 안내문</b>
                                        <p>
                                            [개인정보취급에 관한 안내]<br/>
                                            귀하의 소중한 개인정보를 수집·이용·활용하고자 하는 경우에 『개인정보보호법』에 따라 본인의 동의를 얻고 있습니다. 이에 아래의 내용과 같이 귀하의 개인정보를 수집·이용·활용하는데 동의하여 주실 것을 요청드립니다.
                                        </p>
                                        <p>
                                            [개인정보 수집 항목]<br/>
                                            성명, 이메일 주소, 소속, 연락처
                                        </p>
                                        <p>
                                            [개인정보 이용목적]<br/>
                                            수집된 개인정보는 '바로레터 구독자'로 관리되며, '바로레터'를 비롯하여 주식회사 바로고의 기타 마케팅 및 세일즈 활동에 활용될 수 있습니다.<br/>
                                            정보주체의 구독 취소 및 정보 변경, 개인정보 삭제 요청 시 해당 정보는 파기됩니다.
                                        </p>
                                        <p>
                                            바로레터를 구독하시면 위 개인정보 수집 및 이용에 동의하는 것으로 간주합니다.
                                        </p>
                                    </div>
                                    <div class="btnArea">
                                        <a href="">받아보기</a>
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