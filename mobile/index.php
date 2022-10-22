<!DOCTYPE html>
<html lang="cn">
<?php
include_once 'global.php';
include_once 'class/dataclass.php';
include_once 'class/utf8.php';
include_once 'class/imgclass.php';
$sql=mysql_query("select * from $website where id=1");
$rs=mysql_fetch_array($sql);
$titlename=$rs["titlename"];
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
<!--swiper 组件-->
<link rel="stylesheet" href="style/swiper.min.css" />
<!--frozenUI-->

<link href="style/frozen.css" rel="stylesheet" />
<link href="style/base.css" rel="stylesheet" />
<link rel="stylesheet" href="style/header.css" />
<link href="style/bottom.css" rel="stylesheet" />
<link rel="stylesheet" href="style/index.css" />
</head>
<body>
<div class="page">
  <!-- 头部 -->
  <header>
    <ul class="ui-row">
      <li class="ui-col ui-col-100">
        <div class="logo"><img src="images/logo.png"/></div>
      </li>
    </ul>
  </header>
  <!-- 内容 -->
  <div class="main">
    <div class="banner">
      <div class="swiper-container">
        <div class="swiper-wrapper">
			 <?php 
			$sql=mysql_query("select banner.name,banner.img,banner.url from $banner banner left join $banner_type type on banner.typeid=type.id where type.mark='mobile' order by banner.sort asc LIMIT 0,3");
			while($rs=mysql_fetch_array($sql)){?>
			 <div class="swiper-slide"><a href="<?=$rs["url"]?>"><img src="<?="../".$rs["img"]?>" alt="<?=$rs["name"]?>" /></a></div>
 			<? } ?>	
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="section func-box">
      <div class="box-padding">
        <ul class="ui-row">
          <li class="ui-col ui-col-25 item">
		  <a  href="product.php"> <img src="images/f1.png" alt="产品展示"  class="width100" />
            <p>案例列表</p>
            </a></li>
          <li class="ui-col ui-col-25 item"><a href="/mobile/news.php?typeid=1"> <img src="images/f2.png" alt="新闻资讯" class="width100" />
            <p>新闻资讯</p>
            </a></li>
           <li class="ui-col ui-col-25 item"><a href="mark.php"> <img src="images/f3.png" alt="商标申请" class="width100" />
            <p>商标申请</p>
            </a></li>
          <li class="ui-col ui-col-25 item"><a  href="aboutus.php"> <img src="images/f4.png" alt="关于我们" class="width100" />
            <p>关于我们</p>
            </a></li>
             
        </ul>
      </div>
    </div>
	
	 <!-- 新闻 -->
    <div class="section-margin section newsflash">
      <div id="" class="right" style="width: 90%;margin-left: 2%;">
        <div id="news-container">
          <ul>
            
           <?php $sql_system1="select * from $news order by create_time desc limit 0,6"; 
	$sql_system1=mysql_query($sql_system1); 
	while ($rs=mysql_fetch_array($sql_system1)){?>
		<li><span>【<?=$rs["create_time"]?>】</span>  <a href="news_view.php?id=<?=$rs["id"]?>" title="<?=$rs["title"]?>"><?=$rs["title"]?></a></li>
      <? }?>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </div>
	
   
   <!--服务内容-->
    <section class="width100 box-bg-white mt20">
      <div class="service_t"><a href="/Service/index"><img src="images/index_t_service.jpg" class="width100" alt="品牌官网设计"></a></div>
      <div class="service_list">
        <dl class="f">
          <dt><a><img src="images/index_service_1.jpg" alt="品牌官网设计" class="width100"></a></dt>
          <dd class="t"><a class="f32">品牌官网设计</a></dd>
          <dd class="spec"><a  class="f22">策划、设计、前端、程序开发全方位一条龙服务充分了解企业文化、行业特点，体现企业特色设计师一对一沟通，充分了解你的需求和想法时刻掌握最新技术动向，打造高品质网站</a></dd>
          <dd class="btn"><img src="images/index_btn_service.jpg" alt="点击查看" class="width100"></dd>
        </dl>
        <dl class="f">
          <dt><a ><img src="images/index_service_2.jpg" alt="商城网站开发" class="width100"></a></dt>
          <dd class="t"><a class="f32">商城网站开发</a></dd>
          <dd class="spec"><a class="f22">专业量身定制设计、定制功能、定制后台开发拥有资深开发团队，追求质量同时保证速度追求完美，不断提升系统响应速度和稳定性完善的测试流程，在上线之前解决问题</a></dd>
          <dd class="btn"><img src="images/index_btn_service.jpg" alt="点击查看" class="width100"></dd>
        </dl>
        <dl class="f">
          <dt><img src="images/index_service_3.jpg" alt="手机、微信网站建设" class="width100"></dt>
          <dd class="t"><a  class="f32">手机、微信网站建设</a></dd>
          <dd class="spec"><a class="f22">个性设计，独一无二，用设计风格体现企业文化精简代码、追求速度，兼容主流手机浏览器和PC端数据同步，管理方便，全方位网络营销零成本增加微信网站</a></dd>
          <dd class="btn"><img src="images/index_btn_service.jpg" alt="点击查看" class="width100"></dd>
        </dl>
        <dl class="f">
          <dt><img src="images/index_service_4.jpg" alt="平面设计、摄影" class="width100"></dt>
          <dd class="t"><a class="f32">平面设计、摄影</a></dd>
          <dd class="spec"><a class="f22">平面：画册设计，包装设计，标志设计摄影：凭着多年的摄影经验为客户量身定做最适合的摄影服务,对每一个项目都深入的研究，深刻洞察每一个细节,立志成为行业的推动者和缔造者</a></dd>
          <dd class="btn"><a><img src="images/index_btn_service.jpg" alt="点击查看" class="width100"></a></dd>
        </dl>
        <div class="c"></div>
      </div>
    </section>
    
    
    <!--成功案例-->
    <section class="width100 box-bg-white mt20">
      <div class="service_t"><img src="images/index_t_case.jpeg" class="width100" alt="产品展示"></div>
      <div class="clear"></div>
      <div class="case_list">
        <?php $sql_product_hot="select * from $product where state=1 order by sort DESC limit 0,6"; 
	$product_hot=mysql_query($sql_product_hot); 
	while ($rs=mysql_fetch_array($product_hot)){?>
        <dl class="f">
          <dt><a href="product_view.php?id=<?=$rs["id"]?>"><img src="<?=resize("../".$rs["img"],"295","221");?>" alt="<?=$rs["proname"]?>" class="width100"></a></dt>
          <dd class="t"><a href="product_view.php?id=<?=$rs["id"]?>" class="f32"><?=$rs["proname"]?></a></dd>
		</dl>
        <? }?>
        <div class="c"></div>
      </div>  
    </section>
   
    <!--关于我们-->
   <section class="width100 box-bg-white mt20">
      <div class="case_t"><a href="product.php"><img src="images/index_t_about_us.jpg" alt="关于我们" border="0" class="width100"></a></div>
      <div class="case_list">
	  
	  
	   
	    <div class="editor" id="editor" style="padding: 20px 15px 20px 15px;">
	    	
			<p><b>我们是谁？</b></p>
