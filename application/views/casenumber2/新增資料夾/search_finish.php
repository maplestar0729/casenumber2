<?php
	$title = ""; 
	include("include/header.inc"); 
?> 


<?php
	include("mysql_connect.inc.php");
	$head1=$_POST["head1"];
	$head2=$_POST["head2"];
	$year=$_POST["year"];
	$caseyear=$_POST["caseyear"];
	echo "<font size=5>".$year."年案件&nbsp;&nbsp;&nbsp;";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	$heads[0][1]="隨案成本";
	$heads[0][2]="酬金收入";
	$heads[0][3]="代收";
	$heads[0][4]="轉付";
	if($head1)
	{
		echo $heads[0][$head1]."&nbsp;&nbsp;";
	}
	$sql="SELECT * FROM `head` ORDER BY `NO` ASC;";
	$result = mysql_query($sql);
	while($rs=mysql_fetch_object($result)) 
	{	
		$heads[1][$rs->NO]=$rs->name;
	}	
	$sql="SELECT * FROM `incohead` ORDER BY `NO` ASC;";
	$result = mysql_query($sql);
	while($rs=mysql_fetch_object($result)) 
	{	
		$heads[2][$rs->NO]=$rs->name;
	}
	for($i=0;$i<=20;$i++)
		$heads[3][$i]="";
	$heads[4]=$heads[1];
	if($head2)
		echo $heads[$head1][$head2];
	echo "科目查詢</font>";
	
	

	echo "<table border='1' cellpadding='0' cellspacing='0'><tbody ><tr>
		<td align=right width=80>案件編號</td>
		<td  >案件名稱</td>
		<td align=right width=50>日期</td>
		<td align=right width=150>科目一</td>
		<td align=right width=150>科目二</td>
		<td align=right width=100>收入</td>
		<td align=right width=100>支出</td>
		<td align=right width=160>備註</td>
		</tr>";
	if(!$caseyear)
	{
		$sql="SELECT year FROM `caseindex_caseno` group BY `year` ORDER BY `year` ASC ";
		$result = mysql_query($sql);
		$rs=mysql_fetch_object($result);
		$sy=$rs->year;
		while($rs=mysql_fetch_object($result))
		{
			$ey=$rs->year;
		}	
	}else if($caseyear)
	{
		$sy=$caseyear;
		$ey=$caseyear;
	}
	$allmoneyin=0;
	$allmoneyout=0;
	//for($yeari=$sy;$yeari<=$ey;$yeari++)
	//{
		if($head1) $sql="SELECT * FROM `income_tab` WHERE `head1` =".$head1." AND `year`=".$year." ORDER BY `date` ASC;";
		else if($head1 && $head2)$sql="SELECT * FROM `income_tab` WHERE `head1` =".$head1." AND `head2` =".$head2." AND `year`=".$year." ORDER BY `date` ASC;";
		else $sql="SELECT * FROM `income_tab` WHERE `year`=".$year."  ORDER BY `date` ASC;";
		
		$result = mysql_query($sql);
		while($rs=mysql_fetch_object($result))
		{	
			//echo json_encode($rs);
			//if(floor($rs->no_n/100)!=$yeari && $yeari)continue;
			
		//		$allmoney=0;
			
			//$no_n=floor(sprintf("%04d",$rs->no_n)/100);
			$no_n = substr( $rs->caseno , 1 , 2 );
			if($no_n<90) $no_n+=100;
			//$sql="SELECT * FROM `".$no_n."` WHERE `caseno` = '".$rs->caseno."'";
		//		echo $no_n;
			//$resultcase = mysql_query($sql);
			//$rcase=mysql_fetch_object($resultcase);
		//		echo $rs->no_n;
		
			//$sql="SELECT * FROM `tab_".$rs->caseno."` WHERE `NO` = ".$rs->no2."";
			//$resultcase = mysql_query($sql);
			//$rcase=mysql_fetch_object($resultcase);
		/*		while($rcase=mysql_fetch_object($resultcase))
			{
				$allmoney-=$rcase->out;
				$allmoney+=$rcase->in;
				if($rcase->NO==$rs->no2)
				{*/
			$allmoneyin+=$rs->in;
			$allmoneyout+=$rs->out;
		//				continue;
		/*			}
			}*/
		}
	//}
		
	echo "<tr><td colspan='5' align='right'><font COLOR=red size=5>合計</font></td>
			<td align='right'><font COLOR=red size=5>".number_format($allmoneyin)."</font></td>
			<td align='right'><font COLOR=red size=5>".number_format($allmoneyout)."</font></td></tr>";

	//for($yeari=$sy;$yeari<=$ey;$yeari++)
	//{

		
		$sql = "SELECT a.*,b.name FROM `income_tab` a
				left join caseindex_caseno b on a.caseno = b.caseno
				where a.`year`=".$year." ";
		if($head1) 
		{
			$sql .= " and `head1` =".$head1." ";
		}else if($head1 && $head2)
		{
			$sql .= " AND `head1` =".$head1." AND `head2` =".$head2." ";
		}
		//else $sql .= " ORDER BY `date` ASC;";
		$sql .= " ORDER BY `date` ASC;";
		$result = mysql_query($sql);
		//echo $sql;
		//echo json_encode($heads[]);
		while($rs=mysql_fetch_object($result))
		{	
		//		if($no_en && $caseno!=$rs->caseno)continue;
//		echo $sql."<br>";
			
			//不知幹嘛用 待確認 20170403
			//if(floor($rs->no_n/100)!=$yeari%100 && $yeari)continue;
			
		//		$allmoney=0;
				
			$no_n = substr( $rs->caseno , 1 , 2 );
			echo "<tr><td align=right><a href='index.php?year=".$no_n."&caseno=".$rs->caseno."'>".$rs->caseno."</td>";
			if($no_n<90) $no_n+=100;
		
			echo "<td >".$rs->name."</td>";
			echo "<td align=right>".$rs->year."/".floor(($rs->date)/100)."/".$rs->date%100 ."</td>";
			echo "<td align=right>".$heads[0][$rs->head1]."</td>";
			// if(!isset($heads[$rs->head1][$rs->head2]))
			// {
			// 	echo "<td>head1:".$rs->head1 ." ".$rs->head2."</td>";
			// }
			echo "<td align=right>".$heads[$rs->head1][$rs->head2]."</td>";
		/*		while($rcase=mysql_fetch_object($resultcase))
			{
				$allmoney-=$rcase->out;
				$allmoney+=$rcase->in;
				if($rcase->NO==$rs->no2)
				{*/
			echo "<td align=right>".number_format($rs->in)."</td>
					<td align=right>".number_format($rs->out)."</td>
					<td align=right>".$rs->other."&nbsp;</td>
					</tr>";
//			$allmoney+=$rcase->out;
//				continue;
/*			}*/
		//}
	}
	echo "</tbody></table>";
?>
<br>
<input type="submit" name="button" id="button" value="關閉視窗" onclick="window.close()"/>
<input name="Submit" type="button" id="Submit" onClick="javascript:history.back(1)" value="回一上頁" />

<?php
	include("include/footer.inc"); 
?>