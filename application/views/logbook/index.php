
<style>
  .btn-mystyle{
    color: #fff;
      background-color: #5E825E;
      border-color: #4cae4c;
  }
  .newlog{
    width:800px;
  }
  #text_content{
    width: 500px;
    height: 100px;
  }
</style>
<form id="log_frm" method="post" action="<?=base_url('logbook/creat_log')?>"  accept-charset="utf-8" >
  <div class="newlog">
    <div class="row">
      <div class="col-md-2">案件編號：</div>
      <div class="col-md-3"><input type="text" id="caseno" name="caseno" required="required" value="<?=$prev_caseno?>"></div>
      <div class="col-md-2">案件名稱：</div>
      <div class="col-md-3"><input type="text" id="casename"  value="<?=$prev_caseno_name?>"></div>
    </div>
      <div class="row">
        <div class="col-md-2">工作類型：</div>
        <div class="col-md-3">
          <select class="form-control"  name="state" id="state"  style="width:150px"/>
            <option value="D">D</option>
            <option value="W">W</option>
            <option value="L">L</option>
          </select>
          <!-- <input type="text" id="state" name="state" required="required" value="<?=$prev_caseno_state?>"> -->

        </div>

      </div>
    <div  class="row">
      <div class="col-md-2">日期：</div>
      <div class="col-md-3"><input type="text" id="date" name="date" ></div>
      <div class="col-md-2">時間長度：</div>
      <div class="col-md-3"><input type="number" id="length" name="length" value="8"></div>
    </div>

    <div  class="row">
      <div  class="col-md-2">內容：</div>
      <div  class="col-md-3"><textarea id="text_content" name="content" required="required"></textarea></div>
    </div>
    <div  class="row">
      <div  class="col-md-2">備註：</div>
      <div  class="col-md-3"><textarea id="remark" name="remark"></textarea></div>
    </div>
    <div  class="row"><div  class="col-md-3">
        <!-- <button type="submit">send</button> -->
        <a  id="save" class="btn btn-mystyle" >送出</a>
      </div>
    </div>
  </div>
</form>-->
<form id="search_frm" method="get" action="<?=base_url('logbook')?>"  accept-charset="utf-8" >
  <div class="newlog">
    <?php if($this->session->userdata('case_number')["class"] == 1) {?>
    <div  class="row">
      <div class="col-md-2">成員：</div>
      <div class="col-md-3"><select class="form-control"  name="en" id="en"  style="width:150px"/>
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
        </select></div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-2">開始日期：</div>
      <div class="col-md-3"><input type="text" id="start_date" name="start_date"></div>
      <div class="col-md-2">結束日期：</div>
      <div class="col-md-3"><input type="text" id="end_date" name="end_date"></div>
    </div>

    <div  class="row"><div  class="col-md-3">
        <!-- <button type="submit">send</button> -->
        <button type="submit" id="search" class="btn btn-mystyle" >送出</button>
      </div>
    </div>
  </div>
</form>
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
          data-sort-name="caseno"
          data-url="<?=base_url("logbook/search_caseno".$tab_search_str)?>"
          data-page-list="[10, 20, 25 , 50, 100, ALL]"
          data-show-footer="false"
    >
      <thead>

        <tr>
            <th data-field='NO' data-width='10'	data-visible="false" >id</th>
            <th data-field='caseno' data-width='50' data-sortable="true" data-filter-control="true" >NO</th>
            <th data-field='name' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
            <th data-field='member' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
            <th data-field='member_name' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >名字</th>
            <th data-field='length' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作時數</th>
            <th data-field='date' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
            <th data-field='content' data-width='350'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作內容</th>
            <th data-field='state' data-width='10'  data-sortable="true" data-filter-control="true" data-editable="true"  >工作狀態</th>
          </tr>
      </thead>
    </table>
<script>
$(document).ready(function(){


  var calset={
          "dow":['日','一','二','三','四','五','六'],
          "tbBgColor":"91FEFF",
          "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
          "element_type":"input",
          "click_over": function(){
              // val_name = this.formname.attr("data-title");
              // id = this.formname.attr("data-title-id");
              // //d = this.formname.val();
              // d_str = this.formname.html();
              // if(this.formname.css('color') == 'rgb(119, 0, 119)')
              // {
              //     data_status = 0;
              // }else{
              //     data_status = 2;
              // }
              // data = { 'id' : id,
              //        'title' : val_name,
              //        'status' : data_status,
              //        'date' : d_str,
              // }
              //debugger;

              //update_status(data,this.formname.parent().parent());

          }
      };
  $("#date").calDate(calset);
  $("#start_date").calDate(calset);
  $("#end_date").calDate(calset);
  needata = "";

  $("#caseno").autocomplete({
      create: function (event, ui) {
          $.ajax({
              url: base_url+"logbook/get_caseno",
              dataType: "json",
              type: "get",
              success: function (data) {
                  needata = data;
              }
          });
      },
      source: function (request, response) {
        //data :: JSON list defined
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(needata , function (value) {
            return matcher.test(value.caseno || value.name);
        }))
      },
      select: function( event, ui ) {
          $("#caseno").val(ui.item.caseno);
          $("#casename").val(ui.item.name);
          return false;
      }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.caseno + "<br>" + item.name + "</a>" )
        .appendTo( ul );
  };
  $("#casename").autocomplete({
      source: function (request, response) {
        //data :: JSON list defined
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(needata , function (value) {
            return matcher.test(value.name || value.caseno  );
        }))
      },
      select: function( event, ui ) {
          $("#caseno").val(ui.item.caseno);
          $("#casename").val(ui.item.name);
          return false;
      }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.caseno + "<br>" + item.name + "</a>" )
        .appendTo( ul );
  };
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
