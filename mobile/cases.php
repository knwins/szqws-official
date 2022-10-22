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

$id=$_GET["id"];
$sql1=mysql_query("select * from $product where id=$id");
$rs1=mysql_fetch_array($sql1);
$proname=$rs1["proname"];
$img=$rs1["img"];
$mark=$rs1["mark"];
$smalltype=$rs1["small_type"];
$bigtype=$rs1["big_type"];
$content=$rs1["content"];
$description=$rs1["description"];
$create_time=$rs1["create_time"];
$name=$_GET["name"];
 
$path="../upload/caseimg/"; 
$namedata="精选案例图片";
$note="部分客户案例精选图，深圳办公家具,深圳办公家具厂,订制家具,深圳办公屏风,办公家具厂,深圳办公家具采购,家具公司,办公家具批发,办公家具,订做衣柜,订制整体衣柜,衣柜订做,屏风订做,屏风卡座";
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
    <div class="name f74 fl"><?=$namedata?></div>
    <div class="menu fr"><a href="/mobile/"><img alt="深圳办公家具" src="images/user.jpg" class="width100" /></a></div>
    <div class="clear"></div>
  </header>
  <!-- 内容 -->
  <div class="main">
    <!--案例-->
    <section class="width100 box-bg-white mt20">
      <div class="clear"></div>
      <div class="case_t"><a href="/Cases/index"><img src="images/cases_t.jpg" class="width100" /></a></div>
      <div class="picture_info">
	  
	    <div class="note f32">备注：<?=$note?></div>
        <div class="content">
          <?php
		$page=$_GET['page'];//获取当前页数
		$max=10;//设置每页显示图片最大张数
		$handle = @opendir($path); //当前目录
		
			while (false !== ($file = readdir($handle))) { //遍历该php文件所在目录
			  list($filesname,$kzm)=explode(".",$file);//获取扩展名
				if($kzm=="gif" or $kzm=="jpg" or $kzm=="JPG") { //文件过滤
				  if (!is_dir($path.$file)) { //文件夹过滤
					$array[]=$file;//把符合条件的文件名存入数组
					$filename[] = $file;
					$i++;//记录图片总张数
				   }
				  }
			}
			
		@closedir($handle);	
	   array_multisort($filename,SORT_ASC,SORT_NUMERIC, $array);
			
 
			
		for ($j=$max*$page;$j<($max*$page+$max)&&$j<$i;++$j){//循环条件控制显示图片张数
			echo "<img class='width100' src=\"$path$array[$j]\">";//输出图片数组
		}
		
		
		$Previous_page=$page-1;
		$next_page=$page+1;
		if ($Previous_page<0){
			echo "<div class='pagelist'>";
			echo "<li>上页</li>";
			echo "<li><a href=?name=".$name."&page=$next_page>下页</a</li>";
			echo "</div>";
		}
		else if ($page<=$i/$max){
			echo "<div class='pagelist'>";
			echo "<li><a href=?name=".$name."&page=$Previous_page>上页</a></li>";			
			echo "<li><a href=?name=".$name."&page=$next_page>下页</a></li>";
			echo "</div>";
		}else{
			echo "<div class='pagelist'>";
			echo "<li><a href=?name=".$name."&page=$Previous_page>上页</a></li>";
			echo "<li>下页</li>";
			echo "</div>" ; 
		}
		?>
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
