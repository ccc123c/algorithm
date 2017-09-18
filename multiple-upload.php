<?php
require_once('./7-upload.php');
$file=$_FILES['myFile'];
foreach ($file['error'] as $k => $v) {
    if($v==0){
    	$oneFile['name']=$file['name'][$k];
    	$oneFile['type']=$file['type'][$k];
    	$oneFile['tmp_name']=$file['tmp_name'][$k];
    	$oneFile['error']=$file['error'][$k];
    	$oneFile['size']=$file['size'][$k];
    	uploadFile($oneFile);
    }

}

?>
<!-- Array
(
    [name] => Array
        (
            [0] => 1.jpg
            [1] => 2.jpg
            [2] => 3.jpg
        )

    [type] => Array
        (
            [0] => image/jpeg
            [1] => image/jpeg
            [2] => image/jpeg
        )

    [tmp_name] => Array
        (
            [0] => C:\Windows\Temp\phpF7C4.tmp
            [1] => C:\Windows\Temp\phpF7C5.tmp
            [2] => C:\Windows\Temp\phpF7C6.tmp
        )

    [error] => Array
        (
            [0] => 0
            [1] => 0
            [2] => 0
        )

    [size] => Array
        (
            [0] => 139702
            [1] => 49419
            [2] => 78514
        )

) -->