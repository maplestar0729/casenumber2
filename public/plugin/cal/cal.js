	//隱藏式窗
function makecaldef(strName)
{
	dt = new Date();

	Day = dt.getDate(); /* 1-31*/
	WeekDay = dt.getDay(); /*0-6*/

	this.name=strName;
	this.formname='';
	this.month=dt.getMonth();
	this.year=dt.getFullYear();
	this.currMonth=dt.getMonth();
	this.currYear=dt.getFullYear();
	this.tbtag=0;
	this.DOW;
	this.bgcolor;
	this.monthname;
	this.click_over;
	this.cal_emt = $("#tb_cal_date");
	this.view_ans=function () {

		show_state = this.cal_emt.css("display");
		if( show_state == "block")
		{
			bObj = this.formname[0];
			x=$(bObj).offset().left;
			y=$(bObj).offset().top+30;
			//debugger;
			//this.cal_emt.show();
			this.cal_emt.css({left:x,top:y});
			//console.log(this.cal_emt.offset().left + " " + this.cal_emt.offset().top);
			//console.log(x + " " + y + " ");
			if($("#tb_cal_modal").length > 0)
			{
					$("#tb_cal_modal").show();
			}
			this.tbtag=1;
//			alert(this.formname);
		} else if(show_state  == "none") {
			//this.cal_emt.hide();
			$("#tb_cal_modal").hide();
			this.tbtag=0;
//			alert(this.tbtag);
		}
//		alert(x);
	};

	this.MonLeng =function (months)
	{
		var MonthsLength=[31,28,31,30,31,30,31,31,30,31,30,31];
		if(((this.year%4==0)&&!(this.year%100==0))||(this.year%400==0))MonthsLength[1]=29;
		else MonthsLength[1]=28;
		return MonthsLength[months];
	};

	this.changemon = function (value)
	{



		upMon=parseInt(this.month,10);
		upYr=parseInt(this.year,10);
		upMon+=value;
		if(upMon<0)
		{
			upYr--;
			upMon+=12;
		}else if(upMon>=12)
		{
			upMon-=12;
			upYr++;
		}
		this.month=upMon;
		this.year=upYr;
		this.showcal(upMon,upYr);

	};
	this.changemonval = function (value)
	{
		upMon=value;
		this.month=upMon;
		this.showcal(upMon,this.year);

	};
	this.setDate=function (day)
	{
		if(day=="")
			return;

		mon=this.month;
		mon++;
		//debugger;
		dateStr = (this.year-1911) + "/" + mon+"/"+day;
		$(this.formname).val(dateStr);
//		alert(document.forms[this.formname].dateField.offsetLeft);
		this.view_ans();
		if(this.click_over)
		{
				this.click_over();
		}

	};

	this.showcal=function ()
	{
		tbwidth=300;
		vCode="<table border=1 bgcolor="+this.bgcolor+" width="+tbwidth+"><tbody><tr><td><table width="+tbwidth+"><tbody><tr>";
		vCode+="<td align=center width='15%'><a href='javascript:"+this.name+".changemon(-12)'><<</a>&nbsp;</td>";
		vCode+="<td align=center width='10%'><a href='javascript:"+this.name+".changemon(-1)'><</a>&nbsp;</td>";
		vCode+="<td align=center width='50%'> "+(this.year-1911)+"&nbsp;"+this.monthname[this.month]+"&nbsp;</td>";
		vCode+="<td align=center width='10%'><a href='javascript:"+this.name+".changemon(1)'>></a>&nbsp;</td>";
		vCode+="<td align=center width='15%'><a href='javascript:"+this.name+".changemon(12)'>>></a></td>";
		vCode+="</tr><tr><td align=center colspan=5>";
		vCode+="<table class=monselbg width="+tbwidth+"><tbody><tr>";
//		var monthname=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
		for(var i=0;i<6;i++)
		{
			vCode+="<td width='1*'><a href='javascript:"+this.name+".changemonval("+i+")' class=monsel>"+this.monthname[i]+"</a></td>";
		}
		vCode+="</tr><tr>";
		for(var i=6;i<12;i++)
		{
			vCode+="<td width='1*'><a href='javascript:"+this.name+".changemonval("+i+")' class=monsel>"+this.monthname[i]+"</a></td>";
		}
		vCode+="</tr></tbody></table>";
		vCode+="<table border=1 bgcolor=white width="+tbwidth+"><tbody><tr>";


		vCode+="<td width='15%' class=tophol align=center>"+this.DOW[0]+"</td>";
		for(var i=1;i<6;i++)
		{
			vCode+="<td width='14%' class=no_holint align=center>"+this.DOW[i]+"</td>";
		}
		vCode+="<td width='15%' class=tophol align=center>"+this.DOW[6]+"</td>";
/*		vCode+="<td width='1*' class=tophol align=center>日</td>";
		vCode+="<td width='1*' class=no_holint>一</td>";
		vCode+="<td width='1*' class=no_holint>二</td>";
		vCode+="<td width='1*' class=no_holint>三</td>";
		vCode+="<td width='1*' class=no_holint>四</td>";
		vCode+="<td width='1*' class=no_holint>五</td>";
		vCode+="<td width='1*' class=tophol align=center>六</td></tr><tr>";
*/
		vCode+="</tr><tr>";
		str=(this.month+1)+"/1/"+this.year;
		dt=new Date(str);
		WeekDay=dt.getDay();
		//alert(this.formname);
		this.fillDates(WeekDay+1,this.MonLeng(this.month),vCode,this.formname);
	};
	this.fillDates =function (dayOfWeek1,noOfDaysInmnth,vCode) {


		startSlotIndx = dayOfWeek1;
		slotIndx = startSlotIndx;

		for(var i=1;i<slotIndx;i++)
			if(i==1)
				vCode+="<td id=s"+i+" bgcolor=#dddddd></td>";
			else
				vCode+="<td id=s"+i+" ></td>";




		for(var i=1; i<(noOfDaysInmnth+1); i++) {
			slotName = "s"+slotIndx;
			val="";
			dt=new Date();
			Day=dt.getDate();

			if (i<10) {
				val = "&nbsp;"+i+"&nbsp;";
			} else {
				val = i;
			}
			if(this.month==this.currMonth&& this.year==this.currYear && i==Day)
			{
				vCode+="<td align=center id="+slotName+" bgcolor=yellow>";
				vCode+="<a class=todayint href='javascript:"+this.name+".setDate("+val+",\"moncalendar\")'><font color='#00AA00'>"+val+"</font></a></td>";
			} else
			if(slotIndx%7==1 || slotIndx%7==0)
		 	{
				vCode+="<td align=center id="+slotName+" bgcolor=#dddddd>";
				vCode+="<a class=holint href='javascript:"+this.name+".setDate("+val+",\"moncalendar\")'><font color='red'>"+val+"</font></a></td>";
			}else
			{
				vCode+="<td align=center id="+slotName+" >";
				vCode+="<a class=no_holint href='javascript:"+this.name+".setDate("+val+",\"moncalendar\")'><font color='black'>"+val+"</font></a></td>";
			}
			if(slotIndx%7==0)
			vCode+="</tr><tr>";
			slotIndx++;

		}
		vCode+="</tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>";

		//alert(this.formname);
		this.cal_emt.html(vCode);
	};



}



