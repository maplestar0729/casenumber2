
<?php
	include("mysql_connect.inc.php");
	

	$no=$_POST["NO"];

	$money=$_POST["money"];


	$sql="UPDATE `caseindex_caseno` SET  `money`= '".$money."' WHERE `id` =".$no." ";
	if(mysql_query($sql))
	{
		echo '編輯成功!';

	}
	else
	{
		echo '編輯失敗!';
	}
?>
