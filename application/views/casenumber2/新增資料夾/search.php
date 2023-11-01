<?php 
	$title = ""; 
	include("include/header.inc"); 
?> 
<?php
	include("mysql_connect.inc.php");
	echo "<form name=form1 ACTION='search_finish.php' METHOD=POST >";
	echo "<table><tbody><tr><td>";
	echo "<font size='4' face='標楷體'>查詢科目：</font><br>";
	echo "<table border=1 cellpadding='0' cellspacing='0'><tbody style=\" vertical-align:top \">";
	echo "<tr><td width=100>案件範圍</td>
			<td width=100>日期</td>
			<td width=100>科目一</td>
			<td width=100>科目二</td></tr>";
	echo "<tr><td>";
	echo "<select name='caseyear'>";
	$sql="SELECT year FROM `caseindex_caseno` group BY `year` ORDER BY `year` DESC ";
	$result = mysql_query($sql);
	echo "<option value=\"0\">全部</option>";
	while($rs=mysql_fetch_object($result))
	{
		echo "<option value=\"$rs->year\">$rs->year</option> ";
	}
	echo "</select>";
	echo "年</td><td>";

	echo "<select name='year'>";
	$sql="SELECT year FROM `caseindex_caseno` group BY `year` ORDER BY `year` DESC ";
	$result = mysql_query($sql);
	while($rs=mysql_fetch_object($result))
	{
		echo "<option value=\"$rs->year\">$rs->year</option> ";
	}
	echo "</select>";
	echo "年</td><td>";
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
	$heads[0][1]="隨案成本";
	$heads[0][2]="酬金收入";
	$heads[0][3]="代收";
	$heads[0][4]="轉付";
	echo "<select name='head1'>";
	echo "<option value=0>全部</option>";
	foreach ($heads[0] as $key => $value) {
		echo "<option value=\"$key\">$key $value</option>";
	}
	echo "</td><td>";
	echo "<select name='head2'>";
	echo "<option value=0>全部</option>";
	echo "<option >--------隨案成本--------</option>";
	foreach ($heads[1] as $key => $value) {
		echo "<option value=\"$key\">$key $value</option>";
	}
	echo "<option >--------酬金收入--------</option>";
	foreach ($heads[2] as $key => $value) {
		echo "<option value=\"$key\">$key $value</option>";
	}
	echo "</td>";
	
	echo"</tr></tbody></table>";
	echo "</td></tr><tr><td align=right>";
	echo "<INPUT TYPE='submit' VALUE='查詢!'>";
	echo "</td></tr></tbody></table>";
	
?>
</form>
<input type="submit" name="button" id="button" value="關閉視窗" onclick="window.close()"/>

<?php 
include("include/footer.inc"); 
?>