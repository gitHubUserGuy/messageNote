<?php
header("content-type:text/html;charset=utf-8");
	
	include "mysql.php";
	
	$user=urldecode($_POST["username"]);
	$pwd=$_POST["password"];
	date_default_timezone_set("Asia/Shanghai");
	$lasttime=date("Y年m月d日 H:i:s",time());

// mysql数据库中，message数据表id为1的第一条记录是预先存下的管理的信息
		$sql="SELECT * FROM message WHERE username='$user' AND password='$pwd'";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		$arr=mysql_fetch_row($result); 
 
		if (!$result) {
			echo "校对账号和密码失败：".mysql_error();
			exit();
		} else if ($arr[0]==1) {
			$_sql="UPDATE message SET addate='$lasttime' WHERE id=1";
			$_result=mysql_query($_sql);
			if (!$_result) {
				echo "更新数据库登录信息失败：".mysql_error();
				exit();
			} else {
				$message="欢迎管理员登录!";
				$name=$arr[1];
				echo $name.$message;
			}
			
		} else if ($arr[0]>1) {
			$_sql="UPDATE message SET addate='$lasttime' WHERE id='$arr[0]'";
			$_result=mysql_query($_sql);
			if (!$result) {
				echo "更新数据库登录信息失败：".mysql_error();
				exit();
			} else {
				$message="登录成功！";
				$name=$arr[1];
				echo $message.$name;
			}
		} else if ($num==0) {
			echo "密码输入错误！";
		}


	

	
	
	
?>