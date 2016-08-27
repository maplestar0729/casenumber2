
<style>
	.btn-mystyle{
	color: #fff;
	  background-color: #5E825E;
	  border-color: #4cae4c;
	}
	.newlog{
	width:800px;
	vertical-align:bottom;
	}
	#text_content{
	width: 500px;
	height: 100px;
	}
	.pl_t{
	  border-bottom: 3px double blue;
	  font-size:30px;
	  font-family:DFKai-sb;
	  font-weight: bolder;
	  color:blue;
	}
	.date_set{
	    width: 100px;
	}
	#history_logbook_title{

	}
	#today_logbook_frm input{
		width:100%;
	}
	#today_logbook_frm #today_logbook{
		padding-left:180px
	}
	input{
		color: black;
		font-size: larger;
	}
    #today_leng_total{
	    background-color: #9fd49f;
        color: black;
        font-size: 20px;
    }
    .line_5_style{
        background-color:#CEFFCE;
    }
</style>
<script type="text/javascript" src="<?=base_url('public/plugin/bootstrap-table-master/src/extensions/export/bootstrap-table-export.js');?>" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url('public/js/tableExport.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/libs/sprintf.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/jspdf.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/libs/base64.js');?>"></script>

<!--<ul  class="list-inline" id="Individual_work_plan_title">
    <li class="pl_t" >
        工作記錄
    </li>
</ul>-->

    
    <div id="history_logbook">
    <ul class="list-inline" >
    <li class=" col-md-2" >
            <span class="pl_t">工作計畫</span>
        </li>
    </ul>
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
                data-url="<?=base_url("logbook_plan/get_LogbookPage_plan__list")?>"
                data-page-list="[10, 20, 25 , 50, 100, ALL]"
                data-show-footer="false"
                data-row-style="rowStyle"
				style="width:1240px"
          >
            <thead>

              <tr>
                  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
                  <th data-field='date' data-width='100'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
                  <th data-field='type' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
          
                  <th data-field='content' data-width='250'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
                  <th data-field='remark' data-width='200'  data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
				  <th data-width='50' data-formatter="OtherFormatter" data-events="OtherEvents" >複製</th>
                </tr>
            </thead>
          </table>
  </div> 

<div id="Individual_work_plan">

  <form action="<?=base_url('/logbook/create_log_today')?>"  method="POST" accept-charset="utf-8" id="today_logbook_frm" >
  <div id="work_plan">
  </div>
    <ul class="list-inline"  id="today_logbook_title">
        <li class=" col-md-2" >
            <span class="pl_t">今天日誌</span>
        </li>
        <li class=" col-md-2" >
            今日時數合計：<span id="today_leng_total"></span>
        </li>
        <li class="col-md-2"><a  class="btn btn-mystyle " id="data_stn" >確認送出</a></li>
    </ul>
    <br><br><br>
    
    
  <ul id="today_logbook" style="width:1040px">
    <div>
        <table id="today_logbook_table"  class="table table-bordered" style="width:1040px">
            <thead>
                <tr>
                    <td style="width:80px">工時</td>
                    <td style="width:110px">工作類型</td>
                    <td style="width:100px">案件編號</td>
                    <td style="width:300px">案件名稱</td>
                    <td style="width:250px">工作內容</td>
                    <td style="width:200px">備註說明</td>
                </tr>
            </thead>
            <tbody>
                <tr data-list-id="0">
                    <td><input type="text" name="today_leng[]" class="today_leng"  ></td>
                    <td><select class="form-control today_state"  name="today_state[]"  >
                            <option value="W">案件</option>
                            <option value="D">指派</option>
                            <option value="L">學習</option>
                        </select></td>
                    <td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"  required="required"   ></td>
                    <td><input type="text" name="today_name[]" class="today_casename"  required="required" ></td>
                    <td class="today_content_td"><input type="text" name="today_content[]" class="today_content" ></td>
                    <td><input type="text" name="today_remark[]" class="today_remark" ></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="width:auto;text-align:right;">
       <a  id="today_new_row" class="glyphicon glyphicon-plus musPick" ></a>  <a  id="today_remove_row" class="glyphicon glyphicon-minus musPick" ></a> 
    </div> 
    
    
  </ul>
  </form>
  <div  id="history_logbook_title">
	<ul class="list-inline" >
		<li  class="col-md-2">
			<span class="pl_t ">工作記錄</span>
		</li >
		<?php if($this->session->userdata('case_number')["class"] == 1) {?>
		<?php } ?>
		<li class="col-md-6">
		  <form id="search_frm" method="get" class="newlog" action="<?=base_url('logbook')?>"  accept-charset="utf-8" >
			  <ul class="list-inline" style="vertical-align:sub;width:100%;height:30px">
				<li class="col-md-1">搜尋：</li>
			  <?php if($this->session->userdata('case_number')["class"] != 3) {?>
				<li class="col-md-2">
				  <select class="form-control"  name="en" id="en"  style="width:110px"/>
				  <option value="all">全部成員</option>
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
				</li>
			  <?php } ?>
				<li class="col-md-5"><input type="text" id="start_date" name="start_date" class="date_set" value="<?=$start_date?>">　~　<input type="text" id="end_date" name="end_date" class="date_set" value="<?=$end_date?>">
					<button type="submit" id="search" class="btn btn-mystyle" >送出</button>
				</li>
			  </ul>

		  </form>
		</li>
	</ul>
  </div>
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
                data-url="<?=base_url("logbook/search_caseno".$tab_search_str)?>"
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
				<?php if($this->session->userdata('case_number')["class"] != 3) {?>
					<th data-field='member' data-width='80' data-formatter="MemberFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
				<?php } ?>
                  <th data-field='length' data-width='50'  data-formatter="LengthFormatter"   data-sortable="true" data-filter-control="true" data-editable="true"  >時數</th>
                  <th data-field='type' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
          
                  <th data-field='content' data-width='250'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
                  <th data-field='remark' data-width='200'  data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
				  <th data-width='50' data-formatter="OtherFormatter" data-events="OtherEvents" >複製</th>
                </tr>
            </thead>
          </table>
  </div>  
