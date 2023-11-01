<HTML> 
<HEAD> 

<link href="<?=base_url('public/casenumber2/case.css');?>" rel="stylesheet" >
<script src="<?=base_url('public/js/jquery-1.12.0.min.js');?>" type="text/javascript"></script>

	<link href="<?=base_url('public/plugin/jquery-ui-1.11.4/jquery-ui.css');?>" rel="stylesheet" >
    <script src="<?=base_url('public/plugin/jquery-ui-1.11.4/jquery-ui.js');?>" type="text/javascript"></script>

<script>
var $db_name="www_casenumber";
function number_format(n) {
	if(isNaN(n))
		return n;
    if(n < 1000){
		return n;
    } else {
		if(n%1000<10)
			return number_format(Math.floor(n/1000))+",00"+n%1000;
		else if(n%1000<100)
			return number_format(Math.floor(n/1000))+",0"+n%1000;
		else 
	        return number_format(Math.floor(n/1000))+","+n%1000;
    }
}

//alert(number_format(1000000000000));
</script>
<script type="text/javascript" src="<?=base_url('public/casenumber2/tree.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/casenumber2/new_data.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/casenumber2/casenumber-cal.js');?>"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<TITLE> 
案件編號隨案費用及案件收入系統
</TITLE> 


<script>
base_url = "<?=base_url()?>"
session_class = "<?php echo $session_class; ?>"
rBotData=new Array;
yearindex= new Array;
members= new Array;
head= new Array;
var year;
var tabyear1;
var tabyear2=0;
caseNo={};
head[0]=[,"隨案成本","酬金收入","代收","轉付"];
head[3]=new Array;
for(var i=0;i<=20;i++)
	head[3][i]="";
function reload_heads(callBack)
{
	reload_heads_callBack_fun = callBack;
	$.ajax({url:base_url+"casenumber/show",dataType:'json',type:'GET',data:'show=head',
			error:function(obj,msg){
				alert("Error:\n\ncan't read MySQL");
			},
			success:function(data){
//						alert("date="+data);
				//data[0].pop();
				//delete data[0][0];
				head[1]=data[0];
				head[4]=data[0];
				//data[1].pop();
				//delete data[1][0];
				head[2]=data[1];
				if(typeof(callBack) == "function")
				{
					callBack();
				}
//						members.pop();
//						alert(yearindex);
//						alert(members);
//						$("#printYears").html(yCode);
//						alert(head[1][1]);
			}
	});
}
reload_heads();
function reload_members()
{
	$.ajax({url:base_url+"casenumber/get_en_list",dataType:'json',type:'GET',
					error:function(obj,msg){
						alert("Error:\n\ncan't read MySQL");
					},
					success:function(data){
//						alert("date="+data);
						members=data;
						for(var i in members)
						{
							members[i].showMem = new Array();
						}
//						members.pop();
//						alert(yearindex);
//						alert(members);
//						$("#printYears").html(yCode);
						
					}
	});
}
reload_members();
var yearTree=new Array;
var yCode="";
var yearTab={o:0};
function yearPrint()
{	
	$("#printYears").html("");
	var yTabCode="";
	var yData=new Array;
	for(var i=0;i<yearindex.length;i++)
	{
		
		
		yTabCode+="<div id=setYearVal_"+yearindex[i]+" class=setYV>"+yearindex[i]+"</div>";
		if(!yearTree[yearindex[i]]) 
			yearTree[yearindex[i]]=  new Folder();
		dcc=yearTree[yearindex[i]]
		dcc.desc=yearindex[i]+"案件全部";
		dcc.id="year"+yearindex[i];
		dcc.year=yearindex[i];
		dcc.show();
//		$("#printYears").html(yearindex[i]);
//		foldersTree.printDoc();
	}
	
	this.printYearTab=function(Code)
	{
		$("#yearTab").html(Code);
		yearTab.doc=$("#yearTab");
	}
	this.printYearTab(yTabCode);
//	$("#printYears").html(yCode);
	
};




</script>
</HEAD> 
<BODY> 
<div id=smallWindow class="smallwin" style="display:none"></div>
<div id=yearTab class="smallwin " style="display:none"></div>
<div id="head_edit" class="smallwin " style="display:none"></div>

