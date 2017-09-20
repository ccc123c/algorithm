<?php
include './connect.php';
include './functions.php';
$sql="select id,name,age from student limit 5";
$res=mysql_query($sql);
if(!$res||mysql_num_rows($res)==0){
	die("未查询到信息");
}
while($row=mysql_fetch_assoc($res)){
	$data[]=$row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生简要信息</title>
</head>
<body>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息添加页面</title>
</head>
<body>
		<table align="center" border="1" rules="all" width="50%">
			<caption>学生简要信息表</caption>
		  	<tr>
		       <th>学号</th>			
		       <th>姓名</th>			
		       <th>年龄</th>			
		       <th>操作</th>			
		    </tr>
		    <?php foreach ($data as $v) :?>
		    	<tr align="center">
		    		<td><?=$v['id']?></td>
		    		<td><a href="detail.php?id=<?=$v['id']?>"><?=$v['name']?></a></td>
		    		<td><?=$v['age']?></td>
		    		<td><a href="edit.php?id=<?=$v['id']?>">编辑</a><a href="delete.php?id=<?=$v['id']?>">删除</a></td>
		    	</tr>
		    <?php endforeach; ?>
		</table>
</body>
</html>