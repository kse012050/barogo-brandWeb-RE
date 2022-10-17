$(document).ready(function () {

    //로그인 버튼 클릭 시
    $(window).keydown(function (event) {
        if (event.keyCode == 13 &&
            (getPageName() === 'article' || getPageName() === 'barogo' || getPageName() === 'main' || getPageName() === 'detail')) {
            if ($('.searchBox').hasClass('active')) {
                var search = $('#searchinput').val();
                if (getPageName() === 'detail') {
                    location.href = 'main?search=' + search;
                } else {
                    $('#formSearch #search').val(search);
                    $('#formSearch').submit();
                }

            }
        }
    });

    $('.listArea li').on("click", function (e) {
        var tag = $(this).attr('data-tag');
        if (tag === 'ALL') {
            $('#formSearch #tag').val('');
        } else {
            $('#formSearch #tag').val(tag);
        }
        $('#formSearch').submit();
    });


    $('.sido').on('change', function (e) {
        let val = $(this).val();
        let idx = $(this).attr('id').replace('sido', '');
        if (!val) {
            $('#gugun' + idx).children('option:not(:first)').remove();
            $('#dong' + idx).children('option:not(:first)').remove();
        } else {
            $('#gugun' + idx).children('option:not(:first)').remove();
            $('#locationForm #func_type').val('gugun' + idx);
            $('#locationForm #sido_form').val(val);
            api('locationForm');
        }
    });
    $('.gugun').on('change', function (e) {
        let val = $(this).val();
        let idx = $(this).attr('id').replace('gugun', '');
        if (!val) {
            $('#dong' + idx).children('option:not(:first)').remove();
        } else {
            $('#dong' + idx).children('option:not(:first)').remove();
            $('#locationForm #func_type').val('dong' + idx);
            $('#locationForm #sido_form').val($('#sido' + idx).val());
            $('#locationForm #gugun_form').val(val);
            api('locationForm');
        }
    });

    $("#allCheck").click(function () {
        //만약 전체 선택 체크박스가 체크된상태일경우
        if ($("#allCheck").prop("checked")) {
            //해당화면에 전체 checkbox들을 체크해준다
            $("input[type=checkbox]").prop("checked", true);
            // 전체선택 체크박스가 해제된 경우
        } else {
            //해당화면에 모든 checkbox들의 체크를해제시킨다.
            $("input[type=checkbox]").prop("checked", false);
        }

        let bChek = true;
        let list = $("input[type=checkbox]");
        $.each(list, function (idx, item) {
            if ($(item).attr('id').startsWith('agree')) {
                // 필수 약관동의 , 체크가 안되어 있는 경우
                if (!$(item).prop("checked")) {
                    bChek = false;
                }
            }
        });
        // 필수 동의 시 체크
        if (bChek) $("input[type=submit]").addClass('active');
        else $("input[type=submit]").removeClass('active');

    })
    $(".agreeArea ul li input[type=checkbox]").change(function () {
        console.log(">>>> check");
        let bChek = true;
        let allcheck = true;
        let list = $("input[type=checkbox]");
        $.each(list, function (idx, item) {
            if ($(item).attr('id') !== 'allCheck') {
                if (!$(item).prop("checked")) {
                    allcheck = false;
                }
                if ($(item).attr('id').startsWith('agree')) {
                    // 필수 약관동의 , 체크가 안되어 있는 경우
                    if (!$(item).prop("checked")) {
                        bChek = false;
                    }
                }
            }
        });
        if (allcheck) {
            $("#allCheck").prop("checked", true);
        } else {
            $("#allCheck").prop("checked", false);
        }

        // 필수 동의 시 체크
        if (bChek) $("input[type=submit]").addClass('active');
        else $("input[type=submit]").removeClass('active');


    });

    $('.digit_number').on('input', function (e) {
        if( $(this).attr('id') === 'businessNumber'){
            var regExp = /[^0-9.]/g;
            if(regExp.test(this.value)){
                $(this).next().addClass("active");
            }else{
                $(this).next().removeClass("active");
            }
        }
        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

        let maxLegth = $(this).attr('maxlength');
        console.log(">>"+maxLegth);
        console.log(">>"+this.value.length)
        if(maxLegth && Number(maxLegth)>4){
            if(this.value.length === Number(maxLegth)){
                $(this).parent().addClass('active')
            }else{
                $(this).parent().removeClass('active')
            }
        }


    })

    $('.email_form').on('input', function (e) {
        var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
        if(regExp.test(this.value)){
            $(this).next().removeClass("active");
            $(this).parent().addClass('active')
        }else{
            $(this).next().addClass("active");
            $(this).parent().removeClass('active')
        }
    })
    $('.hangle').on('input', function (e) {
        var regExp = /[^ㄱ-힣]/g;
        if(regExp.test(this.value)){
            $(this).next().addClass("active");
        }else{
            $(this).next().removeClass("active");
        }
        this.value = this.value.replace(/[^ㄱ-힣]/g, '').replace(/(\..*)\./g, '$1');
        if(this.value){
            $(this).parent().addClass('active')
        }else{
            $(this).parent().removeClass('active')
        }
    })
    $('.basic_input').on('input', function (e) {
        if(this.value){
            $(this).parent().addClass('active')
        }else{
            $(this).parent().removeClass('active')
        }
    })

    $('.btnBox li button').click(function () {
        // 해시태그 클릭
        var tag = $(this).attr('data-tag');
        if (tag === 'ALL') {
            $('#formSearch #tag').val('');
        } else {
            $('#formSearch #tag').val(tag);
        }
        $('#formSearch').submit();
    })


    $('input[type=radio][name=current_delivery_operation_yn]').change(function() {

        if (this.value == 'y') {
            $(".current-option").show();
        }
        else{
            $(".current-option").hide();
        }
    });


});



