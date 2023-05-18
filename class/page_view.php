<?php 
/*
echo "pageCount:".$pageCount;
echo "pageSize:".$pageSize;
echo "endPageIndex:".$endPageIndex;
echo "beginPageIndex:".$beginPageIndex;
echo "pageNo:".$pageNo;
*/
//当前页<最大页
if($pageNo<=$pageCount && $pageCount>1){
$str="<div class='jogger'>";
for($i=$beginPageIndex;$i<=$endPageIndex;$i++){
if($pageNo==$i){$str.="<span class='current'>".$i."</span>";}
else{$str.="<a href='".$typemark."-".$i.".html'>".$i."</a>";}
}	 
if($pageCount>6 && ($pageNo+3)<$pageCount){$str.="<a href='".$typemark."-".$pageCount.".html' title='".$pageCount."'>...".$pageCount."</a>";}
if($pageNo<$pageCount){$str.="<a href='".$typemark."-".($pageNo+1).".html' title='".$pageCount."'> 下一页 </a>";}	
$str.="</div>";
echo $str;
}
?>