<?php 
if($pageCount>$pageSize){
$str="<div class='jogger'>";
for($i=$beginPageIndex;$i<=$endPageIndex;$i++){
	if($pageNo==$i){$str.="<span class='current'>".$i."</span>";}
	else{$str.="<a href='".$filename."-".$i.".html'>".$i."</a>";}
}	 
if($pageCount>10 && ($pageNo+5)<$pageCount){$str.="<a href='".$filename."-".$pageCount.".html' title='".$pageCount."'>...".$pageCount."</a>";}
if($pageNo<$pageCount){$str.="<a href='".$filename."-".($pageNo+1).".html' title='".$pageCount."'> 下一页 </a>";}	
$str.="</div>";
echo $str;
}
?>