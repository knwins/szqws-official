<?php 
include_once '../global.php';
header("Content-type: text/html;charset=utf-8");
$typeids=$_REQUEST['typeids'];
if (strlen($typeids)>0) {
   $sqlSearch="select * from $case where typeid in (".$typeids.") order by id DESC";
}else{
   $sqlSearch="select * from $case order by id DESC";
}

$arr = array(); 
$num=mysql_num_rows(mysql_query($sqlSearch));
$sql=mysql_query($sqlSearch);
$n=1;
$arr="[";
		while($rs=mysql_fetch_array($sql)){
		if($n<$num){$arr=$arr.json_encode($rs).",";}else{$arr=$arr.json_encode($rs);break;}
		$n++;
		}
$arr=$arr."]";
echo $arr;
?>