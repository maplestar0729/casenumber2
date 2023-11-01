<?php
	$title = ""; 
	include("include/header.inc"); 
?> 
<?php
	include("mysql_connect.inc.php");
	$year=$_GET["year"];
	echo "<BODY onload=javascript:window.print() bgColor=#ffffff>";
	echo "<font size='6' face='標楷體' color='blue'>".$year."年案件編號</font><br >";
	echo "<br>";
	

		$sql="SELECT * FROM `member` ";
		$resultmem = mysql_query($sql);
		while($rmem=mysql_fetch_object($resultmem))
		{
			echo "　‧".$rmem->EN."(".$rmem->name.")<br>";
//			echo "　‧".$rmem->EN."<br>";
//			echo "　‧<a href='index.php?year=".$ryear->year."&member=".$rmem->EN."'>".$rmem->EN."(".$rmem->name.")</a><br>";
			$sql="SELECT * FROM caseindex_caseno  WHERE `year` = ".$year." and `no_en` = '".$rmem->EN."' ORDER BY `caseno` ASC ";
			$resultcase = mysql_query($sql);
			while($rcase=mysql_fetch_object($resultcase))
			{
				echo "　　‧".$rcase->caseno."&nbsp;".$rcase->name."<br>";
			}
		}
	
	$sql="SELECT * FROM `member` ";
	$results = mysql_query($sql);
	while($rs=mysql_fetch_object($results))
	{
		$members[]=$rs->EN;
	}
//		$EN="B";
//		$year=100;
	$sql="SELECT *FROM caseindex_caseno  WHERE `year` = ".$year." and `no_en` != '".$members[0]."'";
	for($i=1;$i<count($members);$i++)
		$sql= $sql." AND `no_en` != '".$members[$i]."'";
	$sql=$sql." ORDER BY `caseno` ASC ";
//		echo $sql;
	$result = mysql_query($sql);
	echo "　‧(other)<br>";



	while($rcase=mysql_fetch_object($result))
	{
		echo "　　‧".$rcase->caseno."&nbsp;".$rcase->name."<br>";
	}

	
?>