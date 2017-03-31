<?php
$site;
include("admin/connect.php");
$proto=!empty($_SERVER['HTTPS']) ? "https" : "http";
if(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']))
{
    $proto = $_SERVER['HTTP_X_FORWARDED_PROTO'];
}
$site=$proto."://".$_SERVER['HTTP_HOST'];
if($site=="http://localhost")
{
	$site = $site."/kiwash/";
}
else
{
	$site = $site."/";
}

$request_path = $_SERVER['REQUEST_URI'];
$urlparams=explode('&',$request_path);

$page = $urlparams[1];


?>
<style>
.square li
{
	text-transform:capitalize;
}
</style>