var moncalendar=0;
function picksel(cal_element,calset)
{

		if($("#tb_cal_date").length == 0)
		{
				tbCode = "";
				tbCode += "<div class='modal' id='tb_cal_modal'>"
				tbCode += '<div class="modal-backdrop fade in" ></div>';
				tbCode += "<div id='tb_cal_date' class='tbclass ' ></div>";
				tbCode += "</div>"
				$("body").append(tbCode);
				$("#tb_cal_modal").on("click",function(){
						$("#tb_cal_modal").hide();
						moncalendar.tbtag=0;
				});
		}
		if(moncalendar==0)
		{
				moncalendar=new makecaldef("moncalendar");
		}
		if($("#tb_cal_modal").length > 0){


		}
		if(calset)
		{
			if(calset.dow)
				DOW=calset.dow;
			else DOW=['S','M','T','W','T','F','S'];
			if(calset.tbBgColor)
				bgcolor=calset.tbBgColor;
			else bgcolor="yellow";
			if(calset.months)
				monthname=calset.months;
			else monthname=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
			if(calset.click_over)
			{
					moncalendar.click_over = calset.click_over
			}else{
					moncalendar.click_over = null;
			}
		}else
		{
			DOW=['S','M','T','W','T','F','S'];
			bgcolor="yellow";
			monthname=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
		}
		//alert(DOW);

		if(cal_element.val())
		{
			strDate = cal_element.val();
			dt=new Date(strDate);
//			alert(dt);
			moncalendar.year=dt.getFullYear();
			if( dt.getFullYear() < 2000)
			{

				moncalendar.year += 1911;
			}
			moncalendar.month=dt.getMonth();
		}else {
			dt=new Date();
			moncalendar.month=dt.getMonth();
			moncalendar.year=dt.getFullYear();
		}
		moncalendar.monthname=monthname;
		moncalendar.formname = cal_element;
		moncalendar.DOW = DOW ;
		moncalendar.bgcolor=bgcolor;
//		alert(DOW);
		moncalendar.view_ans();
		moncalendar.showcal();
};

$.fn.calDate = function (options){

	//debugger;
	$(this).on("click", function(e){
		id = $(this).attr("id");
		picksel($(this),options);
	});
}
