<!DOCTYPE html>
<html lang="cn">
<?php
@session_start();
include_once 'global.php';
include_once 'class/dataclass.php';
$sql=mysql_query("select * from $company where mark='about'");
$rs=mysql_fetch_array($sql);
$content=$rs["content"];
$titlename=$rs["title"];
$description=$rs["description"];
$keywords=$rs["keywords"];
?>
<head>
<meta charset="utf-8" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="yes" name="apple-touch-fullscreen" />
<meta content="telephone=no,email=no" name="format-detection" />
<!--手机和邮件不调用手机程序-->
<meta name="wap-font-scale" content="no" />
<meta name="description" content="<?=$description?>">
<meta name="keywords" content="<?=$keywords?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?=$titlename?></title>
<!--屏幕识别JS-->
<script src="script/flexible.js"></script>
<link href="style/base.css" rel="stylesheet" />
<link rel="stylesheet" href="style/header.css" />
<link href="style/bottom.css" rel="stylesheet" />
<link rel="stylesheet" href="style/product.css" />
</head>
<body>
<div class="page">
  <!-- 头部 -->
  <header class="width100 header2">
    <div class="back fl"><a href="javascript:window.history.back()"><img src="images/back.jpg" alt="返回" class="width100" /></a></div>
    <div class="name f74 fl">关于我们</div>
    <div class="menu fr"><a href="/mobile/"><img alt="深圳办公家具" src="images/user.jpg" class="width100" /></a></div>
    <div class="clear"></div>
  </header>
  <!-- 内容 -->
  <div class="main">
    <!--案例-->
    <section class="width100 box-bg-white mt20">
      <div class="clear"></div>
      <div class="case_t"><a href="/Cases/index"><img src="images/about_t.jpg" class="width100" /></a></div>
      <div class="picture_info">
        <div class="content">
           <?=$content?>
        </div>
      </div>
      <? include_once 'footer.php';?>
    </section>
  </div>
</div>
<? include_once 'bottom.php';?>
</div>
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript"> 
		//底部按钮变换
        $("#menu_1").attr('src','images/nav_1.jpg');
        $("#menu_4").attr('src','images/nav_4_2.jpg');
 </script>
</body>
</html>
