<style>
	.pl_t{
	  border-bottom: 3px double black;
	  font-size:30px;
	  font-family:DFKai-sb;
	  font-weight: bolder;
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
</style>

<div>
  <form action="<?=base_url('/logbook_plan/create_log_plan')?>"  method="POST" accept-charset="utf-8" id="today_logbook_frm" >
  <div id="work_plan">
  </div>
    <ul class="list-inline"  id="today_logbook_title">
        <li class=" col-md-2" >
            <span class="pl_t">工作計畫新增</span>
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
                    <td><input type="text" name="date" class="today_leng"  ></td>
			  <?php if($this->session->userdata('case_number')["class"] != 3) {?>
                    <td style="width:100px">
                <select class="form-control"  name="member" id="member"  style="width:110px"/>
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
            <span class="pl_t">工作計畫</span>
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
                  <th data-field='state' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
          
                  <th data-field='content' data-width='250'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
                  <th data-field='remark' data-width='200'  data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
                  <th data-field='Other' data-formatter="OtherFormatter" data-events="OtherEvents" data-width='50'  data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
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
			$(this).parent().parent().children("td").eq(3).html('X<input type="hidden" name="today_caseno" class="today_caseno" value="" >');
			$(this).parent().parent().children("td").eq(4).html('X<input type="hidden" name="today_name" class="today_casename" value="" >');
			$(this).parent().parent().children("td").eq(5).html('<input type="text" name="today_content" class="today_content" >');
            break;
        case "D":
			$(this).parent().parent().children("td").eq(3).html('X<input type="hidden" name="today_caseno" class="today_caseno" value="" >');
			$(this).parent().parent().children("td").eq(4).html('X<input type="hidden" name="today_name" class="today_casename" value="" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(0);
            var content_elem = $(this).parent().parent().children("td").eq(5);
            set_content(tmp_val,content_elem);
            break;

        case "W":
            $(this).parent().parent().children("td").eq(3).html('<input type="text" name="today_caseno" class="today_caseno" maxlength="5"  required="required" >');
			$(this).parent().parent().children("td").eq(4).html('<input type="text" name="today_name" class="today_casename"  required="required" >');
			list_id = $(this).parent().parent().attr('data-list-id');
			call_autocomplete(0);
            var content_elem = $(this).parent().parent().children("td").eq(5);
            set_content(tmp_val,content_elem);
            break;
    }
})

window.OtherEvents= {
    'click .plan_open' :function (e, value, row, index){
        if(!confirm("確認是否公開"))
		{
			return;
		}
        var stn_data = {
            "state":"B",
            "NO":row.NO
        }
        update_plan(stn_data);
    },'click .plan_del' :function (e, value, row, index){
        if(!confirm("確認是否刪除"))
		{
			return;
		}
        var stn_data = {
            "state":"D",
            "NO":row.NO
        }
        update_plan(stn_data);
    }
}
function update_plan(stn_data){
    $.ajax({
        url:base_url+"logbook_plan/update_plan",
        type:"POST",
        dataType:"JSON",
        data:stn_data,
        success:function(){
            alert("OK");
            location.reload();
        },
        error:function(){
            alert("error");
        }

    })
}
function OtherFormatter(value, row, index){
    var rtn_str = "";
    if(row.member == '<?php echo($log_member)?>')
    {
        rtn_str = '<a class="glyphicon glyphicon-share musPick plan_open"  aria-hidden="true"> </a><a class="glyphicon glyphicon-remove musPick plan_del" ></a>';
    }
    return rtn_str;
}

function MemberFormatter(value, row, index){
    return row.member +" "+row.member_name;
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
            tmp_str = "草稿"
            break;
        case "B":
            tmp_str = "公開"
            break;

        default:
            
            break;
    }
        return tmp_str;
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

var replaceWith = $('<input id="temp_name_input" name="temp" style="width:80%" />');
var save_ok_With = $('<a class="glyphicon glyphicon-ok musPick name_save_ok"  aria-hidden="true"> </a>');
var remove_With = $('<a class="glyphicon glyphicon-remove musPick name_cancel"  aria-hidden="true"></a>');
var connectWith = $('input[name="hiddenField"]');
function work_contentFormatter(value, row, index){
    return [
        '<div data-field="work_content" class="casenoEdit musPick">'+row.work_content+'</div>'
    ].join('');
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
            $.ajax({
                url:base_url+"logbook_head/edit_head",
                type:"POST",
                dataType:"JSON",
                data:$data,
                success:function(){
                    alert("OK");
                    elem.text(replaceWith.val());
                    if($data.sort_no)
                    {
                        row.sort_no = replaceWith.val();
                    }else if($data.work_content)
                    {
                        row.work_content = replaceWith.val();

                    }
                },
                error:function(){
                    alert("error");
                }

            })
        }

        this.enter_input = function(event){
            if(elem.attr("data-field") == "work_content")
            {
                $data = {"uid":  row.uid,
                            "work_content" : replaceWith.val()
                        }    

            }else if(elem.attr("data-field") == "sort_no")
            {
                $data = {"uid":  row.uid,
                            "sort_no" : replaceWith.val()
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
            str = '<select class="form-control today_content"  name="today_content"  >';
            for(var key in data)
            {
                str += '<option value="'+data[key].work_content+'">'+data[key].work_content+'</option>'
            }
            str += '</select>';
            work_str_list["D"] = str;
        }
    })
    $("#title_edit_menu .work_plan a").css("color","red");
});

</script>