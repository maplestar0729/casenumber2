<style>
	.pl_t{
	  border-bottom: 3px double black;
	  font-size:30px;
	  font-family:DFKai-sb;
	  font-weight: bolder;
      color:	#930000;
	}
    .btn-mystyle{
        color: #fff;
        background-color: #5E825E;
        border-color: #4cae4c;
    }
	.line_5_style{
        background-color:#CEFFCE;
    }
    #today_logbook_frm input{
		width:100%;
	}
	#today_logbook_frm #today_logbook{
		padding-left:180px
	}
    .casenoEdit{
    width: 99%;
    min-height:25px ;
    height:auto;
    }
    .casenoEdit:hover{
        background-color: #0066FF;
        color: white;
    }
    .deadline-font{
        color:red;
    }
</style>

<div>
<?php
// echo date("Y-m-d H:m:s");
?>
  <form action="<?=base_url('/logbook_plan/create_log_plan')?>"  method="POST" accept-charset="utf-8" id="today_logbook_frm" >
  <div id="work_plan">
  </div>
  
  
    <ul class="list-inline"  id="today_logbook_title">
		
			<li class=" col-md-2" >
				<span class="pl_t musPick" >工作計畫新增</span>
			</li>
		
        <li class="col-md-2"><a  class="btn btn-mystyle " id="data_stn" >確認送出</a></li>
    </ul>
    <br><br><br>
  <ul id="today_logbook" style="width:1040px">
    <div>
        <table id="today_logbook_table"  class="table table-bordered" style="width:1200px">
            <thead>
                <tr>
                    <td style="width:120px">預計完成日期</td>
			  <?php if($this->session->userdata('case_number')["class"] != 3) {?>
                    <td style="width:100px">成員</td>
			  <?php } ?>
                    <td style="width:110px">工作類型</td>
                    <td style="width:100px">案件編號</td>
                    <td style="width:300px">案件名稱</td>
                    <td style="width:250px">工作內容</td>
                    <td style="width:200px">備註說明</td>
                </tr>
            </thead>
            <tbody>
                <tr data-list-id="0">
                    <td><input type="text" name="date" class="today_leng musPick"  id="today_leng"  ></td>
			  <?php if($this->session->userdata('case_number')["class"] != 3) {?>
                    <td style="width:100px">
                <select class="form-control"  name="member" id="member"  style="width:110px">
                  <option value="">未選擇</option>
				  <?php
					  if(isset($member))
					  {
						foreach ($member as $key => $value) {
						  //echo json_encode($value);
						  echo '<option value="'.$value["EN"].'">'.$value["EN"].' '.$value["name"].'</option>';
						}

					  }
				  ?>
				  </select>
                  </td>
			  <?php } ?>
                    <td><select class="form-control today_state"  name="today_state"  >
                            <option value="W">案件</option>
                            <option value="D">指派</option>
                            <option value="L">學習</option>
                        </select></td>
                    <td><input type="text" name="today_caseno" class="today_caseno" maxlength="5"  required="required"   ></td>
                    <td><input type="text" name="today_name" class="today_casename"  required="required" ></td>
                    <td class="today_content_td"><input type="text" name="today_content" class="today_content" ></td>
                    <td><input type="text" name="today_remark" class="today_remark" ></td>
                </tr>
            </tbody>
        </table>
    </div>
  </form>
    
    
  </ul>
    <ul class="list-inline">
        <li class=" col-md-2" >
            <span class="pl_t musPick">工作計畫</span>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <div id="history_logbook">
      <div id="toolbar" class="list-inline">
      </div>
      <table id="logbook_tab"
                data-toggle="table"
                data-toolbar="#toolbar"
                data-search="true"
                data-show-refresh="true"
                data-show-columns="true"
                data-show-export="true"
                data-detail-formatter="detailFormatter"
                data-minimum-count-columns="2"
                data-show-pagination-switch="true"
                data-pagination="false"
                data-url="<?=base_url("logbook_plan/get_plan_list".$tab_search_str)?>"
                data-page-list="[10, 20, 25 , 50, 100, ALL]"
                data-show-footer="false"
                data-row-style="rowStyle"
			<?php if($this->session->userdata('case_number')["class"] != 3) {?>
				style="width:1260px"
			<?php }else{ ?>
				style="width:1200px"
			<?php } ?>
          >
            <thead>

              <tr>
                  <th data-field='NO'     data-width='10'  data-visible="false" >id</th>
                  <th data-field='date'   data-width='350' data-formatter="DateFormatter"   data-events="DateEvents" data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
			      <th data-field='member' data-width='80'  data-formatter="MemberFormatter" data-events="MemberEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
                  <th data-field='type'   data-width='110' data-formatter="TypeFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name'   data-width='300' data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
          
                  <th data-field='content' data-width='250'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
                  <th data-field='remark'  data-width='200'  data-formatter="work_contentFormatter" data-events="work_contentEvents" data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
				  <th data-field='state2' data-formatter="schFormatter" data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >進度</th>
                  <th data-field='state'  data-width='110' data-formatter="StateFormatter" data-events="OtherEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >草稿或公開</th>
                  <th data-field='Other'   data-formatter="OtherFormatter" data-events="OtherEvents" data-width='50'  data-sortable="true" data-filter-control="true" data-editable="true"  >刪除否</th>

				  </tr>
            </thead>
          </table>
  </div>  
