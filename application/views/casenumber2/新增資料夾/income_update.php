<?php
	include("mysql_connect.inc.php");
    $data_info = $_POST["data_info"];
    $sql = "UPDATE `income_tab`
            set 
            `incono` = '".$data_info["incono"]."', 
            `year` = '".$data_info["year"]."',
            `caseno` = '".$data_info["caseno"]."', 
            `date` = '".$data_info["date"]."', 
            `head1` = '".$data_info["head1"]."', 
            `head2` = '".$data_info["head2"]."',
            `in` = '".$data_info["in"]."',   
            `out` = '".$data_info["out"]."', 
            `other` = '".$data_info["other"]."'
            where `NO` = '".$data_info["NO"]."'";
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