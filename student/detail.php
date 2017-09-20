<?php
include './connect.php';
include './functions.php';
$id=$_GET['id'];
$sql="select * from student where id=$id";
$res=mysql_query($sql);
$link=mysql_fetch_assoc($res);
$classId=$link['classId'];
$sql="select className from class where id=$classId";
$res=mysql_fetch_assoc(mysql_query($sql));
$className=$res['className'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生详情信息表</title>
</head>
<body>
	<table align="center" border="1" rules="all" width="50%">
			<caption>学生信息表</caption>
		  	<tr>
		       <th>姓名</th>		
		       <td><input type="text" name="name" value="<?=$link['name']?>"></td>		
			</tr>
			<tr>
		       <th>年龄</th>		
		       <td><input type="text" name="age" value="<?=$link['age']?>"></td>	
			</tr>
			<tr>
		       <th>班级</th>		
		       <td>
		       <input type="text" name="age" value="<?=$className?>">
		       </td>
			</tr>
			<tr>
				<th>性别</th>
				<td>
					<input type="text" name="age" value="<?=$link['sex']?>">
				</td>
			</tr>
			<tr>
				<th>电话</th>
				<td><input type="text" name="age" value="<?=$link['tel']?>"></td>
			</tr>
			<tr>
				<th>地址</th>
				<td><input type="text" name="age" value="<?=$link['address']?>"></td>
			</tr>
			<tr>
				<th>图像上传</th>
				<td><img width=200 src="<?=$link['pic_path']?>" alt=""></td>
			</tr>
		</table>
</body>
</html>