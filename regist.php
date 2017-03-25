<?php
header("content-type:text/html;charset=utf-8");
	include "mysql.php";

	$username=urldecode($_POST["username"]);
	$password=$_POST["password"];
	date_default_timezone_set("Asia/Shanghai");
	$time=date("Y年m月d日 H:i:s",time());

	$sql="INSERT INTO message VALUES(NULL,'$username','$password',NULL,0,0,'$time')";
	$result=mysql_query($sql);
	if (!$result) {
		echo "写入数据库失败：".mysql_error();
		exit();
	} else {
		$message="注册成功！";
		$name=$username;
		echo $message.$name;
		// header("location:http://localhost/zmessageBook/success.php?message=$message?name=$name");
	}


?>