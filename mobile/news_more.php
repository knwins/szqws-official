<?php
header("Content-type: text/html;charset=utf-8");
include_once 'global.php';
include_once 'class/baseclass.php';
include_once 'class/dataclass.php';
include_once 'class/utf8.php';
$page=$_GET["pageNo"];
if($_GET["typeid"]<>''){$typeid=(int)$_GET["typeid"];}else{$typeid=1;}
$sqlSearch="select news.*,type.name name,type.id tid from $news as news join $news_type as type on news.typeid=type.id where 1=1";
if($typeid<>""){$sqlSearch=$sqlSearch." and news.typeid=$typeid";}
$sqlSearch=$sqlSearch." order by news.create_time desc";
	genpage($sqlSearch,8,$page);
	$result =mysql_query($sqlSearch);
	if($page <= $endPageIndex){
	while($rs = mysql_fetch_array($result)){
		$html.="<div class='news_item'><dl class='fl'><dt class='f74'>";
		$html.=date("d",strtotime($rs["create_time"]))."</dt>";
		$html.="<dd class='month f32'>".date("Y-m",strtotime($rs["create_time"]));
		$html.="<dd class='type'><a class='f28' href='news.php?typeid=".$rs["tid"]."'>".$rs["name"]."</a></dd>";
		$html.="</dl>";
		$html.="<dl class='fr'>"; 
		$html.="<dt><a href='news_view.php?id=".$rs["id"]."' class='f26'> ".$rs["title"]."</a></dt>"; 
        $html.="<dd class='spec'><a href='news_view.php?id=".$rs["id"]."' class='f26'>".showtitle(strip_tags($rs["content"]),80)."</a></dd>";
		$html.="<dd class='more fix'><span class='f26 hits_t'>浏览次数：</span><span class='f26 hits_num'>".$rs["hit"]."</span><a class='btn_a' href='news_view.php?id=".$rs["id"]."' >详细查看&gt;&gt;</a></dd>"; 
        $html.="</dl>";
		$html.="<div class='c'></div>";
		$html.="</div>";
		  
		}
	}else{
	 $html.="";
	}
 
echo $html;

?>
