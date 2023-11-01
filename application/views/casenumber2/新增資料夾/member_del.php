<?php
	include("mysql_connect.inc.php");
    $data_info = $_POST["data_info"];
    $sql=" DELETE  FROM  `member`  WHERE `member`.`EN`  = '".$data_info["EN"]."';";
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