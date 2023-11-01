<?	
	include("mysql_connect.inc.php");
	$year=$_POST["year"];
	$no=$_POST["no"];
	$sql = "SELECT * FROM `".$year."` WHERE `NO`=".$no."";
	$result = mysql_query($sql);
	$rs=mysql_fetch_object($result);
	$sql = "DELETE FROM `".$year."` WHERE `".$year."`.`NO` = ".$no." ;";
	if(mysql_query($sql))
	{
		echo '刪除成功!\n';

	}
	else
	{
		echo '刪除失敗!\n';

	}
	if(($rs->no_n%100))
	{
		$sql = "DROP TABLE `tab_".$rs->caseno."` ;";
		if(mysql_query($sql))
		{
			echo '隨案表、收入表刪除成功!';

		}
		else
		{
			echo '隨案表、收入表刪除失敗!';

		}

	}
?>
