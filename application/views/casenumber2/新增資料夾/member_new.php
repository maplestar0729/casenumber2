<?php
	include("mysql_connect.inc.php");
    $data_info = $_POST["data_info"];
    $sql="INSERT INTO `member` (`EN`, `name`) VALUES ( '".$data_info["EN"]."',  '".$data_info["name"]."');";
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