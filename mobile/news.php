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
$pageNo=$_GET["pageNo"];
if((int)$_GET["typeid"]<>''){$typeid=(int)$_GET["typeid"];}else{$typeid=1;}
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
    <div class="menu fr"></div>
    <div class="clear"></div>
  </header>
  <!-- 内容 -->
  <div class="main">
    <!--案例-->
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
  <div class="case_t"><img src="images/news_t.jpg" alt="经典案例" class="width100" /></div>
      <div class="news_list_inner">
        <div id="news_list_html">
		<?php
			$sqlSearch="select news.*,type.name name,type.id tid from $news as news join $news_type as type on news.typeid=type.id where 1=1";
			if($typeid<>""){$sqlSearch=$sqlSearch." and news.typeid=$typeid";}
			$sqlSearch=$sqlSearch." order by news.create_time desc";
			genpage($sqlSearch,8,$pageNo);
			$result =mysql_query($sqlSearch);
			while($rs = mysql_fetch_array($result)){?>
          <div class="news_item">
            <dl class="fl">
              <dt class="f74"><?=date("d",strtotime($rs["create_time"]))?></dt>
              <dd class="month f32"><?=date("Y-m",strtotime($rs["create_time"]))?></dd>
              <dd class="type"><a class="f28" href="news.php?typeid=<?=$rs["tid"]?>"><?=$rs["name"]?></a></dd>
            </dl>
            <dl class="fr">
              <dt><a href="news_view.php?id=<?= $rs["id"] ?>" class="f26"><?= $rs["title"] ?></a></dt>
              <dd class="spec"><a href="news_view.php?id=<?= $rs["id"] ?>" class="f26"><?=showtitle(strip_tags($rs["content"]),80)?></a></dd>
              <dd class="more fix"><span class=" f26 hits_t">浏览次数：</span><span class="f26 hits_num"><?=$rs["hit"]?></span><a class="btn_a" href="news_view.php?id=<?= $rs["id"] ?>">详细查看&gt;&gt;</a></dd>
            </dl>
            <div class="c"></div>
          </div>
            <? }?>
        </div>
        <div class="c"></div>
          <div class="btn_more fix"><a class="f24" id="btn_get_more" href="javascript:get_more_new()">加载更多&gt;&gt;</a></div>
        <input name="pageNo" id="pageNo" value="1" type="hidden">
        <input name="typeid" id="typeid" value="<?=$typeid?>" type="hidden">
      </div>
       
      <? include_once 'footer.php';?>
    </section>
  </div>
</div>
<? include_once 'bottom.php';?>
</div>
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript"> 
function get_more_new() {
            var pageNo = parseInt($("#pageNo").val());
			var typeid = parseInt($("#typeid").val());
            pageNo++;
            $("#pageNo").val(pageNo);
            $.ajax({
            url: "news_more.php?typeid="+typeid+"&pageNo=" + pageNo,
                cache: false,
                success: function(val) {
                if (val == "") {
                    $("#btn_get_more").html("已经没有了")
                    } else {
                        $("#news_list_html").append(val);
                    }
                }
            }) 
        }
	//底部按钮变换
        $("#menu_1").attr('src','images/nav_1.jpg');
	
    </script>
</body>
</html>
