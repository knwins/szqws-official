<?php 
include_once './global.php';
header("Content-type: text/html;charset=utf-8");


//获取单独名称
function getname($id,$name,$table,$nid){

 		$sql=mysql_query("select * from $table where $id='$nid'");
		$rs=mysql_fetch_array($sql);
		$name=$rs[$name];
		return $name;
 } 
 
 //统计函数
function tongji($table,$tiaojian,$num){
$sql="select * from $table where ".$tiaojian;
//echo $sql;
$num=mysql_num_rows(mysql_query($sql));
return $num;
}
 
 //下拉菜单无已选项
  function getSelect($table,$table_id,$table_name){
	  echo "select * from $table order by id asc";
	$sql=mysql_query("select * from $table order by id asc");
	$option="";
	while($rs = mysql_fetch_array($sql)){
	 $option.="<option value='".$rs[$table_id]."'";
	 $option.=">".$rs[$table_name]."</option>";
	}
	return $option;
 }

 
  //下拉菜单有已选项
 function getSelected($table,$table_id,$table_name,$table_v){
	$sql=mysql_query("select * from $table order by id asc");
	$option="";
	while($rs = mysql_fetch_array($sql)){
	 $option.="<option value='".$rs[$table_id]."'";
	 if($table_v==$rs[$table_id]){$option.="selected";}
	 $option.=">".$rs[$table_name]."</option>";
	}
	 return $option;
 }
 
 //获取一级分类 
function getSelectFristClass($table,$table_id,$table_name,$frist_class){
	$sql=mysql_query("select * from $table where rootid=0 order by sort asc");
	$option="";
	while($rs = mysql_fetch_array($sql)){
	 $option.="<option value='".$rs[$table_id]."'";
	 if($rs[$table_id]==$frist_class){$option.="selected='selected'";}
	 $option.=">".$rs[$table_name]."</option>";
	}
	return $option;
 } 

 
//获取二类
function getSelectSecondClass($table,$table_id,$table_name,$frist_class,$second_class){
	$sql=mysql_query("select * from $table where rootid='$frist_class' order by sort asc");
	$option="";
	while($rs = mysql_fetch_array($sql)){
	 $option.="<option value='".$rs[$table_id]."'";
	 if($rs[$table_id]==$second_class){$option.="selected='selected'";}
	 $option.=">".$rs[$table_name]."</option>";
	}
	return $option;
 } 
 
//获取三级分类
 function getSelectThirdClass($table,$table_id,$table_name,$second_class,$third_class){
	$sql=mysql_query("select * from $table where parentid='$second_class' order by sort asc");
	$option="";
	while($rs = mysql_fetch_array($sql)){
	 $option.="<option value='".$rs[$table_id]."'";
	 if($rs[$table_id]==$third_class){$option.="selected='selected'";}
	 $option.=">".$rs[$table_name]."</option>";
	}
	return $option;
 } 
 
 
 
 
	//选择产品分类
	function getSelectProductType($table,$typeid){
		$sql=mysql_query("select * from $table where parentid=0 order by sort asc");
		$option="";
		while($rs = mysql_fetch_array($sql)){	
			//------------111111111 start------------
			$fristid=$rs["id"];
			$option.="<option value='".$rs["id"]."'";
			if($rs["id"]==$typeid){$option.="selected='selected'";}
			$option.=">".$rs["name"]."</option>";
			
			//---------------------------
			$sql1=mysql_query("select * from $table where parentid='$fristid' order by sort asc");
			while($rs1 = mysql_fetch_array($sql1)){
			$secondid=$rs1["id"];
			//--------------2222 start-------------
			$option.="<option value='".$rs1["id"]."'";
			if($rs1["id"]==$typeid){$option.="selected='selected'";}
			$option.=">&nbsp;&nbsp;∟".$rs1["name"]."</option>";
			
			
			//---------------------------
			$sql2=mysql_query("select * from $table where parentid='$secondid' order by sort asc");
			while($rs2 = mysql_fetch_array($sql2)){
			//--------------2222 start-------------
			$option.="<option value='".$rs2["id"]."'";
			if($rs2["id"]==$typeid){$option.="selected='selected'";}
			$option.=">&nbsp;&nbsp;&nbsp;&nbsp;∟".$rs2["name"]."</option>";
			//-------------22222 end--------------
			}
			
			
			//-------------22222 end--------------
			}
			
			
			//------------111111111 end------------
			
		}
		return $option;
	} 
 
 
 

 

