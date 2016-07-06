
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
  }
  .date_set{
    width: 100px;
  }
  #history_logbook_title{
    
  }
  .today_content{
      width:100%;
  }
  .today_caseno{
      width:100%;
  }
  .today_casename{
      width:100%;
  }
</style>


<ul  class="list-inline" id="Individual_work_plan_title">
    <li class="pl_t" >
        個人工作紀錄填寫
    </li>
</ul>
<div id="Individual_work_plan">

  <form action="<?=base_url('/logbook/create_log_today')?>"  method="POST" accept-charset="utf-8" >
  <div id="work_plan">
  </div>
    <ul class="list-inline"  id="today_logbook_title">
        <li class="pl_t " >
            今天日誌
        </li>
        <li><button type="submit"  class="btn btn-mystyle" >確認送出</button></li>
    </ul>
  <ul id="today_logbook" style="width:1150px">
    <div>
        <table class="table table-bordered" style="width:1250px">
            <thead>
                <tr>
                    <td style="width:50px">工作時數</td>
                    <td style="width:100px">工作類型</td>
                    <td style="width:100px">案件編號</td>
                    <td style="width:300px">案件名稱</td>
                    <td style="width:400px">工作內容</td>
                    <td style="width:100px">備註說明</td>
                </tr>
            </thead>
            <tbody>
                <tr data-list-id="1">
                    <td><input type="number" name="today_leng[]" class="today_leng" size="1" style="width:40px"  min="0" max="20" ></td>
                    <td><select class="form-control today_state"  name="today_state[]"  >
                            <option value="D">指派</option>
                            <option value="W">案件</option>
                            <option value="L">學習</option>
                        </select></td>
                    <td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   ></td>
                    <td><input type="text" name="today_name[]" class="today_casename" ></td>
                    <td><input type="text" name="today_content[]" class="today_content" ></td>
                    <td><input type="text" name="today_remark[]" class="today_remark" ></td>
                </tr>
                <tr data-list-id="2">
                    <td><input type="number" name="today_leng[]" class="today_leng" size="1" style="width:40px"  min="0" max="20" ></td>
                    <td><select class="form-control today_state"  name="today_state[]"  >
                            <option value="D">指派</option>
                            <option value="W">案件</option>
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
  <ul class="list-inline"  id="history_logbook_title">
    <li class="pl_t " >
        工作紀錄
    </li>
    <li>查詢指定日期：</li>
    <li>
      <form id="search_frm" method="get" class="newlog" action="<?=base_url('logbook')?>"  accept-charset="utf-8" >
          <ul class="list-inline" style="vertical-align:sub;">
          <?php if($this->session->userdata('case_number')["class"] == 1) {?>
            <li class="col-md-1">成員：</li>
            <li class="col-md-3">
              <select class="form-control"  name="en" id="en"  style="width:150px"/>
              <option value="all">全部</option>
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
            <li class="col-md-4"><input type="text" id="start_date" name="start_date" class="date_set" value="<?=$start_date?>">　~　<input type="text" id="end_date" name="end_date" class="date_set" value="<?=$end_date?>"></li>
            <li  class="col-md-1">
              <!-- <button type="submit">send</button> -->
              <button type="submit" id="search" class="btn btn-mystyle" >送出</button>
            </li>
          </ul>

      </form>
    </li>
  </ul>
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
          >
            <thead>

              <tr>
                  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
                  <th data-field='date' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
                  <th data-field='length' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作時數</th>
                  <th data-field='state' data-width='10' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='50' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
          <?php if($this->session->userdata('case_number')["class"] == 1 || $this->session->userdata('case_number')["class"] == 2) {?>
                  <th data-field='member' data-width='10' data-formatter="MemberFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
          <?php } ?>
                  <th data-field='content' data-width='350'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
                  <th data-field='remark' data-width='350'  data-sortable="true" data-filter-control="true" data-editable="true"  >備註說明</th>
                </tr>
            </thead>
          </table>
  </div>  
</div>
<script>
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
$(document).ready(function(){
  var today_case_cnt = 4;
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
  function call_autocomplete(tr_list_id)
  {
    $("tr[data-list-id="+tr_list_id+"] .today_caseno").autocomplete({

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
    $("tr[data-list-id="+tr_list_id+"] .today_casename").autocomplete({
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

    $("tr[data-list-id="+tr_list_id+"] .today_content").autocomplete({

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

  for(i = 1 ;i<=today_case_cnt;i++)
  {
      call_autocomplete(i);
  }

  $("#today_new_row").click(function(){
      $("#today_logbook table tbody").append('<tr data-list-id="' + ++today_case_cnt +'">'+
                    '<td><input type="number" name="today_leng[]" class="today_leng" size="1" style="width:40px"  min="0" max="20" ></td>'+
                    '<td><select class="form-control today_state"  name="today_state[]"  >'+
                    '<option value="D">指派</option>'+
                    '<option value="W">案件</option>'+
                    '<option value="L">學習</option>'+
                    '</select></td>'+
                    '<td><input type="text" name="today_caseno[]" class="today_caseno" maxlength="5"   ></td>'+
                    '<td><input type="text" name="today_name[]" class="today_casename" ></td>'+
                    '<td><input type="text" name="today_content[]" class="today_content" ></td>'+
                    '<td><input type="text" name="today_remark[]" class="today_remark" ></td>'+
                    '</tr>');
      
      call_autocomplete(today_case_cnt);
      
  });




  dt = new Date();
  today_str = (dt.getFullYear()-1911) + "/" + padLeft((dt.getMonth()+1)+"",2) + "/" + padLeft(dt.getDate()+"",2);
  $("#date").val(today_str);
  $("#save").click(function (){
      err_msg = "";
      $("#log_frm").submit();
  });
  state_val = "<?=$prev_caseno_state?>";
  $("#state").val(state_val);
});
</script>
