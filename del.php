<?php 
header("content-type:text/html;charset=utf-8");

	include "mysql.php";

	$time=urldecode($_REQUEST["time"]);
	$sql="DELETE FROM message WHERE addate='$time'";
	$result=mysql_query($sql);
	if (!$result) {
		echo "删除数据出错：".mysql_error();
		exit();
	} else {
		$message=urlencode("删除成功！");
		header("location:http://localhost/zmessageBook/success.php?message=$message&name=admin");
	}
?>