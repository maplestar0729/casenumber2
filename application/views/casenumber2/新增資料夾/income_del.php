<?php
	include("mysql_connect.inc.php");
    $NO = $_POST["NO"];
    $sql = "DELETE FROM `income_tab` WHERE `NO` = ".$NO;
    //echo $sql ;
    if(mysql_query($sql))
	{
		echo '編輯成功!';
	}
	else
	{
		echo '編輯失敗!';
	}
?>