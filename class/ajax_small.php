<?php 
include_once 'global.php';
header("Content-type: text/html;charset=utf-8");
$BigId=$_REQUEST['BigId'];
$sqlSearch="select procate_id,catename,catename_en from $procate where rootid=$BigId";
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