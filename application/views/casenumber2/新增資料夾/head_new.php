<?php
	include("mysql_connect.inc.php");
    $data_info = $_POST["data_info"];
    if(isset($data_info["headType"]) && $data_info["headType"] == 1)
    {
        $sql = "INSERT INTO `head` ( `name`) VALUES ( '".$data_info["name"]."');";
    }else if(isset($data_info["headType"]) && $data_info["headType"] == 2)
    {
        $sql = "INSERT INTO `incohead` ( `name`) VALUES ( '".$data_info["name"]."');";
    }else
    {
        $sql = "";
    }
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