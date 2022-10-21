<?php
require_once "admin/admin.php";
$thisfilename = basename($_SERVER['PHP_SELF'],".php");
//echo $_SERVER['REQUEST_URI'];

$isOtherJs = false;
if(in_array($thisfilename,["aboutUs","hub","index","rider"])){
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
$menuList   = menu("y");

$sidoList   =   null;
if($thisfilename == FILE_INDEX){
    foreach ($menuList as $item){
        if($item["menu_id"] == MENU_1){
            $data = $item;
            break;
        }
    }
    //$data    = menuDetail(MENU_1);
    $archives= archive(array("menuId"    => MENU_1));
}
if($thisfilename == FILE_RIDER){
    //$data    = menuDetail(MENU_2);
    foreach ($menuList as $item){
        if($item["menu_id"] == MENU_2){
            $data = $item;
            break;
        }
    }
    $archives= archive(array("menuId"    => MENU_2));
}
if($thisfilename == FILE_FOUNDED){
    //$data  = menuDetail(MENU_3);
    foreach ($menuList as $item){
        if($item["menu_id"] == MENU_3){
            $data = $item;
            break;
        }
    }
    $archives= archive(array("menuId"    => MENU_3));
}
if($thisfilename == FILE_ABOUTUS){
    //$data  = menuDetail(MENU_4);
    foreach ($menuList as $item){
        if($item["menu_id"] == MENU_4){
            $data = $item;
            break;
        }
    }
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
    <meta name="facebook-domain-verification" content="6hlcs89ojrafb3yigo25uzp8gwcm1m" />
    <meta name="naver-site-verification" content="34d6b948a68eef04ac8797bd7482b1b2780dc371" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iphone 모바일 확대 방지 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, user-scalable=0"">
    <title>바로고</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    if($isOtherJs){
        ?>
        <!-- Swiper JS -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js" integrity="sha512-ZHauUc/vByS6JUz/Hl1o8s2kd4QJVLAbkz8clgjtbKUJT+AG1c735aMtVLJftKQYo+LD62QryvoNa+uqy+rCHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Swiper CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" integrity="sha512-nSomje7hTV0g6A5X/lEZq8koYb5XZtrWD7GU2+aIJD35CePx89oxSM+S7k3hqNSpHajFbtmrjavZFxSEfl6pQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- countUp -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.5/countUp.min.js" integrity="sha512-1YM6bEc8uBWgHGLyQbBZyKgb6X6SKs3xR9aP8AwfyWPMf4plLM8g3r+769pGiebwOW3L8QPP0m3PWyiaHJ5rOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php
    }
    ?>
    <link rel="stylesheet" href="<?=MAIN_CSS_URL?>/import.css">
    <script src="<?=MAIN_JS_URL?>/common.js"></script>
    <script src="<?=MAIN_JS_URL?>/web.js"></script>
    <link rel="icon" href="<?=MAIN_IMG_URL?>/common/logo.png">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WXGDQWG');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158377279-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-158377279-1');
    </script>

    <!--// Global site tag (gtag.js) - Google Analytics -->

    <!-- Enliple Tracker Start -->
    <script type="text/javascript">
        (function(a,g,e,n,t){a.enp=a.enp||function(){(a.enp.q=a.enp.q||[]).push(arguments)};n=g.createElement(e);n.async=!0;n.defer=!0;n.src="https://cdn.megadata.co.kr/dist/prod/enp_tracker_self_hosted.min.js";t=g.getElementsByTagName(e)[0];t.parentNode.insertBefore(n,t)})(window,document,"script");
        enp('create', 'common', 'barogo2020', { device: 'B' }); // W:웹, M: 모바일, B: 반응형
        enp('send', 'common', 'barogo2020');
    </script>
    <!-- Enliple Tracker End -->

    <!-- 신규 뷰저블 코드 (20.10.23) -->
    <script type="text/javascript">
        (function(w, d, a){
            w.__beusablerumclient__ = {
                load : function(src){
                    var b = d.createElement("script");
                    b.src = src; b.async=true; b.type = "text/javascript";
                    d.getElementsByTagName("head")[0].appendChild(b);
                }
            };w.__beusablerumclient__.load(a);
        })(window, document, "//rum.beusable.net/script/b201012e105630u245/ff37366598");
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('2309892497271207253').pageView('visit');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '204472651896518');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=204472651896518&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->



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

