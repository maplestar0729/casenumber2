<?php
include("mysql_user.php");

//對資料庫連線
if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

//資料庫連線採UTF8
mysql_query("SET NAMES 'UTF8'");

//選擇資料庫
if(!@mysql_select_db($db_name))
        die("無法使用資料庫");

//
//	if(!$_SESSION['username'] && !$id)
//	{
//		echo "請登入之後使用<br>";
//		echo '<form name="form" method="post" action="login/connect.php">
//		帳號：<input type="text" name="id" /> <br>
//		密碼：<input type="password" name="pw" /> <br>
//		<input type="submit" name="button" value="登入" />&nbsp;&nbsp;';
//		die();
//	} else {
//		echo "<font size=2>".$_SESSION['username']."您好";
//		if($_SESSION['class']==1 )	echo"	<a href=login/register.php>新增使用者</a>";
//		echo "&nbsp;<a href=login/updata.php>修改密碼</a>
//			 &nbsp;<a href=login/logout.php>登出</a></font>";
//	}
//	echo "<br>";



?>