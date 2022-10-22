<?php 
include_once 'global.php';
header("Content-type: text/html;charset=utf-8");

//查询语句

//首页问答
$sql_index_news_aq="select news.id id,news.title title,news.inro inro,news.create_time from $news as news  left join $news_type as type on type.id=news.typeid where type.mark='aq' order by news.create_time desc limit 0,10";          

//首页友情链接
$sql_index_banner_link="select banner.name,banner.url,banner.img from $banner banner left join $banner_type type on banner.typeid=type.id where type.mark='link' limit 0,20";

//首页公司新闻
$sql_index_news_company="select news.id,news.title,news.img,news.content,news.create_time from $news as news  left join $news_type as type on type.id=news.typeid where type.mark='company-news' order by news.create_time desc limit 0,10";

//首页行业资讯
$sql_index_news_zixun="select news.id,news.title,news.img,news.content,news.create_time from $news as news left join $news_type as type on type.id=news.typeid where type.mark='news' order by news.create_time desc limit 0,10";


//首页公司新闻带图
$sql_index_news_company_pic="select news.id id,news.title title,news.img img,news.inro inro from $news as news  left join $news_type as type on type.id=news.typeid where type.mark='company-news' and img!='' order by news.create_time desc limit 0,1";

//首页行业资讯带图
$sql_index_news_zixun_pic="select news.id id,news.title title,news.img img,news.inro inro from $news as news  left join $news_type as type on type.id=news.typeid where type.mark='news' and img!='' order by news.create_time desc limit 0,1";

//首页案例
$sql_index_news_case="select case_.id,case_.title,case_.img,case_.content,case_.tags from $case as case_  left join $case_type as type on type.id=case_.typeid where case_.img!='' order by case_.id desc limit 0,10";

//首页客户见证
$sql_index_news_custom="select news.id id,news.title title,news.img img,news.content content from $news as news  left join $news_type as type on type.id=news.typeid where type.mark='custom' and img!='' order by news.create_time desc limit 0,10";

$sql_index_banner="select banner.name,banner.img,banner.url from $banner banner left join $banner_type type on banner.typeid=type.id where type.mark='pc_index' order by banner.sort asc LIMIT 0,5";

$sql_index_product_type_office="select * from $product_type where parentid='3' order by sort asc LIMIT 0,8";


//案例列表中热门的一条
$sql_index_news_case_hot_one="select case_.id,case_.title,case_.img,case_.content,case_.tags from $case as case_  left join $case_type as type on type.id=case_.typeid where case_.img!='' and case_.state=1 order by case_.id desc limit 0,1";

//底部列表数据
$sql_products="select product.* from $product as product order by product.id desc";
$sql_news_types="select news_type.* from $news_type as news_type order by news_type.id desc";
$sql_projects="select project.* from $project as project order by project.id desc";
$sql_cases="select case_.* from $case as case_ order by case_.id desc";

?>