<p><b>懂您所需、做您所想</b></p>
<p>
公司专注于高品质网站视觉设计以及程序开发的提供商，多年来活跃于网站建设、品牌形象网页设计、互动多媒体、SEO网站排名优化等各个领域。得益于团队的优质素养和良好合作，我们的产品一贯重视勃然迸发的创意理念和高效的客户回报率。我们坚信“设计提升品质”的理念，一直秉承国际化创作观念和富有成效的专业操作。始终从市场的角度和客户的需求出发，融合视觉美学及有效策略，提升企业与产品的内在品质，为品牌创造独到的形象，拓展市场竞争空间与竞争优势。</p>

<p>多年来，千维顺网络以建立行业服务品质标杆为目标，不断提升服务质量，愿携手广大客户继续领先构建中国企业信息化运营领域的新标杆。</p>

	    </div>
	  
       
       
      
        
        <div class="c"></div>
      </div>
    </section>
    
    
	
	<? include_once 'footer.php';?>
  </div>
</div>
<? include_once 'bottom.php';?>
</div>
<!--frozen UI-->
<script src="lib/zepto.min.js"></script>
<script src="script/frozen.js"></script>
<script type="text/javascript" src="script/swiper.min.js"></script>
<script type="text/javascript">
    	var swiper = new Swiper('.swiper-container',{
    		autoplay: 4000,//可选选项，自动滑动
    		pagination: '.swiper-pagination'
    	});
</script>
<!--JQuery-->
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript" src="script/jquery.vticker-min.js"></script>
<!---流动新闻-->
<script type="text/javascript">
    $(function(){
    	$('#news-container').vTicker({ 
    		speed: 500,
    		pause: 3000,
    		animation: 'fade',
    		mousePause: false,
    		showItems: 3
    	});
    });
    </script>
</body>
</html>
