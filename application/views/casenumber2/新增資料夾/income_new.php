<?php
	include("mysql_connect.inc.php");
    $data_info = $_POST["data_info"];
    $sql = "INSERT INTO `income_tab` (`incono`,`year`,`caseno` ,`date`,`head1` ,`head2` ,`in` , `out` ,`other` ) 
            VALUES (
            '".$data_info["incono"]."', 
            '".$data_info["year"]."',
            '".$data_info["caseno"]."', 
            '".$data_info["date"]."', 
            '".$data_info["head1"]."', 
            '".$data_info["head2"]."',
            '".$data_info["in"]."',   
            '".$data_info["out"]."', 
            '".$data_info["other"]."');";
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