//分页函数//----------------------------------------------------------------------------------------------------------------------------
//分页函数//----------------------------------------------------------------------------------------------------------------------------
function genpage(&$sql,$pageSize,$pageNo){

        global $pageCount,$total,$pageNo,$beginPageIndex,$endPageIndex;
		/*
		$pageCount,//总页数
		$total,//总计算数
		$pageNo,//当前页数
		$beginPageIndex,//第一页
		$endPageIndex,//最后页
		 */
		$pageNo=isset($pageNo)?intval($pageNo):1;		
		$pagesql = strstr($sql," from ");//截取 form后面的东西
		$pagesql = "select * ".$pagesql;
		$result = mysql_query($pagesql);
		if($rs = mysql_fetch_array($result)){$total = mysql_num_rows($result);} //获取$sums总数
		
		$pageCount=ceil($total/$pageSize);  //计算出总页数
		if ($pageNo>$pageCount){
		$pageNo=$pageCount;  // 对提交过来的page做一些检查
		}
		if ($pageNo<=0){ 
		$pageNo=1;                   // 对提交过来的page做一些检查
		}
		$offset=($pageNo-1)*$pageSize;   //偏移量
		$beginPageIndex=beginPageIndex();  //第一页
		$endPageIndex=endPageIndex();  //最后页
		$sql=$sql." limit $offset,$pageSize ";	
}




	function beginPageIndex() {
	    global $pageCount,$total,$pageNo;
		// 计算 beginPageIndex 和 endPageIndex
		// >> 总页数不多于10页，则全部显示
		if ($pageCount <= 6) {
			$beginPageIndex = 1;
		}
		// >> 总页数多于10页，则显示当前页附近的共10个页码
		else {
			// 当前页附近的共10个页码（前4个 + 当前页 + 后5个）
			$beginPageIndex = $pageNo - 3;
			if ($beginPageIndex < 1) {
				$beginPageIndex = 1;
			}
			// 当后面的页码不足5个时，则显示后10个页码
			if ($beginPageIndex > $total) {
				$beginPageIndex = $total - 6 + 1;
			}
		}
		
		 //echo "beginPageIndex:".$beginPageIndex;
		return $beginPageIndex;

	}
	
		function endPageIndex() {
		 
		 global $pageCount,$total,$pageNo,$beginPageIndex;
		 
		 //echo "total:".$total;
		// 计算 beginPageIndex 和 endPageIndex
		// >> 总页数不多于10页，则全部显示
		if ($pageCount <= 6) {
			$endPageIndex = $pageCount;
		}
		// >> 总页数多于10页，则显示当前页附近的共10个页码
		else {
			// 当前页附近的共10个页码（前4个 + 当前页 + 后5个）
			$endPageIndex = $pageNo + 3;
			
			// 当前面的页码不足4个时，则显示前10个页码
			if ($beginPageIndex < 1) {
				$endPageIndex = 6;
			}
			// 当后面的页码不足5个时，则显示后10个页码 //修改BUG total修改成pageCount 2019-12-19
			if ($endPageIndex > $pageCount) {
				$endPageIndex = $pageCount;

			}
		}
		
		//echo "endPageIndex:".$endPageIndex;
		return $endPageIndex;
	}
 

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------------------最近用到的php读取文件夹目录里的文件，并按照日期，大小，名称排序，所以写了一个方法，备用。
function dir_size($dir,$url){
     $dh = @opendir($dir);             //打开目录，返回一个目录流
     $return = array();
      $i = 0;
          while($file = @readdir($dh)){     //循环读取目录下的文件
             if($file!='.' and $file!='..'){
              $path = $dir.'/'.$file;     //设置目录，用于含有子目录的情况
              if(is_dir($path)){
          }elseif(is_file($path)){
              $filesize[] =  round((filesize($path)/1024),2);//获取文件大小
              $filename[] = $path;//获取文件名称                     
              $filetime[] = date("Y-m-d H:i:s",filemtime($path));//获取文件最近修改日期    
   
              $return[] =  $url.'/'.$file;
          }
          }
          }  
          @closedir($dh);             //关闭目录流
          array_multisort($filesize,SORT_DESC,SORT_NUMERIC, $return);//按大小排序
          //array_multisort($filename,SORT_DESC,SORT_STRING, $files);//按名字排序
          //array_multisort($filetime,SORT_DESC,SORT_STRING, $files);//按时间排序
          return $return;               //返回文件
     }
	 
	 //------------------end
?>
