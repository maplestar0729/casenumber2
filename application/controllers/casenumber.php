<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class casenumber extends MY_Controller{

	
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('member_model');
  		if(!$this->session->userdata('case_number')["logged_in"])
  		{
  			//$data['img']=$this->captcha_img();
			redirect(base_url('login'));
  		}

    }

    public function index(){
		$data["session_class"] = $this->session->userdata('case_number')["class"];
		$this->load->view('casenumber2/index', $data);
    }

	public function get_en_list(){
		$year = $this->input->get("year", TRUE);
		if($year)
		{
			$this->db->select("no_en")
				->from("caseindex_caseno")
				->where("year",$year)
				->group_by("no_en")
				->order_by("no_en");
			$rtn_data = $this->db->get()->result_array();
			echo json_encode($rtn_data);
		}else{
			$this->db->select("no_en")
				->from("caseindex_caseno")
				->group_by("no_en")
				->order_by("no_en");
			$rtn_data = $this->db->get()->result_array();
			echo json_encode($rtn_data);
		}
	}

	public function show()
	{
		$show=$_GET["show"];
		
		if($show=="head")
		{
			$sql="SELECT * FROM `head` ORDER BY `NO` ASC;";
			$result = mysql_query($sql);
			$rtn[0] = [];
			while($rs=mysql_fetch_object($result) ) 
			{	
				$rtn[0][] = $rs;
			}
			$sql="SELECT * FROM `incohead` ORDER BY `NO` ASC;";
			$result = mysql_query($sql);
			while($rs=mysql_fetch_object($result)) 
			{	
				$rtn[1][] = $rs;
			}
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
			$sql="SELECT * FROM `caseindex_caseno` WHERE `no_en` = '".$EN."' and `year` = '".$year."' ORDER BY `caseno` ASC ";
			$result = mysql_query($sql);
			$res_tab = [];
			while($rcase=mysql_fetch_assoc($result))
			{
				$res_tab[] = $rcase;
			}
			echo json_encode($res_tab);
		}
		if($show=="casenoOther")
		{
			$year=$_GET["year"];

			$sql="SELECT * FROM `member` ";
			$results = mysql_query($sql);
			while($rs=mysql_fetch_object($results))
			{
				$members[]=$rs->EN;
			}
			$sql="SELECT * FROM `caseindex_caseno` WHERE `year` = ".$year." and `no_en` != '".$members[0]."'";
			for($i=1;$i<count($members);$i++)
				$sql= $sql." AND `no_en` != '".$members[$i]."'";
			$sql=$sql." ORDER BY `caseno` ASC ";
			$result = mysql_query($sql);
			$res_tab = [];
			while($rcase=mysql_fetch_assoc($result))
			{
				$res_tab[] = $rcase;
			}
			echo json_encode($res_tab);
		}
		if($show=="caseData")
		{
			$NO=$_GET["NO"];
			$year=$_GET["year"];
			$sql="SELECT * FROM `caseindex_caseno` WHERE `id` = '".$NO."'";
			$result = mysql_query($sql);
			$rs=mysql_fetch_object($result);
			$sql="SELECT *,a.in inn FROM `income_tab` a where `caseno` = '".$rs->caseno."' ORDER BY   `year` ASC ,`date` ASC ";
			$result = mysql_query($sql);
			//echo $sql;
			$res_data = [];
			while($rs=mysql_fetch_assoc($result))
			{
				$res_data[] = $rs;
			}
			echo json_encode($res_data);
		}
		if(($show=="yearData" || $show=="yearDataMem" ) && $this->session->userdata('case_number')["class"] == 1)
		{

			$year=$_GET["year"];
			$tabyear1=$_GET["tabyear1"];
			$sql="SELECT * FROM `caseindex_caseno` where `year` = '".$year."'  ORDER BY `caseno` ASC";
			$resultcase= mysql_query($sql);
			
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
				
				$bmoney = 0;
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


					$bmoney+=$rs->in;
					$bmoney-=$rs->out;
					if($bmoney > 0)
						$bmoney = 0;

				}
				if($allmoney3<0)$turemoney+=$allmoney3;
				$othermoney=($rcase->money) - ($allmoney);
		
				echo "<td align='right' ".$bgcolor.">".number_format($othermoney)."</td>
						<td align='right' ".$bgcolor.">".number_format($allmoney2)."</td>
						<td align='right' ".$bgcolor.">".number_format($turemoney)."</td>";
		
		
				$allmoneys[2]+=$othermoney;
				$allmoneys[3]+=$allmoney2;
				$allmoneys[4]+=$turemoney;
				
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
			echo "</tbody></table><br><br>";
		}
		if($show=="rBotData" && $this->session->userdata('case_number')["class"] == 1)
		{
			$year=$_GET["year"];
			$sort=$_GET["Sort"];
			$tabyear2=$_GET["tabyear2"];
			if($sort=="NOSort")
			{
				$order="ORDER BY `incono` ASC,`year` ASC, `date` ASC";
			}else	if($sort=="casenoSort")
			{
				$order="ORDER BY `caseno` ASC,`year` ASC, `date` ASC";
			}else
				$order=""; 
			$sql=  "SELECT a.*,a.in inn,b.name,b.id casenoNO,b.money FROM `income_tab` a
					left join `caseindex_caseno` b on a.caseno = b.caseno
					WHERE `head1` = 2 and a.`year` = '".$year."' ".$order."";
			$result = mysql_query($sql);
			$res_tab = [];
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
			}
			echo json_encode($res_tab);
		}
	}

	public function case_del_finish()
	{
		$year=$_POST["year"];
		$no=$_POST["no"];
		$sql = "SELECT * FROM `".$year."` WHERE `NO`=".$no."";
		$result = mysql_query($sql);
		$rs=mysql_fetch_object($result);
		$sql = "DELETE FROM `".$year."` WHERE `".$year."`.`NO` = ".$no." ;";
		if(mysql_query($sql))
		{
			echo '刪除成功!\n';

		}
		else
		{
			echo '刪除失敗!\n';

		}
		if(($rs->no_n%100))
		{
			$sql = "DROP TABLE `tab_".$rs->caseno."` ;";
			if(mysql_query($sql))
			{
				echo '隨案表、收入表刪除成功!';

			}
			else
			{
				echo '隨案表、收入表刪除失敗!';

			}

		}
	}

	public function case_edit_finish()
	{
		$no=$_POST["NO"];

		$money=$_POST["money"];


		$sql="UPDATE `caseindex_caseno` SET  `money`= '".$money."' WHERE `id` =".$no." ";
		if(mysql_query($sql))
		{
			echo '編輯成功!';

		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function case_new_finish()
	{
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
	}

	public function head_new()
	{
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
	}

	public function head_update()
	{
		$data_info = $_POST["data_info"];
		if(isset($data_info["headType"]) && $data_info["headType"] == 1)
		{
			//$sql = "INSERT INTO `head` ( `name`) VALUES ( '".$data_info["name"]."');";
			$sql = "UPDATE `head` SET `name` = '".$data_info["name"]."' WHERE `head`.`NO` = '".$data_info["NO"]."';";
		}else if(isset($data_info["headType"]) && $data_info["headType"] == 2)
		{
			$sql = "UPDATE `incohead` SET `name` = '".$data_info["name"]."' WHERE `NO` = '".$data_info["NO"]."';";
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
	}

	public function income_del()
	{
		$NO = $_POST["NO"];
		$sql = "DELETE FROM `income_tab` WHERE `NO` = ".$NO;
		//echo $sql ;
		if(mysql_query($sql))
		{
			echo '編輯成功!';
		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function income_new()
	{
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
		echo $sql ;
		if(mysql_query($sql))
		{
			echo '編輯成功!';
		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function income_update()
	{
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
	}

	public function member_del()
	{
		$data_info = $_POST["data_info"];
		$sql=" DELETE  FROM  `member`  WHERE `member`.`EN`  = '".$data_info["EN"]."';";
		//echo $sql ;
		if(mysql_query($sql))
		{
			echo '編輯成功!';
		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function member_new()
	{
		$data_info = $_POST["data_info"];
		$sql="INSERT INTO `member` (`EN`, `name`) VALUES ( '".$data_info["EN"]."',  '".$data_info["name"]."');";
		//echo $sql ;
		if(mysql_query($sql))
		{
			echo '編輯成功!';
		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function member_update()
	{
		$data_info = $_POST["data_info"];
		//$sql="INSERT INTO `member` (`EN`, `name`) VALUES ( '".$data_info["EN"]."',  '".$data_info["name"]."');";
		$sql = "UPDATE `member` SET  `name` = '".$data_info["name"]."' WHERE `member`.`EN` LIKE '".$data_info["EN"]."';";
		//echo $sql ;
		if(mysql_query($sql))
		{
			echo '編輯成功!';
		}
		else
		{
			echo '編輯失敗!';
		}
	}

	public function print_casenumber_all()
	{
		$year=$_GET["year"];
		echo '<HTML> 
				<HEAD> 
				<meta http-equiv="content-type" content="text/html; charset=utf-8">
				</head>';

		echo "<BODY onload=javascript:window.print() bgColor=#ffffff>";
		echo "<font size='6' face='標楷體' color='blue'>".$year."年案件編號</font><br >";
		echo "<br>";
		

			$sql="SELECT * FROM `member` ";
			$resultmem = mysql_query($sql);
			while($rmem=mysql_fetch_object($resultmem))
			{
				echo "　‧".$rmem->EN."(".$rmem->name.")<br>";
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
		$sql="SELECT *FROM caseindex_caseno  WHERE `year` = ".$year." and `no_en` != '".$members[0]."'";
		for($i=1;$i<count($members);$i++)
			$sql= $sql." AND `no_en` != '".$members[$i]."'";
		$sql=$sql." ORDER BY `caseno` ASC ";
		$result = mysql_query($sql);
		echo "　‧(other)<br>";



		while($rcase=mysql_fetch_object($result))
		{
			echo "　　‧".$rcase->caseno."&nbsp;".$rcase->name."<br>";
		}

	}

	public function search_case_finish()
	{
		echo '<HTML> 
				<HEAD> 
				<meta http-equiv="content-type" content="text/html; charset=utf-8">
				</head>';
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
	}

	public function search_finish()
	{
		echo '<HTML> 
				<HEAD> 
				<meta http-equiv="content-type" content="text/html; charset=utf-8">
				</head>';
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
				//不知幹嘛用 待確認 20170403
				//if(floor($rs->no_n/100)!=$yeari%100 && $yeari)continue;
				
			//		$allmoney=0;
					
				$no_n = substr( $rs->caseno , 1 , 2 );
				// echo "<tr><td align=right><a href='".base_url("casenumber")."/index?year=".$no_n."&caseno=".$rs->caseno."'>".$rs->caseno."</td>";
				echo "<tr><td align=right>".$rs->caseno."</td>";
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
	
		}
		echo "</tbody></table>";

		echo '<br>
			<input type="submit" name="button" id="button" value="關閉視窗" onclick="window.close()"/>
			<input name="Submit" type="button" id="Submit" onClick="javascript:history.back(1)" value="回一上頁" />';
	}

	public function search()
	{
		echo '<HTML> 
				<HEAD> 
				<meta http-equiv="content-type" content="text/html; charset=utf-8">
				</head>';
		echo "<form name=form1 ACTION='".base_url("casenumber")."/search_finish' METHOD=POST >";
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
		
		echo '</form>
		<input type="submit" name="button" id="button" value="關閉視窗" onclick="window.close()"/>';
	}

}
?>