<a href="<?=base_url('casenumber/');?>"><span class="style1"><font face='標楷體' color='blue'>案件收支明細</font></span></a><br>
<hr  />
<div id=tb class='tbclass'></div>

<table ><tbody style=" vertical-align:top ">
<tr>
	<td rowspan="2" style="width:400;">
	<table border="1" cellspacing="0" cellpadding="0" bgcolor="#CDFEFF">
	  <tbody>
	    <tr class="musPick">
	      <td width="180"><a href="<?=base_url();?>">案件編號系統</a></td>
	      <!--<td width="180" class="tittlSec" id=print_casenumber_all>列印所有案件編號</td>-->
        </tr>
      </tbody>
	</table>
	<div id=printYears>
	</div>
	</td>
	<td>
	<table><tbody><tr><td width=100></td><td>
		<table border="1" cellspacing="0" cellpadding="0" bgcolor="#CDFEFF">
		  <tbody>
			<tr class="musPick">
			  <td width="150" class="tittlSec" align="center" id=member_mana>事務所成員</td>
			  <td width="150" class="tittlSec" align="center" id=search_head>依科目查詢</td>
			  <td width="100" class="tittlSec" align="center" id="head_view">科目管理</td>
			</tr>
		  </tbody>
		</table>
	</td></tr>
	<tr><td>
	</td></tr></tbody></table>
	<br>

	案件名稱搜尋：<INPUT TYPE='int' id=search_name SIZE='10' nselect="nextSibling.focus()">
	<INPUT id=search_btn TYPE='button' UseSubmitBehavior='true' VALUE=送出!>
	<!--<font color='red'>記得不要按ENTER</font>-->

	<br><br>
	<div id=rTab>
	</div>
	</td>
</tr>
</tbody>
</table>
<script>
$("#search_btn").click(function(){
	search_case($("#search_name").val());
});
$("#search_name").keypress(function(e) {
	e.stopPropagation();
	if ( event.which == 13 ) {
		search_case($(this).val());
	}
});
function search_case(sName)
{
	$.ajax({url:base_url+"casenumber/search_case_finish",type:'POST',data:'name='+sName,
					error:function(obj,msg){
						alert("Error:\n\ncan't read MySQL");
					},
					success:function(data){
						smallWindow.doc.html(data);
						caseDataPrint.caseClick();
						smallWindow.doc.dialog({
							title:"案件搜尋 名稱："+sName,
							modal: true,
							bgiframe: true,
					
							width: "50%",
							height: "700",
							modal: true,
							draggable: true,
							resizable: false,
							overlay:{opacity: 0.7, background: "#FF8899" },
					
							buttons: {
								'關閉': function() {
									$(this).dialog('close');
								}
							}
						
						});
						$(".selcase").click(function(){
							smallWindow.doc.dialog('close');
						});
					}
	});
	
	
	

}
function callAllYear()
{	
	yearindex=[];
	$.ajax({url:base_url+"casenumber/show",dataType:'json',type:'GET',data:'show=year',
					error:function(obj,msg){
						alert("Error:\n\ncan't read MySQL");
					},
					success:function(data){
	//					alert("date="+data);
						yearindex=data;
//						alert(yearindex);
						yearPrint();

//						$("#printYears").html(yCode);
					}
	});
}
callAllYear();
var smallWindow={
		name:"",
		doc:$("#smallWindow")
	};
inrserData();
$("#print_casenumber_all").click(function(){
	if(!year)
	{
		year = prompt("輸入年分");
		window.open(base_url+"casenumber/print_casenumber_all?year="+year, "", "");
	}else
		window.open(base_url+"casenumber/print_casenumber_all?year="+year, "", "");
});
$("#search_head").click(function(){
	window.open(base_url+"casenumber/search");
});
</script>

<HR> 
<P ALIGN="CENTER"> 
<SMALL> <I> 
Copyright ? by 
溫永欽
, 2011 <br>  V3.0 
</I> </SMALL> 
</P> 
</BODY> 
</HTML> 