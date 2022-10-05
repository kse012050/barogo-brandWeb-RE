<?php
require_once "admin/admin.php";
$thisfilename = basename($_SERVER['PHP_SELF'],".php");
//echo $_SERVER['REQUEST_URI'];

$isOtherJs = false;
if(in_array($thisfilename,["aboutUs","founded","index","rider"])){
    $isOtherJs = true;
}

$page       = 1;
$limit      = 20;
$list       = null;
$paging     = null;
$total_count="";
$data       = null;
$content    = null;
$tags       = null;
$tag        = "";
$archives   = null;

$sidoList   =   null;
if($thisfilename == FILE_INDEX){
    $data    = menuDetail(MENU_1);
    $archives= archive(array("menuId"    => MENU_1));
}
if($thisfilename == FILE_RIDER){
    $data    = menuDetail(MENU_2);
    $archives= archive(array("menuId"    => MENU_2));
}
if($thisfilename == FILE_FOUNDED){
    $data  = menuDetail(MENU_3);
    $archives= archive(array("menuId"    => MENU_3));
}
if($thisfilename == FILE_ABOUTUS){
    $data  = menuDetail(MENU_4);
    $archives= archive(array("menuId"    => MENU_4));
}

// 공지사항, 자료실, 공시 상세 페이지 접근
if($thisfilename == FILE_DETAIL_NOTICE ||
    $thisfilename == FILE_DETAIL_DISCLOSURE ||
    $thisfilename == FILE_DETAIL_DATA){
    $id = checkArrayVal("id",$_REQUEST) ? $_REQUEST["id"] : "";
    if (empty($id)) {
        // id 값이 없을 경우
        pageBack();
    }
    $data = boardDetail($id);
}

if(!is_null($data) && checkArrayVal("menu_content",$data))$content = json_decode($data["menu_content"], true, 512, JSON_UNESCAPED_UNICODE);
if($thisfilename == FILE_BOARD_NOTICE ||
    $thisfilename == FILE_BOARD_DATA ||
    $thisfilename == FILE_BOARD_DISCLOSURE){

    $type = "";
    if($thisfilename == FILE_BOARD_DATA){
        $type = BOARD_TYPE_100;
        $tags = boardTags($type);
    }
    if($thisfilename == FILE_BOARD_NOTICE) $type = BOARD_TYPE_200;
    if($thisfilename == FILE_BOARD_DISCLOSURE) $type = BOARD_TYPE_300;
    if(checkArrayVal("tag", $_REQUEST)) $tag   = $_REQUEST["tag"];
    if(checkArrayVal("page", $_REQUEST)) $page   = $_REQUEST["page"];
    $params = array("page"    => $page, "limit"   => $limit, "type"=>$type, "tag"=>$tag ,"exposure_yn"=>"y");

    $result         = board($params);
    $list           = $result["data_list"];
    $paging         = $result["paging"];
    $total_count    = $paging["total_count"];
}

if($thisfilename == FILE_RIDERINQUIRY ||
    $thisfilename == FILE_DELIVERYINQUIRY_GENERAL ||
    $thisfilename == FILE_FOUNDEDINQUIRY){
    $sidoList       = sido();
}

$site = site();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iphone 모바일 확대 방지 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, user-scalable=0"">
    <title>바로고</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=MAIN_CSS_URL?>/import.css">
    <?php
    if($isOtherJs){
        ?>
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
        <!-- countUp -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.5/countUp.min.js" integrity="sha512-1YM6bEc8uBWgHGLyQbBZyKgb6X6SKs3xR9aP8AwfyWPMf4plLM8g3r+769pGiebwOW3L8QPP0m3PWyiaHJ5rOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php
    }
    ?>
    <script src="<?=MAIN_JS_URL?>/common.js"></script>
    <script src="<?=MAIN_JS_URL?>/web.js"></script>
    <link rel="icon" href="<?=MAIN_IMG_URL?>/common/logo.png">
</head>
<form id="locationForm" onsubmit="return false">
    <input type="hidden" name="func_type" id="func_type" value="">
    <input type="hidden" name="sido" id="sido_form" value="">
    <input type="hidden" name="gugun" id="gugun_form" value="">
</form>
<form id="mobileForm" onsubmit="return false">
    <input type="hidden" name="mobile" id="mobile" value="">
    <input type="hidden" name="func_type" id="func_type" value="">
    <input type="hidden" name="auth" id="auth" value="">
</form>
