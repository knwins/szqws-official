<!DOCTYPE html>
<html lang="cn">
<?php
@session_start();
include_once 'global.php';
include_once 'class/dataclass.php';
include_once 'class/utf8.php';
include_once 'class/imgclass.php';
$sql=mysql_query("select * from $website where id=1");
$rs=mysql_fetch_array($sql);
$titlename=$rs["titlename"];
$description=$rs["description"];
$keywords=$rs["keywords"];
$pageNo=$_GET["pageNo"];
if($_GET["bigtype"]<>''){$bigtype=(int)$_GET["bigtype"];}else{$bigtype='0';}
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
    <div class="name f74 fl">经典案例</div>
<div class="menu fr"><a href="/mobile/"><img alt="深圳办公家具" src="images/user.jpg" class="width100" /></a></div>    <div class="clear"></div>
  </header>
  <!-- 内容 -->
  <div class="main">
    <!--案例-->
    <section class="width100 box-bg-white mt20">
      <div class="sub_menu">
        <ul class="fix">
		
<?php			
$sql=mysql_query("select * from $case_type where rootid=0 order by sort");
while($rs=mysql_fetch_array($sql)){
?>
          <li <?php if($rs["id"]==$bigtype){echo "class='sel'";}?>><a href="product.php?bigtype=<?=$rs["id"]?>" class="f38"><?=$rs["name"]?></a></li>
<? } ?>   </ul>
      </div>
	  <div class="clear"></div>
      <div class="case_t"><img src="images/cases_t.jpg" alt="案例列表" class="width100" /></div>
      <div class="product_list">
        <div id="product_list_html">
         <? 
    $sqlSearch="select * from $case where id>0";
    if($typeid>0){$sqlSearch=$sqlSearch." and typeid=$typeid";}
    $sqlSearch=$sqlSearch." order by sort ASC";
    genpage($sqlSearch,8,$pageNo);
    //echo $sqlSearch;
    $result =mysql_query($sqlSearch);
    while($rs = mysql_fetch_array($result)){
    ?>
          <dl>
            <dt><a href="product_view.php?id=<?=$rs["id"]?>"><img src="<?=resize("../".$rs["image_logo"],"300","300");?>" alt="<?=$rs["name"]?>"></a></dt>
            <dd><a href="product_view.php?id=<?=$rs["id"]?>" >
              <?=$rs["name"]?>
              </a></dd>
          </dl>
          <? }?>
        </div>
       
	    <div class="clear"></div>
        <div class="btn_more fix"><a class="f32" id="btn_get_more" href="javascript:get_more_news()">加载更多&gt;&gt;</a></div>
        <input name="pageNo" id="pageNo" value="1" type="hidden">
		<input name="bigtype" id="bigtype" value="<?=$bigtype?>" type="hidden">
      </div>
	  
	  <? include_once 'footer.php';?>
	  
    </section>
  </div>
</div>
<? include_once 'bottom.php';?>
</div>
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript"> 
function get_more_news() {
            var pageNo = parseInt($("#pageNo").val());
			var bigtype = parseInt($("#bigtype").val());
            pageNo++;
            $("#pageNo").val(pageNo);
            $.ajax({
            url: "product_more.php?bigtype="+bigtype+"&pageNo=" + pageNo,
                cache: false,
                success: function(val) {
                if (val == "") {
                    $("#btn_get_more").html("已经没有了")
                    } else {
                        $("#product_list_html").append(val);
                    }
                }
            }) 
        }
		
		//底部按钮变换
        $("#menu_1").attr('src','images/nav_1.jpg');
        $("#menu_3").attr('src','images/nav_3_2.jpg');
    </script>
</body>
</html>
