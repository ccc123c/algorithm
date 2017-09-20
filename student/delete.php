<?php
include './connect.php';
include './functions.php';
$id=$_GET['id'];
$sql="delete from student where id=$id";
if(mysql_query($sql)){
	redirect('./index.php','删除成功');
}else{
	redirect('./index.php','删除失败');
}
?>