</div>
<div>

    <ul class="list-inline">
        <li class=" col-md-2" >
            <span class="pl_t musPick">工作計畫紀錄</span>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <div id="historylog_logbook">
      <div id="toolbar" class="list-inline">
      </div>
      <table id="logbook_tab"
                data-toggle="table"
                data-toolbar="#toolbar"
                data-search="true"
                data-show-refresh="true"
                data-show-columns="true"
                data-show-export="true"
                data-detail-formatter="detailFormatter"
                data-minimum-count-columns="2"
                data-show-pagination-switch="true"
                data-pagination="false"
                data-url="<?=base_url("logbook_plan/get_plan_del_list".$tab_search_str)?>"
                data-page-list="[10, 20, 25 , 50, 100, ALL]"
                data-show-footer="false"
                data-row-style="rowStyle"
			<?php if($this->session->userdata('case_number')["class"] != 3) {?>
				style="width:1240px"
			<?php }else{ ?>
				style="width:1180px"
			<?php } ?>
          >
            <thead>

              <tr>
                  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
                  <th data-field='date' data-width='100'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
				  <th data-field='member' data-width='80' data-formatter="MemberFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
                  <th data-field='type' data-width='110' data-formatter="TypeFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <!--<th data-field='state' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>-->
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>

				  <th data-field='state2' data-formatter="schFormatter" data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >進度</th>
                  <!--<th data-field='Other' data-formatter="OtherFormatter_END" data-events="OtherEvents" data-width='50'  data-sortable="true" data-filter-control="true" data-editable="true"  >重新啟動</th>-->

				</tr>
            </thead>
          </table>
  </div>  
</div>

<script>

var member_list = new Object();
<?php
    if(isset($member))
    {
    foreach ($member as $key => $value) {
        //echo json_encode($value);
        echo 'member_list["'.$value["EN"].'"] = "'.$value["name"].'";  ';
    }

    }
?>

