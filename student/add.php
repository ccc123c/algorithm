<?php
  include './connect.php';
  include './functions.php';
  $sql="select id,className from class";
  $res=mysql_query($sql);
  if(!$res||mysql_num_rows($res)==0){
  	die('未查找到班级信息');
  }
  while($rows=mysql_fetch_assoc($res)){
  	$data[]=$rows;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息添加页面</title>
</head>
<body>
	<form action="insert.php" method="POST" enctype="multipart/form-data">
		<table align="center" border="1" rules="all" width="50%">
			<caption>学生信息表</caption>
		  	<tr>
		       <th>姓名</th>		
		       <td><input type="text" name="name"></td>		
			</tr>
			<tr>
		       <th>年龄</th>		
		       <td><input type="text" name="age"></td>		
			</tr>
			<tr>
		       <th>班级</th>		
		       <td>
		       	<select name="classId" id="">
		       	<?php foreach ($data as $v):?>
		       	 <option value="<?=$v['id']?>"><?=$v['className']?></option>
		       	<?php endforeach;?>
		        </select>
		       </td>
			</tr>
			<tr>
				<th>性别</th>
				<td>
					<input type="radio" name="sex" value="保密" checked>保密
					<input type="radio" name="sex" value="男">男
					<input type="radio" name="sex" value="女">女
				</td>
			</tr>
			<tr>
				<th>电话</th>
				<td><input type="text" name="tel"></td>
			</tr>
			<tr>
				<th>地址</th>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<th>图像上传</th>
				<td><input type="file" name="myFile"></td>
			</tr>
			<tr>
				<th>提交</th>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>