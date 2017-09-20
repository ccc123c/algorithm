<?php
include './connect.php';
include './functions.php';
$id=$_GET['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$classId=$_POST['classId'];
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$sql="update student set name='$name',age='$age',classId='$classId',sex='$sex',tel='$tel',address='$address' where id=$id";
if(mysql_query($sql)){
	redirect('./index.php','编辑成功');
}else{
	redirect('./edit.php','编辑失败');
}
?>