var work_str_list = new Object();
function set_content(type,elem)
{
    $(elem).html(work_str_list[type]);
}
$(document).on("change",".today_state",function(){
	var tmp_val = $(this).val();
	switch (tmp_val) {
        case "L":
			$(this).parent().parent().children().children(".today_caseno").parent().html('X<input type="hidden" name="today_caseno" class="today_caseno" value="" >');
			$(this).parent().parent().children().children(".today_casename").parent().html('X<input type="hidden" name="today_name" class="today_casename" value="" >');
			$(this).parent().parent().children().children(".today_content").parent().html('<input type="text" name="today_content" class="today_content" >');
            break;
        case "D":
			$(this).parent().parent().children().children(".today_caseno").parent().html('X<input type="hidden" name="today_caseno" class="today_caseno" value="" >');
			$(this).parent().parent().children().children(".today_casename").parent().html('X<input type="hidden" name="today_name" class="today_casename" value="" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(0);
			var content_elem = $(this).parent().parent().children().children(".today_content").parent();
            set_content(tmp_val,content_elem);
            break;

        case "W":
			$(this).parent().parent().children().children(".today_caseno").parent().html('<input type="text" name="today_caseno" class="today_caseno" maxlength="5"  required="required" >');
			$(this).parent().parent().children().children(".today_casename").parent().html('<input type="text" name="today_name" class="today_casename"  required="required" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(0);
			var content_elem = $(this).parent().parent().children().children(".today_content").parent();
            set_content(tmp_val,content_elem);
            break;
    }
})

$(document).on('click','.pl_t',function(){
	
	if($(this).html()=="工作計畫新增")
	{
		$("#today_logbook").toggle();

	}
	else if ($(this).html()=="工作計畫")
	{
		$("#history_logbook").toggle();

	}
	else
	{
		$("#historylog_logbook").toggle();

	}
	
});
window.OtherEvents= {
    'change .statech' :function (e, value, row, index){
        if(!confirm("確認是否公開"))
		{
			return;
		}
        var stn_data = {
            "state":"B",
            "NO":row.NO
        }
        update_plan(stn_data,function(){
            alert("OK");
            location.reload();
        });
    },'click .plan_del' :function (e, value, row, index){
        if(!confirm("確認是否刪除"))
		{
			return;
		}
        var stn_data = {
            "state":"D",
            "NO":row.NO
        }
        update_plan(stn_data,function(){
            alert("OK");
            location.reload();
        });
    }
}
function update_plan(stn_data,SuccessCallBack){
    $.ajax({
        url:base_url+"logbook_plan/update_plan",
        type:"POST",
        dataType:"JSON",
        data:stn_data,
        success:function(){
                    
                    if(SuccessCallBack != undefined)
                        SuccessCallBack();
        },
        error:function(){
            alert("error");
        }

    })
}

function DateFormatter(value,row,index){

	var tmp_str = "";
    <?php if($this->session->userdata('case_number')["class"] == 1 || $this->session->userdata('case_number')["class"] == 2) {?>
    
        tmp_str = '<div class="row">';
        tmp_str += '<div class="row_date musPick col-md-3" style="width:50%" data-NO="'+row.NO+'">'+row.date+'</div>';
        tmp_str += '<div class="col-md-4" data-NO="'+row.NO+'" style="padding-left:5px;"><a class="del musPick" aria-hidden="true">重改</a></div>';
        tmp_str += '</div>';
        
    <?php }else { ?>
    if(row.state == "A")
    {
        tmp_str = '<div class="row">';
        tmp_str += '<div class="row_date musPick col-md-3" style="width:50%" data-NO="'+row.NO+'">'+row.date+'</div>';
        tmp_str += '<div class="col-md-4" data-NO="'+row.NO+'" style="padding-left:5px;"><a class="del musPick" aria-hidden="true">重改</a></div>';
        tmp_str += '</div>';
        
    }else{
        tmp_str = row.date;
    }
    <?php } ?>
    
    return tmp_str;
}
window.DateEvents = {
    'click .del' :function (e, value, row, index){
        data = { 'NO' : row.NO,
                   'date' : ""
            }
        tmp_ele = $(this);
        function CallBack()
        {
            tmp_ele.parent().parent().children(".musPick").html("");
        }
        
        update_plan(data,CallBack);
    }
}
var tmp_old_date_str;
var calset={
        "dow":['日','一','二','三','四','五','六'],
        "tbBgColor":"91FEFF",
        "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        "element_type":"html",
        "click_over": function(){
            tmp_NO = this.formname.attr("data-NO");
            d_str = this.formname.html();
            
			if(DateDiff(d_str,dt) > 0){
				alert('請輸入今天以後的日期');
                this.formname.html(tmp_old_date_str);
			}else
            {
                data = { 'NO' : tmp_NO,
                    'date' : d_str
                }
                //debugger;
                update_plan(data);
            }
            // update_status(data,this.formname.parent().parent());

        }
    };

moncalendar1 = 0;
$(document).on("click",".row_date", function(e){
    e.stopPropagation();
    if(moncalendar1==0)
	{
			moncalendar1 = new makecaldef("moncalendar1dw");
	}
    tmp_old_date_str = $(this).html();
    moncalendar1.picksel($(this),calset);
});
function OtherFormatter(value, row, index){
    var rtn_str = "";
    if(row.state == "A" )
    {
    //    rtn_str += '<a class="glyphicon glyphicon-share musPick plan_open"  aria-hidden="true"> </a>';
       rtn_str += '<a class="musPick plan_del"  aria-hidden="true">刪除 </a>';
    }
    <?php if($this->session->userdata('case_number')["class"] == 1) {?>
       if(row.state == "B" )
       {
            rtn_str += '<a class=" musPick plan_del"  aria-hidden="true">刪除 </a>';
       }
    <?php }else { ?>
    // 預計刪除
    // if(row.state == "B" )
    // {
    //     rtn_str += '<a class="glyphicon glyphicon-remove musPick plan__del"  aria-hidden="true"> </a>';
    // }
    <?php } ?>
    return rtn_str;
}
function OtherFormatter_END(value, row, index){
    var rtn_str = "";

        rtn_str += '<a class="glyphicon glyphicon-share musPick plan_open"  aria-hidden="true"> </a>';
    return rtn_str;
}

function MemberFormatter(value, row, index){
    <?php if($this->session->userdata('case_number')["class"] == 1) {?>
        var sel_str = "";
        sel_str += '<select class="form-control MemberEdit"  style="width:110px">'
        if(row.member == ""){
            sel_str += '<option value="" selected>未選擇</option>';
        }else{
            sel_str += '<option value="">未選擇</option>';
        }

        for(var key in member_list){
            if(key == row.member){
                sel_str += '<option value="'+key+'" selected>'+key+' '+member_list[key]+'</option>';
            }else {
                sel_str += '<option value="'+key+'">'+key+' '+member_list[key]+'</option>';
            }
        }
        // sel_str += '<?php
		// 			  if(isset($member))
		// 			  {
		// 				foreach ($member as $key => $value) {
		// 				  //echo json_encode($value);
		// 				  echo '<option value="'.$value["EN"].'">'.$value["EN"].' '.$value["name"].'</option>';
		// 				}

		// 			  }
		// 		  ?>';
        sel_str += '</select>';
        $(sel_str).val(row.member);
        return sel_str;
    <?php }else { ?>
        return row.member +" "+row.member_name;
    <?php } ?>
    
}
window.MemberEvents = {
     'change .MemberEdit' :function (e, value, row, index){
         var tmp_val = $(this).val();
         $data = {
             "NO" : row.NO,
             "member" : tmp_val
         }
         function CallBack()
         {
             alert("OK");
             row.member = tmp_val;
         }
         update_plan($data,CallBack);
     }
}
function TypeFormatter(value, row, index){
    tmp_str ="";
    switch (value) {
        case "D":
            tmp_str = "指派"
            break;
        case "W":
            tmp_str = "案件"
            break;
        case "L":
            tmp_str = "學習"
            break;

        default:
            
            break;
    }
        return tmp_str;
}
function StateFormatter(value, row, index){
    tmp_str ="";
    switch (value) {
        case "A":
			tmp_str='<select class ="statech" onchange="statechange(this.options[this.options.selectedIndex].value,'+row.NO+')" class="form-control"><option value="A">草稿</option> <option value="B">公開</option></select>'
            break;
        case "B":
            tmp_str = "公開"
            break;

        default:
            
            break;
    }
        return tmp_str;
}

function schFormatter(value, row, index){
    tmp_str ="";
	if (row.state2 == 'D')
	{
		return [
        '<select name="state2" onchange="schchange(this.options[this.options.selectedIndex].value,'+row.NO+')" class="form-control"><option value="D">進行中</option> <option value="P">暫緩</option><option value="E">完成</option></select>'
    ].join('');
	}
	else
	{
		switch (row.state2) {

			case "P":
				tmp_str = "暫緩"
				break;
			case "E":
				tmp_str = "完成"
				break;
			default:           
				break;
		}
        return tmp_str;
	}

}
function schchange(sch,no)
{
	var sch_tmp = sch
	var tmp_str=''
	

	console.log(no)
	switch(sch_tmp){
		case "P":
			var stn_data = {
			"state2":"P",
			"NO":no
			}
			console.log(no)

			update_plan(stn_data);
			break;
		case "E":
			var stn_data = {
				"state2":"E",
				"NO":no
			}
			update_plan(stn_data);
			break;
		default:           
			break;
	}
    
}
    
function rowStyle(row, index)
{
    var style_obj = new Object();
    var todayDate = new Date();
    var tmp_str = "";
    if(DateDiff(row.date,todayDate)>=-1 && row.state2 == "D") 
    {
        tmp_str += "deadline-font ";
        //style_obj.css = "font-color:red;";
    }
    if ((index+1) % 5 == 0 ) {
        tmp_str += "line_5_style ";
    }
    style_obj.classes = tmp_str;
  return style_obj;

}

var replaceWith = $('<input id="temp_name_input" name="temp" style="width:80%" />');
var save_ok_With = $('<a class="glyphicon glyphicon-ok musPick name_save_ok"  aria-hidden="true"> </a>');
var remove_With = $('<a class="glyphicon glyphicon-remove musPick name_cancel"  aria-hidden="true"></a>');
var connectWith = $('input[name="hiddenField"]');
function work_contentFormatter(value, row, index){
    <?php if($this->session->userdata('case_number')["class"] == 1 || $this->session->userdata('case_number')["class"] == 2) {?>
        return [
            '<div data-field="remark" class="casenoEdit musPick">'+row.remark+'</div>'
        ].join('');
    <?php }else { ?>
    if(row.state == "A")
    {
        return [
            '<div data-field="remark" class="casenoEdit musPick">'+row.remark+'</div>'
        ].join('');
    }else{
        return row.remark;
    }
    <?php } ?>

}



window.work_contentEvents = {
    'click .casenoEdit' :function (e, value, row, index){
        var elem = $(this);
        $(".casenoEdit").show();
        this.esc_input = function(event){
            replaceWith.remove();
            save_ok_With.remove();
            remove_With.remove();
            elem.show();
        }

        this.set_logbook_head = function ($data){
            function set_logbook_plan()
            {
                alert("OK");
                elem.text(replaceWith.val());
                if($data.sort_no)
                {
                    row.sort_no = replaceWith.val();
                }else if($data.work_content)
                {
                    row.work_content = replaceWith.val();

                }
            }
            if(elem.attr("data-field") == "remark")
            {
                $data = {"NO":  row.NO,
                            "remark" : replaceWith.val()
                        }    

            }
            update_plan($data,set_logbook_plan)
        }

        this.enter_input = function(event){
            if(elem.attr("data-field") == "remark")
            {
                $data = {"NO":  row.NO,
                            "remark" : replaceWith.val()
                        }    
                
            }
            
            
            temp_set_head($data);
            // if (replaceWith.val() != "") {
            //     elem.text(replaceWith.val());
            // }
            // elem.text(replaceWith.val());
            temp_esc_input();
        }
        temp_set_head = this.set_logbook_head;
        temp_enter_input = this.enter_input;
        temp_esc_input  = this.esc_input;
        elem.hide();
        str_name_html = elem.html();
        elem.after(remove_With);
        elem.after(save_ok_With);
        elem.after(replaceWith);
        replaceWith.focus();
        replaceWith.val(str_name_html);



        replaceWith.keypress(function(event ){
            if ( event.which == 13 ) {
                temp_enter_input();
            }

        });
        replaceWith.keyup(function(event){
            if(event.keyCode == 27){
                temp_esc_input();
            }
        })
        save_ok_With.click(function(e){
            temp_enter_input();
        });
        remove_With.click(function(e){
            temp_esc_input();
        });
    }
}

  function call_autocomplete(tr_list_id)
  {
    $("#today_logbook tr .today_caseno").eq(tr_list_id).autocomplete({

        source: function (request, response) {
            //data :: JSON list defined
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(needata , function (value) {
                return matcher.test(value.caseno || value.name);
            }))
        },
        select: function( event, ui ) {
            $(this).val(ui.item.caseno);
            $(this).parent().parent().children().children(".today_casename").val(ui.item.name);
            return false;
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.caseno + "<br>" + item.name + "</a>" )
            .appendTo( ul );
    };
    $("#today_logbook  tr .today_casename").eq(tr_list_id).autocomplete({
        source: function (request, response) {
            //data :: JSON list defined
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(needata , function (value) {
                return matcher.test(value.name || value.caseno  );
            }))
        },
        select: function( event, ui ) {
            $(this).parent().parent().children().children(".today_caseno").val(ui.item.caseno);
            $(this).val(ui.item.name);
            return false;
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.caseno + "<br>" + item.name + "</a>" )
            .appendTo( ul );
    };

    $("#today_logbook  tr .today_content").eq(tr_list_id).autocomplete({

        source: function (request, response) {
            //data :: JSON list defined
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(log_content_data , function (value) {
                return matcher.test(value.content);
            }))
        },
        select: function( event, ui ) {
            $(this).val(ui.item.content);
            return false;
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.content + "</a>" )
            .appendTo( ul );
    };
  }

$(document).ready(function(){
      needata = "";
  $.ajax({
        url: base_url+"logbook/get_caseno",
        dataType: "json",
        type: "get",
        success: function (data) {
            needata = data;
            call_autocomplete(0);
        }
    });
	$("#data_stn").click(function(e){
		if(confirm("確認是否送出"))
		{
			$("#today_logbook_frm").submit();
		}
	});
    $.ajax({
        url:base_url+"logbook_head/get_head_list/W",
        dataType: "json",
        type: "get",
        success: function (data) {
            
            var str = "";
            str = '<select class="form-control today_content"  name="today_content"  >';
            for(var key in data)
            {
                str += '<option value="'+data[key].work_content+'">'+data[key].work_content+'</option>'
            }
            str += '</select>';
            work_str_list["W"] = str;
            $(".today_content_td").html(work_str_list["W"]);
        }
    })
    $.ajax({
        url:base_url+"logbook_head/get_head_list/D",
        dataType: "json",
        type: "get",
        success: function (data) {
            var str = "";
            str = '<select class="form-control today_content"  name="today_content">';
            for(var key in data)
            {
                str += '<option value="'+data[key].work_content+'">'+data[key].work_content+'</option>'
            }
            str += '</select>';
            work_str_list["D"] = str;
        }
    })
    $("#title_edit_menu .work_plan a").css("color","red");
    var calset_today={
        "dow":['日','一','二','三','四','五','六'],
        "tbBgColor":"91FEFF",
        "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        "element_type":"input",
		"click_over":function(){
			var elm = this.formname;
            var tmp_str = elm.val();
            var dt = new Date();
			if(DateDiff(elm.val(),dt) > 0){
				alert('請輸入今天以後的日期');
                elm.val("");
			}
				
		}
    };
    $("#today_leng").calDate(calset_today);


});

</script>