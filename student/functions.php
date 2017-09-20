<?php
header('content-type:text/html;charset=utf8');
function dump($arr=[]){
	if(is_array($arr)){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}else{
		var_dump($arr);
	}
}
//重定向
function redirect($url='',$msg='',$waitSeconds=2){
	header("refresh:$waitSeconds;url=$url");
	//提示信息
	die($msg);
}
//上传文件
function uploadFile($fileName){
	$errorMsg='';
    $file=$fileName;
  if($file['error']!=0){
 	switch($file['error']){
 		case 1:
 		   $errorMsg="文件大小超过2M";
 		   break;
 		case 4:
 		   $errorMsg="未上传文件";
 		   break;
 		case 6:
 		   $errorMsg="未找到临时文件夹";
 		   break;
 	}
 	echo "<script>alert('$errorMsg');</script>";
 	return;
 }
 //设置文件指定大小
 $maxSize=1.5;
 if($file['size']/1024/1024>$maxSize){
 	echo "超出指定大小";
 	return;
 }
 //设置文件上传MIME格式
 $fileInfo=finfo_open(FILEINFO_MIME_TYPE);
 $mime=finfo_file($fileInfo, $file['tmp_name']);
 $mimeArr=['image/jpeg','image/png'];
 if(!in_array($mime, $mimeArr)){
 	echo "不支持的文件类型";
 	return;
 }
 //判断是否为HTTP POST上传的文件
  if(is_uploaded_file($file['tmp_name'])){
  	$ext=strrchr($file['name'],'.');
  	$saveName="../upload/".date('YmdHis-').mt_rand(1000,9999).$ext;
  	move_uploaded_file($file['tmp_name'], $saveName);
  	return $saveName;
  }
}
?>