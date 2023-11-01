<?php include("mysql_connect.inc.php"); ?>
<?php
	$sql="SELECT * FROM `yearindex` ORDER BY `year` ASC;";
	$reyear = mysql_query($sql);
	while($ryear=mysql_fetch_object($reyear)) 
	{
		$sql="TRUNCATE `head".$ryear->year."`;";
		mysql_query($sql);
		$sql="SELECT * FROM `".$ryear->year."` ORDER BY `NO` ASC;";
		$recaseid=mysql_query($sql);
		while($rcaseid= mysql_fetch_object($recaseid))
		{
			$sql="SELECT * FROM `tab_".$rcaseid->caseno."` WHERE  `incono` LIKE  '%pr%';";
			$recase=mysql_query($sql);
			while($rcase= mysql_fetch_object($recase))
			{
				$sql="UPDATE  `www_casenumber`.`tab_".$rcaseid->caseno."` SET  `incono` =  '私".substr($rcase->incono,2)."' WHERE  `tab_".$rcaseid->caseno."`.`NO` =".$rcase->NO.";";
				mysql_query($sql);
			}
			$sql="SELECT * FROM `tab_".$rcaseid->caseno."` WHERE  `incono` LIKE  '%p%';";
			$recase=mysql_query($sql);
			while($rcase= mysql_fetch_object($recase))
			{
				$sql="UPDATE  `www_casenumber`.`tab_".$rcaseid->caseno."` SET  `incono` =  '私".substr($rcase->incono,1)."' WHERE  `tab_".$rcaseid->caseno."`.`NO` =".$rcase->NO.";";
				mysql_query($sql);
			}
			$sql="SELECT * FROM `tab_".$rcaseid->caseno."` WHERE  `incono` LIKE  '%gv%';";
			$recase=mysql_query($sql);
			while($rcase= mysql_fetch_object($recase))
			{
				$sql="UPDATE  `www_casenumber`.`tab_".$rcaseid->caseno."` SET  `incono` =  '公".substr($rcase->incono,2)."' WHERE  `tab_".$rcaseid->caseno."`.`NO` =".$rcase->NO.";";
				mysql_query($sql);
			}
			$sql="SELECT * FROM `tab_".$rcaseid->caseno."` WHERE  `incono` LIKE  '%g%';";
			$recase=mysql_query($sql);
			while($rcase= mysql_fetch_object($recase))
			{
				$sql="UPDATE  `www_casenumber`.`tab_".$rcaseid->caseno."` SET  `incono` =  '公".substr($rcase->incono,1)."' WHERE  `tab_".$rcaseid->caseno."`.`NO` =".$rcase->NO.";";
				mysql_query($sql);
			}
			
			
			$sql="SELECT * FROM `tab_".$rcaseid->caseno."` ORDER BY `NO` ASC;";
			$recase=mysql_query($sql);
			while($rcase= mysql_fetch_object($recase))
			{
				$sql="INSERT INTO  `www_casenumber`.`head".$ryear->year."` (`NO` ,`no_en` ,`no_n` ,`caseno` ,`year` ,`date` ,`no2` ,`head1` ,`head2`
				)VALUES ('".$rcase->incono."',  '".substr($rcaseid->caseno,0,1)."',  '".substr($rcaseid->caseno,1)."',  '".$rcaseid->caseno."',  '".$rcase->year."',  '".$rcase->date."',  '".$rcase->NO."',  '".$rcase->head1."',  '".$rcase->head2."');";
				mysql_query($sql);
			}
		}
	}
?>