<?
	include("mysql_connect.inc.php");
	$no_en=$_POST["no_en"];
	$no_n=$_POST["no_n"];
	$year=$_POST["year"];
	$name=$_POST["name"];
	$money=$_POST["money"];
	$caseno=sprintf("%s%02d%02d",$no_en,($year%100),($no_n%100));
	
	echo "[";
	if($no_n%100)
	{
		$sql = "SELECT * FROM `".$year."` WHERE `caseno` = '".$caseno."'  "; 

		$result = mysql_query($sql);
		if($rs=mysql_fetch_object($result))
			die("\"已有相同案件編號\",\"false\"]");
	}
	
	$sql = "SELECT * FROM `".$year."` ORDER BY `NO` ASC  "; 
	$result = mysql_query($sql);
	while($rs=mysql_fetch_object($result)) 
	{ 
		$no = $rs->NO;	
	}
	$no++;
	if(!$no_n%100) $money=0;
	$no_n= ($year* 100 + $no_n) % 10000;
	$sql="INSERT INTO `".$db_name."`.`".$year."` (`NO` ,`caseno` ,`date` ,`no_en` ,`no_n` ,`name` ,`money` )
				VALUES ('".$no."', '".$caseno."' ,'' ,'".$no_en."' ,'".$no_n."' ,'".$name."' ,'".$money."');";
	if(mysql_query($sql)) 
	{
		echo "\"索引新增成功..";
	}else{
		die("\"索引新增失敗\",\"false\"]");
	}
	if(!$no_n%100)
		echo "\",\"true\",\"".$no."\"]";
	if($no_n%100)
	{
		$sql = "CREATE TABLE `tab_".$caseno."` (
					`NO` INT( 3 ) NOT NULL AUTO_INCREMENT,
					`incono` CHAR( 10 ) NOT NULL ,
					`year` INT( 2 ) NOT NULL ,
					`date` INT( 4 ) NOT NULL ,
					`head1` INT( 2 ) NOT NULL ,
					`head2` INT( 2 ) NOT NULL ,
					`in` INT( 10 ) NOT NULL ,
					`out` INT( 10 ) NOT NULL ,
					`other` TEXT NOT NULL ,
					PRIMARY KEY ( `NO` ) ,
					INDEX ( `year` ),
					INDEX ( `date` ),
					INDEX ( `head1` ),
					INDEX ( `head2` ),
					INDEX ( `in` ),
					INDEX ( `out` )  ) ENGINE = MYISAM ;";
		if(mysql_query($sql))
		{
			echo "資料表新增成功\",\"true\",\"".$no."\",\"".$caseno."\"]";
		}	else {
			echo "資料表新增失敗\n\",\"false\"]";
		}

	}
//	mkdir("D:/陳-工作中/案件工作內容-F/".$caseno." ".$name);
/*	if($no_en=="B") $dirname="G:/";
	if($no_en=="F") $dirname="G:/";
	if($no_en=="L") $dirname="G:/";
	if($no_en=="R") $dirname="G:/";
	$dirname=$dirname."".$caseno." ".$name;
	if(mkdir($dirname)) echo "資料夾修改成功";
	else echo"資料夾修改失敗";
*/
?>