// 이메일 체크
function checkEmail(str) {
    var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
    if (!reg_email.test(str)) {
        return false;
    } else {
        return true;
    }
}

// 숫자 체크
function checkNumber(event) {
    if (event.key === '.'
        || event.key === '-'
        || event.key >= 0 && event.key <= 9) {
        return true;
    }

    return false;
}

function logic2(url, params, callback) {

    $.ajax({
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        type: "POST",
        url: url,
        data: params,
        timeout: 60000,
        success: callback,
        error: function (request, textStatus, errorThrown) {
            // alert(textStatus);
            alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + errorThrown);
        },
        progress: function (e) {
            if (e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;
                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
    });
}


function api(id) {
    let lb;
    let form = $('#' + id)[0];
    let formData = new FormData(form);
    let url = "";
    let is_logic = true;


    if (id === 'adminInfo') {
        url = "../api/admin/login";
    } else if (id === 'adminForm') {
        url = "../api/admin/admin";
    } else if (id === 'menuOrderForm') {
        if (!confirm("해당 순서로 적용 하시겠습니까?\n확인버튼 누를 시 즉시 웹에 반영됩니다")) {
            is_logic = false;
        }
        url = "../api/admin/menu";
    } else if (id === 'menuInfoForm') {
        url = "../api/admin/menu";
    } else if (id === 'boardForm') {
        if ($('#summernote')) {
            var markupStr = $('#summernote').summernote('code');
            formData.append('content', markupStr);
        }
        url = "../api/admin/board";
    } else if (id === 'boardDelForm') {
        if (!confirm("해당 콘텐츠를 삭제하시겠습니까? 삭제 시 복구가 어렵습니다.")) {
            is_logic = false;
        }
        url = "../api/admin/board";
    } else if (id === 'uploadExcelForm') {
        url = "../api/admin/excel";
    } else if (id === 'locationForm') {
        url = "../api/admin/location";
    } else if (id === 'hubForm') {
        url = "../api/admin/hub";
    } else if (id === 'inquiryForm') {
        url = "../api/web/inquiry";
    } else if (id === 'mobileForm') {
        url = "../api/web/mobile";
    }

    if (is_logic) {
        logic2(url, formData, function callback(responseData) {
            if (lb) lb.close();
            if (!responseData.result) {
                alert(responseData.error_message);
                if(id === "inquiryForm"){
                    if(responseData.error_field === 'mobileLi'
                        || responseData.error_field === 'hope_location_li'
                        || responseData.error_field === 'agree1_yn'){
                        document.getElementById(responseData.error_field).scrollIntoView();
                    }else{
                        $('#inquiryForm #'+responseData.error_field).focus();
                    }

                }
            }
            if (responseData.result) {
                result(id, responseData);
            }

        });
    }


}

let formId;
let remainSec = 180;
var interval
function result(id, responseData) {

    var form = $('#' + id)[0];
    var formData = new FormData(form);
    var is_show_message = true;
    let is_reload = false;
    let is_index = false;
    let is_back = false;
    let is_logout = false;
    let is_window_close = false;
    let is_parent_window_reload = false;
    let is_move_url = false;
    let move_url = "";
    let is_replace = false;


    if (id === 'adminInfo') {
        location.href = "dashboard";
    } else if (id === 'adminForm') {
        is_reload = true
    } else if (id === 'menuOrderForm') {
        is_reload = true
    } else if (id === 'menuInfoForm') {
        is_reload = true
    } else if (id === 'boardForm') {
        is_back = true;
    } else if (id === 'boardDelForm') {
        is_back = true;
    } else if (id === 'uploadExcelForm') {
        is_reload = true
    } else if (id === 'locationForm') {
        is_show_message = false;
        console.log(formData.get("func_type"));
        let select = $("#" + formData.get("func_type"));
        $.each(responseData.list, function (idx, item) {
            select.append(addOption(item.name, item.name));
        });
    } else if (id === 'inquiryForm') {
        is_show_message = false;
        move_url    = "inquiryFin";
        is_replace  = true;
    } else if (id === 'hubForm') {
        is_reload = true
    } else if (id === 'mobileForm') {
        if (formData.get("func_type") === "req"){
            $('#auth_number').val("");
            $('#mobile_auth_id').val("");
            $('#mobilAuthLi').show();
            clearInterval(interval)
            // 유효기간 시간
            remainSec = 180;
            interval = setInterval(scheduler, 1000);
            $('#auth_number').focus();
        }
        else {
            clearInterval(interval)
            // 인증 완료
            $('#mobile_auth_id').val(responseData.data.mobile_auth_id);
            $('#inquiryForm #mobile').val(responseData.data.mobile);

            $('#mobilAuthLi time').html("");
            $('#mobilAuthLi button').html("인증완료");
            $('#mobileLi button').html("인증완료");

            $("#mobile1").attr('disabled','disabled');
            $("#mobile2").attr('disabled','disabled');
            $("#mobile3").attr('disabled','disabled');
            $("#auth_number").attr('disabled','disabled');
            $('#mobilAuthLi button').attr('disabled','disabled')
            $('#mobileLi button').attr('disabled','disabled')
        }

    }


    if(is_replace){
        location.replace(move_url);
    }
    if (is_show_message) {
        alert(responseData.error_message);
    }
    if (is_reload) {
        location.reload();
    }
    if (is_index) {
        location.href = 'login';
    }
    if (is_back) {
        history.back();
    }
    if (is_logout) {
        location.href = '/logout.php'
    }
    if (is_parent_window_reload) {
        opener.location.reload();
    }
    if (is_window_close) {
        window.close();
    }
    if (is_move_url && move_url) {
        location.href = move_url;
    }
}
function scheduler(){
    if(remainSec<0){
        clearInterval(interval)
        $('#mobilAuthLi time').html("");
        alert("인증 시간이 초과되었습니다. 인증번호를 다시 발송해 주세요.");
        $('#mobilAuthLi').hide();
        return
    }
    let min = parseInt((remainSec / 60),0);
    let sec = parseInt((remainSec % 60),0);
    if(min<10) min = "0"+min.toString();
    if(sec<10) sec = "0"+sec.toString();
    let remainTime = min.toString()+":"+ sec.toString();
    $('#mobilAuthLi time').html(remainTime);
    remainSec--;
}

function GoBackWithRefresh(event) {
    if ('referrer' in document) {
        window.location = document.referrer;
        /* OR */
        //location.replace(document.referrer);
    } else {
        window.history.back();
    }
}

// 페이지 이동
function movePage(page) {
    $('#formSearch #page').val(page);
    $('#formSearch').submit();
}

function searchList() {
    movePage('1');
    return false;
}

/**
 *  페이지 이름 가져오기
 *  @return pageName 현재 페이지 이름
 */
function getPageName() {
    var pageName = "";

    var tempPageName = window.location.href;
    var strPageName = tempPageName.split("/");
    pageName = strPageName[strPageName.length - 1].split("?")[0];

    return pageName;
}


function showWarning(message) {
    alert(message);
}

function addOption(value, name) {
    return '<option value="' + value + '">' + name + '</option>';
}

function requestMobileAuth() {
    var mobile1 = $('#mobile1').val();
    var mobile2 = $('#mobile2').val();
    var mobile3 = $('#mobile3').val();
    var mobile = mobile1 + "-" + mobile2 + "-" + mobile3;
    $('#mobileForm #mobile').val(mobile);
    $('#mobileForm #func_type').val("req");
    api('mobileForm');
}

function checkMobileAuth() {
    var mobile1 = $('#mobile1').val();
    var mobile2 = $('#mobile2').val();
    var mobile3 = $('#mobile3').val();
    var auth_number = $('#auth_number').val();
    var mobile = mobile1 + "-" + mobile2 + "-" + mobile3;
    $('#mobileForm #mobile').val(mobile);
    $('#mobileForm #func_type').val("chk");
    $('#mobileForm #auth').val(auth_number);
    api('mobileForm');
}

// 클립보드 복사(주소복사)
function copyToClipboard(val) {
    var t = document.createElement("textarea");
    document.body.appendChild(t);
    t.value = val;
    t.select();
    document.execCommand('copy');
    document.body.removeChild(t);
    alert('클립보드에 복사되었습니다.');
}





