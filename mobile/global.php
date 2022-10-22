<?php
error_reporting(0);
@session_start();
include_once 'config.php';
$connsql=mysql_connect($dbhost, $dbuser,$dbpass);//连接数据库
$connbase=mysql_select_db($dbbase,$connsql);//连接表
mysql_query("SET NAMES utf8");//设置字符集为UTF8
//定义数据表
$rooturl="http://www.szqws.com/templet/";//域名必填选
$et='qws_';
$admin_user=$et.'admin_user';
$admin_usergroup=$et.'admin_usergroup';
$banner=$et.'banner';
$banner_type=$et.'banner_type';
$case=$et.'case';
$case_type=$et.'case_type';
$company=$et.'company';
$feedback=$et.'feedback';
$filemodule=$et.'filemodule';
$log=$et.'log';
$news=$et.'news';
$news_type=$et.'news_type';
$product=$et.'product';
$product_type=$et.'product_type';
$sale=$et.'sale';
$website=$et.'website'; 
$tm=$et.'tm';
$tm_class=$et.'tm_class'; 
$tm_tree=$et.'tm_tree'; 
?>
