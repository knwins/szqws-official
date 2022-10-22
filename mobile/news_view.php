<!DOCTYPE html>
<html lang="cn">
<?php
@session_start();
include_once 'global.php';
include_once 'class/baseclass.php';
include_once 'class/dataclass.php';
include_once 'class/utf8.php';
include_once 'class/imgclass.php';
$sql=mysql_query("select * from $website where id=1");
$rs=mysql_fetch_array($sql);
$titlename=$rs["titlename"];
$description=$rs["description"];
$keywords=$rs["keywords"];

$id=(int)$_GET["id"];
$sql1=mysql_query("select * from $news where id=$id");
$rs1=mysql_fetch_array($sql1);
$title=$rs1["title"];
$content=$rs1["content"];
$typeid=$rs1["typeid"];
$create_time=$rs1["create_time"];
$hit=$rs1["hit"];
if($rs1['img']!=""){$img="<img src='".resize($rs1["img"],500,0)."' />";}

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
    <div class="name f74 fl">新闻中心</div>
    <div class="menu fr"><a href="/mobile/"><img alt="深圳办公家具" src="images/user.jpg" class="width100" /></a></div>
    <div class="clear"></div>
  </header>
  <!-- 内容 -->
  <div class="main">
    <section class="width100 box-bg-white mt20">
	<div class="sub_menu">
        <ul class="fix">
		
 <? $sql=mysql_query("select * from $news_type order by sort asc limit 0,5"); 
		while($rs=mysql_fetch_array($sql)){ ?>
          <li <?php if($rs["id"]==$typeid){echo "class='sel'";}?>><a href="news.php?typeid=<?=$rs["id"]?>" class="f38"><?=$rs["name"]?></a></li>
<? } ?>
        </ul>
      </div>
	  <div class="clear"></div>
      <div class="news_t"><img src="images/news_t.jpg" alt="新闻" class="width100" /></div>
      <div class="news_info">
        <h1><?=$title?></h1>
        <div class="spec f24"><span>发表日期：</span><?=$create_time?> &nbsp;&nbsp;&nbsp; <span>浏览次数：</span><?=$hit?> </div>
        <div class="editor" id="editor">
		<?=$content?></div>
      </div>
      <? include_once 'footer.php';?>
    </section>
  </div>
</div>
<? include_once 'bottom.php';?>
</div>
</body>
</html>
