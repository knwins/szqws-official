<?php 
//当前页<最大页
if($pageNo<=$pageCount && $pageCount>1){
$str="<div class='jogger'>";
for($i=$beginPageIndex;$i<=$endPageIndex;$i++){
if($pageNo==$i){$str.="<span class='current'>".$i."</span>";}
else{$str.="<a href='".$typemark."&pageNo=".$i."&ukey=".$ukey."'>".$i."</a>";}
}	 
if($pageCount>6 && ($pageNo+3)<$pageCount){$str.="<a href='".$typemark."&pageNo=".$pageCount."&ukey=".$ukey."' title='".$pageCount."'>...".$pageCount."</a>";}
if($pageNo<$pageCount){$str.="<a href='".$typemark."&pageNo=".($pageNo+1)."&ukey=".$ukey."' title='".$pageCount."'> 下一页 </a>";}	
$str.="</div>";
echo $str;
}
?>