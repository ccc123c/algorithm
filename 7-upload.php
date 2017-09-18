<?php
header('content-type:text/html;charset=utf8');
function uploadFile($fileName){
  if(empty($_FILES)){
  die('发生未知错误');
}
// $file=$_FILES[$fileName];
$file=$fileName;
$errorMsg="";
//0为上传成功
if($file['error']!=0){
   switch($file['error']){
    case 1:
        $errorMsg="上传文件超过2M";
        break;
    case 4:
        $errorMsg="未上传文件";
        break;
    case 6:
        $errorMsg="未找到临时文件夹";
        break;
   }
   //出错则后续代码不执行
   echo "<script>alert($errorMsg)</script>";
    return;
   // die($errorMsg);
}

// 4.判断文件是否是HTTP POST上传的文件
if(!is_uploaded_file($file['tmp_name'])){
  echo "<script>alert('非法上传的文件')</script>";
    return;
   // die('非法上传的文件');
}
//5.大小限定
$maxSize=1.5;
if($file['size']/1024/1024>$maxSize){
  echo "<script>alert('文件大小超出允许的上限')</script>";
    return;
  // die('文件大小超出允许的上限');
}
//6.限定上传类型
  //先获取上传文件的MIME类型
  $fileinfo=finfo_open(FILEINFO_MIME_TYPE);
  $mime=finfo_file($fileinfo,$file['tmp_name']);
  $mimeArr=['image/jpeg','image/png'];
  if(!in_array($mime, $mimeArr)){
     // die(' 不支持文件类型');
    echo "<script>alert('不支持文件类型')</script>";
    return;
  }
// 7.将文件移动到网站永久路径
//第一个参数临时路径，第二个参数永久路径
$txt=strrchr($file['name'], ".");
$newName=date('YmdHis').mt_rand(1000,9999).$txt;
if(move_uploaded_file($file['tmp_name'], "./upload/".$newName)){
  echo "<script>alert('文件上传成功');</script>";
}else{
  echo "<script>alert('文件上传失败');</script>";
}
}
?>