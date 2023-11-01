<?php
	include("mysql_connect.inc.php");
	$name=$_POST["name"];
	echo "<input type='button' value='列印' onclick='printTab(\"sw\")'>";
	echo "<table border='1' cellspacing='0' cellpadding='0' width=500><tbody>";
	echo "<tr><td width=100>案件編號</td>
			<td width=300>案件名稱</td>
			<td width=100>總酬金</td></tr>";
		$sql="SELECT * FROM  `caseindex_caseno` WHERE  `name` LIKE  '%".$name."%'";
		$result2 = mysql_query($sql);
		while($rs2=mysql_fetch_object($result2))
		{	
			echo "<tr>
					<td style='display:none'><input type=hidden  data-id='money' value=".$rs2->money." ></td>
					<td align=right class='selcase musPick' data-id=".$rs2->year."_".$rs2->id.">".$rs2->caseno."
					</td>
					<td class='selcase musPick' data-id=".$rs2->year."_".$rs2->id.">".$rs2->name."</td>
					<td class='selcase musPick' align=right>".number_format($rs2->money)."</td></tr>";
		}
	echo "</tbody></table>";
?>
