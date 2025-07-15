<?php
include_once 'global.php';
include_once 'class/smtp.php';
header("Content-type: text/html;charset=utf-8");
 
 
//*静态页面生成函数
function PhpToHtml($sfile,$ofile){
ob_start();
@readfile($sfile); 
$content = ob_get_contents();
$filepath = fopen($ofile, "w");
fwrite($filepath, $content);
ob_end_clean(); 
fclose($filepath);
return true;
}

 function showtitle($string,$sublen){
 
            $code = 'UTF-8';
			if($code == 'UTF-8'){
			$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
			preg_match_all($pa, $string, $t_string);
			if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
			return join('', array_slice($t_string[0], $start, $sublen));
			}
				else{
					$start = $start*2;
					$sublen = $sublen*2;
					$strlen = strlen($string);
					$tmpstr = '';
						for($i=0; $i<$strlen; $i++){
						if($i>=$start && $i<($start+$sublen)){
						if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);else $tmpstr.= substr($string, $i, 1);} 
						if(ord(substr($string, $i, 1))>129) $i++;
						}
					if(strlen($tmpstr)<$strlen ) $tmpstr.= "…";
					return $tmpstr;
					  }
} 
 

 

function addemail($website,$tomail,$subject,$content,$type,$backstate){
$nowtime=date("Y-m-d H:i:s",time());
         //获取发送邮箱设置

		$sql_stmp=mysql_query("select * from $website where website_id=1");
		$rs_stmp=mysql_fetch_array($sql_stmp);
		$smtpserver=$rs_stmp['mail_smtp'];
		$smtpuser=$rs_stmp['mail_username'];
		$smtpsort=$rs_stmp['mail_port'];
		$smtppwd=$rs_stmp['mail_password'];
		$website_mail_nickname=$rs_stmp['mail_nickname'];
		$smtpsendname=$rs_stmp['mail_sendname'];
	
		
		
				//////////////////////////邮件发送部分////////////////////
				
				if($type=="SMTP"){//smtp发送
				$mailtype="HTML";
				
				
				$smtp=new smtp($smtpserver,$smtpsort,true,$smtpuser,$smtppwd,$smtpsendname); //创新类
				
				//$smtp->debug=true;
				$subject=iconv("UTF-8","GB2312//IGNORE",$subject);
				$content=iconv("UTF-8","GB2312//IGNORE",$content);
				$headers = 'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'Content-type: text/html; charset=GB2312' . "\r\n"; // Additional headers 
				$headers .= 'Reply-To:' .$website_mail_nickname. "\r\n"; 
				$headers .= 'From:' .$website_mail_sendname. "\r\n"; 
				$send=$smtp->sendmail($tomail,$smtpsendname,$subject,$content,$mailtype);
				if($send!=1){return $backstate=0; exit;}else{ return $backstate=1;}
				
				}
				
				if($type=="MAIL"){//MAIL发送
				
					$mailtype="HTML";
					$subject=iconv("UTF-8","GB2312//IGNORE",$subject);
					$content=iconv("UTF-8","GB2312//IGNORE",$content);
					$headers = 'MIME-Version: 1.0' . "\r\n"; 
					$headers .= 'Content-type: text/html; charset=GB2312' . "\r\n"; // Additional headers 
					$headers .= 'Reply-To:' .$website_mail_nickname. "\r\n"; 
					$headers .= 'From:' .$website_mail_sendname. "\r\n"; 
					if(!mail($tomail,$subject,$content,$headers,$website_mail_nickname)){ 
					return $backstate=0;}else{ return $backstate=1;}
				
				}
				
				//////////////////////////邮件发送部分end////////////////////

}
?>