<?php
header("Content-type: text/html;charset=utf-8");
include_once 'global.php';
include_once 'class/dataclass.php';
include_once 'class/utf8.php';
include_once 'class/imgclass.php';

$page=$_GET["pageNo"];
if($_GET["bigtype"]<>''){$bigtype=(int)$_GET["bigtype"];}else{$bigtype='0';}
$sqlSearch="select * from $case where id>0";
if($bigtype>0){$sqlSearch=$sqlSearch." and big_type=$bigtype";}
$sqlSearch=$sqlSearch." order by sort ASC";
	genpage($sqlSearch,8,$page);
	$result =mysql_query($sqlSearch);
	if($page <= $endPageIndex){
	while($rs = mysql_fetch_array($result)){
		$html.="<dl>";
		$html.="<dt><a href='product_view.php?id=".$rs["id"]."'><img src=".resize("../".$rs["image_logo"],"300","300")." alt=".$rs["name"]."></a></dt>";
		$html.="<dd><a href='product_view.php?id=".$rs["id"]."' class='f24'>".$rs["name"]." </a></dd>";
		$html.="</dl>";
		}
	}else{
	 $html.="";
	}
 
echo $html;

?>
