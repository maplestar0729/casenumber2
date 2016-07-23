
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
	  border-bottom: 3px double black;
	  font-size:30px;
	  font-family:DFKai-sb;
	  font-weight: bolder;
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
		padding-left:160px
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
</style>


<ul  class="list-inline" id="Individual_work_plan_title">
    <li class="pl_t" >
        工作記錄
    </li>
</ul>
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
  <ul id="today_logbook" style="width:1040px">
    <div>
        <table class="table table-bordered" style="width:1040px">
            <thead>
                <tr>
                    <td style="width:80px">工作時數</td>
                    <td style="width:110px">工作類型</td>
                    <td style="width:100px">案件編號</td>
                    <td style="width:300px">案件名稱</td>
                    <td style="width:250px">工作內容</td>
                    <td style="width:200px">備註說明</td>
                </tr>
            </thead>
            <tbody>
                <tr data-list-id="0">
                    <td><input type="text" name="today_leng[]" class="today_leng" size="1"  ></td>
                    <td><select class="form-control today_state"  name="today_state[]"  >
                            <option value="W">案件</option>
                            <option value="D">指派</option>
                            <option value="L">學習</option>
                        </select></td>
                    <td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   ></td>
                    <td><input type="text" name="today_name[]" class="today_casename" ></td>
                    <td><input type="text" name="today_content[]" class="today_content" ></td>
                    <td><input type="text" name="today_remark[]" class="today_remark" ></td>
                </tr>
                <tr data-list-id="1">
                    <td><input type="text" name="today_leng[]" class="today_leng" size="1"   ></td>
                    <td><select class="form-control today_state"  name="today_state[]"  >
                            <option value="W">案件</option>
                            <option value="D">指派</option>
                            <option value="L">學習</option>
                        </select></td>
                    <td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   ></td>
                    <td><input type="text" name="today_name[]" class="today_casename" ></td>
                    <td><input type="text" name="today_content[]" class="today_content" ></td>
                    <td><input type="text" name="today_remark[]" class="today_remark" ></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div style="width:auto;text-align:right;">
        <a  id="today_new_row" class="btn btn-mystyle" >新增</a>
    </div> 
    
  </ul>
  </form>
  <div  id="history_logbook_title">
	<ul class="list-inline" >
		<li  class="col-md-3">
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
                data-toolbar="#history_logbook_title"
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
			<?php if($this->session->userdata('case_number')["class"] != 3) {?>
				style="width:1220px"
			<?php }else{ ?>
				style="width:1160px"
			<?php } ?>
          >
            <thead>

              <tr>
                  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
                  <th data-field='date' data-width='100'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
				<?php if($this->session->userdata('case_number')["class"] != 3) {?>
					<th data-field='member' data-width='60' data-formatter="MemberFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >成<br>員</th>
				<?php } ?>
                  <th data-field='length' data-width='50'  data-formatter="LengthFormatter"   data-sortable="true" data-filter-control="true" data-editable="true"  >時<br>數</th>
                  <th data-field='state' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
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
$(".today_state").change(function(){
	var tmp_val = $(this).val();
	switch (tmp_val) {
        case "L":
			$(this).parent().parent().children("td").eq(2).html("X");
			$(this).parent().parent().children("td").eq(3).html("X");
            tmp_html_str = "學習"
            break;

        default:
            $(this).parent().parent().children("td").eq(2).html('<input type="text" name="today_caseno[]" class="today_caseno" maxlength="5" >');
			$(this).parent().parent().children("td").eq(3).html('<input type="text" name="today_name[]" class="today_casename" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(list_id);
            break;
    }
})

function LengthFormatter(value, row, index) {
    row.length = value.substr(0,5);
	return row.length;
}
var today_case_cnt = 2;
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
		$(".today_state").eq(old_work_to_today_cnt).val(row.state);
		$(".today_caseno").eq(old_work_to_today_cnt).val(row.caseno);
		$(".today_casename").eq(old_work_to_today_cnt).val(row.name);
		$(".today_content").eq(old_work_to_today_cnt).val(row.content);
		$(".today_remark").eq(old_work_to_today_cnt).val(row.remark);
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
    return row.member +"<br>"+row.member_name;
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
			'<td><input type="text" name="today_leng[]" class="today_leng" size="1" style="width:40px"  min="0" max="20" ></td>'+
			'<td><select class="form-control today_state"  name="today_state[]"  >'+
			'<option value="W">案件</option>'+
			'<option value="D">指派</option>'+
			'<option value="L">學習</option>'+
			'</select></td>'+
			'<td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   ></td>'+
			'<td><input type="text" name="today_name[]" class="today_casename" ></td>'+
			'<td><input type="text" name="today_content[]" class="today_content" ></td>'+
			'<td><input type="text" name="today_remark[]" class="today_remark" ></td>'+
			'</tr>');

    call_autocomplete(today_case_cnt++);
  }
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




  dt = new Date();
  today_str = (dt.getFullYear()-1911) + "/" + padLeft((dt.getMonth()+1)+"",2) + "/" + padLeft(dt.getDate()+"",2);
  $("#date").val(today_str);
  $("#save").click(function (){
      err_msg = "";
      $("#log_frm").submit();
  });
  state_val = "<?=$prev_caseno_state?>";
  $("#state").val(state_val);
  
	$("#data_stn").click(function(e){
		if(confirm("確認是否送出"))
		{
			$("#today_logbook_frm").submit();
		}
	});


    $(".today_leng").on("change",function(e){
        var leng_str = $(this).val();
        leng_str = leng_str.replace(".",":");
        $(this).val(leng_str);

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
});
</script>
