<?php
include './connect.php';
include './functions.php';
$name=$_POST['name'];
$age=$_POST['age'];
$classId=$_POST['classId'];
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$address=$_POST['address'];
//永久路径
$file=$_FILES['myFile'];
$saveName=uploadFile($file);
$sql="insert into student values(null,'$name','$age','$classId','$sex','$tel','$address','$saveName')";
if(!mysql_query($sql)){
  redirect('./add.php',"插入数据失败");
}else{
	redirect('./index.php','插入数据成功');
}
?>