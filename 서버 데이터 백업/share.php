<?php
require_once "admin/admin.php";
$scheme = (isHttpsRequest()) ? "https://" : "http://";
$url    = $scheme . $_SERVER['HTTP_HOST'] . "/archive/detail?id=".$_REQUEST["id"];
header('location:' . $url);