</div>
<script>
var work_str_list = new Object();
function set_content(type,elem)
{
    $(elem).html(work_str_list[type]);
}
$(document).on("change",".today_state",function(){
	var tmp_val = $(this).val();
	switch (tmp_val) {
        case "L":
			$(this).parent().parent().children("td").eq(2).html('X<input type="hidden" name="today_caseno[]" class="today_caseno" value="" >');
			$(this).parent().parent().children("td").eq(3).html('X<input type="hidden" name="today_name[]" class="today_casename" value="" >');
			$(this).parent().parent().children("td").eq(4).html('<input type="text" name="today_content[]" class="today_content" >');
            break;
        case "D":
			$(this).parent().parent().children("td").eq(2).html('X<input type="hidden" name="today_caseno[]" class="today_caseno" value="" >');
			$(this).parent().parent().children("td").eq(3).html('X<input type="hidden" name="today_name[]" class="today_casename" value="" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(list_id);
            var content_elem = $(this).parent().parent().children("td").eq(4);
            set_content(tmp_val,content_elem);
            break;

        case "W":
            $(this).parent().parent().children("td").eq(2).html('<input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"  required="required" >');
			$(this).parent().parent().children("td").eq(3).html('<input type="text" name="today_name[]" class="today_casename"  required="required" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(list_id);
            var content_elem = $(this).parent().parent().children("td").eq(4);
            set_content(tmp_val,content_elem);
            break;
    }
})

function LengthFormatter(value, row, index) {
    row.length = value.substr(0,5);
	return value;
}
var today_case_cnt = 1;
var old_work_to_today_cnt = 0;
function OtherFormatter(value, row, index) {
	return '<a class="glyphicon glyphicon-share musPick upToTodayWork"></a>';
}
window.OtherEvents = {
    'click .upToTodayWork': function (e, value, row, index) {
		if(today_case_cnt == old_work_to_today_cnt )
		{
			call_new_today_work_row();
		}
		$(".today_leng").eq(old_work_to_today_cnt).val(row.length);
		$(".today_state").eq(old_work_to_today_cnt).val(row.type);
        switch(row.type)
        {
			case "L":
				$(".today_caseno").eq(old_work_to_today_cnt).parent().html('X<input type="hidden" name="today_caseno[]" class="today_caseno" value="" >');
				$(".today_casename").eq(old_work_to_today_cnt).parent().html('X<input type="hidden" name="today_name[]" class="today_casename" value="" >');
				$(".today_content").eq(old_work_to_today_cnt).parent().html('<input type="text" name="today_content[]" class="today_content" >');
				$(".today_content").eq(old_work_to_today_cnt).val(row.content);
				break;
			case "W":
				$(".today_caseno").eq(old_work_to_today_cnt).parent().html('<input type="text" name="today_caseno[]" class="today_caseno" maxlength="5" >');
				$(".today_caseno").eq(old_work_to_today_cnt).val(row.caseno);
				$(".today_casename").eq(old_work_to_today_cnt).parent().html('<input type="text" name="today_name[]" class="today_casename" >');
				$(".today_casename").eq(old_work_to_today_cnt).val(row.name);
				$(".today_content").eq(old_work_to_today_cnt).parent().html(work_str_list[row.type]);
				$(".today_content").eq(old_work_to_today_cnt).val(row.content);
				call_autocomplete(old_work_to_today_cnt);
				break;
			case "D":
				$(".today_caseno").eq(old_work_to_today_cnt).parent().html('X<input type="hidden" name="today_caseno[]" class="today_caseno" value="" >');
				$(".today_casename").eq(old_work_to_today_cnt).parent().html('X<input type="hidden" name="today_name[]" class="today_casename" value="" >');
				$(".today_content").eq(old_work_to_today_cnt).parent().html(work_str_list[row.type]);
				$(".today_content").eq(old_work_to_today_cnt).val(row.content);
				break;
        }
		$(".today_remark").eq(old_work_to_today_cnt).val(row.remark);
        today_total_time();
		old_work_to_today_cnt++;
    }
};
function StateFormatter(value, row, index){
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

function MemberFormatter(value, row, index){
    return row.member +" "+row.member_name;
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

  function call_new_today_work_row(){
	$("#today_logbook table tbody").append('<tr data-list-id="' + today_case_cnt +'">'+
			'<td><input type="text" name="today_leng[]" class="today_leng"></td>'+
			'<td><select class="form-control today_state"  name="today_state[]"  >'+
			'<option value="W">案件</option>'+
			'<option value="D">指派</option>'+
			'<option value="L">學習</option>'+
			'</select></td>'+
			'<td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   required="required"  ></td>'+
			'<td><input type="text" name="today_name[]" class="today_casename"  required="required" ></td>'+
			'<td class="today_content_td">'+work_str_list["W"]+'</td>'+
			'<td><input type="text" name="today_remark[]" class="today_remark" ></td>'+
			'</tr>');

    call_autocomplete(today_case_cnt++);
  }

function today_total_time()
{



        var today_leng_input_elm = $(".today_leng");
        var set_hour = 0;
        var set_min = 0;
        for (i = 0 ; i< today_leng_input_elm.length ; i++) {
            input_time_str =  $(today_leng_input_elm[i]).val();
            if(!input_time_str)
            {
                continue;
            }
            if(input_time_str.indexOf(":") != -1)
            {
                set_hour += parseInt( input_time_str.substr(0,input_time_str.indexOf(":")));
            }
        	set_min += parseInt(input_time_str.substr(input_time_str.indexOf(":")+1,2));
        }

        
        today_work_time.setHours( set_hour + today_work_time_old.getHours() , set_min + today_work_time_old.getMinutes());

        var set_time_str = padLeft(today_work_time.getHours() + "",2) + ":" + padLeft(today_work_time.getMinutes() + "" , 2);
        $("#today_leng_total").html(set_time_str);
    
}

function rowStyle(row, index)
{
  if ((index+1) % 5 == 0 ) {
      return {
          classes: "line_5_style"
      };
  }
  return {};
}
$(document).on("change",".today_leng",function(e){
    var leng_str = $(this).val();
    leng_str = leng_str.replace(".",":");
    $(this).val(leng_str);
    today_total_time();
});
var today_work_time = new Date(0);
var today_work_time_old = new Date(0);
$(document).ready(function(){

  var calset={
          "dow":['日','一','二','三','四','五','六'],
          "tbBgColor":"91FEFF",
          "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
          "element_type":"input",
          "click_over": null
      };
  $("#date").calDate(calset);
  $("#start_date").calDate(calset);
  $("#end_date").calDate(calset);

  log_content_data = "";
  $.ajax({
        url: base_url+"logbook/get_log_content",
        dataType: "json",
        type: "get",
        success: function (data) {
            log_content_data = data;
        }
    });

  needata = "";
  $.ajax({
        url: base_url+"logbook/get_caseno",
        dataType: "json",
        type: "get",
        success: function (data) {
            needata = data;
        }
    });

  for(i = 0 ; i<today_case_cnt;i++)
  {
      call_autocomplete(i);
  }

  $("#today_new_row").click(call_new_today_work_row);
  $("#today_remove_row").click(function(e){
      $("#today_logbook_table tbody tr:last-child").remove();
      today_case_cnt--;
      old_work_to_today_cnt--;
  });



  /*dt = new Date();
  today_str = (dt.getFullYear()-1911) + "/" + padLeft((dt.getMonth()+1)+"",2) + "/" + padLeft(dt.getDate()+"",2);
  $("#date").val(today_str);
  $("#save").click(function (){
      err_msg = "";
      $("#log_frm").submit();
  });
  state_val = "<?=$prev_caseno_state?>";
  $("#state").val(state_val);*/
  
	$("#data_stn").click(function(e){
		if(confirm("確認是否送出"))
		{
			$("#today_logbook_frm").submit();
		}
	});




    $.ajax({
        url: base_url+"logbook/get_log_today_leng",
        dataType: "json",
        type: "get",
        success: function (data) {
            $("#today_leng_total").html(data);
            today_work_time.setHours(data.substr(0,2),data.substr(3,2));
            today_work_time_old.setHours(data.substr(0,2),data.substr(3,2));
        }
    });


    $.ajax({
        url:base_url+"logbook_head/get_head_list/W",
        dataType: "json",
        type: "get",
        success: function (data) {
            
            var str = "";
            str = '<select class="form-control today_content"  name="today_content[]"  >';
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
            str = '<select class="form-control today_content"  name="today_content[]"  >';
            for(var key in data)
            {
                str += '<option value="'+data[key].work_content+'">'+data[key].work_content+'</option>'
            }
            str += '</select>';
            work_str_list["D"] = str;
        }
    })


    $("#title_edit_menu .work_logbook a").css("color","red");
    
});
</script>
