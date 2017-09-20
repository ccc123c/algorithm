<?php
header('content-type:text/html;charset=utf8');
$conf=[
'host'=>'localhost:3306',
'user'=>'root',
'pass'=>'root',
'charset'=>'utf8',
'db'=>'itheima'
];
function connect($config){
	$link=@mysql_connect($config['host'],$config['user'],$config['pass']) or die("连接数据库失败");
//设置字符集
if(!mysql_query("set names ".$config['charset'])){
	echo "出错了:".mysql_error();
}
	;
//选择数据库
mysql_query("use ".$config['db']) or die("选择数据库失败");
return $link;
}
//进行连接
$link=connect($conf);
?>