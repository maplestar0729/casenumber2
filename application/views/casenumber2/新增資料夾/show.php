<?php include("mysql_connect.inc.php"); ?>
<?php
	$show=$_GET["show"];
	//echo $show;
//	$show="casenoOther";
//	$show="rBotData";
	
	if($show=="head")
	{
		$sql="SELECT * FROM `head` ORDER BY `NO` ASC;";
		$result = mysql_query($sql);
		//echo $result;
		$rtn[0] = [];
		//echo "[[\"\",";
		while($rs=mysql_fetch_object($result) ) 
		{	
			$rtn[0][] = $rs;
//			$result_array[] = $rs;
			//echo "\"".$rs->name."\",";
//			$heads[1][$rs->NO]=$rs->name;
		}
		//echo json_encode($result_array);
 		//echo "\"\"],[\"\",";
		$sql="SELECT * FROM `incohead` ORDER BY `NO` ASC;";
		$result = mysql_query($sql);
		while($rs=mysql_fetch_object($result)) 
		{	
			//echo "\"".$rs->name."\",";
//			$heads[2][$rs->NO]=$rs->name;
			$rtn[1][] = $rs;
		}
		//echo "\"\"]]";
		echo json_encode($rtn);
	}
	if($show=="member")
	{
		$sql="SELECT * FROM `member` ";
		$results = mysql_query($sql);
		echo "{";
		$ctrlI=0;
		while($rs=mysql_fetch_object($results))
		{
			if($ctrlI)
				echo ",";
			$name=$rs->name;
//			$name= iconv('big5','utf-8',$name);
			echo "\"".$rs->EN."\" :{\"name\":\"".$name."\",\"showMem\":[]}";
			$ctrlI++;
		}
		echo "}";
	}
	if($show=="year")
	{
		$sql="SELECT year FROM `caseindex_caseno` group BY `year` ORDER BY `year` DESC ";
		$result = mysql_query($sql);
		//echo "[";
		while($ryear=mysql_fetch_object($result))
		{
			//echo $ryear->year.",";
			$res_year[] = $ryear->year;
		}
		//echo "0]";
		echo json_encode($res_year);
	}
	if($show=="caseno")
	{
		$EN=$_GET["EN"];
		$year=$_GET["year"];
//		$EN="B";
//		$year=97;
		$sql="SELECT * FROM `caseindex_caseno` WHERE `no_en` = '".$EN."' and `year` = '".$year."' ORDER BY `caseno` ASC ";
		$result = mysql_query($sql);
		//var $res_tab[];
		//echo "[";
		$res_tab = [];
		while($rcase=mysql_fetch_assoc($result))
		{
			//$name=$rcase->name;
//			$name= iconv('big5','utf-8',$name);
			//echo "{\"NO\":\"".$rcase->NO."\",\"caseno\":\"".$rcase->caseno."\",\"name\":\"".$name."\",\"money\":\"".$rcase->money."\"},";
			$res_tab[] = $rcase;
		}
		//echo "\"\"]";
		echo json_encode($res_tab);
	}
	if($show=="casenoOther")
	{
//		$EN=$_GET["EN"];
		$year=$_GET["year"];

		$sql="SELECT * FROM `member` ";
		$results = mysql_query($sql);
		while($rs=mysql_fetch_object($results))
		{
			$members[]=$rs->EN;
		}
//		$EN="B";
//		$year=100;
		$sql="SELECT * FROM `caseindex_caseno` WHERE `year` = ".$year." and `no_en` != '".$members[0]."'";
		for($i=1;$i<count($members);$i++)
			$sql= $sql." AND `no_en` != '".$members[$i]."'";
		$sql=$sql." ORDER BY `caseno` ASC ";
//		echo $sql;
		$result = mysql_query($sql);
		//echo "[";
		$res_tab = [];
		while($rcase=mysql_fetch_assoc($result))
		{
			//$name=$rcase->name;
//			$name= iconv('big5','utf-8',$name);
			//echo "{\"NO\":\"".$rcase->NO."\",\"caseno\":\"".$rcase->caseno."\",\"name\":\"".$name."\",\"money\":\"".$rcase->money."\"},";
			$res_tab[] = $rcase;
		}
		//echo "\"\"]";
		echo json_encode($res_tab);
	}
	if($show=="caseData")
	{
		$NO=$_GET["NO"];
		$year=$_GET["year"];
		$sql="SELECT * FROM `caseindex_caseno` WHERE `id` = '".$NO."'";
		$result = mysql_query($sql);
		$rs=mysql_fetch_object($result);
//		$caseno="b0042";
		//$sql="SELECT * FROM `tab_".$rs->caseno."` ORDER BY   `year` ASC ,`date` ASC ";
		$sql="SELECT * FROM `income_tab` where `caseno` = '".$rs->caseno."' ORDER BY   `year` ASC ,`date` ASC ";
		//echo $sql;
		$result = mysql_query($sql);
		echo "[";
		while($rs=mysql_fetch_object($result))
		{
			if($rs->date<1000)
				$Date="0".$rs->date;
			else
				$Date=$rs->date;
			echo "{\"NO\":\"".$rs->NO."\" , \"incono\":\"".$rs->incono."\" , \"year\":\"".$rs->year."\" , \"date\":\"".$Date."\" , \"head1\":\"".$rs->head1."\" , \"head2\":\"".$rs->head2."\" , \"inn\":\"".$rs->in."\" , \"out\":\"".$rs->out."\" , \"other\":\"".$rs->other."\" },";
		}
		echo "\"\"]";
	}
	if($show=="yearData" || $show=="yearDataMem")
	{

		$year=$_GET["year"];
		$tabyear1=$_GET["tabyear1"];
		$sql="SELECT * FROM `caseindex_caseno` where `year` = '".$year."'  ORDER BY `caseno` ASC";
		$resultcase= mysql_query($sql);
//		echo "[";
//		while($rcase=mysql_fetch_object($resultcase))
//		{
//			echo "{\"NO\":\"".$rcase->NO."\",\"caseno\":\"".$rcase->caseno."\",\"no_en\":\"".$rcase->no_en."\" , \"no_n\":\"".$rcase->no_n."\" , \"name\":\"".$rcase->name."\" , \"money\":\"".$rcase->money."\"},";
//			
//		}
//		echo "\"\"]";
//		
		
		echo "<a id=RTTset class=rTabTittle>".$year."年度案件收入總表I</a>&nbsp;&nbsp;&nbsp;
				<input  id=setYearTab1 size=4 readonly='true' class='musPick inputSt'>年收支";
		echo "&nbsp;&nbsp;&nbsp;<input type=button value=列印 onClick='printTab(\"rTT\")'>";
		echo "<table border=1 width=850 id=RTT ><tbody></tr>
				<td width=80>案件編號</td>
				<td width=300>案件名稱</td>
				<td align=right width=80>總酬金</td>
				<td align=right width=80>未收酬金</td>
				<td align=right width=80>總收入</td>
				<td align=right width=80>總實收</td>
				<td align=right width=150>隨案支出累計</td></tr>";
		$bgcol=0;
		for($i=0;$i<=5;$i++)
			$allmoneys[$i]=0;
		while($rcase=mysql_fetch_object($resultcase))
		{	
			
			
			
			$turemoney=0;
			$allmoney=0;
			$allmoney2=0;
			$allmoney3=0;
			$bmoney=0;
			if(!($rcase->no_n%100))continue;
			$bgcol++;
			if($bgcol%5==0)$bgcolor="BGCOLOR='#FFD8AF'";
			else $bgcolor=""; 
			echo "<tr>
				<td style='display:none'><input type=hidden  data-id='money' value=".$rcase->money." ></td>
				<td align='right' class='selcase yearTabSel' data-id=".$year."_".$rcase->id." ".$bgcolor." >".$rcase->caseno."
				</td>
				<td ".$bgcolor." class='selcase yearTabSel' data-id=".$year."_".$rcase->id." >".$rcase->name."</a></td>
				<td align='right' ".$bgcolor.">".number_format($rcase->money)."</td>";
			$allmoneys[1]+=$rcase->money;
			$sql="SELECT * FROM `income_tab` where `caseno` = '".$rcase->caseno."'  order by year , date ";
			$result = mysql_query($sql);
			
			while($rs=mysql_fetch_object($result))
			{	
				if($rs->year<$tabyear1 && $tabyear1) 
				{
					$allmoney3+=$rs->in;
					$allmoney3-=$rs->out;
				}
				if($rs->year<=$tabyear1 && $tabyear1 && $rs->head1==2) 
				{
					$allmoney+=$rs->in;
	
				}
				if($rs->year<=$tabyear1 && $tabyear1) 
				{
					$bmoney+=$rs->in;
					$bmoney-=$rs->out;
					if($bmoney > 0)
						$bmoney = 0;
				}					
				if($rs->year==$tabyear1 && $tabyear1)
				{	
					if($rs->head1==2)	$allmoney2+=$rs->in;
					$turemoney+=$rs->in;
					$turemoney-=$rs->out;
				}
				if(!$tabyear1)
				{
					if($rs->head1==2)	$allmoney+=$rs->in;
					$turemoney+=$rs->in;
					$turemoney-=$rs->out;
					$allmoney2=$allmoney;
				}
			}
			if($allmoney3<0)$turemoney+=$allmoney3;
			$othermoney=($rcase->money) - ($allmoney);
	
			echo "<td align='right' ".$bgcolor.">".number_format($othermoney)."</td>
					<td align='right' ".$bgcolor.">".number_format($allmoney2)."</td>
					<td align='right' ".$bgcolor.">".number_format($turemoney)."</td>";
	
	
			$allmoneys[2]+=$othermoney;
			$allmoneys[3]+=$allmoney2;
			$allmoneys[4]+=$turemoney;
			
			//if($turemoney>=0)
			//	$bmoney=0;
			//else $bmoney-=$turemoney;
			echo "<td align='right' ".$bgcolor.">".number_format($bmoney)."</td></tr>";
			$allmoneys[5]+=$bmoney;
		}
		echo "<tr><td colspan='2' align='right' ><b>合計</b></td>
				<td align='right'><b>".number_format($allmoneys[1])."</b></td>
				<td align='right'><b>".number_format($allmoneys[2])."</b></td>
				<td align='right'><b>".number_format($allmoneys[3])."</b></td>
				<td align='right'><b>".number_format($allmoneys[4])."</b></td>
				<td align='right'><b>".number_format($allmoneys[5])."</b></td>
				</tr>";
	
		echo "<tr>
				<td width=80>案件編號</td>
				<td width=300>案件名稱</td>
				<td align=right width=80>總酬金</td>
				<td align=right width=80>未收酬金</td>
				<td align=right width=80>總收入</td>
				<td align=right width=80>總實收</td>
				<td align=right width=150>隨案支出累計</td></tr>";
/*		if($tabyear1)
			echo "<tr><td colspan='2' align='right' ><b>".$tabyear1."年產生之總酬金</b></td>";*/
		echo "</tbody></table><br><br>";
//		echo "";
	}
	if($show=="rBotData")
	{
		$year=$_GET["year"];
		$sort=$_GET["Sort"];
		$tabyear2=$_GET["tabyear2"];
		if($sort=="NOSort")
		{
			$order="ORDER BY `NO` ASC,`year` ASC, `date` ASC";
		}else	if($sort=="casenoSort")
		{
			$order="ORDER BY `caseno` ASC,`year` ASC, `date` ASC";
		}else
			$order=""; 
		$sql=  "SELECT a.*,a.in inn,b.name,b.id casenoNO,b.money FROM `income_tab` a
				left join `caseindex_caseno` b on a.caseno = b.caseno
			   	WHERE `head1` = 2 and a.`year` = '".$year."' ".$order."";
		//echo $sql;
		$result = mysql_query($sql);
		$res_tab = [];
		//echo "[";
		while($rcase=mysql_fetch_object($result))
		{
			if($rcase->date<1000)
				$showDate="0".$rcase->date;
			else
				$showDate=$rcase->date;
			if(isset($old_rcase ) && $rcase->NO && $rcase->NO == $old_rcase->NO)
			{
				continue;
			}
			$old_rcase = $rcase;
			$res_tab[] = $rcase;
			// echo "{\"NO\":\"".$rcase->NO."\",\"caseno\":\"".$rcase->caseno."\",\"year\":\"".$rcase->year."\",\"date\":\"".$showDate."\",\"no2\":\"".$rcase->no2."\",\"no_en\":\"".$rcase->no_en."\" , \"no_n\":\"".$rcase->no_n."\" , \"head1\":\"".$rcase->head1."\" , \"head2\":\"".$rcase->head2."\"";
			// $sql= "SELECT * FROM `tab_".$rcase->caseno."` WHERE `NO` = '".$rcase->no2."' ";
			// $resultcase = mysql_query($sql);
			// $rs=mysql_fetch_object($resultcase);
			// echo ",\"inn\":\"".$rs->in."\",\"other\":\"".$rs->other."\"";
			// $sql= "SELECT * FROM `".$year."` WHERE `caseno` = '".$rcase->caseno."' ";
			// $resultcase = mysql_query($sql);
			// $rs=mysql_fetch_object($resultcase);
			// echo ",\"casenoNO\":\"".$rs->NO."\",\"name\":\"".$rs->name."\"";
			// echo "},";
		}
		//echo "\"\"]";
		echo json_encode($res_tab);
	}

?>

